<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}
$consulta = $conexion->query("select MAX(IDPagado) as 'IDPagado' from Pagos");
while($row = $consulta->fetch_assoc()){
    echo $row["IDPagado"] + 4;
}
?>
