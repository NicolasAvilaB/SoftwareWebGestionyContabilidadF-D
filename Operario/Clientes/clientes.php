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
@import url("clientes.css");
</style>
<link href="clientes.css" rel="stylesheet" type="text/css">
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
$(document).ready(function(){
    function obtener_datos(texto){
        $.ajax({
            url:"buscar.php",
            method:"POST",
            data: {texto: texto},
            success: function(data){
                $('#myPager').empty();
                $('#result').empty();
                $("#result").html(data);
            }
        });
    }
    obtener_datos("vacio");
    $("input#nombre_add").focus();
    //obtener_datos("vacio");
    $(document).on("click","#add",function(){
        if ($('#nombre_add').val().length == 0 && $('#direccion_add').val().length == 0 && $('#telefono_add').val().length == 0 && $('#email_add').val().length == 0 && $('#comuna_add').val().length == 0) {
                alert("Escriba los datos del Cliente");
                $('#nombre_add').focus();
                return false;
        }else{
            if ($('#nombre_add').val().length == 0) {
                alert("Olvido escribir el Nombre del Cliente");
                $('#nombre_add').focus();
                return false;
            }else if ($('#direccion_add').val().length == 0) {
                alert("Falta escribir la Direccion del Cliente");
                $('#direccion_add').focus();
                return false;
            }else if ($('#telefono_add').val().length == 0) {
                alert("Falta escribir el Telefono del Cliente");
                $('#telefono_add').focus();
                return false;
            }else if ($('#email_add').val().length == 0) {
                alert("Falta escribir el Correo Electronico del Cliente");
                $('#email_add').focus();
                return false;
            }else if ($('#comuna_add').val().length == 0) {
                alert("Olvida escribir la Comuna del Cliente");
                $('#comuna_add').focus();
                return false;
            /*}else if ($('#fecha_add').val().length == 0) {
                alert("Olvida asignar la Fecha de Ingreso del Cliente");
                $('#fecha_add').focus();
                return false;*/
            }else{
                var nombre_add = $("input#nombre_add").val();
                var direccion_add = $("input#direccion_add").val();
                var telefono_add = $("input#telefono_add").val();
                var email_add = $("input#email_add").val();
                var comuna_add = $("input#comuna_add").val();
                var d = new Date();
                var month = d.getMonth()+1;
                var day = d.getDate();
                var fecha_add = d.getFullYear() + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + ((''+day).length<2 ? '0' : '') + day;
                $.ajax({
                    url: "insertar_cliente.php",
                    method: "POST",
                    data: {nombre: nombre_add, direccion: direccion_add, telefono: telefono_add, email: email_add, comuna: comuna_add, fecha: fecha_add},
                    success: function(data){
                        buscar_ingresar_modificar_cliente();
                        alert(data);
                    }
                })
            }
        }
    })


    $(document).on("click","#modificar",function(){
        var row = $(this).parent().parent();
        var id = $(row).find('td:nth-child(1)').text();
        var nombre_add = $(row).find('td:nth-child(2)').text();
        var direccion_add = $(row).find('td:nth-child(3)').text();
        var telefono_add = $(row).find('td:nth-child(4)').text();
        var email_add = $(row).find('td:nth-child(5)').text();
        var comuna_add = $(row).find('td:nth-child(6)').text();
        $.ajax({
            url: "actualizar_cliente.php",
            method: "POST",
            data: {nombre: nombre_add, direccion: direccion_add, telefono: telefono_add, email: email_add, comuna: comuna_add, id: id},
            success: function(data){
                buscar_ingresar_modificar_cliente();
                alert(data);
            }
        })
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
        $("#nombre_add").css("display", "none");
        $("#direccion_add").css("display", "none");
        $("#telefono_add").css("display", "none");
        $("#email_add").css("display", "none");
        $("#comuna_add").css("display", "none");
        $("label#id_cliente").css("display", "none");
        $("button#add").css("display", "none");
        $("p#espacio").css("display", "none");
        $.ajax({
            url:"tabla_cotizacion.php",
            method:"POST",
            cache:false,
            data: {id: id_cliente, id_empresa: <?php echo $valor_idempresa; ?>, nombre: nombre_cliente, direccion: direccion_cliente, telefono: telefono_cliente, email: email_cliente, comuna: comuna_cliente, vendedora: <?php echo "'$valor_nombre'"; ?>},
            success: function(data){
                $("#result").empty();
                $("#result").html(data)
            }
        })
    });
    var idcliente = 0;
    $(document).on("click","#vis_rest", function(){
        idcliente = $(this).data("idcliente");
        llamar_modal_visita_rest();
    });
    function buscar_ingresar_modificar_cliente(){
        if ($('input#nombre_add').val().length <= 2){
            $("input#nombre_add").focus();
            obtener_datos("vacio");
        }else if ($('input#nombre_add').val().length >= 3){
            $('#myPager').empty();
            obtener_datos($("input#nombre_add").val());
        }
    }
    function consultar_id_cliente(){
        $.ajax({
            url: "consultar_id_cliente_nuevo.php",
            method: "POST",
            async:false,
            success: function(data){
                $("label#id_cliente").text(data);
            }
        });
    }
    function llamar_modal_visita_rest(){
        var modal = document.getElementById("modal_ver_abonos4");
        $("#modal_ver_abonos4").css("display", "block");
        $(document).on("click","#close_modal",function(){
            $("#modal_ver_abonos4").css("display", "none");
        });
        $(window).on("click",function(event){
        	if (event.target == modal) {
        		$("#modal_ver_abonos4").css("display", "none");
        	}
        });
    }
    $(".modal-content").draggable({
        handle: ".cuadrado_modal"
    });
    $(".modal-content4").draggable({
        handle: ".cuadrado_modal4"
    });
    var controladorTiempo1 = "";
    $(document).on("keyup","#nombre_add", function(){
        $('#myPager').empty();
        clearTimeout(controladorTiempo1);
        controladorTiempo1 = setTimeout(buscar_ingresar_modificar_cliente, 220);
    });
    consultar_id_cliente();
    $(document).on("click","#reparacion",function(){
        $("#campo_texto_cliente").css("display", "none");
        $("#result").css("display", "none");
        $("#modal_ver_abonos4").css("display", "none");
        $.ajax({
            url:"./calendario/calendario.php",
            method:"POST",
            cache:false,
            data: {id: idcliente, select_detalle: 'Reparacion', vend: '<?php echo $valor_nombre?>'},
            success: function(data){
                $("#tablascroll").css("width", "98%");
                $("#tablascroll").css("margin-top","5px");
                $("#tablascroll").css("margin-left","0px");
                $("#result").css("display","block");
                $("#result").html(data);
            }
        })
    });
    $(document).on("click","#restificacion",function(){
        $("#campo_texto_cliente").css("display", "none");
        $("#result").css("display", "none");
        $("#modal_ver_abonos4").css("display", "none");
        $.ajax({
            url:"./calendario/calendario.php",
            method:"POST",
            cache:false,
            data: {id: idcliente, select_detalle: 'Restificacion', vend: '<?php echo $valor_nombre?>'},
            success: function(data){
                $("#tablascroll").css("width", "98%");
                $("#tablascroll").css("margin-top","5px");
                $("#tablascroll").css("margin-left","0px");
                $("#result").css("display","block");
                $("#result").html(data);
            }
        })
    });
    $(document).on("click","#visitatecnica",function(){
        $("#campo_texto_cliente").css("display", "none");
        $("#result").css("display", "none");
        $("#modal_ver_abonos4").css("display", "none");
        $.ajax({
            url:"./calendario/calendario.php",
            method:"POST",
            cache:false,
            data: {id: idcliente, select_detalle: 'Visita Tecnica', vend: '<?php echo $valor_nombre?>'},
            success: function(data){
                $("#tablascroll").css("width", "98%");
                $("#tablascroll").css("margin-top","5px");
                $("#tablascroll").css("margin-left","0px");
                $("#result").css("display","block");
                $("#result").html(data);
            }
        })
    });
		$(document).on("click","#agregar_datos",function(){
        $("#tabla_clientes").each(function() {
            var tds = '<tr>';
            jQuery.each($('tr:last td', this), function(index, element) {
                if (index == 0){
                    tds += '<td>' + $(this).html() + '</td>';
                }else if (index == 1){
                    tds += '<td id="nombre_cliente">' + $(this).html() + '</td>';
                }else if (index == 2){
                    tds += '<td id="direccion_cliente" contenteditable></td>';
                }else if (index == 3){
                    tds += '<td id="telefono_cliente" contenteditable></td>';
                }else if (index == 4){
                    tds += '<td id="email_cliente" contenteditable></td>';
                }else if (index == 5){
                    tds += '<td id="comuna_cliente" contenteditable></td>';
                }else if (index == 6){
                    tds += '<td id="fecha_cliente">' + $(this).html() + '</td>';
                }else if (index == 7){
                    tds += '<td></td>';
                }else if (index == 8){
                    tds += '<td></td>';
                }else if (index == 9){
                    tds += '<td><button id="ingresar_nuevo_dato_cliente" class="ingresar_nuevo_dato_cliente">Guardar Dato</button></td><td><button id="quitar_fila_cliente" class="quitar_fila_cliente">X</button></td>';
                }
            });
            tds += '</tr>';
            if ($('tbody', this).length > 0) {
                $('tbody', this).append(tds);
            } else {
                $(this).append(tds);
            }
        });
    });
		$(document).on('click', '#quitar_fila_cliente', function (event) {
				event.preventDefault();
				$(this).closest('tr').remove();
		});
		$(document).on("click","#ingresar_nuevo_dato_cliente",function(){
				var row = $(this).parent().parent();
				var id = $(row).find('td:nth-child(1)').text();
				var nombre = $(row).find('td:nth-child(2)').text();
				var direccion = $(row).find('td:nth-child(3)').text();
				var telefono = $(row).find('td:nth-child(4)').text();
				var email = $(row).find('td:nth-child(5)').text();
				var comuna = $(row).find('td:nth-child(6)').text();
				var d = new Date();
				var month = d.getMonth()+1;
				var day = d.getDate();
				var fecha = d.getFullYear() + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + ((''+day).length<2 ? '0' : '') + day;
				$.ajax({
						url: "insertar_cliente_datos_adicionales.php",
						method: "POST",
						data: {id: id, nombre: nombre, direccion: direccion, telefono: telefono, email: email, comuna: comuna, fecha: fecha},
						success: function(data){
								buscar_ingresar_modificar_cliente();
								alert(data);
						}
				});
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
<div class="grid-container" id="campo_texto_cliente">
    <input type="text" class="grid-item" id="direccion_add" name="direccion_add" placeholder="Direccion..." size="30" maxlength="800" autocomplete="off"/>
    <input list="lista_clientes" type="text" class="grid-item" id="nombre_add" name="nombre_add" placeholder="Nombre Cliente..." size="30" maxlength="70" autocomplete="off"/>
    <?php
        $conexionblablabla = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
        mysqli_set_charset($conexionblablabla,"utf8");
        $ejecutar = mysqli_query($conexionblablabla,"Call Mostrar_Nombre_Clientes_Todo()");
        mysqli_set_charset($conexionblablabla,"utf8");
    ?>
    <datalist id="lista_clientes">
    <?php while ($row = mysqli_fetch_array($ejecutar)) {  ?>
        <option><?php echo $row[0] ?></option>
    <?php } mysqli_close($conexionblablabla);?>
    </datalist>
    <input type="text" class="grid-item" id="telefono_add" name="telefono_add" placeholder="Teléfono..." size="30" maxlength="70" autocomplete="off"/>
    <input type="text" class="grid-item" id="email_add" name="email_add" placeholder="Email..." size="30" maxlength="70" autocomplete="off"/>
    <input type="text" class="grid-item" id="comuna_add" name="comuna_add" placeholder="Comuna..." size="30" maxlength="70" autocomplete="off"/>
    <label id="id_cliente">ID Cliente: 0 </label><button class="boton_ingresar" id='add'>Ingresar</button>
		<button id='agregar_datos' class='agregar_datos'>Agregar Fila</button>
</div>
    <aside id="result"><b></b></aside>
    <br></br>
</div>
</div>
<div id="modal_ver_abonos4" class="modal_ver_abonos4" style="display:none;">
    <div class="modal-content4">
        <aside id="cuadrado_modal4" class="cuadrado_modal4">
            <label class="adorno_botones_modal"><img src="../Imagenes/wincontrol_cerrar.png" id="close_modal" class="close_modal"></img></label>
            <label class= "titulo2">Calendario</label>
        </aside>
        <br></br>
        <p style="text-align:center;">¿Por cuál desea Ingresar?</p>
        <br></br>
        <br></br>
        <div class="grid-container">
            <button class="grid-item-modal" id='reparacion'>Reparación</button>
            <button class="grid-item-modal" id='restificacion'>Rectificación</button>
            <button class="grid-item-modal" id='visitatecnica'>Visita Técnica</button>
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
