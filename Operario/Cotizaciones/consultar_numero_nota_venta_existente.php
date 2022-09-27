<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$id = $_REQUEST["id"];
if($consulta = $conexion->query("Call Buscar_Numero_Nota_Venta_Existente('$id')")){
    if(!$consulta){
        echo "Error al insertar los datos ". mysqli_error();
    }else{
        $row_cnt = $consulta->num_rows;
        if ($row_cnt > 0){
            echo 1;
        }
    }
}
?>
