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
$(document).ready(function(){
    $('#tabla_clientes2').DataTable();
});
</script>
</head>
<body>
<p></p>
<br></br>
<?php
$conexion = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}
$conexion2 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
mysqli_set_charset($conexion2,"utf8");
$texto = $_POST["texto"];
if($consulta = $conexion->query("Call Buscar_Historial_Descuentos('$texto')")){
    echo "<table id='tabla_clientes2' border='2px'> 
            <thead>
                <tr>
                    <th style='display:none;'>Id</th>
                    <th>N° Nota Venta</th>
                    <th>Total</th>
                    <th>Observaciones</th>
                    <th></th>
                </tr>
            </thead>
        <tbody id='agregar_fila_otro'>";
    if ($consulta) {
        while($row = $consulta->fetch_assoc()){
            $id0 = $row["IdNotaVenta"];
                echo "<tr>
                <td style='display:none;'>".$row["Id"]."</td>
                <td contenteditable>".$id0."</td>
                <td contenteditable>".$row["Valor"]."</td>
                <td contenteditable>".$row["Observaciones"]."</td>
                <td><button id='eliminar_descuento' class='cotizar_cliente' data-id_eliminar_descuento='".$row["Id"]."' data-idnota_eliminar_descuento='".$id0."' data-valor_eliminar_descuento='".$row["Valor"]."'>Eliminar</button></tr>";
        }
    }
    echo "</tbody></table>";
    $consulta->close();
    $conexion->more_results();
};
?>
</body>
</html>
