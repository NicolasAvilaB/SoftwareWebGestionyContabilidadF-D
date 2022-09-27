<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$id = $_POST["id"];
$medio_pago = $_POST["medio_pago"];
$consulta_actualizar_medio_pago = mysqli_query($conexion,"Call Modificar_Medio_Pago ('$id','$medio_pago')") or die ("P: ".mysqli_error($conexion));
if(!$consulta_actualizar_medio_pago){
    echo "Error al ingresar los datos". mysqli_error();
}else{
}
?>
