<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$numero_id_pago = $_POST["numero_id_pago"];
$plata = $_POST["plata"];
$consulta = mysqli_query($conexion,"update Pagos set Bono_Desc = Bono_Desc - '$plata' where Id = '$numero_id_pago'");
if(!$consulta){
    echo "Error al insertar los datos ". mysqli_error();
}else{}
?>
