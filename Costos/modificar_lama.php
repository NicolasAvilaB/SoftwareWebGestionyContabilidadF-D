<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$anc = $_POST["anc"];
$alt = $_POST["alt"];
$val = $_POST["val"];
$id = $_POST["id"];
$consulta = mysqli_query($conexion,"Call Modificar_Lama ('$anc','$alt','$val','$id')");
if(!$consulta){
    echo "Error al insertar los datos ". mysqli_error();
}else{
}
?>
