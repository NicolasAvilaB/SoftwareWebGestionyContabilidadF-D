<?php
header("Content-Type: application/json");
$pdo=new PDO("mysql:host=localhost;dbname=nicolas_socifyd;charset=utf8", "nicolas_usersoc", "usersocifyd");
$texto = $_REQUEST["texto"];
$sentenciaSQL = $pdo->prepare("Call Consultar_FechaInstalacion_Inicio_Calendario()");
$sentenciaSQL->execute();
$datos = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
$eventos = array();
foreach($datos as $resultado){
    $id = $resultado['id'];
    $title = $resultado['title'];
    $start = $resultado['start'];
    $end = $resultado['end'];
    $instalador = $resultado['Instalador'];
    $color = $resultado['color'];
    $instalacion2 = $resultado['Instalación2'];
    $tipo = $resultado['tipo'];
    $instalacion4 = $resultado['Instalación4'];
    $instalacion5 = $resultado['Instalación5'];
    $instalacion6 = $resultado['Instalación6'];
    $instalacion7 = $resultado['Instalación7'];
    $instalacion8 = $resultado['Instalación8'];
    $idcliente = $resultado['IdCliente'];
    $observacionet = $resultado['Observacionet'];
    $vendedoras = $resultado['Vendedoras'];
    $textcolor = $resultado['textColor'];
    if($texto != $vendedoras && $tipo == 'Restificación' || $texto != $vendedoras && $tipo == 'Visita Técnica' || $texto != $vendedoras && $tipo == 'Reparación'){
        $id = 'Ocupado';
        $title = 'Ocupado';
        $start = $resultado['start'];
        $end = $resultado['end'];
        $instalador = 'Ocupado';
        $color = 'Ocupado';
        $instalacion2 = 'Ocupado';
        $tipo = 'Ocupado';
        $instalacion4 = 'Ocupado';
        $instalacion5 = 'Ocupado';
        $instalacion6 = 'Ocupado';
        $instalacion7 = 'Ocupado';
        $instalacion8 = 'Ocupado';
        $idcliente = 'Ocupado';
        $observacionet = 'Ocupado';
        $vendedoras = 'Ocupado';
        $textcolor = 'Ocupado';
    }
    $eventos[] = array('id' => $id,
    'title' => $title,
    'start' => $start,
    'end' => $end,
    'Instalador' => $instalador,
    'color' => $color,
    'Instalación2' => $instalacion2,
    'tipo' => $tipo,
    'Instalación4' => $instalacion4,
    'Instalación5' => $instalacion5,
    'Instalación6' => $instalacion6,
    'Instalación7' => $instalacion7,
    'Instalación8' => $instalacion8,
    'IdCliente' => $idcliente,
    'Observacionet' => $observacionet,
    'Vendedoras' => $vendedoras,
    'textColor' => $textcolor);
}
echo json_encode($eventos, JSON_UNESCAPED_UNICODE);
?>
