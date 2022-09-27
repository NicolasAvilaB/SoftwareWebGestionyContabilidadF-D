<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$texto = $_POST["texto"];
$consulta = mysqli_query($conexion,"Call Buscar_NotaVenta_Otros_Mantencion ('$texto')") or die(mysqli_error($conexion));
if(!$consulta){
    echo "Error al insertar los datos ". mysqli_error();
}else{
    if($consulta){
        if ($consulta || mysqli_num_rows($consulta) > 0){
            if($row = mysqli_fetch_array($consulta)){
                echo "$ ".number_format($row[0], 0, ',', '.')."";
            }
        }else if (!$consulta || mysqli_num_rows($consulta) == 0){
            echo "$ 0";
        }
    }else{
        echo "$ 0";
    }
}
?>
