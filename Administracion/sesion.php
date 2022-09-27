<?php
session_start();
if(!isset($_SESSION['empresa'])){
    session_destroy();
    //header('Location: http://socfyd.cl');
    echo "0";
    exit;
} else {
    $valor_nombre = $_SESSION['nombre'];
    $valor_idempresa = $_SESSION['idempresa'];
    $valor_empresa = $_SESSION['empresa'];
}
?>