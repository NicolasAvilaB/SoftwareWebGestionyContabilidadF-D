<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
<link rel="stylesheet"  href="../Imagenes/jquery.dataTables.min.css" type="text/css">
<script src="../Imagenes/jquery.dataTables.min.js"></script>
<script>
$(document).ready( function () {
    $('#tabla_color_persianas').DataTable();
});
</script>
</head>
<body>
<?php
$conexion = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
$texto = $_POST["texto"];
$texto2 = $_POST["texto2"];
if($consulta = $conexion->query("Call Prom_Venta1_Repuestos_Empr_De('$texto','$texto2')")){
     echo "<table id='tabla_color_persianas' align='center' border='2px'>
            <thead>
                <tr>
                    <th>Cantidad</th>
                    <th>Repuesto</th>
                </tr>
            </thead>
            <tbody>
        ";
    if ($consulta) { 
        while($row = $consulta->fetch_assoc()){
            echo "<tr>
                <td>".$row["Cantidad"]."</td>
                <td>".$row["Repuesto"]."</td>
            </tr>";
        }
    }
    echo "</tbody></table>";
    $consulta->close();
    $conexion->more_results();
};
?>
</body>
</html>
