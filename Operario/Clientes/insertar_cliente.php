<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$nombre = $_POST["nombre"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$comuna = $_POST["comuna"];
$fecha = $_POST["fecha"];
$consulta = mysqli_query($conexion,"Call Ingresar_Clientes ('$nombre','$telefono','$email','$direccion','$comuna','$fecha')");
if(!$consulta){
    echo "Error al insertar los datos ". mysqli_error();
}else{
    echo "Se han insertado los datos";
}
?>
