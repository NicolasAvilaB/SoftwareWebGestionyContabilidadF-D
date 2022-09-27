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
            $id = $_REQUEST["id"];
            $tecni = $_REQUEST["tecni"];
            $conexion2 = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
        //Logo
        //Arial bold 15
            $this->SetFont('Arial','',12);
            //Movernos a la derecha
            $this->Cell(150);
            //Título
            $this->Ln(5);
            $this->Cell(102);
            $nombre_empresa = "";
            $telefonos = "";
            $correo_emp = "";
            $paginaweb_emp = "";
            $rut = "";
            $consulta2 = $conexion2->query("Call Buscar_Fecha_Restificacion_Calendario_Etiquetas_Restificacion ('$id')");
            if($row = $consulta2->fetch_assoc()){
                $fecha_ingreso = utf8_decode($row["start"]);
            }
            $idc = $_REQUEST["idc"];
            $id = $_REQUEST["id"];
            $conexion = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
            mysqli_set_charset($conexion,"utf8");
            if(mysqli_connect_errno()){
                echo mysqli_connect_error();
            }
            $consulta = $conexion->query("Call Buscar_Clientes_Id_Calendario ('$idc')");
            $se= utf8_decode("Señor (a): ");

            if($row = $consulta->fetch_assoc()){
                $nombre = utf8_decode($row["Nombre"]);
                $telefono = utf8_decode($row["Telefono"]);
                $email = utf8_decode($row["Email"]);
                $direccion = $row["Direccion"];
                $comuna = utf8_decode($row["Comuna"]);
            }
            $consulta->close();
            $conexion->more_results();
            $nombre_cliente = $nombre;
        //Salto de línea
            $this->Ln(-5);
            $this->Ln(-3);
            $this->Cell(108);
            $this->SetFont('Arial','B',11);
            $this->Cell(60,5,utf8_decode('RECTIFICACIÓN'));
            $this->Ln(8);
            $this->SetFont('Arial','',12);
            $this->Cell(-1);
            $this->Cell(60,5,'Cliente: '.$nombre.'.-');
            $this->Ln(5);
            $this->Cell(-1);
            $this->Cell(60,5,utf8_decode('Dirección: '.$direccion.'.-'));
            $this->Ln(5);
            $this->Cell(-1);
            $this->Cell(60,5,'Comuna: '.$comuna.'.-');
            $this->Ln(5);
            $this->Cell(-1);
            $this->Cell(60,5,utf8_decode('Teléfono: ').$telefono.'.-');
            $this->Ln(5);
            $this->Cell(-1);
            $this->Cell(60,5,utf8_decode('Fecha:  '.strftime("%A, %d de %B del %Y", strtotime($fecha_ingreso)).'.-'));
            $this->SetFont('Arial','b',12);
            $this->Cell(180);
            $this->Cell(60,5,$tecni.'.-');
            $conexion2 = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
            $nombre_empresa = "";
            $telefonos = "";
            $correo_emp = "";
            $paginaweb_emp = "";
            $rut = "";
            $consulta2 = $conexion2->query("Call Buscar_Empresa_Rectificacion ('$id')");
            if($row = $consulta2->fetch_assoc()){
                $fecha_ingreso = utf8_decode($row["FechaIngreso"]);
                $nombre_empresa = utf8_encode($row["Empresa"]);
                $telefonos = utf8_decode($row["Telefono"]);
                $correo_emp = utf8_decode($row["Correo"]);
                $paginaweb_emp = utf8_decode($row["PaginaWeb"]);
                $rut = utf8_decode($row["Rut"]);
            }
        //Salto de línea
            $this->Ln(-20);
            $this->SetFont('Arial', 'B', 16);
            $this->Cell(162);
            $nombre_empresa = str_replace('amp;', '', $nombre_empresa);
            $this->Cell(65,-4,utf8_decode($nombre_empresa).".-",0,0,'C');
            $this->Cell(92);
            $this->Cell(65,24,"  R.U.T.:  ".$rut,1);
            $this->Ln(6);
            $this->SetFont('Arial','',11);
            $this->Cell(160);
            $this->Cell(65,-4,"COMPRA Y VENTA DE PERSIANAS");
            $this->Ln(4);
            $this->SetFont('Arial','',11);
            $this->Cell(167);
            $this->Cell(65,-3,"EXTERIORES DE ALUMINIO");
            $this->Ln(5);
            $this->SetFont('Arial','',11);
            $this->Cell(160);
            $this->Cell(65,-4,"Fono: ".$telefonos,0,0,'C');
            $this->Ln(5);
            $this->SetFont('Arial','',11);
            $this->Cell(161);
            $this->Cell(65,-5,$correo_emp,0,0,'C');
            $this->Ln(5);
            $this->SetFont('Arial','',11);
            $this->Cell(161);
            $this->Cell(65,-6,$paginaweb_emp,0,0,'C');
            $this->Ln(-3);
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
        $this->Ln(-23);
        $conexion2 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
        mysqli_set_charset($conexion2,"utf8");
        if(mysqli_connect_errno()){
            echo mysqli_connect_error();
        }
        $id = $_REQUEST["id"];
        $suma = 0;
        $sumaca =0;
        $sumaca2 =0;
        $suma_subrep = 0;
        //otros
        $subconsulta_restificar = mysqli_query($conexion2, "Call Buscar_Datos_Restificacion_Calendario('$id')");
        if (mysqli_num_rows($subconsulta_restificar) > 0){
            $this->SetFont('Arial','B',10);
            $this->Ln(2);
            $this->Cell(-5);
            $this->Cell(8,7,utf8_decode('N°'),1);
            $this->Cell(50,7,utf8_decode('Ubicación'),1);
            $this->Cell(9,7,'Piso',1);
            $this->Cell(8,7,'F/C',1);
            $this->Cell(14,7,'Ancho',1);
            $this->Cell(14,7,'Alto',1);
            $this->Cell(24,7,'Color',1);
            $this->Cell(24,7,'Lama',1);
            $this->Cell(28,7,'Accionamiento',1);
            $this->Cell(14,7,'T/Click',1);
            $this->Cell(14,7,utf8_decode('Cajón'),1);
            $this->Cell(14,7,utf8_decode('Guía'),1);
            $this->Cell(24,7,'Ventana',1);
            $this->Cell(16,7,'Perfiles',1);
            $this->Cell(24,7,'Escala Telec',1);
            $this->Ln();
        }
        while($restificar = mysqli_fetch_array($subconsulta_restificar)){
          $this->SetFont('Arial','I',10);
          $n = $restificar[0];
          $ubic = $restificar[1];
          $piso = $restificar[2];
          $fc = $restificar[3];
          $anch = $restificar[4];
          $alt = $restificar[5];
          $mot = $restificar[6];
          $man = $restificar[7];
          $tclick = $restificar[8];
          $crto = $restificar[9];
          $cajon = $restificar[10];
          $guia = $restificar[11];
          $vent = $restificar[12];
          $perf = $restificar[13];
          $esctele = $restificar[14];
          $lama = $restificar[15];
          $color = $restificar[16];
          $this->Cell(-5);
          $this->Cell(8,7,$n,1);
          $this->Cell(50,7,utf8_decode($ubic),1);
          $this->Cell(9,7,$piso,1);
          $this->Cell(8,7,$fc,1);
          $this->Cell(14,7,$anch,1);
          $this->Cell(14,7,$alt,1);
          $this->Cell(24,7,$color,1);
          $this->Cell(24,7,$lama,1);
          $this->Cell(28,7,$mot,1);
          $this->Cell(14,7,$tclick,1);
          $this->Cell(14,7,$cajon,1);
          $this->Cell(14,7,$guia,1);
          $this->Cell(24,7,$vent,1);
          $this->Cell(16,7,$perf,1);
          $this->Cell(24,7,$esctele,1);
          $this->Ln();
            $ganancia = intval($restificar[3]);
		    $suma += $ganancia;
		    $restificar++;
        }

        //Título
        $observaciones = $_REQUEST["obser"];
        $this->SetFont('Arial','I',11);
        $this->Cell(-4);
        $this->Ln(8);
        $this->SetFont('Arial','',8);
        $this->Cell(-5);
        $this->Cell(125,72,'',1);
        $this->Ln(52);
        $this->Cell(-2);
        $this->SetFont('Arial','B',8);
        $this->Ln(5);
        $this->SetFont('Arial','',9);
        $this->Cell(-2);
        $this->SetFont('Arial','',12);
        $this->Ln(-53);
        $this->Cell(60,5,utf8_decode('Observaciones Técnico: '));
        $this->Ln(51);
        $this->SetFont('Arial','B',13);
        $this->Ln(-45);
        $this->SetFont('Arial','',11);
        $this->MultiCell(113,5,$observaciones);


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
