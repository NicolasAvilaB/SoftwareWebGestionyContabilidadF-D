<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<link href="clientes.css" rel="stylesheet" type="text/css">
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
<!--<link rel="stylesheet"  href="../Imagenes/jquery.dataTables.min.css" type="text/css">-->
<!--<script src="../Imagenes/jquery.dataTables.min.js"></script>-->
<script>
$(document).ready( function () {
    //$('#tabla_clientes').DataTable();
    $('#nombre_add').on('input', function (e) {
        if (!/^[ a-z0-9áéíóúüñ.-.@-@]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^ a-z0-9áéíóúüñ]+/ig,"");
        }
    });
    /*$('#direccion_add').on('input', function (e) {
        if (!/^[ a-z0-9áéíóúüñ]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^ a-z0-9áéíóúüñ]+/ig,"");
        }
    });*/
    $('#telefono_add').on('input', function (e) {
        if (!/^[0-9]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^0-9]+/ig,"");
        }
    });
    /*$('#comuna_add').on('input', function (e) {
        if (!/^[ a-z0-9áéíóúüñ]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^ a-z0-9áéíóúüñ]+/ig,"");
        }
    });*/
});
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
<p></p>
<?php
$conexion = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}
$texto = $_POST["texto"];
if($consulta = $conexion->query("Call Buscar_Clientes ('$texto')")){
    echo "<br></br>
            <a>Número de Filas: </a>
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
        <table id='tabla_clientes' align='center'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Comuna</th>
                    <th>Fecha Ingreso</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
        ";
    if ($consulta) {
        while($row = $consulta->fetch_assoc()){
            $fecha_cl = date("d-m-Y",strtotime($row["FechaIngreso"]));
            $id = $row["Id"];
            $conexion2 = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
            $ejecutar2 = $conexion2->query("Call Buscar_Cliente_Vendido_Deuda_Operario('$id')");
            echo "<tr><td>".$id."</td>";
                    if ($row2 = $ejecutar2->fetch_assoc())
                	{
                        $valor_venta = $row2['Venta'];
                        $valor_deuda = $row2['Deuda'];
                        if ($valor_venta == 1){
                            echo "<td id='nombre_cliente' class='CellWithComment' data-id_usuario='".$row["Id"]."' style='background-color:green; color:white;' contenteditable>".$row["Nombre"]."<span class='CellComment'>Vendido</span></td>";
                        }else if($valor_venta == 0){
                            echo "<td id='nombre_cliente' data-id_usuario='".$row["Id"]."' contenteditable>".$row["Nombre"]."</td>";
                        }
                        if ($valor_deuda == 1){
                            echo "<td id='direccion_cliente' class='CellWithComment' data-id_usuario='".$row["Id"]."' style='background-color:#b30000; color:white;' contenteditable>".$row["Direccion"]."<span class='CellComment'>Deuda</span></td>";
                        }else if($valor_deuda == 0){
                            echo "<td id='direccion_cliente' contenteditable>".$row["Direccion"]."</td>";
                        }
                	}
                    echo "<td id='telefono_cliente'  contenteditable>".$row["Telefono"]."</td>
                    <td id='email_cliente'  contenteditable>".$row["Email"]."</td>
                    <td id='comuna_cliente'  contenteditable>".$row["Comuna"]."</td>
                    <td id='fecha_cliente' >".$fecha_cl."</td>
                    <td><button id='modificar' class='modificar_cliente' data-id_modificar='".$row["Id"]."'>Modificar Cliente</td>
                    <td><button id='cotizar' class='cotizar_cliente' data-id_cotizar='".$row["Id"]."'>Cotizar</td>
                    <td><button id='vis_rest' class='visita_restificacion' data-idcliente='".$row["Id"]."'>Calendario</td>
                </tr>";
            $ejecutar2->close();
            $conexion2->more_results();
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
