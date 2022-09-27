<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<link href="clientes.css" rel="stylesheet" type="text/css">
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
<link rel="stylesheet"  href="../Imagenes/jquery.dataTables.min.css" type="text/css">
<script src="../Imagenes/jquery.dataTables.min.js"></script>
<script>
$(document).ready( function () {
    $('#tabla_clientes').DataTable();
    $('#tabla_clientes2').DataTable();
    $('#tabla_clientes3').DataTable();
});
</script>
</head>
<body>
<p></p>
<br></br>
<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}
$conexion2 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
mysqli_set_charset($conexion2,"utf8");
$texto = $_POST["texto"];
if($consulta = $conexion->query("Call Buscar_NotaVenta_Historial_Abono ('$texto')")){
    echo 
        "<table id='tabla_clientes3' border='1px'> 
            <thead>
                <tr>
                    <th>N° Nota Venta</th>
                    <th>Nombre</th>
                    <th>Total</th>
                    <th>Abono</th>
                </tr>
            </thead>
        <tbody id='agregar_fila_otro'>";
    if ($consulta) {
        while($row = $consulta->fetch_assoc()){
            echo "<tr>
                <td>".$row["Id"]."</td>
                <td>".$row["N_Cliente"]."</td>
                <td>".$row["Total"]."</td>
                <td contenteditable>".$row["Abono"]."</td></tr>";
        }
    }
    echo "</tbody></table>";
    $consulta->close();
    $conexion->more_results();
};
?>
</body>
</html>
