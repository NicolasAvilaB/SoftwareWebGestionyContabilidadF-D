<?php
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$texto= $_POST["texto"];
$consulta = mysqli_query($conexion,"Call Completar_Evento_Calendario_Vendedora ('$texto')");
if(!$consulta){
    echo "Error al insertar los datos ". mysqli_error();
}else{
}
?>
