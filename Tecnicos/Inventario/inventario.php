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
@import url("inventario.css");
</style>
<link href="inventario.css" rel="stylesheet" type="text/css">
<link rel="stylesheet"  href="../Imagenes/jquery.dataTables.min.css" type="text/css">
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
<script src="../Imagenes/jquery.dataTables.min.js"></script>
<script src="https://www.w3schools.com/lib/w3.js"></script>
<script>
$(document).ready( function () {
    $('#tabla_accion_descb').DataTable();
});

$(document).on("click","#ingresar_desc_b",function(){
    ingresar_descb();
});
$(document).on("click","#guardar_modificacion_tabla",function(){
     $('#tabla_accion_descb tbody tr').each(function () {
        var cot= $(this).find('td').eq(0).html();
        var valor= $(this).find('td').eq(1).html();
        $.ajax({
            url: "modificar_valor_descb.php",
            method: "POST",
            data: {cot: cot, valor: valor},
            success: function(data){}
        })
    });
    alert("Se ha modificado correctamente");
    obtener_datos();
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
<?php
session_start();
if(!isset($_SESSION['empresa'])){
    header('Location: https://drwho.ga');
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
<label id="titulo2" class= "titulo2">Inventario</label>
<form id="form" class="form" name="form" method="POST">
    <p class="btn_arriba">
      <input type="submit" onclick="" id="calendario" name="calendario" class="botones_barra" value="Calendario">
      <input type="submit" onclick="" id="inventario" name="inventario" class="botones_barra" value="Inventario">
      <input type="submit" onclick="" id="pagos" name="pagos" class="botones_barra" value="Pagos">
      <label class="holavendedor"><?php echo "<label style='font-weight:600;'>".$valor_empresa."</label> - Hola, " . $valor_nombre ?>
      <input type="submit" onclick="" id="ce" class="ce" name="ce" value="Cerrar Sesión"></label></p>
    </p>
</aside>
<?php
    if(isset($_POST["calendario"])){
        session_start();
        $_SESSION['nombre'] = $valor_nombre;
        $_SESSION['idempresa'] = $valor_idempresa;
        $_SESSION['empresa'] = $valor_empresa;
        echo "<script>location.replace('../menu.php')</script>";
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
</div>
<div id="pestanas"></div>
<div class="tablascroll">
  <div id="result_productos_cantidad" style="float:left;margin-left:10px; width:45%;"></div>
  <div id="result_productos_detalle" style="float:right;margin-left:10px; margin-right:7px; width:49%;"></div>
</div>
</div>
<script>
function obtener_datos_productos_cantidad(texto){
    $.ajax({
        url:"mostrar_producto_cantidad_inventario.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_productos_cantidad").html(data);
        }
    });
}
function obtener_datos_productos_detalle(texto){
    $.ajax({
        url:"mostrar_producto_detalle_inventario.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_productos_detalle").html(data);
        }
    });
}
var tecn_inv = '<?php echo $valor_nombre ?>';
//nuevoalias("#nombre_tecnico").text(tecn_inv);
obtener_datos_productos_cantidad(tecn_inv);
obtener_datos_productos_detalle(tecn_inv);
//nuevoalias("#nombre_tecnico_pantalla").text(tecn_inv);
</script>
<p class="titulo75">SOCIEDAD FYD</p>
<p class="copy">Copyright © 2021 | Diseñado por N.A.B para Comercial P&amp;M</p>
</body>
</html>
