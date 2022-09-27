<?php
require('./fpdf/fpdf.php');
$id = 0;
$nombre = "";
$telefono = "";
$email = "";
$direccion = "";
$comuna = "";
$mediopago = "";
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
            $fecha = $_REQUEST["fecha"];
            $datosinst = $_REQUEST["datosinst"];
        //Logo
        //Arial bold 15
            $this->SetFont('Arial','',12);
            //Movernos a la derecha
            $this->Cell(150);
            //Título
            $this->Ln(5);
            $this->Cell(102);
        //Salto de línea
            $this->Ln(-5);
            $this->Ln(-3);
            $this->Cell(108);
            $this->SetFont('Arial','B',11);
            $this->Cell(60,5,utf8_decode('Instalación'));
            $this->Ln(8);
            $this->SetFont('Arial','',12);
            $this->Cell(-1);
            $this->Cell(60,5,utf8_decode('Fecha:  '.strftime("%A, %d de %B del %Y", strtotime($fecha)).'.-'));
            $this->Ln(5);
            $this->Cell(-1);
            $this->SetFont('Arial','B',12);
            $this->Cell(60,5,utf8_decode('Descripción Inst.:'));
            $this->Ln(5);
            $this->Cell(-1);
            $this->SetFont('Arial','',12);
            $this->MultiCell(280,5,utf8_decode($datosinst));
            $this->Ln(5);
            $this->Cell(78);
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
        $this->Ln(-10);
        $obsert = $_REQUEST["obsert"];
        $obsercl = $_REQUEST["obsercl"];
        //otros
        //Título
        $this->SetFont('Arial','I',11);
        $this->Cell(-4);
        $this->Ln(8);
        $this->SetFont('Arial','',8);
        $this->Cell(-5);
        $this->Cell(285,82,'',1);
        $this->Ln(52);
        $this->Cell(-2);
        $this->SetFont('Arial','B',8);
        $this->Ln(5);
        $this->SetFont('Arial','',9);
        $this->Cell(-2);
        $this->SetFont('Arial','',12);
        $this->Ln(-53);
        $this->Cell(60,5,utf8_decode('Observaciones Cliente: '));
        $this->Ln(51);
        $this->SetFont('Arial','B',13);
        $this->Ln(-45);
        $this->SetFont('Arial','',11);
        $this->MultiCell(213,5,utf8_decode($obsercl));
        $this->Ln(10);
        $this->Cell(60,5,utf8_decode('Observaciones Técnico: '));
        $this->Ln(51);
        $this->SetFont('Arial','B',13);
        $this->Ln(-45);
        $this->SetFont('Arial','',11);
        $this->MultiCell(213,5,utf8_decode($obsert));
   }

}

$pdf=new PDF();
$id = $_REQUEST["id"];
$idc = $_REQUEST["idc"];
$tecni = $_REQUEST["tecni"];
$detalle = $_REQUEST["detalle"];
$pdf->SetTitle(utf8_decode($detalle.' '.$id));
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
$conexion_aparte = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion_aparte,"utf8");
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}
$consulta_aparte = $conexion_aparte->query("Call Buscar_Clientes_Id_Calendario ('$idc')");
$nombre_cliente = "";
$tipo = utf8_decode($detalle);
if($row_aparte = $consulta_aparte->fetch_assoc()){
    $nombre_cliente = utf8_decode($row_aparte["Nombre"]);
}

$consulta_aparte->close();
$conexion_aparte->more_results();
$conexionxxxx = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$consultaxxxx = $conexionxxxx->query("Call Buscar_Empresa_Rectificacion ('$id')");
$n_descarga_emp= "";
if($rowxxxx = $consultaxxxx->fetch_assoc()){
    $n_descarga_emp = utf8_encode($rowxxxx["Empresa"]);
}
$consultaxxxx->close();
$conexionxxxx->more_results();
$n_descarga_emp = str_replace('amp;', '', $n_descarga_emp);
$pdf->Output($id." ".$nombre_cliente." - ".$tipo." (".$tecni." - ".$n_descarga_emp.").pdf",$modo);
?>
