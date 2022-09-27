<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$id = $_REQUEST["id"];
$n = $_REQUEST["n"];
$f = $_REQUEST["f"];
$id_empresa = $_REQUEST["id_empresa"];
if($consulta0 = $conexion->query("Call Borrar_Descuento_B_Cotizacion_Persiana ('$id','$n','$f','$id_empresa')")){
    if(!$consulta0){
        echo "Error al insertar los datos ". mysqli_error();
    }else{}
}
?>
