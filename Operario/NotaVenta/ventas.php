<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<noscript>
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=java.html">
</noscript>
<style type="text/css">
@import url("ventas.css");
</style>
<link href="ventas.css" rel="stylesheet" type="text/css">
<link rel="icon" href="../Imagenes/logofinder.png">
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
<!--<script src="../Imagenes/jquery.dataTables.min.js"></script>-->
<!--<link rel="stylesheet"  href="../Imagenes/jquery.dataTables.min.css" type="text/css">-->
<script src="https://www.w3schools.com/lib/w3.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
    function obtener_datos(texto){
        $.ajax({
            url:"buscar.php",
            method:"POST",
            data: {texto: texto, id_empresa: <?php echo $valor_idempresa; ?>},
            success: function(data){
                $("#result").html(data);
            }
        });
    }
    function obtener_datos_todo(){
        $.ajax({
            url:"buscar_todo.php",
            method:"POST",
            data: {id_empresa: <?php echo $valor_idempresa; ?>},
            success: function(data){
                $("#result").html(data);
            }
        });
    }
    w3.hide('#boton_guardar_modificacion');
    obtener_datos_todo();
    $("input#input_cliente").focus();
    //obtener_datos("vacio");

    $(document).on("click","#add",function(){
        var nombre_add = $("input#nombre_add").val();
        var direccion_add = $("input#direccion_add").val();
        var telefono_add = $("input#telefono_add").val();
        var email_add = $("input#email_add").val();
        var comuna_add = $("input#comuna_add").val();
        var fecha_add = $("input#fecha_add").val();
            $.ajax({
                url: "insertar_cliente.php",
                method: "POST",
                data: {nombre: nombre_add, direccion: direccion_add, telefono: telefono_add, email: email_add, comuna: comuna_add, fecha: fecha_add},
                success: function(data){
                    var buscar = $("input#input_cliente").val();
                    if (buscar == ""){
                        //obtener_datos(nombre_add);
                    }else{
                        obtener_datos(buscar);
                    }
                    alert(data);
                }
            })
    })
    var controladorTiempo25 = "";

    function buscar_ventas_operario(){
        if ($('#input_cliente').val().length <= 0){
            $("#input_cliente").focus();
            obtener_datos("vacio");
        }else if ($('#input_cliente').val().length >= 1){
            obtener_datos($("#input_cliente").val());
        }
    }

    $(document).on("keyup","#input_cliente", function(){
        clearTimeout(controladorTiempo25);
        controladorTiempo25 = setTimeout(buscar_ventas_operario, 220);
    });

    $(document).on("click","#boton_guardar_modificacion",function(){
        var id = $("label#id_cliente").val();
        var nombre_add = $("input#nombre_add").val();
        var direccion_add = $("input#direccion_add").val();
        var telefono_add = $("input#telefono_add").val();
        var email_add = $("input#email_add").val();
        var comuna_add = $("input#comuna_add").val();
        $.ajax({
            url: "actualizar_cliente.php",
            method: "POST",
            data: {nombre: nombre_add, direccion: direccion_add, telefono: telefono_add, email: email_add, comuna: comuna_add, id: id},
            success: function(data){
                var buscar = $("input#input_cliente").val();
                if (buscar == ""){
                    $("input#input_cliente").focus();
                    obtener_datos("vacio");
                }else{
                    obtener_datos(buscar);
                }
                w3.hide('#boton_guardar_modificacion');
                w3.show('#add');
                alert(data);
            }
        })
     });

    $(document).on("click","#modificar",function(){
    // obtiene la fila seleccionada
        var row = $(this).parent().parent();
        var id_cliente = $(row).find('td:nth-child(1)').text();
        var nombre_cliente = $(row).find('td:nth-child(2)').text();
        var direccion_cliente = $(row).find('td:nth-child(3)').text();
        var telefono_cliente = $(row).find('td:nth-child(4)').text();
        var email_cliente = $(row).find('td:nth-child(5)').text();
        var comuna_cliente = $(row).find('td:nth-child(6)').text();
        $('label#id_cliente').val(id_cliente);
        $('input#nombre_add').val(nombre_cliente);
        $('input#direccion_add').val(direccion_cliente);
        $('input#telefono_add').val(telefono_cliente);
        $('input#email_add').val(email_cliente);
        $('input#comuna_add').val(comuna_cliente);
        w3.show('#boton_guardar_modificacion');
        w3.hide('#add');
    });

    $(document).on("click","#cotizar",function(){
        var elmtTable = document.getElementById('tabla_clientes');
        var tableRows = elmtTable.getElementsByTagName('tr');
        var rowCount = tableRows.length;
        for (var x=rowCount-1; x>-1; x--) {
            document.getElementById("tabla_clientes").deleteRow(x);
        }
        var row = $(this).parent().parent();
        var id_cliente = $(row).find('td:nth-child(1)').text();
        var nombre_cliente = $(row).find('td:nth-child(2)').text();
        var direccion_cliente = $(row).find('td:nth-child(3)').text();
        var telefono_cliente = $(row).find('td:nth-child(4)').text();
        var email_cliente = $(row).find('td:nth-child(5)').text();
        var comuna_cliente = $(row).find('td:nth-child(6)').text();
        var table = document.getElementById("tabla_clientes");
        $.ajax({
            url:"tabla_cotizacion.php",
            method:"POST",
            data: {id: id_cliente, id_empresa: <?php echo $valor_idempresa; ?>, nombre: nombre_cliente, direccion: direccion_cliente, telefono: telefono_cliente, email: email_cliente, comuna: comuna_cliente},
            success: function(data){
                $("#result").html(data)
            }
        })
    });


    var modal = document.getElementById("modal_ver_abonos");
    $(document).on("click","#ver_abonos",function(){
        $("#modal_ver_abonos").css("display", "block");
    });
    $(document).on("click","#close_modal",function(){
        $("#modal_ver_abonos").css("display", "none");
    });
	$(window).on("click",function(event){
		if (event.target == modal) {
			$("#modal_ver_abonos").css("display", "none");
		}
    });
    $(document).on("click","#ver_abonos",function(){
        $("#modal_ver_abonos").css("display", "block");
        var row = $(this).parent().parent();
        var id_cliente = $(row).find('td:nth-child(1)').text();
        $.ajax({
            url:"buscar_clientes_abonos.php",
            method:"POST",
            data: {id_cliente: id_cliente},
            success: function(data){
                $("#cargar_cliente").html(data)
            }
        });
        $.ajax({
            url:"buscar_datos_clientes_abonos.php",
            method:"POST",
            data: {id_cliente: id_cliente},
            success: function(data){
                $("#cargar_tabla_cliente").html(data)
            }
        });
    });
    $(".modal-content").draggable({
        handle: ".cuadrado_modal"
    });
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
<label class= "titulo2">Nota Venta </label>
<form id="form" class="form" name="form" method="POST">
<p>
    <input type="submit" onclick="" id="inicio" name="inicio" class="botones_barra" value="Inicio">
    <input type="submit" onclick="" id="clientes" name="clientes" class="botones_barra" value="Clientes">
    <input type="submit" onclick="" id="cotizaciones" name="cotizaciones" class="botones_barra" value="Cotizaciones">
    <input type="submit" onclick="" id="notaventa" name="notaventa" class="botones_barra" value="Nota Venta">
    <input type="submit" onclick="" id="calvend" name="calvend" class="botones_barra" value="Calendario">
    <label class="holavendedor"><?php echo "<label style='font-weight:600;'>".$valor_empresa."</label> - Hola, " . $valor_nombre ?><input type="submit" onclick="" id="ce" class="ce" name="ce" value="Cerrar Sesión"></label></p>
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
    <div id="result"><b></b></div>
</div>
<p>&nbsp;</p>
<input list="lista_clientes" type="text" class="input_cliente" id="input_cliente" name="input_cliente" placeholder="Escriba Registro..." size="30" maxlength="70" autocomplete="off"/>
<?php
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
mysqli_set_charset($conexion,"utf8");
$ejecutar = mysqli_query($conexion,"Call Listar_Clientes_Ventas('$valor_idempresa')");
mysqli_set_charset($conexion,"utf8");
?>
<datalist id="lista_clientes">
<?php while ($row = mysqli_fetch_array($ejecutar)) {  ?>
    <option><?php echo $row[0] ?></option>
<?php } ?>
</datalist>
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
            <p>&nbsp;</p>
            <div id="cargar_tabla_cliente"></div>
            <p>&nbsp;</p>
    </div>
</div>
<p class="titulo75">SOCIEDAD FYD</p>
<p class="copy">Copyright © 2021 | Diseñado por N.A.B para Comercial F&amp;D</p>
</body>
</html>
