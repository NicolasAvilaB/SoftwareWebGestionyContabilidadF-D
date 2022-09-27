<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$id = $_POST["id"];
$fecha_ins = $_POST["fecha_ins"];
$consulta = mysqli_query($conexion,"Call Ingresar_FechasInstalaciones_WM ('$id','$fecha_ins')") or die ("P: ".mysqli_error($conexion));
if(!$consulta){
    echo "Error al modificar los datos". mysqli_error();
}else{}
?>
