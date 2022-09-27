<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$id = $_POST["id"];
$cantidad = $_POST["cantidad"];
$valor = $_POST["valor"];
$consulta = mysqli_query($conexion,"Call Ingresar_Instalacion_Roller ('$id','$cantidad','$valor')");
if(!$consulta){
    echo "Error al insertar los datos ". mysqli_error();
}else{
    echo "Se ha insertado la Instalación";
}
?>
