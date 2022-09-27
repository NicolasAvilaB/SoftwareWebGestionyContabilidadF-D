<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<noscript>
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=java.html">
</noscript>
<style type="text/css">
@import url("menu.css");
</style>
<link href="menu.css" rel="stylesheet" type="text/css">
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
<link rel="stylesheet"  href="../Imagenes/jquery.dataTables.min.css" type="text/css">
<link rel="icon" href="../Imagenes/logofinder.png">
<script src="../Imagenes/jquery.dataTables.min.js"></script>
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
    $valor_usuario = $_SESSION['usuario'];
}
?>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
var nuevoalias = jQuery.noConflict();
nuevoalias(document).ready(function(){
    function obtener_datos_contar_tareaspendientes(){
        nuevoalias.ajax({
            url:"buscar_tareapendiente.php",
            method:"POST",
            async:false,
            data: {texto: '<?php echo $valor_nombre ?>'},
            success: function(data){
                nuevoalias("#boton_tare").html(data);
            }
        });
    }
    function crear_tabla_restificacion(texto,texto2,texto3,texto4){
        nuevoalias.ajax({
            url: "buscar_tabla_restificacion.php",
            method: "POST",
            data: {texto: texto, texto2: texto2, texto3: texto3, texto4: texto4},
            success: function(data){
                nuevoalias("#resultado_medidasrestificacion").html(data);
            }
        });
    }
    function mostrar_datos_calendario_etiquetas(){
        nuevoalias.ajax({
            url:"buscar_todo_calendario_etiquetas.php",
            method:"POST",
            async:false,
            data: {texto: '<?php echo $valor_nombre ?>'},
            success: function(data){
                nuevoalias("#resultado_tareapendiente_calendario").html(data);
            }
        });
    }
    function obtener_datos(){
        nuevoalias.ajax({
            url:"buscar.php",
            method:"POST",
            data: {texto: '<?php echo $valor_empresa ?>'},
            success: function(data){
                nuevoalias("#result").html(data)
            }
        })
    }
    obtener_datos();
    nuevoalias(document).on("click","#actualizar_ventas",function(){
        obtener_datos();
    });
    function obtener_datos_deuda(){
        nuevoalias.ajax({
            url:"buscar_deuda.php",
            method:"POST",
            data: {texto: <?php echo $valor_idempresa ?>},
            success: function(data){
                nuevoalias("#result_deuda").html(data)
            }
        });
    }
    obtener_datos_deuda();
    nuevoalias(document).on("click","#actualizar_clientes",function(){
        obtener_datos_deuda();
    });
    obtener_datos_contar_tareaspendientes();
    function llamar_modal(){
        var modal = document.getElementById("modal_ver_abonos");
        nuevoalias("#modal_ver_abonos").css("display", "block");
        nuevoalias(document).on("click","#close_modal",function(){
            nuevoalias("#modal_ver_abonos").css("display", "none");
        });
        nuevoalias(window).on("click",function(event){
        	if (event.target == modal) {
        		nuevoalias("#modal_ver_abonos").css("display", "none");
        	}
        });
    }
    function llamar_modal5(){
        var modal = document.getElementById("modal_ver_abonos5");
        nuevoalias("#modal_ver_abonos5").css("display", "block");
        nuevoalias(document).on("click","#close_modal",function(){
            nuevoalias("#modal_ver_abonos5").css("display", "none");
        });
        nuevoalias(window).on("click",function(event){
        	if (event.target == modal) {
        		nuevoalias("#modal_ver_abonos5").css("display", "none");
        	}
        });
    }
		function llamar_modal1(){
        var modal = document.getElementById("modal_ver_abonos1");
        nuevoalias("#modal_ver_abonos1").css("display", "block");
        nuevoalias(document).on("click","#close_modal1",function(){
            nuevoalias("#modal_ver_abonos1").css("display", "none");
        });
        nuevoalias(window).on("click",function(event){
        	if (event.target == modal) {
        		nuevoalias("#modal_ver_abonos1").css("display", "none");
        	}
        });
    }
    nuevoalias(".modal-content").draggable({
        handle: ".cuadrado_modal"
    });
		nuevoalias(".modal-content1").draggable({
        handle: ".cuadrado_modal1"
    });
    nuevoalias(".modal-content5").draggable({
        handle: ".cuadrado_modal5"
    });
    nuevoalias(document).on("click","#tareaspendientes",function(){
        llamar_modal();
        mostrar_datos_calendario_etiquetas();
    });
    nuevoalias(document).on("click","#completar_tramite", function(){
        var id = nuevoalias(this).data("idevento");
				var titulop = nuevoalias(this).data("titulo");
				var fechaemp = nuevoalias(this).data("fechastart");
				var fechatep = nuevoalias(this).data("fechaend");
				var tecnicop = nuevoalias(this).data("tecnico");
				var horariop = nuevoalias(this).data("horario");
				var nombrep = nuevoalias(this).data("nombre");
				var direccionp = nuevoalias(this).data("direccion");
				var comunap = nuevoalias(this).data("comuna");
				var telefonop = nuevoalias(this).data("telefono");
				var desc_clientep = nuevoalias(this).data("descrcliente");
				var obs_tecnicop = nuevoalias(this).data("observacionestecnico");
        var tipo = nuevoalias(this).data("tipo");
        nuevoalias.ajax({
            url:"completar_evento_calendario.php",
            method:"POST",
            data: {texto: id},
            success: function(data){
                obtener_datos_contar_tareaspendientes();
                mostrar_datos_calendario_etiquetas();
            }
        });
				nuevoalias("#tecnico_pend").val(tecnicop);
				nuevoalias("#fecha_inicio_pend").val(fechaemp);
				nuevoalias("#fecha_fin_pend").val(fechatep);
				nuevoalias("#horario_pend").val(horariop);
				nuevoalias("#detalle_pend").val(titulop);
				nuevoalias("#cliente_pend").val(nombrep);
				nuevoalias("#direccion_pendiente").val(direccionp);
				nuevoalias("#comuna_pend").val(comunap);
				nuevoalias("#telefono_pend").val(telefonop);
				nuevoalias("#descripcion_pendiente").val(desc_clientep);
				nuevoalias("#observaciones_pendiente").val(obs_tecnicop);
				nuevoalias("#informes_tipicos").html("<a id='boton_generar_informe' href='generar_informe_pendiente.php?tipo="+tipo+"&tecnico="+tecnicop+"&fechaem="+fechaemp+"&fechate="+fechatep+"&horario="+horariop+"&titulo="+titulop+"&cliente="+nombrep+"&direccion="+direccionp+"&comuna="+comunap+"&telefono="+telefonop+"&descrcliente="+desc_clientep+"&obstec="+obs_tecnicop+"' type='button' value='View PDF' class='btn btn-primary' target='_blank'>Informe </a>");
				nuevoalias("#modal_ver_abonos").css("display","none");
				llamar_modal1();
    });
    nuevoalias(document).on("click","#revisar_restificacion",function(){
        var id = nuevoalias(this).data("idevento");
        var idcliente = nuevoalias(this).data("idcliente");
        var tecnico = nuevoalias(this).data("tecnico");
        var obsssss = nuevoalias(this).data("observaciones_tecnico");
        var tipotarea = nuevoalias(this).data("tipotarea");
        if (tipotarea == '2'){
        }else if(tipotarea == '1'){
            nuevoalias.ajax({
                url:"completar_evento_calendario.php",
                method:"POST",
                data: {texto: id},
                success: function(data){
                    obtener_datos_contar_tareaspendientes();
                    mostrar_datos_calendario_etiquetas();
                }
            });
        }
        nuevoalias("#observaciones_tecnico_m").val(obsssss);
        crear_tabla_restificacion(id,idcliente,obsssss,tecnico);
        llamar_modal5();
    });

});
</script>
</head>
<title>Sociedad FYD - Gestión y Contabilidad </title>
<body>
<img src="../Imagenes/fondo_login.jpg" id="fondo"/>
<p></p>
<div class="form1">
<div class="form0">
<aside class="cuadrado">
<label class="adorno_botones"><img src="../Imagenes/wincontrol.png"></img></label>
<label class= "titulo2">Inicio </label>
<form id="form" class="form" name="form" method="POST">
<p class="btn_arriba">
    <input type="submit" onclick="" id="clientes" name="clientes" class="botones_barra" value="Clientes"><input type="submit" onclick="" id="cotizaciones" name="cotizaciones" class="botones_barra" value="Cotizaciones"><input type="submit" onclick="" id="notaventa" name="notaventa" class="botones_barra" value="Nota Venta"><input type="submit" onclick="" id="calvend" name="calvend" class="botones_barra" value="Calendario"><label class="holavendedor"><?php echo "<label style='font-weight:600;'>".$valor_empresa."</label> - Hola, " . $valor_nombre ?><input type="submit" onclick="" id="ce" class="ce" name="ce" value="Cerrar Sesión"></label></p>
</aside>
<?php
    if(isset($_POST["clientes"])){
        session_start();
		$_SESSION['nombre'] = $valor_nombre;
		$_SESSION['idempresa'] = $valor_idempresa;
		$_SESSION['empresa'] = $valor_empresa;
		$_SESSION['usuario'] = $valor_usuario;
		echo "<script>location.replace('./Clientes/clientes.php')</script>";
	}
	if(isset($_POST["cotizaciones"])){
        session_start();
		$_SESSION['nombre'] = $valor_nombre;
		$_SESSION['idempresa'] = $valor_idempresa;
		$_SESSION['empresa'] = $valor_empresa;
		echo "<script>location.replace('./Cotizaciones/cotizaciones.php')</script>";
	}
	if(isset($_POST["notaventa"])){
        session_start();
		$_SESSION['nombre'] = $valor_nombre;
		$_SESSION['idempresa'] = $valor_idempresa;
		$_SESSION['empresa'] = $valor_empresa;
		echo "<script>location.replace('./NotaVenta/ventas.php')</script>";
	}
	if(isset($_POST["calvend"])){
        session_start();
		$_SESSION['nombre'] = $valor_nombre;
		$_SESSION['idempresa'] = $valor_idempresa;
		$_SESSION['empresa'] = $valor_empresa;
		echo "<script>location.replace('./Calendario/calendario_vend.php')</script>";
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
<div id="result"><b></b></div>
<p>&nbsp;</p>
&nbsp;&nbsp;<button id='actualizar_clientes' class='boton_actualizar_clientes_deuda'>Actualizar Clientes Deuda</button><div id="boton_tare"></div>
<p>&nbsp;</p>
<a id="numero_filas_texto">&nbsp;&nbsp;&nbsp;Número de Filas: </a>
<select id='cant_filas'>
    	<option>10</option>
    	<option>25</option>
    	<option>50</option>
    	<option>100</option>
    	<option>150</option>
    	<option>200</option>
    	<option>250</option>
    	<option>300</option>
    	<option>350</option>
    	<option>400</option>
    	<option>450</option>
    	<option>500</option>
    </select>
<div style='float:right;'>
	<a id="numero_filas_texto">Buscar en Tabla: </a><input id='search' type='text' autocomplete='off'/>
</div>
<p>&nbsp;</p>
<div class="tablascroll">
    <div id="result_deuda"><b></b></div>
    <br></br>
    <br></br>
</div>
<br></br>
</div>
<div id="modal_ver_abonos1" class="modal_ver_abonos1" style="display:none;">
    <div class="modal-content1">
        <aside id="cuadrado_modal1" class="cuadrado_modal1">
            <label class="adorno_botones_modal"><img src="../Imagenes/wincontrol_cerrar.png" id="close_modal" class="close_modal"></img></label>
            <label class="titulo99">Consulta Tareas</label>
        </aside>
				<div id="scroll4">
            <br></br>
						<label><strong>Técnico:&nbsp;&nbsp;</strong><input id="tecnico_pend"  placeholder="Tecnico..." size="40" maxlength="100" autocomplete="off" disabled/></label>
						<p>&nbsp;</p>
						<label><strong>Fecha Inicio:&nbsp;&nbsp;</strong><input type="date" id="fecha_inicio_pend" name="fecha_inicio_pend" min='2005-01-01' max='2100-12-31' placeholder="Fecha Inicio..." size="40" maxlength="100" autocomplete="off" disabled/></label>
						<p>&nbsp;</p>
						<label><strong>Fecha Fin:&nbsp;&nbsp;</strong><input type="date" id="fecha_fin_pend" name="fecha_fin_pend" min='2005-01-01' max='2100-12-31' placeholder="Fecha Fin..." size="40" maxlength="100" autocomplete="off" disabled/></label>
						<p>&nbsp;</p>
						<label><strong>Horario:&nbsp;&nbsp;</strong><input id="horario_pend"  placeholder="Horario..." size="40" maxlength="100" autocomplete="off" disabled/></label>
						<p>&nbsp;</p>
						<label><strong>Detalle:&nbsp;&nbsp;</strong><input id="detalle_pend"  placeholder="Detalle..." size="40" maxlength="100" autocomplete="off" disabled/></label>
						<p>&nbsp;</p>
						<label><strong>Cliente:&nbsp;&nbsp;</strong><input id="cliente_pend"  placeholder="Cliente..." size="40" maxlength="100" autocomplete="off" disabled/></label>
						<p>&nbsp;</p>
						<label><strong style="font-size: 1.2vw;">Dirección:</strong></label>
            <p></p>
						&nbsp;<textarea id="direccion_pendiente" name="direccion_pendiente" style="width:400px; height:90px;" placeholder="Direccion..." disabled></textarea>
            &nbsp;&nbsp;
						<p>&nbsp;</p>
						<label><strong>Comuna:&nbsp;&nbsp;</strong><input id="comuna_pend"  placeholder="Comuna..." size="40" maxlength="100" autocomplete="off" disabled/></label>
						<p>&nbsp;</p>
						<label><strong>Teléfono:&nbsp;&nbsp;</strong><input id="telefono_pend"  placeholder="Teléfono..." size="40" maxlength="100" autocomplete="off" disabled/></label>
						<p>&nbsp;</p>
						<label><strong style="font-size: 1.2vw;">Descripción Cliente:</strong></label>
            <p></p>
						&nbsp;<textarea id="descripcion_pendiente" name="descripcion_pendiente" style="width:400px; height:90px;" placeholder="Descripcion..." disabled></textarea>
            &nbsp;&nbsp;
						<p>&nbsp;</p>
						<label><strong style="font-size: 1.2vw;">Observaciones Técnico:</strong></label>
            <p></p>
						&nbsp;<textarea id="observaciones_pendiente" name="observaciones_pendiente" style="width:400px; height:90px;" placeholder="Observaciones..." disabled></textarea>
            &nbsp;&nbsp;
						<div id="informes_tipicos"></div>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						<br></br>
				</div>
    </div>
</div>
<div id="modal_ver_abonos" class="modal_ver_abonos" style="display:none;">
    <div class="modal-content">
        <aside id="cuadrado_modal" class="cuadrado_modal">
            <label class="adorno_botones_modal"><img src="../Imagenes/wincontrol_cerrar.png" id="close_modal" class="close_modal"></img></label>
            <label class="titulo99">Consulta Tareas</label>
        </aside>
            <br></br>
            <div id="resultado_tareapendiente_calendario"></div>
            <br></br>
    </div>
</div>
<div id="modal_ver_abonos5" class="modal_ver_abonos5" style="display:none;">
    <div class="modal-content5">
        <aside id="cuadrado_modal5" class="cuadrado_modal5">
            <label class="adorno_botones_modal"><img src="../Imagenes/wincontrol_cerrar.png" id="close_modal" class="close_modal"></img></label>
            <label class= "titulo2">Consulta Rectificación</label>
        </aside>
        <div id="scroll4">
            <p>&nbsp;</p>
            <label id="IdRestificacion_id" style="display:none;"></label>
            <!--<button class="boton_ingresar" id='boton_agregarfila_tabla_restificacion'>Agregar Fila</button>-->
            <div id="resultado_medidasrestificacion"></div>
            <br></br>
            <label><strong style="font-size: 1.2vw;">Observaciones Técnico:</strong></label>
            <p></p>
            &nbsp;<textarea id="observaciones_tecnico_m" name="observaciones_tecnico_m" style="width:300px; height:90px;" placeholder="Escriba Observaciones..." disabled></textarea>
            &nbsp;&nbsp;
            <!--<button class="boton_ingresar" id='guardar_medidas_restificacion'>Guardar Medidas</button>-->
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
        </div>
    </div>
</div>
<p class="titulo75">SOCIEDAD FYD</p>
<p class="copy">Copyright © 2021 | Diseñado por N.A.B para Comercial F&amp;D</p>
</body>
</html>
