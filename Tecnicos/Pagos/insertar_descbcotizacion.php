<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$cot = $_POST["cot"];
$valor = $_POST["valor"];
$consulta0 = mysqli_query($conexion,"delete from Descuento_B_Cotizacion where IdCotizacion = '$cot'");
$consulta = mysqli_query($conexion,"Call Ingresar_Desc_B_Cotizacion ('$cot','$valor')");
if(!$consulta){
    echo "Error al insertar los datos ". mysqli_error();
}else{
}
?>
