<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
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
		$('#tabla_cotizaciones').pageMe({pagerSelector:'#myPager',showPrevNext:true,hidePageNumbers:false,perPage:parseInt(can)});
		var vista_ah = 1;
		$('#vista_registros').text("Vista de "+vista_ah+ "");
		$('#a_registros').text("a "+can+ ", ");
		$("#cant_filas").change(function(){
			$('#vista_registros').text("Vista de "+vista_ah+ "");
			var can2 = parseInt($("#cant_filas").val());
			$('#a_registros').text("a "+can2+ ", ");
			$('#myPager').empty();
			$('#tabla_cotizaciones').pageMe({pagerSelector:'#myPager',showPrevNext:true,hidePageNumbers:false,perPage: can2});
  		});
		$("#search").keyup(function(){
        _this = this;
		  	var buscador_tabla = $("#search").val();
		  	if (buscador_tabla == 0 || buscador_tabla == null){
				$('#myPager').empty();
				var can2 = parseInt($("#cant_filas").val());	
					$('#tabla_cotizaciones').pageMe({pagerSelector:'#myPager',showPrevNext:true,hidePageNumbers:false,perPage:parseInt(can2)});
					var totalRow = $('#tabla_cotizaciones tr:visible').length;
					$('#a_registros').text("a "+parseInt(totalRow-1)+ ", ");
			}else{
				$.each($("#tabla_cotizaciones tbody tr"), function() {
					$('#vista_registros').text("Vista de 1 ");
						if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
							$(this).hide();
						else
							$(this).show();
					var totalRow = $('#tabla_cotizaciones tr:visible').length;
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
<div class="grid-container">
    <!--<input type="text" class="grid-item" id="nombre_add" name="nombre_add" placeholder="Nombre Cliente..." size="30" maxlength="70" autocomplete="off"/>
    <input type="text" class="grid-item" id="direccion_add" name="direccion_add" placeholder="Direccion..." size="30" maxlength="70" autocomplete="off"/>
    <input type="text" class="grid-item" id="telefono_add" name="telefono_add" placeholder="Tel??fono..." size="30" maxlength="70" autocomplete="off"/>
    <input type="text" class="grid-item" id="email_add" name="email_add" placeholder="Email..." size="30" maxlength="70" autocomplete="off"/>
    <input type="text" class="grid-item" id="comuna_add" name="comuna_add" placeholder="Comuna..." size="30" maxlength="70" autocomplete="off"/>
    <input type="date" class="grid-item" id="fecha_add" name="fecha_add" placeholder="Fecha Cliente..." size="30" maxlength="70" autocomplete="off"/>
    <button class="boton_ingresar" id='add'>Ingresar</button><button id="boton_guardar_modificacion" class="boton_modificar" id='add'>Guardar</button>-->
</div>
    <label id="id_cliente" style="visibility: hidden;"></label>

<p></p>
<?php
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}
$id_empresa= $_POST["id_empresa"];
if($consulta = mysqli_query($conexion, "Call Buscar_Cotizaciones_Todo ('$id_empresa')")){
    echo "<a>N??mero de Filas: </a>
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
            <div style='float:right;'>
            	<a>Buscar en Tabla: </a><input id='search' type='text' autocomplete='off'/>
            </div>
        <table id='tabla_cotizaciones' align='center'>
            <thead>
                <tr>
                    <th>ID Cliente</th>
                    <th>N?? Cot</th>
                    <th>Cliente</th>
                    <th>Empresa</th>
                    <th>Producto</th>
                    <th>Fecha Ingreso</th>
                    <th>Total</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>";
    if ($consulta) {
        while($row = mysqli_fetch_array($consulta)){
            $idc = $row[0];
            $id = $row[1];
            $producto = $row[4];
            $total = 0;
    	    $cantidad = 0;
    	    $resto_cotizacion = 0;
    	    /*while($resultados2 = mysqli_fetch_array($consulta2)) {
    	        $cantidad = $resultados2[0];
                if ($cantidad == "" ||$cantidad == " " || $cantidad == 0){
                    $cantidad = 1;
                }
    	    }*/
                $conexion232 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd"); 
                mysqli_set_charset($conexion232,"utf8");
                $consulta232 = mysqli_query($conexion232, "select Valor from Descuento_B_Cotizacion where IdCotizacion = '$id'") or die ("P: ".mysqli_error($conexion232));
                if($resultados232 = mysqli_fetch_array($consulta232)) {
                    $resto_cotizacion = $resultados232[0];
                }
                $fecha_ingreso = date("d-m-Y",strtotime($row[5]));
                echo "<tr>
                        <td>".$row[0]."</td>
                        <td>".$row[1]."</td>
                        <td>".$row[2]."</td>
                        <td>".$row[3]."</td>
                        <td>".$producto."</td>
                        <td>".$fecha_ingreso."</td>
                        <td>$ ".number_format(intval($row[6]) - intval($resto_cotizacion), 0, ',', '.')."</td>
                        ";
                        if ($producto == "Persianas"){
                            echo "<td><a id='boton_ver' href='generar_cotizacionpdf.php?id=".$id."&idc=".$idc."' type='button' value='View PDF' class='btn btn-primary' target='_blank'>Ver</td>";
                        }elseif ($producto == "Rollers"){
                            echo "<td><a id='boton_ver' href='generar_cotizacion_rollerpdf.php?id=".$id."&idc=".$idc."' type='button' value='View PDF' class='btn btn-primary' target='_blank'>Ver</td>";
                        }elseif ($producto == "Repuestos"){
                            echo "<td><a id='boton_ver' href='generar_cotizacion_repuestopdf.php?id=".$id."&idc=".$idc."' type='button' value='View PDF' class='btn btn-primary' target='_blank'>Ver</td>";
                        }elseif ($producto == "Otros"){
                            echo "<td><a id='boton_ver' href='generar_cotizacion_otrospdf.php?id=".$id."&idc=".$idc."' type='button' value='View PDF' class='btn btn-primary' target='_blank'>Ver</td>";
                        }
                        echo "<td><button id='pnv'>Nota Venta</button></td>
                        <td><button id='mod'>Modificar</button></td>
                        <td><button id='eliminar' data-producto='".$producto."' data-id_eliminar='".$row[1]."'>Eliminar </button></td>
                    </tr>";
        }
    }
    echo "</tbody></table> 
    <a id='vista_registros'></a>
	<a id='a_registros'></a>
    <a id='total_registros'></a>
    <div class='pagination pagination-lg pager' id='myPager' style='float:right;'></div>";
    $consulta->close();
    $conexion->more_results();
};
?>
</body>
</html>
