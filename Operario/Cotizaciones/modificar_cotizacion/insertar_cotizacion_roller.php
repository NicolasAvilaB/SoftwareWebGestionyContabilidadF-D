<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$id_coti = $_POST["id_coti"];
$fc = $_POST["fc"];
$cant = $_POST["cant"];
$ancho = $_POST["ancho"];
$alto = $_POST["alto"];
$lama = $_POST["lama"];
$color = $_POST["color"];
$accion = $_POST["accion"];
$valor_un = $_POST["valor_un"];
$valor_tot = $_POST["valor_tot"];
$consulta = mysqli_query($conexion,"Call Ingresar_Cotizacion_Roller ('$id_coti','$fc','$ancho','$alto','$cant','$lama','$color','$accion','$valor_un','$valor_tot')");
if(!$consulta){
    echo "Error al insertar los datos ". mysqli_error();
}else{
}
?>
