<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$nombre_repuesto = $_POST["nombre_repuesto"];
$consulta = mysqli_query($conexion,"Call Mostrar_Precio_Repuesto ('$nombre_repuesto')");
if(!$consulta){
    echo "Error al insertar los datos ". mysqli_error();
}else{
    if (mysqli_num_rows($consulta) == 0){
        echo "No existe el Precio";
    }else{
        if($row2 = mysqli_fetch_array($consulta)) {
            echo $row2[0];
        }
    }
}
?>
