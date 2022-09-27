<?php
header("Content-Type: application/json");
$pdo=new PDO("mysql:host=localhost;dbname=nicolas_socifyd;charset=utf8", "nicolas_usersoc", "usersocifyd");
$sentenciaSQL = $pdo->prepare("Call Consultar_FechaInstalacion_Inicio_Calendario()");
$sentenciaSQL->execute();
$resultado = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resultado);
?>
