<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$roller = $_POST["roller"];
$ancho = $_POST["ancho"];
$alto = $_POST["alto"];
$texto = $_POST["texto"];
$ancho = str_replace('.', '', $ancho);
$alto = str_replace('.', '', $alto);
$texto = str_replace('.', '', $texto);
$ancho = str_replace(',', '', $ancho);
$alto = str_replace(',', '', $alto);
$texto = str_replace(',', '', $texto);
if ($texto == 0 || $texto == ""  || $ancho == 0 || $ancho == ""){
}else{
$consulta = mysqli_query($conexion,"Call Ingresar_Roller ('$roller','$ancho','$alto','$texto')");
}
if(!$consulta){
    echo "Error al insertar los datos ". mysqli_error();
}else{
}
?>
