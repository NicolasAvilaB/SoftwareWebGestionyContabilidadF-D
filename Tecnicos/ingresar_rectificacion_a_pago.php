<?php
header("Content-Type: text/html;charset=utf-8");
$conexion2 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion2,"utf8");
if(!$conexion2){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$fecha_rect = $_POST["fecha_rect"];
$instalador = $_POST["instalador"];
$cliente = $_POST["cliente"];
$idrect = $_POST["idrect"];
$consulta2 = mysqli_query($conexion2,"Call Ingresar_Pago_Rectificacion ('$instalador','$fecha_rect',$idrect,'$cliente','Rectificación') ")or die ("P: ".mysqli_error($conexion2));
if(!$consulta2){
    echo "Error al modificar los datos". mysqli_error();
}else{}
?>
