<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$notaventafactura_add = $_POST["notaventafactura_add"];
$fechafactura_add = $_POST["fechafactura_add"];
$nfactura_add = $_POST["nfactura_add"];
$valorfactura_add = $_POST["valorfactura_add"];
$consulta = mysqli_query($conexion,"Call Ingresar_Factura ('$nfactura_add','$notaventafactura_add','$fechafactura_add','$valorfactura_add')");
if(!$consulta){
    echo "Error al insertar los datos ". mysqli_error();
}else{
    echo "Se han insertado los datos";
}
?>
