<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion1 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$id = $_POST["id"];
$idnota = $_POST["idnota"];
$valor = $_POST["valor"];
$consulta = mysqli_query($conexion,"Call Eliminar_Observacion_Descuento_NotaVenta ('$id')");
$consulta1 = mysqli_query($conexion1,"Call Eliminar_Observacion_Descuento_NotaVenta2 ('$idnota','$valor')");
if(!$consulta){
    echo "Error al eliminar los datos ". mysqli_error();
}else{
    echo "Se ha eliminado el Descuento";
}
if(!$consulta1){
    echo "Error al eliminar los datos ". mysqli_error();
}else{
}
mysqli_close($conexion);
mysqli_close($conexion1);
?>
