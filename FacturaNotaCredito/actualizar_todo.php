<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$notaventa = $_POST["notaventa"];
$fecha = $_POST["fecha"];
$valor = $_POST["valor"];
$tipo = $_POST["tipo"];
$id = $_POST["id"];
$consulta = mysqli_query($conexion,"Call Modificar_Factura_Credito_Todo ('$notaventa','$fecha','$valor','$tipo','$id')")or die ("Problemas al insertar".mysqli_error($conexion));
if(!$consulta){
    echo "Error al insertar los datos". mysqli_error();
}else{
    echo "Se han modificado los datos";
}
mysqli_close($conexion);
?>
