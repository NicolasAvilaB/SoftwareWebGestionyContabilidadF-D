<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion0 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$id = $_POST["id"];
$fechapago = $_POST["fechapago"];
$abono = $_POST["abono"];
$mediopago = $_POST["mediopago"];
$idnota = $_POST["idnota"];
$consulta = mysqli_query($conexion,"Call Modificar_Abonos_NotaVenta ('$id','$fechapago','$abono','$mediopago')");
$consulta0 = mysqli_query($conexion0,"Call Modificar_Abonos_NotaVenta_Sumado ('$idnota','$abono')") or die (mysqli_error($conexion0));
if(!$consulta){
    echo "Error al insertar los datos ". mysqli_error();
}else{
}
?>
