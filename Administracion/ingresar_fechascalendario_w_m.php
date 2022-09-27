<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$id = $_POST["id"];
$fechas_instalaciones = $_POST["fechas_instalaciones"];
$consulta = mysqli_query($conexion,"Call Ingresar_FechasInstalaciones_WM_Concatenado ('$id','$fechas_instalaciones')") or die ("P: ".mysqli_error($conexion));
if(!$consulta){
    echo "Error al modificar los datos". mysqli_error();
}else{}
?>
