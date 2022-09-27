<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$id = $_POST["id"];
$es = $_POST["es"];
$consulta = mysqli_query($conexion,"Call Eliminar_Instaladores ('$es','$id')");
if(!$consulta){
    echo "Error al eliminar los datos ". mysqli_error();
}else{
    echo "Se ha cambiado el estado de Instalador";
}
?>
