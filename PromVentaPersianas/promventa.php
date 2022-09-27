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
@import url("promventa.css");
</style>
<link href="promventa.css" rel="stylesheet" type="text/css">
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
<label id="titulo2" class= "titulo2">Venta Persianas</label>
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
<button id="desplegar_item" class="dropbtn">Ventas Persianas</button>
</div>
<div id="pestanas"></div>
<div class="tablascroll">
    <div id="fixear_filtro">
    <p>&nbsp;</p>&nbsp;&nbsp;<select class="input_mes1" id="input_mes1" name="input_mes1">
        <option value="1" disabled selected>Seleccione Mes...</option>
        <option value='101'>Todos</option>
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
    </select>
    <?php
        $conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
        mysqli_set_charset($conexion,"utf8");
        $ejecutar = mysqli_query($conexion,"select Id, NombreEmpresa from Empresas");
        mysqli_set_charset($conexion,"utf8");
    ?>
    <select id="empresa_seleccionada">
        <option value='0'>Seleccione Empresa...</option>
        <option value='11'>Todos</option>
    <?php while ($row = mysqli_fetch_array($ejecutar)) { ?>
        <option value='<?php echo $row[0];?>'><?php echo $row[1];?></option>
    <?php } ?>
    </select>
    &nbsp;&nbsp;&nbsp;<button id="filtrar1">Filtrar</button></div>
    <br></br>
    <p>&nbsp;</p>
    <div id="result1"></div>
<script>
//persianas tabla
function obtener_datos(){
    $.ajax({
        url:"buscar_prom1.php",
        method:"POST",
        success: function(data){
            $("#result1").html(data);
        }
    });
}
function obtener_datos_ano(ano){
    $.ajax({
        url:"buscar_prom1_ano.php",
        method:"POST",
        data: {ano: ano},
        success: function(data){
            $("#result1").html(data);
        }
    });
}
function obtener_datos_mes_ano(mes,ano){
    $.ajax({
        url:"buscar_prom1_mes_ano.php",
        method:"POST",
        data: {mes: mes, ano: ano},
        success: function(data){
            $("#result1").html(data);
        }
    });
}
function obtener_datos_empr_ano(ano,empr){
    $.ajax({
        url:"buscar_prom1_empr_ano.php",
        method:"POST",
        data: {ano: ano, empr: empr},
        success: function(data){
            $("#result1").html(data);
        }
    });
}
function obtener_datos_mes_ano_empresa(mes,ano,empr){
    $.ajax({
        url:"buscar_prom1_mes_ano_empr.php",
        method:"POST",
        data: {mes: mes, ano: ano, empr: empr},
        success: function(data){
            $("#result1").html(data);
        }
    });
}
function obtener_datos_empr(empr){
    $.ajax({
        url:"buscar_prom1_empr.php",
        method:"POST",
        data: {empr: empr},
        success: function(data){
            $("#result1").html(data);
        }
    });
}
function obtener_datos_mes(mes){
    $.ajax({
        url:"buscar_prom1_mes.php",
        method:"POST",
        data: {mes: mes},
        success: function(data){
            $("#result1").html(data);
        }
    });
}
obtener_datos();
$("#filtrar1").on("click",function(){
    var mes = $("#input_mes1").val();
    var ano = $("#input_ano1").val();
    var empr = $("#empresa_seleccionada").val();
    if(empr == '11' && mes != '101' && ano != '234'){
        obtener_datos_mes_ano(mes,ano);
    }
    if(mes == '101' && empr == '11' && ano != '101'){
        obtener_datos_ano(ano);
    }
    if(mes == '101' && ano != '234' && empr != '11'){
        obtener_datos_empr_ano(ano, empr);
    }
    if(mes != '101' && empr != '11' && ano != '101'){
        obtener_datos_mes_ano_empresa(mes,ano,empr);
    }
    if(mes == '101' && empr == '11' && ano == '234'){
        obtener_datos();
    }
    if(mes == '101' && ano == '234' && empr != '11'){
        obtener_datos_empr(empr);
    }
    if(mes != '101' && empr == '11' && ano == '234'){
        obtener_datos_mes(mes);
    }
});
</script>
<script>
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
<script>
$(document).ready(function(){
    $(".modal-content").draggable({
        handle: ".cuadrado_modal"
    });
})
function llamar_modal(){
    var modal = document.getElementById("modal_ver_abonos");
    $("#modal_ver_abonos").css("display", "block");
    $(document).on("click","#close_modal",function(){
        $("#modal_ver_abonos").css("display", "none");
    });
    $(window).on("click",function(event){
    	if (event.target == modal) {
    		$("#modal_ver_abonos").css("display", "none");
    	}
    });
}

$(document).on("click","#ver_detalle_persianas",function(){
    var color = $(this).data("color");
    $.ajax({
        url:"buscar_color_persiana.php",
        method:"POST",
        data: {texto: color},
        success: function(data){
            $("#resultado_detalle").html(data);
        }
    });
    llamar_modal();
});
$(document).on("click","#ver_detalle_rollers",function(){
    var color = $(this).data("color");
    $.ajax({
        url:"buscar_color_roller.php",
        method:"POST",
        data: {texto: color},
        success: function(data){
            $("#resultado_detalle").html(data);
        }
    });
    llamar_modal();
});
$(document).on("click","#ver_detalle_repuestos",function(){
    var color = $(this).data("color");
    $.ajax({
        url:"buscar_color_repuesto.php",
        method:"POST",
        data: {texto: color},
        success: function(data){
            $("#resultado_detalle").html(data);
        }
    });
    llamar_modal();
});
$(document).on("click","#ver_detalle_otros",function(){
    var color = $(this).data("color");
    $.ajax({
        url:"buscar_color_otro.php",
        method:"POST",
        data: {texto: color},
        success: function(data){
            $("#resultado_detalle").html(data);
        }
    });
    llamar_modal();
});

$(document).on("click","#ver_detalle_persianas_ano",function(){
    var color = $(this).data("color");
    var ano = $(this).data("ano");
    $.ajax({
        url:"buscar_color_persiana_ano.php",
        method:"POST",
        data: {texto: color, texto2: ano},
        success: function(data){
            $("#resultado_detalle").html(data);
        }
    });
    llamar_modal();
});
$(document).on("click","#ver_detalle_rollers_ano",function(){
    var color = $(this).data("color");
    var ano = $(this).data("ano");
    $.ajax({
        url:"buscar_color_roller_ano.php",
        method:"POST",
        data: {texto: color, texto2: ano},
        success: function(data){
            $("#resultado_detalle").html(data);
        }
    });
    llamar_modal();
});
$(document).on("click","#ver_detalle_repuestos_ano",function(){
    var color = $(this).data("color");
    var ano = $(this).data("ano");
    $.ajax({
        url:"buscar_color_repuesto_ano.php",
        method:"POST",
        data: {texto: color, texto2: ano},
        success: function(data){
            $("#resultado_detalle").html(data);
        }
    });
    llamar_modal();
});
$(document).on("click","#ver_detalle_otros_ano",function(){
    var color = $(this).data("color");
    var ano = $(this).data("ano");
    $.ajax({
        url:"buscar_color_otro_ano.php",
        method:"POST",
        data: {texto: color, texto2: ano},
        success: function(data){
            $("#resultado_detalle").html(data);
        }
    });
    llamar_modal();
});

$(document).on("click","#ver_detalle_persianas_empr",function(){
    var color = $(this).data("color");
    var empr = $(this).data("empr");
    $.ajax({
        url:"buscar_color_persiana_empr.php",
        method:"POST",
        data: {texto: color, texto2: empr},
        success: function(data){
            $("#resultado_detalle").html(data);
        }
    });
    llamar_modal();
});
$(document).on("click","#ver_detalle_rollers_empr",function(){
    var color = $(this).data("color");
    var empr = $(this).data("empr");
    $.ajax({
        url:"buscar_color_roller_empr.php",
        method:"POST",
        data: {texto: color, texto2: empr},
        success: function(data){
            $("#resultado_detalle").html(data);
        }
    });
    llamar_modal();
});
$(document).on("click","#ver_detalle_repuestos_empr",function(){
    var color = $(this).data("color");
    var empr = $(this).data("empr");
    $.ajax({
        url:"buscar_color_repuesto_empr.php",
        method:"POST",
        data: {texto: color, texto2: empr},
        success: function(data){
            $("#resultado_detalle").html(data);
        }
    });
    llamar_modal();
});
$(document).on("click","#ver_detalle_otros_empr",function(){
    var color = $(this).data("color");
    var empr = $(this).data("empr");
    $.ajax({
        url:"buscar_color_otro_empr.php",
        method:"POST",
        data: {texto: color, texto2: empr},
        success: function(data){
            $("#resultado_detalle").html(data);
        }
    });
    llamar_modal();
});

$(document).on("click","#ver_detalle_persianas_empr_ano",function(){
    var color = $(this).data("color");
    var empr = $(this).data("empr");
    var ano = $(this).data("ano");
    $.ajax({
        url:"buscar_color_persiana_empr_ano.php",
        method:"POST",
        data: {texto: color, texto2: empr, texto3: ano},
        success: function(data){
            $("#resultado_detalle").html(data);
        }
    });
    llamar_modal();
});
$(document).on("click","#ver_detalle_rollers_empr_ano",function(){
    var color = $(this).data("color");
    var empr = $(this).data("empr");
    var ano = $(this).data("ano");
    $.ajax({
        url:"buscar_color_roller_empr_ano.php",
        method:"POST",
        data: {texto: color, texto2: empr, texto3: ano},
        success: function(data){
            $("#resultado_detalle").html(data);
        }
    });
    llamar_modal();
});
$(document).on("click","#ver_detalle_repuestos_empr_ano",function(){
    var color = $(this).data("color");
    var empr = $(this).data("empr");
    var ano = $(this).data("ano");
    $.ajax({
        url:"buscar_color_repuesto_empr_ano.php",
        method:"POST",
        data: {texto: color, texto2: empr, texto3: ano},
        success: function(data){
            $("#resultado_detalle").html(data);
        }
    });
    llamar_modal();
});
$(document).on("click","#ver_detalle_otros_empr_ano",function(){
    var color = $(this).data("color");
    var empr = $(this).data("empr");
    var ano = $(this).data("ano");
    $.ajax({
        url:"buscar_color_otro_empr_ano.php",
        method:"POST",
        data: {texto: color, texto2: empr, texto3: ano},
        success: function(data){
            $("#resultado_detalle").html(data);
        }
    });
    llamar_modal();
});

$(document).on("click","#ver_detalle_persianas_mes_ano",function(){
    var color = $(this).data("color");
    var mes = $(this).data("mes");
    var ano = $(this).data("ano");
    $.ajax({
        url:"buscar_color_persiana_mes_ano.php",
        method:"POST",
        data: {texto: color, texto2: mes, texto3: ano},
        success: function(data){
            $("#resultado_detalle").html(data);
        }
    });
    llamar_modal();
});
$(document).on("click","#ver_detalle_rollers_mes_ano",function(){
    var color = $(this).data("color");
    var mes = $(this).data("mes");
    var ano = $(this).data("ano");
    $.ajax({
        url:"buscar_color_roller_mes_ano.php",
        method:"POST",
        data: {texto: color, texto2: mes, texto3: ano},
        success: function(data){
            $("#resultado_detalle").html(data);
        }
    });
    llamar_modal();
});
$(document).on("click","#ver_detalle_repuestos_mes_ano",function(){
    var color = $(this).data("color");
    var mes = $(this).data("mes");
    var ano = $(this).data("ano");
    $.ajax({
        url:"buscar_color_repuesto_mes_ano.php",
        method:"POST",
        data: {texto: color, texto2: mes, texto3: ano},
        success: function(data){
            $("#resultado_detalle").html(data);
        }
    });
    llamar_modal();
});
$(document).on("click","#ver_detalle_otros_mes_ano",function(){
    var color = $(this).data("color");
    var mes = $(this).data("mes");
    var ano = $(this).data("ano");
    $.ajax({
        url:"buscar_color_otro_mes_ano.php",
        method:"POST",
        data: {texto: color, texto2: mes, texto3: ano},
        success: function(data){
            $("#resultado_detalle").html(data);
        }
    });
    llamar_modal();
});

$(document).on("click","#ver_detalle_persianas_mes_ano_empr",function(){
    var color = $(this).data("color");
    var mes = $(this).data("mes");
    var ano = $(this).data("ano");
    var empr = $(this).data("empr");
    $.ajax({
        url:"buscar_color_persiana_mes_ano_empr.php",
        method:"POST",
        data: {texto: color, texto2: empr, texto3: ano, texto4: empr},
        success: function(data){
            $("#resultado_detalle").html(data);
        }
    });
    llamar_modal();
});
$(document).on("click","#ver_detalle_rollers_mes_ano_empr",function(){
    var color = $(this).data("color");
    var mes = $(this).data("mes");
    var ano = $(this).data("ano");
    var empr = $(this).data("empr");
    $.ajax({
        url:"buscar_color_roller_mes_ano_empr.php",
        method:"POST",
        data: {texto: color, texto2: mes, texto3: ano, texto4: empr},
        success: function(data){
            $("#resultado_detalle").html(data);
        }
    });
    llamar_modal();
});
$(document).on("click","#ver_detalle_repuestos_mes_ano_empr",function(){
    var color = $(this).data("color");
    var mes = $(this).data("mes");
    var ano = $(this).data("ano");
    var empr = $(this).data("empr");
    $.ajax({
        url:"buscar_color_repuesto_mes_ano_empr.php",
        method:"POST",
        data: {texto: color, texto2: mes, texto3: ano, texto4: empr},
        success: function(data){
            $("#resultado_detalle").html(data);
        }
    });
    llamar_modal();
});
$(document).on("click","#ver_detalle_otros_mes_ano_empr",function(){
    var color = $(this).data("color");
    var mes = $(this).data("mes");
    var ano = $(this).data("ano");
    var empr = $(this).data("empr");
    $.ajax({
        url:"buscar_color_otro_mes_ano_empr.php",
        method:"POST",
        data: {texto: color, texto2: mes, texto3: ano, texto4: empr},
        success: function(data){
            $("#resultado_detalle").html(data);
        }
    });
    llamar_modal();
});
function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    filename = filename?filename+'.xls':'excel_data.xls';
    downloadLink = document.createElement("a");
    document.body.appendChild(downloadLink);
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
        downloadLink.download = filename;
        downloadLink.click();
    }
}
</script>
<p></p>
</div>
</div>
<div id="modal_ver_abonos" class="modal_ver_abonos" style="display:none;">
    <div class="modal-content">
        <aside id="cuadrado_modal" class="cuadrado_modal">
            <label class="adorno_botones_modal"><img src="../Imagenes/wincontrol_cerrar.png" id="close_modal" class="close_modal"></img></label>
            <label class= "titulo2">Ver Detalle</label>
            <div style="position:absolute;float:left;margin-top:10px;">
                <button id="exportar_excel" onclick="exportTableToExcel('tabla_color_persianas', 'Detalle Venta Persianas')" >Exportar en Excel</button>
            </div>
        </aside>
        <div id="tablascroll2">
            <div id="resultado_detalle"></div>
        </div>
    </div>
</div>
<p class="titulo75">SOCIEDAD FYD</p>
<p class="copy">Copyright © 2021 | Diseñado por N.A.B para Comercial F&amp;D</p>
</body>
</html>
