<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$nota = $_POST["nota"];
$consulta = mysqli_query($conexion,"Call Buscar_Numero_Observacion_Descuento_Notaventa ('$nota')");
if(!$consulta){
    echo "Error al insertar los datos ". mysqli_error();
}else{
    if($row = mysqli_fetch_array($consulta)){
        echo $row[0];
    }
}
?>
