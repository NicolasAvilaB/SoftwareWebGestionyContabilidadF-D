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
<link rel="stylesheet"  href="../Imagenes/jquery.dataTables.min.css" type="text/css">
<link rel="icon" href="../Imagenes/logofinder.png">
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
<script src="../Imagenes/jquery.dataTables.min.js"></script>
<script src="https://www.w3schools.com/lib/w3.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(document).ready( function () {
    $('#tabla_cotizaciones').DataTable();
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
    function obtener_datos(texto){
        $.ajax({
            url:"buscar.php",
            method:"POST",
            data: {texto: texto, id_empresa: <?php echo $valor_idempresa; ?>},
            success: function(data){
                $("#result").html(data)
            }
        })
    }
    function obtener_datos_todo(texto){
        $.ajax({
            url:"buscar_todo.php",
            method:"POST",
            success: function(data){
                $("#result").html(data)
            }
        })
    }
    function obtener_datos_filtrados_mes_ano_empresa(texto, texto2, texto3){
        $.ajax({
            url:"buscar_filtracion_mes_ano_empresa.php",
            method:"POST",
            data: {texto: texto, texto2: texto2, texto3: texto3},
            success: function(data){
                $("#result").html(data)
            }
        });
    }
    function obtener_datos_filtrados_mes_ano(texto, texto2){
        $.ajax({
            url:"buscar_filtracion_mes_ano.php",
            method:"POST",
            data: {texto: texto, texto2: texto2},
            success: function(data){
                $("#result").html(data)
            }
        });
    }
    function obtener_datos_filtrados_empr_ano(texto, texto2){
        $.ajax({
            url:"buscar_filtracion_empr_ano.php",
            method:"POST",
            data: {texto: texto, texto2: texto2},
            success: function(data){
                $("#result").html(data)
            }
        });
    }
    function obtener_datos_filtrados_ano(texto){
        $.ajax({
            url:"buscar_filtracion_ano.php",
            method:"POST",
            data: {texto: texto},
            success: function(data){
                $("#result").html(data)
            }
        });
    }
    w3.hide('#boton_guardar_modificacion');
    obtener_datos("vacio");
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
    var controladorTiempo2 = "";

    function buscar_ventas_admin(){
        var buscar = $("input#input_cliente").val();
        if (buscar == ""){
            $("input#input_cliente").focus();
            obtener_datos("vacio");
        }else{
            obtener_datos(buscar);
        }
    }

    $(document).on("keyup","#input_cliente", function(){
        clearTimeout(controladorTiempo2);
        controladorTiempo2 = setTimeout(buscar_ventas_admin, 220);
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
    function obtener_datos_todo_filtrados_empr(texto){
        $.ajax({
            url:"buscar_todo_filtracion_empr.php",
            method:"POST",
            data: {texto: texto},
            success: function(data){
                $("#result").html(data)
            }
        });
    }
    function obtener_datos_todo_filtrados_mes(texto){
        $.ajax({
            url:"buscar_todo_filtracion_mes.php",
            method:"POST",
            data: {texto: texto},
            success: function(data){
                $("#result").html(data)
            }
        });
    }
    function obtener_datos_todo_filtrados_mes_empr(texto, texto2){
        $.ajax({
            url:"buscar_todo_filtracion_mes_empr.php",
            method:"POST",
            data: {texto: texto, texto2: texto2},
            success: function(data){
                $("#result").html(data)
            }
        });
    }
    $(document).on("click","#filtrar_mes_ano",function(){
        var mes = $("#select_mes1").val();
        var ano = $("#select_ano1").val();
        var empr = $("#empresa_seleccionada").val();
        if (empr == '1' && mes != '101' && ano != '101'){
            obtener_datos_filtrados_mes_ano(mes,ano);
        }
        if(mes == '101' && empr == '1' && ano != '101'){
            obtener_datos_filtrados_ano(ano);
        }
        if(mes == '101' && ano != '101' && empr != '1'){
            obtener_datos_filtrados_empr_ano(ano, empr);
        }
        if(mes != '101' && empr != '1' && ano != '101'){
            obtener_datos_filtrados_mes_ano_empresa(mes,ano,empr);
        }
        if(mes == '101' && empr == '1' && ano == '234'){
            obtener_datos_todo();
        }
        if(mes == '101' && ano == '234' && empr != '1'){
            obtener_datos_todo_filtrados_empr(empr);
        }
        if(mes != '101' && empr == '1' && ano == '234'){
            obtener_datos_todo_filtrados_mes(mes);
        }
        if(mes != '101' && empr != '1' && ano == '234'){
            obtener_datos_todo_filtrados_mes_empr(mes,empr);
        }

    });
    $(document).on("click","#eliminar",function(){
        if (confirm("??Desea eliminar la Nota Venta?")){
            var id = $(this).data("id_eliminar");
            $.ajax({
                url: "eliminar_notaventa.php",
                method: "POST",
                data: {id: id},
                success: function(data){
                    obtener_datos("vacio");
                    alert(data);
                }
            })
        };
    });
    $(document).on("click","#borrar_residuos",function(){
        var id = $("input#input_cliente").val();
        if(id == "" || id == '' || id == 0 || id == null){
            alert("Ingrese un Numero de Nota Venta V??lido");
            $("input#input_cliente").focus();
        }else{
            $.ajax({
                url: "eliminar_notaventa.php",
                method: "POST",
                data: {id: id},
                success: function(data){
                    obtener_datos("vacio");
                    alert(data);
                }
            });
        }
    });
    $(document).on("click","#borrar_filtrado",function(){
        if (confirm("??Desea eliminar todas las Nota Ventas Filtradas?")){
            $('#tabla_cotizaciones tbody tr').each(function () {
                var id= $(this).find('td').eq(1).html();
                $.ajax({
                    url: "eliminar_notaventa.php",
                    method: "POST",
                    data: {id: id},
                    success: function(data){}
                });
            });
            obtener_datos("vacio");
            alert("Se ha eliminado lo Filtrado");
        };
    });
    $(".modal-content").draggable({
        handle: ".cuadrado_modal"
    });
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
<label class= "titulo2">Nota Venta </label>
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
<button id="desplegar_item" class="dropbtn">Nota Venta</button>
</div>
<div class="tablascroll">
    <div style="float:right;">
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
        <option value="1" disabled selected>Seleccione A??o...</option>
        <option value='234'>Todos</option>
        <?php $year = date("Y");
            for ($i=2005; $i<=$year; $i++){
                echo '<option value="'.$i.'">'.$i.'</option>';
            }
        ?>
    </select>
    <?php
        $conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
        mysqli_set_charset($conexion,"utf8");
        $ejecutar = mysqli_query($conexion,"select NombreEmpresa from Empresas");
        mysqli_set_charset($conexion,"utf8");
    ?>
    <select id="empresa_seleccionada">
        <option value='0'>Seleccione Empresa...</option>
        <option value='1'>Todos</option>
    <?php while ($row = mysqli_fetch_array($ejecutar)) { ?>
        <option value='<?php echo $row[0];?>'><?php echo $row[0];?></option>
    <?php } ?>
    </select>
    <button id="filtrar_mes_ano">Filtrar</button>
    </div>
    <div id="result"><b></b></div>
</div>
<button id="borrar_filtrado">Borrar Filtrado</button>
<label id="resultado_total"></label>
<button id="borrar_residuos" style="inline-block:center;">Borrar Residuos</button><input list="lista_clientes" type="text" class="input_cliente" id="input_cliente" name="input_cliente" placeholder="Escriba Registro..." size="30" maxlength="70" autocomplete="off"/>
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
        <aside id="cuadrado_modal" class="cuadrado_modal">
            <label class="adorno_botones_modal"><img src="../Imagenes/wincontrol_cerrar.png" id="close_modal" class="close_modal"></img></label>
            <label class= "titulo2">Consulta</label>
        </aside>
            <p>&nbsp;</p>
            <p style="text-align:center;">Consulta Abonos <label id="nombre_producto"></label><label id="id" style="display:none;"></label></p>
            <br></br>
            <div id="cargar_cliente"></div>
            <br></br>
            <div id="cargar_tabla_cliente"></div>
            <br></br>
    </div>
</div>
<p class="titulo75">SOCIEDAD FYD</p>
<p class="copy">Copyright ?? 2021 | Dise??ado por N.A.B para Comercial F&amp;D</p>
</body>
</html>
