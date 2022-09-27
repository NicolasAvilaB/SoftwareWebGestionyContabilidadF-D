<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$acc = $_POST["acc"];
$valor = $_POST["valor"];
$id = $_POST["id"];
$acc = str_replace('<span style="font-size: 15.026px;">', '', $acc);
$acc = str_replace('<', '', $acc);
$acc = str_replace('>', '', $acc);
$acc = str_replace('span', '', $acc);
$acc = str_replace('style=', '', $acc);
$acc = str_replace('font-size: ', '', $acc);
$acc = str_replace('15.026px;', '', $acc);
$acc = str_replace('px;', '', $acc);
$acc = str_replace('"', '', $acc);
$acc = str_replace('</span>', '', $acc);
$acc = str_replace('&nbsp;', '', $acc);
$consulta = mysqli_query($conexion,"Call Ingresar_Accionamiento ('$acc','$valor','$id')");
if(!$consulta){
    echo "Error al insertar los datos ". mysqli_error();
}else{
}
?>
