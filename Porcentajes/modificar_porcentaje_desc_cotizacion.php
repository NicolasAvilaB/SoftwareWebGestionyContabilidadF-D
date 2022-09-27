<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$desc1_per = $_POST["desc1_per"];
$desc2_rol = $_POST["desc2_rol"];
$desc_fin = $_POST["desc_fin"];
$consulta = mysqli_query($conexion,"Call Modificar_Porcentaje_Desc_Cotizacion ('$desc1_per','$desc2_rol','$desc_fin')") or die (mysqli_error($conexion));
if(!$consulta){
    echo "Error al insertar los datos ". mysqli_error();
}else{
}
?>
