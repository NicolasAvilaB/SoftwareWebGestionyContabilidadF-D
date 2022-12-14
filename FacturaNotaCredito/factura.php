<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<noscript>
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=java.html">
</noscript>
<style type="text/css">
@import url("factura.css");
</style>
<link href="factura.css" rel="stylesheet" type="text/css">
<link rel="stylesheet"  href="../Imagenes/jquery.dataTables.min.css" type="text/css">
<link rel="icon" href="../Imagenes/logofinder.png">
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
<script src="../Imagenes/jquery.dataTables.min.js"></script>
<script src="https://www.w3schools.com/lib/w3.js"></script>
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
            success: function(data){
                $("#result").html(data)
            }
        });
    }
    function obtener_datos_factura_credito(texto){
        $.ajax({
            url:"buscar_factura_credito.php",
            method:"POST",
            data: {texto: texto},
            success: function(data){
                $("#result").html(data)
            }
        });
    }
    function obtener_datos_credito(texto){
        $.ajax({
            url:"buscar_credito.php",
            method:"POST",
            data: {texto: texto},
            success: function(data){
                $("#result").html(data)
            }
        })
    }
    function obtener_datos_factura(texto){
        $.ajax({
            url:"buscar_factura.php",
            method:"POST",
            data: {texto: texto},
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

    //ao
    function obtener_datos_filtrados_mes_ano_empresa_not(texto, texto2, texto3){
        $.ajax({
            url:"buscar_filtracion_mes_ano_empresa_not.php",
            method:"POST",
            data: {texto: texto, texto2: texto2, texto3: texto3},
            success: function(data){
                $("#result").html(data)
            }
        });
    }
    function obtener_datos_filtrados_mes_ano_not(texto, texto2){
        $.ajax({
            url:"buscar_filtracion_mes_ano_not.php",
            method:"POST",
            data: {texto: texto, texto2: texto2},
            success: function(data){
                $("#result").html(data)
            }
        });
    }
    function obtener_datos_filtrados_empr_ano_not(texto, texto2){
        $.ajax({
            url:"buscar_filtracion_empr_ano_not.php",
            method:"POST",
            data: {texto: texto, texto2: texto2},
            success: function(data){
                $("#result").html(data)
            }
        });
    }
    function obtener_datos_filtrados_ano_not(texto){
        $.ajax({
            url:"buscar_filtracion_ano_not.php",
            method:"POST",
            data: {texto: texto},
            success: function(data){
                $("#result").html(data)
            }
        });
    }

    //sjiusf

    function obtener_datos_filtrados_mes_ano_empresa_credito(texto, texto2, texto3){
        $.ajax({
            url:"buscar_filtracion_mes_ano_empresa_credito.php",
            method:"POST",
            data: {texto: texto, texto2: texto2, texto3: texto3},
            success: function(data){
                $("#result").html(data)
            }
        });
    }
    function obtener_datos_filtrados_mes_ano_credito(texto, texto2){
        $.ajax({
            url:"buscar_filtracion_mes_ano_credito.php",
            method:"POST",
            data: {texto: texto, texto2: texto2},
            success: function(data){
                $("#result").html(data)
            }
        });
    }
    function obtener_datos_filtrados_empr_ano_credito(texto, texto2){
        $.ajax({
            url:"buscar_filtracion_empr_ano_credito.php",
            method:"POST",
            data: {texto: texto, texto2: texto2},
            success: function(data){
                $("#result").html(data)
            }
        });
    }
    function obtener_datos_filtrados_ano_credito(texto){
        $.ajax({
            url:"buscar_filtracion_ano_credito.php",
            method:"POST",
            data: {texto: texto},
            success: function(data){
                $("#result").html(data)
            }
        });
    }
    w3.hide('#boton_guardar_modificacion');
    obtener_datos_todo();
    $("input#input_cliente").focus();
    //obtener_datos("vacio");

    $(document).on("click","#modificar",function(){
        var row = $(this).parent().parent();
        var tipo = $(this).data("tipo");
        var id = $(row).find('td:nth-child(1)').text();
        var notaventa = $(row).find('td:nth-child(4)').text();
        var fecha = $(row).find('td:nth-child(5)').find('input').val();
        var valor = $(row).find('td:nth-child(6)').text();
        $.ajax({
            url: "actualizar_todo.php",
            method: "POST",
            data: {notaventa: notaventa, fecha: fecha, valor: valor, tipo: tipo, id: id},
            success: function(data){
                alert(data);
            }
        });
        obtener_datos_todo();
    });

    $(document).on("click","#modificar_factura",function(){
        var row = $(this).parent().parent();
        var id = $(row).find('td:nth-child(1)').text();
        var notaventa = $(row).find('td:nth-child(3)').text();
        var fecha = $(row).find('td:nth-child(4)').find('input').val();
        var valor = $(row).find('td:nth-child(5)').text();
        $.ajax({
            url: "actualizar_factura.php",
            method: "POST",
            data: {notaventa: notaventa, fecha: fecha, valor: valor, id: id},
            success: function(data){
                alert(data);
            }
        });
        obtener_datos_factura("");
    });

    $(document).on("click","#modificar_credito",function(){
        var row = $(this).parent().parent();
        var id = $(row).find('td:nth-child(1)').text();
        var notaventa = $(row).find('td:nth-child(3)').text();
        var fecha = $(row).find('td:nth-child(4)').find('input').val();
        var valor = $(row).find('td:nth-child(5)').text();
        $.ajax({
            url: "actualizar_credito.php",
            method: "POST",
            data: {notaventa: notaventa, fecha: fecha, valor: valor, id: id},
            success: function(data){
                alert(data);
            }
        });
        obtener_datos_credito("");
    });

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
    var controladorTiempo6 = "";
    function buscar_facturas_admin(){
        var buscar = $("input#input_cliente").val();
        if (buscar == ""){
            $("input#input_cliente").focus();
            obtener_datos_factura_credito("vacio");
        }else{
            obtener_datos_factura_credito(buscar);
        }
    }

    $(document).on("keyup","#input_cliente", function(){
        clearTimeout(controladorTiempo6);
        controladorTiempo6 = setTimeout(buscar_facturas_admin, 220);
    });

    $(document).on("change","#select_documento", function(){
        var dc = $("#select_documento").val();
        if (dc == 'Factura'){
            obtener_datos_factura("");
        }else if (dc == 'Credito'){
            obtener_datos_credito("");
        }
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
    $(document).on("click","#filtrar_notaventa",function(){
        var mes = $("#select_mes1").val();
        var ano = $("#select_ano1").val();
        var empr = $("#empresa_seleccionada").val();
        var dc = $("#select_documento").val();
        if (dc == 'Factura'){
            if (empr == '1' && mes != '101'){
                obtener_datos_filtrados_mes_ano_not(mes,ano);
            }else if(mes == '101' && empr == '1'){
                obtener_datos_filtrados_ano_not(ano);
            }else if(mes == '101'){
                obtener_datos_filtrados_empr_ano_not(ano, empr);
            }else{
                obtener_datos_filtrados_mes_ano_empresa_not(mes,ano,empr);
            }
        }else if(dc == 'Credito'){
            if (empr == '1' && mes != '101'){
                obtener_datos_filtrados_mes_ano_credito(mes,ano);
            }else if(mes == '101' && empr == '1'){
                obtener_datos_filtrados_ano_credito(ano);
            }else if(mes == '101'){
                obtener_datos_filtrados_empr_ano_credito(ano, empr);
            }else{
                obtener_datos_filtrados_mes_ano_empresa_credito(mes,ano,empr);
            }
        }
    });
    $(document).on("click","#filtrar_mes_ano",function(){
        var mes = $("#select_mes1").val();
        var ano = $("#select_ano1").val();
        var empr = $("#empresa_seleccionada").val();
        var dc = $("#select_documento").val();
        if (dc == 'Factura'){
            if (empr == '1' && mes != '101'){
                obtener_datos_filtrados_mes_ano(mes,ano);
            }else if(mes == '101' && empr == '1'){
                obtener_datos_filtrados_ano(ano);
            }else if(mes == '101'){
                obtener_datos_filtrados_empr_ano(ano, empr);
            }else{
                obtener_datos_filtrados_mes_ano_empresa(mes,ano,empr);
            }
        }else if(dc == 'Credito'){
            if (empr == '1' && mes != '101'){
                obtener_datos_filtrados_mes_ano_credito(mes,ano);
            }else if(mes == '101' && empr == '1'){
                obtener_datos_filtrados_ano_credito(ano);
            }else if(mes == '101'){
                obtener_datos_filtrados_empr_ano_credito(ano, empr);
            }else{
                obtener_datos_filtrados_mes_ano_empresa_credito(mes,ano,empr);
            }
        }
    });
    $(document).on("click","#eliminar",function(){
        var id = $(this).data("id_eliminar");
        var tipo = $(this).data("tipo");
        var dc = $("#select_documento").val();
        if (tipo == 'Factura'){
            if (confirm("??Desea eliminar la Factura?")){
                $.ajax({
                    url: "eliminar_notaventa.php",
                    method: "POST",
                    data: {id: id},
                    success: function(data){
                    }
                });
                obtener_datos_factura_credito("");
                alert("Se ha eliminado la Factura");
            };
        }else if(tipo == 'Credito'){
            if (confirm("??Desea eliminar este Cr??dito?")){
                $.ajax({
                    url: "eliminar_notacredito.php",
                    method: "POST",
                    data: {id: id},
                    success: function(data){
                    }
                });
                obtener_datos_factura_credito("");
                alert("Se ha eliminado el Cr??dito");
            };
        }else if(dc == 'Factura'){
            if (confirm("??Desea eliminar la Factura?")){
                $.ajax({
                    url: "eliminar_notaventa.php",
                    method: "POST",
                    data: {id: id},
                    success: function(data){
                    }
                });
                obtener_datos_factura_credito("");
                alert("Se ha eliminado la Factura");
            };
        }else if(dc == 'Credito'){
            if (confirm("??Desea eliminar este Cr??dito?")){
                $.ajax({
                    url: "eliminar_notacredito.php",
                    method: "POST",
                    data: {id: id},
                    success: function(data){
                    }
                });
                obtener_datos_factura_credito("");
                alert("Se ha eliminado el Cr??dito");
            };
        }
    });
    $(document).on("click","#eliminar_credito",function(){
        if (confirm("??Desea eliminar este Cr??dito?")){
            var id = $(this).data("id_eliminar");
            $.ajax({
                url: "eliminar_notacredito.php",
                method: "POST",
                data: {id: id},
                success: function(data){
                    obtener_datos_credito("");
                    alert(data);
                }
            })
        };
    });
    $(document).on("click","#mostrar_todo",function(){
        obtener_datos_todo();
    });
    $(document).on("click","#borrar_filtrado",function(){
        var dc = $("#select_documento").val();
        if (dc == 'Factura'){
            if (confirm("??Desea eliminar todas las Nota Ventas Filtradas?")){
                $('#tabla_cotizaciones tbody tr').each(function () {
                    var id = $(this).data("id_eliminar");
                        $.ajax({
                            url: "eliminar_notaventa.php",
                            method: "POST",
                            data: {id: id},
                            success: function(data){
                            }
                        });
                });
                obtener_datos("vacio");
                alert("Se ha eliminado lo Filtrado");
            };
        }else if(dc == 'Credito'){
            if (confirm("??Desea eliminar este Cr??dito?")){
                $('#tabla_cotizaciones tbody tr').each(function () {
                    var id = $(this).data("id_eliminar");
                    $.ajax({
                        url: "eliminar_notacredito.php",
                        method: "POST",
                        data: {id: id},
                        success: function(data){
                        }
                    })
                });
                obtener_datos_credito("vacio");
                alert("Se ha eliminado lo Filtrado");
            };
        }
    });
    /*$(document).on("keyup","#notaventafactura_add", function(){
        var notaventafactura_add = $("input#notaventafactura_add").val();
        $.ajax({
            url: "consultar_notaventa_notaventa_existe.php",
            method: "POST",
            data: {id: notaventafactura_add},
            success: function(data){
                $("#valor_notaventa").html(data);
            }
        });
    });
    $(document).on("keyup","#nfactura_add", function(){
        var nfactura_add = $("input#nfactura_add").val();
        $.ajax({
            url: "consultar_factura_existente.php",
            method: "POST",
            data: {id: nfactura_add},
            success: function(data){
                $("#valor_factura").html(data);
            }
        });
    });
    $(document).on("keyup","#notaventacredito_add", function(){
        var notaventacredito_add = $("input#notaventacredito_add").val();
        $.ajax({
            url: "consultar_notaventa_notaventa_existe.php",
            method: "POST",
            data: {id: notaventacredito_add},
            success: function(data){
                $("#valor_notaventa_credito").html(data);
            }
        });
    });
    $(document).on("keyup","#ncredito_add", function(){
        var ncredito_add = $("input#ncredito_add").val();
        $.ajax({
            url: "consultar_credito_existente.php",
            method: "POST",
            data: {id: ncredito_add},
            success: function(data){
                $("#valor_credito").html(data);
            }
        });
    });*/
    $(document).on("click","#ingresar_factura",function(){
        var notaventafactura_add = $("input#notaventafactura_add").val();
        var fechafactura_add = $("input#fechafactura_add").val();
        var nfactura_add = $("input#nfactura_add").val();
        var valorfactura, valornotaventa = 0;
        $.ajax({
            url: "consultar_notaventa_notaventa_existe.php",
            method: "POST",
            async:false,
            data: {id: notaventafactura_add},
            success: function(data){
                valornotaventa = parseInt(data);
                //$("#valor_notaventa").html(data);
            }
        });
        $.ajax({
            url: "consultar_factura_existente.php",
            method: "POST",
            async:false,
            data: {id: nfactura_add},
            success: function(data){
                valorfactura = parseInt(data);
            }
        });
        var valorfactura_add = $("input#valorfactura_add").val();
        var valor_not444 = $("#valor_notaventa").text();
        var valor_fact = $("#valor_factura").text();
        var valor_not4445_1 = parseInt(valor_not444);
        var valor_fact2_1 = parseInt(valor_fact);
        if (valornotaventa == 1){
            alert("Esta Nota de Venta no Existe");
            $("#notaventafactura_add").focus();
        }else if (valorfactura == 1){
            alert("Esta Factura ya esta ingresada, ya existe");
            $("#nfactura_add").focus();
        }else{
            $.ajax({
                url: "ingresar_notafactura.php",
                method: "POST",
                data: {notaventafactura_add: notaventafactura_add, fechafactura_add: fechafactura_add, nfactura_add: nfactura_add, valorfactura_add: valorfactura_add},
                success: function(data){
                    obtener_datos("");
                    alert(data);
                }
            });
            $("input#notaventafactura_add").val("");
            $("input#fechafactura_add").val("");
            $("input#nfactura_add").val("");
            $("input#valorfactura_add").val("");
        }
    });
    $(document).on("click","#ingresar_credito",function(){
        var notaventacredito_add = $("input#notaventacredito_add").val();
        var fechacredito_add = $("input#fechacredito_add").val();
        var ncredito_add = $("input#ncredito_add").val();
        /*$.ajax({
            url: "consultar_notaventa_notaventa_existe.php",
            method: "POST",
            data: {id: notaventacredito_add},
            success: function(data){
                $("#valor_notaventa_credito").html(data);
            }
        });*/
        $.ajax({
            url: "consultar_credito_existente.php",
            method: "POST",
            data: {id: ncredito_add},
            success: function(data){
                $("#valor_credito").html(data);
            }
        });
        var valorcredito_add = $("input#valorcredito_add").val();
        var valor_not444 = $("#valor_notaventa_credito").text();
        var valor_fact = $("#valor_credito").text();
        var valor_not4445_1 = parseInt(valor_not444);
        var valor_fact2_1 = parseInt(valor_fact);
        /*if (valor_not4445_1 == 1){
            alert("Esta Nota de Venta no Existe");
        }else*/ if (valor_fact2_1 == 1){
            alert("Este Credito ya esta ingresada, ya existe");
        }else{
            $.ajax({
                url: "ingresar_notacredito.php",
                method: "POST",
                data: {notaventacredito_add: notaventacredito_add, fechacredito_add: fechacredito_add, ncredito_add: ncredito_add, valorcredito_add: valorcredito_add},
                success: function(data){
                    obtener_datos_credito("");
                    alert(data);
                }
            });
            $("input#notaventacredito_add").val("");
            $("input#fechacredito_add").val("");
            $("input#ncredito_add").val("");
            $("input#valorcredito_add").val("");
        }
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
<label class= "titulo2">Factura y Nota Cr??dito </label>
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
<button id="desplegar_item" class="dropbtn">Ing. Factura</button>
</div>
<div class="tablascroll">
  <div id="pestanas">
      <button id="ingfacturas" class="botones_pestanas_inabilitados_a" onclick="openPage('ingfactura', this, 'white')">Ing. Factura</button>
      <button id="agrfacturatecnicos" class="botones_pestanas_inabilitados_f" onclick="openPage('agrfacturatecnico', this, 'white')" >Agregar Factura T??cnico</button>
      <button id="retiroingresotecnicos" class="botones_pestanas_inabilitados_e" onclick="openPage('retiroingresotecnico', this, 'white')" >Ingreso Retiro T??cnico</button>
  </div>
    <div id="ingfactura" class="tabcontent">
        <div id="seccion_notafactura">
            <label>Nota Venta Factura:<input type="text" class="grid-item" id="notaventafactura_add" name="notaventafactura_add" placeholder="Nota Venta Factura..." size="30" maxlength="70" autocomplete="off"/></label>
            <p></p>
            <label>Fecha Factura:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="date" class="grid-item" id="fechafactura_add" name="fechafactura_add" min='2005-01-01' max='2100-12-31' placeholder="Fecha Factura..." size="30" maxlength="70" autocomplete="off" /></label>
            <p></p>
            <label>N?? Factura:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="grid-item" id="nfactura_add" name="nfactura_add" placeholder="N?? Factura..." size="30" maxlength="70" autocomplete="off" /></label>
            <p></p>
            <label>Valor Factura:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="grid-item" id="valorfactura_add" name="valorfactura_add" placeholder="Valor Factura..." size="30" maxlength="70" autocomplete="off" /></label>
            <p></p>
            <button id="ingresar_factura" class="boton_ingresar_factura">Ingresar Factura</button>
        </div>
        <div id="seccion_notacredito">
            <label>Nota Venta Cr??dito:<input type="text" class="grid-item" id="notaventacredito_add" name="notaventacredito_add" placeholder="Nota Venta Cr??dito..." size="30" maxlength="70" autocomplete="off" /></label>
            <p></p>
            <label>Fecha Cr??dito:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="date" class="grid-item" id="fechacredito_add" name="fechacredito_add" min='2005-01-01' max='2100-12-31' placeholder="Fecha Cr??dito..." size="30" maxlength="70" autocomplete="off" /></label>
            <p></p>
            <label>N?? Cr??dito:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="grid-item" id="ncredito_add" name="ncredito_add" placeholder="N?? Cr??dito..." size="30" maxlength="70" autocomplete="off" /></label>
            <p></p>
            <label>Valor Cr??dito:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="grid-item" id="valorcredito_add" name="valorcredito_add" placeholder="Valor Cr??dito..." size="30" maxlength="70" autocomplete="off" /></label>
            <p></p>
            <button id="ingresar_credito" class="boton_ingresar_credito">Ingresar Cr??dito</button>
        </div>
        <br></br>
        <br></br>
        <br></br>
        <br></br>
        <select id="select_documento" name="select_documento">
            <option value="1" disabled selected>Seleccione Documento...</option>
            <option value='Factura'>Factura</option>
            <option value='Credito'>Cr??dito</option>
        </select>
        <button id="mostrar_todo">Mostrar Todo</button>
        <div style="float:right;">
            <select id="select_mes1" name="select_mes1">
                <option value="1" disabled selected>Seleccione Mes...</option>
                <option value='101'>Comparar solo A??o</option>
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
            <p></p>
            <button id="filtrar_notaventa" style="float:right;">Filtrar por Nota Venta</button>
            <br></br>
        </div>
        <div id="result"><b></b></div>
    </div>
    <div id="agrfacturatecnico" class="tabcontent">
        <div id="seccion_factura">
            <label><strong>&nbsp;&nbsp;Fecha Factura:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><input type="date" class="grid-item" id="fechafactura_add2" name="fechafactura_add" min='2005-01-01' max='2100-12-31' placeholder="Fecha Factura..." size="30" maxlength="70" style="width:200px;" autocomplete="off" /></label>
            <p></p>
            <label><strong>&nbsp;&nbsp;N?? Factura:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><input type="text" class="grid-item" id="nfactura_add2" name="nfactura_add" placeholder="N?? Factura..." size="30" maxlength="70" autocomplete="off" /></label>
            <p></p>
            <label><strong>&nbsp;&nbsp;T??cnico:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
            <?php
                $conexion223 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
                mysqli_set_charset($conexion223,"utf8");
                $ejecutar223 = mysqli_query($conexion223,"select Instalador from Instaladores where Estado = 'Desactivar'");
                mysqli_set_charset($conexion223,"utf8");
            ?>
            <select class='tecnico_add' id='tecnico_add' name='tecnico_add'>
            <option value='0' disabled selected>Seleccione T??cnico...</option>
            <?php
                while ($row223 = mysqli_fetch_array($ejecutar223)) {
                    $valor_nombre_emp = $row223[0];
                    echo "<option value='$valor_nombre_emp'>".$valor_nombre_emp."</option>";
                }
            ?>
            </select>
          </label>
            <p></p>
            <label><strong>&nbsp;&nbsp;Valor Factura:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><input type="text" class="grid-item" id="valorfactura_add2" name="valorfactura_add" placeholder="Valor Factura..." size="30" maxlength="70" autocomplete="off" /></label>
            <p></p>
            <button id="ingresar_facturas" class="boton_ingresar_factura">Ingresar Factura</button>

        </div>
        <div id="seccion_productos">
            <?php
                /*$conexion223 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
                mysqli_set_charset($conexion223,"utf8");
                $ejecutar223 = mysqli_query($conexion223,"select Rectificador from Rectificadores");
                mysqli_set_charset($conexion223,"utf8");
                echo "<select id='nombre_rect' name='nombre_rect'>
                <option value='0' disabled selected>Seleccione T??cnico...</option>";
                    while ($row223 = mysqli_fetch_array($ejecutar223)) {
                        $valor_nombre_tec = $row223[0];
                        if ($nombre_tec == $valor_nombre_tec){
                            echo "<option value='$valor_nombre_tec' selected>".$valor_nombre_tec."</option>";
                        }else if($nombre_tec != $valor_nombre_tec){
                            echo "<option value='$valor_nombre_tec'>".$valor_nombre_tec."</option>";
                        }
                    }
                echo "</select>";*/
            ?>
            <!--<button id="guardar_cant_prod" class="boton_ingresar_cant_prod">Guardar Producto</button>-->
              <div id="result_productos"></div>
        </div>
        <br></br>
        <br></br>
        <br></br>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <input list="lista_factura" type="text" class="input_factura" id="input_factura" name="input_factura" placeholder="Buscar Factura..." size="30" maxlength="70" style="height:30px;font-size:1.2vw;text-align:center;" autocomplete="off"/>
        <p></p>
        <div id="result_inventario"></div>
        <br></br>
        <br></br>
    </div>
    <div id="retiroingresotecnico" class="tabcontent">
        <div id="seccion_factura">
            <label><strong>&nbsp;&nbsp;Fecha:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><input type="date" class="grid-item" id="fecharein_add2" name="fecharein_add" min='2005-01-01' max='2100-12-31' placeholder="Fecha Retiro Ingreso..." size="30" maxlength="70" style="width:200px;" autocomplete="off" /></label>
            <p></p>
            <label><strong>&nbsp;&nbsp;Detalle:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><input type="text" class="grid-item" id="detalle_add2" name="detalle_add" placeholder="Detalle..." size="30" maxlength="70" autocomplete="off" /></label>
            <p></p>
            <label><strong>&nbsp;&nbsp;T??cnico Retiro:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
            <?php
                $conexion223 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
                mysqli_set_charset($conexion223,"utf8");
                $ejecutar223 = mysqli_query($conexion223,"select Instalador from Instaladores where Estado = 'Desactivar'");
                mysqli_set_charset($conexion223,"utf8");
            ?>
            <select class='tecnico_add' id='tecnicoretiro_add' name='tecnicoretiro_add'>
                <option value='0' disabled selected>Seleccione T??cnico...</option>
                <?php
                    while ($row223 = mysqli_fetch_array($ejecutar223)) {
                        $valor_nombre_emp = $row223[0];
                        echo "<option value='$valor_nombre_emp'>".$valor_nombre_emp."</option>";
                    }
                ?>
            </select></label>
            <p></p>
            <label><strong>&nbsp;&nbsp;T??cnico Ingreso:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
            <?php
                $conexion223 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
                mysqli_set_charset($conexion223,"utf8");
                $ejecutar223 = mysqli_query($conexion223,"select Instalador from Instaladores where Estado = 'Desactivar'");
                mysqli_set_charset($conexion223,"utf8");
            ?>
            <select class='tecnico_add' id='tecnicoingreso_add' name='tecnicoingreso_add'>
                <option value='0' disabled selected>Seleccione T??cnico...</option>
                <?php
                    while ($row223 = mysqli_fetch_array($ejecutar223)) {
                        $valor_nombre_emp = $row223[0];
                        echo "<option value='$valor_nombre_emp'>".$valor_nombre_emp."</option>";
                    }
                ?>
            </select></label>
            <p></p>
            <label><strong>&nbsp;&nbsp;Tipo Ingreso:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
            <select class='tipoingreso_add' id='tipoingreso_add' name='tipoingreso_add'>
                <option value='0' disabled selected>Seleccione Tipo Ingreso...</option>
                <option value="Notaventa">Notaventa</option>
                <option value="Tecnico">Tecnico</option>
            </select></label>
            <br></br>
            <button id="ingresar_reing" class="boton_ingresar_factura">Ingresar</button>
        </div>
        <div id="seccion_productos">
              <div id="result_productosretiroingreso"></div>
        </div>
        <br></br>
        <br></br>
        <br></br>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <input type="text" class="input_retiro_ingreso" id="input_retiro_ingreso" name="input_retiro_ingreso" placeholder="Buscar Retiro Ingreso..." size="30" maxlength="70" style="height:30px;font-size:1.2vw;text-align:center;" autocomplete="off"/>
        <p></p>
        <div id="result_retiro_ingreso"></div>
        <br></br>
        <br></br>
    </div>
</div>
<button id="borrar_filtrado">Borrar Filtrado</button>
<input list="lista_clientes" type="text" class="input_cliente" id="input_cliente" name="input_cliente" placeholder="Escriba Registro..." size="30" maxlength="70" autocomplete="off"/>
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
        <aside class="cuadrado_modal">
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
            <button id="ingresar_venta">Ingresar Venta</button>
            <br></br>
    </div>
</div>
<script>
function openPage(pageName,elmnt,color) {
    var i, tabcontent, tablinks, tablinks1, tablinks2;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("botones_pestanas_inabilitados_a");
    tablinks1 = document.getElementsByClassName("botones_pestanas_inabilitados_f");
    tablinks2 = document.getElementsByClassName("botones_pestanas_inabilitados_e");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
        tablinks1[i].style.backgroundColor = "";
        tablinks2[i].style.backgroundColor = "";
    }
    $("#"+pageName).css("display", "block");
    elmnt.style.backgroundColor = color;
}
$("#ingfacturas").trigger('click');
function obtener_datos_inventario(texto){
    $.ajax({
        url:"buscar_inventario.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_inventario").html(data);
        }
    });
}
function obtener_datos_retiroingreso(texto){
    $.ajax({
        url:"buscar_retiro_ingreso.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_retiro_ingreso").html(data);
        }
    });
}
$("#inventarios").on("click",function(){
    obtener_datos_inventario("");
});
obtener_datos_inventario("");

function obtener_datos_producto(texto){
    $.ajax({
        url:"buscar_producto.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_productos").html(data);
        }
    });
}
function obtener_datos_producto_rein(texto){
    $.ajax({
        url:"buscar_producto_retiroingreso.php",
        method:"POST",
        data: {texto: texto},
        success: function(data){
            $("#result_productosretiroingreso").html(data);
        }
    });
}

function verificar_buscar_inventario(){
    var buscar = $("input#input_factura").val();
    if (buscar == ""){
        obtener_datos_inventario("");
    }else{
        obtener_datos_inventario(buscar);
    }
}

function verificar_buscar_retiroingreso(){
    var buscar = $("input#input_retiro_ingreso").val();
    if (buscar == ""){
        obtener_datos_retiroingreso("");
    }else{
        obtener_datos_retiroingreso(buscar);
    }
}
$(document).on("change","#tecnico_add", function(){
    obtener_datos_producto($("#tecnico_add").val());
});
$(document).on("change","#tecnicoretiro_add", function(){
    obtener_datos_producto_rein($("#tecnicoretiro_add").val());
});
$(document).on("keyup","#input_factura", function(){
    verificar_buscar_inventario();
});
$(document).on("keyup","#input_retiro_ingreso", function(){
    verificar_buscar_retiroingreso();
});
obtener_datos_retiroingreso("");
$(document).on("click","#ingresar_facturas",function(){

            /*if ($('#fechafactura_add2').val().length == 0) {
                alert("Olvido escribir la Fecha de la Factura");
                $('#fechafactura_add2').focus();
                return false;
            }else if ($('#nfactura_add2').val().length == 0) {
                alert("Falta escribir el N??mero de la Factura");
                $('#nfactura_add2').focus();
                return false;
            }else if ($('#tecnico_add').val().length == 0) {
                alert("Falt?? seleccionar al T??cnico");
                $('#tecnico_add').focus();
                return false;
            }else if ($('#tecnico_add2').val().length == 0) {
                alert("Falt?? seleccionar al T??cnico");
                $('#tecnico_add2').focus();
                return false;
            }else{*/
                var fecha= $("#fechafactura_add2").val();
                var nfactura= $("#nfactura_add2").val();
                var tecnico= $("#tecnico_add").val();
                var valor= $("#valorfactura_add2").val();
                $('#accion_producto_cantidad tbody tr').each(function () {
                    var prod= $(this).find('td').eq(1).html();
                    var cant= $(this).find('td').eq(2).html();
                    $.ajax({
                        url: "insertar_inventario.php",
                        method: "POST",
                        data: {fecha: fecha, nfactura: nfactura, tecnico: tecnico, valor: valor, prod: prod, cant: cant},
                        success: function(data){
                            $("#fechafactura_add2").val("");
                            $("#nfactura_add2").val("");
                            $("#tecnico_add").val('0');
                            $("#valorfactura_add2").val("");
                        }
                    });
                });
            //}
    obtener_datos_inventario("");
    obtener_datos_inventario("");
    alert("Inventario ingresados exitosamente");
    obtener_datos_inventario("");
});
$(document).on("click","#eliminar_inventario",function(){
    if (confirm("??Desea eliminar la Factura del Inventario?")){
        var id = $(this).data("id_eliminar_inventario");
        $.ajax({
            url: "eliminar_inventario.php",
            method: "POST",
            data: {id: id},
            success: function(data){
                verificar_buscar_inventario();
                alert(data);
            }
        });
    };
});
$(document).on("click","#ingresar_reing",function(){
    var fechare= $("#fecharein_add2").val();
    var detallere= $("#detalle_add2").val();
    var tecnicore= $("#tecnicoretiro_add").val();
    var tecnicoin= $("#tecnicoingreso_add").val();
    var tipoingreso = $("#tipoingreso_add").val();
    if (tipoingreso == '0' || tipoingreso == 0){
        alert("Seleccione tipo de ingreso");
        $('#tipoingreso_add').focus();
        return false;
    }else if (tipoingreso == 'Notaventa') {
        $('#accion_producto_cantidad_rein tbody tr').each(function () {
            var prod= $(this).find('td').eq(1).html();
            var cant= $(this).find('td').eq(2).html();
            $.ajax({
                url: "ingresar_retiro_ingreso_inventario.php",
                method: "POST",
                data: {fechare: fechare, detallere: detallere, tecnicore: tecnicore, tecnicoin: tecnicoin, prod: prod, cant: cant, tipoingreso: tipoingreso},
                success: function(data){}
            });
        });
        alert("Se ha ingresado los datos");
        $("#fecharein_add2").val("");
        $("#detalle_add2").val("");
        $("#tecnicoretiro_add").val('0');
        $("#tecnicoingreso_add").val('0');
        $("#tipoingreso_add").val('0');
        $("#result_productosretiroingreso").empty();
        obtener_datos_retiroingreso("");
    }else if (tipoingreso == 'Tecnico') {
        $('#accion_producto_cantidad_rein tbody tr').each(function () {
            var prod= $(this).find('td').eq(1).html();
            var cant= $(this).find('td').eq(2).html();
            $.ajax({
                url: "ingresar_retiro_ingreso_inventario_tecnico.php",
                method: "POST",
                data: {fechare: fechare, detallere: detallere, tecnicore: tecnicore, tecnicoin: tecnicoin, prod: prod, cant: cant, tipoingreso: tipoingreso},
                success: function(data){}
            });
        });
        alert("Se ha ingresado los datos");
        $("#fecharein_add2").val("");
        $("#detalle_add2").val("");
        $("#tecnicoretiro_add").val('0');
        $("#tecnicoingreso_add").val('0');
        $("#tipoingreso_add").val('0');
        $("#result_productosretiroingreso").empty();
        obtener_datos_retiroingreso("");
    }
});
$(document).on("click","#eliminar_retiro_ingreso",function(){
    if (confirm("??Desea eliminar el Retiro/Ingreso del Inventario?")){
        var id = $(this).data("id_eliminar_retiro_ingreso");
        $.ajax({
            url: "eliminar_retiroingreso_inventario.php",
            method: "POST",
            data: {id: id},
            success: function(data){
                verificar_buscar_retiroingreso();
                alert(data);
            }
        });
    };
});
$(document).on("click","#modificar_inventario",function(){
    var row = $(this).parent().parent();
    var id= $(this).data("id_modificar_inventario");
    var fecha= $(row).find('td:nth-child(2)').find('input').val();
    var factura= $(row).find('td').eq(2).html();
    var tecnico= $(row).find('td:nth-child(4)').find('select').val();
    var valor= $(row).find('td').eq(4).html();
    var cant= $(row).find('td').eq(6).html();
    $.ajax({
        url: "modificar_inventario.php",
        method: "POST",
        data: {fecha: fecha, factura: factura, tecnico: tecnico, valor: valor, cant: cant, id: id},
        success: function(data){
        }
    });
    obtener_datos_inventario("");
    obtener_datos_inventario("");
    alert("Se ha modificado la Factura del Inventario");
    obtener_datos_inventario("");
});
$(document).on("click","#guardar_cant_prod",function(){
    $('#accion_producto_cantidad tbody tr').each(function () {
        var cant= $(this).find('td').eq(2).html();
        var id= $(this).find('td').eq(0).html();
        $.ajax({
            url: "modificar_producto.php",
            method: "POST",
            data: {cant: cant, id: id},
            success: function(data){}
        });
    });
    obtener_datos_producto($("#nombre_rect").val());
    obtener_datos_producto($("#nombre_rect").val());
    alert("Cantidad Modificada exitosamente");
    obtener_datos_producto($("#nombre_rect").val());
});
$(document).on("click","#quitar_fila",function(){
  event.preventDefault();
  $(this).closest('tr').remove();
});
$(document).on("click","#ingfacturas",function(){
    $("#borrar_filtrado").css("display","block");
    $("#input_cliente").css("display","block");
});
$(document).on("click","#agrfacturatecnicos",function(){
    $("#borrar_filtrado").css("display","none");
    $("#input_cliente").css("display","none");
});
$(document).on("click","#retiroingresotecnicos",function(){
    $("#borrar_filtrado").css("display","none");
    $("#input_cliente").css("display","none");
});
</script>
<p class="titulo75">SOCIEDAD FYD</p>
<p class="copy">Copyright ?? 2021 | Dise??ado por N.A.B para Comercial F&amp;D</p>
<label id="valor_notaventa" style="display:none;"></label>
<label id="valor_factura" style="display:none;"></label>
<label id="valor_notaventa_credito" style="display:none;"></label>
<label id="valor_credito" style="display:none;"></label>
</body>
</html>
