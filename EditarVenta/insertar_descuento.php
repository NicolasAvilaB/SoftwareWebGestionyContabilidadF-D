<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$id = $_POST["id"];
$valor = $_POST["valor"];
$ob = $_POST["ob"];
$fecha = date("Y-m-d");
$consulta = mysqli_query($conexion,"Call Ingresar_Observacion_Descuento_NotaVenta ('$id','$ob','$valor')");
$consulta = mysqli_query($conexion,"Call Ingresar_Observacion_Descuento_NotaVenta2 ('$id','$valor','$fecha')");
if(!$consulta){
    echo "Error al insertar los datos ". mysqli_error();
}else{
}
?>
