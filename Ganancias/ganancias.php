<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<noscript>
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=java.html">
</noscript>
<style type="text/css">
@import url("ganancias.css");
</style>
<link href="ganancias.css" rel="stylesheet" type="text/css">
<link rel="stylesheet"  href="../Imagenes/jquery.dataTables.min.css" type="text/css">
<link rel="icon" href="../Imagenes/logofinder.png">
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
<script src="../Imagenes/jquery.dataTables.min.js"></script>
<script src="https://www.w3schools.com/lib/w3.js"></script>
<script>
$(document).ready( function () {
    $('#tabla_cotizaciones').DataTable();
    $('#tabla_cotizacioness').DataTable();
});
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
    session_destroy();
    header('Location: http://nalo.cf');
    exit;
} else {
    $valor_nombre = $_SESSION['nombre'];
    $valor_idempresa = $_SESSION['idempresa'];
    $valor_empresa = $_SESSION['empresa'];
}
?>
<script>
$(document).ready(function(){
    function obtener_datos_filtrados_mes_ano_empresa(texto, texto2, texto3){
        $.ajax({
            url:"buscar_filtracion_mes_ano_empresa.php",
            method:"POST",
            data: {texto: texto, texto2: texto2, texto3: texto3},
            success: function(data){
                $("#result").html(data);
                $("#result").css("display", "block");
                $("#buscar_nota_venta").css("display", "none");
            }
        });
    }
    function obtener_datos_filtrados_mes_ano(texto, texto2){
        $.ajax({
            url:"buscar_filtracion_mes_ano.php",
            method:"POST",
            data: {texto: texto, texto2: texto2},
            success: function(data){
                $("#result").html(data);
                $("#result").css("display", "block");
                $("#buscar_nota_venta").css("display", "none");
            }
        });
    }
    function obtener_datos_filtrados_empr_ano(texto, texto2){
        $.ajax({
            url:"buscar_filtracion_empr_ano.php",
            method:"POST",
            data: {texto: texto, texto2: texto2},
            success: function(data){
                $("#result").html(data);
                $("#result").css("display", "block");
                $("#buscar_nota_venta").css("display", "none");
            }
        });
    }
    function obtener_datos_filtrados_ano(texto){
        $.ajax({
            url:"buscar_filtracion_ano.php",
            method:"POST",
            data: {texto: texto},
            success: function(data){
                $("#result").html(data);
                $("#result").css("display", "block");
                $("#buscar_nota_venta").css("display", "none");
            }
        });
    }
    function obtener_datos_todo(){
        $.ajax({
            url:"buscar_todo.php",
            method:"POST",
            success: function(data){
                $("#result").html(data);
                $("#result").css("display", "block");
                $("#buscar_nota_venta").css("display", "none");
            }
        });
    }
    function obtener_datos_todo_filtrados_empr(texto){
        $.ajax({
            url:"buscar_todo_filtracion_empr.php",
            method:"POST",
            data: {texto: texto},
            success: function(data){
                $("#result").html(data);
                $("#result").css("display", "block");
                $("#buscar_nota_venta").css("display", "none");
            }
        });
    }
    function obtener_datos_todo_filtrados_mes(texto){
        $.ajax({
            url:"buscar_todo_filtracion_mes.php",
            method:"POST",
            data: {texto: texto},
            success: function(data){
                $("#result").html(data);
                $("#result").css("display", "block");
                $("#buscar_nota_venta").css("display", "none");
            }
        });
    }
    function obtener_datos_todo_filtrados_mes_empr(texto, texto2){
        $.ajax({
            url:"buscar_todo_filtracion_mes_empr.php",
            method:"POST",
            data: {texto: texto, texto2: texto2},
            success: function(data){
                $("#result").html(data);
                $("#result").css("display", "block");
                $("#buscar_nota_venta").css("display", "none");
            }
        });
    }

    w3.hide('#boton_guardar_modificacion');
    $("input#input_cliente").focus();
    //obtener_datos("vacio");

    $(document).on("click","#filtrar_mes_ano",function(){
        var mes = $("#select_mes1").val();
        var ano = $("#select_ano1").val();
        var empr = $("#empresa_seleccionada").val();
        $("#result00").css("display","none");
        if (empr == '1' && mes != '101' && ano != '234'){
            obtener_datos_filtrados_mes_ano(mes,ano);
        }
        else if(mes == '101' && empr == '1' && ano != '234'){
            obtener_datos_filtrados_ano(ano);
        }
        else if(mes == '101' && ano != '234' && empr != '1'){
            obtener_datos_filtrados_empr_ano(empr, ano);
        }
        else if(mes != '101' && empr != '1' && ano != '234'){
            obtener_datos_filtrados_mes_ano_empresa(mes,ano,empr);
        }
        else if(mes == '101' && empr == '1' && ano == '234'){
            obtener_datos_todo();
        }
        else if(mes == '101' && ano == '234' && empr != '1'){
            obtener_datos_todo_filtrados_empr(empr);
        }
        else if(mes != '101' && empr == '1' && ano == '234'){
            obtener_datos_todo_filtrados_mes(mes);
        }
        else if(mes != '101' && empr != '1' && ano == '234'){
            obtener_datos_todo_filtrados_mes_empr(mes,empr);
        }
    });
    var valor_venta, valor_factcomp, valor_notacre, valor_inst, valor_man, valor_traslado, valor_hgastos = 0;
    function obtener_datos_valor_venta(texto){
        $.ajax({
            url:"buscar_valor_ventas.php",
            method:"POST",
            async:false,
            data: {texto: texto},
            success: function(data){
                $("#vventas").val(data);
                valor_venta = data;
            }
        });
    }
    function obtener_datos_todo_notaventa(texto){
        $.ajax({
            url:"buscar_todo_notaventa.php",
            method:"POST",
            data: {texto: texto},
            success: function(data){
                $("#result00").html(data);
                $("#result00").css("display", "block");
            }
        });
    }
    function obtener_datos_valor_factura_compra(texto){
        $.ajax({
            url:"buscar_factura_compra.php",
            method:"POST",
            async:false,
            data: {texto: texto},
            success: function(data){
                $("#fcompra").val(data);
                valor_factcomp = data;
            }
        });
    }
    function obtener_datos_valor_notacredito_compra(texto){
        $.ajax({
            url:"buscar_notacredito_compra.php",
            method:"POST",
            async:false,
            data: {texto: texto},
            success: function(data){
                $("#ncredito").val(data);
                valor_notacre = data;
            }
        });
    }
    function obtener_datos_valor_instalacion(texto){
        $.ajax({
            url:"buscar_valor_instalacion.php",
            method:"POST",
            async:false,
            data: {texto: texto},
            success: function(data){
                $("#instalacion").val(data);
                valor_inst = data;
            }
        });
    }
    /*var var_mano, var_pro, suma = 0;
    function obtener_datos_valor_mano_obra(texto){
        $.ajax({
            url:"buscar_valor_mano_obra.php",
            method:"POST",
            async:false,
            data: {texto: texto},
            success: function(data){
                var_mano = data;
            }
        });
    }
    function obtener_datos_valor_programacion(texto){
        $.ajax({
            url:"buscar_valor_programacion.php",
            method:"POST",
            async:false,
            data: {texto: texto},
            success: function(data){
                var_pro = data;
            }
        });
    }
    function obtener_datos_valor_mantencion(texto){
        $.ajax({
            url:"buscar_valor_mantencion.php",
            method:"POST",
            async:false,
            data: {texto: texto},
            success: function(data){
                $("#mantencion").val(data);
                valor_man = data;
            }
        });
    }
    function obtener_datos_valor_traslado(texto){
        $.ajax({
            url:"buscar_valor_traslado.php",
            method:"POST",
            async:false,
            data: {texto: texto},
            success: function(data){
                $("#traslado").val(data);
                valor_traslado = data;
            }
        });
    }*/
    var total = 0;
    $(document).on("input","#input_cliente", function(){
        var buscar = $("input#input_cliente").val();
        $("#result").empty();
        if (buscar == ""){
            $("input#vventas").val("$ 0");
        }else{
            obtener_datos_valor_venta(buscar);
            obtener_datos_valor_factura_compra(buscar);
            obtener_datos_valor_notacredito_compra(buscar);
            obtener_datos_valor_instalacion(buscar);
            obtener_datos_todo_notaventa(buscar);
            /*obtener_datos_valor_instalacion(buscar);
            obtener_datos_valor_mano_obra(buscar);
            obtener_datos_valor_programacion(buscar);
            suma = parseInt(var_pro) + parseInt(var_mano);
            $("#manodeobra").val("$ "+parseInt(suma));
            obtener_datos_valor_mantencion(buscar);
            obtener_datos_valor_traslado(buscar);*/
            valor_venta = valor_venta.replace("$ ", "");
            valor_venta = valor_venta.replace(".", "");
            valor_venta = valor_venta.replace(".", "");
            valor_factcomp = valor_factcomp.replace("$ ", "");
            valor_factcomp = valor_factcomp.replace(".", "");
            valor_factcomp = valor_factcomp.replace(".", "");
            valor_notacre = valor_notacre.replace("$ ", "");
            valor_notacre = valor_notacre.replace(".", "");
            valor_notacre = valor_notacre.replace(".", "");
            valor_inst = valor_inst.replace("$ ", "");
            valor_inst = valor_inst.replace(".", "");
            valor_inst = valor_inst.replace(".", "");
            /*valor_man = valor_man.replace("$ ", "");
            valor_man = valor_man.replace(".", "");
            valor_man = valor_man.replace(".", "");*/
            //total = parseInt(valor_venta) - parseInt(valor_factcomp) + parseInt(valor_notacre) - parseInt(valor_inst) - parseInt(suma) - parseInt(valor_man) - parseInt(valor_traslado);
            total = parseInt(valor_venta) - parseInt(valor_factcomp) - parseInt(valor_inst) + parseInt(valor_notacre) - parseInt(valor_hgastos);
            $("#ganancias000").val("$ "+total.toLocaleString('es-CL'));
            $("#result").css("display", "block");
            $("#buscar_nota_venta").css("display", "block");
        }
    });
    $(document).on("keyup","#input_cliente", function(){
        var buscar = $("input#input_cliente").val();
        $("#result").empty();
        if (buscar == ""){
            $("input#vventas").val("$ 0");
        }else{
            obtener_datos_valor_venta(buscar);
            obtener_datos_valor_factura_compra(buscar);
            obtener_datos_valor_notacredito_compra(buscar);
            obtener_datos_valor_instalacion(buscar);
            obtener_datos_todo_notaventa(buscar);
            /*obtener_datos_valor_instalacion(buscar);
            obtener_datos_valor_mano_obra(buscar);
            obtener_datos_valor_programacion(buscar);
            suma = parseInt(var_pro) + parseInt(var_mano);
            $("#manodeobra").val("$ "+parseInt(suma));
            obtener_datos_valor_mantencion(buscar);
            obtener_datos_valor_traslado(buscar);*/
            valor_venta = valor_venta.replace("$ ", "");
            valor_venta = valor_venta.replace(".", "");
            valor_venta = valor_venta.replace(".", "");
            valor_factcomp = valor_factcomp.replace("$ ", "");
            valor_factcomp = valor_factcomp.replace(".", "");
            valor_factcomp = valor_factcomp.replace(".", "");
            valor_notacre = valor_notacre.replace("$ ", "");
            valor_notacre = valor_notacre.replace(".", "");
            valor_notacre = valor_notacre.replace(".", "");
            valor_inst = valor_inst.replace("$ ", "");
            valor_inst = valor_inst.replace(".", "");
            valor_inst = valor_inst.replace(".", "");
            /*valor_man = valor_man.replace("$ ", "");
            valor_man = valor_man.replace(".", "");
            valor_man = valor_man.replace(".", "");*/
            //total = parseInt(valor_venta) - parseInt(valor_factcomp) + parseInt(valor_notacre) - parseInt(valor_inst) - parseInt(suma) - parseInt(valor_man) - parseInt(valor_traslado);
            total = parseInt(valor_venta) - parseInt(valor_factcomp) - parseInt(valor_inst) + parseInt(valor_notacre) - parseInt(valor_hgastos);
            $("#ganancias000").val("$ "+total.toLocaleString('es-CL'));
            $("#result").css("display", "block");
            $("#buscar_nota_venta").css("display", "block");
        }
    });
});
// Close the dropdown if the user clicks outside of it
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
</head>
<!-- <img class="dis" src="Imagenes/logo.jpg" width="318" height="160"> -->
<title>Sociedad FYD - Gesti??n y Contabilidad </title>
<body oncopy="return false" onpaste="return false" oncontextmenu="return false">
<img src="../Imagenes/fondo_login.jpg" id="fondo"/>
<p></p>
<div class="form1">
<div class="form0">
<aside class="cuadrado">
<label class="adorno_botones"><img src="../Imagenes/wincontrol.png"></img></label>
<label class= "titulo2">Ganancias</label>
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
        <label class="holaadmin"><?php echo "Hola, " . $valor_nombre ?><input type="submit" onclick="" id="ce" class="ce" name="ce" value="Cerrar Sesi??n"></label>
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
<button id="desplegar_item" class="dropbtn">Ing. Factura</button>
</div>
<div class="tablascroll">
    <p>&nbsp;</p>
    <label><strong>Buscar Nota Venta: </strong></label>
    <input type="text" class="input_cliente" id="input_cliente" name="input_cliente" placeholder="Escriba Registro..." size="30" maxlength="70" autocomplete="off"/>
    <div style="float:right;">
        <select id="select_mes1" name="select_mes1">
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
        <select id="select_ano1" name="select_ano1">
            <option value="1" disabled selected>Seleccione A??o...</option>
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
        <button id="filtrar_mes_ano">Filtrar</button>
    </div>
    <div id="result"></div>
    <div id="buscar_nota_venta">
        <br></br>
        <br></br>
        <label><strong>Valor Ventas:&nbsp;&nbsp;</strong><input type="text" id="vventas" style="font-size: 1.1vw; padding:3px 3px 3px 10px" value="0" disabled></input></label>
        <p></p>
        <label><strong>Factura Compra:&nbsp;&nbsp;</strong><input type="text" id="fcompra" style="font-size: 1.1vw; padding:3px 3px 3px 10px" value="0" disabled></input></label>
        <p></p>
        <label><strong>Nota Cr??dito:&nbsp;&nbsp;</strong><input type="text" id="ncredito" style="font-size: 1.1vw; padding:3px 3px 3px 10px" value="0" disabled></input></label>
        <p></p>
        <label><strong>Instalaci??n:&nbsp;&nbsp;</strong><input type="text" id="instalacion" style="font-size: 1.1vw; padding:3px 3px 3px 10px" value="0" disabled></input></label>
        <p></p>
        <!--
        <label>Mano de Obra: <input id="manodeobra" value="0" disabled></input></label>
        <p></p>
        <label>Mantenci??n: <input id="mantencion" value="0" disabled></input></label>
        <p></p>
        <label>Traslado: <input id="traslado" value="0" disabled></input></label>
        <p></p>-->
        <label><strong>Gastos:&nbsp;&nbsp;</strong><input type="text" id="hgastos" style="font-size: 1.1vw; padding:3px 3px 3px 10px" value="0" disabled></input></label>
        <p></p>
        <label><strong>Retiro Socios:&nbsp;&nbsp;</strong><input type="text" id="rsocios" style="font-size: 1.1vw; padding:3px 3px 3px 10px" value="0" disabled></input></label>
        <p></p>
        <label><strong>Pago Creditos:&nbsp;&nbsp;</strong><input type="text" id="pcreditos" style="font-size: 1.1vw; padding:3px 3px 3px 10px" value="0" disabled></input></label>
        <p></p>
        <label><strong>Ganancias:&nbsp;&nbsp;</strong><input type="text" id="ganancias000" style="font-size: 1.1vw; padding:3px 3px 3px 10px" value="0" disabled></input></label>
        <br></br>
        <br></br>
        <br></br>
    </div>
    <div id="result00"></div>
</div>
</div>
<div id="modal_ver_abonos" class="modal_ver_abonos" style="display:none;">
    <div class="modal-content">
        <aside class="cuadrado_modal">
            <label class="adorno_botones_modal"><img src="../Imagenes/wincontrol_cerrar.png" id="close_modal" class="close_modal"></img></label>
            <label class= "titulo2">Consulta</label>
        </aside>
            <p>&nbsp;</p>
            <p style="text-align:center;">Consulta Abonos <label id="nombre_producto"></label><label id="id" style="display:none;"></label></p>
            <br></br>
            <div id="cargar_cliente"></div>
            <br></br>
            <div id="cargar_tabla_cliente"></div>
            <br></br>
            <button id="ingresar_venta">Ingresar Venta</button>
            <br></br>
    </div>
</div>
<p class="titulo75">SOCIEDAD FYD</p>
<p class="copy">Copyright ?? 2021 | Dise??ado por N.A.B para Comercial F&amp;D</p>
</body>
</html>
