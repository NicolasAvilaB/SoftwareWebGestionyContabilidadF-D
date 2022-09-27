<?php
header("Content-Type: application/json");
$pdo=new PDO("mysql:host=localhost;dbname=cso72566_socifyd;charset=utf8", "cso72566_usersocifyd", "usersocifyd");
$texto = $_REQUEST["texto"];
$sentenciaSQL = $pdo->prepare("Call Consultar_FechaInstalacion_Inicio_Calendario_FiltroTecnico('$texto')");
$sentenciaSQL->execute();
$resultado = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resultado);
?>
