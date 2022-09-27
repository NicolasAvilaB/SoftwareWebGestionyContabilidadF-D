<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<link href="clientes.css" rel="stylesheet" type="text/css">
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
</head>
<body>
<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}
$texto = $_POST["texto"];
if($consulta = $conexion->query("Call Buscar_Producto_Cantidad_Tecnico ('$texto')")){
    echo "<table id='accion_producto_cantidad'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
        <tbody id='agregar_fila_producto_cantidad'>";
    if ($consulta) {
        while($row = $consulta->fetch_assoc()){
            $tipos = $row["Estado"];
            echo "<tr>
                    <td>".$row["Id"]."</td>
	                  <td>".$row["Producto"]."</td>
		                <td contentEditable>".$row["Cantidad"]."</td>
                    <td><button id='quitar_fila'>&nbsp;X&nbsp;</button></td>
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
