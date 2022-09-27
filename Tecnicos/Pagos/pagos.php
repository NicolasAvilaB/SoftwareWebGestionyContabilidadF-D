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
    @import url("pagos.css");
</style>
<link href="pagos.css" rel="stylesheet" type="text/css">
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
<label id="titulo2" class= "titulo2">Pagos</label>
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
    if(isset($_POST["inventario"])){
        session_start();
        $_SESSION['nombre'] = $valor_nombre;
        $_SESSION['idempresa'] = $valor_idempresa;
        $_SESSION['empresa'] = $valor_empresa;
        echo "<script>location.replace('../Inventario/inventario.php')</script>";
    }
    if(isset($_POST["calendario"])){
        session_start();
        $_SESSION['nombre'] = $valor_nombre;
        $_SESSION['idempresa'] = $valor_idempresa;
        $_SESSION['empresa'] = $valor_empresa;
        echo "<script>location.replace('../menu.php')</script>";
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
    <div id="result_tecnico_sueldo" style="margin-left:10px;margin-right:10px;"></div>
    <label id="label_total" style='margin-right:10px;float:right;'><strong>Subtotal: <input id="sueldo_total" type='text' placeholder='Total...' size='30' maxlength='70' autocomplete='off' style='text-align:center; font-size:1.3vw;' disabled/></strong></label>
    <p>&nbsp;</p>
    <br></br><label id='label_anticipos' style='margin-left:10px;float:left;'><strong>Anticipos</strong></label>
    <p>&nbsp;</p>
    <div id="result_tecnico_anticipo" style="margin-left:10px;width:28%;"></div>
    <label id="label_total_anticipos" style='margin-left:10px;float:left;'><strong>Subtotal: <input id="total_anticipos" type='text' placeholder='Total...' size='30' maxlength='70' autocomplete='off' style='text-align:center; font-size:1.3vw;' disabled/></strong></label><label id="label_total_completo" style='margin-right:10px;float:right;'><strong>Total: <input id="total_completo" type='text' placeholder='Total Completo...' size='30' maxlength='70' autocomplete='off' style='text-align:center; font-size:1.3vw;' disabled/></strong><p></p></label><br></br><br></br>
<script>
function openPage(pageName,elmnt,color) {
    var i, tabcontent, tablinks, tablinks1;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("botones_pestanas_inabilitados_a");
    tablinks1 = document.getElementsByClassName("botones_pestanas_inabilitados_e");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
        tablinks1[i].style.backgroundColor = "";
    }
    $("#"+pageName).css("display", "block");
    elmnt.style.backgroundColor = color;
}
$("#tecnicos").trigger('click');
</script>
<script>
function obtener_datos_tecnico_sueldo(){
    $.ajax({
        url:"buscar_tecnico_sueldo.php",
        method:"POST",
        async:false,
        data: {texto: '<?php echo $valor_nombre ?>'},
        success: function(data){
            $("#result_tecnico_sueldo").html(data);

        }
    });
}
function obtener_datos_tecnico_anticipo(){
    $.ajax({
        url:"buscar_anticipos_sueldo_tecnico.php",
        method:"POST",
        async:false,
        data: {texto: '<?php echo $valor_nombre ?>'},
        success: function(data){
            $("#result_tecnico_anticipo").html(data);
        }
    });
}
obtener_datos_tecnico_sueldo();
obtener_datos_tecnico_anticipo();
var sue = $("#sueldo_total").val();
var ant = $("#total_anticipos").val();
var resta = sue - ant;
$("#total_completo").val("$ "+resta.toLocaleString('es-CL'));
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
<p class="copy">Copyright © 2021 | Diseñado por N.A.B para Comercial P&amp;M</p>
</body>
</html>
