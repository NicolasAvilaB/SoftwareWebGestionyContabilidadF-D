<!DOCTYPE html>
<html lang="es">
<head>
<link href="./calendario/calendario.css" rel="stylesheet" type="text/css">
<link rel="stylesheet"  href="../Imagenes/jquery.dataTables.min.css" type="text/css">
<link href="./calendario/fullcalendar.min.css" rel="stylesheet" type="text/css">
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
<script src="./calendario/moment.min.js"></script>
<script src="./calendario/fullcalendar.min.js"></script>
<script src="./calendario/es-us.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
<body>
<img src="../Imagenes/fondo_login.jpg" id="fondo"/>
<p></p>
<div class="tablascroll2">
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
            <label><strong>Fecha Inicio:&nbsp;&nbsp;</strong><input type="date" id="fecha_inicio" name="fecha_inicio" min='2005-01-01' max='2100-12-31' placeholder="Fecha Inicio..." size="40" maxlength="100" autocomplete="off" /></label>
            <p>&nbsp;</p>
            <label><strong>Fecha Fin:&nbsp;&nbsp;</strong><input type="date" id="fecha_fin" name="fecha_fin" min='2005-01-01' max='2100-12-31' placeholder="Fecha Fin..." size="40" maxlength="100" autocomplete="off" /></label>
            <p>&nbsp;</p>
            <label><strong>Horario:&nbsp;&nbsp;</strong>
            <select id="select_horario" name="select_horario">
                <option value="1" disabled selected>Seleccione Horario...</option>
                <option value="Mañana">Mañana</option>
                <option value="Tarde">Tarde</option>
            </select></label>
            <p>&nbsp;</p>
            <label><strong>Vendedor/a:&nbsp;&nbsp;</strong>
            <?php
            	$id = $_POST["id"];
            	$select_detalle = $_POST["select_detalle"];
				$vend = $_POST["vend"];
            ?>
			<input type="text" id="select_vendedora" name="select_vendedora" placeholder="Vendedora..." size="30" maxlength="150" autocomplete="off" value="<?php echo $vend; ?>" disabled>
            </label>
            <p>&nbsp;</p>
            <label><strong>Detalle:&nbsp;&nbsp;</strong>
            <select id="select_detalle" name="select_detalle">
                <option value="1" disabled>Seleccione Detalle...</option>
                <?php
                if ($select_detalle == 'Reparacion'){
                    echo "<option value='Reparación' selected>Reparación</option>
                    <option value='Restificación'>Restificación</option>
                    <option value='Visita Técnica'>Visita Técnica</option>";
                }else if ($select_detalle == 'Restificacion'){
                    echo "<option value='Reparación'>Reparación</option>
                    <option value='Restificación' selected>Restificación</option>
                    <option value='Visita Técnica'>Visita Técnica</option>";
                }else if ($select_detalle == 'Visita Tecnica'){
                    echo "<option value='Reparación'>Reparación</option>
                    <option value='Restificación'>Restificación</option>
                    <option value='Visita Técnica' selected>Visita Técnica</option>";
                }
                ?>
            </select>
            </label>
            &nbsp;&nbsp;<button class="boton_ingresar" id='ingresar'>Ingresar</button>
            <p>&nbsp;</p>
            <label><strong>Buscar Cliente:&nbsp;&nbsp;</strong>
            <input list="lista_clientes" type="text" id="buscar_cliente" name="buscar_cliente" style="font-size: 1.1vw; padding:3px 3px 3px 10px; text-align:center;" placeholder="Nombre Cliente..." size="30" maxlength="100" autocomplete="off" value="<?php echo $id; ?>"/>
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
            <p>&nbsp;</p>
</div>
</div>
<div id="modal_ver_abonos" class="modal_ver_abonos" style="display:none;">
    <div class="modal-content">
        <aside id="cuadrado_modal" class="cuadrado_modal">
            <label class="adorno_botones_modal"><img src="../Imagenes/wincontrol_cerrar.png" id="close_modal" class="close_modal"></img></label>
            <label class= "titulo2">Consulta Calendario</label>
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
                    <input type="text" id="select_vendedora_modal" name="select_vendedora_modal" placeholder="Vendedora..." size="30" maxlength="150" autocomplete="off" value="<?php echo $vend; ?>" disabled>
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
                    &nbsp;&nbsp;<!--<button class="boton_dejarpendiente" id='dejarpendiente_modal'>Dejar Pendiente</button>--><button class="boton_datosrestificacion" id='medidas_restificacion' style="display:none;">Revisar Restificación</button>
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
            <label class= "titulo2">Consulta Rectificación</label>
        </aside>
        <div id="scroll4">
            <p>&nbsp;</p>
            <label id="IdRestificacion_id" style="display:none;"></label>
            <label id="nombre_instalador_restificacion" style="display:none;"></label>
            <!--<button class="boton_ingresar" id='boton_agregarfila_tabla_restificacion'>Agregar Fila</button>-->
            <p>&nbsp;</p>
            <div id="resultado_medidasrestificacion"></div>
            <br></br>
            <label><strong style="font-size: 1.2vw;">Observaciones Técnico:</strong></label>
            <p></p>
            &nbsp;<textarea id="observaciones_tecnico_m" name="observaciones_tecnico_m" style="width:300px; height:90px;" placeholder="Escriba Observaciones..." disabled></textarea>
            &nbsp;&nbsp;
            <!--<button class="boton_ingresar" id='guardar_medidas_restificacion'>Guardar Medidas</button>-->
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
            <textarea id="observaciones_tecnico_insta" name="observaciones_tecnico_insta" style="width:300px; height:90px;" placeholder="Escriba Observaciones..."></textarea><!--<button class="boton_dejarpendiente" id="dejarpendiente_inst_modal">Dejar Pendiente</button>-->
            <p>&nbsp;</p>
            <button class="boton_ingresar" id='guardar_modal_insta'>Guardar</button>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <div id="informes_inst"></div>
            <p>&nbsp;</p>
        </div>
    </div>
</div>
<script>
    var nuevoalias = jQuery.noConflict();
	nuevoalias(document).ready(function(){
        function obtener_datos_fecha_modal(texto, texto2, texto3){
            nuevoalias.ajax({
                url:"./calendario/horarios_x4_modal.php",
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
                url:"./calendario/buscar_cliente.php",
                method:"POST",
                data: {texto: texto},
                success: function(data){
                    nuevoalias("#resultado_busqueda").html(data);
                }
            });
        }
        obtener_datos_cliente(<?php echo $id; ?>);
        function obtener_datos_cliente_modal(texto){
            nuevoalias.ajax({
                url:"./calendario/buscar_cliente_modal.php",
                method:"POST",
                data: {texto: texto},
                success: function(data){
                    nuevoalias("#resultado_busqueda_modal").html(data);
                }
            });
        }
        function obtener_datos_resumentodo_deldia(texto, texto2){
            nuevoalias.ajax({
                url:"./calendario/buscar_resumentododia.php",
                method:"POST",
                data: {texto: texto, texto2: texto2},
                success: function(data){
                    nuevoalias("#resultadodia_resumentodo").html(data);
                }
            });
        }
        function obtener_datos_descripcion_instalacion_modal(texto, texto2){
            nuevoalias.ajax({
                url:"./calendario/buscar_descripcion_instalacion_modal.php",
                method:"POST",
                data: {texto: texto, texto2: texto2},
                success: function(data){
                    nuevoalias("#descripcion_instalacion").html(data);
                }
            });
        }
        function obtener_datos_descripcion_instalacion_modal_id(texto, texto2){
            nuevoalias.ajax({
                url:"./calendario/buscar_descripcion_instalacion_modal_id.php",
                method:"POST",
                data: {texto: texto, texto2: texto2},
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
                url: "./calendario/buscar_tabla_restificacion.php",
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
                url: "./calendario/descripcion_instalacion.php",
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
            crear_tabla_restificacion(id,idcliente,obsssss,nombretecnico);
            nuevoalias("#observaciones_tecnico_m").val(obsssss);
            llamar_modal5();
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
        var controladorTiempo1 = "";
        nuevoalias(document).on("keyup","#fecha_inicio_modal",function(){
          clearTimeout(controladorTiempo1);
          controladorTiempo1 = setTimeout(obtener_datos_fecha_modal(nuevoalias('input#fecha_inicio_modal').val(), "",nuevoalias('#tecnico_modal').val()), 220);
				});

        var controladorTiempo1 = "";
        nuevoalias(document).on("input","#fecha_inicio_modal",function(){
          clearTimeout(controladorTiempo1);
          controladorTiempo1 = setTimeout(obtener_datos_fecha_modal(nuevoalias('input#fecha_inicio_modal').val(), "",nuevoalias('#tecnico_modal').val()), 220);
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
                  obtener_datos_descripcion_instalacion_modal_id(ids, '<?php echo $valor_nombre;?>');
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
                  nuevoalias("#select_vendedora_modal").val(vendedorasa)
                  nuevoalias("#fecha_inicio_modal").val(FechaHora);
                  nuevoalias("#fecha_fin_modal").val(FechaHora);
                  var horario = "";
                  if (hor == 'Mañana 08:30a - 12:00a'){
                      horario = "Mañana";
                  }else if(hor == 'Tarde 13:00p - 18:00p'){
                      horario = "Tarde";
                  }
                  nuevoalias("#shorario_modal").text(horario);
                  nuevoalias("#select_horario_modal").val(horario);
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
                  if(estadodetarea == '1' || estadodetarea == '2'){
                      nuevoalias("#observaciones_modal").prop('disabled', true);
                      nuevoalias("#observaciones_tecnico").prop('disabled', true);
                      nuevoalias("#borrar_modal").css("visibility","hidden");
                      nuevoalias("#modificar_modal").css("visibility","hidden");
                  }else if(estadodetarea == '0'){
                      nuevoalias("#observaciones_modal").prop('disabled', false);
                      nuevoalias("#observaciones_tecnico").prop('disabled', false);
                      nuevoalias("#borrar_modal").css("visibility","visible");
                      nuevoalias("#modificar_modal").css("visibility","visible");
                  }
                  llamar_modal2();
                  nuevoalias("#informes").html("<a id='boton_generar_informe' href='generar_informe_rep_vis.php?id="+ids+"&idc="+idclientes+"&obser="+observaciones_tecnicos+"&tecni="+tecnico_t+"&obsercl="+observaciones_clientes+"&detalle="+tipo_dato+"&vendedora="+vendedorasa+"&vendedora="+vendedorasa+"&horario="+horario+"' type='button' value='View PDF' class='btn btn-primary' target='_blank'>Informe </a><!--<button class='boton_ingresar' id='informe_rep_vis'>Informe</button>");
                  var nuevo_hora = horario + " Ocupada";
                  obtener_datos_fecha_modal(FechaHora,nuevo_hora,tecnico_t);
                //}
                //nuevoalias("#color_modal").val(calEvent.color);
              }
        });
        nuevoalias('#Calendario').fullCalendar({
                header:{
                    left:'prevYear,prev,today,next,nextYear',
                    center:'title',
                    right:'basicDay,basicWeek,month',
                },
                events: {
                    url: "/Operario/Clientes/calendario/consultar_instalaciones_calendario.php",
                    type: 'POST',
                    data: function() {
                        return {
                           texto: '<?php echo $vend ?>'
                        };
                    }
                },
                //events:'/Calendario/consultar_instalaciones_calendario.php',
                eventRender: function(event, element, view){
                  return ['all', event.Instalador].indexOf(nuevoalias('#tecnicofiltro').val()) >= 0
                },
                eventClick:function(calEvent, jsEvent, view){
                    /*var tipo_dato = calEvent.tipo;
                    var estadotarea = calEvent.Estado_Tarea;
                    FechaHora = calEvent.start._i.split(" ");
                    if (tipo_dato == 'Instalación'){
                        nuevoalias("#inst").css("display", "block");
                        nuevoalias("#rep_rest").css("display", "none");
                        nuevoalias("#fecha_lista2").text(FechaHora[0]);
                        nuevoalias("#instalador").val(calEvent.Instalador);
                        nuevoalias("#fecha_instalacion").val(FechaHora[0]);
                        obtener_datos_descripcion_instalacion_modal(FechaHora[0], '<?php echo $valor_nombre;?>');
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
                        if(estadotarea == '1' || estadotarea == '2'){
                            nuevoalias("#observaciones_modal").prop('disabled', true);
                            nuevoalias("#observaciones_tecnico").prop('disabled', true);
                            nuevoalias("#borrar_modal").css("visibility","hidden");
                            nuevoalias("#modificar_modal").css("visibility","hidden");
                        }else if(estadotarea == '0'){
                            nuevoalias("#observaciones_modal").prop('disabled', false);
                            nuevoalias("#observaciones_tecnico").prop('disabled', false);
                            nuevoalias("#borrar_modal").css("visibility","visible");
                            nuevoalias("#modificar_modal").css("visibility","visible");
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
                    obtener_datos_resumentodo_deldia(date.format(), '<?php echo $valor_nombre;?>');
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
            }else{
                var horai, horaf = "";
                if (nuevoalias('#select_horario').val() == 'Mañana'){
                    horai = '08:30:00';
                    horaf = '12:00:00';
                }else if(nuevoalias('#select_horario').val() == 'Tarde'){
                    horai = '13:00:00';
                    horaf = '18:00:00';
                }
                var titulo = nuevoalias("#tecnico").val()+ " - " + nuevoalias('#select_detalle').val();
                var fechainicio = nuevoalias("#fecha_inicio").val()+" "+horai;
                var fechafin = nuevoalias("#fecha_fin").val()+" "+horaf;
                var tecnico = nuevoalias("#tecnico").val();
                var horario = nuevoalias("#select_horario").val();
                var vendedorass = nuevoalias("#select_vendedora").val();
                var detalle = nuevoalias('#select_detalle').val();
                var idcliente = nuevoalias('#buscar_cliente').val();
                var nombre = nuevoalias('#nombre_cliente').val();
                var direccion = nuevoalias('#direccion').val();
                var comuna = nuevoalias('#comuna').val();
                var telefono = nuevoalias('#telefono').val();
                var observaciones = nuevoalias('#observaciones').val();
                $.ajax({
                    url: "./calendario/insertar_encalendario.php",
                    method: "POST",
                    data: {titulo: titulo, fechainicio: fechainicio, fechafin: fechafin, tecnico: tecnico, horario: horario, detalle: detalle, idcliente: idcliente, nombre: nombre, direccion: direccion, comuna: comuna, telefono: telefono, observaciones: observaciones, vendedora: vendedorass},
                    success: function(data){
                        alert(data);
                        $('#tecnico').val('0');
                        $('#fecha_inicio').val('');
                        $('#fecha_fin').val('');
                        $('#select_horario').val('1');
                        $('#select_vendedora').val('0');
                        $('#select_detalle').val('1');
                        $('#buscar_cliente').val('');
                        $('#direccion').val('');
                        $('#comuna').val('');
                        $('#telefono').val('');
                        $('#observaciones').val('');
                        $('#resultado_busqueda').empty();
                        nuevoalias('#Calendario').fullCalendar('refetchEvents');
                    }
                });
            }
        }
    });
    nuevoalias("#borrar_modal").click(function(){
        var detalle = nuevoalias("label#detalle_modal_evento").text();
        if (confirm("¿Desea eliminar la "+detalle+"?")){
            var id = nuevoalias("label#IdEvento").text();
            var tecnico = nuevoalias("label#tecnico_modal_evento").text();
            if (detalle == 'Reparación' || detalle == 'Visita Técnica'){
                nuevoalias.ajax({
                    url: "./calendario/eliminar_evento.php",
                    method: "POST",
                    data: {id: id},
                    success: function(data){
                        nuevoalias("#modal_ver_abonos2").css("display", "none");
                        nuevoalias('#Calendario').fullCalendar('removeEvents', id);
                        alert(data);
                    }
                });
            }else if (detalle == 'Restificación'){
                nuevoalias.ajax({
                    url: "./calendario/borrar_restificacion_tecnico.php",
                    method: "POST",
                    async: false,
                    data: {idrest: id, tecn: tecnico},
                    success: function(data){}
                });
                nuevoalias.ajax({
                    url: "./calendario/eliminar_evento.php",
                    method: "POST",
                    data: {id: id},
                    success: function(data){
                        nuevoalias("#modal_ver_abonos2").css("display", "none");
                        nuevoalias('#Calendario').fullCalendar('removeEvents', id);
                        alert(data);
                    }
                });
            }
            nuevoalias.ajax({
                url: "./calendario/despejar_manana_tarde.php",
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
                url: "./calendario/modificar_estado_tarea.php",
                method: "POST",
                data: {idm: idm},
                success: function(data){
                    nuevoalias("#modal_ver_abonos2").css("display", "none");
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
                url: "./calendario/modificar_estado_tarea_inst.php",
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
            }else if (nuevoalias('#select_horario_modal option:selected').html() == 'Mañana Ocupada' || nuevoalias('#select_horario_modal option:selected').html() == 'Tarde Ocupada') {
								alert("Seleccione un Horario Disponible para el Técnico");
								nuevoalias('#select_horario_modal').focus();
								return false;
            }else{
                nuevoalias.ajax({
                    url: "./calendario/despejar_manana_tarde.php",
                    method: "POST",
                    data: {fecha: nuevoalias("#fecha_inicio_modal").val(), horario: nuevoalias("#shorario_modal").text(), tecnico: nuevoalias("#tecnico_modal").val()},
                    success: function(data){}
                });
                if (nuevoalias("#select_horario_modal").val() != 'Mañana' || nuevoalias("#select_horario_modal").val() != 'Tarde'){
                    nuevoalias.ajax({
                        url: "./calendario/ingresar_fecha.php",
                        method: "POST",
                        data: {texto: nuevoalias("#select_horario_modal").val(), texto2: nuevoalias("#fecha_inicio_modal").val(), texto3: nuevoalias('#select_horario_modal option:selected').html(), texto4:  nuevoalias("#tecnico_modal").val()},
                        success: function(data){
                        }
                    });
                }else if(nuevoalias("#select_horario_modal").val() == 'Mañana' || nuevoalias("#select_horario_modal").val() == 'Tarde')  {
                }
                var horai, horaf = "";
                if (nuevoalias('#select_horario_modal option:selected').html() == 'Mañana'){
                    horai = '08:30:00';
                    horaf = '12:00:00';
                }else if(nuevoalias('#select_horario_modal option:selected').html() == 'Tarde'){
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
                    url: "./calendario/modificar_calendario.php",
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
                    tds += '<td contenteditable>' + $(this).html() + '</td>';
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
                url: "./calendario/borrar_restificacion_tecnico.php",
                method: "POST",
                async: false,
                data: {idrest: idrest, tecn: tecn},
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
                    url: "./calendario/insertar_restificacion_tecnico.php",
                    method: "POST",
                    data: {idrest: idrest, tecn: tecn, n: n, ubic: ubic, piso: piso, fc: fc, ancho: ancho, alto: alto, motor: motor, manual: motor, tclick: tclick, crto: crto, cajon: cajon, guia: guia, ventana: ventana, perfiles: perfiles, escala: escala, lama: lama, color: color},
                    success: function(data){}
                });
            });
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
            url: "./calendario/modificar_observaciones_inst.php",
            method: "POST",
            data: {observaciones: observacionesi, observacionesa: observacionesa, informacion: informacion, id: idi},
            success: function(data){
                nuevoalias("#modal_ver_abonos7").css("display", "none");
                nuevoalias("#modal_ver_abonos").css("display", "none");
                nuevoalias('#Calendario').fullCalendar('removeEvents');
                nuevoalias('#Calendario').fullCalendar('refetchEvents');
                alert(data);
            }
        });
    });
</script>
</body>
</html>
