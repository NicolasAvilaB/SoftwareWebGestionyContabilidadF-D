<?php
require('./fpdf/fpdf.php');
class PDF extends FPDF
{
    protected $B = 0;
    protected $I = 0;
    protected $U = 0;
    protected $HREF = '';
    function WriteHTML($html)
    {
        // HTML parser
        $html = str_replace("\n",' ',$html);
        $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
        foreach($a as $i=>$e)
        {
            if($i%2==0)
            {
                // Text
                if($this->HREF)
                    $this->PutLink($this->HREF,$e);
                else
                    $this->Write(5,$e);
            }
            else
            {
                // Tag
                if($e[0]=='/')
                    $this->CloseTag(strtoupper(substr($e,1)));
                else
                {
                    // Extract attributes
                    $a2 = explode(' ',$e);
                    $tag = strtoupper(array_shift($a2));
                    $attr = array();
                    foreach($a2 as $v)
                    {
                        if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                            $attr[strtoupper($a3[1])] = $a3[2];
                    }
                    $this->OpenTag($tag,$attr);
                }
            }
        }
    }

    function OpenTag($tag, $attr)
    {
        // Opening tag
        if($tag=='B' || $tag=='I' || $tag=='U')
            $this->SetStyle($tag,true);
        if($tag=='A')
            $this->HREF = $attr['HREF'];
        if($tag=='BR')
            $this->Ln(5);
    }

    function CloseTag($tag)
    {
        // Closing tag
        if($tag=='B' || $tag=='I' || $tag=='U')
            $this->SetStyle($tag,false);
        if($tag=='A')
            $this->HREF = '';
    }

    function SetStyle($tag, $enable)
    {
        // Modify style and select corresponding font
        $this->$tag += ($enable ? 1 : -1);
        $style = '';
        foreach(array('B', 'I', 'U') as $s)
        {
            if($this->$s>0)
                $style .= $s;
        }
        $this->SetFont('',$style);
    }

    function PutLink($URL, $txt)
    {
        // Put a hyperlink
        $this->SetTextColor(0,0,255);
        $this->SetStyle('U',true);
        $this->Write(5,$txt,$URL);
        $this->SetStyle('U',false);
        $this->SetTextColor(0);
    }
//Cabecera de página

   function Header()
   {
       if ($this->PageNo() == 1){
            setlocale(LC_ALL,"es_CL.UTF-8");
            $tecnico = $_REQUEST["tecnico"];
            $this->Ln(5);
            $this->SetFont('Arial','B',11);
            $this->Cell(101);
            $this->Cell(65,-6,'Pagos '.$tecnico,0,0,'C');
            $this->Ln(-3);
            $this->Cell(78);
            $this->SetFont('Arial','',11);
       }
   }



   //Pie de página
   /*function Footer()
   {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
   }*/

   function TablaSimple()
   {
        $this->SetFont('Arial','I',10);
        $this->Ln(-47);
        $conexion2 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
        $conexion3 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
        mysqli_set_charset($conexion2,"utf8");
        if(mysqli_connect_errno()){
            echo mysqli_connect_error();
        }
        $suma = 0;
        $suma2 = 0;
        $idpagado = $_REQUEST["idpagado"];
        $tecnico = $_REQUEST["tecnico"];
        //otros
        $subconsulta_restificar = mysqli_query($conexion2, "select * from Pagos where IDPagado = '$idpagado' and Tecnico = '$tecnico'");
        if (mysqli_num_rows($subconsulta_restificar) > 0){
            $this->SetFont('Arial','B',10);
            $this->Ln(2);
            $this->Cell(-5);
            $this->Cell(22,7,utf8_decode('Fecha Efect.'),1);
            $this->Cell(18,7,utf8_decode('N° Orden'),1);
            $this->Cell(75,7,'Cliente',1);
            $this->Cell(50,7,'Tipo',1);
            $this->Cell(11,7,'Cant.',1);
            $this->Cell(25,7,'V. Unit.',1);
            $this->Cell(25,7,'Total',1);
            $this->Cell(23,7,utf8_decode('B.D.'),1);
            $this->Cell(20,7,'Fecha Pag.',1);
            $this->Cell(14,7,'IDPag.',1);
            $this->Ln();
        }
        while($restificar = mysqli_fetch_array($subconsulta_restificar)){
            $this->SetFont('Arial','I',10);
            $fefe = $restificar[2];
            $nuevafechaefect = date("d-m-Y", strtotime($fefe));
            $nv = $restificar[3];
            $cl = $restificar[4];
            $tp = $restificar[5];
            $cant = $restificar[6];
            $vlunit = $restificar[7];
            $valortotal = $restificar[8];
            $bd = $restificar[12];
            $fepag = $restificar[11];
            $nuevafechapag = date("d-m-Y", strtotime($fepag));
            $idpag = $restificar[14];
            if ($tp == 'Rectificación' || $tp == 'Rectificación con Bono Diario'){
                $nv = '0';
            }
            $this->Cell(-5);
            $this->Cell(22,7,$nuevafechaefect,1);
            $this->Cell(18,7,$nv,1);
            $this->Cell(75,7,utf8_decode($cl),1);
            $this->Cell(50,7,utf8_decode($tp),1);
            $this->Cell(11,7,$cant,1);
            $this->Cell(25,7,"$ ".number_format($vlunit, 0, ',', '.'),1);
            $this->Cell(25,7,"$ ".number_format($valortotal, 0, ',', '.'),1);
            if ($bd == "" || $bd ==" " ){
                $bd = "0";
            }
            $this->Cell(23,7,"$ ".number_format($bd, 0, ',', '.'),1);
            $this->Cell(20,7,$nuevafechapag,1);
            $this->Cell(14,7,$idpag,1);
            $this->Ln();
            $ganancia = intval($valortotal);
    		    $suma += $ganancia;
    		    $restificar++;
        }
        $this->Ln();
        $this->Cell(222);
        $this->Cell(28,7,"Subtotal: ",1);
        $this->Cell(28,7,"$ ".number_format($suma, 0, ',', '.'),1);
        $this->Ln();
        $subconsulta_anticipos= mysqli_query($conexion3, "select * from Anticipos where IDPagado = '$idpagado' and Tecnico = '$tecnico'");
        if (mysqli_num_rows($subconsulta_anticipos) > 0){
            $this->Ln();
            $this->SetFont('Arial','B',11);
            $this->Cell(-4);
            $this->Cell(28,7,'Anticipos');
            $this->Ln(10);
            $this->SetFont('Arial','B',10);
            $this->Ln(2);
            $this->Cell(-5);
            $this->Cell(22,7,utf8_decode('Fecha Efect.'),1);
            $this->Cell(29,7,utf8_decode('Valor'),1);
            $this->Cell(95,7,'Detalle',1);
            $this->Cell(22,7,'Fecha Pag.',1);
            $this->Cell(14,7,'IDPag.',1);
            $this->Ln();
        }
        while($anti = mysqli_fetch_array($subconsulta_anticipos)){
            $this->SetFont('Arial','I',10);
            $fefean = $anti[2];
            $nuevafechaefectan = date("d-m-Y", strtotime($fefean));
            $valor = $anti[3];
            $detalle = $anti[7];
            $fepagan = $anti[6];
            $nuevafechapagan = date("d-m-Y", strtotime($fepagan));
            $idpag = $anti[8];
            $this->Cell(-5);
            $this->Cell(22,7,$nuevafechaefectan,1);
            $this->Cell(29,7,"$ ".number_format($valor, 0, ',', '.'),1);
            $this->Cell(95,7,utf8_decode($detalle),1);
            $this->Cell(22,7,$nuevafechapagan,1);
            $this->Cell(14,7,$idpag,1);
            $this->Ln();
            $ganancia2 = intval($valor);
    		    $suma2 += $ganancia2;
        }
        if (mysqli_num_rows($subconsulta_anticipos) > 0){
            $this->Ln();
            $this->Cell(-5);
            $this->Cell(22,7,"Subtotal: ",1);
            $this->Cell(29,7,"$ ".number_format($suma2, 0, ',', '.'),1);
        }
        $this->Ln();
        $this->Cell(222);
        $this->SetFont('Arial','B',11);
        $this->Cell(22,7,"Total: ",1);
        $resta = intval($suma - $suma2);
        $this->Cell(33,7,"$ ".number_format($resta, 0, ',', '.'),1);
   }
}

$pdf=new PDF();
$idpagado = $_REQUEST["idpagado"];
$tecnico = $_REQUEST["tecnico"];
$pdf->SetTitle(utf8_decode('Pagos Filtrados de '.$tecnico));
//Títulos de las columnas
//$header=array('Cant','Ancho','Alto','Accionamiento','Color','Valor Unid.','Total');
$pdf->AliasNbPages();
//Primera página
$pdf->AddPage('L');
$pdf->SetY(65);
//$pdf->AddPage();
$pdf->TablaSimple();
//Segunda página
$modo="I";
$pdf->Output($idpagado." - Pagos Filtrados de ".$tecnico.".pdf",$modo);
?>
