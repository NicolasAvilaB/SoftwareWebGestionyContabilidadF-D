<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<link href="clientes.css" rel="stylesheet" type="text/css">
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
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
$texto = $_POST["texto"];
if($consulta = $conexion->query("Call Buscar_Agrega_Color ('$texto%')")){
    echo 
        "<table id='accion_agrega_color'> 
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Color</th>
                    <th></th>
                </tr>
            </thead>
        <tbody id='agregar_fila_agrega_color'>
        ";
    if ($consulta) {
        while($row = $consulta->fetch_assoc()){
            echo "<tr>
                    <td>".$row["Id"]."</td>
                    <td contenteditable>".$row["NombreColor"]."</td>
                    <td><button id='estado_agrega_color' data-estado='".$row["Estado"]."' data-id_estado_agrega_color='".$row["Id"]."'>".$row["Estado"]."</td>
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
