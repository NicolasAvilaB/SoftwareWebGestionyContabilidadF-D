<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<link href="clientes.css" rel="stylesheet" type="text/css">
<link rel="stylesheet"  href="../Imagenes/jquery.dataTables.min.css" type="text/css">
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
<script src="../Imagenes/jquery.dataTables.min.js"></script>
<script>
$(document).ready( function () {
    $('#tabla_cotizaciones').DataTable();
});
</script>
</head>
<body>
<p></p>
<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}
$texto = $_POST["texto"];
if($consulta = mysqli_query($conexion, "Call Buscar_Factura_Credito ('$texto')")){
    echo "<label><strong>&nbsp;&nbsp;&nbsp;&nbsp;Factura y Créditos</strong></label><table id='tabla_cotizaciones' border='2px' align='center'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>N° Factura / N° Crédito</th>
                    <th>Tipo</th>
                    <th>Nota Venta</th>
                    <th>Fecha</th>
                    <th>Valor</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>";
    if ($consulta) {
        while($row = mysqli_fetch_array($consulta)){
            $fecha2 = date("d-m-Y",strtotime($row[3]));
            echo "<tr>
                    <td>".$row[0]."</td>
                    <td>".$row[1]."</td>
                    <td>".$row[5]."</td>
                    <td>".$row[2]."</td>
                    <td>".$fecha2."</td>
                    <td>$ ".number_format($row[4], 0, ',', '.')."</td>
                    <td><button id='eliminar' data-tipo='".$row[5]."' data-id_eliminar='".$row[0]."'>Eliminar</button></td>
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
