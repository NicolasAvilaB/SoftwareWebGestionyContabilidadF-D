<?php
require('./fpdf/fpdf.php');
class PDF extends FPDF
{
    
//Cabecera de página
   function Header()
   {
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
        $this->Cell(60,10,'Nota Venta '.$id);
        $this->Ln(5);
        $this->Cell(150);
        $this->Cell(60,10,'Fecha: '.$inicio);
    //Salto de línea
        $this->Ln(15);
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
        $this->Cell(60,10,'Por la presente, me es muy grato hacerle llegar esta cotizacion');
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
        $this->Ln(9);
    //foreach($header as $col)
        $this->Cell(13,7,'Cant',1);
        $this->Cell(16,7,'Ancho',1);
        $this->Cell(16,7,'Alto',1);
        $this->Cell(60,7,'Accionamiento',1);
        $this->Cell(25,7,'Color',1);
        $this->Cell(28,7,'Valor Unid.',1);
        $this->Cell(28,7,'Total',1);
        $this->Ln();
        $conexion2 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
        mysqli_set_charset($conexion2,"utf8");
        if(mysqli_connect_errno()){
            echo mysqli_connect_error();
        }
        $id = $_REQUEST["id"];
        $suma = 0;
        $consulta2 = mysqli_query($conexion2, "select Cantidad, Ancho, Alto, N_Motor, N_Color, ValorUn, ValorTotal from DetalleNotaVenta where IdNotaVenta = '$id'");
        while($row2 = mysqli_fetch_array($consulta2)){
            $cantidad = $row2["Cantidad"];
            $ancho = $row2["Ancho"];
            $alto = $row2["Alto"];
            $nmotor = utf8_decode($row2["N_Motor"]);
            $ncolor = utf8_decode($row2["N_Color"]);
            $vun = $row2["ValorUn"];
            $vt = $row2["ValorTotal"];
            $this->Cell(13,7,$cantidad,1);
            $this->Cell(16,7,$ancho,1);
            $this->Cell(16,7,$alto,1);
            $this->Cell(60,7,$nmotor,1);
            $this->Cell(25,7,$ncolor,1);
            $this->Cell(28,7,"$ ".$vun,1);
            $this->Cell(28,7,"$ ".$vt,1);
            $this->Ln();
            $ganancia = intval($row2[6]);
		    $suma += $ganancia;
		    $row2++;
        }
        $consulta2->close();
        $conexion2->more_results();
        $this->Cell(13,7,"",1);
        $this->Cell(16,7,"",1);
        $this->Cell(16,7,"",1);
        $this->Cell(60,7,"",1);
        $this->Cell(25,7,"",1);
        $this->Cell(28,7,"",1);
        $this->Cell(28,7,"",1);
        $this->Ln();
        $this->Cell(13,7,"",1);
        $this->Cell(16,7,"",1);
        $this->Cell(16,7,"",1);
        $this->Cell(60,7,"",1);
        $this->Cell(25,7,"",1);
        $this->Cell(28,7,"",1);
        $this->Cell(28,7,"",1);
        $this->Ln();
        $this->Cell(13,7,"",1);
        $this->Cell(16,7,"",1);
        $this->Cell(16,7,"",1);
        $this->Cell(60,7,"",1);
        $this->Cell(25,7,"",1);
        $this->Cell(28,7,"",1);
        $this->Cell(28,7,"",1);
        $this->Ln();
        $this->Cell(13,7,"",1);
        $this->Cell(16,7,"",1);
        $this->Cell(16,7,"",1);
        $this->Cell(60,7,"",1);
        $this->Cell(25,7,"",1);
        $this->Cell(28,7,"",1);
        $this->Cell(28,7,"",1);
        //Título
        $this->Ln();
        $this->Cell(130);
        $this->Cell(28,7,"Subtotal: ",1);
        $this->Cell(28,7,"$ ".number_format($suma, 0, ',', '.'),1);
        $this->Ln();
        $this->Cell(130);
        $this->Cell(28,7,"Desc 41%: ",1);
        $this->Cell(28,7,"$ ".number_format($suma*0.41, 0, ',', '.'),1);
         $this->Ln();
        $this->Cell(130);
        $this->Cell(28,7,"Subt. Desc: ",1);
        $this->Cell(28,7,"$ ".number_format($suma*0.59, 0, ',', '.'),1);
        $this->Ln(50);
        $this->Cell(60,10,'Condiciones de Pago:');
        $this->Ln(5);
        $this->Cell(60,10,'* 50% inicial firma nota de venta, Saldo dia de termino de la instalacion.');
        $this->Ln(5);
        $this->Cell(60,10,'* Medios de pago: efectivo, transferencia, cheque, tarjeta de credito.');
        $this->Ln(5);
        $this->Cell(60,10,'* Tiempo de entrega 15 dias habiles.');
   }
   
}

$pdf=new PDF();
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
