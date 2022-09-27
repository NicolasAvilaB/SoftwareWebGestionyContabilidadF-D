<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$empresa = $_POST["empresa"];
$consulta = mysqli_query($conexion,"Call Prom_Venta2_Roller_Todo ('$empresa')");
if(!$consulta){
    echo "Error al insertar los datos ". mysqli_error();
}else{
}
?>
