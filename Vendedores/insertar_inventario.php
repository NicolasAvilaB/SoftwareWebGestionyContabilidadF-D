<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$fecha = $_POST["fecha"];
$nfactura = $_POST["nfactura"];
$tecnico = $_POST["tecnico"];
$valor = $_POST["valor"];
$consulta = mysqli_query($conexion,"Call Ingresar_Factura_Inventario ('$fecha','$nfactura','$tecnico','$valor')");
if(!$consulta){
    echo "Error al insertar los datos ". mysqli_error();
}else{
    echo "Se ha insertado en Inventario";
}
?>
