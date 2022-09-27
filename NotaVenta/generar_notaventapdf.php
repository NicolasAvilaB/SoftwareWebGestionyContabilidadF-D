<?php
require('./fpdf/fpdf.php');
$id = 0;
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
            $consulta2 = $conexion2->query("Call Buscar_NotaVenta_Fecha_Ingreso ('$id')");
            if($row = $consulta2->fetch_assoc()){
                $fecha_ingreso = utf8_decode($row["FechaIngreso"]);
                $nombre_empresa = utf8_encode($row["Empresa"]);
                $telefonos = utf8_decode($row["Telefono"]);
                $correo_emp = utf8_decode($row["Correo"]);
                $paginaweb_emp = utf8_decode($row["PaginaWeb"]);
                $rut = utf8_decode($row["Rut"]);
            }
        //Salto de línea
            $this->Ln(-5);
            $this->SetFont('Arial', 'B', 16);
            $this->Cell(2);
            $nombre_empresa = str_replace('amp;', '', $nombre_empresa);
            $this->Cell(65,-4,utf8_decode($nombre_empresa).".-",0,0,'C');
            $this->Cell(52);
            $this->Cell(65,24,"  R.U.T.:  ".$rut,1);
            $this->Ln(6);
            $this->SetFont('Arial','',11);
            $this->Cell(-1);
            $this->Cell(65,-4,"COMPRA Y VENTA DE PERSIANAS");
            $this->Ln(4);
            $this->SetFont('Arial','',11);
            $this->Cell(7);
            $this->Cell(65,-3,"EXTERIORES DE ALUMINIO");
            $this->Ln(5);
            $this->SetFont('Arial','',11);
            $this->Cell(1);
            $this->Cell(65,-4,"Fono: ".$telefonos,0,0,'C');
            $this->Ln(5);
            $this->SetFont('Arial','',11);
            $this->Cell(1);
            $this->Cell(65,-5,$correo_emp,0,0,'C');
            $this->Ln(5);
            $this->SetFont('Arial','',11);
            $this->Cell(1);
            $this->Cell(65,-6,$paginaweb_emp,0,0,'C');
            $this->Ln(-3);
            $this->Cell(78);
            $this->SetFont('Arial','B',11);
            $this->Cell(60,5,'NOTA DE VENTA');
            $this->Ln(8);
            $this->SetFont('Arial','',12);
            $this->Cell(-1);
            $this->Cell(60,5,utf8_decode('Fecha:  '.strftime("%A, %d de %B del %Y", strtotime($fecha_ingreso)).'.-'));
            $this->Cell(90);
            $this->SetFont('Arial','b',12);
            $this->Cell(60,5,'ORDEN: '.$id.'.-');

       }
   }

   function Cliente()
   {
       $this->SetFont('Arial','',11);
        $idc = $_REQUEST["idc"];
        $id = $_REQUEST["id"];
        $conexion = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
        mysqli_set_charset($conexion,"utf8");
        if(mysqli_connect_errno()){
            echo mysqli_connect_error();
        }
        $consulta = $conexion->query("Call Buscar_Cliente_NotaVenta ('$idc','$id')");
        $se= utf8_decode("Señor (a): ");
        $nombre = "";
        $telefono = "";
        $email = "";
        $direccion = "";
        $comuna = "";
        $mediopago = "";
        if($row = $consulta->fetch_assoc()){
            $nombre = utf8_decode($row["Nombre"]);
            $telefono = utf8_decode($row["Telefono"]);
            $email = utf8_decode($row["Email"]);
            $direccion = utf8_decode($row["Direccion"]);
            $comuna = utf8_decode($row["Comuna"]);
            $mediopago = utf8_decode($row["MedioPago"]);
        }
        $consulta->close();
        $conexion->more_results();
        $this->Ln(-19);
        $this->Cell(-5);
        $this->Cell(143,5,$se.$nombre,1);
        $this->Cell(56,5,"R.U.T.:",1);
        $this->Ln(5);
        $this->Cell(-5);
        $this->MultiCell(140,5,utf8_decode('Dirección: '.$direccion),1);
        $this->Ln(-5);
        $this->Cell(135);
        $this->Cell(59,5,'Comuna: '.$comuna,1);
        $this->Ln(5);
        $this->Cell(-5);
        $this->Cell(90,5,'Giro: ',1);
        $this->Cell(109,5,'Fono: '.$telefono,1);
        $this->Ln(5);
        $this->Cell(-5);
        $this->Cell(90,5,'Cond. Venta: '.$mediopago,1);
        $this->Cell(109,5,utf8_decode('O / C N°: '),1);
        $this->Ln(5);
        $this->Cell(-5);
        $this->Cell(199,5,'Email: '.$email,1);
        $this->Ln(7);
        $this->Cell(-6);
        $this->SetFont('Arial','b',11);
        $this->Cell(60,4,'Por la presente, me es muy grato hacerle llegar esta Nota Venta.-');
        $this->Ln(13);
        $nombre_cliente = $nombre;
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
        $this->Ln(-9);
        $conexion2 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
        $conexion3 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
        mysqli_set_charset($conexion2,"utf8");
        if(mysqli_connect_errno()){
            echo mysqli_connect_error();
        }
        $id = $_REQUEST["id"];
        $suma = 0;
        $sumaca =0;
        $sumaca2 =0;
        $suma_subrep = 0;
        $consulta2 = mysqli_query($conexion2, "select Cantidad, Ancho, Alto, IdMotor, IdColor, ValorUn, ValorTotal, FinalCrece, IdLama from DetalleNotaVenta where IdNotaVenta = '$id'");
        $consulta0 = mysqli_query($conexion2, "select IdRoller, IdRepuesto from TotalCotizaciones where IdCotizacion = '$id'");
        $id_roller = "";
        $id_repuesto = "";
        $id_otros = "";
        if($fila_ids = mysqli_fetch_array($consulta0)){
            $id_roller = $fila_ids[0];
            $id_repuesto = $fila_ids[1];
        }
        $consultaotros = mysqli_query($conexion2, "select IdOtros from DetalleOtros where IdPersiana = '$id'");
        $consultaotros_roller = mysqli_query($conexion2, "select IdOtros from DetalleOtros where IdRoller = '$id_roller'");
        $consultaotros_repuesto = mysqli_query($conexion2, "select IdOtros from DetalleOtros where IdRepuestos = '$id_repuesto'");
        if($rowotro = mysqli_fetch_array($consultaotros)){
            $id_otros = $rowotro[0];
        }
        if($rowotro_ro = mysqli_fetch_array($consultaotros_roller)){
            $id_otros = $rowotro_ro[0];
        }
        if($rowotro_re = mysqli_fetch_array($consultaotros_repuesto)){
            $id_otros = $rowotro_re[0];
        }

        if (mysqli_num_rows($consulta2) > 0){
            $this->Cell(-9);
            $this->Cell(60,10,'Persianas');
            $this->Ln(8);
            $this->Cell(-8);
            $this->Cell(6,7,'FC',1);
            $this->Cell(10,7,'Cant',1);
            $this->Cell(13,7,'Ancho',1);
            $this->Cell(13,7,'Alto',1);
            $this->Cell(55,7,'Accionamiento',1);
            $this->Cell(16,7,'Lama',1);
            $this->Cell(36,7,'Color',1);
            $this->Cell(28,7,'Valor Unid.',1);
            $this->Cell(28,7,'Total',1);
            $this->Ln();
        }
        while($row2 = mysqli_fetch_array($consulta2)){
            $cantidad = $row2[0];
            $ancho = $row2[1];
            $alto = $row2[2];
            $nmotor = utf8_decode($row2[3]);
            $ncolor = utf8_decode($row2[4]);
            $idlama = $row2[8];
            $nombre_motor = "";
            $nombre_color = "";
            $nombre_lama = "";
            $consulta0 = mysqli_query($conexion2, "select NombreMotor from Motor where Id = '$nmotor'");
            if ($row_nombremotor= mysqli_fetch_array($consulta0)){
                $nombre_motor = $row_nombremotor[0];
            }
            $consulta00 = mysqli_query($conexion2, "select NombreColor from Color where Id = '$ncolor'");
            if ($row_nombrecolor= mysqli_fetch_array($consulta00)){
                $nombre_color = $row_nombrecolor[0];
            }
            $consulta00 = mysqli_query($conexion2, "select NombreLama from Lama where Id = '$idlama'");
            if ($row_nombrelama= mysqli_fetch_array($consulta00)){
                $nombre_lama = $row_nombrelama[0];
            }

            $vun = $row2[5];
            $vt = $row2[6];
            $fc = $row2[7];
            if($fc == '1'){
                $fc = 'C';
            }elseif ($fc == '0') {
                $fc = 'F';
            }
            $this->Cell(-8);
            $this->Cell(6,7,$fc,1);
            $this->Cell(10,7,$cantidad,1);
            $this->Cell(13,7,$ancho,1);
            $this->Cell(13,7,$alto,1);
            $this->Cell(55,7,utf8_decode($nombre_motor),1);
            $this->Cell(16,7,utf8_decode($nombre_lama),1);
            $this->Cell(36,7,utf8_decode($nombre_color),1);
            $this->Cell(28,7,"$ ".number_format($vun, 0, ',', '.'),1);
            $this->Cell(28,7,"$ ".number_format($vt, 0, ',', '.'),1);
            $this->Ln();
            $ganancia = intval($cantidad);
		    $sumaca += $ganancia;
		    $row2++;
        }
        $subconsulta_persiana = mysqli_query($conexion2, "select Subtotal, Descuento, Instalacion from TotalNotaVenta where Id = '$id'");
        if($fila_subconsulta_persiana = mysqli_fetch_array($subconsulta_persiana)){
            $this->Cell(141);
            $this->Cell(28,7,"Subtotal: ",1);
            $this->Cell(28,7,"$ ".number_format($fila_subconsulta_persiana[0], 0, ',', '.'),1);
            $this->Ln();
            $this->Cell(141);
            $this->Cell(28,7,"Descuento: ".$fila_subconsulta_persiana[1]."%",1);
            $operacion_desc = intval($fila_subconsulta_persiana[0]) * intval($fila_subconsulta_persiana[1])/100;
            $this->Cell(28,7,"$ ".number_format($operacion_desc, 0, ',', '.'),1);
            $this->Ln();
            $this->Cell(141);
            $this->Cell(28,7,"Instalacion: ".$sumaca,1);
            $this->Cell(28,7,"$ ".number_format($fila_subconsulta_persiana[2], 0, ',', '.'),1);
            $this->Ln();
            $operacion = intval($fila_subconsulta_persiana[0]) - intval($fila_subconsulta_persiana[0]) * intval($fila_subconsulta_persiana[1]) / 100 + intval($fila_subconsulta_persiana[2]);
            $this->Cell(141);
            $this->Cell(28,7,"Saldo: ",1);
            $this->Cell(28,7,"$ ".number_format($operacion, 0, ',', '.'),1);
            $this->Ln();
        }
        //consulta_roller
        $subconsulta_roller = mysqli_query($conexion2, "select Cantidad, Ancho, Alto, IdAccionamiento, Color, IdRoller, ValorUnitario, ValorTotal, FinalCrece from DetalleNotaVentaRollers where IdTotalRollers = '$id'");
        if (mysqli_num_rows($subconsulta_roller) > 0){
            $this->Cell(-7);
            $this->Cell(60,10,'Rollers');
            $this->Ln(8);
            $this->Cell(-7);
            $this->Cell(6,7,'FC',1);
            $this->Cell(10,7,'Cant',1);
            $this->Cell(13,7,'Ancho',1);
            $this->Cell(10,7,'Alto',1);
            $this->Cell(30,7,'Accionamiento',1);
            $this->Cell(22,7,'Color',1);
            $this->Cell(64,7,'Roller',1);
            $this->Cell(25,7,'Valor Unid.',1);
            $this->Cell(25,7,'Total',1);
            $this->Ln();
        }
        while($row_subroller = mysqli_fetch_array($subconsulta_roller)){
            $cantidad = $row_subroller[0];
            $ancho = $row_subroller[1];
            $alto = $row_subroller[2];
            $nmotor = utf8_decode($row_subroller[3]);
            $acc = utf8_decode($row_subroller[5]);
            $nombre_motor = "";
            $nombre_cortina = "";
            $consulta0000 = mysqli_query($conexion2, "select NombreMotor from Motor_Roller where Id = '$nmotor'");
            if($row_motor_roller = mysqli_fetch_array($consulta0000)){
                $nombre_motor = $row_motor_roller[0];
            }
            $consulta00000 = mysqli_query($conexion2, "select NombreRoller from Rollers where Id = '$acc'");
            if($row_motor_roller2 = mysqli_fetch_array($consulta00000)){
                $nombre_cortina = $row_motor_roller2[0];
            }
            $ncolor = utf8_decode($row_subroller[4]);
            $vun = $row_subroller[6];
            $vt = $row_subroller[7];
            $fc = $row_subroller[8];
            if($fc == '1'){
                $fc = 'C';
            }elseif($fc == '0'){
                $fc = 'F';
            }

            $this->Cell(-7);
            $this->Cell(6,7,$fc,1);
            $this->Cell(10,7,$cantidad,1);
            $this->Cell(13,7,$ancho,1);
            $this->Cell(10,7,$alto,1);
            $this->Cell(30,7,utf8_decode($nombre_motor),1);
            $this->Cell(22,7,$ncolor,1);
            $this->Cell(64,7,utf8_decode($nombre_cortina),1);
            $this->Cell(25,7,"$ ".number_format($vun, 0, ',', '.'),1);
            $this->Cell(25,7,"$ ".number_format($vt, 0, ',', '.'),1);
            $this->Ln();
            $ganancia = intval($cantidad);
		    $sumaca2 += $ganancia;
		    $row_subroller++;
        }
        $subconsulta_roller = mysqli_query($conexion2, "select Subtotal, Descuento, Instalacion from TotalNotaVentaRollers where Id = '$id'");
        if($fila_subconsulta_roller = mysqli_fetch_array($subconsulta_roller)){
            $this->Cell(142);
            $this->Cell(28,7,"Subtotal: ",1);
            $this->Cell(28,7,"$ ".number_format($fila_subconsulta_roller[0], 0, ',', '.'),1);
            $this->Ln();
            $this->Cell(142);
            $this->Cell(28,7,"Descuento: ".$fila_subconsulta_roller[1]."%",1);
            $operacion_desc = intval($fila_subconsulta_roller[0]) * intval($fila_subconsulta_roller[1])/100;
            $this->Cell(28,7,"$ ".number_format($operacion_desc, 0, ',', '.'),1);
            $this->Ln();
            $this->Cell(142);
            $this->Cell(28,7,"Instalacion: ".$sumaca2,1);
            $this->Cell(28,7,"$ ".number_format($fila_subconsulta_roller[2], 0, ',', '.'),1);
            $this->Ln();
            $operacion = intval($fila_subconsulta_roller[0]) - intval($fila_subconsulta_roller[0]) * intval($fila_subconsulta_roller[1]) / 100 + intval($fila_subconsulta_roller[2]);
            $this->Cell(142);
            $this->Cell(28,7,"Saldo: ",1);
            $this->Cell(28,7,"$ ".number_format($operacion, 0, ',', '.'),1);
            $this->Ln();
        }
        //repuestos
        $subconsulta_repuesto = mysqli_query($conexion2, "select Cantidad, IdRepuesto, ValorUnitario, ValorTotal from DetalleNotaVentaRepuestos where IdNotaVenta = '$id'");
        if (mysqli_num_rows($subconsulta_repuesto) > 0){
            $this->Cell(-6);
            $this->Cell(60,10,'Repuestos');
            $this->Ln(8);
            $this->Cell(-5);
            $this->Cell(10,7,'Cant',1);
            $this->Cell(133,7,'Repuesto',1);
            $this->Cell(28,7,'Valor Unid.',1);
            $this->Cell(28,7,'Total',1);
            $this->Ln();
            while($row_subrepuesto = mysqli_fetch_array($subconsulta_repuesto)){
                $cantidad = $row_subrepuesto[0];
                $rep = $row_subrepuesto[1];
                $nombre_repuesto = "";
                $consulta000 = mysqli_query($conexion2, "select NombreRepuesto from Repuestos where Id = '$rep'");
                if($row_repuesto = mysqli_fetch_array($consulta000)){
                    $nombre_repuesto = $row_repuesto[0];
                }
                $vun = $row_subrepuesto[2];
                $vt = $row_subrepuesto[3];
                $this->Cell(-5);
                $this->Cell(10,7,$cantidad,1);
                $this->Cell(133,7,utf8_decode($nombre_repuesto),1);
                $this->Cell(28,7,"$ ".number_format($vun, 0, ',', '.'),1);
                $this->Cell(28,7,"$ ".number_format($vt, 0, ',', '.'),1);
                $this->Ln();
                $ganancia = intval($vt);
    		    $suma_subrep += $ganancia;
    		    $row_subrepuesto++;
            }
            $this->Cell(138);
            $this->Cell(28,7,"Subtotal: ",1);
            $this->Cell(28,7,"$ ".number_format($suma_subrep, 0, ',', '.'),1);
            $this->Ln();
        }
        /*$subconsulta_repuesto = mysqli_query($conexion2, "select Subtotal from TotalNotaVentaRepuestos where Id = '$id'");
        if($fila_subconsulta_repuesto = mysqli_fetch_array($subconsulta_repuesto)){*/
        //}
        //otros
        $subconsulta_otros = mysqli_query($conexion2, "select Cantidad, IdOtros, ValorUnitario, ValorTotal from DetalleNotaVentaOtros where IdNotaVenta= '$id'");
        if (mysqli_num_rows($subconsulta_otros) > 0){
            $this->Cell(-6);
            $this->Cell(60,10,'Otros');
            $this->Ln(8);
            $this->Cell(-5);
            $this->Cell(10,7,'Cant',1);
            $this->Cell(133,7,'Detalle',1);
            $this->Cell(28,7,'Valor Unid.',1);
            $this->Cell(28,7,'Total',1);
            $this->Ln();
        }
        while($row_subotros = mysqli_fetch_array($subconsulta_otros)){
            $cantidad = $row_subotros[0];
            $rep = $row_subotros[1];
            $nombre_repuesto = "";
            $consulta000 = mysqli_query($conexion2, "select NombreOtros from Otros where Id = '$rep'");
            if($row_repuesto = mysqli_fetch_array($consulta000)){
                $nombre_repuesto = $row_repuesto[0];
            }
            $vun = $row_subotros[2];
            $vt = $row_subotros[3];
            $this->Cell(-5);
            $this->Cell(10,7,$cantidad,1);
            $this->Cell(133,7,utf8_decode($nombre_repuesto),1);
            $this->Cell(28,7,"$ ".number_format($vun, 0, ',', '.'),1);
            $this->Cell(28,7,"$ ".number_format($vt, 0, ',', '.'),1);
            $this->Ln();
            $ganancia = intval($row_subotros[3]);
		    $suma += $ganancia;
		    $row_subotros++;
        }
        if (mysqli_num_rows($subconsulta_otros) > 0){
            $this->Cell(138);
            $this->Cell(28,7,"Subtotal: ",1);
            $this->Cell(28,7,"$ ".number_format($suma, 0, ',', '.'),1);
            $this->Ln();
        }

        //Título
        $this->SetFont('Arial','I',11);
        $this->Cell(-4);
        $this->Cell(60,5,'VALORES NETOS MAS I.V.A.');
        $this->Cell(-7);
        $this->SetFont('Arial','B',11);
        $this->Cell(60,5,utf8_decode('GARANTÍA 5 AÑOS.-'));
        $this->SetFont('Arial','',10);
        $subconsulta_totalcompleto = mysqli_query($conexion2, "Call Reporte_NotaVenta_Totales('$id')")or die (mysqli_error($conexion2));
        if($fila_totalcompleto = mysqli_fetch_array($subconsulta_totalcompleto)){
            $this->Ln();
            if (intval($fila_totalcompleto[2]) != 0){
                $porc = intval($fila_totalcompleto[3])*100/intval($fila_totalcompleto[2]);
            }else{
                $porc = 0;
            }
            $this->Cell(131);
            $this->Cell(35,7,"Neto: ",1);
            $this->Cell(28,7,"$ ".number_format($fila_totalcompleto[0], 0, ',', '.'),1);
            $this->Ln();
            $this->Cell(131);
            $this->Cell(35,7,"Iva: ",1);
            $this->Cell(28,7,"$ ".number_format($fila_totalcompleto[1], 0, ',', '.'),1);
            $this->Ln();
            $this->Cell(131);
            $this->Cell(35,7,"Total Inicial: ",1);
            $this->Cell(28,7,"$ ".number_format($fila_totalcompleto[2], 0, ',', '.'),1);
            $this->Ln();
            $this->Cell(131);
            $this->Cell(35,7,"Desc. Adicional: ".round($porc)."%",1);
            $this->Cell(28,7,"$ ".number_format($fila_totalcompleto[3], 0, ',', '.'),1);
            $this->Ln();
            $subconsulta_descb2 = mysqli_query($conexion3, "Call Consultar_DescuentoB_NotaVenta('$id')");
            $cantidad_desc2 = 0;
            if (mysqli_num_rows($subconsulta_descb2) > 0){
                $this->Cell(138);
                $this->Cell(28,7,"Desc B: ",1);
                if($row_subdescb2 = mysqli_fetch_array($subconsulta_descb2)){
                    $cantidad_desc2 = $row_subdescb2[0];
                    $this->Cell(28,7,"$ ".number_format($cantidad_desc2, 0, ',', '.'),1);
                }
                $this->Ln();
            }
            $this->Cell(138);
            $this->Cell(28,7,"Total: ",1);
            $this->Cell(28,7,"$ ".number_format(intval($fila_totalcompleto[4]) - intval($cantidad_desc2), 0, ',', '.'),1);
        }
        $consulta2->close();
        $conexion2->more_results();
        $this->Ln(-28);
        $this->SetFont('Arial','',8);
        $this->Cell(-5);
        $this->Cell(125,72,'',1);
        $this->Ln(52);
        $this->Cell(-2);
        $this->SetFont('Arial','B',8);
        $this->Cell(60,15,'____________________________________                          _______________________');
        $this->Ln(5);
        $this->SetFont('Arial','',9);
        $this->Cell(-2);
        $this->Cell(60,15,'NOMBRE Y FIRMA REPRESENTANTE');
        $this->Cell(23);
        $this->Cell(60,15,'FIRMA CLIENTE');
        $this->Cell(-2);
        $this->SetFont('Arial','',12);
        $this->Ln(-53);
        $conexionvendedora = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
        mysqli_set_charset($conexionvendedora,"utf8");
        if(mysqli_connect_errno()){
            echo mysqli_connect_error();
        }
        $consultavendedora = $conexionvendedora->query("Call Consultar_Nombre_Vendedora_NotaVenta ('$id')");
        $vendedora = "";
        $observaciones = "";
        $observacionesad = "";
        if($rowven = $consultavendedora->fetch_assoc()){
            $vendedora = utf8_decode($rowven["Vendedora"]);
            $observaciones = utf8_decode($rowven["Observaciones"]);
            $observacionesad = utf8_decode($rowven["ObservacionesAd"]);
            if ($observaciones == null || $observaciones == ""){
                $observaciones = "";
            }
            if ($observacionesad == null || $observacionesad == ""){
                $observacionesad = "";
            }
        }
        $consultavendedora->close();
        $conexionvendedora->more_results();
        $this->Cell(60,5,'Observaciones: ');
        $this->Ln(51);
        $this->SetFont('Arial','B',13);
        $this->Cell(5);
        $this->Cell(60,5,$vendedora);
        $this->Ln(-45);
        $this->SetFont('Arial','',11);
        $this->MultiCell(113,5,$observaciones." ".$observacionesad);
   }

}

$pdf=new PDF();
$id = $_REQUEST["id"];
$idc = $_REQUEST["idc"];
$pdf->SetTitle(utf8_decode('Nota Venta '.$id));
//Títulos de las columnas
//$header=array('Cant','Ancho','Alto','Accionamiento','Color','Valor Unid.','Total');
$pdf->AliasNbPages();
//Primera página
$pdf->AddPage();
$pdf->SetY(65);
//$pdf->AddPage();
$pdf->Cliente();
$pdf->TablaSimple();
//Segunda página
$modo="I";
$conexion_aparte = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion2_aparte = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion_aparte,"utf8");
mysqli_set_charset($conexion2_aparte,"utf8");
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}
$consulta_aparte = $conexion_aparte->query("Call Buscar_Cliente_NotaVenta ('$idc','$id')");
$consulta2_aparte = $conexion2_aparte->query("Call Buscar_NotaVenta_Fecha_Ingreso ('$id')");
$nombre_cliente = "";
$empresa = "";
if($row_aparte = $consulta_aparte->fetch_assoc()){
    $nombre_cliente = utf8_decode($row_aparte["Nombre"]);
}
if($row_aparte2 = $consulta2_aparte->fetch_assoc()){
    $empresa = utf8_decode($row_aparte2["Empresa"]);
}
$consulta_aparte->close();
$conexion_aparte->more_results();
$consulta2_aparte->close();
$conexion2_aparte->more_results();
$pdf->Output($id." ".$nombre_cliente." - Nota de Venta (".$empresa.").pdf",$modo);
?>
