<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$notaventacredito_add = $_POST["notaventacredito_add"];
$fechacredito_add = $_POST["fechacredito_add"];
$ncredito_add = $_POST["ncredito_add"];
$valorcredito_add = $_POST["valorcredito_add"];
$consulta = mysqli_query($conexion,"Call Ingresar_NotaCredito ('$ncredito_add','$notaventacredito_add','$fechacredito_add','$valorcredito_add')");
if(!$consulta){
    echo "Error al insertar los datos ". mysqli_error();
}else{
    echo "Se han insertado los datos";
}
?>
