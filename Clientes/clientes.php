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
<link rel="stylesheet"  href="../Imagenes/jquery.dataTables.min.css" type="text/css">
<link rel="icon" href="../Imagenes/logofinder.png">
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
<script src="../Imagenes/jquery.dataTables.min.js"></script>
<script src="https://www.w3schools.com/lib/w3.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
            data: {texto: texto},
            success: function(data){
                $("#result").html(data)
            }
        });
    }
    function obtener_datos_todo(texto){
        $.ajax({
            url:"buscar_todo.php",
            method:"POST",
            data: {texto: texto},
            success: function(data){
                $("#result").html(data)
            }
        });
    }
    function obtener_datos_todo_compra(texto){
        $.ajax({
            url:"buscar_todo_compra.php",
            method:"POST",
            data: {texto: texto},
            success: function(data){
                $("#result").html(data)
            }
        });
    }
    function obtener_datos_todo_sin_compra(texto){
        $.ajax({
            url:"buscar_todo_sin_compra.php",
            method:"POST",
            data: {texto: texto},
            success: function(data){
                $("#result").html(data)
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
                alert(data);
            }
        })
    });
    $(document).on("click", "#eliminar", function() {
        var row = $(this).parent().parent();
        var id = $(row).find('td:nth-child(1)').text();
        if(confirm("??Desea eliminar este Cliente?")){
            $.ajax({
                url: "eliminar_cliente.php",
                method: "POST",
                data: {id: id},
                success: function(data){
                    $(row).remove();
                    alert(data);
                }
            });
        }
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
        $("button#mostrar_todo").css("display", "none");
        $("button#mostrar_compra").css("display", "none");
        $("button#mostrar_sin_compra").css("display", "none");
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
    function buscar_ingresar_modificar_cliente(){
        if ($('input#nombre_add').val().length <= 2){
            $("input#nombre_add").focus();
            obtener_datos("vacio");
        }else if ($('input#nombre_add').val().length >= 3){
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
    $(".modal-content").draggable({
        handle: ".cuadrado_modal"
    });
    $(document).on("keyup","#nombre_add", function(){
        buscar_ingresar_modificar_cliente();
    });
    $(document).on("click","#mostrar_todo", function(){
        if(confirm("Advertencia: Ser??n muchos registros cargados, \n??Desea cargarlos de todos modos?")){
            obtener_datos_todo();
        }
    });
    $(document).on("click","#mostrar_compra", function(){
        if(confirm("Advertencia: Pueden ser muchas compras cargadas, \n??Desea cargarlos de todos modos?")){
            obtener_datos_todo_compra();
        }
    });
    $(document).on("click","#mostrar_sin_compra", function(){
        if(confirm("Advertencia: Pueden ser muchos registros cargados, \n??Desea cargarlos de todos modos?")){
            obtener_datos_todo_sin_compra();
        }
    });
    consultar_id_cliente();
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
<label class= "titulo2">Clientes </label>
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
<button id="desplegar_item" class="dropbtn">Clientes</button>
</div>
<div class="tablascroll">
<div class="grid-container">
    <input type="text" class="grid-item" id="direccion_add" name="direccion_add" placeholder="Direccion..." size="30" maxlength="70" autocomplete="off"/>
    <input list="lista_clientes" type="text" class="grid-item" id="nombre_add" name="nombre_add" placeholder="Nombre Cliente..." size="30" maxlength="70" autocomplete="off"/>
    <?php
        $conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
        mysqli_set_charset($conexion,"utf8");
        $ejecutar = mysqli_query($conexion,"Call Mostrar_Nombre_Clientes_Todo()");
        mysqli_set_charset($conexion,"utf8");
    ?>
    <datalist id="lista_clientes">
    <?php while ($row = mysqli_fetch_array($ejecutar)) {  ?>
        <option><?php echo $row[0] ?></option>
    <?php } ?>
    </datalist>
    <input type="text" class="grid-item" id="telefono_add" name="telefono_add" placeholder="Tel??fono..." size="30" maxlength="70" autocomplete="off"/>
    <input type="text" class="grid-item" id="email_add" name="email_add" placeholder="Email..." size="30" maxlength="70" autocomplete="off"/>
    <input type="text" class="grid-item" id="comuna_add" name="comuna_add" placeholder="Comuna..." size="30" maxlength="70" autocomplete="off"/>
    <label id="id_cliente">ID Cliente: 0 </label><button class="boton_ingresar" id='add'>Ingresar</button><button class="boton_ingresar" id='mostrar_todo'>Mostrar Todo</button><button class="boton_ingresar" id='mostrar_compra'>Mostrar Compra</button><button class="boton_sincompra" id='mostrar_sin_compra'>Mostrar Sin Compra</button>
    <p id="espacio">&nbsp;</p>
</div>
    <aside id="result"><b></b></aside>
</div>
</div>
<p class="titulo75">SOCIEDAD FYD</p>
<p class="copy">Copyright ?? 2021 | Dise??ado por N.A.B para Comercial F&amp;D</p>
</body>
</html>
