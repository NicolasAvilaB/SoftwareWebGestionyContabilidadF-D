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
@import url("vendedores.css");
</style>
<link href="vendedores.css" rel="stylesheet" type="text/css">
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
<label id="titulo2" class= "titulo2">Vendedores </label>
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
            <input type="submit" onclick="" id="vendedores00" name="vendedores" class="botones_barra" value="Vendedores">
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
	if(isset($_POST["vendedores00"])){
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
<button id="desplegar_item" class="dropbtn">Vendedores</button>
</div>
<div id="pestanas">
    <button id="vendedores" class="botones_pestanas_inabilitados_a" onclick="openPage('vendedor', this, 'white')">Vendedores</button>
    <button id="páginas" class="botones_pestanas_inabilitados_b" onclick="openPage('página', this, 'white')" >Páginas</button>
    <button id="tecnicos" class="botones_pestanas_inabilitados_c" onclick="openPage('tecnico', this, 'white')" >Técnicos</button>
    <!--<button id="inventarios" class="botones_pestanas_inabilitados_e" onclick="openPage('inventario', this, 'white')" >Inventario</button>-->
</div>
<div class="tablascroll">
<div id="vendedor" class="tabcontent">
        <button id="guardar_lama3">Guardar Vendedor</button>
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
    <p>&nbsp;</p>

    <div id="result_vend"></div>
</div>
<div id="página" class="tabcontent">
    <button id="guardar_lama4">Guardar Páginas</button><button id='boton_agregarfila4'>Agregar Fila</button>
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
<div id="tecnico" class="tabcontent">
    <button id="guardar_tecnico">Guardar Técnico</button>
    <button id='boton_agregarfila_tecnico'>Agregar Fila</button>
    <br></br>
    <input list="lista_tecnico" type="text" class="input_cliente" id="input_tecnico" name="input_tecnico" placeholder="Buscar Registro..." size="30" maxlength="70" autocomplete="off"/>
    <?php
        $conexion000 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
        mysqli_set_charset($conexion000,"utf8");
        $ejecutar000 = mysqli_query($conexion000,"SELECT Instalador FROM Instaladores");
    ?>
    <datalist id="lista_tecnico">
        <?php while ($row000 = mysqli_fetch_array($ejecutar000)) {?>
            <option><?php echo $row000[0];?></option>
        <?php } ?>
    </datalist>
    <div id="result_tecnico"></div>
    <br></br>
</div>
<div id="inventario" class="tabcontent">
  <div id="seccion_factura">
      <label><strong>&nbsp;&nbsp;Fecha Factura:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><input type="date" class="grid-item" id="fechafactura_add" name="fechafactura_add" min='2005-01-01' max='2100-12-31' placeholder="Fecha Factura..." size="30" maxlength="70" autocomplete="off" /></label>
      <p></p>
      <label><strong>&nbsp;&nbsp;N° Factura:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><input type="text" class="grid-item" id="nfactura_add" name="nfactura_add" placeholder="N° Factura..." size="30" maxlength="70" autocomplete="off" /></label>
      <p></p>
      <label><strong>&nbsp;&nbsp;Técnico:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
      <?php
          $conexion223 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
          mysqli_set_charset($conexion223,"utf8");
          $ejecutar223 = mysqli_query($conexion223,"select Instalador from Instaladores where Estado = 'Desactivar'");
          mysqli_set_charset($conexion223,"utf8");
      ?>
      <select class='tecnico_add' id='tecnico_add' name='tecnico_add'>
      <option value='0' disabled selected>Seleccione Técnico...</option>
      <?php
          while ($row223 = mysqli_fetch_array($ejecutar223)) {
              $valor_nombre_emp = $row223[0];
              echo "<option value='$valor_nombre_emp'>".$valor_nombre_emp."</option>";
          }
      ?>
      </select>
    </label>
      <p></p>
      <label><strong>&nbsp;&nbsp;Valor Factura:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><input type="text" class="grid-item" id="valorfactura_add" name="valorfactura_add" placeholder="Valor Factura..." size="30" maxlength="70" autocomplete="off" /></label>
      <p></p>
      <button id="ingresar_factura" class="boton_ingresar_factura">Ingresar Factura</button>
  </div>
  <div id="seccion_productos">
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
      <button id="guardar_cant_prod" class="boton_ingresar_cant_prod">Guardar Producto</button>
      <div id="result_productos"></div>
  </div>

  <br></br>
  <br></br>
  <br></br>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <input list="lista_factura" type="text" class="input_factura" id="input_factura" name="input_factura" placeholder="Buscar Factura..." size="30" maxlength="70" style="text-align:center;" autocomplete="off"/>
  <p></p>
  <div id="result_inventario"></div>
  <br></br>
</div>
<script>
function openPage(pageName,elmnt,color) {
    var i, tabcontent, tablinks, tablinks1,tablinks2;
    //,tablinks3;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("botones_pestanas_inabilitados_a");
    tablinks1 = document.getElementsByClassName("botones_pestanas_inabilitados_b");
    tablinks2 = document.getElementsByClassName("botones_pestanas_inabilitados_c");
    //tablinks3 = document.getElementsByClassName("botones_pestanas_inabilitados_e");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
        tablinks1[i].style.backgroundColor = "";
        tablinks2[i].style.backgroundColor = "";
        //tablinks3[i].style.backgroundColor = "";
    }
    $("#"+pageName).css("display", "block");
    elmnt.style.backgroundColor = color;
}
$("#vendedores").trigger('click');
</script>
<script>
function obtener_datos(texto){
    $.ajax({
        url:"buscar_vendedores.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_vend").html(data)
        }
    })
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
})
$(document).on("click","#guardar_lama3",function(){
    $('#accion3 tbody tr').each(function () {
        var rut= $(this).find('td').eq(0).html();
        var nombre = $(this).find('td').eq(1).html();
        var usuario= $(this).find('td').eq(2).html();
        var clave = $(this).find('td').eq(3).html();
        if ($(this).find('td:nth-child(5)').find('select').length){
            var empresa= $(this).find('td:nth-child(5)').find('select').val();
        }else if ($(this).find('td:nth-child(5)').find('input').length){
            var empresa= $(this).find('td:nth-child(5)').find('input').val();
        }
        var email = $(this).find('td').eq(5).html();
        var color = $(this).find('td:nth-child(7)').find('input').val();
        $.ajax({
            url: "insertar_vendedor.php",
            method: "POST",
            data: {rut: rut, nombre: nombre, usuario: usuario, clave: clave, empresa: empresa, email: email, color: color},
            success: function(data){}
        });
    });
    obtener_datos("");
    obtener_datos("");
    alert("Vendedores ingresados exitosamente");
    obtener_datos("");
});
$(document).on("click","#eliminar",function(){
    if (confirm("¿Desea eliminar el Vendedor?")){
        var id = $(this).data("id_eliminar");
        $.ajax({
            url: "eliminar_vendedor.php",
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
        })
    };
})
$(document).on("click","#boton_agregarfila3",function(){
    var table = document.getElementById("agregar_fila");
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
    cell5.innerHTML = "<input list='lista_empresas' class='empresa_add1' id='empresa_add1' name='empresa_add1' type='text' style='text-align:center' placeholder='Ingrese y/o Busque Empresas...' size='30' maxlength='105' autocomplete='off'/>";
    cell6.innerHTML = "";
    cell6.setAttribute('contentEditable', 'true');
    cell7.innerHTML = "<input type='color' />";
    cell7.setAttribute('contentEditable', 'true');
});
</script>
<script>
function obtener_datos_otro(texto){
    $.ajax({
        url:"buscar_paginas.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_otro").html(data)
        }
    })
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
})
$(document).on("click","#guardar_lama4",function(){
    $('#accion4 tbody tr').each(function () {
        var id= $(this).find('td').eq(0).html();
        var acc= $(this).find('td').eq(1).html();
        var web= $(this).find('td').eq(2).html();
        var correo= $(this).find('td').eq(3).html();
        var telefono= $(this).find('td').eq(4).html();
        var rut= $(this).find('td').eq(5).html();
        var nm= $(this).find('td').eq(6).html();
        var sub_cot= $(this).find('td').eq(7).html();
        if (acc == ""){
            alert("Agrege Páginas a la tabla");
        }
        else{
            $.ajax({
                url: "insertar_paginas.php",
                method: "POST",
                data: {id: id, acc: acc, web: web, correo: correo, telefono: telefono, rut: rut, nm: nm, sub_cot: sub_cot},
                success: function(data){}
            })
        }
    });
    obtener_datos_otro("");
    obtener_datos_otro("");
    alert("Páginas ingresados exitosamente");
    obtener_datos_otro("");
});
$(document).on("click","#boton_agregarfila4",function(){
    var table = document.getElementById("agregar_fila_otro");
    var row = table.insertRow();
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);
    var cell7 = row.insertCell(6);
    var cell8 = row.insertCell(7);
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
    cell7.innerHTML = "";
    cell7.setAttribute('contentEditable', 'true');
    cell8.innerHTML = "";
    cell8.setAttribute('contentEditable', 'true');
});
$(document).on("click","#eliminar_pagina",function(){
    if (confirm("¿Desea eliminar la Página?")){
        var id = $(this).data("id_eliminar_pagina");
        $.ajax({
            url: "eliminar_paginas.php",
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
function obtener_datos_tecnicos(texto){
    $.ajax({
        url:"buscar_tecnicos.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_tecnico").html(data);
        }
    })
}
$("#técnicos").on("click",function(){
    obtener_datos_tecnicos("");
});
obtener_datos_tecnicos("");
function verificar_buscar_tecnico(){
    var buscar = $("input#input_tecnico").val();
    if (buscar == ""){
        obtener_datos_tecnicos("");
    }else{
        obtener_datos_tecnicos(buscar);
    }
}

$(document).on("click","#guardar_tecnico",function(){
    $('#accion_tecnico tbody tr').each(function () {
        var id= $(this).find('td').eq(0).html();
        if ($(this).find('td:nth-child(2)').find('select').length){
            var nom= $(this).find('td:nth-child(2)').find('select').val();
        }else if ($(this).find('td:nth-child(2)').find('input').length){
            var nom= $(this).find('td:nth-child(2)').find('input').val();
        }
        var usu= $(this).find('td').eq(2).html();
        var cla= $(this).find('td').eq(3).html();
        if (nom == ""){
            alert("Agrege Técnico a la tabla");
        }
        else{
            $.ajax({
                url: "insertar_tecnicos.php",
                method: "POST",
                data: {id: id, nom: nom, usu: usu, cla: cla},
                success: function(data){}
            });
        }
    });
    obtener_datos_tecnicos("");
    obtener_datos_tecnicos("");
    alert("Técnicos ingresados exitosamente");
    obtener_datos_tecnicos("");
});

$(document).on("click","#estado_tecnico",function(){
    if (confirm("¿Desea cambiar el estado de este Registro?")){
        var id = $(this).data("id_estado");
        var es = $(this).data("estado");
        $.ajax({
            url: "eliminar_estado.php",
            method: "POST",
            data: {id: id, es: es},
            success: function(data){
                obtener_datos_tecnicos("");
                alert(data);
            }
        })
    };
});

$(document).on("click","#estadoinventario_tecnico",function(){
    if (confirm("¿Desea cambiar el estado del Inventario de este Registro?")){
        var id = $(this).data("id_estado_inventario");
        var es = $(this).data("estado_inventario");
        $.ajax({
            url: "eliminar_estado_inventario.php",
            method: "POST",
            data: {id: id, es: es},
            success: function(data){
                obtener_datos_tecnicos("");
                alert(data);
            }
        })
    };
});

$(document).on("click","#eliminar_tecnico",function(){
    if (confirm("¿Desea eliminar el Técnico?")){
        var id = $(this).data("id_eliminar_tecnico");
        $.ajax({
            url: "eliminar_tecnico.php",
            method: "POST",
            data: {id: id},
            success: function(data){
                verificar_buscar_tecnico();
                alert(data);
            }
        });
    };
});
$(document).on("click","#boton_agregarfila_tecnico",function(){
    var table = document.getElementById("agregar_fila_tecnico");
    var row = table.insertRow();
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    cell1.innerHTML = "";
    cell2.innerHTML = "<input list='lista_tecnico' class='nombre_tecnico' id='nombre_tecnicol' name='nombre_tecnicol' type='text' style='text-align:center' placeholder='Busque Técnico...' size='30' maxlength='105' autocomplete='off'/>";
    cell3.innerHTML = "";
    cell3.setAttribute('contentEditable', 'true');
    cell4.innerHTML = "";
    cell4.setAttribute('contentEditable', 'true');
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
<script>
function obtener_datos_inventario(texto){
    $.ajax({
        url:"buscar_inventario.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_inventario").html(data);
        }
    });
}
$("#inventarios").on("click",function(){
    obtener_datos_inventario("");
});
obtener_datos_inventario("");

function obtener_datos_producto(texto){
    $.ajax({
        url:"buscar_producto.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_productos").html(data);
        }
    });
}

function verificar_buscar_inventario(){
    var buscar = $("input#input_factura").val();
    if (buscar == ""){
        obtener_datos_inventario("");
    }else{
        obtener_datos_inventario(buscar);
    }
}
$(document).on("change","#nombre_rect", function(){
    obtener_datos_producto($("#nombre_rect").val());
});
$(document).on("keyup","#input_factura", function(){
    verificar_buscar_inventario();
});
$(document).on("click","#ingresar_factura",function(){
        if ($('#fechafactura_add').val().length == 0 && $('#nfactura_add').val().length == 0 && $('#tecnico_add').val().length == 0 && $('#valorfactura_add').val().length == 0) {
                alert("Escriba los datos de la Factura");
                $('#fechafactura_add').focus();
                return false;
        }else{
            if ($('#fechafactura_add').val().length == 0) {
                alert("Olvido escribir la Fecha de la Factura");
                $('#fechafactura_add').focus();
                return false;
            }else if ($('#nfactura_add').val().length == 0) {
                alert("Falta escribir el Número de la Factura");
                $('#nfactura_add').focus();
                return false;
            }else if ($('#tecnico_add').val().length == 0) {
                alert("Faltó seleccionar al Técnico");
                $('#tecnico_add').focus();
                return false;
            }else if ($('#tecnico_add').val().length == 0) {
                alert("Faltó seleccionar al Técnico");
                $('#tecnico_add').focus();
                return false;
            }else{
                var fecha= $("#fechafactura_add").val();
                var nfactura= $("#nfactura_add").val();
                var tecnico= $("#tecnico_add").val();
                var valor= $("#valorfactura_add").val();
                $.ajax({
                    url: "insertar_inventario.php",
                    method: "POST",
                    data: {fecha: fecha, nfactura: nfactura, tecnico: tecnico, valor: valor},
                    success: function(data){
                        $("#fechafactura_add").val("");
                        $("#nfactura_add").val("");
                        $("#tecnico_add").val('0');
                        $("#valorfactura_add").val("");
                    }
                });
            }
        }
    obtener_datos_inventario("");
    obtener_datos_inventario("");
    alert("Inventario ingresados exitosamente");
    obtener_datos_inventario("");
});
$(document).on("click","#eliminar_inventario",function(){
    if (confirm("¿Desea eliminar la Factura del Inventario?")){
        var id = $(this).data("id_eliminar_inventario");
        $.ajax({
            url: "eliminar_inventario.php",
            method: "POST",
            data: {id: id},
            success: function(data){
                verificar_buscar_inventario();
                alert(data);
            }
        });
    };
});
$(document).on("click","#modificar_inventario",function(){
    var row = $(this).parent().parent();
    var id= $(row).find('td').eq(0).html();
    var fecha= $(row).find('td:nth-child(2)').find('input').val();
    var factura= $(row).find('td').eq(2).html();
    var tecnico= $(row).find('td:nth-child(4)').find('select').val();
    var valor= $(row).find('td').eq(4).html();
    $.ajax({
        url: "modificar_inventario.php",
        method: "POST",
        data: {fecha: fecha, factura: factura, tecnico: tecnico, valor: valor, id: id},
        success: function(data){}
    });
    obtener_datos_inventario("");
    obtener_datos_inventario("");
    alert("Se ha modificado la Factura del Inventario");
    obtener_datos_inventario("");
});
$(document).on("click","#guardar_cant_prod",function(){
    $('#accion_producto_cantidad tbody tr').each(function () {
        var cant= $(this).find('td').eq(2).html();
        var id= $(this).find('td').eq(0).html();
        $.ajax({
            url: "modificar_producto.php",
            method: "POST",
            data: {cant: cant, id: id},
            success: function(data){}
        });
    });
    obtener_datos_producto($("#nombre_rect").val());
    obtener_datos_producto($("#nombre_rect").val());
    alert("Cantidad Modificada exitosamente");
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
