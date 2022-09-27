<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<noscript>
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=java.html">
</noscript>
<style type="text/css">
@import url("promganancia.css");
</style>
<link href="promganancia.css" rel="stylesheet" type="text/css">
<link rel="stylesheet"  href="../Imagenes/jquery.dataTables.min.css" type="text/css">
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
<script src="../Imagenes/jquery.dataTables.min.js"></script>
<script src="https://www.w3schools.com/lib/w3.js"></script>
<script>
$(document).ready( function () {
    $('#tabla_clientes').DataTable();
});
</script>
<article src="../Imagenes/fondo_login.jpg" id="contenedor_carga">
	<img src="../Imagenes/carga.png" id="carga"></img>
</article>
<script>
window.onload = function(){
    $("#contenedor_carga").css({"visibility": "hidden", "opacity": "0"});
    $("#carga").css("animation-play-state", "paused");
}
</script>
</head>
<?php
session_start();
if(!isset($_SESSION['empresa'])){
    header('Location: http://nalo.cf');
    exit;
} else {
    $valor_nombre = $_SESSION['nombre'];
    $valor_idempresa = $_SESSION['idempresa'];
    $valor_empresa = $_SESSION['empresa'];
}
?>
<!-- <img class="dis" src="Imagenes/logo.jpg" width="318" height="160"> -->
<title>Sociedad FYD - Gestión y Contabilidad </title>
<body>
<img src="../Imagenes/fondo_login.jpg" id="fondo"/>
<p></p>
<div class="form1">
<div class="form0">
<aside class="cuadrado">
<label class="adorno_botones"><img src="../Imagenes/wincontrol.png"></img></label>
<label id="titulo2" class= "titulo2">Promedio Ganancia </label>
<form id="form" class="form" name="form" method="POST">
    <p class="btn_arriba">
        <div class="dropdown">
          <div id="myDropdown" class="dropdown-content">
              <p id="espacio_primario"></p>
            <input type="submit" onclick="" id="inicio" name="inicio" class="botones_barra" value="Inicio">
            <p id="espacio"></p>
            <input type="submit" onclick="" id="clientes" name="clientes" class="botones_barra" value="Clientes">
            <p id="espacio"></p>
            <input type="submit" onclick="" id="cotizaciones" name="cotizaciones" class="botones_barra" value="Cotizaciones">
            <p id="espacio"></p>
            <input type="submit" onclick="" id="notaventa" name="notaventa" class="botones_barra" value="Nota Venta">
            <p id="espacio"></p>
            <input type="submit" onclick="" id="editarventa" name="editarventa" class="botones_barra" value="Editar Venta">
            <p id="espacio"></p>
            <input type="submit" onclick="" id="vendedores" name="vendedores" class="botones_barra" value="Vendedores">
            <p id="espacio"></p>
            <input type="submit" onclick="" id="costos" name="costos" class="botones_barra" value="Costos">
            <p id="espacio"></p>
            <input type="submit" onclick="" id="pagos" name="pagos" class="botones_barra" value="Pagos">
            <p id="espacio"></p>
            <input type="submit" onclick="" id="calendario" name="calendario" class="botones_barra" value="Calendario">
            <p id="espacio"></p>
            <input type="submit" onclick="" id="porcentaje" name="porcentaje" class="botones_barra" value="Porcentajes">
            <p id="espacio"></p>
            <input type="submit" onclick="" id="descinst" name="descinst" class="botones_barra" value="Instalaciones">
            <p id="espacio"></p>
            <input type="submit" onclick="" id="promv" name="promv" class="botones_barra" value="Prom. Ventas">
            <p id="espacio"></p>
            <input type="submit" onclick="" id="promg" name="promg" class="botones_barra" value="Prom. Ganancia">
            <p id="espacio"></p>
            <input type="submit" onclick="" id="descadmin" name="descadmin" class="botones_barra" value="Desc. Admin">
            <p id="espacio"></p>
            <input type="submit" onclick="" id="ingrfact" name="ingrfact" class="botones_barra" value="Ing. Factura">
            <p id="espacio"></p>
            <input type="submit" onclick="" id="gastos" name="gastos" class="botones_barra" value="Gastos y Retiros">
            <p id="espacio"></p>
            <input type="submit" onclick="" id="ganancias" name="ganancias" class="botones_barra" value="Ganancias">
            <p id="espacio"></p>
            <input type="submit" onclick="" id="vpersianas" name="vpersianas" class="botones_barra" value="Ventas Persianas">
            <p id="espacio"></p>
          </div>
        </div>
        <label class="empresa"><?php echo $valor_empresa; ?></label>
        <label class="holaadmin"><?php echo "Hola, " . $valor_nombre ?><input type="submit" onclick="" id="ce" class="ce" name="ce" value="Cerrar Sesión"></label>
    </p>
</aside>
<?php
    if(isset($_POST["inicio"])){
        echo "<script>location.replace('../Administracion/menu_admin.php')</script>";
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
	if(isset($_POST["editarventa"])){
        session_start();
		$_SESSION['nombre'] = $valor_nombre;
		$_SESSION['idempresa'] = $valor_idempresa;
		$_SESSION['empresa'] = $valor_empresa;
		echo "<script>location.replace('../EditarVenta/editarventa.php')</script>";
	}
	if(isset($_POST["costos"])){
        session_start();
		$_SESSION['nombre'] = $valor_nombre;
		$_SESSION['idempresa'] = $valor_idempresa;
		$_SESSION['empresa'] = $valor_empresa;
		echo "<script>location.replace('../Costos/costos.php')</script>";
	}
	if(isset($_POST["porcentaje"])){
        session_start();
		$_SESSION['nombre'] = $valor_nombre;
		$_SESSION['idempresa'] = $valor_idempresa;
		$_SESSION['empresa'] = $valor_empresa;
	    echo "<script>location.replace('../Porcentajes/porcentaje.php')</script>";
	}
	if(isset($_POST["vendedores"])){
        session_start();
		$_SESSION['nombre'] = $valor_nombre;
		$_SESSION['idempresa'] = $valor_idempresa;
		$_SESSION['empresa'] = $valor_empresa;
		echo "<script>location.replace('../Vendedores/vendedores.php')</script>";
	}
	if(isset($_POST["descinst"])){
        session_start();
		$_SESSION['nombre'] = $valor_nombre;
		$_SESSION['idempresa'] = $valor_idempresa;
		$_SESSION['empresa'] = $valor_empresa;
		echo "<script>location.replace('../DescuentoInstalacion/descuentoinstalacion.php')</script>";
	}
	if(isset($_POST["promv"])){
        session_start();
		$_SESSION['nombre'] = $valor_nombre;
		$_SESSION['idempresa'] = $valor_idempresa;
		$_SESSION['empresa'] = $valor_empresa;
		echo "<script>location.replace('../Promventa/promventa.php')</script>";
	}
	if(isset($_POST["promg"])){
        session_start();
		$_SESSION['nombre'] = $valor_nombre;
		$_SESSION['idempresa'] = $valor_idempresa;
		$_SESSION['empresa'] = $valor_empresa;
		echo "<script>location.replace('../PromGanancia/promganancia.php')</script>";
	}
	if(isset($_POST["descadmin"])){
        session_start();
		$_SESSION['nombre'] = $valor_nombre;
		$_SESSION['idempresa'] = $valor_idempresa;
		$_SESSION['empresa'] = $valor_empresa;
		echo "<script>location.replace('../DescAdmin/descadmin.php')</script>";
	}
	if(isset($_POST["ingrfact"])){
        session_start();
		$_SESSION['nombre'] = $valor_nombre;
		$_SESSION['idempresa'] = $valor_idempresa;
		$_SESSION['empresa'] = $valor_empresa;
		echo "<script>location.replace('../FacturaNotaCredito/factura.php')</script>";
	}
	if(isset($_POST["gastos"])){
        session_start();
		$_SESSION['nombre'] = $valor_nombre;
		$_SESSION['idempresa'] = $valor_idempresa;
		$_SESSION['empresa'] = $valor_empresa;
		echo "<script>location.replace('../GastosRetiros/gastos.php')</script>";
	}
	if(isset($_POST["ganancias"])){
        session_start();
		$_SESSION['nombre'] = $valor_nombre;
		$_SESSION['idempresa'] = $valor_idempresa;
		$_SESSION['empresa'] = $valor_empresa;
		echo "<script>location.replace('../Ganancias/ganancias.php')</script>";
	}
	if(isset($_POST["vpersianas"])){
        session_start();
		$_SESSION['nombre'] = $valor_nombre;
		$_SESSION['idempresa'] = $valor_idempresa;
		$_SESSION['empresa'] = $valor_empresa;
		echo "<script>location.replace('../PromVentaPersianas/promventa.php')</script>";
	}
	if(isset($_POST["calendario"])){
        session_start();
		$_SESSION['nombre'] = $valor_nombre;
		$_SESSION['idempresa'] = $valor_idempresa;
		$_SESSION['empresa'] = $valor_empresa;
		echo "<script>location.replace('../Calendario/calendario.php')</script>";
	}
  if(isset($_POST["pagos"])){
    session_start();
		$_SESSION['nombre'] = $valor_nombre;
		$_SESSION['idempresa'] = $valor_idempresa;
		$_SESSION['empresa'] = $valor_empresa;
		echo "<script>location.replace('../Pagos/pagos.php')</script>";
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
<button id="desplegar_item" class="dropbtn">Prom. Ganancia</button>
</div>
<div id="pestanas"></div>
<div class="tablascroll">
    <br></br>
    &nbsp;&nbsp;&nbsp;&nbsp;<select class="input_mes1" id="input_mes1" name="input_mes1">
        <option value="1" disabled selected>Seleccione Mes...</option>
        <option value='0'>Todos</option>
        <option value='01'>Enero</option>
        <option value='02'>Febrero</option>
        <option value='03'>Marzo</option>
        <option value='04'>Abril</option>
        <option value='05'>Mayo</option>
        <option value='06'>Junio</option>
        <option value='07'>Julio</option>
        <option value='08'>Agosto</option>
        <option value='09'>Septiembre</option>
        <option value='10'>Octubre</option>
        <option value='11'>Noviembre</option>
        <option value='12'>Diciembre</option>
    </select>
    <select class="input_ano1" id="input_ano1" name="input_ano1">
        <option value="1" disabled selected>Seleccione Año...</option>
        <option value='234'>Todos</option>
        <?php $year = date("Y");
            for ($i=2005; $i<=$year; $i++){
                echo '<option value="'.$i.'">'.$i.'</option>';
            }
        ?>
    </select>&nbsp;&nbsp;&nbsp;<button id="filtrar1">Filtrar</button>
    <div id="result1"></div>
    &nbsp;&nbsp;&nbsp;&nbsp;<select class="input_mes1" id="input_mes2" name="input_mes2">
        <option value="1" disabled selected>Seleccione Mes...</option>
        <option value='0'>Todos</option>
        <option value='01'>Enero</option>
        <option value='02'>Febrero</option>
        <option value='03'>Marzo</option>
        <option value='04'>Abril</option>
        <option value='05'>Mayo</option>
        <option value='06'>Junio</option>
        <option value='07'>Julio</option>
        <option value='08'>Agosto</option>
        <option value='09'>Septiembre</option>
        <option value='10'>Octubre</option>
        <option value='11'>Noviembre</option>
        <option value='12'>Diciembre</option>
    </select>
    <select class="input_ano1" id="input_ano2" name="input_ano2">
        <option value="1" disabled selected>Seleccione Año...</option>
        <option value='234'>Todos</option>
        <?php $year = date("Y");
            for ($i=2005; $i<=$year; $i++){
                echo '<option value="'.$i.'">'.$i.'</option>';
            }
        ?>
    </select>&nbsp;&nbsp;&nbsp;<button id="filtrar2">Filtrar</button>
    <div id="result2"></div>
    &nbsp;&nbsp;&nbsp;&nbsp;<select class="input_mes1" id="input_mes3" name="input_mes3">
        <option value="1" disabled selected>Seleccione Mes...</option>
        <option value='0'>Todos</option>
        <option value='01'>Enero</option>
        <option value='02'>Febrero</option>
        <option value='03'>Marzo</option>
        <option value='04'>Abril</option>
        <option value='05'>Mayo</option>
        <option value='06'>Junio</option>
        <option value='07'>Julio</option>
        <option value='08'>Agosto</option>
        <option value='09'>Septiembre</option>
        <option value='10'>Octubre</option>
        <option value='11'>Noviembre</option>
        <option value='12'>Diciembre</option>
    </select>
    <select class="input_ano1" id="input_ano3" name="input_ano3">
        <option value="1" disabled selected>Seleccione Año...</option>
        <option value='234'>Todos</option>
        <?php $year = date("Y");
            for ($i=2005; $i<=$year; $i++){
                echo '<option value="'.$i.'">'.$i.'</option>';
            }
        ?>
    </select>&nbsp;&nbsp;&nbsp;<button id="filtrar3">Filtrar</button>
    <div id="result3"></div>
    &nbsp;&nbsp;&nbsp;&nbsp;<select class="input_mes1" id="input_mes4" name="input_mes4">
        <option value="1" disabled selected>Seleccione Mes...</option>
        <option value='0'>Todos</option>
        <option value='01'>Enero</option>
        <option value='02'>Febrero</option>
        <option value='03'>Marzo</option>
        <option value='04'>Abril</option>
        <option value='05'>Mayo</option>
        <option value='06'>Junio</option>
        <option value='07'>Julio</option>
        <option value='08'>Agosto</option>
        <option value='09'>Septiembre</option>
        <option value='10'>Octubre</option>
        <option value='11'>Noviembre</option>
        <option value='12'>Diciembre</option>
    </select>
    <select class="input_ano1" id="input_ano4" name="input_ano4">
        <option value="1" disabled selected>Seleccione Año...</option>
        <option value='234'>Todos</option>
        <?php $year = date("Y");
            for ($i=2005; $i<=$year; $i++){
                echo '<option value="'.$i.'">'.$i.'</option>';
            }
        ?>
    </select>&nbsp;&nbsp;&nbsp;<button id="filtrar4">Filtrar</button>
    <div id="result4"></div>
    <br></br>
<script>
//primera tabla
function obtener_datos(){
    $.ajax({
        url:"buscar_prom1.php",
        method:"POST",
        success: function(data){
            $("#result1").html(data)
        }
    });
}
obtener_datos();
$("#filtrar1").on("click",function(){
    var mes = $("#input_mes1 option:selected").val();
    var ano = $("#input_ano1 option:selected").val();
    if (mes == '0' && ano != '234'){
        $('#accion3 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(1).text();
            $.ajax({
                url: "insertar_totalpersiana_ano.php",
                method: "POST",
                data: {ano: ano, empresa: empresa},
                success: function(data){}
            });
        });
    }
    if(mes !='0' && ano != '234'){
        $('#accion3 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(1).text();
            $.ajax({
                url: "insertar_totalpersiana.php",
                method: "POST",
                data: {mes: mes, ano: ano, empresa: empresa},
                success: function(data){}
            });
        });
    }
    if(mes == '0' && ano == '234'){
        $('#accion3 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(1).text();
            $.ajax({
                url: "insertar_totalpersiana_todo.php",
                method: "POST",
                data: {empresa: empresa},
                success: function(data){}
            });
        });
    }
    if (mes == '0' && ano != '234'){
        $('#accion3 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(1).text();
            $.ajax({
                url: "insertar_totalroller_ano.php",
                method: "POST",
                data: {ano: ano, empresa: empresa},
                success: function(data){}
            });
        });
    }
    if(mes !='0' && ano != '234'){
        $('#accion3 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(1).text();
            $.ajax({
                url: "insertar_totalroller.php",
                method: "POST",
                data: {mes: mes, ano: ano, empresa: empresa},
                success: function(data){}
            });
        });
    }
    if (mes == '0' && ano == '234'){
        $('#accion3 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(1).text();
            $.ajax({
                url: "insertar_totalroller_todo.php",
                method: "POST",
                data: {empresa: empresa},
                success: function(data){}
            });
        });
    }
    /*
    if (mes == '0' || mes == 0){
        $('#accion3 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(0).text();
            $.ajax({
                url: "insertar_totalrepuesto_ano.php",
                method: "POST",
                data: {ano: ano, empresa: empresa},
                success: function(data){}
            });
        });
    }else{
        $('#accion3 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(0).text();
            $.ajax({
                url: "insertar_totalrepuesto.php",
                method: "POST",
                data: {mes: mes, ano: ano, empresa: empresa},
                success: function(data){}
            });
        });
    }
    if (mes == '0' || mes == 0){
        $('#accion3 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(0).text();
            $.ajax({
                url: "insertar_totalotros_ano.php",
                method: "POST",
                data: {ano: ano, empresa: empresa},
                success: function(data){}
            });
        });
    }else{
        $('#accion3 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(0).text();
            $.ajax({
                url: "insertar_totalotros.php",
                method: "POST",
                data: {mes: mes, ano: ano, empresa: empresa},
                success: function(data){}
            });
        });
    }*/
    if (mes == '0' && ano != '234'){
        $('#accion3 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(0).text();
            $.ajax({
                url: "insertar_totalcant_ano.php",
                method: "POST",
                data: {ano: ano, empresa: empresa},
                success: function(data){}
            });
        });
    }
    if(mes !='0' && ano != '234'){
        $('#accion3 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(0).text();
            $.ajax({
                url: "insertar_totalcant.php",
                method: "POST",
                data: {mes: mes, ano: ano, empresa: empresa},
                success: function(data){}
            });
        });
    }
    if (mes == '0' && ano == '234'){
        $('#accion3 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(0).text();
            $.ajax({
                url: "insertar_totalcant_todo.php",
                method: "POST",
                data: {empresa: empresa},
                success: function(data){}
            });
        });
    }
    /*
    if (mes == '0' || mes == 0){
        $('#accion3 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(0).text();
            $.ajax({
                url: "insertar_totalcreditos_ano.php",
                method: "POST",
                data: {ano: ano, empresa: empresa},
                success: function(data){}
            });
        });
    }else{
        $('#accion3 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(0).text();
            $.ajax({
                url: "insertar_totalcreditos.php",
                method: "POST",
                data: {mes: mes, ano: ano, empresa: empresa},
                success: function(data){}
            });
        });
    }*/
    obtener_datos();
});
</script>
<script>
//ssegunda tabla
function obtener_datos_1(){
    $.ajax({
        url:"buscar_prom2.php",
        method:"POST",
        success: function(data){
            $("#result2").html(data)
        }
    })
}
obtener_datos_1();
$("#filtrar2").on("click",function(){
    var mes = $("#input_mes2 option:selected").val();
    var ano = $("#input_ano2 option:selected").val();
    if (mes == '0' && ano != '234'){
        $('#accion4 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(1).text();
            $.ajax({
                url: "insertar_totalpersiana_ano2.php",
                method: "POST",
                data: {ano: ano, empresa: empresa},
                success: function(data){}
            });
        });
    }
    if(mes !='0' && ano != '234'){
        $('#accion4 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(1).text();
            $.ajax({
                url: "insertar_totalpersiana2.php",
                method: "POST",
                data: {mes: mes, ano: ano, empresa: empresa},
                success: function(data){}
            });
        });
    }
    if(mes == '0' && ano == '234'){
        $('#accion4 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(1).text();
            $.ajax({
                url: "insertar_totalpersiana2_todo.php",
                method: "POST",
                data: {empresa: empresa},
                success: function(data){}
            });
        });
    }

    if (mes == '0' && ano != '234'){
        $('#accion4 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(1).text();
            $.ajax({
                url: "insertar_totalroller_ano2.php",
                method: "POST",
                data: {ano: ano, empresa: empresa},
                success: function(data){}
            });
        });
    }
    if(mes !='0' && ano != '234'){
        $('#accion4 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(1).text();
            $.ajax({
                url: "insertar_totalroller2.php",
                method: "POST",
                data: {mes: mes, ano: ano, empresa: empresa},
                success: function(data){}
            });
        });
    }
    if (mes == '0' && ano == '234'){
        $('#accion4 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(1).text();
            $.ajax({
                url: "insertar_totalroller2_todo.php",
                method: "POST",
                data: {empresa: empresa},
                success: function(data){}
            });
        });
    }
    if (mes == '0' && ano != '234'){
        $('#accion4 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(0).text();
            $.ajax({
                url: "insertar_totalcant_ano2.php",
                method: "POST",
                data: {ano: ano, empresa: empresa},
                success: function(data){}
            });
        });
    }
    if(mes !='0' && ano != '234'){
        $('#accion4 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(0).text();
            $.ajax({
                url: "insertar_totalcant2.php",
                method: "POST",
                data: {mes: mes, ano: ano, empresa: empresa},
                success: function(data){}
            });
        });
    }
    if (mes == '0' && ano == '234'){
        $('#accion4 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(0).text();
            $.ajax({
                url: "insertar_totalcant2_todo.php",
                method: "POST",
                data: {empresa: empresa},
                success: function(data){}
            });
        });
    }
    obtener_datos_1();
});
</script>
<script>
//tercera tabla
    function obtener_datos_2(){
    $.ajax({
        url:"buscar_prom3.php",
        method:"POST",
        success: function(data){
            $("#result3").html(data)
        }
    });
}
obtener_datos_2();
$("#filtrar3").on("click",function(){
    var mes = $("#input_mes3 option:selected").val();
    var ano = $("#input_ano3 option:selected").val();
    if (mes == '0' && ano != '234'){
        $('#accion5 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(1).text();
            $.ajax({
                url: "insertar_totalpersiana_ano3.php",
                method: "POST",
                data: {ano: ano, empresa: empresa},
                success: function(data){}
            });
        });
    }
    if(mes !='0' && ano != '234'){
        $('#accion5 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(1).text();
            $.ajax({
                url: "insertar_totalpersiana3.php",
                method: "POST",
                data: {mes: mes, ano: ano, empresa: empresa},
                success: function(data){}
            });
        });
    }
    if(mes == '0' && ano == '234'){
        $('#accion5 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(1).text();
            $.ajax({
                url: "insertar_totalpersiana3_todo.php",
                method: "POST",
                data: {empresa: empresa},
                success: function(data){}
            });
        });
    }


    if (mes == '0' && ano != '234'){
        $('#accion5 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(1).text();
            $.ajax({
                url: "insertar_totalroller_ano3.php",
                method: "POST",
                data: {ano: ano, empresa: empresa},
                success: function(data){}
            });
        });
    }
    if(mes !='0' && ano != '234'){
        $('#accion5 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(1).text();
            $.ajax({
                url: "insertar_totalroller3.php",
                method: "POST",
                data: {mes: mes, ano: ano, empresa: empresa},
                success: function(data){}
            });
        });
    }
    if (mes == '0' && ano == '234'){
        $('#accion5 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(1).text();
            $.ajax({
                url: "insertar_totalroller3_todo.php",
                method: "POST",
                data: {empresa: empresa},
                success: function(data){}
            });
        });
    }
    if (mes == '0' && ano != '234'){
        $('#accion5 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(0).text();
            $.ajax({
                url: "insertar_totalcant_ano3.php",
                method: "POST",
                data: {ano: ano, empresa: empresa},
                success: function(data){}
            });
        });
    }
    if(mes !='0' && ano != '234'){
        $('#accion5 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(0).text();
            $.ajax({
                url: "insertar_totalcant3.php",
                method: "POST",
                data: {mes: mes, ano: ano, empresa: empresa},
                success: function(data){}
            });
        });
    }
    if (mes == '0' && ano == '234'){
        $('#accion5 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(0).text();
            $.ajax({
                url: "insertar_totalcant3_todo.php",
                method: "POST",
                data: {empresa: empresa},
                success: function(data){}
            });
        });
    }
    obtener_datos_2();
});
</script>
<script>
//cuarta tabla
    function obtener_datos_3(){
    $.ajax({
        url:"buscar_prom4.php",
        method:"POST",
        success: function(data){
            $("#result4").html(data)
        }
    });
}
obtener_datos_3();
$("#filtrar4").on("click",function(){
    var mes = $("#input_mes4 option:selected").val();
    var ano = $("#input_ano4 option:selected").val();
    if (mes == '0' && ano != '234'){
        $('#accion6 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(1).text();
            $.ajax({
                url: "insertar_totalpersiana_ano4.php",
                method: "POST",
                data: {ano: ano, empresa: empresa},
                success: function(data){}
            });
        });
    }
    if(mes !='0' && ano != '234'){
        $('#accion6 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(1).text();
            $.ajax({
                url: "insertar_totalpersiana4.php",
                method: "POST",
                data: {mes: mes, ano: ano, empresa: empresa},
                success: function(data){}
            });
        });
    }
    if(mes == '0' && ano == '234'){
        $('#accion6 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(1).text();
            $.ajax({
                url: "insertar_totalpersiana4_todo.php",
                method: "POST",
                data: {empresa: empresa},
                success: function(data){}
            });
        });
    }


    if (mes == '0' && ano != '234'){
        $('#accion6 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(1).text();
            $.ajax({
                url: "insertar_totalroller_ano4.php",
                method: "POST",
                data: {ano: ano, empresa: empresa},
                success: function(data){}
            });
        });
    }
    if(mes !='0' && ano != '234'){
        $('#accion6 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(1).text();
            $.ajax({
                url: "insertar_totalroller4.php",
                method: "POST",
                data: {mes: mes, ano: ano, empresa: empresa},
                success: function(data){}
            });
        });
    }
    if (mes == '0' && ano == '234'){
        $('#accion6 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(1).text();
            $.ajax({
                url: "insertar_totalroller4_todo.php",
                method: "POST",
                data: {empresa: empresa},
                success: function(data){}
            });
        });
    }
    if (mes == '0' && ano != '234'){
        $('#accion6 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(0).text();
            $.ajax({
                url: "insertar_totalcant_ano4.php",
                method: "POST",
                data: {ano: ano, empresa: empresa},
                success: function(data){}
            });
        });
    }
    if(mes !='0' && ano != '234'){
        $('#accion6 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(0).text();
            $.ajax({
                url: "insertar_totalcant4.php",
                method: "POST",
                data: {mes: mes, ano: ano, empresa: empresa},
                success: function(data){}
            });
        });
    }
    if (mes == '0' && ano == '234'){
        $('#accion6 tbody tr').each(function (index) {
        var empresa= $(this).find('td').eq(0).text();
            $.ajax({
                url: "insertar_totalcant4_todo.php",
                method: "POST",
                data: {empresa: empresa},
                success: function(data){}
            });
        });
    }
    obtener_datos_3();
});
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

$(document).on("click","#desplegar_item",function(){
      document.getElementById("myDropdown").classList.toggle("show");

});
</script>
<p></p>
</div>
</div>
<p class="titulo75">SOCIEDAD FYD</p>
<p class="copy">Copyright © 2021 | Diseñado por N.A.B para Comercial F&amp;D</p>
</body>
</html>
