<?php
header("Content-Type: text/html;charset=utf-8");
$conexion2 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion2,"utf8");
if(!$conexion2){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$id = $_POST["id"];
$tipoinicio = $_POST["tipoinicio"];
$tipoinput = $_POST["tipoinput"];
$instalador = $_POST["instalador"];
$fecha_insta = $_POST["fecha_insta"];
$consulta2 = mysqli_query($conexion2,"Call Modificar_Pago ('$id','$tipoinput','$tipoinicio','$instalador','$fecha_insta') ")or die ("P: ".mysqli_error($conexion2));
if(!$consulta2){
    echo "Error al modificar los datos". mysqli_error();
}else{}
?>
