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
    @import url("pagos.css");
</style>
<link href="pagos.css" rel="stylesheet" type="text/css">
<link rel="stylesheet"  href="../Imagenes/jquery.dataTables.min.css" type="text/css">
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
<script src="../Imagenes/jquery.dataTables.min.js"></script>
<script src="https://www.w3schools.com/lib/w3.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.2.11/jspdf.plugin.autotable.min.js"></script>
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
<label id="titulo2" class= "titulo2">Pagos </label>
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
            <input type="submit" onclick="" id="vendedores000" name="vendedores000" class="botones_barra" value="Vendedores">
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
	if(isset($_POST["vendedores000"])){
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
<button id="desplegar_item" class="dropbtn">Pagos</button>
</div>
<div id="pestanas">
    <button id="vendedores" class="botones_pestanas_inabilitados_a" onclick="openPage('vendedor', this, 'white')">Vendedores</button>
    <button id="tecnicos" class="botones_pestanas_inabilitados_e" onclick="openPage('tecnico', this, 'white')" >Técnicos</button>
</div>
<div class="tablascroll">
<div id="vendedor" class="tabcontent"></div>
<div id="tecnico" class="tabcontent">
    <?php
        $conexion222 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
        mysqli_set_charset($conexion222,"utf8");
        if(mysqli_connect_errno()){
            echo mysqli_connect_error();
        }
        $consulta222 = mysqli_query($conexion222, "select Nombre from Tecnicos") or die (mysqli_error($conexion222));
        $botones = "";
        while($row222 = mysqli_fetch_array($consulta222)){
            $botones .= "<button id='inventario' class='inventario_botones_tec' data-tecnico_inventario='".$row222[0]."'>".$row222[0]."</button>";
        }
        echo "<div>".$botones."</div>";
        $consulta222->close();
        $conexion222->more_results();
    ?>
    <label style="float:right;"><strong id="nombre_tecn"></strong></label>
    <br></br>
    <div id="filtro" style="display:none;">
        <select id="select_mes1" name="select_mes1">
           <option value="1" disabled selected>Seleccione Mes Efect...</option>
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
       <select id="select_ano1" name="select_ano1">
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
           $ejecutar = mysqli_query($conexion,"select NombreEmpresa from Empresas");
           mysqli_set_charset($conexion,"utf8");
       ?>
       <select id="empresa_seleccionada">
           <option value='0'>Seleccione Empresa...</option>
           <option value='1'>Todos</option>
       <?php while ($row = mysqli_fetch_array($ejecutar)) { ?>
           <option value='<?php echo $row[0];?>'><?php echo $row[0];?></option>
       <?php } ?>
       </select>
       <select id="pagos_seleccionados">
           <option value='0' selected>Seleccione Estado Pago...</option>
           <option value='pagados'>Pagados</option>
           <option value='no pagados'>No Pagados</option>
       </select>
       <button id="filtrar_mes_ano">Filtrar</button>
    <input type="text" class="input_pagos" id="input_pagos" name="input_pagos" placeholder="Buscar Registro..." size="30" maxlength="70" style="text-align:center;" autocomplete="off"/>
  </div>
    <div id="result_tecnico_sueldo"></div>
        <button id="sacar_informe"class="sacar_informe" style='float:left;'>Informe</button>
        <label id="label_total" style='float:right;display:none;'><strong>Subtotal: <input id="sueldo_total" type='text' placeholder='Total...' size='30' maxlength='70' autocomplete='off' style='text-align:center; font-size:1.3vw;' disabled/></strong></label>
    <p>&nbsp;</p>
    <br></br><label id='label_anticipos' style='float:left;display:none;'><strong>Anticipos</strong></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id='agregar_fila_anticipos' style="display:none;" class='agregar_fila_anticipos'>Agregar Fila</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id='guardar_anticipos' style="display:none;" class='guardar_anticipos'>Guardar</button>&nbsp;&nbsp;<input type="text" class="input_buscar_anticipos" style="display:none;text-align:center;" id="input_buscar_anticipos" name="input_buscar_anticipos" placeholder="Buscar ID Pago Anticipos..." size="30" maxlength="70" style="text-align:center;" autocomplete="off"/>
    <br></br>
    <div id="result_tecnico_anticipo" style="width:48%;"></div>
    <label id="label_total_anticipos" style='float:left;display:none;'><strong>Subtotal: <input id="total_anticipos" type='text' placeholder='Total...' size='30' maxlength='70' autocomplete='off' style='text-align:center; font-size:1.3vw;' disabled/></strong></label>
    <label id="label_total_completo" style='float:right;display:none;'><strong>Total: <input id="total_completo" type='text' placeholder='Total Completo...' size='30' maxlength='70' autocomplete='off' style='text-align:center; font-size:1.3vw;' disabled/></strong><p>&nbsp;</p>
    <div style='float: right;margin-left: 12px;border: 1px solid #cacaca;border-radius: 5px;'>
      <input type='date' id='fecha_pago' name='fecha_pago' min='2005-01-01' max='2100-12-31' placeholder='Fecha Pago...' size='40' maxlength='100' autocomplete='off' style='float:right; font-size: 1.25vw; width: 70%;'/>
      <button id="pagar_todo" style="float:right;">Pagar</button>
    </div>
  </label><br></br><br></br>
</div>
<script>
function openPage(pageName,elmnt,color) {
    var i, tabcontent, tablinks, tablinks1;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("botones_pestanas_inabilitados_a");
    tablinks1 = document.getElementsByClassName("botones_pestanas_inabilitados_e");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
        tablinks1[i].style.backgroundColor = "";
    }
    $("#"+pageName).css("display", "block");
    elmnt.style.backgroundColor = color;
}
$("#vendedores").trigger('click');
</script>
<script>
function obtener_datos_tecnico_sueldo(texto){
    $.ajax({
        url:"buscar_tecnico_sueldo.php",
        method:"POST",
        async:false,
        data: {texto: texto},
        success: function(data){
            $("#result_tecnico_sueldo").html(data);
            total_pagar();
        }
    });
}

function obtener_datos_tecnico_sueldo_todo(texto){
    $.ajax({
        url:"buscar_tecnico_sueldo_todo.php",
        method:"POST",
        async:false,
        data: {texto: texto},
        success: function(data){
            $("#result_tecnico_sueldo").html(data);
            total_pagar();
        }
    });
}

function obtener_datos_tecnico_anticipo_todo(texto){
    $.ajax({
        url:"buscar_anticipos_sueldo_tecnico_todo.php",
        method:"POST",
        async:false,
        data: {texto: texto},
        success: function(data){
            $("#result_tecnico_anticipo").html(data);
            total_pagar();
        }
    });
}

function obtener_datos_tecnico_sueldo_pagados(texto){
    $.ajax({
        url:"buscar_tecnico_sueldo_pagados.php",
        method:"POST",
        async:false,
        data: {texto: texto},
        success: function(data){
            $("#result_tecnico_sueldo_pagados").html(data);
            total_pagar();
        }
    });
}
function obtener_datos_tecnico_anticipo_filtro_input(texto, texto2){
    $.ajax({
        url:"buscar_anticipos_sueldo_tecnico_input.php",
        method:"POST",
        data: {texto: texto, texto2: texto2},
        success: function(data){
            $("#result_tecnico_anticipo").html(data);
            total_pagar();
        }
    });
}

function obtener_datos_tecnico_sueldo_filtro_input(texto, texto2){
    $.ajax({
        url:"buscar_tecnico_sueldo_input.php",
        method:"POST",
        data: {texto: texto, texto2: texto2},
        success: function(data){
            $("#result_tecnico_sueldo").html(data);
            total_pagar();
        }
    });
}

function obtener_datos_tecnico_anticipo(texto){
    $.ajax({
        url:"buscar_anticipos_sueldo_tecnico.php",
        method:"POST",
        async:false,
        data: {texto: texto},
        success: function(data){
            $("#result_tecnico_anticipo").html(data);
            total_pagar();
        }
    });
}

function total_pagar(){
    var sue = $("#sueldo_total").val();
    var ant = $("#total_anticipos").val();
    var resta = sue - ant;
    $("#total_completo").val("$ "+resta.toLocaleString('es-CL'));
}

var tec_inv = "";
$(document).on("click","#inventario", function(){
    tec_inv = $(this).data("tecnico_inventario");
    $("#nombre_tecn").html(tec_inv);
    obtener_datos_tecnico_sueldo(tec_inv);
    obtener_datos_tecnico_anticipo(tec_inv);
    $("#filtro").css("display","block");
    total_pagar();
    obtener_datos_tecnico_sueldo_pagados(tec_inv);
});

var controladorTiempo1 = "";
$(document).on("keyup","#input_pagos", function(){
    var buscar = $("#input_pagos").val();
    clearTimeout(controladorTiempo1);
    controladorTiempo1 = setTimeout(obtener_datos_tecnico_sueldo_filtro_input(tec_inv,buscar), 220);
});

var controladorTiempo2 = "";
$(document).on("keyup","#input_buscar_anticipos", function(){
    var buscar = $("#input_buscar_anticipos").val();
    clearTimeout(controladorTiempo2);
    controladorTiempo2 = setTimeout(obtener_datos_tecnico_anticipo_filtro_input(tec_inv,buscar), 220);
});

function obtener_datos_tecnico_sueldo_mes_ano(texto, texto2, texto3){
    $.ajax({
        url:"buscar_tecnico_sueldo_mes_ano.php",
        method:"POST",
        async:false,
        data: {texto: texto, texto2: texto2, texto3: texto3},
        success: function(data){
            $("#result_tecnico_sueldo").html(data);
            total_pagar();
        }
    });
}
function obtener_datos_tecnico_sueldo_mes_ano_pagados(texto, texto2, texto3){
    $.ajax({
        url:"buscar_tecnico_sueldo_mes_ano_pagados.php",
        method:"POST",
        async:false,
        data: {texto: texto, texto2: texto2, texto3: texto3},
        success: function(data){
            $("#result_tecnico_sueldo").html(data);
            total_pagar();
        }
    });
}

function obtener_datos_tecnico_sueldo_ano(texto, texto2){
    $.ajax({
        url:"buscar_tecnico_sueldo_ano.php",
        method:"POST",
        async:false,
        data: {texto: texto, texto2: texto2},
        success: function(data){
            $("#result_tecnico_sueldo").html(data);
            total_pagar();
        }
    });
}

function obtener_datos_tecnico_sueldo_ano_pagados(texto, texto2){
    $.ajax({
        url:"buscar_tecnico_sueldo_ano_pagados.php",
        method:"POST",
        async:false,
        data: {texto: texto, texto2: texto2},
        success: function(data){
            $("#result_tecnico_sueldo").html(data);
            total_pagar();
        }
    });
}

function obtener_datos_tecnico_sueldo_empr_ano(texto, texto2, texto3){
    $.ajax({
        url:"buscar_tecnico_sueldo_empr_ano.php",
        method:"POST",
        async:false,
        data: {texto: texto, texto2: texto2, texto3: texto3},
        success: function(data){
            $("#result_tecnico_sueldo").html(data);
            total_pagar();
        }
    });
}

function obtener_datos_tecnico_sueldo_empr_ano_pagados(texto, texto2, texto3){
    $.ajax({
        url:"buscar_tecnico_sueldo_empr_ano_pagados.php",
        method:"POST",
        async:false,
        data: {texto: texto, texto2: texto2, texto3: texto3},
        success: function(data){
            $("#result_tecnico_sueldo").html(data);
            total_pagar();
        }
    });
}

function obtener_datos_tecnico_sueldo_mes_ano_empresa(texto, texto2, texto3, texto4){
    $.ajax({
        url:"buscar_tecnico_sueldo_mes_ano_empr.php",
        method:"POST",
        async:false,
        data: {texto: texto, texto2: texto2, texto3: texto3, texto4: texto4},
        success: function(data){
            $("#result_tecnico_sueldo").html(data);
            total_pagar();
        }
    });
}

function obtener_datos_tecnico_sueldo_mes_ano_empresa_pagados(texto, texto2, texto3, texto4){
    $.ajax({
        url:"buscar_tecnico_sueldo_mes_ano_empr_pagados.php",
        method:"POST",
        async:false,
        data: {texto: texto, texto2: texto2, texto3: texto3, texto4: texto4},
        success: function(data){
            $("#result_tecnico_sueldo").html(data);
            total_pagar();
        }
    });
}

function obtener_datos_tecnico_sueldo_empr(texto, texto2){
    $.ajax({
        url:"buscar_tecnico_sueldo_empr.php",
        method:"POST",
        async:false,
        data: {texto: texto, texto2: texto2},
        success: function(data){
            $("#result_tecnico_sueldo").html(data);
            total_pagar();
        }
    });
}

function obtener_datos_tecnico_sueldo_empr_pagados(texto, texto2){
    $.ajax({
        url:"buscar_tecnico_sueldo_empr_pagados.php",
        method:"POST",
        async:false,
        data: {texto: texto, texto2: texto2},
        success: function(data){
            $("#result_tecnico_sueldo").html(data);
            total_pagar();
        }
    });
}

function obtener_datos_tecnico_sueldo_mes_ano_empresa_fechapagadas(texto, texto2, texto3, texto4){
    $.ajax({
        url:"buscar_tecnico_sueldo_mes_ano_empr_fechaspagados.php",
        method:"POST",
        async:false,
        data: {texto: texto, texto2: texto2, texto3: texto3, texto4: texto4},
        success: function(data){
            $("#result_tecnico_sueldo").html(data);
            total_pagar();
        }
    });
}

function obtener_datos_tecnico_sueldo_mes_ano_fechapagadas(texto, texto2, texto3){
    $.ajax({
        url:"buscar_tecnico_sueldo_mes_ano_fechaspagados.php",
        method:"POST",
        async:false,
        data: {texto: texto, texto2: texto2, texto3: texto3},
        success: function(data){
            $("#result_tecnico_sueldo").html(data);
            total_pagar();
        }
    });
}

function obtener_datos_tecnico_anticipo_mes_ano(texto, texto2, texto3){
    $.ajax({
        url:"buscar_anticipos_sueldo_tecnico_mes_ano.php",
        method:"POST",
        async:false,
        data: {texto: texto, texto2: texto2, texto3: texto3},
        success: function(data){
            $("#result_tecnico_anticipo").html(data);
            total_pagar();
        }
    });
}

function obtener_datos_tecnico_anticipo_ano(texto, texto2){
    $.ajax({
        url:"buscar_anticipos_sueldo_tecnico_ano.php",
        method:"POST",
        async:false,
        data: {texto: texto, texto2: texto2},
        success: function(data){
            $("#result_tecnico_anticipo").html(data);
            total_pagar();
        }
    });
}

function obtener_datos_tecnico_anticipo_ano_pagados(texto, texto2){
    $.ajax({
        url:"buscar_anticipos_sueldo_tecnico_ano_pagados.php",
        method:"POST",
        async:false,
        data: {texto: texto, texto2: texto2},
        success: function(data){
            $("#result_tecnico_anticipo").html(data);
            total_pagar();
        }
    });
}

function obtener_datos_tecnico_anticipo_mes_ano_pagados(texto, texto2, texto3){
    $.ajax({
        url:"buscar_anticipos_sueldo_tecnico_mes_ano_pagados.php",
        method:"POST",
        async:false,
        data: {texto: texto, texto2: texto2, texto3: texto3},
        success: function(data){
            $("#result_tecnico_anticipo").html(data);
            total_pagar();
        }
    });
}

function obtener_datos_tecnico_anticipo_mes_ano_fechapagadas(texto, texto2, texto3){
    $.ajax({
        url:"buscar_anticipos_sueldo_tecnico_mes_ano_fechapagadas.php",
        method:"POST",
        async:false,
        data: {texto: texto, texto2: texto2, texto3: texto3},
        success: function(data){
            $("#result_tecnico_anticipo").html(data);
            total_pagar();
        }
    });
}

function obtener_datos_tecnico_anticipo_ano_fechapagadas(texto, texto2){
    $.ajax({
        url:"buscar_anticipos_sueldo_tecnico_ano_fechaspagadas.php",
        method:"POST",
        async:false,
        data: {texto: texto, texto2: texto2},
        success: function(data){
            $("#result_tecnico_anticipo").html(data);
            total_pagar();
        }
    });
}

function obtener_datos_tecnico_sueldo_ano_fechapagadas(texto, texto2){
    $.ajax({
        url:"buscar_tecnico_sueldo_ano_fechaspagados.php",
        method:"POST",
        async:false,
        data: {texto: texto, texto2: texto2},
        success: function(data){
            $("#result_tecnico_sueldo").html(data);
            total_pagar();
        }
    });
}

function obtener_datos_tecnico_sueldo_todo_pagados(texto){
    $.ajax({
        url:"buscar_tecnico_sueldo_todo_pagados.php",
        method:"POST",
        async:false,
        data: {texto: texto},
        success: function(data){
            $("#result_tecnico_sueldo").html(data);
            total_pagar();
        }
    });
}

function obtener_datos_tecnico_anticipo_todo_pagados(texto){
    $.ajax({
        url:"buscar_anticipos_sueldo_tecnico_todo_pagados.php",
        method:"POST",
        async:false,
        data: {texto: texto},
        success: function(data){
            $("#result_tecnico_anticipo").html(data);
            total_pagar();
        }
    });
}

$(document).on("change","#pagos_seleccionados",function(){
    if ($("#select_mes_pagar").val() == 'Pagada'){
        $("#pagos_seleccionados").val(0);
    }
});

$(document).on("change","#select_mes_pagar",function(){
    if ($(this).val() == 'Pagada'){
        $("#pagos_seleccionados").val(0);
    }
});

function filtrarMesAno(){
  var mes = $("#select_mes1").val();
  var ano = $("#select_ano1").val();
  var empr = $("#empresa_seleccionada").val();
  var pase = $("#pagos_seleccionados").val();
  var tipo_ef_pag = $("#select_mes_pagar").val();
      if (empr == '1' && mes != '101' && ano != '101'){
          obtener_datos_tecnico_sueldo_mes_ano(tec_inv,mes,ano);
          obtener_datos_tecnico_anticipo_mes_ano(tec_inv,mes,ano);
      }
      if(mes == '101' && empr == '1' && ano != '101'){
          obtener_datos_tecnico_sueldo_ano(tec_inv,ano);
          obtener_datos_tecnico_anticipo_ano(tec_inv,ano);
      }
      if(mes == '101' && ano != '101' && empr != '1'){
          obtener_datos_tecnico_sueldo_empr_ano(tec_inv,empr,ano);
          obtener_datos_tecnico_anticipo_ano(tec_inv,ano);
      }
      if(mes != '101' && empr != '1' && ano != '101'){
          obtener_datos_tecnico_sueldo_mes_ano_empresa(tec_inv,mes,ano,empr);
          obtener_datos_tecnico_anticipo_mes_ano(tec_inv,mes,ano);
      }
      if(mes == '101' && empr == '1' && ano == '234'){
          obtener_datos_tecnico_sueldo_todo(tec_inv);
          obtener_datos_tecnico_anticipo_todo(tec_inv);
      }
      if(mes == '101' && ano == '234' && empr != '1'){
          obtener_datos_tecnico_sueldo_empr(tec_inv,empr);
          obtener_datos_tecnico_anticipo(tec_inv);
      }
      if (empr == '1' && mes != '101' && ano != '101' && pase == 'no pagados'){
          obtener_datos_tecnico_sueldo_mes_ano(tec_inv,mes,ano);
          obtener_datos_tecnico_anticipo_mes_ano(tec_inv,mes,ano);
      }
      if(mes == '101' && empr == '1' && ano != '101' && pase == 'no pagados'){
          obtener_datos_tecnico_sueldo_ano(tec_inv,ano);
          obtener_datos_tecnico_anticipo_ano(tec_inv,ano);
      }
      if(mes == '101' && ano != '101' && empr != '1' && pase == 'no pagados'){
          obtener_datos_tecnico_sueldo_empr_ano(tec_inv,empr,ano);
          obtener_datos_tecnico_anticipo_ano(tec_inv,ano);
      }
      if(mes != '101' && empr != '1' && ano != '101' && pase == 'no pagados'){
          obtener_datos_tecnico_sueldo_mes_ano_empresa(tec_inv,mes,ano,empr);
          obtener_datos_tecnico_anticipo_mes_ano(tec_inv,mes,ano);
      }
      if(mes == '101' && ano == '234' && empr != '1' && pase == 'no pagados'){
          obtener_datos_tecnico_sueldo_empr(tec_inv,empr);
          obtener_datos_tecnico_anticipo(tec_inv);
      }
      if(mes == '101' && empr == '1' && ano == '234' && pase == 'no pagados'){
          obtener_datos_tecnico_sueldo(tec_inv);
          obtener_datos_tecnico_anticipo(tec_inv);
      }
      if (empr == '1' && mes != '101' && ano != '101' && pase == 'pagados'){
          obtener_datos_tecnico_sueldo_mes_ano_pagados(tec_inv,mes,ano);
          obtener_datos_tecnico_anticipo_mes_ano_pagados(tec_inv,mes,ano);
      }
      if(mes == '101' && empr == '1' && ano != '101' && pase == 'pagados'){
          obtener_datos_tecnico_sueldo_ano_pagados(tec_inv,ano);
          obtener_datos_tecnico_anticipo_ano_pagados(tec_inv,ano);
      }
      if(mes == '101' && ano != '101' && empr != '1' && pase == 'pagados'){
          obtener_datos_tecnico_sueldo_empr_ano_pagados(tec_inv,empr,ano);
          obtener_datos_tecnico_anticipo_ano_pagados(tec_inv,ano);
      }
      if(mes != '101' && empr != '1' && ano != '101' && pase == 'pagados'){
          obtener_datos_tecnico_sueldo_mes_ano_empresa_pagados(tec_inv,mes,ano,empr);
          obtener_datos_tecnico_anticipo_mes_ano_pagados(tec_inv,mes,ano);
      }
      if(mes == '101' && ano == '234' && empr != '1' && pase == 'pagados'){
          obtener_datos_tecnico_sueldo_empr_pagados(tec_inv,empr);
          obtener_datos_tecnico_anticipo_ano_pagados(tec_inv,ano);
      }
      if(mes == '101' && ano == '234' && empr == '1' && pase == 'pagados'){
          obtener_datos_tecnico_sueldo_todo_pagados(tec_inv);
          obtener_datos_tecnico_anticipo_todo_pagados(tec_inv);
      }
}

$(document).on("click","#filtrar_mes_ano",function(){
    filtrarMesAno();
    //obtener_datos_tecnico_anticipo(tec_inv);
});
$(document).on("click","#eliminar_pago",function(){
    if (confirm("¿Desea eliminar este Pago?")){
        var id = $(this).data("id_pago");
        var tecnico = $(this).data("tecnico");
        $.ajax({
            url: "eliminar_pago.php",
            method: "POST",
            data: {id: id},
            success: function(data){
                obtener_datos_tecnico_sueldo(tecnico);
                obtener_datos_tecnico_anticipo(tecnico);
                alert(data);
            }
        })
    };
});

$(document).on("click","#agregar_fila_anticipos",function(){
    var table = document.getElementById("agregar_fila_tabla_anticipos");
    var row = table.insertRow();
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    cell1.innerHTML = "<input type='date' id='fecha_anticipos' name='fecha_anticipos' min='2005-01-01' max='2100-12-31' placeholder='Fecha Inicio...' size='40' maxlength='100' autocomplete='off' style='font-size: 1.25vw;width: 80%;'/>";
    cell2.innerHTML = "0";
    cell2.setAttribute('contentEditable', 'true');
    cell3.innerHTML = "";
    cell3.setAttribute('contentEditable', 'true');
    cell4.innerHTML = "<button id='quitar_fila_anticipos'>X</button>";
});
$(document).on("click","#guardar_anticipos",function(){
    var tecnico = $(this).data("tecnico");
    $.ajax({
        url: "borrar_pago_anticipo.php",
        method: "POST",
        async:false,
        data: {tecnico: tecnico},
        success: function(data){}
    });
    $('#accion_anti tbody tr').each(function () {
        var fecha= $(this).find('td:nth-child(1)').find('input').val();
        var valor = $(this).find('td').eq(1).html();
        var detalle = $(this).find('td').eq(2).html();
        if ($(this).find('td:nth-child(5)').find('select').length){
            var valor_sino= $(this).find('td:nth-child(5)').find('select option:selected').html();
        }else{
            var valor_sino = 'Si';
        }
        $.ajax({
            url: "insertar_pago_anticipo.php",
            method: "POST",
            data: {tecnico: tecnico, fecha: fecha, valor: valor, detalle: detalle, valor_sino: valor_sino},
            success: function(data){}
        });
    });
    obtener_datos_tecnico_sueldo(tecnico);
    obtener_datos_tecnico_anticipo(tecnico);
    alert("Anticipos ingresados exitosamente");
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
$(document).on('click', '#quitar_fila_anticipos', function (event) {
    event.preventDefault();
    $(this).closest('tr').remove();
});
$(document).on('change', '#accion4 tr', function (event) {

    var id = $(this).find('td:nth-child(9)').find('select').val();
    var opcion = $(this).find('td:nth-child(9)').find('select option:selected').html();
      $.ajax({
          url: "modificar_pagado_en_pagos.php",
          method: "POST",
          async:false,
          data: {id: id, pagado: opcion},
          success: function(data){}
      });
      obtener_datos_tecnico_sueldo(tec_inv);
      obtener_datos_tecnico_anticipo(tec_inv);
});
$(document).on('change', '#accion_anti tr', function (event) {
    if ($(this).find('td:nth-child(5)').find('select').length){
        var id = $(this).find('td:nth-child(5)').find('select').val();
        var opcion = $(this).find('td:nth-child(5)').find('select option:selected').html();
        $.ajax({
            url: "modificar_pagado_en_anticipos.php",
            method: "POST",
            async:false,
            data: {id: id, pagado: opcion},
            success: function(data){}
        });
        obtener_datos_tecnico_sueldo(tec_inv);
        obtener_datos_tecnico_anticipo(tec_inv);
    }else{}
});
$(document).on('click', '#pagar_todo', function (event) {
    var d = new Date();
    var month = d.getMonth()+1;
    var day = d.getDate();
    var valor_fecha_pago = $("#fecha_pago").val();
    var fechapag = "";
    var idpagado = "";
    if (valor_fecha_pago == 'null' || valor_fecha_pago == null || valor_fecha_pago == ''){
        fechapag = d.getFullYear() + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + ((''+day).length<2 ? '0' : '') + day;
    }else{
        fechapag = valor_fecha_pago;
    }
    $.ajax({
        url: "consulta_id_pagado.php",
        method: "POST",
        async:false,
        success: function(data){
            idpagado = data;
        }
    });
    $('#accion4 tbody tr').each(function () {
        var id = $(this).find('td:nth-child(9)').find('select').val();
        var notaventa = $(this).find('td:nth-child(2)').text();
        var tipo = $(this).find('td:nth-child(4)').text();
        var cant = $(this).find('td:nth-child(5)').text();
        var valorunit = $(this).find('td:nth-child(6)').text();
        var valortotal = $(this).find('td:nth-child(7)').text();
        var opcion = $(this).find('td:nth-child(9)').find('select option:selected').html();
        if (opcion == 'Si'){
            $.ajax({
                url: "pagar_sueldo.php",
                method: "POST",
                data: {id: id, fecha: fechapag, cant: cant, vaunit: valorunit, vatotal: valortotal, tipo: tipo, tecnico: tec_inv, notaventa: notaventa, idpagado: idpagado},
                success: function(data){}
            });
        }else if (opcion == 'No') {}
    });
    $('#accion_anti tbody tr').each(function () {
        var id = $(this).find('td:nth-child(5)').find('select').val();
        var opcion = $(this).find('td:nth-child(5)').find('select option:selected').html();
        if (opcion == 'Si'){
            $.ajax({
                url: "pagar_anticipo.php",
                method: "POST",
                data: {id: id, fecha: fechapag, idpagado: idpagado},
                success: function(data){}
            });
        }else if (opcion == 'No') {}
    });
    alert("Se ha pagado lo filtrado");
    obtener_datos_tecnico_sueldo(tec_inv);
    obtener_datos_tecnico_anticipo(tec_inv);
    filtrarMesAno();
});
$(document).on('click', '#quitar_pagad', function (event) {
    if(confirm("¿Desea Quitar el Pago de este Registro?")){
        var id =  $(this).data("id_modificar");
        var fecha_pag =  $(this).data("fecha_pagado");
        var tipo =  $(this).data("tipo");
        $.ajax({
            url: "quitar_pago.php",
            method: "POST",
            data: {id: id, fecha_pag: fecha_pag, tipo: tipo, tecnico: tec_inv},
            success: function(data){}
        });
        alert("Se ha quitado el Pago");
        obtener_datos_tecnico_sueldo(tec_inv);
        obtener_datos_tecnico_anticipo(tec_inv);
        filtrarMesAno();
    }
});
$(document).on('click', '#quitar_pagado_ant', function (event) {
    if(confirm("¿Desea Quitar el Pago de este Registro?")){
        var id =  $(this).data("id_modificar");
        $.ajax({
            url: "quitar_pago_ant.php",
            method: "POST",
            data: {id: id},
            success: function(data){}
        });
        alert("Se ha quitado el Pago del Anticipo");
        obtener_datos_tecnico_sueldo(tec_inv);
        obtener_datos_tecnico_anticipo(tec_inv);
        filtrarMesAno();
    }
});

$(document).on("click","#bono_descuento", function(){
    var row = $(this).parent().parent();
    var id = $(this).data("id_pagos");
    var numero = $(row).find('td:nth-child(10)').text();
    $("#numero_id").text(id);
    $("#numero_plata").text(numero);
    llamar_modal();
});
$(document).on("click","#bono", function(){
    var id = $(this).attr('id');
    var numero_id_pago = $("#numero_id").text();
    var plata = $("#numero_plata").text();
    /*var abono = "";
    plata = plata.replace("-", "");
    if (plata == '' || plata == null || plata == '-0'){
        abono = '0';
    }
    if (plata == '0'){
        abono = '0';
    }else if (plata == '') {
        abono = '0';
    }else{
        abono = '+'+plata;
    }*/
    $.ajax({
        url: "modificar_bono_desc.php",
        method: "POST",
        data: {numero_id_pago: numero_id_pago, plata: plata, id: id},
        success: function(data){}
    });
    obtener_datos_tecnico_sueldo(tec_inv);
    obtener_datos_tecnico_anticipo(tec_inv);
    $("#modal_preguntar").css("display", "none");
    alert("Se han Realizado los Cambios");
});
$(document).on("click","#descuento", function(){
    var id = $(this).attr('id');
    var numero_id_pago = $("#numero_id").text();
    var plata = $("#numero_plata").text();
    /*if (plata == '' || plata == null || plata == '-' || plata == '-0'){
        plata = '0';
    }
    plata = plata.replace("+", "");*/
    $.ajax({
        url: "modificar_bono_desc.php",
        method: "POST",
        data: {numero_id_pago: numero_id_pago, plata: plata, id: id},
        success: function(data){}
    });
    obtener_datos_tecnico_sueldo(tec_inv);
    obtener_datos_tecnico_anticipo(tec_inv);
    $("#modal_preguntar").css("display", "none");
    alert("Se han Realizado los Cambios");
});
$(document).on("click","#cancelar", function(){
    $("#modal_preguntar").css("display", "none");
});
$(document).on("click","#ver", function(){
    var id = $(this).data("id");
    $("#input_pagos").val(id);
    clearTimeout(controladorTiempo1);
    controladorTiempo1 = setTimeout(obtener_datos_tecnico_sueldo_filtro_input(tec_inv,id), 220);
    $("#input_buscar_anticipos").val(id);
    var buscar = $("#input_buscar_anticipos").val();
    clearTimeout(controladorTiempo2);
    controladorTiempo2 = setTimeout(obtener_datos_tecnico_anticipo_filtro_input(tec_inv,buscar), 220);
});
function demoFromHTML() {
    var doc = new jsPDF("l" , "cm", "letter");
    doc.autoTable({
        html: '#accion4',
        theme:'grid',
        columnStyles: {
          0: {cellWidth: 1.7},
          1: {cellWidth: 2.2},
          2: {cellWidth: 1.4},
          3: {cellWidth: 1.8},
          4: {cellWidth: 2.5},
          5: {cellWidth: 2},
          6: {cellWidth: 2.3},
          9: {cellWidth: 3.8},
          // etc
        },
        styles: {
          fontSize: 11,
          overflow: 'linebreak',
        },
        //styles: {overflow: 'linebreak', cellWidth: 'wrap'},
        //columnStyles: {text: {cellWidth: 'auto'}},
        margin: { top: 0, left:0},
    });
    var fecha = $("#fecha_lista").text();
    doc.output('save','Resumen Pagos.pdf');
    window.open(doc.output('bloburl'), '_blank');
}
$(document).on("click","#sacar_informe",function(){
    demoFromHTML();
});
function llamar_modal(){
    var modal = document.getElementById("modal_preguntar");
    $("#modal_preguntar").css("display", "block");
    $(document).on("click","#close_modal",function(){
        $("#modal_preguntar").css("display", "none");
    });
    $(window).on("click",function(event){
      if (event.target == modal) {
        $("#modal_preguntar").css("display", "none");
      }
    });
}
$(".modal_preguntar2").draggable({
    handle: ".cuadrado_modal_preguntar"
});
</script>
<p></p>
</div>
</div>
<div id="modal_preguntar" class="modal_preguntar" style="display:none;">
    <div class="modal_preguntar2">
        <aside id="cuadrado_modal_preguntar" class="cuadrado_modal_preguntar">
            <label class="adorno_botones_modal"><img src="../Imagenes/wincontrol_cerrar.png" id="close_modal" class="close_modal"></img></label>
            <label class= "titulo2">Operación Aritmetica</label>
        </aside>
        <br></br>
        <p style="text-align:center;">¿Que Desea Hacer?</p>
        <label id="numero_id" style="display:none;"></label>
        <label id="numero_plata" style="display:none;"></label>
        <br></br>
        <br></br>
        <div class="grid-container" style="margin-left:20px;margin-right:20px;">
            <button class="grid-item-modal" id='bono'>Bono</button>
            <button class="grid-item-modal" id='descuento'>Descuento</button>
            <button class="grid-item-modal" id='cancelar'>Cancelar</button>
        </div>
        <br></br>
        <br></br>
        <br></br>
    </div>
</div>
<p class="titulo75">SOCIEDAD FYD</p>
<p class="copy">Copyright © 2021 | Diseñado por N.A.B para Comercial F&amp;D</p>
</body>
</html>
