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
    $('#tabla_cotizaciones').DataTable();
});
</script>
</head>
<body>
<p></p>
<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}
$texto = $_POST["texto"];
if($consulta = $conexion->query("Call Buscar_Solo_Factura ('$texto')")){
    echo "<table id='tabla_cotizaciones' border='2px' align='center'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Factura</th>
                    <th>Nota Venta</th>
                    <th>Fecha</th>
                    <th>Valor</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>";
            $suma = 0;
    if ($consulta) {
        while($row = $consulta->fetch_assoc()){
            $fecha2 = date("d-m-Y",strtotime($row["Fecha"]));
            echo "<tr>
                    <td>".$row["Id"]."</td>
                    <td>".$row["Factura"]."</td>
                    <td contenteditable>".$row["NotaVenta"]."</td>
                    <td><input type='date' min='2005-01-01' max='2100-12-31' value='".$row["Fecha"]."'/></td>
                    <td contenteditable>".$row["Valor"]."</td>
                    <td><button id='modificar_factura'>Modificar</button></td>
                    <td><button id='eliminar_credito' data-id_eliminar='".$row["Id"]."'>Eliminar</button></td>
            </tr>";
            $suma += intval($row["Valor"]);
        }
    }
    echo "</tbody></table><label style='position: absolute;top: 35px;right: 28%;'>Total Filtrado: <strong>$ ".number_format($suma, 0, ',', '.')."</strong></label>";
    $consulta->close();
    $conexion->more_results();
};
?>
</body>
</html>
