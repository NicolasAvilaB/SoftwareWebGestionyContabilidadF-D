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
$conexion2 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
$ejecutar2 = mysqli_query($conexion2,"Call Obtener_Empresas");
mysqli_set_charset($conexion2,"utf8");
$texto = $_POST["texto"];
if($consulta = $conexion->query("Call Buscar_Instalaciones_Roller ('$texto%')")){
    echo 
        "<table id='accion9'> 
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cantidad</th>
                    <th>Valor</th>
                    <th></th>
                </tr>
            </thead>
        <tbody id='agregar_fila_ins_roller'>
        ";
    if ($consulta) {
        while($row = $consulta->fetch_assoc()){
            echo "<tr>
                    <td id='id_inst' data-id_id='".$row["Id"]."' contenteditable>".$row["Id"]."</td>
                    <td id='cantidad_inst' data-id_cantidad='".$row["Id"]."' contenteditable>".$row["Cantidad"]."</td>
                    <td id='valor_inst' data-id_valor='".$row["Id"]."' contenteditable>".$row["Valor"]."</td>
                    <td><button id='eliminar_inst_rol' data-id_eliminar_ins_rol='".$row["Id"]."'>Eliminar</button></td>
                </tr>
            ";
        }
    }
    echo "</tbody></table>";
    $consulta->close();
    $conexion->more_results();
};
?>
</body>
</html>
