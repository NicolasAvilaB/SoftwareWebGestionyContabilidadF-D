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
@import url("calendario.css");
</style>
<link href="calendario.css" rel="stylesheet" type="text/css">
<link rel="stylesheet"  href="../Imagenes/jquery.dataTables.min.css" type="text/css">
<link href="fullcalendar.min.css" rel="stylesheet" type="text/css">
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
<script src="moment.min.js"></script>
<script src="fullcalendar.min.js"></script>
<script src="es-us.js"></script>
<article src="../Imagenes/fondo_login.jpg" id="contenedor_carga">
	<img src="../Imagenes/carga.png" id="carga"></img>
</article>
<script>
window.onload = function(){
    var nuevoalias = jQuery.noConflict();
	nuevoalias("#contenedor_carga").css({"visibility": "hidden", "opacity": "0"});
    var nuevoalias = jQuery.noConflict();
	nuevoalias("#carga").css("animation-play-state", "paused");
}
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
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.2.11/jspdf.plugin.autotable.min.js"></script>
<!--<script src='https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js'></script>-->
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
<label id="titulo2" class= "titulo2">Calendario</label>
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

<button id="desplegar_item" class="dropbtn">Calendario</button>
</div>
<div id="pestanas"></div>
<div class="tablascroll">
        <div id="contenedor_calendario">
            <?php
                $conexion223 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
                mysqli_set_charset($conexion223,"utf8");
                $ejecutar223 = mysqli_query($conexion223,"select Instalador from Instaladores where Estado = 'Desactivar'");
                mysqli_set_charset($conexion223,"utf8");
            ?>
            <select id="tecnicofiltro" name="tecnicofiltro">
                <option value='all'>Todos</option>
            <?php while ($row223 = mysqli_fetch_array($ejecutar223)) { ?>
                <option value='<?php echo $row223[0];?>'><?php echo $row223[0];?></option>
            <?php } ?>
            </select>
            <button id="tecnicofiltrar">Filtrar</button>
            <div id="Calendario"></div>
        </div>

</div>
        <div id="lateral-derecho">
            <label><strong>Técnico:&nbsp;&nbsp;</strong>
                <?php
                    $conexion22 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
                    mysqli_set_charset($conexion22,"utf8");
                    $ejecutar22 = mysqli_query($conexion22,"select Instalador from Instaladores where Estado = 'Desactivar'");
                    mysqli_set_charset($conexion22,"utf8");
                ?>
                <select id="tecnico" name="tecnico">
                    <option value='0' disabled selected>Seleccione Técnico...</option>
                <?php while ($row22 = mysqli_fetch_array($ejecutar22)) { ?>
                    <option value='<?php echo $row22[0];?>'><?php echo $row22[0];?></option>
                <?php } ?>
                </select>
            </label>
            <p>&nbsp;</p>
            <label><strong>Fecha Inicio:&nbsp;&nbsp;</strong><input type="date" id="fecha_inicio" name="fecha_inicio" min='2005-01-01' max='2100-12-31' placeholder="Fecha Inicio..." size="40" maxlength="100" autocomplete="off" /></label>&nbsp;&nbsp;<button class="boton_ingresar" id='feriado'>Feriado</button>

            <p>&nbsp;</p>
            <label><strong>Fecha Fin:&nbsp;&nbsp;</strong><input type="date" id="fecha_fin" name="fecha_fin" min='2005-01-01' max='2100-12-31' placeholder="Fecha Fin..." size="40" maxlength="100" autocomplete="off" /></label>
            <p>&nbsp;</p>
            <label><strong>Horario:&nbsp;&nbsp;</strong>
						<div id="horario_bd"></div></label>
            <p>&nbsp;</p>
            <label><strong>Vendedor/a:&nbsp;&nbsp;</strong>
            <?php
                $conexion22 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
                mysqli_set_charset($conexion22,"utf8");
                $ejecutar22 = mysqli_query($conexion22,"select Nombre from Vendedores");
                mysqli_set_charset($conexion22,"utf8");
            ?>
            <select id="select_vendedora" name="select_vendedora">
                <option value='0' disabled selected>Seleccione Vendedora...</option>
            <?php while ($row22 = mysqli_fetch_array($ejecutar22)) { ?>
                <option value='<?php echo $row22[0];?>'><?php echo $row22[0];?></option>
            <?php } ?>
            </select>
            </label>
            <p>&nbsp;</p>
            <label><strong>Detalle:&nbsp;&nbsp;</strong>
            <select id="select_detalle" name="select_detalle">
                <option value="1" disabled selected>Seleccione Detalle...</option>
                <option value="Reparación">Reparación</option>
                <option value="Restificación">Restificación</option>
                <option value="Visita Técnica">Visita Técnica</option>
            </select>
            </label>
            &nbsp;&nbsp;<button class="boton_ingresar" id='ingresar'>Ingresar</button>
            <p>&nbsp;</p>
            <label><strong>Buscar Cliente:&nbsp;&nbsp;</strong>
            <input list="lista_clientes" type="text" id="buscar_cliente" name="buscar_cliente" style="font-size: 1.1vw; padding:3px 3px 3px 10px; text-align:center;" placeholder="Nombre Cliente..." size="30" maxlength="100" autocomplete="off"/>
                <?php
                    $conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
                    mysqli_set_charset($conexion,"utf8");
                    $ejecutar = mysqli_query($conexion,"Call Mostrar_Id_Nombre_Clientes_Todo()");
                    mysqli_set_charset($conexion,"utf8");
                ?>
                <datalist id="lista_clientes">
                <?php while ($row = mysqli_fetch_array($ejecutar)) {  ?>
                    <option value="<?php echo $row[0] ?>"><?php echo $row[1]?></option>
                <?php } ?>
                </datalist>
            </label>
            <p>&nbsp;</p>
            <div id="resultado_busqueda"></div>
            <label><strong>Observaciones:</strong></label>
            <p></p>
            <textarea id="observaciones" name="observaciones" placeholder="Escriba Observaciones..."></textarea>
            <p></p>
            <label>* Luis - Amarillo</label>
            <p></p>
            <label>* Daniel - Verde</label>
            <p></p>
            <label>* Fredy - Azul</label>
            <p></p>
            <label>* Jose - Rosado Maraco</label>
            <p></p>
            <label>* Sin Instalación - Blanco</label>
	    <br></br>
            <label>* Maria Paz / Persianas exteriores pym - Azul</label>
            <p></p>
            <label>* Carol Franceschi / Persianas Santiago - Cafe</label>
            <p></p>
            <label>* Gabriela Urzua / Persianas Exteriores - Gris</label>
            <p></p>
            <label>* Maria Paz / Comercial PYM - Rojo</label>
            <p></p>
            <label>* Maria Paz Avila / Persiaprot Ltda - Naranjo</label>
            <p></p>
	    <label>* Paz Muñoz / Persianas Fyd - Morado</label>
            <p></p>
	    <label>* Eduarda Muñoz / Persianas de proteccion - Negro</label>
            <p></p>

</div>
<?php
		$conexion111 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
		mysqli_set_charset($conexion111,"utf8");
		if(mysqli_connect_errno()){
				echo mysqli_connect_error();
		}
		$consulta111 = mysqli_query($conexion111, "select Nombre from Tecnicos") or die (mysqli_error($conexion));
		$botones = "";
		while($row111 = mysqli_fetch_array($consulta111)){
				$botones .= "<button id='inventario' data-tecnico_inventario='".$row111[0]."'>Inv. ".$row111[0]."</button>";
		}
		echo "<div style='margin-top:-35px;'>".$botones."</div>";
		$consulta111->close();
		$conexion111->more_results();
?>
</div>
<div id="modal_ver_abonos" class="modal_ver_abonos" style="display:none;">
    <div class="modal-content">
        <aside id="cuadrado_modal" class="cuadrado_modal">
            <label class="adorno_botones_modal"><img src="../Imagenes/wincontrol_cerrar.png" id="close_modal" class="close_modal"></img></label>
            <label class= "titulo2">Consulta Calendario</label>
						<div style="position:absolute;float:left;margin-top:10px;">
                <button id="sacar_informe"class="sacar_informe">Informe</button>
            </div>
        </aside>
            <p>&nbsp;</p>
            <p style="text-align:center; font-size:1.2vw;">Resumen Día</p>
            <p style="text-align:center; font-weight:bold; font-size:1.3vw;"><label id="fecha_lista"></label><label id="fecha_lista000" style="display:none;"></label></p>
            <p>&nbsp;</p>
            <div id="resultadodia_resumentodo"></div>
            <br></br>
    </div>
</div>
<div id="modal_ver_abonos2" class="modal_ver_abonos2" style="display:none;">
    <div class="modal-content2">
        <aside id="cuadrado_modal2" class="cuadrado_modal2">
            <label class="adorno_botones_modal"><img src="../Imagenes/wincontrol_cerrar.png" id="close_modal" class="close_modal"></img></label>
            <label class= "titulo2">Editar Evento</label>
        </aside>
            <p>&nbsp;</p>
            <p style="text-align:center; font-size:1.2vw;">Resumen Día</p>
            <p style="text-align:center; font-weight:bold; font-size:1.3vw;"><label id="fecha_lista2"></label></p>
            <div id="inst" style="padding:25px;" style="display:none;">
                <!--<label><strong style="font-size: 1.2vw;">Técnico:&nbsp;&nbsp;</strong>
                <input list="lista_instalador" type="text" style="font-size: 1.1vw; padding:3px 3px 3px 10px; text-align:center;" id="instalador" name="instalador" placeholder="Instalador..." size="20" maxlength="100" autocomplete="off" disabled/></label>
                <p>&nbsp;</p>-->
                <label><strong style="font-size: 1.2vw;">Fecha Instalación Aprox:&nbsp;&nbsp;</strong><input type="date" id="fecha_instalacion" name="fecha_instalacion" min='2005-01-01' max='2100-12-31' placeholder="Fecha Instalacion..." size="40" maxlength="100" autocomplete="off" disabled/></label>
                <p>&nbsp;</p>
                <label><strong style="font-size: 1.2vw;">Descripción TODO:</strong></label>
                <p></p>
                <div id="descripcion_instalacion"></div>
                <p>&nbsp;</p>
            </div>
            <div id="rep_rest" style="padding:25px;" style="display:none;">
                <label id="IdEvento" style="display:none;"></label>
                <label id="detalle_modal_evento" style="display:none;"></label>
                <label id="tecnico_modal_evento" style="display:none;"></label>
                <div id="scroll">
                    <p>&nbsp;</p>
                    <label><strong style="font-size: 1.2vw;">Técnico:&nbsp;&nbsp;</strong>
                    <?php
                        $conexion22 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
                        mysqli_set_charset($conexion22,"utf8");
                        $ejecutar22 = mysqli_query($conexion22,"select Instalador from Instaladores where Estado = 'Desactivar'");
                        mysqli_set_charset($conexion22,"utf8");
                    ?>
                    <select id="tecnico_modal" name="tecnico_modal">
                        <option value='0' disabled selected>Seleccione Técnico...</option>
                    <?php while ($row22 = mysqli_fetch_array($ejecutar22)) { ?>
                        <option value='<?php echo $row22[0];?>'><?php echo $row22[0];?></option>
                    <?php } ?>
                    </select></label>
                    <p>&nbsp;</p>
                    <label><strong style="font-size: 1.2vw;">Fecha Inicio:&nbsp;&nbsp;</strong><input type="date" id="fecha_inicio_modal" name="fecha_inicio_modal" min='2005-01-01' max='2100-12-31' placeholder="Fecha Inicio..." size="40" maxlength="100" autocomplete="off" /></label>
                    <p>&nbsp;</p>
                    <label><strong style="font-size: 1.2vw;">Fecha Fin:&nbsp;&nbsp;</strong><input type="date" id="fecha_fin_modal" name="fecha_fin_modal" min='2005-01-01' max='2100-12-31' placeholder="Fecha Fin..." size="40" maxlength="100" autocomplete="off" /></label>
                    <p>&nbsp;</p>
                    <label><strong style="font-size: 1.2vw;">Horario:&nbsp;&nbsp;</strong>
										<div id="horario_bd_modal"></div></label>
										<p>&nbsp;</p>
										<label id="shorario_modal" style="display:none;"></label>
                    &nbsp;&nbsp;<button class="boton_ingresar" id='borrar_modal'>Borrar</button>
                    <p>&nbsp;</p>
                    <label><strong>Vendedor/a:&nbsp;&nbsp;</strong>
                    <?php
                        $conexion22 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
                        mysqli_set_charset($conexion22,"utf8");
                        $ejecutar22 = mysqli_query($conexion22,"select Nombre from Vendedores");
                        mysqli_set_charset($conexion22,"utf8");
                    ?>
                    <select id="select_vendedora_modal" name="select_vendedora_modal">
                        <option value='0' disabled selected>Seleccione Vendedora...</option>
                    <?php while ($row22 = mysqli_fetch_array($ejecutar22)) { ?>
                        <option value='<?php echo $row22[0];?>'><?php echo $row22[0];?></option>
                    <?php } ?>
                    </select>
                    </label>
                    <p>&nbsp;</p>
                    <label><strong style="font-size: 1.2vw;">Detalle:&nbsp;&nbsp;</strong>
                    <select id="select_detalle_modal" name="select_detalle_modal">
                        <option value="1" disabled selected>Seleccione Detalle...</option>
                        <option value="Reparación">Reparación</option>
                        <option value="Restificación">Restificación</option>
                        <option value="Visita Técnica">Visita Técnica</option>
                    </select>
                    </label>
                    &nbsp;&nbsp;<button class="boton_ingresar" id='modificar_modal'>Modificar</button>
                    <!--<label><strong style="font-size: 1.2vw;">Color Etiqueta:&nbsp;&nbsp;</strong>
                    <input type="color" value="#612897" id="color_modal"/>-->
                    <p>&nbsp;</p>
                    <label><strong style="font-size: 1.2vw;">Buscar Cliente:&nbsp;&nbsp;</strong>
                    <input list="lista_clientes" type="text" id="buscar_cliente_modal" name="buscar_cliente_modal" style="font-size: 1.1vw; padding:3px 3px 3px 10px; text-align:center;" placeholder="Nombre Cliente..." size="30" maxlength="100" autocomplete="off"/>
                    </label>
                    <p>&nbsp;</p>
                    <div id="resultado_busqueda_modal"></div>
                    <label><strong style="font-size: 1.2vw;">Descripción Cliente:</strong></label>
                    <p></p>
                    &nbsp;<textarea id="observaciones_modal" name="observaciones_modal" style="width:300px; height:90px;" placeholder="Escriba Observaciones..."></textarea>
                    <p>&nbsp;</p>
                    <label><strong style="font-size: 1.2vw;">Observaciones Técnico:</strong></label>
                    <p></p>
                    &nbsp;<textarea id="observaciones_tecnico" name="observaciones_tecnico" style="width:300px; height:90px;" placeholder="Escriba Observaciones..."></textarea>
                    &nbsp;&nbsp;<button class="boton_dejarpendiente" id='dejarpendiente_modal'>Dejar Pendiente</button><button class="boton_datosrestificacion" id='medidas_restificacion' style="display:none;">Revisar Restificación</button>
										&nbsp;&nbsp;
										<div id="informes"></div>
										<p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                </div>
            </div>
    </div>
</div>
<div id="modal_ver_abonos5" class="modal_ver_abonos5" style="display:none;">
    <div class="modal-content5">
        <aside id="cuadrado_modal5" class="cuadrado_modal5">
            <label class="adorno_botones_modal"><img src="../Imagenes/wincontrol_cerrar.png" id="close_modal" class="close_modal"></img></label>
            <label class= "titulo2">Consulta Restificación</label>
        </aside>
        <div id="scroll4">
            <p>&nbsp;</p>
            <label id="IdRestificacion_id" style="display:none;"></label>
            <label id="nombre_instalador_restificacion" style="display:none;"></label>
            <button class="boton_ingresar" id='boton_agregarfila_tabla_restificacion'>Agregar Fila</button>
            <p>&nbsp;</p>
            <div id="resultado_medidasrestificacion"></div>
            <br></br>
						<label><strong style="font-size: 1.2vw;">Descripción Cliente:</strong></label>
            <p></p>
            &nbsp;<textarea id="observaciones_cliente_m" name="observaciones_cliente_m" style="width:300px; height:90px;" placeholder="Escriba Observaciones..."></textarea>
            &nbsp;&nbsp;
						<p></p>
						<label><strong style="font-size: 1.2vw;">Observaciones Técnico:</strong></label>
            <p></p>
            &nbsp;<textarea id="observaciones_tecnico_m" name="observaciones_tecnico_m" style="width:300px; height:90px;" placeholder="Escriba Observaciones..."></textarea>
            &nbsp;&nbsp;
            <button class="boton_ingresar" id='guardar_medidas_restificacion'>Guardar Medidas</button>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
        </div>
    </div>
</div>
<div id="modal_ver_abonos7" class="modal_ver_abonos7" style="display:none;">
    <div class="modal-content7">
        <aside id="cuadrado_modal7" class="cuadrado_modal7">
            <label class="adorno_botones_modal"><img src="../Imagenes/wincontrol_cerrar.png" id="close_modal" class="close_modal"></img></label>
            <label class= "titulo2">Instalación</label>
        </aside>
        <p>&nbsp;</p>
        <p style="text-align:center; font-size:1.2vw;">Resumen Día</p>
        <p style="text-align:center; font-weight:bold; font-size:1.3vw;"><label id="fecha_lista20"></label></p>
        <div id="scroll7">
            <p>&nbsp;</p>
            <!--<label><strong style="font-size: 1.2vw;">Técnico:&nbsp;&nbsp;</strong>
            <input list="lista_instalador" type="text" style="font-size: 1.1vw; padding:3px 3px 3px 10px; text-align:center;" id="instalador_ad" name="instalador_ad" placeholder="Instalador..." size="20" maxlength="100" autocomplete="off" disabled/></label>
            <p>&nbsp;</p>-->
            <label id="IdNotaVenta_Inst_Admin" style="display:none;"></label>
            <label><strong style="font-size: 1.2vw;">Fecha Instalación Aprox:&nbsp;&nbsp;</strong><input type="date" id="fecha_instalacion20a" name="fecha_instalacion20a" min='2005-01-01' max='2100-12-31' placeholder="Fecha Instalacion..." size="40" maxlength="100" autocomplete="off" disabled/></label>
            <p>&nbsp;</p>
            <label><strong style="font-size: 1.2vw;">Detalle:&nbsp;&nbsp;</strong>
            <input id="select_detalle_modal_insta" name="select_detalle_modal_insta" disabled /></label>
            <p>&nbsp;</p>
            <label><strong style="font-size: 1.2vw;">Descripción Instalación:&nbsp;&nbsp;</strong></label>
            <p></p>
            <label id="datos_instalaciona"></label>
            <label><strong style="font-size: 1.2vw;">Descripción Cliente:</strong></label>
            <p></p>
            <textarea id="observaciones_insta" name="observaciones_insta" placeholder="Escriba Observaciones..."></textarea>
            <p></p>
            <label id="letras_observaciones"><strong style="font-size: 1.2vw;">Observaciones Técnico:</strong></label>
            <p></p>
            <textarea id="observaciones_tecnico_insta" name="observaciones_tecnico_insta" style="width:300px; height:90px;" placeholder="Escriba Observaciones..."></textarea><button class="boton_dejarpendiente" id="dejarpendiente_inst_modal">Dejar Pendiente</button>
            <p>&nbsp;</p>
            <button class="boton_ingresar" id='guardar_modal_insta'>Guardar</button>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
						<div id="informes_inst"></div>
            <p>&nbsp;</p>
        </div>
    </div>
</div>
<div id="modal_ver_abonos10" class="modal_ver_abonos10" style="display:none;">
    <div class="modal-content10">
        <aside id="cuadrado_modal10" class="cuadrado_modal10">
            <label class="adorno_botones_modal"><img src="../Imagenes/wincontrol_cerrar.png" id="close_modal" class="close_modal"></img></label>
            <label class="titulo2">Inventario <label id="nombre_tecnico"></label></label>
						<label><strong id="nombre_tecnico_pantalla" style="position:absolute;margin-top:2%;margin-left:-13%;">bla bla bla</strong></label>
				</aside>
        <p>&nbsp;</p>
				<div id="scroll8">
						<div id="result_productos_cantidad" style="float:left;margin-left:10px; width:45%;"></div>
						<div id="result_productos_detalle" style="float:right;margin-left:10px; margin-right:7px; width:49%;"></div>
				</div>
		</div>
</div>
<script>
    var nuevoalias = jQuery.noConflict();
	nuevoalias(document).ready(function(){
				function obtener_datos_fecha(texto, texto2){
						nuevoalias.ajax({
								url:"horarios_x4.php",
								method:"POST",
								data: {texto: texto, texto2: texto2},
								success: function(data){
										nuevoalias("#horario_bd").html(data);
								}
						});
				}
				function obtener_datos_fecha_modal(texto, texto2, texto3){
						nuevoalias.ajax({
								url:"horarios_x4_modal.php",
								method:"POST",
								data: {texto: texto, texto3: texto3},
								success: function(data){
										nuevoalias("#horario_bd_modal").html(data);
										nuevoalias("#select_horario_modal option:contains("+texto2+")").attr('selected', true);
								}
						});
				}

        function obtener_datos_cliente(texto){
            nuevoalias.ajax({
                url:"buscar_cliente.php",
                method:"POST",
                data: {texto: texto},
                success: function(data){
                    nuevoalias("#resultado_busqueda").html(data);
                }
            });
        }
        function obtener_datos_cliente_modal(texto){
            nuevoalias.ajax({
                url:"buscar_cliente_modal.php",
                method:"POST",
                data: {texto: texto},
                success: function(data){
                    nuevoalias("#resultado_busqueda_modal").html(data);
                }
            });
        }
        function obtener_datos_resumentodo_deldia(texto){
            nuevoalias.ajax({
                url:"buscar_resumentododia.php",
                method:"POST",
                data: {texto: texto},
                success: function(data){
                    nuevoalias("#resultadodia_resumentodo").html(data);
                }
            });
        }
				function obtener_datos_resumentodo_deldia_filtroad(texto, texto2){
            nuevoalias.ajax({
                url:"buscar_resumentododia_filtro.php",
                method:"POST",
                data: {texto: texto, texto2: texto2},
                success: function(data){
                    nuevoalias("#resultadodia_resumentodo").html(data);
                }
            });
        }
        function obtener_datos_descripcion_instalacion_modal(texto){
            nuevoalias.ajax({
                url:"buscar_descripcion_instalacion_modal.php",
                method:"POST",
                data: {texto: texto},
                success: function(data){
                    nuevoalias("#descripcion_instalacion").html(data);
                }
            });
        }
				function obtener_datos_descripcion_instalacion_modal_id(texto){
            nuevoalias.ajax({
                url:"buscar_descripcion_instalacion_modal_id.php",
                method:"POST",
                data: {texto: texto},
                success: function(data){
                    nuevoalias("#descripcion_instalacion").html(data);
                }
            });
        }
        function buscar_cliente(){
            if (nuevoalias('input#buscar_cliente').val().length <= 0){
                nuevoalias("input#buscar_cliente").focus();
                obtener_datos_cliente("vacio");
            }else if (nuevoalias('input#buscar_cliente').val().length >= 1){
                obtener_datos_cliente(nuevoalias("input#buscar_cliente").val());
            }
        }
        function buscar_cliente_modal(){
            if (nuevoalias('input#buscar_cliente_modal').val().length <= 0){
                nuevoalias("input#buscar_cliente_modal").focus();
                obtener_datos_cliente_modal("vacio");
            }else if (nuevoalias('input#buscar_cliente_modal').val().length >= 1){
                obtener_datos_cliente_modal(nuevoalias("input#buscar_cliente_modal").val());
            }
        }
        var controladorTiempo1 = "";
        nuevoalias(document).on("keyup","#buscar_cliente", function(){
            clearTimeout(controladorTiempo1);
            controladorTiempo1 = setTimeout(buscar_cliente, 220);
        });
        var controladorTiempo2 = "";
        nuevoalias(document).on("keyup","#buscar_cliente_modal", function(){
            clearTimeout(controladorTiempo2);
            controladorTiempo2 = setTimeout(buscar_cliente_modal, 220);
        });
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
        function llamar_modal2(){
            var modal = document.getElementById("modal_ver_abonos2");
            nuevoalias("#modal_ver_abonos2").css("display", "block");
            nuevoalias(document).on("click","#close_modal",function(){
                nuevoalias("#modal_ver_abonos2").css("display", "none");
            });
            nuevoalias(window).on("click",function(event){
            	if (event.target == modal) {
            		nuevoalias("#modal_ver_abonos2").css("display", "none");
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
				function llamar_modal10(){
            var modal = document.getElementById("modal_ver_abonos10");
            nuevoalias("#modal_ver_abonos10").css("display", "block");
            nuevoalias(document).on("click","#close_modal",function(){
                nuevoalias("#modal_ver_abonos10").css("display", "none");
            });
            nuevoalias(window).on("click",function(event){
            	if (event.target == modal) {
            		nuevoalias("#modal_ver_abonos10").css("display", "none");
            	}
            });
        }
				function obtener_datos_productos_cantidad(texto){
						nuevoalias.ajax({
								url:"mostrar_producto_cantidad_inventario.php",
								method:"POST",
								data: {texto: texto},
								success: function(data){
										nuevoalias("#result_productos_cantidad").html(data);
								}
						});
				}
				function obtener_datos_productos_detalle(texto){
						nuevoalias.ajax({
								url:"mostrar_producto_detalle_inventario.php",
								method:"POST",
								data: {texto: texto},
								success: function(data){
										nuevoalias("#result_productos_detalle").html(data);
								}
						});
				}
				nuevoalias(document).on("click","#inventario",function(){
						var tecn_inv = nuevoalias(this).data("tecnico_inventario");
						nuevoalias("#nombre_tecnico").text(tecn_inv);
						obtener_datos_productos_cantidad(tecn_inv);
						obtener_datos_productos_detalle(tecn_inv);
						nuevoalias("#nombre_tecnico_pantalla").text(tecn_inv);
						llamar_modal10();
						nuevoalias(".dataTables_filter").css("display","none");
				});
				/*nuevoalias(document).on("click","#guardar_stock",function(){
				    nuevoalias('#tabla_accion_descb tbody tr').each(function () {
				        var cant= $(this).find('td').eq(2).html();
				        var id= $(this).find('td').eq(0).html();
				        $.ajax({
				            url: "modificar_producto_cantidad_inventario.php",
				            method: "POST",
				            data: {cant: cant, id: id},
				            success: function(data){}
				        });
				    });
						var tecn_inv = nuevoalias(this).data("stock_tecnico");
				    obtener_datos_productos_cantidad(tecn_inv);
				    obtener_datos_productos_cantidad(tecn_inv);
				    alert("Cantidad Modificada exitosamente");
				    obtener_datos_productos_cantidad(tecn_inv);
				});*/
        function llamar_modal_instalacion(){
            var modal = document.getElementById("modal_ver_abonos7");
            nuevoalias("#modal_ver_abonos7").css("display", "block");
            nuevoalias(document).on("click","#close_modal",function(){
                nuevoalias("#modal_ver_abonos7").css("display", "none");
            });
            nuevoalias(window).on("click",function(event){
            	if (event.target == modal) {
            		nuevoalias("#modal_ver_abonos7").css("display", "none");
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
				var datosinstalaciones = "";
        function buscar_descripcion_instalacion_admin(texto, texto2){
            nuevoalias.ajax({
                url: "descripcion_instalacion.php",
                method: "POST",
								async:false,
                data: {texto: texto, texto2: texto2},
                success: function(data){
                    nuevoalias("#datos_instalaciona").html(data);
										datosinstalaciones = nuevoalias("#datos_instalaciona").text();
                }
            });
        }
        nuevoalias("#medidas_restificacion").click(function(){
            var id = nuevoalias("label#IdEvento").text();
            var nombretecnico = nuevoalias("#tecnico_modal").val();
            nuevoalias("#modal_ver_abonos2").css("display", "none");
            nuevoalias("#IdRestificacion_id").text(id);
            nuevoalias("#nombre_instalador_restificacion").text(nombretecnico);
						var idcliente = nuevoalias("#buscar_cliente_modal").val();
            var obsssss = nuevoalias("#observaciones_tecnico").val();
						var obscl = nuevoalias("#observaciones_modal").val();
            crear_tabla_restificacion(id,idcliente,obsssss,nombretecnico);
						nuevoalias("#observaciones_tecnico_m").val(obsssss);
						nuevoalias("#observaciones_cliente_m").val(obscl);
            llamar_modal5();
        });
        /*nuevoalias(document).on("click","#dato_pincha_inst",function(){
            var fecha_inst = nuevoalias("#fecha_lista2").text();
            var fecha_inst_aprox = nuevoalias("#fecha_instalacion").val();
            var row = $(this).parent().parent();
            var descripcion = $(row).find('td:nth-child(1)').text();
            var id_nota_venta = $(this).data("id_notaventa");
            var numero_tarea = $(this).data("tarea");
            var observ_tecni= $(this).data("observaciones_tecnico");
            var observ_cliente = $(this).data("observaciones_cliente");
            var tec_inst = nuevoalias("#instalador").val();
            nuevoalias("#scroll7").scrollTop(0);
            nuevoalias("#modal_ver_abonos2").css("display", "none");
            nuevoalias("#fecha_lista20").text(fecha_inst);
            nuevoalias("#fecha_instalacion20a").val(fecha_inst_aprox);
            nuevoalias("#IdNotaVenta_Inst_Admin").text(id_nota_venta);
            nuevoalias("#select_detalle_modal_insta").val('Instalación');
            buscar_descripcion_instalacion_admin(fecha_inst_aprox,id_nota_venta)
            nuevoalias("#observaciones_tecnico_insta").val(observ_tecni);
            nuevoalias("#guardar_modal_insta").css("width","130px");
            nuevoalias("#instalador_ad").val(tec_inst);
            nuevoalias("#observaciones_insta").val(observ_cliente);
            llamar_modal_instalacion();
        });*/
				nuevoalias(document).on("click","#dato_pincha_inst_modal",function(){
            var fecha_inst = nuevoalias("#fecha_lista000").text();
            var fecha_inst_aprox = nuevoalias("#fecha_lista000").text();
            var row = $(this).parent().parent();
            var descripcion = $(row).find('td:nth-child(8)').text();
            var id_nota_venta = $(this).data("id_notaventa");
            var numero_tarea = $(this).data("tarea");
            var observ_tecni= $(this).data("observaciones_tecnico");
            var observ_cliente = $(this).data("observaciones_cliente");
            var tec_inst = $(row).find('td:nth-child(9)').text();
            nuevoalias("#scroll7").scrollTop(0);
            nuevoalias("#modal_ver_abonos2").css("display", "none");
            nuevoalias("#fecha_lista20").text(fecha_inst);
            nuevoalias("#fecha_instalacion20a").val(fecha_inst_aprox);
            nuevoalias("#IdNotaVenta_Inst_Admin").text(id_nota_venta);
            nuevoalias("#select_detalle_modal_insta").val('Instalación');
            buscar_descripcion_instalacion_admin(fecha_inst_aprox,id_nota_venta)
            nuevoalias("#observaciones_tecnico_insta").val(observ_tecni);
            nuevoalias("#guardar_modal_insta").css("width","130px");
            nuevoalias("#instalador_ad").val(tec_inst);
            nuevoalias("#observaciones_insta").val(observ_cliente);
            llamar_modal_instalacion();
						nuevoalias("#informes_inst").html("<a id='boton_generar_informe' href='generar_informe_inst.php?fecha="+fecha_inst_aprox+"&datosinst="+datosinstalaciones+"&obsert="+observ_tecni+"&obsercl="+observ_cliente+"' type='button' value='View PDF' class='btn btn-primary' target='_blank'>Informe </a><!--<button class='boton_ingresar' id='informe_rep_vis'>Informe</button>");
        });
				nuevoalias(document).on("keyup","#fecha_inicio",function(){
						var fecha  = nuevoalias('input#fecha_inicio').val();
						var tecnico = nuevoalias('#tecnico').val();
						obtener_datos_fecha(fecha,tecnico);
						console.log(fecha, tecnico);
				});

				nuevoalias(document).on("input","#fecha_inicio",function(){
						var fecha  = nuevoalias('input#fecha_inicio').val();
						var tecnico = nuevoalias('#tecnico').val();
						obtener_datos_fecha(fecha,tecnico);
						console.log(fecha, tecnico);
				});

				nuevoalias(document).on("change","#tecnico",function(){
						var fecha  = nuevoalias('input#fecha_inicio').val();
						var tecnico = nuevoalias('#tecnico').val();
						obtener_datos_fecha(fecha, tecnico);
				});
				nuevoalias(document).on("keyup","#fecha_inicio_modal",function(){
						obtener_datos_fecha_modal(nuevoalias('input#fecha_inicio_modal').val(), "",nuevoalias("#tecnico_modal").val());
				});
				nuevoalias(document).on("change","#tecnico_modal",function(){
						obtener_datos_fecha_modal(nuevoalias('input#fecha_inicio_modal').val(), "",nuevoalias("#tecnico_modal").val());
				});
				nuevoalias(document).on("click","#ver_datos",function(){
            var row = $(this).parent().parent();
            var hor = $(row).find('td').eq(0).html();;
            var tipo_dato = $(row).find('td').eq(1).html();;
            var FechaHora = nuevoalias("#fecha_lista000").text();
            var ids = $(row).find('td').eq(2).html();
            var tecnico_t = $(row).find('td').eq(8).html();
            var observaciones_clientes = $(row).find('td').eq(9).html();
            var observaciones_tecnicos = $(row).find('td').eq(10).html();
						var vendedorasa = $(row).find('td').eq(11).html();
						var idclientes = $(row).find('td').eq(12).html();
            var estadodetarea = $(row).find('td').eq(13).html();

            if (tipo_dato == 'Instalación'){
							nuevoalias("#inst").css("display", "block");
							nuevoalias("#rep_rest").css("display", "none");
							nuevoalias("#fecha_lista2").text(FechaHora);
							nuevoalias("#instalador").val(tecnico_t);
							nuevoalias("#fecha_instalacion").val(FechaHora);
							//obtener_datos_descripcion_instalacion_modal(FechaHora);
							obtener_datos_descripcion_instalacion_modal_id(ids);
              llamar_modal2();
            }else if(tipo_dato != 'Instalación'){
                /*var tipo_estado_tarea = calEvent.Estado_Tarea;
                if (tipo_estado_tarea == '1' || tipo_estado_tarea == '2' || tipo_estado_tarea == '3'){
                    alert("Ya se ha realizado la Tarea");
                }else{*/
										nuevoalias("#inst").css("display", "none");
										nuevoalias("#rep_rest").css("display", "block");
										nuevoalias("#fecha_lista2").text(FechaHora);
										nuevoalias("label#IdEvento").text(ids);
										nuevoalias("#tecnico_modal").val(tecnico_t);
										nuevoalias("#select_vendedora_modal").val(vendedorasa);
										nuevoalias("#fecha_inicio_modal").val(FechaHora);
										nuevoalias("#fecha_fin_modal").val(FechaHora);
										var horario = "";
										if (hor == 'Mañana 08:30a - 12:00a'){
												horario = "Mañana";
										}else if(hor == 'Tarde 13:00p - 18:00p'){
												horario = "Tarde";
										}
										nuevoalias("#shorario_modal").text(horario);
										nuevoalias("#select_detalle_modal").val(tipo_dato);
										nuevoalias("#detalle_modal_evento").text(tipo_dato);
										nuevoalias("#tecnico_modal_evento").text(tecnico_t);
										nuevoalias("#observaciones_modal").val(observaciones_clientes);
										nuevoalias("#buscar_cliente_modal").val(idclientes);
										nuevoalias("#observaciones_tecnico").val(observaciones_tecnicos);
										obtener_datos_cliente_modal(idclientes);
										if (tipo_dato == 'Reparación'){
												nuevoalias("#medidas_restificacion").css("display","none");
										}else if(tipo_dato == 'Restificación'){
												nuevoalias("#medidas_restificacion").css("display","block");
										}else if (tipo_dato == 'Visita Técnica'){
												nuevoalias("#medidas_restificacion").css("display","none");
										}
                    llamar_modal2();
										nuevoalias("#informes").html("<a id='boton_generar_informe' href='generar_informe_rep_vis.php?id="+ids+"&idc="+idclientes+"&obser="+observaciones_tecnicos+"&tecni="+tecnico_t+"&obsercl="+observaciones_clientes+"&detalle="+tipo_dato+"&vendedora="+vendedorasa+"&vendedora="+vendedorasa+"&horario="+horario+"' type='button' value='View PDF' class='btn btn-primary' target='_blank'>Informe </a><!--<button class='boton_ingresar' id='informe_rep_vis'>Informe</button>");
										var nuevo_hora = horario + " Ocupada";
										obtener_datos_fecha_modal(FechaHora,nuevo_hora,tecnico_t);

                //}
                //nuevoalias("#color_modal").val(calEvent.color);
            }
        });
				nuevoalias(document).on('click', '#quitar_fila', function (event) {
            event.preventDefault();
            $(this).closest('tr').remove();
        });
        nuevoalias('#Calendario').fullCalendar({
                header:{
                    left:'prevYear,prev,today,next,nextYear',
                    center:'title',
                    right:'basicDay,basicWeek,month',
                },
                eventSources: ['/Calendario/consultar_instalaciones_calendario.php'],
                //events:'/Calendario/consultar_instalaciones_calendario.php',
                eventRender: function(event, element, view){
                  return ['all', event.Instalador].indexOf(nuevoalias('#tecnicofiltro').val()) >= 0
                },
                eventClick:function(calEvent, jsEvent, view){
                    /*var tipo_dato = calEvent.tipo;
                    FechaHora = calEvent.start._i.split(" ");
                    if (tipo_dato == 'Instalación'){
                        nuevoalias("#inst").css("display", "block");
                        nuevoalias("#rep_rest").css("display", "none");
                        nuevoalias("#fecha_lista2").text(FechaHora[0]);
                        nuevoalias("#instalador").val(calEvent.Instalador);
                        nuevoalias("#fecha_instalacion").val(FechaHora[0]);
                        obtener_datos_descripcion_instalacion_modal(FechaHora[0]);
                    }else if(tipo_dato != 'Instalación'){
                        FechaHora2 = calEvent.end._i.split(" ");
                        nuevoalias("#inst").css("display", "none");
                        nuevoalias("#rep_rest").css("display", "block");
                        nuevoalias("#fecha_lista2").text(FechaHora[0]);
                        nuevoalias("label#IdEvento").text(calEvent.id);
                        nuevoalias("#tecnico_modal").val(calEvent.Instalador);
                        nuevoalias("#select_vendedora_modal").val(calEvent.Vendedoras)
                        nuevoalias("#fecha_inicio_modal").val(FechaHora[0]);
                        nuevoalias("#fecha_fin_modal").val(FechaHora2[0]);
                        var horario = "";
                        if (FechaHora[1] == '08:30:00'){
                            horario = "Mañana";
                        }else if(FechaHora[1] == '13:00:00'){
                            horario = "Tarde";
                        }
                        nuevoalias("#select_horario_modal").val(horario);
                        nuevoalias("#select_detalle_modal").val(tipo_dato);
                        nuevoalias("#detalle_modal_evento").text(tipo_dato);
                        nuevoalias("#tecnico_modal_evento").text(calEvent.Instalador);
                        nuevoalias("#observaciones_modal").val(calEvent.Instalación8);
                        nuevoalias("#buscar_cliente_modal").val(calEvent.IdCliente);
                        nuevoalias("#observaciones_tecnico").val(calEvent.Observacionet);
                        obtener_datos_cliente_modal(calEvent.IdCliente);
                        if (tipo_dato == 'Reparación'){
                            nuevoalias("#medidas_restificacion").css("display","none");
                        }else if(tipo_dato == 'Restificación'){
                            nuevoalias("#medidas_restificacion").css("display","block");
                        }else if (tipo_dato == 'Visita Técnica'){
                            nuevoalias("#medidas_restificacion").css("display","none");
                        }
                        //nuevoalias("#color_modal").val(calEvent.color);
                    }
                    llamar_modal2();*/
                },

                dayClick:function(date,jsEvent,view){
                    llamar_modal();
                    var fecha_obtenida = date.format('dddd') + ', ' + date.format('DD') + ' de ' + date.format('MMMM') + ' del ' + date.format('YYYY');
                    nuevoalias('#fecha_lista').text(fecha_obtenida);
										nuevoalias('#fecha_lista000').text(date.format());
										var filtrotecnico = nuevoalias('#tecnicofiltro').val();
										if (filtrotecnico == 'all'){
												obtener_datos_resumentodo_deldia(date.format());
										}else if(filtrotecnico != 'all'){
												obtener_datos_resumentodo_deldia_filtroad(date.format(), filtrotecnico);
										}
                },
                firstDay:1
            });

        nuevoalias(".modal-content").draggable({
            handle: ".cuadrado_modal"
        });
        nuevoalias(".modal-content2").draggable({
            handle: ".cuadrado_modal2"
        });
        nuevoalias(".modal-content5").draggable({
            handle: ".cuadrado_modal5"
        });
        nuevoalias(".modal-content7").draggable({
            handle: ".cuadrado_modal7"
        });
				nuevoalias(".modal-content10").draggable({
            handle: ".cuadrado_modal10"
        });
    });
		nuevoalias("#feriado").click(function(){
						if (nuevoalias('#tecnico').val() == null) {
								alert("Olvido seleccionar el Nombre del Técnico");
								nuevoalias('#tecnico').focus();
								return false;
						}else if (nuevoalias('#fecha_inicio').val().length == 0) {
                alert("Falta escribir la Fecha Inicio");
                nuevoalias('#fecha_inicio').focus();
                return false;
            }else{
                var titulo = "Feriado " + nuevoalias("#tecnico").val();
                var fechainicio = nuevoalias("#fecha_inicio").val()+" "+"00:00:00";
								if (nuevoalias("#fecha_fin").val().length == 0){
										var fechafin = nuevoalias("#fecha_inicio").val()+" "+"11:00:00";
								}else if(nuevoalias("#fecha_fin").val().length > 0){
										var fechafin = nuevoalias("#fecha_fin").val()+" "+"11:00:00";
								}
                var tecnico = nuevoalias("#tecnico").val();
                nuevoalias.ajax({
                    url: "insertar_encalendario.php",
                    method: "POST",
                    data: {titulo: titulo, fechainicio: fechainicio, fechafin: fechafin, tecnico: tecnico, horario: "Feriado", detalle: "Feriado", idcliente: 0, nombre: "Feriado", direccion: "Feriado", comuna: "Feriado", telefono: "Feriado", observaciones: "Feriado", vendedora: "Feriado"},
                    success: function(data){
                        alert(data);
                        nuevoalias('#tecnico').val('0');
                        nuevoalias('#fecha_inicio').val('');
                        nuevoalias('#fecha_fin').val('');
                        nuevoalias('#select_horario').val('1');
                        nuevoalias('#select_vendedora').val('0');
                        nuevoalias('#select_detalle').val('1');
                        nuevoalias('#buscar_cliente').val('');
                        nuevoalias('#direccion').val('');
                        nuevoalias('#comuna').val('');
                        nuevoalias('#telefono').val('');
                        nuevoalias('#observaciones').val('');
                        nuevoalias('#resultado_busqueda').empty();
                        nuevoalias('#Calendario').fullCalendar('refetchEvents');
                    }
                });
            }

    });
    nuevoalias("#ingresar").click(function(){
        if (nuevoalias('#tecnico').val() == null && nuevoalias('#fecha_inicio').val().length == 0 && nuevoalias('#fecha_fin').val().length == 0 && nuevoalias('#select_horario').val() == '1' || nuevoalias('#select_horario').val() == null && nuevoalias('#select_vendedora').val() == '1' || nuevoalias('#select_vendedora').val() == null && nuevoalias('#select_detalle').val() == '1' || nuevoalias('#select_detalle').val() == null && nuevoalias('#buscar_cliente').val().length == 0 && nuevoalias('#observaciones').val().length == 0) {
                alert("Escriba los datos del Calendario");
                return false;
        }else{
            if (nuevoalias('#tecnico').val() == null) {
                alert("Olvido seleccionar el Nombre del Técnico");
                nuevoalias('#tecnico').focus();
                return false;
            }else if (nuevoalias('#fecha_inicio').val().length == 0) {
                alert("Falta escribir la Fecha Inicio");
                nuevoalias('#fecha_inicio').focus();
                return false;
            }else if (nuevoalias('#fecha_fin').val().length == 0) {
                alert("Falta escribir la Fecha Final");
                nuevoalias('#fecha_fin').focus();
                return false;
            }else if (nuevoalias('#select_horario').val() == '1' || nuevoalias('#select_horario').val() == null) {
                alert("Seleccione el Horario del Técnico");
                nuevoalias('#select_horario').focus();
                return false;
            }else if (nuevoalias('#select_vendedora').val() == '1' || nuevoalias('#select_vendedora').val() == null) {
                alert("Seleccione la Vendedora del Técnico");
                nuevoalias('#select_vendedora').focus();
                return false;
            }else if (nuevoalias('#select_detalle').val() == '1' || nuevoalias('#select_detalle').val() == null) {
                alert("Seleccione el Detalle para el Técnico");
                nuevoalias('#select_detalle').focus();
                return false;
            }else if (nuevoalias('#buscar_cliente').val().length == 0) {
                alert("Faltó buscar al Cliente");
                nuevoalias('#buscar_cliente').focus();
                return false;
						}else if (nuevoalias('#select_horario option:selected').html() == 'Mañana Ocupada' || nuevoalias('#select_horario option:selected').html() == 'Tarde Ocupada') {
								alert("Seleccione un Horario Disponible para el Técnico");
								nuevoalias('#select_horario').focus();
								return false;
            }else{
                var horai, horaf = "";
                if (nuevoalias('#select_horario option:selected').html() == 'Mañana'){
                    horai = '08:30:00';
                    horaf = '12:00:00';
                }else if(nuevoalias('#select_horario option:selected').html() == 'Tarde'){
                    horai = '13:00:00';
                    horaf = '18:00:00';
                }
                var titulo = nuevoalias("#tecnico").val()+ " - " + nuevoalias('#select_detalle').val();
                var fechainicio = nuevoalias("#fecha_inicio").val()+" "+horai;
                var fechafin = nuevoalias("#fecha_fin").val()+" "+horaf;
                var tecnico = nuevoalias("#tecnico").val();
                var horario = nuevoalias('#select_horario option:selected').html();
                var vendedorass = nuevoalias("#select_vendedora").val();
                var detalle = nuevoalias('#select_detalle').val();
                var idcliente = nuevoalias('#buscar_cliente').val();
                var nombre = nuevoalias('#nombre_cliente').val();
                var direccion = nuevoalias('#direccion').val();
                var comuna = nuevoalias('#comuna').val();
                var telefono = nuevoalias('#telefono').val();
                var observaciones = nuevoalias('#observaciones').val();
								if (nuevoalias("#select_horario").val() != 'Mañana' || nuevoalias("#select_horario").val() != 'Tarde'){
										nuevoalias.ajax({
												url: "ingresar_fecha.php",
												method: "POST",
												async:false,
												data: {texto: nuevoalias("#select_horario").val(), texto2: nuevoalias("#fecha_inicio").val(), texto3: nuevoalias('#select_horario option:selected').html(), texto4: tecnico},
												success: function(data){
												}
										});
								}else if(nuevoalias("#select_horario").val() == 'Mañana' || nuevoalias("#select_horario").val() == 'Tarde')  {
								}
                nuevoalias.ajax({
                    url: "insertar_encalendario.php",
                    method: "POST",
                    data: {titulo: titulo, fechainicio: fechainicio, fechafin: fechafin, tecnico: tecnico, horario: horario, detalle: detalle, idcliente: idcliente, nombre: nombre, direccion: direccion, comuna: comuna, telefono: telefono, observaciones: observaciones, vendedora: vendedorass},
                    success: function(data){
                        alert(data);
                        nuevoalias('#tecnico').val('0');
                        nuevoalias('#fecha_inicio').val('');
                        nuevoalias('#fecha_fin').val('');
                        nuevoalias('#select_horario').val('1');
                        nuevoalias('#select_vendedora').val('0');
                        nuevoalias('#select_detalle').val('1');
                        nuevoalias('#buscar_cliente').val('');
                        nuevoalias('#direccion').val('');
                        nuevoalias('#comuna').val('');
                        nuevoalias('#telefono').val('');
                        nuevoalias('#observaciones').val('');
                        nuevoalias('#resultado_busqueda').empty();
                        nuevoalias('#Calendario').fullCalendar('refetchEvents');
                    }
                });
            }
        }
				nuevoalias("#horario_bd").empty();
    });
    nuevoalias("#borrar_modal").click(function(){
        var detalle = nuevoalias("label#detalle_modal_evento").text();
        if (confirm("¿Desea eliminar la "+detalle+"?")){
            var id = nuevoalias("label#IdEvento").text();
            var tecnico = nuevoalias("label#tecnico_modal_evento").text();
            if (detalle == 'Reparación' || detalle == 'Visita Técnica' || detalle == 'Feriado'){
                nuevoalias.ajax({
                    url: "eliminar_evento.php",
                    method: "POST",
                    data: {id: id},
                    success: function(data){
                        nuevoalias("#modal_ver_abonos2").css("display", "none");
												nuevoalias("#modal_ver_abonos").css("display", "none");
                        nuevoalias('#Calendario').fullCalendar('removeEvents', id);
                        alert(data);
                    }
                });
            }else if (detalle == 'Restificación'){
                nuevoalias.ajax({
                    url: "borrar_restificacion_tecnico.php",
                    method: "POST",
                    async: false,
                    data: {idrest: id, tecn: tecnico},
                    success: function(data){}
                });
                nuevoalias.ajax({
                    url: "eliminar_evento.php",
                    method: "POST",
                    data: {id: id},
                    success: function(data){
												nuevoalias("#modal_ver_abonos").css("display", "none");
                        nuevoalias("#modal_ver_abonos2").css("display", "none");
                        nuevoalias('#Calendario').fullCalendar('removeEvents', id);
                        alert(data);
                    }
                });
            }
						nuevoalias.ajax({
                url: "despejar_manana_tarde.php",
                method: "POST",
                data: {fecha: nuevoalias("#fecha_inicio_modal").val(), horario: nuevoalias("#shorario_modal").text(), tecnico: nuevoalias("#tecnico_modal").val()},
                success: function(data){}
            });
        };
    });
    nuevoalias("#tecnicofiltrar").click(function(){
        nuevoalias('#Calendario').fullCalendar('rerenderEvents');
    });

    nuevoalias("#dejarpendiente_modal").click(function(){
        var detallequees = nuevoalias('#select_detalle_modal').val();
        if(confirm("¿Desea dejar Pendiente la " + detallequees + "?")){
            var idm = nuevoalias("label#IdEvento").text();
            nuevoalias.ajax({
                url: "modificar_estado_tarea.php",
                method: "POST",
                data: {idm: idm},
                success: function(data){
                    nuevoalias("#modal_ver_abonos2").css("display", "none");
										nuevoalias("#modal_ver_abonos").css("display", "none");
										nuevoalias('#Calendario').fullCalendar('removeEvents');
										nuevoalias('#Calendario').fullCalendar('refetchEvents');
                    alert("Se ha dejado pendiente la "+detallequees);
                }
            });
        }
    });
    nuevoalias("#dejarpendiente_inst_modal").click(function(){
        if(confirm("¿Desea dejar Pendiente la Instalación?")){
            var idm = nuevoalias("label#IdNotaVenta_Inst_Admin").text();
            nuevoalias.ajax({
                url: "modificar_estado_tarea_inst.php",
                method: "POST",
                data: {idm: idm},
                success: function(data){
                    nuevoalias("#modal_ver_abonos7").css("display", "none");
                    nuevoalias('#Calendario').fullCalendar('refetchEvents');
                    alert("Se ha dejado pendiente la Instalación");
                }
            });
        }
    });
    nuevoalias("#modificar_modal").click(function(){
        if (nuevoalias('#tecnico_modal').val() == null && nuevoalias('#fecha_inicio_modal').val().length == 0 && nuevoalias('#fecha_fin_modal').val().length == 0 && nuevoalias('#select_horario_modal').val() == '1' || nuevoalias('#select_horario_modal').val() == null && nuevoalias('#select_vendedora_modal').val() == '1' || nuevoalias('#select_vendedora_modal').val() == null && nuevoalias('#select_detalle_modal').val() == '1' || nuevoalias('#select_detalle_modal').val() == null && nuevoalias('#buscar_cliente_modal').val().length == 0 && nuevoalias('#observaciones_modal').val().length == 0) {
                alert("Escriba los datos del Calendario");
                return false;
        }else{
            if (nuevoalias('#tecnico_modal').val() == null) {
                alert("Olvido seleccionar el Nombre del Técnico");
                nuevoalias('#tecnico_modal').focus();
                return false;
            }else if (nuevoalias('#fecha_inicio_modal').val().length == 0) {
                alert("Falta escribir la Fecha Inicio");
                nuevoalias('#fecha_inicio_modal').focus();
                return false;
            }else if (nuevoalias('#fecha_fin_modal').val().length == 0) {
                alert("Falta escribir la Fecha Final");
                nuevoalias('#fecha_fin_modal').focus();
                return false;
            }else if (nuevoalias('#select_horario_modal').val() == '1' || nuevoalias('#select_horario_modal').val() == null) {
                alert("Seleccione el Horario del Técnico");
                nuevoalias('#select_horario_modal').focus();
                return false;
            }else if (nuevoalias('#select_vendedora_modal').val() == '1' || nuevoalias('#select_vendedora_modal').val() == null) {
                alert("Seleccione la Vendedora del Técnico");
                nuevoalias('#select_vendedora_modal').focus();
                return false;
            }else if (nuevoalias('#select_detalle_modal').val() == '1' || nuevoalias('#select_detalle_modal').val() == null) {
                alert("Seleccione el Detalle para el Técnico");
                nuevoalias('#select_detalle_modal').focus();
                return false;
            }else if (nuevoalias('#buscar_cliente_modal').val().length == 0) {
                alert("Faltó buscar al Cliente");
                nuevoalias('#buscar_cliente_modal').focus();
                return false;
            }else{
							if (nuevoalias('#select_horario_modal option:selected').html() == 'Mañana Ocupada' || nuevoalias('#select_horario_modal option:selected').html() == 'Tarde Ocupada') {
							}else {
									nuevoalias.ajax({
											url: "despejar_manana_tarde.php",
											method: "POST",
											data: {fecha: nuevoalias("#fecha_inicio_modal").val(), horario: nuevoalias("#shorario_modal").text(), tecnico: nuevoalias("#tecnico_modal").val()},
											success: function(data){}
									});
									if (nuevoalias("#select_horario_modal").val() != 'Mañana' || nuevoalias("#select_horario_modal").val() != 'Tarde'){
											nuevoalias.ajax({
													url: "ingresar_fecha.php",
													method: "POST",
													data: {texto: nuevoalias("#select_horario_modal").val(), texto2: nuevoalias("#fecha_inicio_modal").val(), texto3: nuevoalias('#select_horario_modal option:selected').html(), texto4:  nuevoalias("#tecnico_modal").val()},
													success: function(data){
													}
											});
									}else if(nuevoalias("#select_horario_modal").val() == 'Mañana' || nuevoalias("#select_horario_modal").val() == 'Tarde')  {
									}
							}
                var horai, horaf = "";
                if (nuevoalias('#select_horario_modal option:selected').html() == 'Mañana' || nuevoalias('#select_horario_modal option:selected').html() == 'Mañana Ocupada'){
                    horai = '08:30:00';
                    horaf = '12:00:00';
                }else if(nuevoalias('#select_horario_modal option:selected').html() == 'Tarde' || nuevoalias('#select_horario_modal option:selected').html() == 'Tarde Ocupada'){
                    horai = '13:00:00';
                    horaf = '18:00:00';
                }
                var idm = nuevoalias("label#IdEvento").text();
                var titulom = nuevoalias("#tecnico_modal").val()+ " - " + nuevoalias('#select_detalle_modal').val();
                var fechainiciom = nuevoalias("#fecha_inicio_modal").val()+" "+horai;
                var fechafinm = nuevoalias("#fecha_fin_modal").val()+" "+horaf;
                var tecnicom = nuevoalias("#tecnico_modal").val();
                var horariom = nuevoalias("#select_horario_modal option:selected").html();
                var vendedoram = nuevoalias("#select_vendedora_modal").val();
                var detallem = nuevoalias('#select_detalle_modal').val();
                var idclientem = nuevoalias('#buscar_cliente_modal').val();
                var nombrem = nuevoalias('#nombre_cliente_modal').val();
                var direccionm = nuevoalias('#direccion_modal').val();
                var comunam = nuevoalias('#comuna_modal').val();
                var telefonom = nuevoalias('#telefono_modal').val();
                var observacionesm = nuevoalias('#observaciones_modal').val();
                var observacionest = nuevoalias('#observaciones_tecnico').val();
                $.ajax({
                    url: "modificar_calendario.php",
                    method: "POST",
                    data: {titulo: titulom, fechainicio: fechainiciom, fechafin: fechafinm, tecnico: tecnicom, horario: horariom, detalle: detallem, idcliente: idclientem, nombre: nombrem, direccion: direccionm, comuna: comunam, telefono: telefonom, observaciones: observacionesm, observacionet: observacionest, vendedora: vendedoram, id: idm},
                    success: function(data){
                        nuevoalias("#modal_ver_abonos2").css("display", "none");
												nuevoalias("#modal_ver_abonos").css("display", "none");
				                nuevoalias('#Calendario').fullCalendar('removeEvents');
                        nuevoalias('#Calendario').fullCalendar('refetchEvents');
                        alert(data);
                    }
                });

            }
        }
    });
    nuevoalias(document).on("click","#boton_agregarfila_tabla_restificacion",function(){
        nuevoalias("#tabla_medidas_restificacion").each(function() {
            var tds = '<tr>';
            jQuery.each(nuevoalias('tr:last td', this), function(index, element) {
                if (index == 0){
										var valor_n = parseInt($(this).html()) + 1;
                    tds += '<td>' + valor_n + '</td>';
                }else if (index == 1){
                    tds += '<td contenteditable>' + $(this).html() + '</td>';
                }else if (index == 2){
                    tds += '<td contenteditable>' + $(this).html() + '</td>';
                }else if (index == 3){
                    tds += '<td>' + $(this).html() + '</td>';
                }else if (index == 4){
                    tds += '<td contenteditable>' + $(this).html() + '</td>';
                }else if (index == 5){
                    tds += '<td contenteditable>' + $(this).html() + '</td>';
                }else if (index == 6){
                    tds += '<td contenteditable>' + $(this).html() + '</td>';
                }else if (index == 7){
                    tds += '<td contenteditable>' + $(this).html() + '</td>';
                }else if (index == 8){
                    tds += '<td contenteditable>' + $(this).html() + '</td>';
                }else if (index == 9){
                    tds += '<td contenteditable>' + $(this).html() + '</td>';
                }else if (index == 10){
                    tds += '<td style="display:none">' + $(this).html() + '</td>';
                }else if (index == 11){
                    tds += '<td contenteditable>' + $(this).html() + '</td>';
                }else if (index == 12){
                    tds += '<td contenteditable>' + $(this).html() + '</td>';
                }else if (index == 13){
                    tds += '<td contenteditable>' + $(this).html() + '</td>';
                }else if (index == 14){
                    tds += '<td contenteditable>' + $(this).html() + '</td>';
                }else if (index == 15){
                    tds += '<td contenteditable>' + $(this).html() + '</td>';
                }else if (index == 16){
                    tds += '<td>' + $(this).html() + '</td>';
                }
            });
            tds += '</tr>';
            if (nuevoalias('tbody', this).length > 0) {
                nuevoalias('tbody', this).append(tds);
            } else {
                nuevoalias(this).append(tds);
            }
        });
    });
    nuevoalias(document).on("click","#guardar_medidas_restificacion",function(){
        if(confirm("¿Desea modificar la Restificación?")){
            var idrest= nuevoalias("label#IdRestificacion_id").text();
            var tecn = nuevoalias("label#nombre_instalador_restificacion").text();
            nuevoalias.ajax({
                url: "borrar_restificacion_tecnico.php",
                method: "POST",
                async: false,
                data: {idrest: idrest, tecn: tecn},
                success: function(data){}
            });
						nuevoalias.ajax({
                url: "modificar_observaciones_rectificacion.php",
                method: "POST",
                async: false,
                data: {texto: nuevoalias("#observaciones_tecnico_m").val(), texto11: nuevoalias("#observaciones_cliente_m").val(),texto2: idrest},
                success: function(data){}
            });
            nuevoalias('#tabla_medidas_restificacion tbody tr').each(function () {
                var n= $(this).find('td').eq(0).html();
                var ubic= $(this).find('td').eq(1).html();
                var piso= $(this).find('td').eq(2).html();
                var fc= $(this).find('td:nth-child(4)').find('select').val();
                var ancho= $(this).find('td').eq(4).html();
                var alto= $(this).find('td').eq(5).html();
                var motor= $(this).find('td:nth-child(9)').find('select').val();
                var manual= $(this).find('td:nth-child(9)').find('select').val();
                var tclick= $(this).find('td:nth-child(10)').find('select').val();
                var crto= $(this).find('td:nth-child(9)').find('select').val();
                var cajon= $(this).find('td:nth-child(12)').find('select').val();
                var guia= $(this).find('td:nth-child(13)').find('select').val();
                var ventana= $(this).find('td:nth-child(14)').find('select').val();
                var perfiles= $(this).find('td:nth-child(15)').find('select').val();
                var escala= $(this).find('td:nth-child(16)').find('select').val();
                var lama= $(this).find('td:nth-child(8)').find('select').val();
                var color= $(this).find('td:nth-child(7)').find('select').val();
                nuevoalias.ajax({
                    url: "insertar_restificacion_tecnico.php",
                    method: "POST",
                    data: {idrest: idrest, tecn: tecn, n: n, ubic: ubic, piso: piso, fc: fc, ancho: ancho, alto: alto, motor: motor, manual: motor, tclick: tclick, crto: crto, cajon: cajon, guia: guia, ventana: ventana, perfiles: perfiles, escala: escala, lama: lama, color: color},
                    success: function(data){}
                });
            });
						nuevoalias("#modal_ver_abonos").css("display","none");
            nuevoalias("#modal_ver_abonos5").css("display", "none");
            nuevoalias('#Calendario').fullCalendar('refetchEvents');
            alert("Medidas Modificadas Correctamente");
        }
    });
    nuevoalias("#guardar_modal_insta").click(function(){
        var idi = nuevoalias("label#IdNotaVenta_Inst_Admin").text();
        var observacionesa = nuevoalias("#observaciones_insta").val();
        var observacionesi = nuevoalias('#observaciones_tecnico_insta').val();
        var informacion = nuevoalias("label#datos_instalaciona").text();
        nuevoalias.ajax({
            url: "modificar_observaciones_inst.php",
            method: "POST",
            data: {observaciones: observacionesi, observacionesa: observacionesa, informacion: informacion, id: idi},
            success: function(data){
                nuevoalias("#modal_ver_abonos7").css("display", "none");
                nuevoalias('#Calendario').fullCalendar('removeEvents');
                nuevoalias('#Calendario').fullCalendar('refetchEvents');
                alert(data);
            }
        });
				nuevoalias("#modal_ver_abonos").css("display", "none");
    });
		function demoFromHTML() {
        var doc = new jsPDF("l" , "cm", "letter");
        doc.autoTable({
            html: '#tabla_resumendia',
            theme:'grid',
            columnStyles: {
              0: {cellWidth: 1.7},
              1: {cellWidth: 2.2},
              2: {cellWidth: 1.4},
              3: {cellWidth: 1.8},
              4: {cellWidth: 2.5},
              5: {cellWidth: 2},
              6: {cellWidth: 2.3},
              7: {cellWidth: 2.5},
              8: {cellWidth: 1.5},
              9: {cellWidth: 3.8},
              10: {cellWidth: 3.8},
              11: {cellWidth: 2},
              12: {cellWidth: 3},
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
        var fecha = nuevoalias("#fecha_lista").text();
        doc.output('save','Resumen Día - '+fecha+' ('+'<?php echo $valor_nombre ?>'+').pdf');
        window.open(doc.output('bloburl'), '_blank');
    }
    nuevoalias(document).on("click","#sacar_informe",function(){
        demoFromHTML();
    });

</script>
<p class="titulo75">SOCIEDAD FYD</p>
<p class="copy">Copyright © 2021 | Diseñado por N.A.B para Comercial F&amp;D</p>
</body>
</html>
