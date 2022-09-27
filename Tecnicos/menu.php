<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="theme-color" content="#2B81E0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <noscript>
        <META HTTP-EQUIV="Refresh" CONTENT="0;URL=java.html">
    </noscript>
    <style type="text/css">
      @import url("menu.css");
    </style>
    <link href="menu.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet"  href="../Imagenes/jquery.dataTables.min.css" type="text/css">
    <link href="../Imagenes/fullcalendar.min.css" rel="stylesheet" type="text/css">
    <script src="../Imagenes/jquery-3.6.0.min.js"></script>
    <script src="../Imagenes/moment.min.js"></script>
    <script src="../Imagenes/fullcalendar.min.js"></script>
    <script src="../Imagenes/es-us.js"></script>
    <link rel="icon" href="../Imagenes/logofinder.png">
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
        $valor_estado = $_SESSION['estadotecnico'];
    }
    ?>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.2.11/jspdf.plugin.autotable.min.js"></script>
    <script>

        /*function demoFromHTML() {
            var pdf = new jsPDF('l', 'pt', 'letter');
            // source can be HTML-formatted string, or a reference
            // to an actual DOM element from which the text will be scraped.
            source = $('#customers')[0];

            // we support special element handlers. Register them with jQuery-style
            // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
            // There is no support for any other type of selectors
            // (class, of compound) at this time.
            specialElementHandlers = {
                // element with id of "bypass" - jQuery style selector
                '#bypassme': function (element, renderer) {
                    // true = "handled elsewhere, bypass text extraction"
                    return true
                }
            };
            margins = {
                top: 20,
                bottom: 20,
                left: 20,
                width: 1022
            };
            // all coords and widths are in jsPDF instance's declared units
            // 'inches' in this case
            pdf.fromHTML(
            source, // HTML string or DOM elem ref.
            margins.left, // x coord
            margins.top, { // y coord
                'width': margins.width, // max width of content on PDF
                'elementHandlers': specialElementHandlers
            },

            function (dispose) {
                // dispose: object with X, Y of the last line add to the PDF
                //          this allow the insertion of new lines after html
                pdf.save('Test.pdf');
            }, margins);
        }*/
    </script>
</head>
<title>Sociedad FYD - Gestión y Contabilidad </title>
<body oncopy="return false" onpaste="return false" oncontextmenu="return false">
<img src="../Imagenes/fondo_login.jpg" id="fondo"/>
<p></p>
<div class="form1">
<div class="form0">
<aside class="cuadrado">
<label class="adorno_botones"><img src="../Imagenes/wincontrol.png"></img></label>
<label class= "titulo2">Inicio </label>
<form id="form" class="form" name="form" method="POST">
<p class="btn_arriba">
  <input type="submit" onclick="" id="calendario" name="calendario" class="botones_barra" value="Calendario"/>
  <?php
      $conexion_super = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
      mysqli_set_charset($conexion_super,"utf8");
      $consulta_super = $conexion_super->query("select EstadoInventario from Tecnicos where Nombre = '$valor_nombre'");
      if($row_super = $consulta_super->fetch_assoc()){
          $estado_invent = $row_super["EstadoInventario"];
          if ($estado_invent == 'Activar'){
          }elseif($estado_invent == 'Desactivar'){
              echo '<input type="submit" onclick="" id="inventario" name="inventario" class="botones_barra" value="Inventario"/><input type="submit" onclick="" id="pagos" name="pagos" class="botones_barra" value="Pagos"/>';
          }
      }
      $consulta_super->close();
      $conexion_super->more_results();
  ?>
  <label class="holavendedor"><?php echo "<label style='font-weight:600;'>".$valor_empresa."</label> - Hola, " . $valor_nombre ?>
  <input type="submit" onclick="" id="ce" class="ce" name="ce" value="Cerrar Sesión"></label></p>
</aside>
</p>
<p>
<?php
    if(isset($_POST["inventario"])){
        session_start();
        $_SESSION['nombre'] = $valor_nombre;
        $_SESSION['idempresa'] = $valor_idempresa;
        $_SESSION['empresa'] = $valor_empresa;
        echo "<script>location.replace('./Inventario/inventario.php')</script>";
    }
    if(isset($_POST["pagos"])){
        session_start();
        $_SESSION['nombre'] = $valor_nombre;
        $_SESSION['idempresa'] = $valor_idempresa;
        $_SESSION['empresa'] = $valor_empresa;
        echo "<script>location.replace('./Pagos/pagos.php')</script>";
    }
    if(isset($_POST["ce"])){
        session_destroy();
        echo "<script>location.replace('http://nalo.cf')</script>";
        exit;
    }
?>
</form>
</div>
<div class="tablascroll">
    <div id="Calendario"></div>
</div>
<br></br>
</div>
<div id="modal_ver_abonos" class="modal_ver_abonos" style="display:none;">
    <div class="modal-content">
        <aside id="cuadrado_modal" class="cuadrado_modal">
            <label class="adorno_botones_modal"><img src="../Imagenes/wincontrol_cerrar.png" id="close_modal" class="close_modal"></img></label>
            <label class="titulo99">Consulta Calendario</label>
            <div style="position:absolute;float:left;margin-top:10px;">
                <button id="sacar_informe"class="sacar_informe">Informe</button>
            </div>
        </aside>
            <p>&nbsp;</p>
            <p class="titulo_modal_resumentodo">Resumen Día</p>
            <p class="fecha_modal_resumentodo"><label id="fecha_lista"></label><label id="fecha_lista000" style="display:none;"></label></p>
            <p>&nbsp;</p>
            <div id="resultadodia_resumentodo" class="resultadodia_resumentodo"></div>
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
            <p class="titulo_modal_resumentodo">Resumen Día</p>
            <p class="fecha_modal_resumentodo"><label id="fecha_lista2"></label></p>
            <div id="inst" style="padding:25px;" style="display:none;">
                <label id="IdInst" style="display:none;"></label>
                <label><strong id="fechainstaaprox">Fecha Instalación Aprox:&nbsp;&nbsp;</strong><input type="date" id="fecha_instalacion" name="fecha_instalacion" min='2005-01-01' max='2100-12-31' placeholder="Fecha Instalacion..." size="40" maxlength="100" autocomplete="off" disabled/></label>
                <p>&nbsp;</p>
                <label><strong id="descripcioninstatodo">Descripción Todo Instalación:</strong></label>
                <p></p>
                <div id="descripcion_instalacion"></div>
                <p>&nbsp;</p>
            </div>
            <div id="rep_rest" style="padding:25px;" style="display:none;">
                <label id="IdEvento" style="display:none;"></label>
                <div id="scroll">
                    <label><strong id="fechainicio">Fecha Inicio:&nbsp;&nbsp;</strong><input type="date" id="fecha_inicio_modal" name="fecha_inicio_modal" min='2005-01-01' max='2100-12-31' placeholder="Fecha Inicio..." size="40" maxlength="100" autocomplete="off" disabled/></label>
                    <p>&nbsp;</p>
                    <label><strong id="fechafin">Fecha Fin:&nbsp;&nbsp;</strong><input type="date" id="fecha_fin_modal" name="fecha_fin_modal" min='2005-01-01' max='2100-12-31' placeholder="Fecha Fin..." size="40" maxlength="100" autocomplete="off" disabled/></label>
                    <p>&nbsp;</p>
                    <label><strong id="horario">Horario:&nbsp;&nbsp;</strong>
                    <input id="select_horario_modal" name="select_horario_modal" disabled></input></label>
                    <p>&nbsp;</p>
                    <label><strong id="detalle">Detalle:&nbsp;&nbsp;</strong>
                    <input id="select_detalle_modal" name="select_detalle_modal" disabled /></label>
                    <!--<label><strong style="font-size: 1.2vw;">Color Etiqueta:&nbsp;&nbsp;</strong>
                    <input type="color" value="#612897" id="color_modal"/>-->
                    <p>&nbsp;</p>
                    <label><strong id="buscarcliente">Buscar Cliente:&nbsp;&nbsp;</strong>
                    <input list="lista_clientes" type="text" id="buscar_cliente_modal" name="buscar_cliente_modal" placeholder="Nombre Cliente..." size="30" maxlength="100" autocomplete="off" disabled/>
                    </label>
                    <p>&nbsp;</p>
                    <div id="resultado_busqueda_modal"></div>
                    <label><strong id="descripcioncliente">Descripción Cliente:</strong></label>
                    <p></p>
                    &nbsp;<textarea id="observaciones_modal" style="height:140px;" name="observaciones_modal" placeholder="Escriba Observaciones..." disabled></textarea>
                    <p></p>
                    <label id="letras_observaciones"><strong>Observaciones:</strong></label>
                    <p></p>
                    <textarea id="observaciones_tecnico" name="observaciones_tecnico" placeholder="Escriba Observaciones..."></textarea>
                    <p>&nbsp;</p>
                    <button class="boton_ingresar" id='guardar_modal_rep_rest'>Ingresar</button>
                    <br>&nbsp;</br>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                </div>
            </div>
    </div>
</div>
<div id="modal_ver_abonos3" class="modal_ver_abonos3" style="display:none;">
    <div class="modal-content3">
        <aside id="cuadrado_modal3" class="cuadrado_modal3">
            <label class="adorno_botones_modal"><img src="../Imagenes/wincontrol_cerrar.png" id="close_modal" class="close_modal"></img></label>
            <label class= "titulo2">Rectificación</label>
        </aside>
        <div id="scroll4">
            <p>&nbsp;</p>
            <label id="IdRest_Medidas" style="display:none;"></label>
            <label id="nombre_instalador" style="display:none;"></label>
            <label id="nombre_clientes" style="display:none;"></label>
            <label id="fecha_red" style="display:none;"></label>
            <button class="boton_ingresar" id='boton_agregarfila_tabla_restificacion'>Agregar Fila</button>
            <div id="tabla_restificacion"></div>
            <br></br>
            <label id="letras_observaciones"><strong id="letrassegunda_observa">Observaciones:</strong></label>
            <p></p>
            <textarea id="observaciones_tecnico_rest" style="width:90%; height:140px;" name="observaciones_tecnico_rest" placeholder="Escriba Observaciones..."></textarea>
            <p>&nbsp;</p>
            <button class="boton_ingresar" id='guardar_medidas_restificacion'>Guardar Medidas</button>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
        </div>
    </div>
</div>
<div id="modal_ver_abonos4" class="modal_ver_abonos4" style="display:none;">
    <div class="modal-content4">
        <aside id="cuadrado_modal4" class="cuadrado_modal4">
            <label class="adorno_botones_modal"><img src="../Imagenes/wincontrol_cerrar.png" id="close_modal" class="close_modal"></img></label>
            <label class= "titulo2">Instalación</label>
        </aside>
        <p>&nbsp;</p>
        <p class="titulo_modal_resumentodo">Resumen Día</p>
        <p class="fecha_modal_resumentodo"><label id="fecha_lista20"></label></p>
        <div id="scroll5">
            <p>&nbsp;</p>
            <label id="IdNotaVenta_Inst" style="display:none;"></label>
            <label><strong id="fechainstalacionaprox">Fecha Instalación Aprox:&nbsp;&nbsp;</strong><input type="date" id="fecha_instalacion20" name="fecha_instalacion20" min='2005-01-01' max='2100-12-31' placeholder="Fecha Instalacion..." size="40" maxlength="100" autocomplete="off" disabled/></label>
            <p>&nbsp;</p>
            <label><strong id="detalleinstalacion">Detalle:&nbsp;&nbsp;</strong>
            <input id="select_detalle_modal_inst" name="select_detalle_modal_inst" disabled /></label>
            <p>&nbsp;</p>
            <label><strong id="instalacion_desctodo">Instalación:&nbsp;&nbsp;</strong></label>
            <p></p>
            <label id="datos_instalacion"></label>
            <p>&nbsp;</p>
            <label><strong id="descripcioninstalaclien">Descripción Cliente:</strong></label>
            <p></p>
            <textarea id="observaciones_inst" name="observaciones_inst" placeholder="Escriba Observaciones..." disabled></textarea>
            <p></p>
            <label id="letras_observaciones"><strong id="letradeobservaciones">Observaciones:</strong></label>
            <p></p>
            <textarea id="observaciones_tecnico_inst" name="observaciones_tecnico_inst" placeholder="Escriba Observaciones..."></textarea>
            <p>&nbsp;</p>
            <button class="boton_ingresar" id='guardar_modal_inst'>Guardar</button>
            <br>&nbsp;</br>
            <br>&nbsp;</br>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
        </div>
    </div>
</div>
<script>
var nuevoalias = jQuery.noConflict();
nuevoalias(document).ready(function(){
        function obtener_datos_resumentodo_deldia(texto,texto2,texto3){
            nuevoalias.ajax({
                url:"buscar_resumentododia.php",
                method:"POST",
                data: {texto: texto,texto2: texto2, texto3: texto3},
                success: function(data){
                    nuevoalias("#resultadodia_resumentodo").html(data);
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
        function obtener_datos_descripcion_instalacion_modal(texto, texto2){
            nuevoalias.ajax({
                url:"buscar_descripcion_instalacion_modal.php",
                method:"POST",
                data: {texto: texto, texto2: texto2},
                success: function(data){
                    nuevoalias("#descripcion_instalacion").html(data);
                }
            });
        }
        function obtener_datos_descripcion_instalacion_modal_id(texto, texto2){
            nuevoalias.ajax({
                url:"buscar_descripcion_instalacion_modal_id.php",
                method:"POST",
                data: {texto: texto, texto2: texto2},
                success: function(data){
                    nuevoalias("#descripcion_instalacion").html(data);
                }
            });
        }
        function llamar_modal(){
            var modal = document.getElementById("modal_ver_abonos");
            nuevoalias("#modal_ver_abonos").css("display", "block");
            nuevoalias(document).on("click","#close_modal",function(){
                $("#modal_ver_abonos").css("display", "none");
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
                $("#modal_ver_abonos2").css("display", "none");
            });
            nuevoalias(window).on("click",function(event){
            	if (event.target == modal) {
            		nuevoalias("#modal_ver_abonos2").css("display", "none");
            	}
            });
        }
        function llamar_modal_restificacion(){
            var modal = document.getElementById("modal_ver_abonos3");
            nuevoalias("#modal_ver_abonos3").css("display", "block");
            nuevoalias(document).on("click","#close_modal",function(){
                $("#modal_ver_abonos3").css("display", "none");
            });
            nuevoalias(window).on("click",function(event){
            	if (event.target == modal) {
            		nuevoalias("#modal_ver_abonos3").css("display", "none");
            	}
            });
        }
        function llamar_modal_instalacion(){
            var modal = document.getElementById("modal_ver_abonos4");
            nuevoalias("#modal_ver_abonos4").css("display", "block");
            nuevoalias(document).on("click","#close_modal",function(){
                $("#modal_ver_abonos4").css("display", "none");
            });
            nuevoalias(window).on("click",function(event){
            	if (event.target == modal) {
            		nuevoalias("#modal_ver_abonos4").css("display", "none");
            	}
            });
        }
        function buscar_cliente_modal(){
            if (nuevoalias('input#buscar_cliente_modal').val().length <= 0){
                nuevoalias("input#buscar_cliente_modal").focus();
                obtener_datos_cliente_modal("vacio");
            }else if (nuevoalias('input#buscar_cliente_modal').val().length >= 1){
                obtener_datos_cliente_modal(nuevoalias("input#buscar_cliente_modal").val());
            }
        }
        var controladorTiempo2 = "";
        nuevoalias(document).on("keyup","#buscar_cliente_modal", function(){
            clearTimeout(controladorTiempo2);
            controladorTiempo2 = setTimeout(buscar_cliente_modal, 220);
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
            var idclientes = $(row).find('td').eq(12).html();
            var estadodetarea = $(row).find('td').eq(13).html();
            if (tipo_dato == 'Instalación'){
                if (estadodetarea >= 1){
                  nuevoalias("#observaciones_tecnico_inst").prop('disabled', true);
                  nuevoalias("#guardar_modal_inst").css("display", "none");
                }else{
                  nuevoalias("#observaciones_tecnico_inst").prop('disabled', false);
                  nuevoalias("#guardar_modal_inst").css("display", "block");
                }
                nuevoalias("#inst").css("display", "block");
                nuevoalias("#rep_rest").css("display", "none");
                nuevoalias("#fecha_lista2").text(FechaHora);
                nuevoalias("#fecha_instalacion").val(FechaHora);
                nuevoalias("label#IdInst").text(ids);
                obtener_datos_descripcion_instalacion_modal_id(ids, tecnico_t);
                //obtener_datos_descripcion_instalacion_modal(FechaHora, tecnico_t);
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
                    nuevoalias("#fecha_inicio_modal").val(FechaHora);
                    var horario = "";
                    if (hor == 'Mañana 08:30a - 12:00a'){
                        horario = "Mañana";
                    }else if(hor == 'Tarde 13:00p - 18:00p'){
                        horario = "Tarde";
                    }
                    nuevoalias("#select_horario_modal").val(horario);
                    nuevoalias("#select_detalle_modal").val(tipo_dato);
                    nuevoalias("#observaciones_modal").val(observaciones_clientes);
                    nuevoalias("#buscar_cliente_modal").val(idclientes);
                    if (tipo_dato == 'Restificación'){
                        if (estadodetarea >= 1){
                          nuevoalias("#boton_agregarfila_tabla_restificacion").css("display", "none");
                          nuevoalias("#guardar_modal_inst").css("display", "none");
                          nuevoalias("#guardar_medidas_restificacion").css("display","none");
                          nuevoalias("#observaciones_tecnico_rest").prop('disabled', true);
                        }else{
                          nuevoalias("#boton_agregarfila_tabla_restificacion").css("display", "block");
                          nuevoalias("#guardar_modal_inst").css("display", "block");
                          nuevoalias("#guardar_medidas_restificacion").css("display","block");
                          nuevoalias("#observaciones_tecnico_rest").prop('disabled', false);
                        }
                        nuevoalias("#letras_observaciones").css("display", "none");
                        nuevoalias("#observaciones_tecnico").css("display", "none");
                        nuevoalias("#guardar_modal_rep_rest").text("Ingresar Medidas");
                        nuevoalias("#guardar_modal_rep_rest").css("width","160px");
                        nuevoalias("#guardar_modal_rep_rest").css("display","block");
                        nuevoalias("#observaciones_tecnico_rest").val(observaciones_tecnicos);
                        nuevoalias("#IdRest_Medidas").text(ids);
                        nuevoalias("#nombre_instalador").text(tecnico_t);
                    }else if (tipo_dato == 'Reparación' || tipo_dato == 'Visita Técnica'){
                        nuevoalias("#letras_observaciones").css("display", "block");
                        nuevoalias("#observaciones_tecnico").css("display", "block");
                        nuevoalias("#observaciones_tecnico").val(observaciones_tecnicos);
                        nuevoalias("#guardar_modal_rep_rest").text("Guardar");
                        nuevoalias("#guardar_modal_rep_rest").css("width","130px");
                        if (estadodetarea >= 1){
                          nuevoalias("#observaciones_tecnico").prop('disabled', true);
                          nuevoalias("#guardar_modal_rep_rest").css("display", "none");
                        }else{
                          nuevoalias("#observaciones_tecnico").prop('disabled', false);
                          nuevoalias("#guardar_modal_rep_rest").css("display", "block");
                        }
                    }
                    obtener_datos_cliente_modal(idclientes);
                    llamar_modal2();
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

        events: {
            url: "/Tecnicos/consultar_instalaciones_calendario.php",
            type: 'POST',
            data: function() {
                return {
                   texto: '<?php echo $valor_nombre ?>'
                };
            }
        },

        eventClick:function(calEvent, jsEvent, view){
            /*var tipo_dato = calEvent.tipo;
            FechaHora = calEvent.start._i.split(" ");
            if (tipo_dato == 'Instalación'){
                nuevoalias("#inst").css("display", "block");
                nuevoalias("#rep_rest").css("display", "none");
                nuevoalias("#fecha_lista2").text(FechaHora[0]);
                nuevoalias("#fecha_instalacion").val(FechaHora[0]);
                nuevoalias("label#IdInst").text(calEvent.id);
                obtener_datos_descripcion_instalacion_modal(FechaHora[0], calEvent.Instalador);
                llamar_modal2();
            }else if(tipo_dato != 'Instalación'){
                var tipo_estado_tarea = calEvent.Estado_Tarea;
                if (tipo_estado_tarea == '1' || tipo_estado_tarea == '2' || tipo_estado_tarea == '3'){
                    alert("Ya se ha realizado la Tarea");
                }else{
                    nuevoalias("#inst").css("display", "none");
                    nuevoalias("#rep_rest").css("display", "block");
                    nuevoalias("#fecha_lista2").text(FechaHora[0]);
                    nuevoalias("label#IdEvento").text(calEvent.id);
                    nuevoalias("#tecnico_modal").val(calEvent.Instalador);
                    nuevoalias("#fecha_inicio_modal").val(FechaHora[0]);
                    var horario = "";
                    if (FechaHora[1] == '08:30:00'){
                        horario = "Mañana";
                    }else if(FechaHora[1] == '13:00:00'){
                        horario = "Tarde";
                    }
                    nuevoalias("#select_horario_modal").val(horario);
                    nuevoalias("#select_detalle_modal").val(tipo_dato);
                    nuevoalias("#observaciones_modal").val(calEvent.Instalación8);
                    nuevoalias("#buscar_cliente_modal").val(calEvent.IdCliente);
                    if (tipo_dato == 'Restificación'){
                        nuevoalias("#letras_observaciones").css("display", "none");
                        nuevoalias("#observaciones_tecnico").css("display", "none");
                        nuevoalias("#guardar_modal_rep_rest").text("Ingresar Medidas");
                        nuevoalias("#guardar_modal_rep_rest").css("width","160px");
                        nuevoalias("#observaciones_tecnico_rest").val(calEvent.Observacionet);
                        nuevoalias("#IdRest_Medidas").text(calEvent.id);
                        nuevoalias("#nombre_instalador").text(calEvent.Instalador);
                    }else if (tipo_dato == 'Reparación' || tipo_dato == 'Visita Técnica'){
                        nuevoalias("#letras_observaciones").css("display", "block");
                        nuevoalias("#observaciones_tecnico").css("display", "block");
                        nuevoalias("#observaciones_tecnico").val(calEvent.Observacionet);
                        nuevoalias("#guardar_modal_rep_rest").text("Guardar");
                        nuevoalias("#guardar_modal_rep_rest").css("width","130px");
                    }
                    obtener_datos_cliente_modal(calEvent.IdCliente);
                    llamar_modal2();
                }
                //nuevoalias("#color_modal").val(calEvent.color);
            }*/
        },
        dayClick:function(date,jsEvent,view){
            llamar_modal();
            var fecha_obtenida = date.format('dddd') + ', ' + date.format('DD') + ' de ' + date.format('MMMM') + ' del ' + date.format('YYYY');
            nuevoalias('#fecha_lista').text(fecha_obtenida);
            nuevoalias('#fecha_lista000').text(date.format());
            obtener_datos_resumentodo_deldia(date.format(),'<?php echo $valor_nombre ?>','<?php echo $valor_estado ?>');
            nuevoalias("#informes").html("<a id='boton_generar_informe' href='generar_informe_resumendia.php?fecha="+nuevoalias('#fecha_lista000').text()+"&nombre="+'<?php echo $valor_nombre ?>'+"' type='button' value='View PDF' class='btn btn-primary' target='_blank'>Informe </a><!--<button class='boton_ingresar' id='informe_rep_vis'>Informe</button>");
        },
        firstDay:1
    });

    function crear_tabla_restificacion(texto){
        nuevoalias.ajax({
            url: "buscar_tabla_restificacion.php",
            method: "POST",
            data: {texto: texto},
            success: function(data){
                nuevoalias("#tabla_restificacion").html(data);
            }
        });
    }
    function buscar_descripcion_instalacion_tecnico(texto,texto2,texto3){
        nuevoalias.ajax({
            url: "descripcion_instalacion.php",
            method: "POST",
            data: {texto: texto, texto2: texto2, texto3: texto3},
            success: function(data){
                nuevoalias("#datos_instalacion").html(data);
            }
        });
    }

    nuevoalias("#guardar_modal_rep_rest").click(function(){
        var valor_input_detalle = nuevoalias('#select_detalle_modal').val();
        var valor_fecha = nuevoalias('#fecha_lista2').text();
        var nomb_client = nuevoalias('#nombre_cliente_modal').val();
        if (valor_input_detalle == 'Restificación'){
            nuevoalias("#modal_ver_abonos2").css("display", "none");
            var id = nuevoalias("label#IdRest_Medidas").text();
            crear_tabla_restificacion(id);
            llamar_modal_restificacion();
            nuevoalias("#nombre_clientes").html(nomb_client);
            nuevoalias("#fecha_red").html(valor_fecha);
        }else if (valor_input_detalle == 'Reparación'){
            if (nuevoalias('#observaciones_tecnico').val().length == 0) {
                alert("Olvidó ingresar la observación");
                nuevoalias('#observaciones_tecnico').focus();
                return false;
            }else{
                if(confirm("¿Desea terminar esta Tarea?")){
                    var idm = nuevoalias("label#IdEvento").text();
                    var observacionesm = nuevoalias('#observaciones_tecnico').val();
                    $.ajax({
                        url: "modificar_observaciones_rep_rest.php",
                        method: "POST",
                        data: {observaciones: observacionesm, id: idm},
                        success: function(data){
                            nuevoalias("#modal_ver_abonos2").css("display", "none");
                            nuevoalias('#Calendario').fullCalendar('removeEvents');
                            nuevoalias('#Calendario').fullCalendar('refetchEvents');
                            alert(data);
                        }
                    });
                }
            }
        }else if (valor_input_detalle == 'Visita Técnica'){
            if (nuevoalias('#observaciones_tecnico').val().length == 0) {
                alert("Olvidó ingresar la observación");
                nuevoalias('#observaciones_tecnico').focus();
                return false;
            }else{
                if(confirm("¿Desea terminar esta Tarea?")){
                    var idm = nuevoalias("label#IdEvento").text();
                    var observacionesm = nuevoalias('#observaciones_tecnico').val();
                    $.ajax({
                        url: "modificar_observaciones_rep_rest.php",
                        method: "POST",
                        data: {observaciones: observacionesm, id: idm},
                        success: function(data){
                            nuevoalias("#modal_ver_abonos2").css("display", "none");
                            nuevoalias('#Calendario').fullCalendar('removeEvents');
                            nuevoalias('#Calendario').fullCalendar('refetchEvents');
                            alert(data);
                        }
                    });
                }
            }
        }
        nuevoalias("#modal_ver_abonos").css("display", "none");
    });
    nuevoalias(document).on("click","#dato_pincha_inst_modal",function(){
        var fecha_inst = nuevoalias("#fecha_lista000").text();
        var fecha_inst_aprox = nuevoalias("#fecha_lista000").text();
        var row = $(this).parent().parent();
        var descripcion = $(row).find('td:nth-child(8)').text();
        var id_nota_venta = $(this).data("id_notaventa");
        var numero_tarea = $(this).data("tarea");
        var observ_tecni= $(this).data("observaciones_tecnico");
        var observ_cliente = $(this).data("observaciones_cliente");
        if (numero_tarea >= '1'){
            alert("Ya se ha realizado la Tarea");
        }else{
            nuevoalias("#scroll5").scrollTop(0);
            nuevoalias("#modal_ver_abonos2").css("display", "none");
            nuevoalias("#fecha_lista20").text(fecha_inst);
            nuevoalias("#fecha_instalacion20").val(fecha_inst_aprox);
            nuevoalias("#IdNotaVenta_Inst").text(id_nota_venta);
            nuevoalias("#select_detalle_modal_inst").val('Instalación');
            nuevoalias("#observaciones_inst").val(observ_cliente);
            nuevoalias("#observaciones_tecnico_inst").val(observ_tecni);
            nuevoalias("#guardar_modal_inst").css("width","130px");
            nuevoalias("#guardar_modal_inst").css("display","block");
            buscar_descripcion_instalacion_tecnico(fecha_inst_aprox,'<?php echo $valor_nombre ?>',id_nota_venta);
            llamar_modal_instalacion();
        }
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
        if (numero_tarea == '1'){
            alert("Ya se ha realizado la Tarea");
        }else{
            nuevoalias("#scroll5").scrollTop(0);
            nuevoalias("#modal_ver_abonos2").css("display", "none");
            nuevoalias("#fecha_lista20").text(fecha_inst);
            nuevoalias("#fecha_instalacion20").val(fecha_inst_aprox);
            nuevoalias("#IdNotaVenta_Inst").text(id_nota_venta);
            nuevoalias("#select_detalle_modal_inst").val('Instalación');
            nuevoalias("#observaciones_inst").val(observ_cliente);
            nuevoalias("#observaciones_tecnico_inst").val(observ_tecni);
            nuevoalias("#guardar_modal_inst").css("width","130px");
            buscar_descripcion_instalacion_tecnico(fecha_inst_aprox,'<?php echo $valor_nombre ?>',id_nota_venta);
            llamar_modal_instalacion();
        }
    });*/
    nuevoalias("#guardar_modal_inst").click(function(){
        var idi = nuevoalias("label#IdNotaVenta_Inst").text();
        var observacionesi = nuevoalias('#observaciones_tecnico_inst').val();
        var informacion = nuevoalias("label#datos_instalacion").text();
        nuevoalias.ajax({
            url: "modificar_observaciones_inst.php",
            method: "POST",
            data: {observaciones: observacionesi, informacion: informacion, id: idi},
            success: function(data){
                nuevoalias("#modal_ver_abonos4").css("display", "none");
                nuevoalias('#Calendario').fullCalendar('removeEvents');
                nuevoalias('#Calendario').fullCalendar('refetchEvents');
                alert(data);
            }
        });
        nuevoalias("#modal_ver_abonos").css("display", "none");
    });

    nuevoalias(".modal-content").draggable({
            handle: ".cuadrado_modal"
        });
    nuevoalias(".modal-content2").draggable({
            handle: ".cuadrado_modal2"
    });
    nuevoalias(".modal-content3").draggable({
            handle: ".cuadrado_modal3"
    });
    nuevoalias(".modal-content4").draggable({
            handle: ".cuadrado_modal4"
    });
    nuevoalias(document).on("click","#guardar_medidas_restificacion",function(){
        if(confirm("¿Desea ingresar y terminar la Rectificación?")){
            var idrest= nuevoalias("label#IdRest_Medidas").text();
            var tecn = nuevoalias("label#nombre_instalador").text();
            var obs = nuevoalias("#observaciones_tecnico_rest").val();
            nuevoalias.ajax({
                url: "borrar_restificacion_tecnico.php",
                method: "POST",
                async: false,
                data: {idrest: idrest, tecn: tecn, obs: obs},
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
            var cl = nuevoalias("label#nombre_clientes").text();
            var fec = nuevoalias("label#fecha_red").text();
            nuevoalias.ajax({
                url: "ingresar_rectificacion_a_pago.php",
                method: "POST",
                data: {fecha_rect: fec, instalador: tecn, cliente: cl, idrect: idrest},
                success: function(data){}
            });
            nuevoalias("#modal_ver_abonos3").css("display", "none");
            nuevoalias("#modal_ver_abonos").css("display", "none");
            nuevoalias('#Calendario').fullCalendar('removeEvents');
            nuevoalias('#Calendario').fullCalendar('refetchEvents');
            alert("Medidas Ingresadas Correctamente");
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
                    tds += '<td contenteditable></td>';
                }else if (index == 2){
                    tds += '<td contenteditable></td>';
                }else if (index == 3){
                    tds += '<td>' + $(this).html() + '</td>';
                }else if (index == 4){
                    tds += '<td contenteditable></td>';
                }else if (index == 5){
                    tds += '<td contenteditable></td>';
                }else if (index == 6){
                    tds += '<td>' + $(this).html() + '</td>';
                }else if (index == 7){
                    tds += '<td>' + $(this).html() + '</td>';
                }else if (index == 8){
                    tds += '<td>' + $(this).html() + '</td>';
                }else if (index == 9){
                    tds += '<td>' + $(this).html() + '</td>';
                }else if (index == 10){
                    tds += '<td style="display:none">' + $(this).html() + '</td>';
                }else if (index == 11){
                    tds += '<td>' + $(this).html() + '</td>';
                }else if (index == 12){
                    tds += '<td>' + $(this).html() + '</td>';
                }else if (index == 13){
                    tds += '<td>' + $(this).html() + '</td>';
                }else if (index == 14){
                    tds += '<td>' + $(this).html() + '</td>';
                }else if (index == 15){
                    tds += '<td>' + $(this).html() + '</td>';
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
});

</script>
<p class="titulo75">SOCIEDAD FYD</p>
<p class="copy">Copyright © 2021 | Diseñado por N.A.B para Comercial F&amp;D</p>
</body>
</html>
