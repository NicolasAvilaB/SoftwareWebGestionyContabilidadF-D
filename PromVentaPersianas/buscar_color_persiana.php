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
if($consulta = $conexion->query("select A.Cantidad, A.Ancho, A.Alto, B.NombreMotor as 'Motor' from DetalleNotaVenta as A left join Motor as B on A.IdMotor = B.Id where A.IdColor = '$texto'")){
     echo "<table id='tabla_color_persianas' align='center' border='2px'>
            <thead>
                <tr>
                    <th>Cantidad</th>
                    <th>Ancho</th>
                    <th>Alto</th>
                    <th>Motor</th>
                </tr>
            </thead>
            <tbody>
        ";
    if ($consulta) { 
        while($row = $consulta->fetch_assoc()){
            echo "<tr>
                <td>".$row["Cantidad"]."</td>
                <td>".$row["Ancho"]."</td>
                <td>".$row["Alto"]."</td>
                <td>".$row["Motor"]."</td>
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
