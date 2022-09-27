<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$id = $_POST["id"];
$nombre = $_POST["nombre"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$comuna = $_POST["comuna"];
$fecha = $_POST["fecha"];
$nombre = str_replace('Vendido', '', $nombre);
$direccion = str_replace('Deuda', '', $direccion);
$consulta = mysqli_query($conexion,"Call Ingresar_Clientes_Datos ('$id','$nombre','$direccion','$telefono','$email','$comuna','$fecha')")or die ("Problemas al insertar".mysqli_error($conexion));
if(!$consulta){
    echo "Error al insertar los datos". mysqli_error();
}else{
    echo "Datos Adicionales Ingresados";
}
mysqli_close($conexion);
?>
