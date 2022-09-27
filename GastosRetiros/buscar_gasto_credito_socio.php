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
if($consulta = mysqli_query($conexion, "Call Buscar_Gasto_Credito_Socio ('$texto')") or die (mysqli_error($conexion))){
    echo "<table id='tabla_cotizaciones' border='2px' align='center'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Detalle</th>
                    <th>Tipo</th>
                    <th>Fecha</th>
                    <th>Valor</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>";
            $suma = 0;
    if ($consulta) {
        while($row = mysqli_fetch_array($consulta)){
            echo "<tr>
                <td>".$row[0]."</td>
                <td contenteditable>".$row[1]."</td>
                <td>".$row[2]."</td>
                <td><input id='fecha' type='date' value='".$row[3]."'/></td>
                <td>$ ".number_format($row[4], 0, ',', '.')."</td>
                <td><button id='modificar' class='modificar'>Modificar</button></td>
                <td><button id='eliminar' data-id_eliminar='".$row[0]."' data-tipo='".$row[2]."'>Eliminar</button></td>
            </tr>";
            $suma += intval($row[4]);
        }
    }
    echo "</tbody></table><label style='position: absolute;top: 35px;right: 28%;'>Total Filtrado: <strong>$ ".number_format($suma, 0, ',', '.')."</strong></label>";
    $consulta->close();
    $conexion->more_results();
};
?>
</body>
</html>
