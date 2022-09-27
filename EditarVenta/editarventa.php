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
@import url("editarventa.css");
</style>
<link href="editarventa.css" rel="stylesheet" type="text/css">
<script src="https://www.w3schools.com/lib/w3.js"></script>
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $('#tabla_clientes2').DataTable();
    $('#tabla_persianas').DataTable();
    $('#tabla_roller').DataTable();
    $('#tabla_repuesto').DataTable();
    $('#tabla_otro').DataTable();
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
<label id="titulo2" class= "titulo2">Editar Detalle Venta</label>
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
            <input type="submit" onclick="" id="vendedores00" name="vendedores00" class="botones_barra" value="Vendedores">
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
<button id="desplegar_item" class="dropbtn">Editar Venta</button>
</div>
<div id="pestanas">
    <button id="vendedores" class="botones_pestanas_inabilitados_a" onclick="openPage('vendedor', this, 'white')">Fecha Ventas</button>
    <button id="descuentos" class="botones_pestanas_inabilitados_b" onclick="openPage('descuento', this, 'white')">Descuento</button>
    <button id="páginas" class="botones_pestanas_inabilitados_e" onclick="openPage('página', this, 'white')">Abonos</button>
    <button id="detalles" class="botones_pestanas_inabilitados_f" onclick="openPage('detalle', this, 'white')" >Detalle Venta</button>
    <button id="descuentosventa" class="botones_pestanas_inabilitados_h" onclick="openPage('descuentoventa', this, 'white')">Descuento Venta</button>
</div>
<div class="tablascroll">
<div id="vendedor" class="tabcontent">
    <button id="guardar_lama3">Modificar Datos Venta</button>
    <input list="lista_clientes" type="text" class="input_cliente" id="input_rep" name="input_rep" placeholder="Buscar Registro..." size="30" maxlength="70" autocomplete="off"/>
    <br></br>
    <input type="text" id="buscar_venta" name="buscar_venta" placeholder="Buscar N° Venta..." style="text-align:center;width:150px;" size="30" maxlength="70" autocomplete="off"/>
    <input type="text" id="buscar_tecnico" name="buscar_tecnico" placeholder="Buscar Técnico..." style="text-align:center;width:130px;" size="30" maxlength="70" autocomplete="off"/>
    <input type="text" id="buscar_rectificador" name="buscar_rectificador" placeholder="Buscar Rectificador..." style="text-align:center;width:130px;" size="30" maxlength="70" autocomplete="off"/>
    <input type="date" id="buscar_fefab" name="buscar_fefab" placeholder="Buscar Fecha Fabricación..." style="text-align:center;width:130px;" size="30" maxlength="70" autocomplete="off"/>
    <input type="date" id="buscar_feins" name="buscar_feins" placeholder="Buscar Fecha Instalación..." style="text-align:center;width:130px;" size="30" maxlength="70" autocomplete="off"/>
    <input type="date" id="buscar_feefect" name="buscar_feefect" placeholder="Buscar Fecha Efectuada..." style="text-align:center;width:130px;" size="30" maxlength="70" autocomplete="off"/>
    <input type="text" id="buscar_vendedora" name="buscar_vendedora" placeholder="Buscar Vendedora..." style="text-align:center;width:130px;" size="30" maxlength="70" autocomplete="off"/>
    <input type="text" id="buscar_distribuidor" name="buscar_distribuidor" placeholder="Buscar Distribuidor..." style="text-align:center;width:130px;" size="30" maxlength="70" autocomplete="off"/>
    <div id="result_vend"></div>
    <br></br>
</div>
<div id="página" class="tabcontent">
    <button id="guardar_lama4">Modificar Datos Abonos</button>
    <input list="lista_clientes2" type="text" class="input_cliente" id="input_otro" name="input_otro" placeholder="Buscar Registro..." size="30" maxlength="70" autocomplete="off"/>
    <br></br>
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
    <?php } ?>
    </select>
    <div id="result_otro"></div>
    <br></br>
</div>
<div id="descuento" class="tabcontent">
    <table id="desc_notaventa" style="width:300px;">
        <thead>
        <tr>
            <th>Nota Venta</th>
            <th>Valor</th>
            <th>Observación</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td contenteditable>0</td>
                <td contenteditable>0</td>
                <td contenteditable></td>
            </tr>
        </tbody>
    </table>
    <br></br>
    <button id="ingresar_desc_notaventa">Ingresar</button>
    <br></br>
    <hr style="color:#cecece;"></hr>
    <p>&nbsp;</p>
    <input list="lista_clientes2" type="text" class="input_cliente" id="input_desc" name="input_otro" placeholder="Buscar Registro..." size="30" maxlength="70" autocomplete="off"/>
    <div id="result_desc"></div>
    <br></br>
</div>
<div id="detalle" class="tabcontent">
    <input type="text" class="input_cliente" id="input_venta" name="input_venta" placeholder="Buscar Registro..." size="30" maxlength="70" autocomplete="off"/>
    <br></br>
    <div id="result_venta"></div>
    <br></br>
</div>
<div id="descuentoventa" class="tabcontent">
    <input type="text" class="input_cliente" id="input_descuentoventa" name="input_venta" placeholder="Buscar Registro..." size="30" maxlength="70" autocomplete="off"/>
    <br></br>
    <div id="result_descuentoventa"></div>
    <br></br>
</div>
<?php
    $conexion_ti = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
    mysqli_set_charset($conexion_ti,"utf8");
    $ejecutar_ti = mysqli_query($conexion_ti,"select NombreOtros from Otros where Estado = 'Desactivar' and Apar_Inicio ='Si'");
    mysqli_set_charset($conexion_ti,"utf8");
?>
<datalist id="lista_tipos">
  <option>Instalación</option>
<?php while ($row = mysqli_fetch_array($ejecutar_ti)) {  ?>
    <option><?php echo $row[0] ?></option>
<?php } mysqli_close($conexion_ti);?>
</datalist>
<script>
function openPage(pageName,elmnt,color) {
    var i, tabcontent, tablinks, tablinks1, tablinks2;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
        tablinks = document.getElementsByClassName("botones_pestanas_inabilitados_a");
        tablinks0 = document.getElementsByClassName("botones_pestanas_inabilitados_b");
        tablinks1 = document.getElementsByClassName("botones_pestanas_inabilitados_e");
        tablinks2 = document.getElementsByClassName("botones_pestanas_inabilitados_f");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
        tablinks0[i].style.backgroundColor = "";
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
        url:"buscar_vendedores.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_vend").html(data)
        }
    });
}
function obtener_datos_todo(){
    $.ajax({
        url:"buscar_todo_fecha.php",
        method:"POST",
        success: function(data){
            $("#result_vend").html(data)
        }
    });
}
obtener_datos_todo();
var controladorTiempo9 = "";
function buscar_editar_fecha_ventaadmin(){
    if ($('input#input_rep').val().length <= 0){
        $("input#input_rep").focus();
        obtener_datos_venta("vacio");
    }else if ($('input#input_rep').val().length >= 1){
        obtener_datos_venta($("input#input_rep").val());
    }
}
$(document).on("keyup","#input_rep", function(){
    clearTimeout(controladorTiempo9);
    controladorTiempo9 = setTimeout(buscar_editar_fecha_ventaadmin, 220);
});
$(document).on("click","#guardar_lama3",function(){
    $('#tabla_clientes tbody tr').each(function () {
        var id=$(this).find('td').eq(0).html();
        var tecnico = $(this).find('td:nth-child(2)').find('input').val();
        var rectificador= $(this).find('td:nth-child(3)').find('input').val();
        var fabricacion = $(this).find('td:nth-child(4)').find('input').val();
        var instalacion = $(this).find('td:nth-child(5)').find('input').val();
        var efectuada = $(this).find('td:nth-child(6)').find('input').val();
        var vendedora = $(this).find('td:nth-child(7)').find('input').val();
        var distribuidor=$(this).find('td').eq(7).html();
        var fechaventa = $(this).find('td:nth-child(9)').find('input').val();
        var tot=$(this).find('td').eq(9).html();
        var tipo_inicio = $(this).find('td:nth-child(12)').find('select').val();
        var horario = $(this).find('td:nth-child(13)').find('select').val();
        var cliente = $(this).find('td').eq(13).html();
        var horariobloquear = $(this).find('td:nth-child(13)').find('select').val();
        if(horariobloquear == '0' || horariobloquear == null){
        }else{
            $.ajax({
                url: "bloquear_dias_horario_calendario.php",
                method: "POST",
                data: {fecha_inst: instalacion, tecnico: tecnico, horario: horariobloquear},
                success: function(data){}
            });
        }
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
            data: {id: id, fecha_ins: instalacion},
            success: function(data){}
        });
        if (horariobloquear == '0'|| horariobloquear == null){
            horariobloquear = "";
        }
        if($(this).css('display') == 'none'){
        }else{
            $.ajax({
                url: "modificar_fechas.php",
                method: "POST",
                data: {id: id, tecnico: tecnico, rectificador: rectificador, fabricacion: fabricacion, instalacion: instalacion, efectuada: efectuada, vendedora: vendedora, distribuidor: distribuidor, fechaventa: fechaventa, tot: tot, horario: horario, tipoinicio: tipo_inicio, cliente: cliente},
                success: function(data){
                }
            });
        }
        var contti = $(this).find('td:nth-child(12)').find('#contador_tipo').text();
        if (contti == '0' || contti == 0){
        }else{
            $("input[name='input_tipo[]']").each(function(indice, elemento) {
                var elemento_tipo = $(elemento).val();
                $.ajax({
                    url: "ingresar_multiples_tipos.php",
                    method: "POST",
                    data: {fecha_insta: instalacion, instalador: tecnico, id: id, tipoinicio: elemento_tipo, cliente: cliente},
                    success: function(data){
                    }
                });
            });
        }
        if ($(this).find('td:nth-child(12)').find("input[name='input_tipo_usado[]']").length){
            $("input[name='input_tipo_usado[]']").each(function(indice, elemento) {
                var elemento_tipo = $(elemento).val();
                var tipo_input = $(this).data("tipo_input");
                $.ajax({
                    url: "modificar_multiple_tipos.php",
                    method: "POST",
                    data: {id: id, tipoinicio: elemento_tipo, tipoinput: tipo_input, instalador: tecnico, fecha_insta: efectuada},
                    success: function(data){
                    }
                });
            });
        }else{}
    });
    alert("Se ha modificado los datos");
    obtener_datos_todo();
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
    cell5.innerHTML = "<input list='lista_empresas' class='empresa_add' id='empresa_add' name='empresa_add' type='text' style='text-align:center' placeholder='Ingrese y/o Busque Empresas...' size='30' maxlength='105' autocomplete='off'/>";
    cell5.setAttribute('contentEditable', 'true');
    cell6.innerHTML = "";
    cell6.setAttribute('contentEditable', 'true');
    cell7.innerHTML = "";
    cell7.setAttribute('contentEditable', 'true');
});
var controladorTiempo = "";
function obtener_datos_venta(texto){
    $.ajax({
        url:"buscar_vendedores_venta.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_vend").html(data)
        }
    });
}
function obtener_datos_tecnico(texto){
    $.ajax({
        url:"buscar_vendedores_tecnico.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_vend").html(data)
        }
    });
}
function obtener_datos_rectificador(texto){
    $.ajax({
        url:"buscar_vendedores_rectificador.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_vend").html(data)
        }
    });
}
function obtener_datos_fecha_fabricacion(texto){
    $.ajax({
        url:"buscar_vendedores_fecha_fabricacion.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_vend").html(data)
        }
    });
}
function obtener_datos_fecha_inst(texto){
    $.ajax({
        url:"buscar_vendedores_fecha_inst.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_vend").html(data)
        }
    });
}
function obtener_datos_fecha_efect(texto){
    $.ajax({
        url:"buscar_vendedores_fecha_efect.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_vend").html(data)
        }
    });
}
function obtener_datos_vendedora(texto){
    $.ajax({
        url:"buscar_vendedores_vendedora.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_vend").html(data)
        }
    });
}
function obtener_datos_distribuidor(texto){
    $.ajax({
        url:"buscar_vendedores_distribuidor.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_vend").html(data)
        }
    });
}

$(document).on("keyup","#buscar_venta", function(){
    if ($('input#buscar_venta').val().length <= 0){
        $("input#buscar_venta").focus();
        obtener_datos_venta("vacio");
    }else if ($('input#buscar_venta').val().length >= 1){
        clearTimeout(controladorTiempo);
        controladorTiempo = setTimeout(obtener_datos_venta($("input#buscar_venta").val()), 250);
    }
});
$(document).on("keyup","#buscar_tecnico", function(){
    if ($('input#buscar_tecnico').val().length <= 2){
        $("input#buscar_tecnico").focus();
        obtener_datos_tecnico("vacio");
    }else if ($('input#buscar_tecnico').val().length >= 3){
        clearTimeout(controladorTiempo);
        controladorTiempo = setTimeout(obtener_datos_tecnico($("input#buscar_tecnico").val()), 250);
    }
});
$(document).on("keyup","#buscar_rectificador", function(){
    if ($('input#buscar_rectificador').val().length <= 2){
        $("input#buscar_rectificador").focus();
        obtener_datos_rectificador("vacio");
    }else if ($('input#buscar_rectificador').val().length >= 3){
        clearTimeout(controladorTiempo);
        controladorTiempo = setTimeout(obtener_datos_rectificador($("input#buscar_rectificador").val()), 250);
    }
});
$(document).on("keyup","#buscar_fefab", function(){
    if ($('input#buscar_fefab').val().length <= 2){
        $("input#buscar_fefab").focus();
        obtener_datos_fecha_fabricacion("vacio");
    }else if ($('input#buscar_fefab').val().length >= 3){
        clearTimeout(controladorTiempo);
        controladorTiempo = setTimeout(obtener_datos_fecha_fabricacion($("input#buscar_fefab").val()), 250);
    }
});
$(document).on("keyup","#buscar_feins", function(){
    if ($('input#buscar_feins').val().length <= 2){
        $("input#buscar_feins").focus();
        obtener_datos_fecha_inst("vacio");
    }else if ($('input#buscar_feins').val().length >= 3){
        clearTimeout(controladorTiempo);
        controladorTiempo = setTimeout(obtener_datos_fecha_inst($("input#buscar_feins").val()), 250);
    }
});
$(document).on("keyup","#buscar_feefect", function(){
    if ($('input#buscar_feefect').val().length <= 2){
        $("input#buscar_feefect").focus();
        obtener_datos_fecha_efect("vacio");
    }else if ($('input#buscar_feefect').val().length >= 3){
        clearTimeout(controladorTiempo);
        controladorTiempo = setTimeout(obtener_datos_fecha_efect($("input#buscar_feefect").val()), 250);
    }
});
$(document).on("keyup","#buscar_vendedora", function(){
    if ($('input#buscar_vendedora').val().length <= 2){
        $("input#buscar_vendedora").focus();
        obtener_datos_vendedora("vacio");
    }else if ($('input#buscar_vendedora').val().length >= 3){
        clearTimeout(controladorTiempo);
        controladorTiempo = setTimeout(obtener_datos_vendedora($("input#buscar_vendedora").val()), 250);
    }
});
$(document).on("keyup","#buscar_distribuidor", function(){
    if ($('input#buscar_distribuidor').val().length <= 2){
        $("input#buscar_distribuidor").focus();
        obtener_datos_distribuidor("vacio");
    }else if ($('input#buscar_distribuidor').val().length >= 3){
        clearTimeout(controladorTiempo);
        controladorTiempo = setTimeout(obtener_datos_distribuidor($("input#buscar_distribuidor").val()), 250);
    }
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
function obtener_datos_otro_todo(texto){
    $.ajax({
        url:"buscar_todo_abono.php",
        method:"POST",
        success: function(data){
            $("#result_otro").html(data)
        }
    })
}
function obtener_datos_descuentos_todo(texto){
    $.ajax({
        url:"buscar_todo_descuento.php",
        method:"POST",
        success: function(data){
            $("#result_desc").html(data)
        }
    })
}
function obtener_datos_descuentos(texto){
    $.ajax({
        url:"buscar_descuento.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_desc").html(data)
        }
    })
}
var valor_abono_1 = 0;
$("#páginas").on("click",function(){
    obtener_datos_otro_todo();
});
$("#descuentos").on("click",function(){
    obtener_datos_descuentos_todo();
});
$(document).on("keyup","#input_desc", function(){
    var buscar = $("input#input_desc").val();
    if (buscar == ""){
        $("input#input_desc").focus();
        obtener_datos_descuentos_todo("");
    }else{
        obtener_datos_descuentos(buscar);
    }
});
function consulta_descuento_filtro_sin_filtro(){
    var buscar = $("input#input_desc").val();
    if (buscar == ""){
        obtener_datos_descuentos_todo("");
    }else{
        obtener_datos_descuentos(buscar);
    }
}
$(document).on("click","#eliminar_descuento",function(){
    if (confirm("¿Desea eliminar el Descuento?")){
        var id = $(this).data("id_eliminar_descuento");
        var idnota = $(this).data("idnota_eliminar_descuento");
        var valor = $(this).data("valor_eliminar_descuento");
        $.ajax({
            url: "eliminar_descuento.php",
            method: "POST",
            data: {id: id, idnota: idnota, valor: valor},
            success: function(data){
                consulta_descuento_filtro_sin_filtro();
                alert(data);
            }
        })
    };
});
$(document).on("click","#ingresar_desc_notaventa",function(){
    var valor_consulta = 0;
    $('#desc_notaventa tbody tr').each(function () {
        var a= $(this).find('td').eq(0).html();
        var b= $(this).find('td').eq(1).html();
        var c= $(this).find('td').eq(2).html();
        $.ajax({
            url: "buscar_descnota.php",
            method: "POST",
            async:false,
            data: {nota: a},
            success: function(data){
                valor_consulta = data;
            }
        });
        if (valor_consulta == 0 || valor_consulta == '0'){
            $.ajax({
                url: "insertar_descuento.php",
                method: "POST",
                data: {id: a, valor: b, ob: c},
                success: function(data){}
            });
            alert("Descuento ingresado exitosamente");
            $('#desc_notaventa tbody tr').find('td').eq(0).html('0');
            $('#desc_notaventa tbody tr').find('td').eq(1).html('0');
            $('#desc_notaventa tbody tr').find('td').eq(2).html('');
        }else if (valor_consulta == 1 || valor_consulta == '1'){
            alert("El Descuento ya existe para este Número de Nota Venta");
            $('#desc_notaventa tbody tr').find('td').eq(0).html('0');
            $('#desc_notaventa tbody tr').find('td').eq(1).html('0');
            $('#desc_notaventa tbody tr').find('td').eq(2).html('');
        }
    });
    consulta_descuento_filtro_sin_filtro();
});

var controladorTiempo12 = "";

function buscar_abono_venta_admin(){
    var buscar = $("input#input_otro").val();
    if (buscar == ""){
        $("input#input_otro").focus();
        obtener_datos_otro("");
    }else{
        obtener_datos_otro(buscar);
    }
}

$(document).on("keyup","#input_otro", function(){
    clearTimeout(controladorTiempo12);
    controladorTiempo12 = setTimeout(buscar_abono_venta_admin, 220);

});
function arreglar_abono(){
    var no_1 = 0;
    $('#tabla_clientes2 tbody tr').each(function () {
        var id=$(this).find('td').eq(0).html();
        var idnota=$(this).find('td').eq(1).html();
        var fechapago = $(this).find('td:nth-child(3)').find('input').val();
        var abono= $(this).find('td').eq(3).html();
        var mediopago = $(this).find('td:nth-child(5)').find('input').val();
        if (no_1 == idnota){
        }else if (no_1 != idnota){
            $.ajax({
                url: "modificar_notaventa_abono0.php",
                method: "POST",
                data: {idnota: idnota},
                success: function(data){}
            });
        }
        $.ajax({
            url: "modificar_abonos.php",
            method: "POST",
            data: {id: id, fechapago: fechapago, abono: abono, mediopago: mediopago, idnota: idnota},
            success: function(data){}
        });
        no_1 = idnota;
    });
    obtener_datos_otro_todo();
}
$(document).on("click","#guardar_lama4",function(){
    arreglar_abono();
    alert("Se ha modificado los datos");
});
$(document).on("click","#boton_agregarfila4",function(){
    var table = document.getElementById("agregar_fila_otro");
    var row = table.insertRow();
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    cell1.innerHTML = "";
    cell2.innerHTML = "";
    cell2.setAttribute('contentEditable', 'true');
    cell3.innerHTML = "";
    cell3.setAttribute('contentEditable', 'true');
    cell4.innerHTML = "";
    cell4.setAttribute('contentEditable', 'true');
    cell5.innerHTML = "";
    cell5.setAttribute('contentEditable', 'true');
});
$(document).on("click","#eliminar_pagina",function(){
    if (confirm("¿Desea eliminar este Abono?")){
        var id = $(this).data("id_eliminar_pagina");
        var ntv = $(this).data("notaventa");
        var val = $(this).data("valor");
        $.ajax({
            url: "eliminar_paginas.php",
            method: "POST",
            data: {id: id, ntv: ntv, val: val},
            success: function(data){
                var buscar = $("input#input_otro").val();
                if (buscar == ""){
                    obtener_datos_otro("");
                }else{
                    obtener_datos_otro(buscar);
                }
                alert(data);
            }
        });
        arreglar_abono();
    };
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
function obtener_datos_abono_filtro_empresa(texto){
    $.ajax({
        url:"buscar_abono_filtro_empresa.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_otro").html(data)
        }
    })
}
$(document).on("change","#empresa_seleccionada", function(){
    var texto = $("#empresa_seleccionada").val();
    if (texto == 1){
        obtener_datos_otro_todo();
    }else{
        obtener_datos_abono_filtro_empresa(texto);
    }
});
</script>
<script>
function obtener_datos_detalle_venta(texto){
    $.ajax({
        url:"buscar_detventas.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_venta").html(data);
        }
    });
}
obtener_datos_detalle_venta("vacio");
$(document).on("keyup","#input_venta", function(){
    var buscar = $("input#input_venta").val();
    if (buscar == ""){
        $("input#input_venta").focus();
        obtener_datos_detalle_venta("");
    }else{
        obtener_datos_detalle_venta(buscar);
    }
});
$(document).on("click","#eliminar_detalleventa",function(){
    if (confirm("¿Desea eliminar esta Persiana?")){
        var id = $(this).data("id_eliminar_detalleventa");
        $.ajax({
            url: "eliminar_detallenota.php",
            method: "POST",
            data: {id: id},
            success: function(data){
                var buscar = $("input#input_venta").val();
                if (buscar == ""){
                    $("input#input_venta").focus();
                    obtener_datos_detalle_venta("");
                }else{
                    obtener_datos_detalle_venta(buscar);
                }
                alert(data);
            }
        });
    };
});
$(document).on("click","#eliminar_detalleventa_roller",function(){
    if (confirm("¿Desea eliminar esta Roller?")){
        var id = $(this).data("id_eliminar_detalleventa_roller");
        $.ajax({
            url: "eliminar_detallenota_roller.php",
            method: "POST",
            data: {id: id},
            success: function(data){
                var buscar = $("input#input_venta").val();
                if (buscar == ""){
                    $("input#input_venta").focus();
                    obtener_datos_detalle_venta("");
                }else{
                    obtener_datos_detalle_venta(buscar);
                }
                alert(data);
            }
        });
    };
});
$(document).on("click","#eliminar_detalleventa_repuesto",function(){
    if (confirm("¿Desea eliminar este Repuesto?")){
        var id = $(this).data("id_eliminar_detalleventa_repuesto");
        $.ajax({
            url: "eliminar_detallenota_repuesto.php",
            method: "POST",
            data: {id: id},
            success: function(data){
                var buscar = $("input#input_venta").val();
                if (buscar == ""){
                    $("input#input_venta").focus();
                    obtener_datos_detalle_venta("");
                }else{
                    obtener_datos_detalle_venta(buscar);
                }
                alert(data);
            }
        });
    };
});
$(document).on("click","#eliminar_detalleventa_otro",function(){
    if (confirm("¿Desea eliminar este Otro?")){
        var id = $(this).data("id_eliminar_detalleventa_otro");
        $.ajax({
            url: "eliminar_detallenota_otro.php",
            method: "POST",
            data: {id: id},
            success: function(data){
                var buscar = $("input#input_venta").val();
                if (buscar == ""){
                    $("input#input_venta").focus();
                    obtener_datos_detalle_venta("");
                }else{
                    obtener_datos_detalle_venta(buscar);
                }
                alert(data);
            }
        });
    };
});
</script>
<script>
function obtener_datos_descuento_venta(texto){
    $.ajax({
        url:"buscar_descuentoventa.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_descuentoventa").html(data);
        }
    });
}
function obtener_datos_descuento_venta_todo(){
    $.ajax({
        url:"buscar_descuentoventa_todo.php",
        method:"POST",
        success: function(data){
            $("#result_descuentoventa").html(data);
        }
    });
}
obtener_datos_descuento_venta_todo();

var controladorTiempo20 = "";

function buscar_descuento_venta_admin(){
    var buscar = $("input#input_descuentoventa").val();
    if (buscar == ""){
        $("input#input_descuentoventa").focus();
        obtener_datos_descuento_venta("");
    }else{
        obtener_datos_descuento_venta(buscar);
    }
}

$(document).on("keyup","#input_descuentoventa", function(){
    clearTimeout(controladorTiempo20);
    controladorTiempo20 = setTimeout(buscar_descuento_venta_admin, 220);
});
$(document).on("click","#eliminar_descuentoventa",function(){
    if (confirm("¿Desea eliminar este Descuento de Nota Venta?")){
        var id = $(this).data("id_eliminar_descuentoventa");
        $.ajax({
            url: "eliminar_descuentoventa.php",
            method: "POST",
            data: {id: id},
            success: function(data){
                var buscar = $("input#input_descuentoventa").val();
                if (buscar == ""){
                    $("input#input_descuentoventa").focus();
                    obtener_datos_descuento_venta("");
                }else{
                    obtener_datos_descuento_venta(buscar);
                }
                alert(data);
            }
        });
    };
});
$(document).on("click","#quitar_completo",function(){
    if (confirm("¿Desea Dejar Pendiente esta Nota Venta?")){
        var id = $(this).data("id_notaventa");
        $.ajax({
            url: "quitar_completo_notaventa.php",
            method: "POST",
            data: {id: id},
            success: function(data){
                var buscar = $("input#input_rep").val();
                if (buscar == ""){
                    $("input#input_rep").focus();
                    obtener_datos_venta("");
                }else{
                    obtener_datos_venta(buscar);
                }
                alert(data);
            }
        });
    };
});
$(document).on("click","#agregar_tipo", function(){
    var row = $(this).parent().parent();
    var valor_conta = parseInt($(row).find('td:nth-child(12)').find("#contador_tipo").text()) + 1;
    $(row).find('td:nth-child(12)').append("<input list='lista_tipos' type='text' placeholder='Busque Tipo...' style='text-align:center;width:85%;' name='input_tipo[]' className='inputti' autocomplete='off' id='inputti"+valor_conta+"'/>");
    $(row).find('td:nth-child(12)').find("#contador_tipo").text(valor_conta);
});
$(document).on("click","#quitar_tipo", function(){
    var row = $(this).parent().parent();
    var valor_conta_quitar = $(row).find('td:nth-child(12)').find("#contador_tipo").text();
    if (valor_conta_quitar == 0 || valor_conta_quitar == '0'){
    }else{
        var quitar_conta = parseInt($(row).find('td:nth-child(12)').find("#contador_tipo").text()) - 1;
        $(row).find('td:nth-child(12)').find("#contador_tipo").text(quitar_conta);
        $(row).find('td:nth-child(12)').find("#inputti"+valor_conta_quitar).remove();
    }
});
$(document).on("click",".boton_quitar", function(){
    if(confirm("¿Desea eliminar este Tipo?")){
        var id = $(this).attr("id");
        var tipo = $(this).data("tipo");
        var notaventa = $(this).data("notaventa");
        var row = $(this).parent().parent();
        $(row).find('td:nth-child(12)').find("#inputtiu"+id).remove();
        $(row).find('td:nth-child(12)').find("#"+id).remove();
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
</script>
<p></p>
</div>
</div>
<p class="titulo75">SOCIEDAD FYD</p>
<p class="copy">Copyright © 2021 | Diseñado por N.A.B para Comercial F&amp;D</p>
</body>
</html>
