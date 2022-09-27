<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$idrest = $_POST["idrest"];
$tecn = $_POST["tecn"];
$n = $_POST["n"];
$ubic = $_POST["ubic"];
$piso = $_POST["piso"];
$fc = $_POST["fc"];
$ancho = $_POST["ancho"];
$alto = $_POST["alto"];
$motor = $_POST["motor"];
$manual = $_POST["manual"];
$tclick = $_POST["tclick"];
$crto = $_POST["crto"];
$cajon = $_POST["cajon"];
$guia = $_POST["guia"];
$ventana = $_POST["ventana"];
$perfiles = $_POST["perfiles"];
$escala = $_POST["escala"];
$lama = $_POST["lama"];
$color = $_POST["color"];
$consulta = mysqli_query($conexion,"Call Ingresar_Restificacion_Tecnico ('$idrest','$tecn','$n','$ubic','$piso','$fc','$ancho','$alto','$motor','$manual','$tclick','$crto','$cajon','$guia','$ventana','$perfiles','$escala','$lama','$color')");
if(!$consulta){
    echo "Error al insertar los datos ". mysqli_error();
}else{
    echo "Se ha insertado la Restificación";
}
?>
