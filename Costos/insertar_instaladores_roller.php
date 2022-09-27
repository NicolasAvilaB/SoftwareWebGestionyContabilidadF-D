<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$inst = $_POST["inst"];
$roller1 = $_POST["roller1"];
$roller2 = $_POST["roller2"];
$manual = $_POST["manual"];
$motor = $_POST["motor"];
$id = $_POST["id"];
$inst = str_replace('<span style="font-size: 15.026px;">', '', $inst);
$inst = str_replace('<', '', $inst);
$inst = str_replace('>', '', $inst);
$inst = str_replace('span', '', $inst);
$inst = str_replace('style=', '', $inst);
$inst = str_replace('font-size: ', '', $inst);
$inst = str_replace('15.026px;', '', $inst);
$inst = str_replace('px;', '', $inst);
$inst = str_replace('"', '', $inst);
$inst = str_replace('</span>', '', $inst);
$inst = str_replace('&nbsp;', '', $inst);
$consulta = mysqli_query($conexion,"Call Ingresar_Instaladores_Roller ('$inst','$roller1','$roller2','$manual','$motor','$id')") or die (mysqli_error($conexion));
if(!$consulta){
    echo "Error al insertar los datos ". mysqli_error();
}else{
}
?>
