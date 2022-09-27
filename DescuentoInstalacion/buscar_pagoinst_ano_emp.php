<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<link rel="stylesheet"  href="../Imagenes/jquery.dataTables.min.css" type="text/css">
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
<script src="../Imagenes/jquery.dataTables.min.js"></script>
<script>
$(document).ready( function () {
    $('#tabla_pago').DataTable();
    $("#tabla_pago_filter").css({"display":"none"});
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
$texto2 = $_POST["texto2"];
if($consulta = mysqli_query($conexion, "Call Buscar_PagoInstalaciones_Ano_Emp ('$texto','$texto2')") or die (mysqli_error($conexion))){
    echo "<table id='tabla_pago' border='2px' align='center'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nota Venta</th>
                    <th>Manual</th>
                    <th>Control</th>
                    <th>Reparacion</th>
                    <th>Motor</th>
                    <th>Mantencion</th>
                    <th>Valor</th>
                    <th>Fecha</th>
                    <th>Técnico</th>
                    <th>Traslado</th>
                    <th>Roller</th>
                    <th>Varios</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>";
            $manual = 0;
            $control = 0;
            $reparacion = 0;
            $motor = 0;
            $mantencion = 0;
            $suma = 0;
            $traslado = 0;
            $roller = 0;
            $varios = 0;
    if ($consulta) {
        while($row = mysqli_fetch_array($consulta)){
            $fecha2 = date("d-m-Y",strtotime($row[8]));
            echo "<tr>
                    <td>".$row[0]."</td>
                    <td>".$row[1]."</td>
                    <td>".$row[2]."</td>
                    <td>".$row[3]."</td>
                    <td>".$row[4]."</td>
                    <td>".$row[5]."</td>
                    <td>".$row[6]."</td>
                    <td>$ ".number_format($row[7], 0, ',', '.')."</td>
                    <td>".$fecha2."</td>
                    <td>".$row[9]."</td>
                    <td>".$row[10]."</td>
                    <td>".$row[11]."</td>
                    <td>".$row[12]."</td>
                    <td><button id='eliminar_pago' data-id_eliminar='".$row[0]."'>Eliminar</button></td>
            </tr>";
            $manual += intval($row[2]);
            $control += intval($row[3]);
            $reparacion += intval($row[4]);
            $motor += intval($row[5]);
            $mantencion += intval($row[6]);
            $suma += intval($row[7]);
            $traslado += intval($row[10]);
            $roller += intval($row[11]);
            $varios += intval($row[12]);
        }
    }
    echo "</tbody></table>
        <div style='position: absolute; top: 42px; left: 9%; font-size: 1.1vw;'>
            <label>Manual: <strong>".$manual."</strong></label>
            <label> | Control: <strong>".$control."</strong></label>
            <label>| Rep.: <strong>".$reparacion."</strong></label>
            <label>| Motor: <strong>".$motor."</strong></label>
            <label>| Mant.: <strong>".$mantencion."</strong></label>
            <label>| Trasl.: <strong>".$traslado."</strong></label>
            <label>| Roller: <strong>".$roller."</strong></label>
            <label>| Varios: <strong>".$varios."</strong></label>
            <label>| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Filtrado: <strong>$ ".number_format($suma, 0, ',', '.')."</strong></label>
        </div>";
    $consulta->close();
    $conexion->more_results();
};
?>
</body>
</html>
