<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$id_coti = $_POST["id_coti"];
$cant = $_POST["cant"];
$otro = $_POST["otro"];
$valor_un = $_POST["valor_un"];
$valor_tot = $_POST["valor_tot"];
$id1 = $_POST["id1"];
$id2 = $_POST["id2"];
$id3 = $_POST["id3"];
$nombre_otro = $_POST["nombre_otro"];
$consulta = mysqli_query($conexion,"Call Ingresar_Cotizacion_Otros_Solo ('$id_coti','$cant','$otro','$valor_un','$valor_tot','$id1','$id2','$id3','$nombre_otro')") or die (mysqli_error($conexion));
if(!$consulta){
    echo "Error al insertar los datos ". mysqli_error();
}else{
}
?>
