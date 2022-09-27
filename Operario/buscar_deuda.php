<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<link href="menu.css" rel="stylesheet" type="text/css">
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
		  		if (curr > 2){
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
		$('#tabla_deuda').pageMe({pagerSelector:'#myPager',showPrevNext:true,hidePageNumbers:false,perPage:parseInt(can)});
		var vista_ah = 1;
		$('#vista_registros').text("Vista de "+vista_ah+ "");
		$('#a_registros').text("a "+can+ ", ");
		$("#cant_filas").change(function(){
			$('#vista_registros').text("Vista de "+vista_ah+ "");
			var can2 = parseInt($("#cant_filas").val());
			$('#a_registros').text("a "+can2+ ", ");
			$('#myPager').empty();
			$('#tabla_deuda').pageMe({pagerSelector:'#myPager',showPrevNext:true,hidePageNumbers:false,perPage: can2});
  		});
		$("#search").keyup(function(){
        _this = this;
		  	var buscador_tabla = $("#search").val();
		  	if (buscador_tabla == 0 || buscador_tabla == null){
				$('#myPager').empty();
				var can2 = parseInt($("#cant_filas").val());
					$('#tabla_deuda').pageMe({pagerSelector:'#myPager',showPrevNext:true,hidePageNumbers:false,perPage:parseInt(can2)});
					var totalRow = $('#tabla_deuda tr:visible').length;
					$('#a_registros').text("a "+parseInt(totalRow-1)+ ", ");
			}else{
				$.each($("#tabla_deuda tbody tr"), function() {
					$('#vista_registros').text("Vista de 1 ");
						if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
							$(this).hide();
						else
							$(this).show();
					var totalRow = $('#tabla_deuda tr:visible').length;
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
<?php
$conexion = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}
$texto = $_POST["texto"];
if($consulta = $conexion->query("Call Buscar_NotaVentas_Abonos_Vendedoras('$texto')")){
     echo "<table id='tabla_deuda' align='center'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nota de Venta</th>
                    <th>Nombre Cliente</th>
                    <th>Fecha Venta</th>
                    <th>Fabricación</th>
                    <th>Fecha Instalación Aprox</th>
                    <th>Efectuada</th>
                    <th>Deuda Cliente</th>
                    <th>Técnico</th>
                    <th>Rectificador</th>
                    <th>Observaciones</th>
                    <th>Horario</th>
                </tr>
            </thead>
            <tbody>";
    if ($consulta) {
        while($row = $consulta->fetch_assoc()){
            $id_venta = $row["Id"];
            $mediopagos = "";
            $fecha_fab = date("d-m-Y",strtotime($row["Fecha_Fabricacion"]));
            $fecha_instalacion = date("d-m-Y",strtotime($row["Fecha_Instalacion"]));
            $fecha_instalada = date("d-m-Y",strtotime($row["Fecha_Instalada"]));
            $instalador_pers = $row["Instalador"];
            $rectificador_pers = $row["Rectificador"];
            $observaciones = $row["Observaciones"];
            $resta = intval($row["Total"]);
            $hor_blo = $row["Horario_Bloquear"];
            if($fecha_fab == '00-00-0000' || $fecha_fab == '30-11--0001'){
                $fecha_fab = "No hay fecha asignada";
            }
            if($fecha_instalacion == '0000-00-00' || $fecha_instalacion == '30-11--0001'){
                $fecha_instalacion = "No hay fecha asignada";
            }
            if($fecha_instalada == '0000-00-00' || $fecha_instalada == '30-11--0001'){
                $fecha_instalada = "No hay fecha asignada";
            }
            $fecha2 = date("d-m-Y",strtotime($row["FechaIngreso"]));
            echo "
                <tr>
                    <td>".$row["IdCliente"]."</td>
                    <td>".$id_venta."</td>";
                    /*$conexion3 = new mysqli("127.0.0.1","cso72566_usersocifyd","usersocifyd","cso72566_socifyd");
                    $consulta000 = $conexion3->query("Call Consultar_MedioPago_Inicio_Vendedora ('$id_venta')");
                    if($row000 = $consulta000->fetch_assoc()){
                        $mediopagos = $row000["MedioPago"];
                    }*/
                    echo "<td>".$row["N_Cliente"]."</td>
                    <td>".$fecha2."</td>
                    <td>".$fecha_fab."</td>
                    <td>".$fecha_instalacion."</td>
                    <td>".$fecha_instalada."</td>
                    <td>$ ".number_format(intval($resta), 0, ',', '.')."</td>
                    <td>".$instalador_pers."</td>
                    <td>".$rectificador_pers."</td>
                    <td>".$observaciones."</td>
                    <td>".$hor_blo."</td>
                </tr>
            ";
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
