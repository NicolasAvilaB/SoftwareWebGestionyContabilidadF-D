<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$nv = $_POST["nv"];
$manual = $_POST["manual"];
$control = $_POST["control"];
$reparacion = $_POST["reparacion"];
$motor = $_POST["motor"];
$mantencion = $_POST["mantencion"];
$valor = $_POST["valor"];
$fecha = $_POST["fecha"];
$tecnico = $_POST["tecnico"];
$traslado = $_POST["traslado"];
$roller = $_POST["roller"];
$varios = $_POST["varios"];
$consulta = mysqli_query($conexion,"Call Ingresar_PagoInstalacion ('$nv','$manual','$control','$reparacion','$motor','$mantencion','$valor','$fecha','$tecnico','$traslado','$roller','$varios')");
if(!$consulta){
    echo "Error al insertar los datos ". mysqli_error();
}else{
    echo "Se ha insertado el Pago Instalacion";
}
mysqli_close($conexion);
?>
