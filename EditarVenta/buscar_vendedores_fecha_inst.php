<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<link href="clientes.css" rel="stylesheet" type="text/css">
<script>
$.fn.pageMe = function(opts){
        var $this = this,
            defaults = {
                showPrevNext: false,
                hidePageNumbers: false
            },
            settings = $.extend(defaults, opts);

        var listElement = $this.find('tbody');
        var perPage = settings.perPage;
        var children = listElement.children();
        var pager = $('.pager');

        if (typeof settings.childSelector!="undefined") {
            children = listElement.find(settings.childSelector);
        }

        if (typeof settings.pagerSelector!="undefined") {
            pager = $(settings.pagerSelector);
        }

        var numItems = children.length;
        var numPages = Math.ceil(numItems/perPage);

        pager.data("curr",0);

        if (settings.showPrevNext){
            $('<button class="prev_link">Anterior</button>').appendTo(pager);
        }

        var curr = 0;
        while(numPages > curr && (settings.hidePageNumbers==false)){
		  	if (curr > 1){
			}else{
                $('<button class="page_link">'+(curr+1)+'</button>').appendTo(pager);
			}
            curr++;
        }
		  $('<a>...</a><button class="page_link">'+(curr)+'</button>').appendTo(pager);
		  $('#total_registros').text("de Total: "+numItems+ " registros");


        if (settings.showPrevNext){
            $('<button class="next_link">Siguiente</button>').appendTo(pager);
        }

        pager.find('.page_link:first').addClass('active');
        pager.find('.prev_link').hide();
        if (numPages<=1) {
            pager.find('.next_link').hide();
        }
      	pager.children().eq(1).addClass("active");

        children.hide();
        children.slice(0, perPage).show();

        pager.find(' .page_link').click(function(){
            var clickedPage = $(this).html().valueOf()-1;
            goTo(clickedPage,perPage);
            return false;
        });
        pager.find('.prev_link').click(function(){
            previous();
            return false;
        });
        pager.find(' .next_link').click(function(){
            next();
            return false;
        });

        function previous(){
            var goToPage = parseInt(pager.data("curr")) - 1;
				goTo(goToPage);
        }

        function next(){
            goToPage = parseInt(pager.data("curr")) + 1;
            goTo(goToPage);
        }

        function goTo(page){
            var startAt = page * perPage,
					endOn = startAt + perPage;
				var suma = parseInt(startAt + 1);
				$('#vista_registros').text("Vista de "+suma+ "");
				if (endOn > numItems){
					$('#a_registros').text("a "+numItems+ ", ");
				}else{
					$('#a_registros').text("a "+endOn+ ", ");
				}
            children.css('display','none').slice(startAt, endOn).show();

            if (page>=1) {
                pager.find('.prev_link').show();
            }
            else {
                pager.find('.prev_link').hide();
            }

            if (page<(numPages-1)) {
                pager.find('.next_link').show();
            }
            else {
                pager.find('.next_link').hide();
            }
            pager.data("curr",page);
          	pager.children().removeClass("active");
            pager.children().eq(page+1).addClass("active");
        }
    };

    $(document).ready(function(){
        $('#myPager').empty();
	 	var can = parseInt($("#cant_filas").val());
		$('#tabla_clientes').pageMe({pagerSelector:'#myPager',showPrevNext:true,hidePageNumbers:false,perPage:parseInt(can)});
		var vista_ah = 1;
		$('#vista_registros').text("Vista de "+vista_ah+ "");
		$('#a_registros').text("a "+can+ ", ");
		$("#cant_filas").change(function(){
			$('#vista_registros').text("Vista de "+vista_ah+ "");
			var can2 = parseInt($("#cant_filas").val());
			$('#a_registros').text("a "+can2+ ", ");
			$('#myPager').empty();
			$('#tabla_clientes').pageMe({pagerSelector:'#myPager',showPrevNext:true,hidePageNumbers:false,perPage: can2});
  		});
		$("#search").keyup(function(){
        _this = this;
		  	var buscador_tabla = $("#search").val();
		  	if (buscador_tabla == 0 || buscador_tabla == null){
				$('#myPager').empty();
				var can2 = parseInt($("#cant_filas").val());
					$('#tabla_clientes').pageMe({pagerSelector:'#myPager',showPrevNext:true,hidePageNumbers:false,perPage:parseInt(can2)});
					var totalRow = $('#tabla_clientes tr:visible').length;
					$('#a_registros').text("a "+parseInt(totalRow-1)+ ", ");
			}else{
				$.each($("#tabla_clientes tbody tr"), function() {
					$('#vista_registros').text("Vista de 1 ");
						if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
							$(this).hide();
						else
							$(this).show();
					var totalRow = $('#tabla_clientes tr:visible').length;
					var resta_fila = 0;
					resta_fila = parseInt(totalRow - 1);
					$('#a_registros').text("a "+resta_fila+ ", ");
					if (resta_fila == 0){
						$('#vista_registros').text("Vista de 0 ");
					}
				});
			}
        });
    });
</script>
</head>
<body>
<br></br>
<?php
$conexion = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}
$conexion2 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
$conexion3 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
$conexion4 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
$conexion5 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
$conexion6 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
mysqli_set_charset($conexion2,"utf8");
mysqli_set_charset($conexion6,"utf8");
$texto = $_POST["texto"];
if($consulta = $conexion->query("Call Buscar_NotaVenta_Edicion_Abono_Fecha_Instalacion ('$texto')")){
    echo "<a>Número de Filas: </a>
            <select id='cant_filas'>
            	<option>10</option>
            	<option>25</option>
            	<option>50</option>
            	<option>100</option>
            	<option>150</option>
            	<option>200</option>
            	<option>250</option>
            	<option>300</option>
            	<option>350</option>
            	<option>400</option>
            	<option>450</option>
            	<option>500</option>
            </select>
    <table id='tabla_clientes'>
            <thead>
                <tr>
                    <th>N° Nota Venta</th>
                    <th>Técnico</th>
                    <th>Rectificador</th>
                    <th>Fecha Fabricación</th>
                    <th>Fecha Instalacion Aprox</th>
                    <th>Efectuada</th>
                    <th>Vendedor/a</th>
                    <th>Distribuidor</th>
                    <th>Fecha Nota Venta</th>
                    <th>Total ($)</th>
                    <th></th>
                    <th>Tipo</th>
                    <th>Horario</th>
                    <th style='display:none;'></th>
                </tr>
            </thead>
        <tbody id='agregar_fila'>
        ";
    if ($consulta) {
        while($row = $consulta->fetch_assoc()){
            $instalador_per = $row["Instalador"];
            $rectificador_per = $row["Rectificador"];
            $id_no = $row["Id"];
            $horbloq = $row["Horario_Bloquear"];
            $vendedora = $row["Vendedora"];
            $distribuidor = $row["Distribuidor"];
            $nombre_cliente = $row["N_Cliente"];
            echo "<tr>
                    <td>".$row["Id"]."</td>
                    <td><input list='lista_instalador' id='instalador_add2' type='text' style='text-align:center' placeholder='Busque Instalador...' size='30' maxlength='105' autocomplete='off' value='".$instalador_per."'/>
                    <datalist id='lista_instalador'>";
                    $ejecutar3 = mysqli_query($conexion3,"select Instalador from Instaladores where Estado = 'Desactivar'");
                    mysqli_set_charset($conexion3,"utf8");
                    while ($row3 = mysqli_fetch_array($ejecutar3)) {
                        echo "<option>".$row3[0]."</option>";
                    }
                    echo "</datalist></td>
                    <td>
                    <input list='lista_rectificador' id='rectificador_add2' type='text' style='text-align:center' placeholder='Busque Rectificador...' size='30' maxlength='105' autocomplete='off' value='".$rectificador_per."'/>
                        <datalist id='lista_rectificador'>";
                        $ejecutar4 = mysqli_query($conexion4,"select Rectificador from Rectificadores where Estado = 'Desactivar'");
                        mysqli_set_charset($conexion4,"utf8");
                        while ($row4 = mysqli_fetch_array($ejecutar4)) {
                            echo "<option>".$row4[0]."</option>";
                        }
                        echo "</datalist></td>
                    <td><input type='date' value='".$row["Fecha_Fabricacion"]."'/></td>
                    <td><input type='date' value='".$row["Fecha_Instalacion"]."'/></td>
                    <td><input type='date' value='".$row["Fecha_Instalada"]."'/></td>
                    <td><input list='lista_vendedora' id='vendedora_add2' type='text' style='text-align:center' placeholder='Busque Vendedora...' size='30' maxlength='105' autocomplete='off' value='".$vendedora."'/>
                        <datalist id='lista_vendedora'>";
                        $ejecutar60 = mysqli_query($conexion6,"select Nombre from Vendedores");
                        mysqli_set_charset($conexion6,"utf8");
                        mysqli_set_charset($ejecutar60,"utf8");
                        while ($row60 = mysqli_fetch_array($ejecutar60)) {
                            $vend = utf8_encode($row60[0]);
                            echo "<option>".utf8_decode($vend)."</option>";
                        }
                        echo "</datalist></td>
                        <td contenteditable>".$distribuidor."</td>
                        <td><input type='date' value='".$row["FechaIngreso"]."'/></td>
                        <td contenteditable>".$row["Total"]."</td>
                        <td><button id='quitar_completo' data-id_notaventa='".$row["Id"]."'>Dejar Pendiente</button></td>
                        <td>";
                            $conexion223 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
                            mysqli_set_charset($conexion223,"utf8");
                            $ejecutar223 = mysqli_query($conexion223,"select NombreOtros from Otros where Estado = 'Desactivar' and Apar_Inicio ='Si'");
                            mysqli_set_charset($conexion223,"utf8");
                            echo "<select class='tipo' id='tipo' name='tipo'>
                            <option value='0' disabled selected>Seleccione Tipo...</option>
                            <option value='Instalacion'>Instalación</option>";
                                while ($row223 = mysqli_fetch_array($ejecutar223)) {
                                    $valor_nombre_emp = $row223[0];

                                        echo "<option value='$valor_nombre_emp'>".$valor_nombre_emp."</option>";

                                    //echo "<option value='$valor_nombre_emp'>".$valor_nombre_emp."</option>";
                                }
                            echo "</select><button id='agregar_tipo' type='button'>&nbsp;+&nbsp;</button>
                            <button id='quitar_tipo' type='button'>&nbsp;-&nbsp;</button>
                            <p id='contador_tipo' style='display:none;'>0</p>
                            <br></br>";
                            $dom = "";
                            $conexion5 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
                            mysqli_set_charset($conexion5,"utf8");
                            $ejecutar5 = mysqli_query($conexion5,"select Tipo from Pagos where NotaVenta = '$id_no'");
                            mysqli_set_charset($conexion5,"utf8");
                            $conttipo = 0;
                            while ($row5 = mysqli_fetch_array($ejecutar5)) {
                                $conttipo += 1;
                                $valor_tipos = $row5[0];
                                $dom .= "<p></p><input list='lista_tipos' type='text' placeholder='Busque Tipo...' style='text-align:center;width:85%;' name='input_tipo_usado[]' className='inputti' autocomplete='off' data-tipo_input='".$valor_tipos."' value='".$valor_tipos."' id='inputtiu".$conttipo."'/><button id='$conttipo' class='boton_quitar' data-notaventa='".$row["Id"]."' data-tipo='".$valor_tipos."'>&nbsp;X&nbsp</button>";
                            }
                        echo $dom."</td><td>
                        <select id='horario_bloquear' name='horario_bloquear'>";
                            if ($horbloq == "Mañana"){
                                echo "<option value='0' disabled>Seleccione Horario...</option>
                                <option value='Mañana' selected>Mañana</option>
                                <option value='Tarde'>Tarde</option>
                                <option value='Dia'>Dia</option>
                                <option value='Desocupar'>Desocupar</option>";
                            }else if ($horbloq == "Tarde"){
                                echo "<option value='0' disabled>Seleccione Horario...</option>
                                <option value='Mañana'>Mañana</option>
                                <option value='Tarde' selected>Tarde</option>
                                <option value='Dia'>Dia</option>
                                <option value='Desocupar'>Desocupar</option>";
                            }else if ($horbloq == "Dia"){
                                echo "<option value='0' disabled>Seleccione Horario...</option>
                                <option value='Mañana'>Mañana</option>
                                <option value='Tarde'>Tarde</option>
                                <option value='Dia'selected>Dia</option>
                                <option value='Desocupar'>Desocupar</option>";
                            }else if ($horbloq == "Desocupar"){
                                echo "<option value='0' disabled>Seleccione Horario...</option>
                                <option value='Mañana'>Mañana</option>
                                <option value='Tarde'>Tarde</option>
                                <option value='Dia'>Dia</option>
                                <option value='Desocupar' selected>Desocupar</option>";
                            }else{
                                echo "<option value='0' selected disabled>Seleccione Horario...</option>
                                <option value='Mañana'>Mañana</option>
                                <option value='Tarde'>Tarde</option>
                                <option value='Dia'>Dia</option>
                                <option value='Desocupar'>Desocupar</option>";
                            }
                        echo "</select></td>
                            <td style='display:none;'>".$nombre_cliente."</td>
                        </tr>";
        }
    }
    echo "</tbody></table>
    <a id='vista_registros'></a>
	<a id='a_registros'></a>
    <a id='total_registros'></a>
    <div class='pagination pagination-lg pager' id='myPager' style='float:right;'></div>
    ";
    $consulta->close();
    $conexion->more_results();
};
?>
</body>
</html>
