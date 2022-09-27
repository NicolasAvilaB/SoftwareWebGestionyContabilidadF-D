<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<link href="menu_admin.css" rel="stylesheet" type="text/css">
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
<link rel="stylesheet"  href="../Imagenes/jquery.dataTables.min.css" type="text/css">
<script src="../Imagenes/jquery.dataTables.min.js"></script>
<script>
/*$(document).ready( function () {
    $('#tabla_clientes').DataTable();
});*/
</script>
</head>
<body>
<button id='actualizar_empresas' class='boton_actualizar_empresas'>Actualizar Empresas</button>
<?php
$conexion = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion3 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd"); 
mysqli_set_charset($conexion3,"utf8");
mysqli_set_charset($conexion,"utf8");
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}
$consulta = $conexion->query("Call Obtener_Empresas");
echo "Total Ganado Mes en Curso <table id='tabla_clientes' align='center'>
    <thead>
        <tr>
            <th style='height: 28px; font-size:1.5vw;'>Empresa</th>
            <th></th>
        </tr>
    </thead>
    <tbody>";
$empresa = "";
$suma = 0;
$ganancia = 0;
$resto = 0;
if ($consulta) {
    while($row = $consulta->fetch_assoc()){
        $id = 	$row["Id"];		
		$nombre = $row["NombreEmpresa"];
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
    		$consulta3 = mysqli_query($conexion3, "SELECT sum(Valor) as 'Valor' FROM Historial_Descuento_B_NotaVenta WHERE IdEmpresa = '$id' and FechaIngreso BETWEEN '$inicio' and '$fin'");
            while($resultados3 = mysqli_fetch_array($consulta3)) {
            		$result = intval($resultados3[0]);
            		if ($result == '0' || $result == '' || $result == null){
            		    $result = 0;
            		}
            		$ganancia -= $result;
            		$suma -=  $result;
            		$resultados2++;
            }
    	    echo "<tr>
                <td style='height: 40px; font-size:1.7vw;'>".$nombre."</td>
                <td style='height: 40px; font-size:1.7vw;'>$ ".number_format($ganancia, 0, ',', '.')."</td>
            </tr>";
        }
    }
    echo "<tr style='font-weight:bold;'>
            <td style='height: 40px; font-size:1.7vw;'>Total: </td>
            <td style='height: 40px; font-size:1.7vw;'>$ ".number_format($suma, 0, ',', '.')."</td>
        </tr>";
    $consulta->close();
    $conexion->more_results();
}
echo "</tbody></table>";
?>
</body>
</html>
