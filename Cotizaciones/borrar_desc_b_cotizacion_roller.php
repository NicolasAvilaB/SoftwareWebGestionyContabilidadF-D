<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$id = $_POST["id"];
$n = $_POST["n"];
$f = $_POST["f"];
$id_empresa = $_POST["id_empresa"];
$consulta0 = mysqli_query($conexion,"Call Borrar_Descuento_B_Cotizacion_Roller ('$id','$n','$f','$id_empresa')") or die ("P:".mysqli_error($conexion));
if(!$consulta){
    echo "Error al insertar los datos ". mysqli_error();
}else{
}
?>
