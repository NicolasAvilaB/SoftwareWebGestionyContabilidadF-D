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
@import url("descuentoinstalacion.css");
</style>
<link href="descuentoinstalacion.css" rel="stylesheet" type="text/css">
<link rel="stylesheet"  href="../Imagenes/jquery.dataTables.min.css" type="text/css">
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
<script src="../Imagenes/jquery.dataTables.min.js"></script>
<script src="https://www.w3schools.com/lib/w3.js"></script>
<script>
$(document).ready( function () {
    $('#tabla_pago').DataTable();
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
<label id="titulo2" class= "titulo2">Instalaciones </label>
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
            <input type="submit" onclick="" id="vendedores01" name="vendedores01" class="botones_barra" value="Vendedores">
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
	if(isset($_POST["vendedores01"])){
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
<button id="desplegar_item" class="dropbtn">Instalaciones</button>
</div>
<div id="pestanas">
    <button id="vendedores" class="botones_pestanas_inabilitados_a" onclick="openPage('vendedor', this, 'white')">Instalación Persiana</button>
    <button id="páginas" class="botones_pestanas_inabilitados_b" onclick="openPage('página', this, 'white')" >Instalación Roller</button>
    <button id="pagoinsts" class="botones_pestanas_inabilitados_e" onclick="openPage('pagoinst', this, 'white')" >Pago Instalación</button>
</div>
<div class="tablascroll">
<div id="vendedor" class="tabcontent">
    <button id="guardar_lama3">Guardar Instalación</button>
    <button id='boton_agregarfila3'>Agregar Fila</button>
    <br></br>
    <input list="lista_clientes" type="text" class="input_cliente" id="input_rep" name="input_rep" placeholder="Buscar Registro..." size="30" maxlength="70" autocomplete="off"/>
    <?php
    $conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
    mysqli_set_charset($conexion,"utf8");
    $ejecutar = mysqli_query($conexion,"Select Nombre from Vendedores");
    ?>
    <datalist id="lista_clientes">
    <?php while ($row = mysqli_fetch_array($ejecutar)) {  ?>
    <option><?php echo $row[0];?></option>
    <?php } ?>
    </datalist>
    <div id="result_vend"></div>
    <br></br>
</div>
<div id="página" class="tabcontent">
    <button id="guardar_lama4">Guardar Instalación Roller</button><button id='boton_agregarfila4'>Agregar Fila</button>
    <br></br>
    <input list="lista_clientes2" type="text" class="input_cliente" id="input_otro" name="input_otro" placeholder="Buscar Registro..." size="30" maxlength="70" autocomplete="off"/>
    <?php
    $conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
    mysqli_set_charset($conexion,"utf8");
    $ejecutar2 = mysqli_query($conexion,"Select NombreEmpresa from Empresas");
    ?>
    <datalist id="lista_clientes2">
    <?php while ($row2 = mysqli_fetch_array($ejecutar2)) {  ?>
    <option><?php echo $row2[0];?></option>
    <?php } ?>
    </datalist>
    <div id="result_otro"></div>
    <br></br>
</div>
<div id="pagoinst" class="tabcontent">
    <div id="seccion_pagoint">
        <label>&nbsp;&nbsp;Nota Venta:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="grid-item" id="nota_add" name="nota_add" placeholder="Nota de Venta..." size="30" maxlength="70" autocomplete="off" /></label>
        <p></p>
        <label>&nbsp;&nbsp;Manual:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input list='tipoinstde' type="text" class="grid-item" id="manual" name="manual" placeholder="Manual..." size="30" maxlength="70" autocomplete="off" /></label>
        <p></p>
        <label>&nbsp;&nbsp;Control Remoto:<input type="text" class="grid-item" id="control_add" name="control_add" placeholder="Control Remoto..." size="30" maxlength="70" autocomplete="off" /></label>
        <p></p>
        <label>&nbsp;&nbsp;Reparación:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="grid-item" id="reparacion_add" name="reparacion_add" placeholder="Reparación..." size="30" maxlength="70" autocomplete="off" /></label>
        <p></p>
        <label>&nbsp;&nbsp;Motor:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="grid-item" id="motor_add" name="motor_add" placeholder="Motor..." size="30" maxlength="70" autocomplete="off" /></label>
        <p></p>
        <label>&nbsp;&nbsp;Mantención:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="grid-item" id="mantencion_add" name="mantencion_add" placeholder="Mantención..." size="30" maxlength="70" autocomplete="off" /></label>
        <p></p>
        <label>&nbsp;&nbsp;Traslado:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="grid-item" id="traslado_add" name="traslado_add" placeholder="Traslado..." size="30" maxlength="70" autocomplete="off" /></label>
        <p></p>
        <label>&nbsp;&nbsp;Roller:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="grid-item" id="roller_add" name="roller_add" placeholder="Roller..." size="30" maxlength="70" autocomplete="off" /></label>
        <p></p>
        <label>&nbsp;&nbsp;Varios:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="grid-item" id="varios_add" name="varios_add" placeholder="Varios..." size="30" maxlength="70" autocomplete="off" /></label>
        <p></p>
        <label>&nbsp;&nbsp;Técnico:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input list="lista_instalador" type="text" class="grid-item" id="tecnico_add" name="tecnico_add" placeholder="Técnico..." size="30" maxlength="70" autocomplete="off" /></label>
        <?php
            echo "<datalist id='lista_instalador'>";
                $conexion2 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
                $ejecutar2 = mysqli_query($conexion2,"select Instalador from Instaladores where Estado = 'Desactivar'");
                mysqli_set_charset($conexion2,"utf8");
                while ($row2 = mysqli_fetch_array($ejecutar2)) {
                    echo "<option>".$row2[0]."</option>";
                }
            echo "</datalist>";
        ?>
        <p></p>
        <label>&nbsp;&nbsp;Valor $:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="grid-item" id="valor_add" name="valor_add" placeholder="Valor..." size="30" maxlength="70" autocomplete="off" /></label>
        <p></p>
        <label>&nbsp;&nbsp;Fecha:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="date" class="grid-item" id="fecha_add" name="fecha_add" min='2005-01-01' max='2100-12-31' placeholder="Fecha..." size="30" maxlength="70" autocomplete="off" /></label>
        <p></p>
        <button id="ingresar_pago" class="boton_ingresar_factura">Ingresar</button>
    </div>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <div style="float:left;">
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
            <option value="1" disabled selected>Seleccione Año...</option>
            <option value='234'>Todos</option>
            <?php $year = date("Y");
                for ($i=2005; $i<=$year; $i++){
                    echo '<option value="'.$i.'">'.$i.'</option>';
                }
            ?>
        </select>
        <?php
            $conexion000 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
            mysqli_set_charset($conexion000,"utf8");
            $ejecutar000 = mysqli_query($conexion000,"select Instalador from Instaladores");
            mysqli_set_charset($conexion000,"utf8");
        ?>
        <select id="tecnico_seleccionado">
            <option value='0' disabled selected>Seleccione Técnico...</option>
            <option value='1'>Todos</option>
        <?php while ($row000 = mysqli_fetch_array($ejecutar000)) { ?>
            <option value='<?php echo $row000[0];?>'><?php echo $row000[0];?></option>
        <?php } mysqli_close($conexion000);?>
        </select>
        <?php
            $conexiona = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
            mysqli_set_charset($conexiona,"utf8");
            $ejecutara = mysqli_query($conexiona,"select NombreEmpresa from Empresas");
            mysqli_set_charset($conexiona,"utf8");
        ?>
        <select id="empresa_seleccionada">
            <option value='0'>Seleccione Empresa...</option>
            <option value='1'>Todos</option>
        <?php while ($rowa = mysqli_fetch_array($ejecutara)) { ?>
            <option value='<?php echo $rowa[0];?>'><?php echo $rowa[0];?></option>
        <?php } ?>
        </select>
        <button id="filtrar_mes_ano">Filtrar</button>
        <button id="filtrar_nota">Filtrar Nota Venta</button>
        <br></br>
    </div>
    <div style="float:right;">
        <!--<button id="borrar_filtrado">Borrar Filtrado</button>-->
        <input type="text" class="input_cliente" id="input_pago" name="input_pago" placeholder="Escriba Registro..." size="30" maxlength="70" autocomplete="off"/>
    </div>
    <div id="result_pago"><b></b></div>
</div>
<script>
function openPage(pageName,elmnt,color) {
    var i, tabcontent, tablinks, tablinks1, tablinks2;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
        tablinks = document.getElementsByClassName("botones_pestanas_inabilitados_a");
        tablinks1 = document.getElementsByClassName("botones_pestanas_inabilitados_b");
        tablinks2 = document.getElementsByClassName("botones_pestanas_inabilitados_e");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
        tablinks1[i].style.backgroundColor = "";
        tablinks2[i].style.backgroundColor = "";
    }
    $("#"+pageName).css("display", "block");
    elmnt.style.backgroundColor = color;
}
$("#vendedores").trigger('click');
</script>
<script>
function obtener_datos(texto){
    $.ajax({
        url:"buscar_inst_pers.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_vend").html(data)
        }
    });
}
$("#vendedores").on("click",function(){
    obtener_datos("");
});
obtener_datos("");
$(document).on("keyup","#input_rep", function(){
    var buscar = $("input#input_rep").val();
    if (buscar == ""){
        $("input#input_rep").focus();
        obtener_datos("");
    }else{
        obtener_datos(buscar);
    }
});
$(document).on("click","#guardar_lama3",function(){
    $('#accion3 tbody tr').each(function () {
        var id= $(this).find('td').eq(0).html();
        var cantidad= $(this).find('td').eq(1).html();
        var valor = $(this).find('td').eq(2).html();
        $.ajax({
            url: "insertar_inst_pers.php",
            method: "POST",
            data: {id: id, cantidad: cantidad, valor: valor},
            success: function(data){}
        });
    });
    obtener_datos("");
    obtener_datos("");
    alert("Instalación ingresados exitosamente");
    obtener_datos("");
});
$(document).on("click","#eliminar",function(){
    if (confirm("¿Desea eliminar la Instalación?")){
        var id = $(this).data("id_eliminar");
        $.ajax({
            url: "eliminar_inst_pers.php",
            method: "POST",
            data: {id: id},
            success: function(data){
                var buscar = $("input#input_rep").val();
                if (buscar == ""){
                    obtener_datos("");
                }else{
                    obtener_datos(buscar);
                }
                alert(data);
            }
        });
    };
});
$(document).on("click","#boton_agregarfila3",function(){
    var table = document.getElementById("agregar_fila");
    var row = table.insertRow();
    var cell1 = row.insertCell(0);
    var cell3 = row.insertCell(1);
    var cell4 = row.insertCell(2);
    cell1.innerHTML = "";
    cell3.innerHTML = "";
    cell3.setAttribute('contentEditable', 'true');
    cell4.innerHTML = "";
    cell4.setAttribute('contentEditable', 'true');
});
</script>
<script>
function obtener_datos_otro(texto){
    $.ajax({
        url:"buscar_inst_roller.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_otro").html(data)
        }
    });
}
$("#páginas").on("click",function(){
    obtener_datos_otro("");
});
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
        var id= $(this).find('td').eq(0).html();
        var cantidad= $(this).find('td').eq(1).html();
        var valor = $(this).find('td').eq(2).html();
        $.ajax({
            url: "insertar_inst_roller.php",
            method: "POST",
            data: {id: id, cantidad: cantidad, valor: valor},
            success: function(data){}
        })
    });
    obtener_datos_otro("");
    obtener_datos_otro("");
    alert("Instalación Roller ingresados exitosamente");
    obtener_datos_otro("");
});
$(document).on("click","#boton_agregarfila4",function(){
    var table = document.getElementById("agregar_fila_roller");
    var row = table.insertRow();
    var cell1 = row.insertCell(0);
    var cell3 = row.insertCell(1);
    var cell4 = row.insertCell(2);
    cell1.innerHTML = "";
    cell3.innerHTML = "";
    cell3.setAttribute('contentEditable', 'true');
    cell4.innerHTML = "";
    cell4.setAttribute('contentEditable', 'true');
});
$(document).on("click","#eliminar_roller",function(){
    if (confirm("¿Desea eliminar la Instalación Roller?")){
        var id = $(this).data("id_eliminar_roller");
        $.ajax({
            url: "eliminar_inst_roller.php",
            method: "POST",
            data: {id: id},
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
});

</script>
<script>
function obtener_datos_pago(texto){
    $.ajax({
        url:"buscar_pagoinst.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_pago").html(data);
        }
    });
}
function obtener_datos_pago_ano(texto){
    $.ajax({
        url:"buscar_pagoinst_ano.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_pago").html(data);
        }
    });
}
function obtener_datos_pago_mes_ano(texto, texto2){
    $.ajax({
        url:"buscar_pagoinst_mes_ano.php",
        method:"POST",
        data: {texto: texto, texto2: texto2},
        success: function(data){
            $("#result_pago").html(data);
        }
    });
}
function obtener_datos_pago_mes_ano_tec(texto, texto2, texto3){
    $.ajax({
        url:"buscar_pagoinst_mes_ano_tec.php",
        method:"POST",
        data: {texto: texto, texto2: texto2, texto3: texto3},
        success: function(data){
            $("#result_pago").html(data);
        }
    });
}
function obtener_datos_pago_tec(texto){
    $.ajax({
        url:"buscar_pagoinst_tec.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_pago").html(data);
        }
    });
}
function obtener_datos_pago_ano_tec(texto,texto2){
    $.ajax({
        url:"buscar_pagoinst_ano_tec.php",
        method:"POST",
        data: {texto: texto, texto2: texto2},
        success: function(data){
            $("#result_pago").html(data);
        }
    });
}

function obtener_datos_pago_not(texto){
    $.ajax({
        url:"buscar_pagoinst_not.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_pago").html(data);
        }
    });
}
function obtener_datos_pago_ano_not(texto){
    $.ajax({
        url:"buscar_pagoinst_ano_not.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_pago").html(data);
        }
    });
}
function obtener_datos_pago_mes_ano_not(texto, texto2){
    $.ajax({
        url:"buscar_pagoinst_mes_ano_not.php",
        method:"POST",
        data: {texto: texto, texto2: texto2},
        success: function(data){
            $("#result_pago").html(data);
        }
    });
}
function obtener_datos_pago_mes_ano_tec_not(texto, texto2, texto3){
    $.ajax({
        url:"buscar_pagoinst_mes_ano_tec_not.php",
        method:"POST",
        data: {texto: texto, texto2: texto2, texto3: texto3},
        success: function(data){
            $("#result_pago").html(data);
        }
    });
}
function obtener_datos_pago_tec_not(texto){
    $.ajax({
        url:"buscar_pagoinst_tec_not.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_pago").html(data);
        }
    });
}
function obtener_datos_pago_ano_tec_not(texto,texto2){
    $.ajax({
        url:"buscar_pagoinst_ano_tec_not.php",
        method:"POST",
        data: {texto: texto, texto2: texto2},
        success: function(data){
            $("#result_pago").html(data);
        }
    });
}
function obtener_datos_pago_ano_emp(texto, texto2){
    $.ajax({
        url:"buscar_pagoinst_ano_emp.php",
        method:"POST",
        data: {texto: texto, texto2: texto2},
        success: function(data){
            $("#result_pago").html(data);
        }
    });
}
function obtener_datos_pago_mes_ano_emp(texto, texto2, texto3){
    $.ajax({
        url:"buscar_pagoinst_mes_ano_emp.php",
        method:"POST",
        data: {texto: texto, texto2: texto2, texto3: texto3},
        success: function(data){
            $("#result_pago").html(data);
        }
    });
}
function obtener_datos_pago_mes_ano_tec_emp(texto, texto2, texto3, texto4){
    $.ajax({
        url:"buscar_pagoinst_mes_ano_tec_emp.php",
        method:"POST",
        data: {texto: texto, texto2: texto2, texto3: texto3, texto4: texto4},
        success: function(data){
            $("#result_pago").html(data);
        }
    });
}
function obtener_datos_pago_ano_tec_emp(texto,texto2,texto3){
    $.ajax({
        url:"buscar_pagoinst_ano_tec_emp.php",
        method:"POST",
        data: {texto: texto, texto2: texto2, texto3: texto3},
        success: function(data){
            $("#result_pago").html(data);
        }
    });
}
function obtener_datos_pago_tec_emp(texto,texto2){
    $.ajax({
        url:"buscar_pagoinst_tec_emp.php",
        method:"POST",
        data: {texto: texto, texto2: texto2},
        success: function(data){
            $("#result_pago").html(data);
        }
    });
}
function obtener_datos_pago_emp(texto){
    $.ajax({
        url:"buscar_pagoinst_emp.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_pago").html(data);
        }
    });
}
$("#pagoinsts").on("click",function(){
    obtener_datos_pago("");
});
$("#tabla_pago_filter").css({"display":"none"});

var controladorTiempo0 = "";

function buscador_pagoinstalaciones() {
    var buscar = $("input#input_pago").val();
    if (buscar == ""){
        $("input#input_pago").focus();
        obtener_datos_pago("");
    }else{
        obtener_datos_pago(buscar);
    }
}

$(document).on("keyup","#input_pago", function(){
    clearTimeout(controladorTiempo0);
    controladorTiempo0 = setTimeout(buscador_pagoinstalaciones, 220);
});
$(document).on("click","#ingresar_pago",function(){
    var nota = $('#nota_add').val();
    var manual = $('#manual').val();
    var control = $('#control_add').val();
    var reparacion = $('#reparacion_add').val();
    var motor = $('#motor_add').val();
    var mantencion = $('#mantencion_add').val();
    var tec = $('#tecnico_add').val();
    var traslado = $('#traslado_add').val();
    var roller = $('#roller_add').val();
    var varios = $('#varios_add').val();
    var valor_resp_nota, valor_resp_tec = 0;
    if (manual == '' || manual == null){
        manual = 0;
    }
    if (control == '' || control == null){
        control = 0;
    }
    if (reparacion == '' || reparacion == null){
        reparacion = 0;
    }
    if (motor == '' || motor == null){
        motor = 0;
    }
    if (mantencion == '' || mantencion == null){
        mantencion = 0;
    }
    if (traslado == '' || traslado == null){
        traslado = 0;
    }
    if (roller == '' || roller == null){
        roller = 0;
    }
    if (varios == '' || varios == null){
        varios = 0;
    }
    $.ajax({
        url: "consultar_notaventa_notaventa_existe.php",
        method: "POST",
        async:false,
        data: {id: nota},
        success: function(data){
            valor_resp_nota = parseInt(data);
               //$("#valor_notaventa").html(data);
        }
    });
    $.ajax({
        url: "consultar_notaventa_tecnico_existe.php",
        method: "POST",
        async:false,
        data: {id: nota, manual: manual, control: control, reparacion: reparacion, motor: motor, mantencion: mantencion, tecnico: tec, traslado: traslado, roller: roller, varios: varios},
        success: function(data){
            valor_resp_tec = parseInt(data);
               //$("#valor_notaventa").html(data);
        }
    });
    if ($('#nota_add').val().length == 0 && $('#manual').val().length == 0 && $('#control_add').val().length == 0 && $('#reparacion_add').val().length == 0 && $('#motor_add').val().length == 0 && $('#mantencion_add').val().length == 0 && $('#tecnico_add').val().length == 0 && $('#valor_add').val().length == 0 && $('#traslado_add').val().length == 0 && $('#roller_add').val().length == 0 && $('#varios_add').val().length == 0) {
        alert("Escriba los datos de Pago Instalación");
        $('#nota_add').focus();
        return false;
    }else{
        if ($('#nota_add').val().length == 0) {
            alert("Olvido escribir el Número de Nota Venta");
            $('#nota_add').focus();
            return false;
        /*}else if ($('#manual').val().length == 0) {
            alert("Falta escribir cantidad Manual");
            $('#manual').focus();
            return false;
        }else if ($('#control_add').val().length == 0) {
            alert("Falta escribir cantidad Control");
            $('#control_add').focus();
            return false;
        }else if ($('#reparacion_add').val().length == 0) {
            alert("Falta escribir cantidad Reparaciones");
            $('#reparacion_add').focus();
            return false;
        }else if ($('#motor_add').val().length == 0) {
            alert("Olvida escribir cantidad Motores");
            $('#motor_add').focus();
            return false;
        }else if ($('#mantencion_add').val().length == 0) {
            alert("Olvida escribir cantidad Mantenciones");
            $('#mantencion_add').focus();
            return false;
        }else if ($('#traslado_add').val().length == 0) {
            alert("Olvida escribir cantidad Traslado");
            $('#traslado_add').focus();
            return false;
        }else if ($('#roller_add').val().length == 0) {
            alert("Olvida escribir cantidad Roller");
            $('#roller_add').focus();
            return false;
        }else if ($('#varios_add').val().length == 0) {
            alert("Olvida escribir cantidad Varios");
            $('#varios_add').focus();
            return false;
        }else if ($('#tecnico_add').val().length == 0) {
            alert("Olvida escribir el Técnico");
            $('#tecnico_add').focus();
            return false;
        }else if ($('#valor_add').val().length == 0) {
            alert("Olvida escribir el Valor de Pago Instalación");
            $('#valor_add').focus();
            return false;*/
        }else{
            if (valor_resp_nota == 1){
                alert("Esta Nota de Venta no Existe");
                $("#nota_add").focus();
            }else if(valor_resp_tec == 1){
                alert("Estos Datos de Nota Venta ya están Ingresados");
                $("#nota_add").focus();
            }else{
                var nv= $("input#nota_add").val();
                var manual= $("input#manual").val();
                var control= $("input#control_add").val();
                var reparacion= $("input#reparacion_add").val();
                var motor= $("input#motor_add").val();
                var mantencion= $("input#mantencion_add").val();
                var tecnico= $("input#tecnico_add").val();
                var valor = $("input#valor_add").val();
                var fecha = $("#fecha_add").val();
                var traslado = $("#traslado_add").val();
                var roller = $("#roller_add").val();
                var varios = $("#varios_add").val();
                $.ajax({
                    url: "insertar_pago.php",
                    method: "POST",
                    data: {nv: nv, manual: manual, control: control, reparacion: reparacion, motor: motor, mantencion: mantencion, valor: valor, fecha: fecha, tecnico: tecnico, traslado: traslado, roller: roller, varios: varios},
                    success: function(data){
                        obtener_datos_pago("");
                        $(document).ready(function() {
                            $('#nota_add').val('');
                            $("#manual").val('');
                            $("input#control_add").val('');
                            $("input#reparacion_add").val('');
                            $("input#motor_add").val('');
                            $("input#mantencion_add").val('');
                            $("input#tecnico_add").val('');
                            $('#valor_add').val('');
                            $('#fecha_add').val('');
                            $('#traslado_add').val('');
                            $('#roller_add').val('');
                            $("#varios_add").val('');
                        });
                        alert(data);
                    }
                });
            }
        }
    }
});
$(document).on("click","#eliminar_pago",function(){
    if (confirm("¿Desea eliminar el Pago Instalación?")){
        var id = $(this).data("id_eliminar");
        $.ajax({
            url: "eliminar_pago.php",
            method: "POST",
            data: {id: id},
            success: function(data){
                var buscar = $("input#input_pago").val();
                if (buscar == ""){
                    obtener_datos_pago("");
                }else{
                    obtener_datos_pago(buscar);
                }
                alert(data);
            }
        });
    };
});
$(document).on("click","#filtrar_mes_ano",function(){
    var mes = $("#select_mes1").val();
    var ano = $("#select_ano1").val();
    var tec = $("#tecnico_seleccionado").val();
    var emp = $("#empresa_seleccionada").val();
    if(mes == '101' && ano == '234' && tec == '1' && emp == '1'){
        obtener_datos_pago("");
    }
    if(mes == '101' && ano != '234' && tec == '1' && emp == '1'){
        obtener_datos_pago_ano(ano);
    }
    if(mes != '101' && ano != '234' && tec == '1' && emp == '1'){
        obtener_datos_pago_mes_ano(mes,ano);
    }
    if(mes != '101' && ano != '234' && tec != '1' && emp == '1'){
        obtener_datos_pago_mes_ano_tec(mes,ano,tec);
    }
    if(mes == '101' && ano != '234' && tec != '1' && emp == '1'){
        obtener_datos_pago_ano_tec(ano,tec);
    }
    if(mes == '101' && ano == '234' && tec != '1' && emp == '1'){
        obtener_datos_pago_tec(tec);
    }
    if(mes == '101' && ano != '234' && tec == '1' && emp != '1'){
        obtener_datos_pago_ano_emp(ano,emp);
    }
    if(mes != '101' && ano != '234' && tec == '1' && emp != '1'){
        obtener_datos_pago_mes_ano_emp(mes,ano,emp);
    }
    if(mes != '101' && ano != '234' && tec != '1' && emp != '1'){
        obtener_datos_pago_mes_ano_tec_emp(mes,ano,tec,emp);
    }
    if(mes == '101' && ano != '234' && tec != '1' && emp != '1'){
        obtener_datos_pago_ano_tec_emp(ano,tec,emp);
    }
    if(mes == '101' && ano == '234' && tec != '1' && emp != '1'){
        obtener_datos_pago_tec_emp(tec,emp);
    }
    if(mes == '101' && ano == '234' && tec == '1' && emp != '1'){
        obtener_datos_pago_emp(emp);
    }
});
$(document).on("click","#filtrar_nota",function(){
    var mes = $("#select_mes1").val();
    var ano = $("#select_ano1").val();
    var tec = $("#tecnico_seleccionado").val();
    var emp = $("#empresa_seleccionada").val();
    if(mes == '101' && ano == '234' && tec == '1' && emp == '1'){
        obtener_datos_pago_not("");
    }
    if(mes == '101' && ano != '234' && tec == '1' && emp == '1'){
        obtener_datos_pago_ano_not(ano);
    }
    if(mes != '101' && ano != '234' && tec == '1' && emp == '1'){
        obtener_datos_pago_mes_ano_not(mes,ano);
    }
    if(mes != '101' && ano != '234' && tec != '1' && emp == '1'){
        obtener_datos_pago_mes_ano_tec_not(mes,ano,tec);
    }
    if(mes == '101' && ano != '234' && tec != '1' && emp == '1'){
        obtener_datos_pago_ano_tec_not(ano,tec);
    }
    if(mes == '101' && ano == '234' && tec != '1' && emp == '1'){
        obtener_datos_pago_tec_not(tec);
    }
    if(mes == '101' && ano != '234' && tec == '1' && emp != '1'){
        obtener_datos_pago_ano_emp(ano,emp);
    }
    if(mes != '101' && ano != '234' && tec == '1' && emp != '1'){
        obtener_datos_pago_mes_ano_emp(mes,ano,emp);
    }
    if(mes != '101' && ano != '234' && tec != '1' && emp != '1'){
        obtener_datos_pago_mes_ano_tec_emp(mes,ano,tec,emp);
    }
    if(mes == '101' && ano != '234' && tec != '1' && emp != '1'){
        obtener_datos_pago_ano_tec_emp(ano,tec,emp);
    }
    if(mes == '101' && ano == '234' && tec != '1' && emp != '1'){
        obtener_datos_pago_tec_emp(tec,emp);
    }
    if(mes == '101' && ano == '234' && tec == '1' && emp != '1'){
        obtener_datos_pago_emp(emp);
    }
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
