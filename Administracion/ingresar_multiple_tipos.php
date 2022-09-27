<?php
header("Content-Type: text/html;charset=utf-8");
$conexion2 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion2,"utf8");
if(!$conexion2){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$fecha_insta = $_POST["fecha_insta"];
$instalador = $_POST["instalador"];
$id = $_POST["id"];
$tipoinicio = $_POST["tipoinicio"];
$tipo_inicios = utf8_decode($tipoinicio);
$cliente = $_POST["cliente"];
$consulta2 = mysqli_query($conexion2,"Call Ingresar_Pago ('$instalador','$fecha_insta','$id','$cliente','$tipo_inicios') ")or die ("P: ".mysqli_error($conexion2));
if(!$consulta2){
    echo "Error al modificar los datos". mysqli_error();
}else{
}
?>
