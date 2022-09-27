<?php
require('./fpdf/fpdf.php');
$id = 0;
class PDF extends FPDF
{
    
//Cabecera de página
   function Header()
   {
        setlocale(LC_TIME,"es_ES");
        $id = $_REQUEST["id"];
        $idc = $_REQUEST["idc"];
        $conexion = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
        mysqli_set_charset($conexion,"utf8");
        if(mysqli_connect_errno()){
            echo mysqli_connect_error();
        }
        $consulta = $conexion->query("select Nombre, Telefono, Email, Direccion, Comuna from Clientes where Id = '$idc'");
    //Logo
    //Arial bold 15
        $this->SetFont('Arial','B',12);
        //Movernos a la derecha
        $this->Cell(150);
        //Título
        $inicio = date("Y-m-d");
        $this->Cell(60,10,utf8_decode('Nota Venta '.$id));
        $this->Ln(5);
        $this->Cell(115);
        $this->Cell(60,10,'Fecha: '.strftime("%A").', '.strftime("%d").' de '.strftime("%B").' del '.strftime("%Y").'');
    //Salto de línea
        $this->Ln(-5);
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
        $this->Cell(60,10,$se.$nombre);
        $this->Ln(5);
        $this->Cell(60,10,'Fono: '.$telefono);
        $this->Ln(5);
        $this->Cell(60,10,'Email: '.$email);
        $this->Ln(5);
        $this->Cell(60,10,'Direccion: '.$direccion);
        $this->Ln(5);
        $this->Cell(60,10,'Comuna: '.$comuna);
        $this->Ln(9);
        $this->Cell(60,10,'Por la presente, me es muy grato hacerle llegar esta Nota Venta');
   }
   
   //Pie de página
   function Footer()
   {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
   }
   
   function TablaSimple()
   {    
        $this->SetFont('Arial','I',10);
        $this->Ln(-15);
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
        $consulta2 = mysqli_query($conexion2, "select Cantidad, Ancho, Alto, IdMotor, IdColor, ValorUn, ValorTotal from DetalleNotaVenta where IdNotaVenta = '$id'");
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
            $this->Cell(60,10,'Persianas');
            $this->Ln();
            $this->Cell(13,7,'Cant',1);
            $this->Cell(16,7,'Ancho',1);
            $this->Cell(16,7,'Alto',1);
            $this->Cell(60,7,'Accionamiento',1);
            $this->Cell(25,7,'Color',1);
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
            
            $vun = $row2[5];
            $vt = $row2[6];
            $this->Cell(13,7,$cantidad,1);
            $this->Cell(16,7,$ancho,1);
            $this->Cell(16,7,$alto,1);
            $this->Cell(60,7,utf8_decode($nombre_motor),1);
            $this->Cell(25,7,utf8_decode($nombre_color),1);
            $this->Cell(28,7,"$ ".number_format($vun, 0, ',', '.'),1);
            $this->Cell(28,7,"$ ".number_format($vt, 0, ',', '.'),1);
            $this->Ln();
            $ganancia = intval($cantidad);
		    $sumaca += $ganancia;
		    $row2++;
        }
        $subconsulta_persiana = mysqli_query($conexion2, "select Subtotal, Descuento, Instalacion from TotalNotaVenta where Id = '$id'");
        if($fila_subconsulta_persiana = mysqli_fetch_array($subconsulta_persiana)){
            $this->Cell(130);
            $this->Cell(28,7,"Subtotal: ",1);
            $this->Cell(28,7,"$ ".number_format($fila_subconsulta_persiana[0], 0, ',', '.'),1);
            $this->Ln();
            $this->Cell(130);
            $this->Cell(28,7,"Descuento: ".$fila_subconsulta_persiana[1]."%",1);
            $operacion_desc = intval($fila_subconsulta_persiana[0]) * intval($fila_subconsulta_persiana[1])/100;
            $this->Cell(28,7,"$ ".number_format($operacion_desc, 0, ',', '.'),1);
            $this->Ln();
            $this->Cell(130);
            $this->Cell(28,7,"Instalacion: ".$sumaca,1);
            $this->Cell(28,7,"$ ".number_format($fila_subconsulta_persiana[2], 0, ',', '.'),1);
            $this->Ln();
            $operacion = intval($fila_subconsulta_persiana[0]) - intval($fila_subconsulta_persiana[0]) * intval($fila_subconsulta_persiana[1]) / 100 + intval($fila_subconsulta_persiana[2]);
            $this->Cell(130);
            $this->Cell(28,7,"Saldo: ",1);
            $this->Cell(28,7,"$ ".number_format($operacion, 0, ',', '.'),1);
            $this->Ln();
        }
        //consulta_roller
        $subconsulta_roller = mysqli_query($conexion2, "select Cantidad, Ancho, Alto, IdAccionamiento, Color, IdRoller, ValorUnitario, ValorTotal from DetalleNotaVentaRollers where IdTotalRollers = '$id'");
        if (mysqli_num_rows($subconsulta_roller) > 0){
            $this->Cell(60,10,'Roller');
            $this->Ln();
            $this->Cell(10,7,'Cant',1);
            $this->Cell(13,7,'Ancho',1);
            $this->Cell(10,7,'Alto',1);
            $this->Cell(27,7,'Accionamiento',1);
            $this->Cell(22,7,'Color',1);
            $this->Cell(60,7,'Roller',1);
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
            $this->Cell(10,7,$cantidad,1);
            $this->Cell(13,7,$ancho,1);
            $this->Cell(10,7,$alto,1);
            $this->Cell(27,7,utf8_decode($nombre_motor),1);
            $this->Cell(22,7,$ncolor,1);
            $this->Cell(60,7,utf8_decode($nombre_cortina),1);
            $this->Cell(25,7,"$ ".number_format($vun, 0, ',', '.'),1);
            $this->Cell(25,7,"$ ".number_format($vt, 0, ',', '.'),1);
            $this->Ln();
            $ganancia = intval($cantidad);
		    $sumaca2 += $ganancia;
		    $row_subroller++;
        }
        $subconsulta_roller = mysqli_query($conexion2, "select Subtotal, Descuento, Instalacion from TotalNotaVentaRollers where Id = '$id'");
        if($fila_subconsulta_roller = mysqli_fetch_array($subconsulta_roller)){
            $this->Cell(136);
            $this->Cell(28,7,"Subtotal: ",1);
            $this->Cell(28,7,"$ ".number_format($fila_subconsulta_roller[0], 0, ',', '.'),1);
            $this->Ln();
            $this->Cell(136);
            $this->Cell(28,7,"Descuento: ".$fila_subconsulta_roller[1]."%",1);
            $operacion_desc = intval($fila_subconsulta_roller[0]) * intval($fila_subconsulta_roller[1])/100;
            $this->Cell(28,7,"$ ".number_format($operacion_desc, 0, ',', '.'),1);
            $this->Ln();
            $this->Cell(136);
            $this->Cell(28,7,"Instalacion: ".$sumaca2,1);
            $this->Cell(28,7,"$ ".number_format($fila_subconsulta_roller[2], 0, ',', '.'),1);
            $this->Ln();
            $operacion = intval($fila_subconsulta_roller[0]) - intval($fila_subconsulta_roller[0]) * intval($fila_subconsulta_roller[1]) / 100 + intval($fila_subconsulta_roller[2]);
            $this->Cell(136);
            $this->Cell(28,7,"Saldo: ",1);
            $this->Cell(28,7,"$ ".number_format($operacion, 0, ',', '.'),1);
            $this->Ln();
        }
        //repuestos
        $subconsulta_repuesto = mysqli_query($conexion2, "select Cantidad, IdRepuesto, ValorUnitario, ValorTotal from DetalleNotaVentaRepuestos where IdNotaVenta = '$id'");
        if (mysqli_num_rows($subconsulta_repuesto) > 0){
            $this->Cell(60,10,'Repuesto');
            $this->Ln();
            $this->Cell(13,7,'Cant',1);
            $this->Cell(120,7,'Repuesto',1);
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
                $this->Cell(13,7,$cantidad,1);
                $this->Cell(120,7,utf8_decode($nombre_repuesto),1);
                $this->Cell(28,7,"$ ".number_format($vun, 0, ',', '.'),1);
                $this->Cell(28,7,"$ ".number_format($vt, 0, ',', '.'),1);
                $this->Ln();
                $ganancia = intval($vt);
    		    $suma_subrep += $ganancia;
    		    $row_subrepuesto++;
            }
            $this->Cell(133);
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
            $this->Cell(60,10,'Otros');
            $this->Ln();
            $this->Cell(13,7,'Cant',1);
            $this->Cell(117,7,'Detalle',1);
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
            $this->Cell(13,7,$cantidad,1);
            $this->Cell(117,7,utf8_decode($nombre_repuesto),1);
            $this->Cell(28,7,"$ ".number_format($vun, 0, ',', '.'),1);
            $this->Cell(28,7,"$ ".number_format($vt, 0, ',', '.'),1);
            $this->Ln();
            $ganancia = intval($row_subotros[3]);
		    $suma += $ganancia;
		    $row_subotros++;
        }
        if (mysqli_num_rows($subconsulta_otros) > 0){
            $this->Cell(130);
            $this->Cell(28,7,"Subtotal: ",1);
            $this->Cell(28,7,"$ ".number_format($suma, 0, ',', '.'),1);
            $this->Ln();
        }
        
        //Título
        $subconsulta_totalcompleto = mysqli_query($conexion2, "Call Reporte_NotaVenta_Totales('$id')")or die (mysqli_error($conexion2));
        if($fila_totalcompleto = mysqli_fetch_array($subconsulta_totalcompleto)){
            $this->Ln();
            $this->Cell(130);
            $this->Cell(28,7,"Neto: ",1);
            $this->Cell(28,7,"$ ".number_format($fila_totalcompleto[0], 0, ',', '.'),1);
            $this->Ln();
            $this->Cell(130);
            $this->Cell(28,7,"Iva: ",1);
            $this->Cell(28,7,"$ ".number_format($fila_totalcompleto[1], 0, ',', '.'),1);
            $this->Ln();
            $this->Cell(130);
            $this->Cell(28,7,"Total Inicial: ",1);
            $this->Cell(28,7,"$ ".number_format($fila_totalcompleto[2], 0, ',', '.'),1);
            $this->Ln();
            $this->Cell(130);
            $this->Cell(28,7,"Desc. Adicional: ",1);
            $this->Cell(28,7,"$ ".number_format($fila_totalcompleto[3], 0, ',', '.'),1);
            $this->Ln();
            $this->Cell(130);
            $this->Cell(28,7,"Total: ",1);
            $this->Cell(28,7,"$ ".number_format($fila_totalcompleto[4], 0, ',', '.'),1);
        }
        $this->Ln(5);
        $this->Cell(60,10,'Condiciones de Pago:');
        $this->Ln(5);
        $this->Cell(60,10,'* 50% inicial firma nota de venta, Saldo dia de termino de la instalacion.');
        $this->Ln(5);
        $this->Cell(60,10,'* Medios de pago: efectivo, transferencia, cheque, tarjeta de credito.');
        $this->Ln(5);
        $this->Cell(60,10,'* Tiempo de entrega 15 dias habiles.');
        $consulta2->close();
        $conexion2->more_results();
   }
   
}

$pdf=new PDF();
$pdf->SetTitle(utf8_decode('Nota Venta'));
//Títulos de las columnas
//$header=array('Cant','Ancho','Alto','Accionamiento','Color','Valor Unid.','Total');
$pdf->AliasNbPages();
//Primera página
$pdf->AddPage();
$pdf->SetY(65);
//$pdf->AddPage();
$pdf->TablaSimple();
//Segunda página
$pdf->Output();
?>
