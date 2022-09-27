<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}
$texto = $_REQUEST["texto"];
$texto2 = $_REQUEST["texto2"];
$descripcion = "";
$consulta = mysqli_query($conexion, "Call Consultar_FechaInstalacion_Inicio_Calendario_ResumenDia_DI ('$texto','$texto2')") or die (mysqli_error($conexion));
while ($row = mysqli_fetch_array($consulta)){
    $descripcion .= $row[8].' / '.$row[1].' / '.$row[10].' - '.$row[9].' / '.$row[6]."<br> </br>";
}
echo $descripcion;
$consulta->close();
$conexion->more_results();
?>
