<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$rut = $_POST["rut"];
$usuario = $_POST["usuario"];
$clave = $_POST["clave"];
$nombre = $_POST["nombre"];
$empresa = $_POST["empresa"];
$email = $_POST["email"];
$color = $_POST["color"];
$consulta = mysqli_query($conexion,"Call Ingresar_Vendedores ('$rut','$usuario','$clave','$nombre','$empresa','$email','$color')");
if(!$consulta){
    echo "Error al insertar los datos ". mysqli_error();
}else{
    echo "Se ha insertado el Vendedor";
}
?>
