<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion2 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$id = $_POST["id"];
$consulta2 = mysqli_query($conexion2,"Call Eliminar_Cotizacion_Vendedora_Parte1 ('$id')");    
$consulta3 = mysqli_query($conexion2,"Call Eliminar_Cotizacion_Vendedora_Parte2 ('$id')");    
$consulta4 = mysqli_query($conexion2,"Call Eliminar_Cotizacion_Vendedora_Parte3 ('$id')"); 
$consulta = mysqli_query($conexion,"Call Eliminar_Cotizacion_Vendedora ('$id')");
if(!$consulta){
    echo "Error al eliminar los datos ". mysqli_error();
}else{
    echo "Se ha eliminado la Cotización";
}
?>
