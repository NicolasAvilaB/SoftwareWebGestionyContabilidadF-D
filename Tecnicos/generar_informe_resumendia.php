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
            $nombre = $_REQUEST["nombre"];
            $this->SetFont('Arial','',12);
            $this->Cell(60,5,utf8_decode('Fecha:  '.strftime("%A, %d de %B del %Y", strtotime($fecha)).'.-'));
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
        $this->Ln(-43);
        $conexion2 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
        mysqli_set_charset($conexion2,"utf8");
        if(mysqli_connect_errno()){
            echo mysqli_connect_error();
        }
        $fecha = $_REQUEST["fecha"];
        $nombre = $_REQUEST["nombre"];
        $suma = 0;
        $sumaca =0;
        $sumaca2 =0;
        $suma_subrep = 0;
        //otros
        $subconsulta_restificar = mysqli_query($conexion2, "Call Consultar_FechaInstalacion_Inicio_Calendario_ResumenDia_Inst('$fecha','$nombre')");
        if (mysqli_num_rows($subconsulta_restificar) > 0){
          $this->SetFont('Arial','B',10);
            $this->Ln(2);
            $this->Cell(-5);
            $this->Cell(20,7,'Horario',1);
            $this->Cell(22,7,'Tipo',1);
            $this->Cell(19,7,utf8_decode('N° Orden'),1);
            $this->Cell(28,7,'Cliente',1);
            $this->Cell(35,7,utf8_decode('Dirección'),1);
            $this->Cell(25,7,'Comuna',1);
            $this->Cell(20,7,utf8_decode('Teléfono'),1);
            $this->Cell(28,7,utf8_decode('Descripción'),1);
            $this->Cell(30,7,'Observ. Cl.',1);
            $this->Cell(30,7,'Observ. Tec.',1);
            $this->Cell(28,7,'Vendedora',1);
            $this->Ln();
        }
        while($restificar = mysqli_fetch_array($subconsulta_restificar)){
          $this->SetFont('Arial','I',10);
          $hor = $restificar[17];
          $tip = $restificar[7];
          $norden = $restificar[0];
          $cli = $restificar[8];
          $dir = $restificar[9];
          $com = $restificar[10];
          $tel = $restificar[11];
          $descr = $restificar[1];
          $obscl = $restificar[12];
          $obstec = $restificar[15];
          $vend = $restificar[16];
          $this->Cell(-5);
          $this->MultiCell(20,7,utf8_decode($hor),1);
          $this->Ln(-7);
          $this->Cell(15);
          $this->MultiCell(22,7,utf8_decode($tip),1);
          $this->Ln(-7);
          $this->Cell(37);
          $this->MultiCell(19,7,utf8_decode($norden),1);
          $this->Ln(-7);
          $this->Cell(56);
          $this->MultiCell(28,7,utf8_decode($cli),1);
          $this->Ln(-7);
          $this->Cell(84);
          $this->MultiCell(35,7,utf8_decode($dir),1);
          $this->Ln(-7);
          $this->Cell(119);
          $this->MultiCell(25,7,utf8_decode($com),1);
          $this->Ln(-7);
          $this->Cell(144);
          $this->MultiCell(20,7,utf8_decode($tel),1);
          $this->Ln(-7);
          $this->Cell(164);
          $this->MultiCell(28,7,utf8_decode($descr),1);
          $this->Ln(-7);
          $this->Cell(192);
          $this->MultiCell(30,7,utf8_decode($obscl),1);
          $this->Ln(-7);
          $this->Cell(222);
          $this->MultiCell(30,7,utf8_decode($obstec),1);
          $this->Ln(-7);
          $this->Cell(252);
          $this->MultiCell(28,7,utf8_decode($vend),1);
          $this->Ln();
        }
   }
}

$pdf=new PDF();
$id = $_REQUEST["id"];
$idc = $_REQUEST["idc"];
$tecni = $_REQUEST["tecni"];
$pdf->SetTitle(utf8_decode('Restificación '.$id));
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
$tipo = utf8_decode("Rectificación");
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
