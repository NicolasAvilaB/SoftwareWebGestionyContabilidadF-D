<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$desp1 = $_POST["desp1"];
$desp1 = str_replace(',', '.', $desp1);
$desp2 = $_POST["desp2"];
$desp2 = str_replace(',', '.', $desp2);
$desv1 = $_POST["desv1"];
$desv1 = str_replace(',', '.', $desv1);
$desv2 = $_POST["desv2"];
$gan = $_POST["gan"];
$gan = str_replace(',', '.', $gan);
$la = $_POST["la"];
$consulta = mysqli_query($conexion,"Call Modificar_Porcentaje ('$desp1','$desp2','$desv1','$desv2','$gan','$la')");
if(!$consulta){
    echo "Error al insertar los datos ". mysqli_error();
}else{
}
?>
