<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$fechare = $_POST["fechare"];
$detallere = $_POST["detallere"];
$tecnicore = $_POST["tecnicore"];
$tecnicoin = $_POST["tecnicoin"];
$prod = $_POST["prod"];
$cant = $_POST["cant"];
$tipoingreso = $_POST["tipoingreso"];
$consulta = mysqli_query($conexion,"Call Ingresar_Retiro_Ingreso_Inventario_Tecnico ('$fechare','$detallere','$tecnicore','$tecnicoin','$prod','$cant','$tipoingreso')");
if(!$consulta){
    echo "Error al insertar los datos ". mysqli_error();
}else{
    echo "Se ha realizado el Retiro";
}
?>
