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
@import url("costos.css");
</style>
<link href="costos.css" rel="stylesheet" type="text/css">
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
<label id="titulo2" class= "titulo2">Costos </label>
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
<button id="desplegar_item" class="dropbtn">Costos</button>
</div>
<div id="pestanas">
    <button id="persianas" class="botones_pestanas_inabilitados_a" onclick="openPage('persiana', this, 'white')">Persianas</button>
    <button id="rollers" class="botones_pestanas_inabilitados_b" onclick="openPage('roller', this, 'white')" >Roller</button>
    <button id="repuestos" class="botones_pestanas_inabilitados_c" onclick="openPage('repuesto', this, 'white')" >Repuestos</button>
    <button id="otros" class="botones_pestanas_inabilitados_d" onclick="openPage('otro', this, 'white')" >Otros</button>
    <button id="instalaciones" class="botones_pestanas_inabilitados_e" onclick="openPage('instalacion', this, 'white')">Instalación - Rectificador</button>
    <button id="instalacionesroller" class="botones_pestanas_inabilitados_f" onclick="openPage('instalacionroller', this, 'white')">Instalación Roller</button>
    <button id="rectificaciones" class="botones_pestanas_inabilitados_g" onclick="openPage('rectificacion', this, 'white')">Valor Rectificación</button>
    <!--<button id="inst_persianas" class="botones_pestanas_inabilitados_e" onclick="openPage('inst_persiana', this, 'white')" >Instalación Persianas</button>-->
    <!-- <button id="inst_rollers" class="botones_pestanas_inabilitados_f" onclick="openPage('inst_roller', this, 'white')" >Instalación Rollers</button>-->
    <!--<button id="porcentajes" class="botones_pestanas_inabilitados_e" style="display:none;" onclick="openPage('porcentaje', this, 'white')" >Porcentajes</button>-->
</div>
<div class="tablascroll">
<div id="persiana" class="tabcontent">
    <div id="select_lama"></div>
    <br>&nbsp;</br>
    <textarea id="pastein" name="excel_data" onkeyup="generateTable();" style="display:none;" placeholder="Copie y Pegue Valores"></textarea>
    <p>&nbsp;</p>
    <button id="guardar_lama" style="display:none;">Convertir Lama</button>
    <p>&nbsp;</p>
    <button id="copiar" style="display:none;">Copiar Tabla</button>
    <div id="excel_table" style="display:none;"></div>
    <p><table id ="tabla_lama">
    </table></p>
    <button id="guardar_lamax" style="display:none;">Guardar Acciona.</button>
    <button id='boton_agregarfila_acciona' style="display:none;">Agregar Fila</button>
    <input style="display:none;" list="lista_acciona" type="text" class="input_cliente" id="input_ac" name="input_ac" placeholder="Buscar Registro..." size="30" maxlength="70" autocomplete="off"/>
    <div id="result_acciona" style="display:none;"></div>
    <p>&nbsp;</p>
    <button id="ingresar_lama" style="display:none;">Guardar Lama</button>
    <button id='boton_agregarfila_lama' style="display:none;">Agregar Fila</button>
    <input style="display:none;" list="lista_lama" type="text" class="input_cliente" id="input_la" name="input_la" placeholder="Escriba Registro..." size="30" maxlength="70" autocomplete="off"/>
    <div id="result_lama" style="display:none;"></div>
    <!--<button id="ingresar_conla" style="display:none;">Modificar Lama</button>
    <br></br>-->
    <button id="ingresar_color" style="display:none;">Guardar Color</button>
    <div id="result_color" style="display:none;"></div>
    <p>&nbsp;</p>
    <input style="display:none;" type="text" class="input_cliente" id="input_conla" name="input_conla" placeholder="Escriba Registro..." size="30" maxlength="70" autocomplete="off"/>
    <div id="consulta_lama"></div>
    <button id="guardar_color" style="display:none;">Guardar Color</button>
    <button id='boton_agregarfila_color' style="display:none;">Agregar Fila</button>
    <input style="display:none;" list="lista_color" type="text" class="input_cliente" id="input_color" name="input_color" placeholder="Buscar Registro..." size="30" maxlength="70" autocomplete="off"/>
    <div id="result_color_mant" style="display:none;"></div>
    <br></br>
</div>
<div id="roller" class="tabcontent">
    <div id="select_roller"></div>
    <br>&nbsp;</br>
    <textarea id="pastein2" name="excel_data2" onkeyup="generateTable2();" style="display:none;" placeholder="Copie y Pegue Valores"></textarea>
    <p>&nbsp;</p>
    <button id="guardar_lama2" style="display:none;">Convertir Roller</button>
    <p>&nbsp;</p>
    <div id="excel_table2" style="display:none;"></div>
    <p><table id ="tabla_roller">
    </table></p>
    <button id="guardar_lamay" style="display:none;">Guardar Acciona.</button>
    <button id='boton_agregarfila_acciona2' style="display:none;">Agregar Fila</button>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <input style="display:none;" list="lista_acciona2" type="text" class="input_cliente" id="input_ac2" name="input_ac2" placeholder="Escriba Registro..." size="30" maxlength="70" autocomplete="off"/>
    <div id="result_acciona2" style="display:none;"></div>
    <button id="ingresar_lama2" style="display:none;">Guardar Lama Roller</button>
    <button id='boton_agregarfila_lama2' style="display:none;">Agregar Fila</button>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <input style="display:none;" list="lista_lama2" type="text" class="input_cliente" id="input_la2" name="input_la2" placeholder="Escriba Registro..." size="30" maxlength="70" autocomplete="off"/>
    <div id="result_lama2" style="display:none;"></div>
    <!--<button id="ingresar_conla2" style="display:none;">Modificar Lama Roller</button>
    <p>&nbsp;</p>-->
    <p>&nbsp;</p>
    <input style="display:none;" type="text" class="input_cliente" id="input_conla2" name="input_conla2" placeholder="Escriba Registro..." size="30" maxlength="70" autocomplete="off"/>
    <div id="consulta_lama2"></div>
    <br></br>
</div>
<div id="repuesto" class="tabcontent">
    <button id="guardar_lama3">Guardar Repuesto</button><button id='boton_agregarfila3' >Agregar Fila</button>
    <br></br>
    <input list="lista_clientes" type="text" class="input_cliente" id="input_rep" name="input_rep" placeholder="Buscar Registro..." size="30" maxlength="70" autocomplete="off"/>
    <p>&nbsp;</p>
    <div id="result_rep"></div>
</div>
<div id="otro" class="tabcontent">
    <button id="guardar_lama4">Guardar Otros</button><button id='boton_agregarfila4' >Agregar Fila</button>
    <br></br>
    <input list="lista_clientes2" type="text" class="input_cliente" id="input_otro" name="input_otro" placeholder="Buscar Registro..." size="30" maxlength="70" autocomplete="off"/>
    <p>&nbsp;</p>
    <div id="result_otro"></div>
</div>
<div id="instalacion" class="tabcontent">
    <button id="guardar_instalacion">Guardar Instalacion</button><button id='boton_agregarfila_instalacion'>Agregar Fila</button>
    <input list="lista_clientes2" type="text" class="input_cliente" id="input_inst" name="input_inst" placeholder="Buscar Registro..." size="30" maxlength="70" autocomplete="off"/>
    <div id="result_instalacion"></div>
    <br></br>
    <hr style="color:#cacaca;"></ht>
    <br></br>
    <button id="guardar_rectificador">Guardar Rectificador</button><button id='boton_agregarfila_rectificador'>Agregar Fila</button>
    <input list="lista_clientes2" type="text" class="input_cliente" id="input_rect" name="input_rect" placeholder="Buscar Registro..." size="30" maxlength="70" autocomplete="off"/>
    <div id="result_rectificador"></div>
    <br></br>
</div>
<div id="instalacionroller" class="tabcontent">
    <button id="guardar_instalacion_roller">Guardar Instalacion Roller</button><button id='boton_agregarfila_instalacion_roller'>Agregar Fila Roller</button>
    <input type="text" class="input_cliente" id="input_instr" name="input_instr" placeholder="Buscar Registro..." size="30" maxlength="70" autocomplete="off"/>
    <div id="result_instalacion_roller"></div>
    <br></br>
</div>
<div id="rectificacion" class="tabcontent">
    <button id='guardar_rect_tecnico'>Guardar Bono Diario</button>
    <p></p>
    <button id='boton_agregarfila_rect_tecnicos'>Agregar Fila Bono</button>
    <input type="text" class="input_cliente" id="input_rect_bono" name="input_rect_bono" placeholder="Buscar Rectificacion Tecn..." size="30" maxlength="70" autocomplete="off"/>
    <div id="result_rect_tecn"></div>
    <br></br>
    <hr style="color:#cacaca;">
    <label><strong>Agregar Producto para Inventario a Técnico</strong></label>
    <br></br>
    <button id='guardar_producto'>Guardar Producto</button>
    <p></p>
    <button id='boton_agregarfila_producto'>Agregar Fila Producto</button>
    <input type="text" class="input_cliente" id="input_producto" name="input_producto" placeholder="Buscar Producto..." size="30" maxlength="70" autocomplete="off"/>
    <br></br>
    <?php
        $conexion223 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
        mysqli_set_charset($conexion223,"utf8");
        $ejecutar223 = mysqli_query($conexion223,"select Rectificador from Rectificadores");
        mysqli_set_charset($conexion223,"utf8");
        echo "<select id='nombre_rect' name='nombre_rect'>
        <option value='0' disabled selected>Seleccione Técnico...</option>";
            while ($row223 = mysqli_fetch_array($ejecutar223)) {
                $valor_nombre_tec = $row223[0];
                if ($nombre_tec == $valor_nombre_tec){
                    echo "<option value='$valor_nombre_tec' selected>".$valor_nombre_tec."</option>";
                }else if($nombre_tec != $valor_nombre_tec){
                    echo "<option value='$valor_nombre_tec'>".$valor_nombre_tec."</option>";
                }
            }
        echo "</select>";
    ?>
    <div id="result_producto"></div>
    <br></br>
</div>
<div id="porcentaje" class="tabcontent">
    <div id="result_porc_lama"></div>
    <div id="result_porc_roller"></div>
    <div id="result_porc_repuestos"></div>
    <div id="result_porc_otros"></div>
</div>
<?php
    $conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
    mysqli_set_charset($conexion,"utf8");
    $ejecutar = mysqli_query($conexion,"Select Rectificador from Rectificadores");
?>
<datalist id="list_tecn">
    <?php while ($row = mysqli_fetch_array($ejecutar)) {  ?>
        <option><?php echo $row[0];?></option>
    <?php } ?>
</datalist>
<?php
    $conexion_ti = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
    mysqli_set_charset($conexion_ti,"utf8");
    $ejecutar_ti = mysqli_query($conexion_ti,"select NombreRepuesto from Repuestos where Estado = 'Desactivar' ORDER BY NombreRepuesto ASC;");
    mysqli_set_charset($conexion_ti,"utf8");
?>
<datalist id="lista_productos_otros">
<?php while ($row = mysqli_fetch_array($ejecutar_ti)) {  ?>
    <option><?php echo $row[0] ?></option>
<?php } mysqli_close($conexion_ti);?>
</datalist>
<script>
function obtener_datos_consulta_lama(texto){
    $.ajax({
        url:"visualiza_lama.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#consulta_lama").html(data)
        }
    });
}
$("#lama").change(function(){
    var buscarx = $("#lama").val();
    obtener_datos_consulta_lama(buscarx);
});
$(document).on("keyup","#input_conla", function(){
    var buscarx = $("#lama").val();
    var dato2 = $("input#input_conla").val();
        if (dato2 == ""){
            $("input#input_conla").focus();
          obtener_datos_consulta_lama(buscarx);
        }else{
            obtener_datos_consulta_filtra_lama(buscarx, dato2);
        }
})
function obtener_datos_consulta_filtra_lama(texto, texto2){
    $.ajax({
        url:"filtra_lama.php",
        method:"POST",
        data: {texto: texto, texto2: texto2},
        success: function(data){
            $("#consulta_lama").html(data)
        }
    })
}

$(document).on("click","#ingresar_conla",function(){
    $('#accion_conla tbody tr').each(function () {
        var val= $(this).find('td').eq(3).html();
        var alt= $(this).find('td').eq(2).html();
        var anc= $(this).find('td').eq(1).html();
        var id= $(this).find('td').eq(0).html();
            $.ajax({
                url: "modificar_lama.php",
                method: "POST",
                data: {anc: anc, alt: alt, val: val, id: id},
                success: function(data){}
            })
    });
    alert("Lama Modificada exitosamente");
    var buscarx = $("#lama").val();
    var dato2 = $("input#input_conla").val();
    if (dato2 == ""){
        $("input#input_conla").focus();
        obtener_datos_consulta_lama(buscarx,"");
    }else{
        obtener_datos_consulta_lama(buscarx, dato2);
    }
});

function openPage(pageName,elmnt,color) {
    var i, tabcontent, tablinks, tablinks1, tablinks2, tablinks3, tablinks4, tablinks5, tablinks6;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
        tablinks = document.getElementsByClassName("botones_pestanas_inabilitados_a");
        tablinks1 = document.getElementsByClassName("botones_pestanas_inabilitados_b");
        tablinks2 = document.getElementsByClassName("botones_pestanas_inabilitados_c");
        tablinks3 = document.getElementsByClassName("botones_pestanas_inabilitados_d");
        tablinks4 = document.getElementsByClassName("botones_pestanas_inabilitados_e");
        tablinks5 = document.getElementsByClassName("botones_pestanas_inabilitados_f");
        tablinks6 = document.getElementsByClassName("botones_pestanas_inabilitados_g");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
        tablinks1[i].style.backgroundColor = "";
        tablinks2[i].style.backgroundColor = "";
        tablinks3[i].style.backgroundColor = "";
        tablinks4[i].style.backgroundColor = "";
        tablinks5[i].style.backgroundColor = "";
        tablinks6[i].style.backgroundColor = "";
    }
    $("#"+pageName).css("display", "block");
    elmnt.style.backgroundColor = color;
}
$("#persianas").trigger('click');

function llamar_select_lama(){
    $.ajax({
        url:"llamar_lama.php",
        method:"POST",
        success: function(data){
            $("#select_lama").html(data)
        }
    });
}
llamar_select_lama();
$("textarea[name=excel_data]").click(function(){
  this.select();
});
$("#pastein").keyup(function(){
        var ta      =   $("#pastein");
        letras      =   ta.val().replace(/ /g, "");
        ta.val(letras)
        var a = $("#pastein").val();
        if (a == ""){
            document.getElementById("guardar_lama").style.display = "none";
        }else{
            document.getElementById("guardar_lama").style.display = "block";
        }
});
</script>
<script>
function removeExtraTabs(string) {
    return string.replace(new RegExp("\t\t", 'g'), "\t");
}

function generateTable() {
    var data = removeExtraTabs($('#pastein').val());
    var rows = data.split("\n");
    var table = $('<table id="rwd-table-id" />');
    for (var y in rows) {
        rows[y] = removeExtraTabs(rows[y]);
        var cells = rows[y].split("\t");
        var row = $('<tr />');
    for (var x in cells) {
        row.append('<td contenteditable>' + cells[x] + '</td>');
    }
    table.append(row);
    }
    $('#excel_table').html(table);
    document.getElementById("guardar_lama").style.display = "block";
}

$(document).ready(function() {
    $('#pastein').on('paste', function(event) {
        $('#pastein').on('input', function() {
            generateTable();
            $('#pastein').off('input');
        })
    })
})
$(document).on("click","#boton_agregarfila_acciona",function(){
    var table = document.getElementById("agregar_fila_acciona");
    var row = table.insertRow();
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    cell1.innerHTML = "";
    cell2.innerHTML = "";
    cell2.setAttribute('contentEditable', 'true');
    cell3.innerHTML = "";
    cell3.setAttribute('contentEditable', 'true');
});
$(document).on("click","#guardar_lama",function(){
    var lama = $("#lama").val();
    //$("#tabla_lama tr").remove();
    $.ajax({
        async:false,
            url: "eliminar_antigualama.php",
            method: "POST",
            data: {lama: lama},
        success: function(data){
        }
    });
    document.getElementById("guardar_lama").style.display = "none";
    var resume_table = document.getElementById("rwd-table-id");
    var x=[];
    for (var i = 0, row; row = resume_table.rows[i]; i++) {
    	for (var j = 0, col; col = row.cells[j]; j++) {
    		if (j == 0) {
    			var ancho = 0;
    			ancho = `${col.innerText}`;
    		}
    	    if (ancho == col.innerText) {} else {
    			if (i == 0){
    				x[j]=col.innerText;
    			}else{
    			    var lama = $("#lama").val();
                    var texto = col.innerText;
                    var htmlTags = '<tr>'+
                    '<td>' + lama + '</td>'+
                    '<td>' + ancho + '</td>'+
                    '<td>' + x[j] + '</td>'+
                    '<td>' + texto + '</td>'+
                    '</tr>';
                    $('#tabla_lama').append(htmlTags);
                    //alert(lama + ", "+ ancho + ", "+ x[j] + ", "+ texto);
                    /*$.ajax({
                        url: "insertar_lama.php",
                        method: "POST",
                        data: {lama: lama, ancho: ancho, alto: x[j], texto: texto},
                        success: function(data){}
                    })*/
    			}
    		}
    	}
    }
   /* $('#tabla_lama tr').each(function () {
        var la= $(this).find('td').eq(0).html();
        var an= $(this).find('td').eq(1).html();
        var al= $(this).find('td').eq(2).html();
        var val= $(this).find('td').eq(3).html();
        $.ajax({
            async: false,
            url: "insertar_lama.php",
            method: "POST",
            data: {lama: la, ancho: an, alto: al, texto: val},
            success: function(data){}
        });
    });*/
    var buscarx = $("#lama").val();
    var dato2 = $("input#input_conla").val();
    if (dato2 == ""){
        $("input#input_conla").focus();
        obtener_datos_consulta_lama(buscarx,"");
    }else{
        obtener_datos_consulta_lama(buscarx, dato2);
    }
    alert("Lama Formateada exitosamente \n Ahora seleccione e Ingrese Lama en Excel");
    document.getElementById("pastein").value = "";
    $("#excel_table").empty();
    document.getElementById("boton_agregarfila").style.display = "none";
    document.getElementById("guardar_lama").style.display = "none";
});
$(document).on("click","#guardar_lamax",function(){
    $('#accion tbody tr').each(function () {
        var acc= $(this).find('td').eq(1).html();
        var valor = $(this).find('td').eq(2).html();
        var id= $(this).find('td').eq(0).html();
        if (acc == ""){
            alert("Agrege Accionamiento a la tabla");
        }
        else{
            $.ajax({
                url: "insertar_accionamiento.php",
                method: "POST",
                data: {acc: acc, valor: valor, id: id},
                success: function(data){}
            });
        }
    });
    obtener_datos_acciona('');
    obtener_datos_acciona('');
    alert("Accionamiento ingresados exitosamente");
    obtener_datos_acciona('');
});
function obtener_datos_acciona(texto){
        $.ajax({
            url:"buscar_accionamiento.php",
            method:"POST",
            data: {texto: texto},
            success: function(data){
                $("#result_acciona").html(data)
            }
        })
    }
    obtener_datos_acciona('');
     $(document).on("keyup","#input_ac", function(){
        var buscar = $("input#input_ac").val();
        if (buscar == ""){
            $("input#input_ac").focus();
            obtener_datos_acciona('');
        }else{
            obtener_datos_acciona(buscar);
        }
    })
$(document).on("click","#eliminar_acciona",function(){
    if (confirm("¿Desea cambiar el estado de este Registro?")){
        var id = $(this).data("id_eliminar_acciona");
        var es = $(this).data("estado");
        $.ajax({
            url: "eliminar_accionamiento.php",
            method: "POST",
            data: {id: id, es: es},
            success: function(data){
                var buscar = $("input#input_ac").val();
                if (buscar == ""){
                    obtener_datos_acciona('');
                }else{
                    obtener_datos_acciona(buscar);
                }
                alert(data);
            }
        })
    };
})
</script>
<script>
function obtener_datos_nuevalama(texto){
    $.ajax({
        url:"buscar_lama.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_lama").html(data)
        }
    });
}
function obtener_datos_agregarcolor(texto){
    var estado = $("#lama").val();
    $.ajax({
        url:"buscar_agrega_color.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_color_mant").html(data)
        }
    });
}
$(document).on("keyup","#input_color", function(){
    var buscar = $("input#input_color").val();
    if (buscar == ""){
        $("input#input_color").focus();
        obtener_datos_agregarcolor('');
    }else{
        obtener_datos_agregarcolor(buscar);
    }
});
$(document).on("click","#guardar_color",function(){
    $('#accion_agrega_color tbody tr').each(function () {
        var acc= $(this).find('td').eq(1).html();
        var id= $(this).find('td').eq(0).html();
        if (acc == ""){
            alert("Agrege Color a la tabla");
        }
        else{
            $.ajax({
                url: "insertar_agrega_color.php",
                method: "POST",
                data: {acc: acc, id: id},
                success: function(data){}
            })
        }
    });
    obtener_datos_agregarcolor('');
    obtener_datos_agregarcolor('');
    alert("Color ingresados exitosamente");
    obtener_datos_agregarcolor('');
    obtener_datos_nuevacolor('');
    llamar_select_lama();

});
$(document).on("click","#estado_agrega_color",function(){
    if (confirm("¿Desea cambiar el estado de este Registro?")){
        var id = $(this).data("id_estado_agrega_color");
        var es = $(this).data("estado");
        $.ajax({
            url: "cambiar_estado_agrega_color.php",
            method: "POST",
            data: {id: id, es: es},
            success: function(data){
                var buscar = $("input#input_color").val();
                if (buscar == ""){
                    obtener_datos_agregarcolor('');
                }else{
                    obtener_datos_agregarcolor(buscar);
                }
                alert(data);
                obtener_datos_nuevacolor('');
                llamar_select_lama();
            }
        })
    };
})
$(document).on("click","#boton_agregarfila_color",function(){
    var table = document.getElementById("agregar_fila_agrega_color");
    var row = table.insertRow();
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    cell1.innerHTML = "";
    cell2.innerHTML = "";
    cell2.setAttribute('contentEditable', 'true');
});
function obtener_datos_nuevacolor(texto){
    var estado = $("#lama").val();
    $.ajax({
        url:"buscar_color.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_color").html(data)
        }
    });
}
obtener_datos_agregarcolor('');
obtener_datos_nuevalama('');
obtener_datos_nuevacolor('');
$(document).on("keyup","#input_la", function(){
    var buscar = $("input#input_la").val();
    if (buscar == ""){
        $("input#input_la").focus();
        obtener_datos_nuevalama('');
    }else{
        obtener_datos_nuevalama(buscar);
    }
});
$(document).on("click","#ingresar_color",function(){
    $('#accion_color tbody tr input:checkbox').each ( function() {
        var acc = "";
        var estado = $("#lama").val();
        acc = $(this).val();
        if ($(this).is(':checked')) {
            $.ajax({
                url: "insertar_nuevacolor.php",
                method: "POST",
                data: {acc: acc, estado: estado},
                success: function(data){}
            });
        }else{
            $.ajax({
                url: "borrar_nuevacolor.php",
                method: "POST",
                data: {acc: acc, estado: estado},
                success: function(data){}
            });
        }

    });
    obtener_datos_nuevacolor('');
    obtener_datos_nuevacolor('');
    alert("Colores Enlazados Exitosamente");
    obtener_datos_nuevacolor('');
});
$(document).on("click","#ingresar_lama",function(){
    $('#accion_lama tbody tr').each(function () {
        var acc= $(this).find('td').eq(1).html();
        var id= $(this).find('td').eq(0).html();
        if (acc == ""){
            alert("Agrege Lama a la tabla");
        }
        else{
            $.ajax({
                url: "insertar_nuevalama.php",
                method: "POST",
                data: {acc: acc, id: id},
                success: function(data){}
            })
        }
    });
    obtener_datos_nuevalama('');
    obtener_datos_nuevalama('');
    alert("Nueva Lama creada exitosamente");
    obtener_datos_nuevalama('');
    llamar_select_lama();
});
$(document).on("click","#eliminar_lama",function(){
    if (confirm("¿Desea cambiar el estado de este Registro?")){
        var id = $(this).data("id_eliminar_lama");
        var es = $(this).data("estado");
        $.ajax({
            url: "eliminar_lama.php",
            method: "POST",
            data: {id: id, es: es},
            success: function(data){
                var buscar = $("input#input_la").val();
                if (buscar == ""){
                    obtener_datos_nuevalama('');
                }else{
                    obtener_datos_nuevalama(buscar);
                }
                alert(data);
                llamar_select_lama();
            }
        })
    };
})
$(document).on("click","#boton_agregarfila_lama",function(){
    var table = document.getElementById("agregar_fila_lama");
    var row = table.insertRow();
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    cell1.innerHTML = "";
    cell2.innerHTML = "";
    cell2.setAttribute('contentEditable', 'true');
});
</script>
<script>
function obtener_datos_consulta_roller(texto){
    $.ajax({
        url:"visualiza_roller.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#consulta_lama2").html(data)
        }
    })
}
$("#b_rollers").change(function(){
    var buscar = $("#b_rollers").val();
    obtener_datos_consulta_roller(buscar);
});

$(document).on("keyup","#input_conla2", function(){
    var buscar = $("#b_rollers").val();
    var dato2 = $("input#input_conla2").val();
        if (dato2 == ""){
            $("input#input_conla2").focus();
          obtener_datos_consulta_roller(buscar);
        }else{
            obtener_datos_consulta_filtra_roller(buscar, dato2);
        }
})
function obtener_datos_consulta_filtra_roller(texto, texto2){
    $.ajax({
        url:"filtra_roller.php",
        method:"POST",
        data: {texto: texto, texto2: texto2},
        success: function(data){
            $("#consulta_lama2").html(data)
        }
    })
}

$(document).on("click","#ingresar_conla2",function(){
    $('#accion_conla2 tbody tr').each(function () {
        var val= $(this).find('td').eq(3).html();
        var alt= $(this).find('td').eq(2).html();
        var anc= $(this).find('td').eq(1).html();
        var id= $(this).find('td').eq(0).html();
            $.ajax({
                url: "modificar_roller.php",
                method: "POST",
                data: {anc: anc, alt: alt, val: val, id: id},
                success: function(data){}
            })
    });
    alert("Roller Modificada exitosamente");
    var buscar = $("#b_rollers").val();
    var dato2 = $("input#input_conla2").val();
    if (dato2 == ""){
        $("input#input_conla2").focus();
        obtener_datos_consulta_roller(buscar,"");
    }else{
        obtener_datos_consulta_roller(buscar, dato2);
    }
});

function llamar_select_roller(){
    $.ajax({
        url:"llamar_roller.php",
        method:"POST",
        success: function(data){
            $("#select_roller").html(data)
        }
    })
}
llamar_select_roller();
$("textarea[name=excel_data2]").click(function(){
  this.select();
});
$("#pastein2").keyup(function(){
        var ta      =   $("#pastein2");
        letras      =   ta.val().replace(/ /g, "");
        ta.val(letras)
        var a = $("#pastein2").val();
        if (a == ""){
            document.getElementById("guardar_lama2").style.display = "none";
        }else{
            document.getElementById("guardar_lama2").style.display = "block";
        }
});
</script>
<script>
function removeExtraTabs2(string) {
    return string.replace(new RegExp("\t\t", 'g'), "\t");
}

function generateTable2() {
    var data = removeExtraTabs2($('#pastein2').val());
    var rows = data.split("\n");
    var table = $('<table id="rwd-table-id2"/>');
    for (var y in rows) {
        rows[y] = removeExtraTabs(rows[y]);
        var cells = rows[y].split("\t");
        var row = $('<tr />');
    for (var x in cells) {
        row.append('<td contenteditable>' + cells[x] + '</td>');
    }
    table.append(row);
    }
    $('#excel_table2').html(table);
    document.getElementById("guardar_lama2").style.display = "block";
}

$(document).ready(function() {
    $('#pastein2').on('paste', function(event) {
        $('#pastein2').on('input', function() {
            generateTable2();
            $('#pastein2').off('input');
        })
    })
});
$(document).on("click","#boton_agregarfila_acciona2",function(){
   var table = document.getElementById("agregar_fila_acciona2");
    var row = table.insertRow();
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    cell1.innerHTML = "";
    cell2.innerHTML = "";
    cell2.setAttribute('contentEditable', 'true');
    cell3.innerHTML = "";
    cell3.setAttribute('contentEditable', 'true');
});
$(document).on("click","#guardar_lama2",function(){
    var roller = $("#b_rollers").val();
    $.ajax({
            url: "eliminar_antiguaroller.php",
            method: "POST",
            data: {roller: roller},
        success: function(data){
        }
    });
    document.getElementById("guardar_lama2").style.display = "none";
    var resume_table = document.getElementById("rwd-table-id2");
    var x=[];
    for (var i = 0, row; row = resume_table.rows[i]; i++) {
    	for (var j = 0, col; col = row.cells[j]; j++) {
    		if (j == 0) {
    			var ancho = 0;
    			ancho = `${col.innerText}`;
    		}
    		if (ancho == col.innerText) {} else {
    			if (i == 0){
    				x[j]=col.innerText;
    			}else{
    			    var roller = $("#b_rollers").val();
                    var texto = col.innerText;
                    var htmlTags = '<tr>'+
                    '<td>' + roller + '</td>'+
                    '<td>' + ancho + '</td>'+
                    '<td>' + x[j] + '</td>'+
                    '<td>' + texto + '</td>'+
                    '</tr>';
                    $('#tabla_roller').append(htmlTags);
                    /*$.ajax({
                        url: "insertar_roller.php",
                        method: "POST",
                        data: {roller: roller, ancho: ancho, alto: x[j], texto: texto},
                        success: function(data){
                        }
                    })*/
    			}
    		}
    	}
    }
    /*$('#tabla_roller tr').each(function () {
        var ro= $(this).find('td').eq(0).html();
        var an= $(this).find('td').eq(1).html();
        var al= $(this).find('td').eq(2).html();
        var val= $(this).find('td').eq(3).html();
        $.ajax({
            url: "insertar_roller.php",
            method: "POST",
            data: {roller: ro, ancho: an, alto: x[j], texto: val},
            success: function(data){
            }
        })
    });*/
    alert("Roller Formateado exitosamente \n Ahora seleccione e Ingrese Roller con Excel");
    document.getElementById("pastein2").value = "";
    $("#excel_table2").empty();
    document.getElementById("boton_agregarfila2").style.display = "none";
    document.getElementById("guardar_lama2").style.display = "none";
});
$(document).on("click","#guardar_lamay",function(){
    $('#accion2 tbody tr').each(function () {
        var acc= $(this).find('td').eq(1).html();
        var valor = $(this).find('td').eq(2).html();
        var id= $(this).find('td').eq(0).html();
        if (acc == ""){
            alert("Agrege Accionamiento a la tabla");
        }
        else{
            $.ajax({
                url: "insertar_accionamiento_roller.php",
                method: "POST",
                data: {acc: acc, valor: valor, id: id},
                success: function(data){}
            })
        }
    });
    obtener_datos_acciona2('');
    obtener_datos_acciona2('');
    alert("Accionamiento ingresados exitosamente");
    obtener_datos_acciona2('');
});
function obtener_datos_acciona2(texto){
        $.ajax({
            url:"buscar_accionamiento_roller.php",
            method:"POST",
            data: {texto: texto},
            success: function(data){
                $("#result_acciona2").html(data)
            }
        });
    }
    obtener_datos_acciona2('');
     $(document).on("keyup","#input_ac2", function(){
        var buscar = $("input#input_ac2").val();
        if (buscar == ""){
            $("input#input_ac2").focus();
            obtener_datos_acciona2('');
        }else{
            obtener_datos_acciona2(buscar);
        }
    });

$(document).on("click","#eliminar_acciona2",function(){
    if (confirm("¿Desea cambiar el estado de este Registro?")){
        var id = $(this).data("id_eliminar_acciona2");
        var es = $(this).data("estado");
        $.ajax({
            url: "eliminar_accionamiento_roller.php",
            method: "POST",
            data: {id: id, es: es},
            success: function(data){
                var buscar = $("input#input_ac2").val();
                if (buscar == ""){
                    obtener_datos_acciona2('');
                }else{
                    obtener_datos_acciona2(buscar);
                }
                alert(data);
            }
        })
    };
})
</script>
<script>
function obtener_datos_nuevalama2(texto){
    $.ajax({
        url:"buscar_roller.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_lama2").html(data)
        }
    })
}
obtener_datos_nuevalama2('');
$(document).on("keyup","#input_la2", function(){
    var buscar = $("input#input_la2").val();
    if (buscar == ""){
        $("input#input_la2").focus();
        obtener_datos_nuevalama2('');
    }else{
        obtener_datos_nuevalama2(buscar);
    }
})

$(document).on("click","#ingresar_lama2",function(){
    $('#accion_roller tbody tr').each(function () {
        var acc= $(this).find('td').eq(1).html();
        var id= $(this).find('td').eq(0).html();
        if (acc == ""){
            alert("Agrege Roller a la tabla");
        }
        else{
            $.ajax({
                url: "insertar_nuevaroller.php",
                method: "POST",
                data: {acc: acc, id: id},
                success: function(data){}
            })
        }
    });
    obtener_datos_nuevalama2('');
    obtener_datos_nuevalama2('');
    alert("Nuevo Roller creado exitosamente");
    obtener_datos_nuevalama2('');
    llamar_select_roller();
});
$(document).on("click","#eliminar_roller",function(){
    if (confirm("¿Desea cambiar el estado de este Registro?")){
        var id = $(this).data("id_eliminar_roller");
        var es = $(this).data("estado");
        $.ajax({
            url: "eliminar_roller.php",
            method: "POST",
            data: {id: id, es: es},
            success: function(data){
                var buscar = $("input#input_la2").val();
                if (buscar == ""){
                    obtener_datos_nuevalama2('');
                }else{
                    obtener_datos_nuevalama2(buscar);
                }
                alert(data);
                llamar_select_roller();
            }
        })
    };
})
$(document).on("click","#boton_agregarfila_lama2",function(){
    var table = document.getElementById("agregar_fila_lama2");
    var row = table.insertRow();
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    cell1.innerHTML = "";
    cell2.innerHTML = "";
    cell2.setAttribute('contentEditable', 'true');
});

</script>
<script>
function obtener_datos(texto){
    $.ajax({
        url:"buscar_repuestos.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_rep").html(data)
        }
    })
}
obtener_datos("");
$(document).on("keyup","#input_rep", function(){
    var buscar = $("input#input_rep").val();
    if (buscar == ""){
        $("input#input_rep").focus();
        obtener_datos("");
    }else{
        obtener_datos(buscar);
    }
})
$(document).on("click","#guardar_lama3",function(){
    $('#accion3 tbody tr').each(function () {
        var acc= $(this).find('td').eq(1).html();
        var valor = $(this).find('td').eq(2).html();
        var id= $(this).find('td').eq(0).html();
        if (acc == ""){
            alert("Agrege Repuestos a la tabla");
        }
        else{
            $.ajax({
                url: "insertar_rep.php",
                method: "POST",
                data: {acc: acc, valor: valor, id: id},
                success: function(data){}
            })
        }
    });
    obtener_datos("");
    obtener_datos("");
    alert("Repuestos ingresados exitosamente");
    obtener_datos("");
});
$(document).on("click","#eliminar",function(){
    if (confirm("¿Desea cambiar el estado de este Registro?")){
        var id = $(this).data("id_eliminar");
        var es = $(this).data("estado");
        $.ajax({
            url: "eliminar_rep.php",
            method: "POST",
            data: {id: id, es: es},
            success: function(data){
                var buscar = $("input#input_rep").val();
                if (buscar == ""){
                    obtener_datos("");
                }else{
                    obtener_datos(buscar);
                }
                alert(data);
            }
        })
    };
})
$(document).on("click","#boton_agregarfila3",function(){
    var table = document.getElementById("agregar_fila");
    var row = table.insertRow();
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    cell1.innerHTML = "";
    cell2.innerHTML = "";
    cell2.setAttribute('contentEditable', 'true');
    cell3.innerHTML = "";
    cell3.setAttribute('contentEditable', 'true');
});
</script>
<script>
function obtener_datos_otro(texto){
    $.ajax({
        url:"buscar_otros.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_otro").html(data)
        }
    })
}
obtener_datos_otro("");
$(document).on("keyup","#input_otro", function(){
    var buscar = $("input#input_otro").val();
    if (buscar == ""){
        $("input#input_otro").focus();
        obtener_datos_otro("");
    }else{
        obtener_datos_otro(buscar);
    }
});
$(document).on("click","#guardar_lama4",function(){
    $('#accion4 tbody tr').each(function () {
        var acc= $(this).find('td').eq(1).html();
        var valor = $(this).find('td').eq(2).html();
        var tipo = $(this).find('td:nth-child(5)').find('select').val();
        var id= $(this).find('td').eq(0).html();
        if (acc == ""){
            alert("Agrege Otros a la tabla");
        }
        else{
            $.ajax({
                url: "insertar_otros.php",
                method: "POST",
                data: {acc: acc, valor: valor, tipo: tipo, id: id},
                success: function(data){}
            })
        }
    });
    obtener_datos_otro("");
    obtener_datos_otro("");
    alert("Otros ingresados exitosamente");
    obtener_datos_otro("");
});
$(document).on("click","#boton_agregarfila4",function(){
    var table = document.getElementById("agregar_fila_otro");
    var row = table.insertRow();
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    cell1.innerHTML = "";
    cell2.innerHTML = "";
    cell2.setAttribute('contentEditable', 'true');
    cell3.innerHTML = "";
    cell3.setAttribute('contentEditable', 'true');
});
$(document).on("click","#eliminar_otro",function(){
    if (confirm("¿Desea cambiar el estado de este Registro?")){
        var id = $(this).data("id_eliminar_otro");
        var es = $(this).data("estado");
        $.ajax({
            url: "eliminar_otro.php",
            method: "POST",
            data: {id: id, es: es},
            success: function(data){
                var buscar = $("input#input_otro").val();
                if (buscar == ""){
                    obtener_datos_otro("");
                }else{
                    obtener_datos_otro(buscar);
                }
                alert(data);
            }
        })
    };
})
</script>
<script>
function obtener_datos_instalacion(texto){
    $.ajax({
        url:"buscar_instalacion.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_instalacion").html(data)
        }
    })
}
obtener_datos_instalacion("");
$(document).on("keyup","#input_inst", function(){
    var buscar = $("input#input_inst").val();
    if (buscar == ""){
        $("input#input_inst").focus();
        obtener_datos_instalacion("");
    }else{
        obtener_datos_instalacion(buscar);
    }
});
$(document).on("click","#guardar_instalacion",function(){
    $('#accion_instalacion tbody tr').each(function () {
        var inst= $(this).find('td').eq(1).html();
        var pers1 = $(this).find('td').eq(2).html();
        var pers2 = $(this).find('td').eq(3).html();
        var manual = $(this).find('td').eq(4).html();
        var motor = $(this).find('td').eq(5).html();
        var color = $(this).find('td:nth-child(7)').find('input').val();
        var id= $(this).find('td').eq(0).html();
        if (inst == ""){
            alert("Agrege Instaladores a la tabla");
        }
        else{
            $.ajax({
                url: "insertar_instaladores.php",
                method: "POST",
                data: {inst: inst, pers1: pers1, pers2: pers2, manual: manual, motor: motor, color: color,id: id},
                success: function(data){
                   // alert(data);
                }
            });
        }
    });
    obtener_datos_instalacion("");
    obtener_datos_instalacion("");
    alert("Instaladores ingresados exitosamente");
    obtener_datos_instalacion("");
});
$(document).on("click","#boton_agregarfila_instalacion",function(){
    var table = document.getElementById("agregar_fila_instalacion");
    var row = table.insertRow();
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);
    var cell7 = row.insertCell(6);
    cell1.innerHTML = "";
    cell2.innerHTML = "";
    cell2.setAttribute('contentEditable', 'true');
    cell3.innerHTML = "";
    cell3.setAttribute('contentEditable', 'true');
    cell4.innerHTML = "";
    cell4.setAttribute('contentEditable', 'true');
    cell5.innerHTML = "";
    cell5.setAttribute('contentEditable', 'true');
    cell6.innerHTML = "";
    cell6.setAttribute('contentEditable', 'true');
    cell7.innerHTML = "<input id='colorselec' type='color' value='#000000'/>";
});
$(document).on("click","#eliminar_instalacion",function(){
    if (confirm("¿Desea cambiar el estado de este Registro?")){
        var id = $(this).data("id_eliminar_instalacion");
        var es = $(this).data("estado");
        $.ajax({
            url: "eliminar_instaladores.php",
            method: "POST",
            data: {id: id, es: es},
            success: function(data){
                var buscar = $("input#input_inst").val();
                if (buscar == ""){
                    $("input#input_inst").focus();
                    obtener_datos_instalacion("");
                }else{
                    obtener_datos_instalacion(buscar);
                }
                alert(data);
            }
        })
    };
});
/*function obtener_datos_porc_lama(){
    $.ajax({
        url:"porcentajes/mostrar_porcentaje_lama.php",
        method:"POST",
        success: function(data){
            $("#result_porc_lama").html(data)
        }
    })
}
function obtener_datos_porc_roller(){
    $.ajax({
        url:"porcentajes/mostrar_porcentaje_roller.php",
        method:"POST",
        success: function(data){
            $("#result_porc_roller").html(data)
        }
    })
}
function obtener_datos_porc_repuestos(){
    $.ajax({
        url:"porcentajes/mostrar_porcentaje_repuestos.php",
        method:"POST",
        success: function(data){
            $("#result_porc_repuestos").html(data)
        }
    })
}
function obtener_datos_porc_otros(){
    $.ajax({
        url:"porcentajes/mostrar_porcentaje_otros.php",
        method:"POST",
        success: function(data){
            $("#result_porc_otros").html(data)
        }
    })
}
$(document).on("click","#porcentajes",function(){
    obtener_datos_porc_lama();
    obtener_datos_porc_roller();
    obtener_datos_porc_repuestos();
    obtener_datos_porc_otros();
})*/
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
function obtener_datos_rectificador(texto){
    $.ajax({
        url:"buscar_rectificador.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_rectificador").html(data)
        }
    })
}
obtener_datos_rectificador("");
$(document).on("keyup","#input_rect", function(){
    var buscar = $("input#input_rect").val();
    if (buscar == ""){
        $("input#input_rect").focus();
        obtener_datos_rectificador("");
    }else{
        obtener_datos_rectificador(buscar);
    }
});
$(document).on("click","#guardar_rectificador",function(){
    $('#accion_rectificador tbody tr').each(function () {
        var id= $(this).find('td').eq(0).html();
        var acc= $(this).find('td').eq(1).html();
        var color= $(this).find('td').eq(2).html();
        if (acc == ""){
            alert("Agrege Rectificadores a la tabla");
        }
        else{
            $.ajax({
                url: "insertar_rectificadores.php",
                method: "POST",
                data: {acc: acc, color: color,id: id},
                success: function(data){}
            })
        }
    });
    obtener_datos_rectificador("");
    obtener_datos_rectificador("");
    alert("Rectificador ingresados exitosamente");
    obtener_datos_rectificador("");
});
$(document).on("click","#boton_agregarfila_rectificador",function(){
    var table = document.getElementById("agregar_fila_rectificador");
    var row = table.insertRow();
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    cell1.innerHTML = "";
    cell2.innerHTML = "";
    cell2.setAttribute('contentEditable', 'true');
});
$(document).on("click","#eliminar_rectificador",function(){
    if (confirm("¿Desea cambiar el estado de este Registro?")){
        var id = $(this).data("id_eliminar_rectificador");
        var es = $(this).data("estado");
        $.ajax({
            url: "eliminar_rectificadores.php",
            method: "POST",
            data: {id: id, es: es},
            success: function(data){
                var buscar = $("input#input_rect").val();
                if (buscar == ""){
                    $("input#input_rect").focus();
                    obtener_datos_rectificador("");
                }else{
                    obtener_datos_rectificador(buscar);
                }
                alert(data);
            }
        })
    };
});
</script>
<script>
function obtener_datos_instalacion_roller(texto){
    $.ajax({
        url:"buscar_instalacion_roller.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_instalacion_roller").html(data)
        }
    })
}
obtener_datos_instalacion_roller("");
$(document).on("click","#boton_agregarfila_instalacion_roller",function(){
    var table = document.getElementById("agregar_fila_instalacion_roller");
    var row = table.insertRow();
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);
    cell1.innerHTML = "";
    cell2.innerHTML = "";
    cell2.setAttribute('contentEditable', 'true');
    cell3.innerHTML = "";
    cell3.setAttribute('contentEditable', 'true');
    cell4.innerHTML = "";
    cell4.setAttribute('contentEditable', 'true');
    cell5.innerHTML = "";
    cell5.setAttribute('contentEditable', 'true');
    cell6.innerHTML = "";
    cell6.setAttribute('contentEditable', 'true');
});
$(document).on("click","#guardar_instalacion_roller",function(){
    $('#accion_instroller2 tbody tr').each(function () {
        var inst= $(this).find('td').eq(1).html();
        var roller1 = $(this).find('td').eq(2).html();
        var roller2 = $(this).find('td').eq(3).html();
        var manual = $(this).find('td').eq(4).html();
        var motor = $(this).find('td').eq(5).html();
        var id= $(this).find('td').eq(0).html();
        if (inst == ""){
            alert("Agrege Instaladores a la tabla");
        }
        else{
            $.ajax({
                url: "insertar_instaladores_roller.php",
                method: "POST",
                data: {inst: inst, roller1: roller1, roller2: roller2, manual: manual, motor: motor, id: id},
                success: function(data){
                   // alert(data);
                }
            });
        }
    });
    obtener_datos_instalacion_roller("");
    obtener_datos_instalacion_roller("");
    alert("Instaladores Roller ingresados exitosamente");
    obtener_datos_instalacion_roller("");
});
$(document).on("click","#eliminar_instalacion_roller",function(){
    if (confirm("¿Desea cambiar el estado de este Registro?")){
        var id = $(this).data("id_eliminar_instalacion_roller");
        var es = $(this).data("estado_roller");
        $.ajax({
            url: "eliminar_instaladores_roller.php",
            method: "POST",
            data: {id: id, es: es},
            success: function(data){
                var buscar = $("input#input_instr").val();
                if (buscar == ""){
                    $("input#input_instr").focus();
                    obtener_datos_instalacion_roller("");
                }else{
                    obtener_datos_instalacion_roller(buscar);
                }
                alert(data);
            }
        })
    };
});
</script>
<script>
function obtener_datos_rectificacion_tecnicos(texto){
    $.ajax({
        url:"buscar_rectificador_tecnicos.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_rect_tecn").html(data);
        }
    });
}
obtener_datos_rectificacion_tecnicos("");
$(document).on("click","#boton_agregarfila_rect_tecnicos",function(){
    var table = document.getElementById("agregar_fila_rectificacion_tecnico");
    var row = table.insertRow();
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    cell1.innerHTML = "";
    cell2.innerHTML = "<input list='list_tecn' type='text' class='input_cliente' id='input_tecnico' name='input_tecnico' placeholder='Buscar Técnico...' size='30' maxlength='70' autocomplete='off'></input>";
    cell3.innerHTML = "";
    cell3.setAttribute('contentEditable', 'true');
    cell4.innerHTML = "";
    cell4.setAttribute('contentEditable', 'true');
});
$(document).on("click","#guardar_rect_tecnico",function(){
    $('#accion_rectificacion_tecnico tbody tr').each(function () {
        var id= $(this).find('td').eq(0).html();
        if ($(this).find('td:nth-child(2)').find('select').length){
            var inst= $(this).find('td:nth-child(2)').find('select').val();
        }else if ($(this).find('td:nth-child(2)').find('input').length){
            var inst= $(this).find('td:nth-child(2)').find('input').val();
        }
        var valorunit = $(this).find('td').eq(2).html();
        var bonodiario = $(this).find('td').eq(3).html();
        if (inst == ""){
            alert("Agrege Instaladores a la tabla");
        }
        else{
            $.ajax({
                url: "insertar_bonos.php",
                method: "POST",
                data: {inst: inst, valorunit: valorunit, bonodiario: bonodiario, id: id},
                success: function(data){
                   // alert(data);
                }
            });
        }
    });
    obtener_datos_rectificacion_tecnicos("");
    obtener_datos_rectificacion_tecnicos("");
    alert("Bonos Ingresados exitosamente");
    obtener_datos_rectificacion_tecnicos("");
});
function buscar_bono(){
    var buscar = $("input#input_rect_bono").val();
    if (buscar == ""){
        $("input#input_rect_bono").focus();
        obtener_datos_rectificacion_tecnicos("");
    }else{
        obtener_datos_rectificacion_tecnicos(buscar);
    }
}
$(document).on("keyup","#input_rect_bono",function(){
    buscar_bono();
});
$(document).on("click","#eliminar_tecnico_rect",function(){
    if (confirm("¿Desea eliminar este Bono?")){
        var id = $(this).data("id_eliminar_tec_rectificador");
        $.ajax({
            url: "eliminar_bono.php",
            method: "POST",
            data: {id: id},
            success: function(data){}
        });
    };
    obtener_datos_rectificacion_tecnicos();
    obtener_datos_rectificacion_tecnicos();
    alert("Se ha eliminado el Bono");
    obtener_datos_rectificacion_tecnicos();
});
</script>
<script>
function obtener_datos_producto(texto){
    $.ajax({
        url:"buscar_producto.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_producto").html(data);
        }
    });
}
$(document).on("change","#nombre_rect",function(){
    obtener_datos_producto($("#nombre_rect").val());
});
$(document).on("click","#eliminar_producto",function(){
    if (confirm("¿Desea eliminar este Producto de este Técnico?")){
        var id = $(this).data("id_eliminar_producto");
        $.ajax({
            url: "eliminar_producto.php",
            method: "POST",
            data: {id: id},
            success: function(data){}
        });
        alert("Se ha eliminado el Producto del Técnico "+$("#nombre_rect").val());
    };
    obtener_datos_producto($("#nombre_rect").val());
    obtener_datos_producto($("#nombre_rect").val());
    obtener_datos_producto($("#nombre_rect").val());
});
$(document).on("click","#boton_agregarfila_producto",function(){
    try {
      var table = document.getElementById("agregar_fila_producto");
      var row = table.insertRow();
      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
      var cell3 = row.insertCell(2);
      cell1.innerHTML = "";
      cell2.innerHTML = "<input list='lista_productos_otros' class='productos_otros' id='productos_otros' name='productos_otros' type='text' style='text-align:center; width:100%;' placeholder='Busque Producto...' size='30' maxlength='105' autocomplete='off'>";
      cell3.innerHTML = "<select id='estado' name='estado' class='estado'><option value='Si' selected>Si</option><option value='No'>No</option></select>";
    } catch (e) {

    } finally {

    }
});
$(document).on("click","#guardar_producto",function(){
    $('#accion_producto tbody tr').each(function () {
        var id= $(this).find('td').eq(0).html();
        if ($(this).find('td:nth-child(2)').find('select').length){
            var producto= $(this).find('td:nth-child(2)').find('select').val();
        }else if ($(this).find('td:nth-child(2)').find('input').length){
            var producto= $(this).find('td:nth-child(2)').find('input').val();
        }
        var estado= $(this).find('td:nth-child(3)').find('select').val();
        var tecnico = $("#nombre_rect").val();
        $.ajax({
            url: "insertar_producto.php",
            method: "POST",
            data: {producto: producto, estado: estado, tecnico: tecnico, id: id},
            success: function(data){}
        });
    });
    obtener_datos_producto($("#nombre_rect").val());
    obtener_datos_producto($("#nombre_rect").val());
    alert("Producto Ingresados exitosamente");
    obtener_datos_producto($("#nombre_rect").val());
});
</script>
<p></p>
</div>
</div>
<p class="titulo75">SOCIEDAD FYD</p>
<p class="copy">Copyright © 2021 | Diseñado por N.A.B para Comercial F&amp;D</p>
</body>
</html>
