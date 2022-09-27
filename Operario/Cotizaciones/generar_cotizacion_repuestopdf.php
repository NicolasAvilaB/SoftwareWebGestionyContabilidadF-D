<?php
require('./fpdf/fpdf.php');
$id = 0;
class PDF extends FPDF
{

//Cabecera de página
   function Header()
   {
       if ($this->PageNo() == 1){
            setlocale(LC_ALL,"es_CL.UTF-8");
            $id = $_REQUEST["id"];
            $idc = $_REQUEST["idc"];
            $conexion = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
            $conexion1 = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
            $conexion2 = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
            mysqli_set_charset($conexion,"utf8");
            mysqli_set_charset($conexion1,"utf8");
            if(mysqli_connect_errno()){
                echo mysqli_connect_error();
            }
            $consulta = $conexion->query("Call Buscar_Cliente_Cotizacion ('$idc')");
            $consulta1 = $conexion1->query("Call Buscar_Empresa_Cotizacion ('$id')");
            $consulta2 = $conexion2->query("Call Buscar_Cotizacion_FechaIngreso ('$id')");
            $nombre_empresa = "";
            $descripcion = "";
            while($row1 = $consulta1->fetch_assoc()){
                $nombre_empresa = $row1["Empresa"];
                $descripcion = utf8_decode($row1["Descripcion"]);
            }
            $this->Ln(1);
            $this->SetFont('Arial', 'B', 14);
            $this->Cell(62);
            $nombre_empresa = str_replace('amp;', '', $nombre_empresa);
            $this->Cell(65,-4,utf8_decode($nombre_empresa).".-",0,0,'C');
            $this->Ln(1);
            $this->SetFont('Arial', '', 11);
            $this->Cell(63);
            $this->Cell(65,4,$descripcion,0,0,'C');
            $this->Ln(6);
            $this->SetFont('Arial','B',12);
            //Movernos a la derecha
            //Título
            $this->Ln(3);
            $this->Cell(83);
            $this->Cell(65,4,utf8_decode("Cotización"),'C');
            $this->Cell(65,4,utf8_decode("N° ".$id.".-"),'C');
            $inicio = date("Y-m-d");
            $this->Ln(3);
            $this->Cell(115);
            $this->SetFont('Arial','',11);
            $fecha_ingreso = "";
            if($row2 = $consulta2->fetch_assoc()){
                $fecha_ingreso = $row2["FechaIngreso"];
            }
            $this->Cell(60,10,utf8_decode('Fecha: '.strftime("%A, %d de %B del %Y", strtotime($fecha_ingreso)).'.-'));
            //Salto de línea
            $this->Ln(1);
            $this->SetFont('Arial','',11);
            $se= utf8_decode("Señor (a): ");
            $nombre = "";
            $telefono = "";
            $email = "";
            $direccion = "";
            $comuna = "";
            while($row = $consulta->fetch_assoc()){
                $nombre = utf8_decode($row["Nombre"]);
                $telefono = utf8_decode($row["Telefono"]);
                $email = utf8_decode($row["Email"]);
                $direccion = utf8_decode($row["Direccion"]);
                $comuna = utf8_decode($row["Comuna"]);
            }
            $consulta->close();
            $conexion->more_results();
            $this->Cell(-7);
            $this->Cell(60,10,$se.$nombre);
            $this->Ln(5);
            $this->Cell(-7);
            $this->Cell(60,10,'Direccion: '.$direccion);
            $this->Ln(5);
            $this->Cell(-7);
            $this->Cell(60,10,'Comuna: '.$comuna);
            $this->Ln(5);
            $this->Cell(-7);
            $this->Cell(60,10,'Fono: '.$telefono);
            $this->Ln(5);
            $this->Cell(-7);
            $this->Cell(60,10,'Email: '.$email);
            $this->Ln(8);
            $this->SetFont('Arial','B',10);
            $this->Cell(-7);
            $this->Cell(60,10,utf8_decode("Por la presente, me es muy grato hacerle llegar la cotización requerida por usted.-"));
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
        $this->Ln(-6);
        $conexion2 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
        mysqli_set_charset($conexion2,"utf8");
        if(mysqli_connect_errno()){
            echo mysqli_connect_error();
        }
        $id = $_REQUEST["id"];
        $suma = 0;
        $sumaca = 0;
        $sumaca2 = 0;
        $suma_subrep = 0;
        $id_roller = "";
        $id_repuesto = "";
        $id_otros = "";
        $consulta0 = mysqli_query($conexion2, "select IdPersiana, IdRoller from TotalRepuestos where Id = '$id'");
        if($fila_ids = mysqli_fetch_array($consulta0)){
            $id_roller = $fila_ids[0];
            $id_repuesto = $fila_ids[1];
            if($id_roller == 0){
                $id_roller = -1;
            }
            if($id_repuesto == 0){
                $id_repuesto = -1;
            }
        }
        $consulta2 = mysqli_query($conexion2, "select FinalCrece, Cantidad, Ancho, Alto, IdMotor, IdColor, ValorUn, ValorTotal, IdLama from Cotizaciones where IdTotalCotizacion = '$id_roller'");
        $consultaotros = mysqli_query($conexion2, "select IdOtros from DetalleOtros where IdPersiana = '$id_roller'");
        $consultaotros_roller = mysqli_query($conexion2, "select IdOtros from DetalleOtros where IdRoller = '$id_repuesto'");
        $consultaotros_repuesto = mysqli_query($conexion2, "select IdOtros from DetalleOtros where IdRepuestos = '$id'");
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
            $this->Cell(-7);
            $this->Cell(60,10,'Persianas');
            $this->Ln(8);
            $this->Cell(-6);
            $this->Cell(7,7,'F/C',1);
            $this->Cell(9,7,'Cant',1);
            $this->Cell(12,7,'Ancho',1);
            $this->Cell(10,7,'Alto',1);
            $this->Cell(30,7,'Lama',1);
            $this->Cell(47,7,'Accionamiento',1);
            $this->Cell(36,7,'Color',1);
            $this->Cell(23,7,'Valor Unid.',1);
            $this->Cell(28,7,'Total',1);
            $this->Ln();
        }
        while($row2 = mysqli_fetch_array($consulta2)){
            $fncr = $row2[0];
            $cantidad = $row2[1];
            $ancho = $row2[2];
            $alto = $row2[3];
            $nmotor = utf8_decode($row2[4]);
            $ncolor = utf8_decode($row2[5]);
            $nlama = $row2[8];
            $nombre_motor = "";
            $nombre_color = "";
            $consulta0 = mysqli_query($conexion2, "select NombreMotor from Motor where Id = '$nmotor'");
            if ($row_nombremotor= mysqli_fetch_array($consulta0)){
                $nombre_motor = $row_nombremotor[0];
            }
            $consulta00 = mysqli_query($conexion2, "select NombreColor from Color where Id = '$ncolor'");
            if ($row_nombrecolor= mysqli_fetch_array($consulta00)){
                $nombre_color = $row_nombrecolor[0];
            }
            $consulta00000 = mysqli_query($conexion2, "select NombreLama from Lama where Id = '$nlama'");
            if ($row_nombrelama0= mysqli_fetch_array($consulta00000)){
                $nombre_lama0 = $row_nombrelama0[0];
            }
            $vun = $row2[6];
            $vt = $row2[7];
            if ($fncr == 1){
                $fncr = ' C';
            }elseif($fncr == 0){
                $fncr = ' F';
            }
            $this->Cell(-6);
            $this->Cell(7,7,$fncr,1);
            $this->Cell(9,7,$cantidad,1);
            $this->Cell(12,7,$ancho,1);
            $this->Cell(10,7,$alto,1);
            $this->Cell(30,7,$nombre_lama0,1);
            $this->Cell(47,7,utf8_decode($nombre_motor),1);
            $this->Cell(36,7,utf8_decode($nombre_color),1);
            $this->Cell(23,7,"$ ".number_format($vun, 0, ',', '.'),1);
            $this->Cell(28,7,"$ ".number_format($vt, 0, ',', '.'),1);
            $this->Ln();
            $ganancia = intval($cantidad);
		    $sumaca += $ganancia;
		    $row2++;
        }
        $subconsulta_persiana = mysqli_query($conexion2, "select Subtotal, Descuento, Instalacion from TotalCotizaciones where IdCotizacion = '$id_roller'");
        if($fila_subconsulta_persiana = mysqli_fetch_array($subconsulta_persiana)){
            $this->Cell(140);
            $this->Cell(28,7,"Subtotal: ",1);
            $this->Cell(28,7,"$ ".number_format($fila_subconsulta_persiana[0], 0, ',', '.'),1);
            $this->Ln();
            $this->Cell(140);
            $this->Cell(28,7,"Descuento: ".$fila_subconsulta_persiana[1]."%",1);
            $operacion_desc = intval($fila_subconsulta_persiana[0]) * intval($fila_subconsulta_persiana[1])/100;
            $this->Cell(28,7,"$ ".number_format($operacion_desc, 0, ',', '.'),1);
            $this->Ln();
            $this->Cell(140);
            $this->Cell(28,7,"Saldo: ",1);
            $this->Cell(28,7,"$ ".number_format(intval($fila_subconsulta_persiana[0]) - intval($operacion_desc), 0, ',', '.'),1);
            $this->Ln();
            $this->Cell(140);
            $this->Cell(28,7,"Instalacion: ".$sumaca,1);
            $this->Cell(28,7,"$ ".number_format($fila_subconsulta_persiana[2], 0, ',', '.'),1);
            $this->Ln();
            $operacion = intval($fila_subconsulta_persiana[0]) - intval($fila_subconsulta_persiana[0]) * intval($fila_subconsulta_persiana[1]) / 100 + intval($fila_subconsulta_persiana[2]);
            $this->Cell(140);
            $this->Cell(28,7,"Saldo: ",1);
            $this->Cell(28,7,"$ ".number_format($operacion, 0, ',', '.'),1);
            $this->Ln();
        }
        //consulta_roller
        $subconsulta_roller = mysqli_query($conexion2, "select FinalCrece, Cantidad, Ancho, Alto, IdAccionamiento, Color, IdRoller, ValorUnitario, ValorTotal from DetalleRollers where IdTotalRollers = '$id_repuesto'");
        if (mysqli_num_rows($subconsulta_roller) > 0){
            $this->Cell(-7);
            $this->Cell(60,10,'Roller');
            $this->Ln(8);
            $this->Cell(-6);
            $this->Cell(7,7,'F/C',1);
            $this->Cell(10,7,'Cant',1);
            $this->Cell(11,7,'Ancho',1);
            $this->Cell(10,7,'Alto',1);
            $this->Cell(27,7,'Accionamiento',1);
            $this->Cell(21,7,'Color',1);
            $this->Cell(68,7,'Roller',1);
            $this->Cell(23,7,'Valor Unid.',1);
            $this->Cell(25,7,'Total',1);
            $this->Ln();
        }
        while($row_subroller = mysqli_fetch_array($subconsulta_roller)){
            $fncr = $row_subroller[0];
            $cantidad = $row_subroller[1];
            $ancho = $row_subroller[2];
            $alto = $row_subroller[3];
            $nmotor = utf8_decode($row_subroller[4]);
            $acc = utf8_decode($row_subroller[6]);
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
            $ncolor = utf8_decode($row_subroller[5]);
            $vun = $row_subroller[7];
            $vt = $row_subroller[8];
            if ($fncr == 1){
                $fncr = ' C';
            }elseif($fncr == 0){
                $fncr = ' F';
            }
            $this->Cell(-6);
            $this->Cell(7,7,$fncr,1);
            $this->Cell(10,7,$cantidad,1);
            $this->Cell(11,7,$ancho,1);
            $this->Cell(10,7,$alto,1);
            $this->Cell(27,7,utf8_decode($nombre_motor),1);
            $this->Cell(21,7,$ncolor,1);
            $this->Cell(68,7,utf8_decode($nombre_cortina),1);
            $this->Cell(23,7,"$ ".number_format($vun, 0, ',', '.'),1);
            $this->Cell(25,7,"$ ".number_format($vt, 0, ',', '.'),1);
            $this->Ln();
            $ganancia = intval($cantidad);
		    $sumaca2 += $ganancia;
		    $row_subroller++;
        }
        $subconsulta_roller = mysqli_query($conexion2, "select Subtotal, Descuento, Instalacion from TotalRollers where Id = '$id_repuesto'");
        if($fila_subconsulta_roller = mysqli_fetch_array($subconsulta_roller)){
            $this->Cell(140);
            $this->Cell(28,7,"Subtotal: ",1);
            $this->Cell(28,7,"$ ".number_format($fila_subconsulta_roller[0], 0, ',', '.'),1);
            $this->Ln();
            $this->Cell(140);
            $this->Cell(28,7,"Descuento: ".$fila_subconsulta_roller[1]."%",1);
            $operacion_desc = intval($fila_subconsulta_roller[0]) * intval($fila_subconsulta_roller[1])/100;
            $this->Cell(28,7,"$ ".number_format($operacion_desc, 0, ',', '.'),1);
            $this->Ln();
            $this->Cell(140);
            $this->Cell(28,7,"Saldo: ",1);
            $this->Cell(28,7,"$ ".number_format(intval($fila_subconsulta_roller[0]) - intval($operacion_desc), 0, ',', '.'),1);
            $this->Ln();
            $this->Cell(140);
            $this->Cell(28,7,"Instalacion: ".$sumaca2,1);
            $this->Cell(28,7,"$ ".number_format($fila_subconsulta_roller[2], 0, ',', '.'),1);
            $this->Ln();
            $operacion = intval($fila_subconsulta_roller[0]) - intval($fila_subconsulta_roller[0]) * intval($fila_subconsulta_roller[1]) / 100 + intval($fila_subconsulta_roller[2]);
            $this->Cell(140);
            $this->Cell(28,7,"Saldo: ",1);
            $this->Cell(28,7,"$ ".number_format($operacion, 0, ',', '.'),1);
            $this->Ln();
        }
        //repuestos
        $subconsulta_repuesto = mysqli_query($conexion2, "select Cantidad, IdRepuesto, ValorUnitario, ValorTotal from DetalleRepuestos where IdTotalRepuestos = '$id'");
        if (mysqli_num_rows($subconsulta_repuesto) > 0){
            $this->Cell(-7);
            $this->Cell(60,10,'Repuesto');
            $this->Ln(8);
            $this->Cell(-6);
            $this->Cell(10,7,'Cant',1);
            $this->Cell(136,7,'Repuesto',1);
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
                $this->Cell(-6);
                $this->Cell(10,7,$cantidad,1);
                $this->Cell(136,7,utf8_decode($nombre_repuesto),1);
                $this->Cell(28,7,"$ ".number_format($vun, 0, ',', '.'),1);
                $this->Cell(28,7,"$ ".number_format($vt, 0, ',', '.'),1);
                $this->Ln();
                $ganancia = intval($vt);
    		    $suma_subrep += $ganancia;
    		    $row_subrepuesto++;
            }
            $this->Cell(140);
            $this->Cell(28,7,"Subtotal: ",1);
            $this->Cell(28,7,"$ ".number_format($suma_subrep, 0, ',', '.'),1);
            $this->Ln();
        }
        //otros
        $subconsulta_otros = mysqli_query($conexion2, "select Cantidad, IdOtros, ValorUnitario, ValorTotal from DetalleOtros where IdRepuestos = '$id'");
        if (mysqli_num_rows($subconsulta_otros) > 0){
            $this->Cell(-7);
            $this->Cell(60,10,'Otros');
            $this->Ln(8);
            $this->Cell(-6);
            $this->Cell(10,7,'Cant',1);
            $this->Cell(136,7,'Detalle',1);
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
            $this->Cell(-6);
            $this->Cell(10,7,$cantidad,1);
            $this->Cell(136,7,utf8_decode($nombre_repuesto),1);
            $this->Cell(28,7,"$ ".number_format($vun, 0, ',', '.'),1);
            $this->Cell(28,7,"$ ".number_format($vt, 0, ',', '.'),1);
            $this->Ln();
            $ganancia = intval($row_subotros[3]);
		    $suma += $ganancia;
		    $row_subotros++;
        }
        if (mysqli_num_rows($subconsulta_otros) > 0){
            $this->Cell(140);
            $this->Cell(28,7,"Subtotal: ",1);
            $this->Cell(28,7,"$ ".number_format($suma, 0, ',', '.'),1);
            $this->Ln();
        }
        $consulta2->close();
        $conexion2->more_results();
        //Título
        $subconsulta_totalcompleto = mysqli_query($conexion2, "select Neto, IVA, TotalInicial, DescuentoAdicional, Total from TotalRepuestos where Id = '$id'");
        if($fila_totalcompleto = mysqli_fetch_array($subconsulta_totalcompleto)){
            $cantidad_desc = 0;
            if (intval($fila_totalcompleto[2]) != 0){
                $porc = intval($fila_totalcompleto[3])*100/intval($fila_totalcompleto[2]);
            }else{
                $porc = 0;
            }
            $this->Ln();
            $this->Cell(133);
            $this->Cell(35,7,"Neto: ",1);
            $this->Cell(28,7,"$ ".number_format($fila_totalcompleto[0], 0, ',', '.'),1);
            $this->Ln();
            $this->Cell(133);
            $this->Cell(35,7,"Iva: ",1);
            $this->Cell(28,7,"$ ".number_format($fila_totalcompleto[1], 0, ',', '.'),1);
            $this->Ln();
            $this->Cell(133);
            $this->Cell(35,7,"Total Inicial: ",1);
            $this->Cell(28,7,"$ ".number_format($fila_totalcompleto[2], 0, ',', '.'),1);
            $this->Ln();
            $this->Cell(133);
            $this->Cell(35,7,"Desc. Adicional: ".round($porc)."%",1);
            $this->Cell(28,7,"$ ".number_format($fila_totalcompleto[3], 0, ',', '.'),1);
            $this->Ln();
            $subconsulta_descb = mysqli_query($conexion2, "select Valor from Descuento_B_Cotizacion where IdCotizacion = '$id'");
            if (mysqli_num_rows($subconsulta_descb) > 0){
                $this->Cell(140);
                $this->Cell(28,7,"Desc B: ",1);
                if($row_subdescb = mysqli_fetch_array($subconsulta_descb)){
                    $cantidad_desc = $row_subdescb[0];
                    $this->Cell(28,7,"$ ".number_format($cantidad_desc, 0, ',', '.'),1);
                }
                $this->Ln();
            }
            $this->Cell(140);
            $this->Cell(28,7,"Total: ",1);
            $this->Cell(28,7,"$ ".number_format(intval($fila_totalcompleto[4]) - intval($cantidad_desc), 0, ',', '.'),1);
        }
        $this->Ln(-28);
        $this->Cell(60,10,'Condiciones de Pago:');
        $this->Ln(5);
        $id = $_REQUEST["id"];
        $conexions = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
        $consultas = $conexions->query("Call Buscar_Empresa_Cotizacion('$id')");
        $nombre_empresass = "";
        while($row1s = $consultas->fetch_assoc()){
            $nombre_empresass = $row1s["Empresa"];
        }
        $consultas->close();
        $conexions->more_results();
        $cadena_buscada01 = 'P&M';
        $cadena_buscada03 = 'Protecc';
        $posicion_coincidencia01 = strpos($nombre_empresass, $cadena_buscada01);
        $posicion_coincidencia03 = strpos(utf8_decode($nombre_empresass), $cadena_buscada03);
        if ($posicion_coincidencia01 === false) {
            if ($posicion_coincidencia03 === false) {
                $this->Cell(60,10,'* 50% al momento de firmar nota de venta.');
            } else {
                $this->Cell(60,10,utf8_decode("* 50% Para enviar a fabricación."));
            }
        } else {
            $this->Cell(60,10,utf8_decode("* 50% Para enviar a fabricación."));
        }
        $this->Ln(5);
        if ($posicion_coincidencia01 === false) {
            if ($posicion_coincidencia03 === false) {
                $this->Cell(60,10,utf8_decode("* 50% al término de la instalación."));
            } else {
                $this->Cell(60,10,utf8_decode("* 50% Al Momento de la instalación."));
            }
        } else {
            $this->Cell(60,10,utf8_decode("* 50% Al Momento de la instalación."));
        }
        $this->Ln(10);
        $this->Cell(60,10,'Formas de Pago:');
        $this->Ln(5);
        $cadena_buscada0 = 'P&M';
        $cadena_buscada02 = 'Protecc';
        $posicion_coincidencia0 = strpos($nombre_empresass, $cadena_buscada0);
        $posicion_coincidencia02 = strpos(utf8_decode($nombre_empresass), $cadena_buscada02);
        if ($posicion_coincidencia0 === false) {
            if ($posicion_coincidencia02 === false) {
                $this->Cell(60,10,utf8_decode("* Tarjeta de crédito, débito, efectivo o cheque al día."));
                $this->Ln(10);
            } else {
                $this->Cell(60,10,utf8_decode("* Tarjeta de crédito, débito, transferencia."));
                $this->Ln(6);
                $this->MultiCell(190,22, $this->Image("webpay.png", $this->GetX()+1, $this->GetY()+1, 50));
            }
        } else {
            $this->Cell(60,10,utf8_decode("* Tarjeta de crédito, débito, transferencia."));
            $this->Ln(6);
            $this->MultiCell(190,22, $this->Image("webpay.png", $this->GetX()+1, $this->GetY()+1, 50));
        }
        $this->Cell(60,10,utf8_decode("* Tiempo de instalación 10 a 15 días."));
        $this->Ln(10);
        $cadena_buscada = 'P&M';
        $cadena_buscada2 = 'Protecc';
        $posicion_coincidencia = strpos($nombre_empresass, $cadena_buscada);
        $posicion_coincidencia2 = strpos(utf8_decode($nombre_empresass), $cadena_buscada2);
        if ($posicion_coincidencia === false) {
            if ($posicion_coincidencia2 === false) {
                $this->Cell(60,10,utf8_decode("* Cotización Válida por 30 días.-"));
            } else {
                $this->Cell(60,10,utf8_decode("* Cotización Válida por 7 días.-"));
            }
        } else {
            $this->Cell(60,10,utf8_decode("* Cotización Válida por 7 días.-"));
        }
        $this->Ln(15);
        $this->Cell(54);
        $this->Cell(60,10,utf8_decode("Sin otro particular y esperando una buena acogida.-"));
        $this->Ln(4);
        $this->Cell(75);
        $this->Cell(60,10,utf8_decode("Le saluda atte. A Usted."));
        $conexion_ext = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
        $consulta_ext = $conexion_ext->query("Call Buscar_EmpresaDetalle_Vendedora_Cotizacion('$id')");
        $paginaweb = "";
        $correo = "";
        $telefono_ext = "";
        $vendedora_ext = "";
        while($row10 = $consulta_ext->fetch_assoc()){
            $vendedora_ext = $row10["Vendedora"];
            $telefono_ext = utf8_decode($row10["Telefono"]);
            $correo = utf8_decode($row10["Correo"]);
            $paginaweb = utf8_decode($row10["PaginaWeb"]);
        }
        $this->Ln(5);
        $this->Cell(128);
        $this->SetFont('Arial','B',12);
        $this->Cell(60,10,$vendedora_ext,0,0,'C');
        $this->Ln(4);
        $this->Cell(128);
        $this->SetFont('Arial','',11);
        $this->Cell(60,10,utf8_decode($telefono_ext),0,0,'C');
        $this->Ln(4);
        $this->Cell(128);
        $this->SetFont('Arial','',11);
        $this->Cell(60,10,utf8_decode($correo),0,0,'C');
        $this->Ln(4);
        $this->Cell(128);
        $this->SetFont('Arial','',11);
        $this->Cell(60,10,utf8_decode($paginaweb),0,0,'C');
   }
}

$pdf=new PDF();
$id = $_REQUEST["id"];
$idc = $_REQUEST["idc"];
$pdf->SetTitle(utf8_decode("Cotización ".$id." - Repuesto"));
//Títulos de las columnas
//$header=array('Cant','Ancho','Alto','Accionamiento','Color','Valor Unid.','Total');
$pdf->AliasNbPages();
//Primera página
$pdf->AddPage();
$pdf->SetY(65);
//$pdf->AddPage();
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
$consulta_aparte = $conexion_aparte->query("Call Buscar_Cliente_Cotizacion ('$idc')");
$consulta2_aparte = $conexion2_aparte->query("Call Buscar_Empresa_Cotizacion ('$id')");
$nombre_cliente = "";
$empresa = "";
if($row_aparte = $consulta_aparte->fetch_assoc()){
    $nombre_cliente = utf8_decode($row_aparte["Nombre"]);
}
if($row_aparte2 = $consulta2_aparte->fetch_assoc()){
    $empresa = $row_aparte2["Empresa"];
}
$consulta_aparte->close();
$conexion_aparte->more_results();
$consulta2_aparte->close();
$conexion2_aparte->more_results();
$pdf->Output($id." ".$nombre_cliente." - ".utf8_decode("Cotización ")."(".utf8_decode($empresa).").pdf",$modo);
?>
