<?php
header("Content-Type: text/html;charset=utf-8");
$conexion2 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion2,"utf8");
if(!$conexion2){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$idrest = $_POST["idrest"];
$tecn = $_POST["tecn"];
$consulta0 = mysqli_query($conexion2, "Call Borrar_Antigua_Restificacion('$idrest','$tecn')");
if(!$consulta){
    echo "Error al insertar los datos ". mysqli_error();
}else{
}
?>
