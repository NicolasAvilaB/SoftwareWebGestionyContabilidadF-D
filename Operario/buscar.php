<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<link href="menu.css" rel="stylesheet" type="text/css">
<script>
</script>
</head>
<body>
<?php
header("Content-Type: text/html;charset=utf-8");
setlocale(LC_TIME,"es_ES");
$conexion = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion3 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd"); 
mysqli_set_charset($conexion3,"utf8");
mysqli_set_charset($conexion,"utf8");
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}
utf8_decode($texto = $_POST["texto"]);
$consulta = $conexion->query("Call Obtener_Empresas_Detalle ('$texto')");
echo "<table id='tabla_clientes' align='center'>
    <thead>";
$empresa = "";
$suma = 0;
if ($consulta) { 
    while($row = $consulta->fetch_assoc()){
        $id = $row["Id"];
		$nombre = utf8_decode($row["NombreEmpresa"]);
		$row++;
		$conexion2 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd"); 
        mysqli_set_charset($conexion2,"utf8");
        $inicio = date("Y-m-01");
        $fin = date("Y-m-t");
	    $consulta2 = mysqli_query($conexion2, "Call Sumar_Mes_Ganancia('".$id."','".$inicio."','".$fin."')");
	    while($resultados2 = mysqli_fetch_array($consulta2)) {
    		$ganancia = intval($resultados2[1]);
    		$suma += $ganancia;
    		$resultados2++;
        }
    }
    $consulta3 = mysqli_query($conexion3, "SELECT sum(Valor) as 'Valor' FROM Historial_Descuento_B_NotaVenta WHERE IdEmpresa = '$id' and FechaIngreso BETWEEN '$inicio' and '$fin'");
    while($resultados3 = mysqli_fetch_array($consulta3)) {
    		$ganancia = intval($resultados3[0]);
    		$suma -= $ganancia;
    		$resultados2++;
    }
    
    echo "<tr><th style='font-weight: 400; font-size:1.7vw;'>".utf8_encode($nombre)."</th>
        <th><!--<button id='actualizar_ventas' class='boton_actualizar_ventas'>Actualizar Ventas</button>--></th>
    </tr>
    </thead>
    <tbody>
    <tr style='font-weight:bold;'>
            <td style='height: 40px; font-size:1.7vw;'>Total Ventas del Mes de ".strftime("%B").": </td>
            <td style='height: 40px; font-size:1.7vw;'>$ ".number_format($suma, 0, ',', '.')."</td>
        </tr>";
    $consulta->close();
    $conexion->more_results();
}
echo "</tbody></table>";
?>
</body>
</html>
