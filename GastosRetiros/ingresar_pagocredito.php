<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$fecha_add= $_POST["fecha_add"];
$detalle_add = $_POST["detalle_add"];
$valor_add = $_POST["valor_add"];
$consulta = mysqli_query($conexion,"Call Ingresar_PagoCredito ('$detalle_add','$fecha_add','$valor_add')");
if(!$consulta){
    echo "Error al insertar los datos ". mysqli_error();
}else{
    echo "Se han insertado el Pago Crédito";
}
?>
