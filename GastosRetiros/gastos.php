<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<noscript>
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=java.html">
</noscript>
<style type="text/css">
@import url("gastos.css");
</style>
<link href="gastos.css" rel="stylesheet" type="text/css">
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
    function obtener_datos_compra(texto){
        $.ajax({
            url:"buscar_compra.php",
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
        });
    }
    function obtener_datos_gasto(texto){
        $.ajax({
            url:"buscar_gasto.php",
            method:"POST",
            data: {texto: texto},
            success: function(data){
                $("#result").html(data)
            }
        });
    }
    function obtener_datos_retiro_socio(texto){
        $.ajax({
            url:"buscar_retiro_socio.php",
            method:"POST",
            data: {texto: texto},
            success: function(data){
                $("#result").html(data)
            }
        })
    }
    function obtener_datos_pago_credito(texto){
        $.ajax({
            url:"buscar_pago_credito.php",
            method:"POST",
            data: {texto: texto},
            success: function(data){
                $("#result").html(data)
            }
        })
    }
    function obtener_datos_gasto_credito_socio(texto){
        $.ajax({
            url:"buscar_gasto_credito_socio.php",
            method:"POST",
            data: {texto: texto},
            success: function(data){
                $("#result").html(data)
            }
        });
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
    function obtener_datos_filtrados_ano_gasto(texto){
        $.ajax({
            url:"buscar_filtracion_ano_gasto.php",
            method:"POST",
            data: {texto: texto},
            success: function(data){
                $("#result").html(data)
            }
        });
    }
    function obtener_datos_filtrados_todos_gasto(){
        $.ajax({
            url:"buscar_filtracion_todos_gasto.php",
            method:"POST",
            success: function(data){
                $("#result").html(data)
            }
        });
    }
    function obtener_datos_filtrados_ano_retiro_socio(texto){
        $.ajax({
            url:"buscar_filtracion_ano_retiro_socio.php",
            method:"POST",
            data: {texto: texto},
            success: function(data){
                $("#result").html(data)
            }
        });
    }
    function obtener_datos_filtrados_todos_retiro_socio(){
        $.ajax({
            url:"buscar_filtracion_todos_retiro_socio.php",
            method:"POST",
            success: function(data){
                $("#result").html(data)
            }
        });
    }
    function obtener_datos_filtrados_ano_pago_credito(texto){
        $.ajax({
            url:"buscar_filtracion_ano_pago_credito.php",
            method:"POST",
            data: {texto: texto},
            success: function(data){
                $("#result").html(data)
            }
        });
    }
    function obtener_datos_filtrados_todos_pago_credito(){
        $.ajax({
            url:"buscar_filtracion_todos_pago_credito.php",
            method:"POST",
            success: function(data){
                $("#result").html(data)
            }
        });
    }
    function obtener_datos_filtrados_mes_ano_gasto(texto, texto2){
        $.ajax({
            url:"buscar_filtracion_mes_ano_gasto.php",
            method:"POST",
            data: {texto: texto, texto2: texto2},
            success: function(data){
                $("#result").html(data)
            }
        });
    }
    function obtener_datos_filtrados_mes_ano_pago_credito(texto, texto2){
        $.ajax({
            url:"buscar_filtracion_mes_ano_pago_credito.php",
            method:"POST",
            data: {texto: texto, texto2: texto2},
            success: function(data){
                $("#result").html(data)
            }
        });
    }
    function obtener_datos_filtrados_mes_ano_retiro_socio(texto, texto2){
        $.ajax({
            url:"buscar_filtracion_mes_ano_retiro_socio.php",
            method:"POST",
            data: {texto: texto, texto2: texto2},
            success: function(data){
                $("#result").html(data)
            }
        });
    }
    function obtener_datos_filtrados_todos(){
        $.ajax({
            url:"buscar_filtracion_todos.php",
            method:"POST",
            success: function(data){
                $("#result").html(data);
            }
        });
    }
    function obtener_datos_filtrados_ano_todos(texto){
        $.ajax({
            url:"buscar_filtracion_ano_todos.php",
            method:"POST",
            data: {texto: texto},
            success: function(data){
                $("#result").html(data);
            }
        });
    }
    function obtener_datos_filtrados_mes_ano_todos(texto, texto2){
        $.ajax({
            url:"buscar_filtracion_mes_ano_todos.php",
            method:"POST",
            data: {texto: texto, texto2: texto2},
            success: function(data){
                $("#result").html(data);
            }
        });
    }

    function obtener_datos_filtrados_todos_compra(){
        $.ajax({
            url:"buscar_filtracion_todos_compra.php",
            method:"POST",
            success: function(data){
                $("#result").html(data);
            }
        });
    }
    function obtener_datos_filtrados_ano_compra(texto){
        $.ajax({
            url:"buscar_filtracion_ano_compra.php",
            method:"POST",
            data: {texto: texto},
            success: function(data){
                $("#result").html(data);
            }
        });
    }
    function obtener_datos_filtrados_mes_ano_compra(texto, texto2){
        $.ajax({
            url:"buscar_filtracion_mes_ano_compra.php",
            method:"POST",
            data: {texto: texto, texto2: texto2},
            success: function(data){
                $("#result").html(data);
            }
        });
    }
    function obtener_datos_filtrados_todos_credito(){
        $.ajax({
            url:"buscar_filtracion_todos_credito.php",
            method:"POST",
            success: function(data){
                $("#result").html(data);
            }
        });
    }
    function obtener_datos_filtrados_ano_credito(texto){
        $.ajax({
            url:"buscar_filtracion_ano_credito.php",
            method:"POST",
            data: {texto: texto},
            success: function(data){
                $("#result").html(data);
            }
        });
    }
    function obtener_datos_filtrados_mes_ano_credito(texto, texto2){
        $.ajax({
            url:"buscar_filtracion_mes_ano_credito.php",
            method:"POST",
            data: {texto: texto, texto2: texto2},
            success: function(data){
                $("#result").html(data);
            }
        });
    }

    w3.hide('#boton_guardar_modificacion');
    obtener_datos_gasto_credito_socio("");
    $("input#input_cliente").focus();
    //obtener_datos("vacio");

    var controladorTiempo7 = "";

    function buscar_gastos_admin(){
        var buscar = $("input#input_cliente").val();
        if (buscar == ""){
            $("input#input_cliente").focus();
            obtener_datos_gasto_credito_socio("");
        }else{
            obtener_datos_gasto_credito_socio(buscar);
        }
    }

    $(document).on("keyup","#input_cliente", function(){
        clearTimeout(controladorTiempo7);
        controladorTiempo7 = setTimeout(buscar_gastos_admin, 220);
    });
    $(document).on("change","#select_documento", function(){
        var dc = $("#select_documento").val();
        if(dc == 'Todo'){
            obtener_datos_gasto_credito_socio("");
        }else if (dc == 'Gasto'){
            obtener_datos_gasto("");
        }else if (dc == 'Retiro Socio'){
            obtener_datos_retiro_socio("");
        }else if (dc == 'Pago Credito'){
            obtener_datos_pago_credito("");
        }else if (dc == 'Compra'){
            obtener_datos_compra("");
        }else if (dc == 'Credito'){
            obtener_datos_credito("");
        }
    });

    $(document).on("click","#filtrar_mes_ano",function(){
        var mes = $("#select_mes1").val();
        var ano = $("#select_ano1").val();
        //var empr = $("#empresa_seleccionada").val();
        var dc = $("#select_documento").val();
        if (dc == 'Gasto'){
            if(mes == '101' && ano == '234'){
                obtener_datos_filtrados_todos_gasto();
            }
            if(mes == '101' && ano != '234'){
                obtener_datos_filtrados_ano_gasto(ano);
            }
            if(mes != '101' && ano != '234'){
                obtener_datos_filtrados_mes_ano_gasto(mes,ano);
            }
            /*if (empr == 'Todo' && mes != '101'){
                obtener_datos_filtrados_mes_ano(mes,ano);
            }else if(mes == '101' && empr == 'Todo'){
                obtener_datos_filtrados_ano(ano);
            }else if(mes == '101'){
                obtener_datos_filtrados_empr_ano(ano, empr);
            }else{
                obtener_datos_filtrados_mes_ano_empresa(mes,ano,empr);
            }*/
        }else if(dc == 'Retiro Socio'){
            if(mes == '101' && ano == '234'){
                obtener_datos_filtrados_todos_retiro_socio();
            }
            if(mes == '101' && ano != '234'){
                obtener_datos_filtrados_ano_retiro_socio(ano);
            }
            if(mes != '101' && ano != '234'){
                obtener_datos_filtrados_mes_ano_retiro_socio(mes,ano);
            }
            /*if (empr == 'Todo' && mes != '101'){
                obtener_datos_filtrados_mes_ano_credito(mes,ano);
            }else if(mes == '101' && empr == 'Todo'){
                obtener_datos_filtrados_ano_credito(ano);
            }else if(mes == '101'){
                obtener_datos_filtrados_empr_ano_credito(ano, empr);
            }else{
                obtener_datos_filtrados_mes_ano_empresa_credito(mes,ano,empr);
            }*/
        }else if(dc == 'Pago Credito'){
            if(mes == '101' && ano == '234'){
                obtener_datos_filtrados_todos_pago_credito();
            }
            if(mes == '101' && ano != '234'){
                obtener_datos_filtrados_ano_pago_credito(ano);
            }
            if(mes != '101' && ano != '234'){
                obtener_datos_filtrados_mes_ano_pago_credito(mes,ano);
            }
        }else if(dc == 'Compra'){
            if(mes == '101' && ano == '234'){
                obtener_datos_filtrados_todos_compra();
            }
            if(mes == '101' && ano != '234'){
                obtener_datos_filtrados_ano_compra(ano);
            }
            if(mes != '101' && ano != '234'){
                obtener_datos_filtrados_mes_ano_compra(mes,ano);
            }
        }else if(dc == 'Credito'){
            if(mes == '101' && ano == '234'){
                obtener_datos_filtrados_todos_credito();
            }
            if(mes == '101' && ano != '234'){
                obtener_datos_filtrados_ano_credito(ano);
            }
            if(mes != '101' && ano != '234'){
                obtener_datos_filtrados_mes_ano_credito(mes,ano);
            }
        }else if(dc == 'Todo'){
            if(mes == '101' && ano == '234'){
                obtener_datos_filtrados_todos();
            }
            if(mes == '101' && ano != '234'){
                obtener_datos_filtrados_ano_todos(ano);
            }
            if(mes != '101' && ano != '234'){
                obtener_datos_filtrados_mes_ano_todos(mes,ano);
            }
        }
    });
    $(document).on("click","#eliminar",function(){
        var id = $(this).data("id_eliminar");
        var tipo = $(this).data("tipo");
        if(tipo == 'Pago Crédito'){
            if (confirm("¿Desea eliminar el Documento " + tipo + "?")){
                $.ajax({
                    url: "eliminar_pagocredito.php",
                    method: "POST",
                    data: {id: id},
                    success: function(data){
                        obtener_datos_gasto_credito_socio("");
                        alert(data);
                    }
                });
            };
        }else if (tipo == 'Retiro Socio'){
            if (confirm("¿Desea eliminar el Documento " + tipo + "?")){
                $.ajax({
                    url: "eliminar_retirosocio.php",
                    method: "POST",
                    data: {id: id},
                    success: function(data){
                        obtener_datos_gasto_credito_socio("");
                        alert(data);
                    }
                });
            };
        }else if (tipo == 'Gasto'){
            if (confirm("¿Desea eliminar el Documento " + tipo + "?")){
                $.ajax({
                    url: "eliminar_gasto.php",
                    method: "POST",
                    data: {id: id},
                    success: function(data){
                        obtener_datos_gasto_credito_socio("");
                        alert(data);
                    }
                });
            };
        }else if (tipo == 'Compra'){
            if (confirm("¿Desea eliminar el Documento " + tipo + "?")){
                $.ajax({
                    url: "eliminar_compra.php",
                    method: "POST",
                    data: {id: id},
                    success: function(data){
                        obtener_datos_gasto_credito_socio("");
                        alert(data);
                    }
                });
            };
        }else if (tipo == 'Credito'){
            if (confirm("¿Desea eliminar el Documento " + tipo + "?")){
                $.ajax({
                    url: "eliminar_credito.php",
                    method: "POST",
                    data: {id: id},
                    success: function(data){
                        obtener_datos_gasto_credito_socio("");
                        alert(data);
                    }
                });
            };
        }
    });
    $(document).on("click","#eliminar_gasto",function(){
        if (confirm("¿Desea eliminar este Gasto?")){
            var id = $(this).data("id_eliminar");
            $.ajax({
                url: "eliminar_gasto.php",
                method: "POST",
                data: {id: id},
                success: function(data){
                    obtener_datos_gasto("");
                    alert(data);
                }
            })
        };
    });
    $(document).on("click","#eliminar_compra",function(){
        if (confirm("¿Desea eliminar esta Compra?")){
            var id = $(this).data("id_eliminar");
            $.ajax({
                url: "eliminar_compra.php",
                method: "POST",
                data: {id: id},
                success: function(data){
                    obtener_datos_compra("");
                    alert(data);
                }
            })
        };
    });
    $(document).on("click","#eliminar_credito",function(){
        if (confirm("¿Desea eliminar esta Crédito?")){
            var id = $(this).data("id_eliminar");
            $.ajax({
                url: "eliminar_credito.php",
                method: "POST",
                data: {id: id},
                success: function(data){
                    obtener_datos_credito("");
                    alert(data);
                }
            })
        };
    });
    $(document).on("click","#eliminar_retiro_socio",function(){
        if (confirm("¿Desea eliminar este Retiro Socio?")){
            var id = $(this).data("id_eliminar");
            $.ajax({
                url: "eliminar_retirosocio.php",
                method: "POST",
                data: {id: id},
                success: function(data){
                    obtener_datos_retiro_socio("");
                    alert(data);
                }
            })
        };
    });
    $(document).on("click","#eliminar_pago_credito",function(){
        if (confirm("¿Desea eliminar este Pago Crédito?")){
            var id = $(this).data("id_eliminar");
            $.ajax({
                url: "eliminar_pagocredito.php",
                method: "POST",
                data: {id: id},
                success: function(data){
                    obtener_datos_pago_credito("");
                    alert(data);
                }
            })
        };
    });
    $(document).on("click","#borrar_filtrado",function(){
        var dc = $("#select_documento").val();
        if (dc == 'Gasto'){
            if (confirm("¿Desea eliminar todos los Gastos Filtrados?")){
                $('#tabla_cotizaciones tbody tr').each(function () {
                    var id= $(this).find('td').eq(0).html();
                    $.ajax({
                        url: "eliminar_gasto.php",
                        method: "POST",
                        data: {id: id},
                        success: function(data){
                        }
                    });
                });
                obtener_datos_gasto("");
                alert("Se ha eliminado lo Filtrado");
            };
        }else if(dc == 'Retiro Socio'){
            if (confirm("¿Desea eliminar todos los Retiro Socios Filtrados?")){
                $('#tabla_cotizaciones tbody tr').each(function () {
                    var id= $(this).find('td').eq(0).html();
                    $.ajax({
                        url: "eliminar_retirosocio.php",
                        method: "POST",
                        data: {id: id},
                        success: function(data){
                        }
                    })
                });
                obtener_datos_retiro_socio("");
                alert("Se ha eliminado lo Filtrado");
            };
        }else if(dc == 'Pago Credito'){
            if (confirm("¿Desea eliminar todos los Pago Crédito Filtrados?")){
                $('#tabla_cotizaciones tbody tr').each(function () {
                    var id= $(this).find('td').eq(0).html();
                    $.ajax({
                        url: "eliminar_pagocredito.php",
                        method: "POST",
                        data: {id: id},
                        success: function(data){
                        }
                    })
                });
                obtener_datos_pago_credito("");
                alert("Se ha eliminado lo Filtrado");
            };
        }else if(dc == 'Compra'){
            if (confirm("¿Desea eliminar todas las Compras Filtradas?")){
                $('#tabla_cotizaciones tbody tr').each(function () {
                    var id= $(this).find('td').eq(0).html();
                    $.ajax({
                        url: "eliminar_compra.php",
                        method: "POST",
                        data: {id: id},
                        success: function(data){
                        }
                    })
                });
                obtener_datos_compra("");
                alert("Se ha eliminado lo Filtrado");
            };
        }else if(dc == 'Credito'){
            if (confirm("¿Desea eliminar todoas las Nota de Crédito Filtradas?")){
                $('#tabla_cotizaciones tbody tr').each(function () {
                    var id= $(this).find('td').eq(0).html();
                    $.ajax({
                        url: "eliminar_credito.php",
                        method: "POST",
                        data: {id: id},
                        success: function(data){
                        }
                    })
                });
                obtener_datos_credito("");
                alert("Se ha eliminado lo Filtrado");
            };
        }else if(dc == 'Todo'){
            if (confirm("¿Desea eliminar todo lo Filtrado?")){
                $('#tabla_cotizaciones tbody tr').each(function () {
                    var id= $(this).find('td').eq(0).html();
                    $.ajax({
                        url: "eliminar_todo.php",
                        method: "POST",
                        data: {id: id},
                        success: function(data){
                        }
                    })
                });
                obtener_datos_filtrados_todos();
                alert("Se ha eliminado lo Filtrado");
            };
        }
    });
    $(document).on("click","#modificar",function(){
        var row = $(this).parent().parent();
        var id = $(row).find('td:nth-child(1)').text();
        var detalle = $(row).find('td:nth-child(2)').text();
        var tipo = $(row).find('td:nth-child(3)').text();
        var fecha = $(row).find('td:nth-child(4)').find('input').val();
        $.ajax({
            url: "actualizar_gastos_creditos_socio.php",
            method: "POST",
            data: {detalle: detalle, tipo: tipo, fecha: fecha, id: id},
            success: function(data){
                alert(data);
            }
        })
    });
    $(document).on("click","#ingresar",function(){
        var fecha_add = $("input#fecha_add").val();
        var select_tipodocumento_add = $("#select_tipodocumento").val();
        var detalle_add = $("input#detalle_add").val();
        var valor_add = $("input#valor_add").val();
        if(select_tipodocumento_add == 'Gasto'){
            $.ajax({
                url: "ingresar_gasto.php",
                method: "POST",
                data: {fecha_add: fecha_add, detalle_add: detalle_add, valor_add: valor_add},
                success: function(data){
                    obtener_datos_gasto_credito_socio("");
                    alert(data);
                }
            });
        }else if(select_tipodocumento_add == 'Retiro Socio'){
            $.ajax({
                url: "ingresar_retirosocio.php",
                method: "POST",
                data: {fecha_add: fecha_add, detalle_add: detalle_add, valor_add: valor_add},
                success: function(data){
                    obtener_datos_gasto_credito_socio("");
                    alert(data);
                }
            });
        }else if(select_tipodocumento_add == 'Pago Credito'){
            $.ajax({
                url: "ingresar_pagocredito.php",
                method: "POST",
                data: {fecha_add: fecha_add, detalle_add: detalle_add, valor_add: valor_add},
                success: function(data){
                    obtener_datos_gasto_credito_socio("");
                    alert(data);
                }
            });
        }else if(select_tipodocumento_add == 'Compra'){
            $.ajax({
                url: "ingresar_compra.php",
                method: "POST",
                data: {fecha_add: fecha_add, detalle_add: detalle_add, valor_add: valor_add},
                success: function(data){
                    obtener_datos_gasto_credito_socio("");
                    alert(data);
                }
            });
        }else if(select_tipodocumento_add == 'Credito'){
            $.ajax({
                url: "ingresar_credito.php",
                method: "POST",
                data: {fecha_add: fecha_add, detalle_add: detalle_add, valor_add: valor_add},
                success: function(data){
                    obtener_datos_gasto_credito_socio("");
                    alert(data);
                }
            });
        }
        $(document).ready(function() {
            $('#fecha_add').val('');
            $("#select_tipodocumento").val("1");
            $('#detalle_add').val('');
            $('#valor_add').val('');
        });
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
<title>Sociedad FYD - Gestión y Contabilidad </title>
<body oncopy="return false" onpaste="return false" oncontextmenu="return false">
<img src="../Imagenes/fondo_login.jpg" id="fondo"/>
<p></p>
<div class="form1">
<div class="form0">
<aside class="cuadrado">
<label class="adorno_botones"><img src="../Imagenes/wincontrol.png"></img></label>
<label class= "titulo2">Gastos y Retiros </label>
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
        <label class="holaadmin"><?php echo "Hola, " . $valor_nombre ?><input type="submit" onclick="" id="ce" class="ce" name="ce" value="Cerrar Sesión"></label>
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
<button id="desplegar_item" class="dropbtn">Gastos y Retiros</button>
</div>
<div class="tablascroll">
    <div id="seccion_notafactura">
        <label>Fecha:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="date" class="grid-item" id="fecha_add" name="fecha_add" min='2005-01-01' max='2100-12-31' placeholder="Fecha..." size="30" maxlength="70" autocomplete="off" /></label>
        <p></p><label>Tipo Documento:&nbsp;&nbsp;&nbsp;<select id="select_tipodocumento" name="select_tipodocumento">
            <option value="1" disabled selected>Seleccione Tipo...</option>
            <option value='Compra'>Factura</option>
            <option value='Gasto'>Gastos</option>
            <option value='Retiro Socio'>Retiro Socios</option>
            <option value='Pago Credito'>Pago Créditos</option>
            <option value='Credito'>Nota Crédito</option>
        </select></label>
        <p></p>
        <label>Detalle:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="grid-item" id="detalle_add" name="detalle_add" placeholder="Detalle..." size="30" maxlength="70" autocomplete="off" /></label>
        <p></p>
        <label>Valor $:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="grid-item" id="valor_add" name="valor_add" placeholder="Valor..." size="30" maxlength="70" autocomplete="off" /></label>
        <p></p>
        <button id="ingresar" class="boton_ingresar_factura">Ingresar</button>
    </div>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <select id="select_documento" name="select_documento">
        <option value="1" disabled selected>Seleccione Documento...</option>
        <option value='Todo'>Todos</option>
        <option value='Compra'>Factura</option>
        <option value='Gasto'>Gastos</option>
        <option value='Retiro Socio'>Retiro Socios</option>
        <option value='Pago Credito'>Pago Créditos</option>
        <option value='Credito'>Nota Crédito</option>
    </select>
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
            <option value="1" disabled selected>Seleccione Año...</option>
            <option value='234'>Todos</option>
            <?php $year = date("Y");
                for ($i=2005; $i<=$year; $i++){
                    echo '<option value="'.$i.'">'.$i.'</option>';
                }
            ?>
        </select>
        <button id="filtrar_mes_ano">Filtrar</button>
        <br></br>
    </div>
    <div id="result"><b></b></div>
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
<p class="titulo75">SOCIEDAD FYD</p>
<p class="copy">Copyright © 2021 | Diseñado por N.A.B para Comercial F&amp;D</p>
</body>
</html>
