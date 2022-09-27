<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<noscript>
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=java.html">
</noscript>
<style type="text/css">
@import url("calendario_vend.css");
</style>
<link href="calendario_vend.css" rel="stylesheet" type="text/css">
<!--<link rel="stylesheet"  href="../Imagenes/jquery.dataTables.min.css" type="text/css">-->
<link rel="icon" href="../Imagenes/logofinder.png">
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
<!--<script src="../Imagenes/jquery.dataTables.min.js"></script>-->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
/*$(document).ready( function () {
    $('#tabla_clientes').DataTable();
});*/
</script>
<article src="../Imagenes/fondo_login.jpg" id="contenedor_carga">
	<img src="../Imagenes/carga.png" id="carga"></img>
</article>
<script>
	window.onload = function(){
	var contenedor = document.getElementById('contenedor_carga');
	contenedor.style.visibility = 'hidden';
	contenedor.style.opacity = '0';
	var carg = document.getElementById('carga');
    carg.style.animationPlayState = "paused";
	}
</script>
<?php
session_start();
if(!isset($_SESSION['empresa'])){
    header('Location: http://nalo.cf');
    exit;
} else {
    $valor_nombre = $_SESSION['nombre'];
    $valor_idempresa = $_SESSION['idempresa'];
    $valor_empresa = $_SESSION['empresa'];
    $valor_usuario = $_SESSION['usuario'];
}
?>
<script>
var nuevoalias = jQuery.noConflict();
nuevoalias(document).ready(function(){
    nuevoalias("#campo_texto_cliente").css("display", "none");
    nuevoalias("#result").css("display", "none");
    nuevoalias("#modal_ver_abonos4").css("display", "none");
    nuevoalias.ajax({
        url:"./calendario/calendario.php",
        method:"POST",
        cache:false,
        data: {id: '', select_detalle: '1', vend: '<?php echo $valor_nombre?>'},
        success: function(data){
            nuevoalias("#tablascroll").css("width", "98%");
            nuevoalias("#tablascroll").css("margin-top","5px");
            nuevoalias("#tablascroll").css("margin-left","0px");
            nuevoalias("#result").css("display","block");
            nuevoalias("#result").html(data);
            nuevoalias("#lateral-derecho").css("display","none");
            nuevoalias(".tablascroll2").css("width", "97%");
        }
    });
    nuevoalias(".modal-content").draggable({
        handle: ".cuadrado_modal"
    });
});
</script>
</head>
<!-- <img class="dis" src="Imagenes/logo.jpg" width="318" height="160"> -->
<title>Sociedad FYD - Gestión y Contabilidad </title>
<body oncontextmenu="return false">
<img src="../Imagenes/fondo_login.jpg" id="fondo"/>
<p></p>
<div class="form1">
<div class="form0">
<aside class="cuadrado">
<label class="adorno_botones"><img src="../Imagenes/wincontrol.png"></img></label>
<label class= "titulo2">Clientes </label>
<form id="form" class="form" name="form" method="POST">
<p>
    <input type="submit" onclick="" id="inicio" name="inicio" class="botones_barra" value="Inicio">
    <input type="submit" onclick="" id="clientes" name="clientes" class="botones_barra" value="Clientes">
    <input type="submit" onclick="" id="cotizaciones" name="cotizaciones" class="botones_barra" value="Cotizaciones">
    <input type="submit" onclick="" id="notaventa" name="notaventa" class="botones_barra" value="Nota Venta">
    <input type="submit" onclick="" id="calvend" name="calvend" class="botones_barra" value="Calendario">
    <label class="holavendedor"><?php echo "<label style='font-weight:600;'>".$valor_empresa."</label> - Hola, " . $valor_nombre ?>
    <input type="submit" onclick="" id="ce" class="ce" name="ce" value="Cerrar Sesión"></label></p>
</aside>
<?php
    if(isset($_POST["inicio"])){
        echo "<script>location.replace('../menu.php')</script>";
	}
	if(isset($_POST["clientes"])){
        session_start();
		$_SESSION['nombre'] = $valor_nombre;
		$_SESSION['idempresa'] = $valor_idempresa;
		$_SESSION['empresa'] = $valor_empresa;
		echo "<script>location.replace('../Clientes/clientes.php')</script>";
	}
	if(isset($_POST["cotizaciones"])){
        session_start();
		$_SESSION['nombre'] = $valor_nombre;
		$_SESSION['idempresa'] = $valor_idempresa;
		$_SESSION['empresa'] = $valor_empresa;
		echo "<script>location.replace('../Cotizaciones/cotizaciones.php')</script>";
	}
	if(isset($_POST["notaventa"])){
        session_start();
		$_SESSION['nombre'] = $valor_nombre;
		$_SESSION['idempresa'] = $valor_idempresa;
		$_SESSION['empresa'] = $valor_empresa;
		echo "<script>location.replace('../NotaVenta/ventas.php')</script>";
	}
	if(isset($_POST["calvend"])){
        session_start();
		$_SESSION['nombre'] = $valor_nombre;
		$_SESSION['idempresa'] = $valor_idempresa;
		$_SESSION['empresa'] = $valor_empresa;
		echo "<script>location.replace('../Calendario/calendario_vend.php')</script>";
	}
    if(isset($_POST["ce"])){
        session_destroy();
	    echo "<script>location.replace('http://nalo.cf')</script>";
	    exit;
	}
?>
</p>
<p>
</form>
</div>
<div class="tablascroll">
    <aside id="result"><b></b></aside>
    <br></br>
</div>
</div>
<p class="titulo75">SOCIEDAD FYD</p>
<p class="copy">Copyright © 2021 | Diseñado por N.A.B para Comercial F&amp;D</p>
</body>
</html>
