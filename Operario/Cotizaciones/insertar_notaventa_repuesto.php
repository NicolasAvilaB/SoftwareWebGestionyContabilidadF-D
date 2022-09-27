<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$id = $_POST["id"];
$n = $_POST["n"];
$f = $_POST["f"];
$a = $_POST["a"];
$consulta = mysqli_query($conexion,"Call Pasar_Nota_Venta_Repuesto ('$id','$n','$f','$a')");
if(!$consulta){
    echo "Error al insertar los datos ". mysqli_error();
}else{
    echo "Se ha insertado la Nota de Venta (Repuesto)";
}
?>
