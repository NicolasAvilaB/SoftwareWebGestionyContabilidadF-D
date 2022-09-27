<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<noscript>
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=java.html">
</noscript>
<style type="text/css">
@import url("menu_admin.css");
</style>
<link href="menu_admin.css" rel="stylesheet" type="text/css">
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
<link rel="stylesheet"  href="../Imagenes/jquery.dataTables.min.css" type="text/css">
<script src="../Imagenes/jquery.dataTables.min.js"></script>
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
    function obtener_datos_empresas(){
        $.ajax({
            url:"buscar_empresas.php",
            method:"POST",
            success: function(data){
                $("#result_empresas").html(data);
            }
        })
    }
    obtener_datos_empresas();
    $(document).on("click","#actualizar_empresas",function(){
        obtener_datos_empresas();
    });
    $("input#input_cliente").focus();
    function obtener_datos(texto){
        $.ajax({
            url:"buscar.php",
            method:"POST",
            data: {texto: texto},
            success: function(data){
                $("#result").html(data)
            }
        })
    }
    function obtener_datos_todo(){
        $.ajax({
            url:"buscar_todo.php",
            method:"POST",
            success: function(data){
                $("#result").html(data)
            }
        })
    }
    function obtener_datos_deudafiltro_empresa(texto){
        $.ajax({
            url:"buscar_deuda_filtro_empresa.php",
            method:"POST",
            data: {texto: texto},
            success: function(data){
                $("#result").html(data)
            }
        })
    }
    //obtener_datos("vacio");
    obtener_datos_todo();
    $(document).on("click","#actualizar_clientes",function(){
        filtro_empresas_deuda();
    });
    var controladorTiempo5 = "";
    function buscar_cliente_abono(){
        if ($('input#input_cliente').val().length <= 0){
            $("input#input_cliente").focus();
            obtener_datos_todo();
            //obtener_datos("vacio");
        }else if ($('input#input_cliente').val().length >= 1){
            obtener_datos($("input#input_cliente").val());
        }
    }
    $("#input_cliente").on("keyup", function(){
        clearTimeout(controladorTiempo5);
        controladorTiempo5 = setTimeout(buscar_cliente_abono, 220);
    });

    $("#cargar_clientes").on("click", function(){
        if (confirm("¿Desea cargar todos los usuarios?")){
            obtener_datos("");
        }
    });

    function resolver_sobrepeso_plata(){
        $(document).on("input","#tabla_deuda tr",function (e) {
            var abono = parseInt($(this).find('td:nth-child(10)').text());
            var deuda_cliente = $(this).find('td:nth-child(11)').text();
            deuda_cliente = deuda_cliente.replace("$ ", "");
            deuda_cliente = deuda_cliente.replace(".", "");
            deuda_cliente = deuda_cliente.replace(".", "");
            var conversion_deuda_cliente = parseInt(deuda_cliente);
            if (abono > conversion_deuda_cliente){
                parseInt($(this).find('td:nth-child(10)').text(conversion_deuda_cliente));
            }
        });
    }
    function filtro_empresas_deuda(){
        var dc = $("#empresa_seleccionada").val();
        if (dc == '1'){
            obtener_datos_todo();
        }else{
            obtener_datos_deudafiltro_empresa(dc);
        }
    }
    $(document).on("click","#aplicar_abono",function(){
        var row = $(this).parent().parent();
        var id_cliente = $(row).find('td:nth-child(1)').text();
        var id = $(row).find('td:nth-child(2)').text();
        var cliente = $(row).find('td:nth-child(3)').text();
        var observaciones = $(row).find('td:nth-child(4)').text();
        var fecha_venta = $(row).find('td:nth-child(5)').text();
        var fecha_fab = $(row).find('td:nth-child(6)').find('input').val();
        var fecha_ins = $(row).find('td:nth-child(7)').find('#instalacion').val();
        var fecha_insta = $(row).find('td:nth-child(8)').find('input').val();
        var fecha_abono = $(row).find('td:nth-child(9)').find('input').val();
        var medio_pago = $(row).find('td:nth-child(10)').find('input').val();
        var abono = $(row).find('td:nth-child(11)').text();
        var total = $(row).find('td:nth-child(12)').text();
        var instalador = $(row).find('td:nth-child(13)').find('input').val();
        var rectificador = $(row).find('td:nth-child(14)').find('input').val();
        var distribuidor = $(row).find('td:nth-child(15)').text();
        var cont = $(row).find('td:nth-child(7)').find('#contador').text();
        var d = new Date();
        var month = d.getMonth()+1;
        var day = d.getDate();
        var fecha_add = d.getFullYear() + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + ((''+day).length<2 ? '0' : '') + day;
        if (fecha_fab == ''){
            alert("Acuerdese de la Fecha de Fabricación");
        }else if (fecha_ins == ''){
            alert("Olvidó asignar la Fecha de Instalación");
        }else if (instalador == ''){
            alert("Falta asignar al Técnico");
        }else{
            if (fecha_insta != '' && total == '$ 0'){
                if (confirm("¿Desea completar esta Nota de Venta abonada?")){
                    $.ajax({
                        url: "actualizar_cierre_venta.php",
                        method: "POST",
                        data: {id: id},
                        success: function(data){
                            //obtener_datos("");
                            //alert(data);
                        }
                    });
                    $.ajax({
                        url: "borrar_fechasinstalacion.php",
                        method: "POST",
                        async:false,
                        data: {id: id},
                        success: function(data){
                        }
                    });
                    $.ajax({
                        url: "ingresar_primerafecha_w_m.php",
                        method: "POST",
                        async:false,
                        data: {id: id, fecha_ins: fecha_ins},
                        success: function(data){
                        }
                    });
                    if (cont == '0' || cont == 0){
                    }else{
                        $("input[name='fechas_instalaciones[]']").each(function(indice, elemento) {
                            var elemento_fecha = $(elemento).val();
                            $.ajax({
                                url: "ingresar_fechascalendario_w_m.php",
                                method: "POST",
                                async: false,
                                data: {id: id, fechas_instalaciones: elemento_fecha},
                                success: function(data){
                                }
                            });
                        });
                    }
                };
            }else{
                if(abono != 0 || abono != '0'){
                }else{
                    $.ajax({
                        url: "borrar_fechasinstalacion.php",
                        method: "POST",
                        async:false,
                        data: {id: id},
                        success: function(data){
                        }
                    });
                    $.ajax({
                        url: "ingresar_primerafecha_w_m.php",
                        method: "POST",
                        async:false,
                        data: {id: id, fecha_ins: fecha_ins},
                        success: function(data){
                        }
                    });
                    if (cont == '0' || cont == 0){
                    }else{
                        $("input[name='fechas_instalaciones[]']").each(function(indice, elemento) {
                            var elemento_fecha = $(elemento).val();
                            $.ajax({
                                url: "ingresar_fechascalendario_w_m.php",
                                method: "POST",
                                async: false,
                                data: {id: id, fechas_instalaciones: elemento_fecha},
                                success: function(data){
                                }
                            });
                        });
                    }
                }
            }
        }
        var horariobloquear = $(row).find('td:nth-child(16)').find('select').val();
        if(horariobloquear == '0' || horariobloquear == null){
        }else{
            $.ajax({
                url: "bloquear_dias_horario_calendario.php",
                method: "POST",
                data: {fecha_inst: fecha_ins, tecnico: instalador, horario: horariobloquear},
                success: function(data){}
            });
        }
        if (horariobloquear == '0'|| horariobloquear == null){
            horariobloquear = "";
        }
        var tipo_inicio = $(row).find('td:nth-child(17)').find('select').val();
        $.ajax({
            url: "actualizar_abono.php",
            method: "POST",
            data: {fecha_fab: fecha_fab, fecha_ins: fecha_ins, fecha_insta: fecha_insta, abono: abono, instalador: instalador, rectificador: rectificador, id: id, id_cliente: id_cliente, fecha_abono_actual: fecha_abono, distribuidor: distribuidor, observaciones: observaciones, instalacionfin: fecha_ins, horario_bloquear: horariobloquear, fechaventa: fecha_venta, tipoinicio: tipo_inicio, cliente: cliente},
            success: function(data){
                alert(data);
            }
        });
        var contti = $(row).find('td:nth-child(17)').find('#contador_tipo').text();
        if (contti == '0' || contti == 0){
        }else{
            $("input[name='input_tipo[]']").each(function(indice, elemento) {
                var elemento_tipo = $(elemento).val();
                $.ajax({
                    url: "ingresar_multiple_tipos.php",
                    method: "POST",
                    data: {fecha_insta: fecha_insta, instalador: instalador, id: id, tipoinicio: elemento_tipo, cliente: cliente},
                    success: function(data){
                    }
                });
            });
        }
        if (abono == 0 || abono == '0'){
        }else{
            $.ajax({
                url: "ingresar_hist_abono.php",
                method: "POST",
                data: {id: id, id_cliente: id_cliente, fecha_abono_actual: fecha_abono, abono: abono, medio_pago: medio_pago},
                success: function(data){}
            });
        }
        filtro_empresas_deuda();
        if ($(row).find('td:nth-child(17)').find("input[name='input_tipo_usado[]']").length){
            $("input[name='input_tipo_usado[]']").each(function(indice, elemento) {
                var elemento_tipo = $(elemento).val();
                var tipo_input = $(this).data("tipo_input");
                $.ajax({
                    url: "modificar_multiple_tipos.php",
                    method: "POST",
                    data: {id: id, tipoinicio: elemento_tipo, tipoinput: tipo_input, instalador: instalador, fecha_insta: fecha_insta},
                    success: function(data){}
                });
            });
        }else{}
    });
    resolver_sobrepeso_plata();
    $(document).on("change","#empresa_seleccionada", function(){
        filtro_empresas_deuda();
    });
    $(document).on("click","#agregar_fechas", function(){
        var row = $(this).parent().parent();
        var input = document.createElement('input');
        var valor_conta = parseInt($(row).find('td:nth-child(7)').find("#contador").text()) +1;
        $(row).find('td:nth-child(7)').append(input);
        $(row).find('td:nth-child(7)').find("#contador").text(valor_conta);
        input.type = "date";
        input.name = "fechas_instalaciones[]";
        input.id="fechasinst"+valor_conta;
        input.className="fechasinst";
        input.autocomplete="off";
        //document.getElementById('fechainstalacion').appendChild(input);
    });
    $(document).on("click","#quitar_fechas", function(){
        var row = $(this).parent().parent();
        var valor_conta_quitar = $(row).find('td:nth-child(7)').find("#contador").text();
        if (valor_conta_quitar == 0 || valor_conta_quitar == '0'){
        }else{
            var quitar_conta = parseInt($(row).find('td:nth-child(7)').find("#contador").text()) - 1;
            $(row).find('td:nth-child(7)').find("#contador").text(quitar_conta);
            $(row).find('td:nth-child(7)').find("#fechasinst"+valor_conta_quitar).remove();
        }
    });
    $(document).on("click","#agregar_tipo", function(){
        var row = $(this).parent().parent();
        var valor_conta = parseInt($(row).find('td:nth-child(17)').find("#contador_tipo").text()) + 1;
        $(row).find('td:nth-child(17)').append("<input list='lista_tipos' type='text' placeholder='Busque Tipo...' style='text-align:center;width:85%;' name='input_tipo[]' className='inputti' autocomplete='off' id='inputti"+valor_conta+"'/>");
        $(row).find('td:nth-child(17)').find("#contador_tipo").text(valor_conta);
    });
    $(document).on("click","#quitar_tipo", function(){
        var row = $(this).parent().parent();
        var valor_conta_quitar = $(row).find('td:nth-child(17)').find("#contador_tipo").text();
        if (valor_conta_quitar == 0 || valor_conta_quitar == '0'){
        }else{
            var quitar_conta = parseInt($(row).find('td:nth-child(17)').find("#contador_tipo").text()) - 1;
            $(row).find('td:nth-child(17)').find("#contador_tipo").text(quitar_conta);
            $(row).find('td:nth-child(17)').find("#inputti"+valor_conta_quitar).remove();
        }
    });
    $(document).on("click",".boton_quitar", function(){
        if(confirm("¿Desea eliminar este Tipo?")){
            var id = $(this).attr("id");
            var tipo = $(this).data("tipo");
            var notaventa = $(this).data("notaventa");
            var row = $(this).parent().parent();
            $(row).find('td:nth-child(17)').find("#inputtiu"+id).remove();
            $(row).find('td:nth-child(17)').find("#"+id).remove();
            $.ajax({
                url: "eliminar_tipo_pago.php",
                method: "POST",
                data: {tipo: tipo, id: notaventa},
                success: function(data){
                    alert(data);
                }
            });
        };
    });
});
function lista_desplegable_menu() {}

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
<title>Sociedad FYD - Gestión y Contabilidad </title>
<body oncopy="return false" onpaste="return false" oncontextmenu="return false">
<img src="../Imagenes/fondo_login.jpg" id="fondo"/>
<p></p>
<div class="form1">
<div class="form0">
<aside class="cuadrado">
<label class="adorno_botones"><img src="../Imagenes/wincontrol.png"></img></label>
<label class= "titulo2">Inicio </label>
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
<button id="desplegar_item" class="dropbtn">Inicio</button>
</div>
<div class="tablascroll">
    <p>&nbsp;</p>
    <div id="result_empresas"><b></b></div>
    <p>&nbsp;</p>
    <?php
        $conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
        mysqli_set_charset($conexion,"utf8");
        $ejecutar = mysqli_query($conexion,"select NombreEmpresa from Empresas");
        mysqli_set_charset($conexion,"utf8");
    ?>
    <select id="empresa_seleccionada">
        <option value='1'>Todos</option>
    <?php while ($row = mysqli_fetch_array($ejecutar)) { ?>
        <option value='<?php echo $row[0];?>'><?php echo $row[0];?></option>
    <?php } mysqli_close($conexion);?>
    </select>
    <div id="result"><b></b></div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <?php
        $conexion_ti = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
        mysqli_set_charset($conexion_ti,"utf8");
        $ejecutar_ti = mysqli_query($conexion_ti,"select NombreOtros from Otros where Estado = 'Desactivar' and Apar_Inicio ='Si'");
        mysqli_set_charset($conexion_ti,"utf8");
    ?>
    <datalist id="lista_tipos">
    <?php while ($row = mysqli_fetch_array($ejecutar_ti)) {  ?>
        <option><?php echo $row[0] ?></option>
    <?php } mysqli_close($conexion_ti);?>
    </datalist>
</div>
<input list="lista_clientes" type="text" class="input_cliente" id="input_cliente" name="input_cliente" placeholder="Escriba Registro..." size="30" maxlength="70" autocomplete="off"/><!--<button id="cargar_clientes" class="boton_cargar_clientes">Cargar Clientes</button>-->
</div>
<p class="titulo75">SOCIEDAD FYD</p>
<p class="copy">Copyright © 2021 | Diseñado por N.A.B para Comercial F&amp;D</p>
</body>
</html>
