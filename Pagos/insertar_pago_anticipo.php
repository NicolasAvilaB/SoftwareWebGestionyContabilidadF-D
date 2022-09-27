<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$tecnico = $_POST["tecnico"];
$fecha = $_POST["fecha"];
$valor = $_POST["valor"];
$detalle = $_POST["detalle"];
$valor_sino = $_POST["valor_sino"];
$consulta = mysqli_query($conexion,"Call Ingresar_Pago_Anticipo ('$tecnico','$fecha','$valor','$detalle','$valor_sino')");
if(!$consulta){
    echo "Error al insertar los datos ". mysqli_error();
}else{}
?>
