<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion2 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion3 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$id = $_POST["id"];
$fecha = $_POST["fecha"];
$cant = $_POST["cant"];
$vaunit = $_POST["vaunit"];
$vatotal = $_POST["vatotal"];
$tipo = $_POST["tipo"];
$tecnico = $_POST["tecnico"];
$notaventa = $_POST["notaventa"];
$detalle = utf8_decode($tipo." ".$tecnico);
$idpagado = $_POST["idpagado"];
$consulta = mysqli_query($conexion,"Call Pagar_Sueldo ('$id','$fecha','$cant','$vaunit','$vatotal','$idpagado')");
if ($notaventa == '0'){
    $consulta2 = mysqli_query($conexion2,"Call Ingresar_Gasto ('$detalle','$fecha','$vatotal')");
}/*elseif ($notaventa != '0') {
    $consulta3 = mysqli_query($conexion3,"Call Ingresar_PagoInstalacion ('$detalle','$fecha','$vatotal')");
}*/
if(!$consulta){
    echo "Error al insertar los datos ". mysqli_error();
}else{}
?>
