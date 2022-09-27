<!DOCTYPE html>
<html lang="es">
<head>
<link href="tabla_cotizacion.css" rel="stylesheet" type="text/css">
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<?php $idempresa = $_POST["id_empresa"];?>
<script>
$(document).ready(function() {
    var valor_bd_desc_final, id_coti_otros = 0;
    function obtener_datos(texto){
            $.ajax({
                url:"buscar_ventas.php",
                method:"POST",
                data: {texto: texto, id_empresa: <?php echo $idempresa; ?>},
                success: function(data){
                    $("#result_ventas").html(data)
                }
            })
        }
        obtener_datos("vacio");
        $(document).on("keyup","#input_ventas", function(){
            if ($('input#input_ventas').val().length <= 3){
                $("input#input_ventas").focus();
                obtener_datos("vacio");
            }else if ($('input#input_ventas').val().length >= 4){
                obtener_datos($("input#input_ventas").val());
            }
        })
    function llamar_select_accionamiento(){
        $.ajax({
            url:"llamar_accionamiento.php",
            method:"POST",
            success: function(data){
                $("#select_accionamiento").html(data)
            }
        })
    }
    function llamar_select_accionamiento_roller(){
        $.ajax({
            url:"llamar_accionamiento_roller.php",
            method:"POST",
            success: function(data){
                $("#select_accionamiento_roller").html(data)
            }
        })
    }
    function llamar_select_lama(){
        $.ajax({
            url:"llamar_lama.php",
            method:"POST",
            success: function(data){
                $("#select_lama").html(data)
            }
        })
    }
    function llamar_select_color(){
        $.ajax({
            url:"llamar_color.php",
            method:"POST",
            success: function(data){
                $("#select_color").html(data)
            }
        })
    }
    /*function llamar_select_color_roller(){
        $.ajax({
            url:"llamar_color_roller.php",
            method:"POST",
            success: function(data){
                $("#select_color_roller").html(data)
            }
        })
    }*/
    function llamar_select_cortina(){
        $.ajax({
            url:"llamar_cortina.php",
            method:"POST",
            success: function(data){
                $("#select_cortina").html(data)
            }
        })
    }
    function llamar_select_repuestos(){
        $.ajax({
            url:"llamar_repuestos.php",
            method:"POST",
            success: function(data){
                $("#select_repuestos").html(data)
            }
        })
    }
    function llamar_select_otros(){
        $.ajax({
            url:"llamar_otros.php",
            method:"POST",
            success: function(data){
                $("#select_otros").html(data)
            }
        })
    }
    function consultar_id_coti_persiana(){
        $.ajax({
            url:"consultar_id_coti_persiana.php",
            method:"POST",
            async:false,
            success: function(data){
                var suma = parseInt(data) + 8063;
                $("#id_coti_persiana").html(suma);
            }
        })
    }
    function consultar_id_coti_roller(){
        $.ajax({
            url:"consultar_id_coti_roller.php",
            method:"POST",
            async:false,
            success: function(data){
                var suma = parseInt(data) + 8063;
                $("#id_coti_roller").html(suma);
            }
        })
    }
    function consultar_id_coti_repuesto(){
        $.ajax({
            url:"consultar_id_coti_repuesto.php",
            method:"POST",
            async:false,
            success: function(data){
                var suma = parseInt(data) + 8063;
                $("#id_coti_repuesto").html(suma);
            }
        })
    }
    function consultar_id_coti_otro(){
        $.ajax({
            url:"consultar_id_coti_otro.php",
            method:"POST",
            async:false,
            success: function(data){
                var suma = parseInt(data) + 8063;
                $("#id_coti_otro").html(suma);
            }
        })
    }
    function consultar_descpersiana(){
        $.ajax({
            url:"consultar_descpersiana.php",
            method:"POST",
            async:false,
            success: function(data){
                $("#desc").val(data)
            }
        })
    }
    function consultar_descroller(){
        $.ajax({
            url:"consultar_descroller.php",
            method:"POST",
            async:false,
            success: function(data){
                $("#desc1").val(data)
            }
        })
    }
    function consultar_descfinal(){
        $.ajax({
            url:"consultar_descfinal.php",
            method:"POST",
            async:false,
            success: function(data){
                valor_bd_desc_final = parseInt(data);
            }
        })
    }
    function consultar_id_coti_otrosss(){
        $.ajax({
            url: "consultar_id_cotizacion_otros.php",
            method: "POST",
            async:false,
            success: function(result){
                var suma = parseInt(result) + 8063;
                id_coti_otros = suma;
                console.log("id: "+id_coti_otros);
            }
        });
    }
    llamar_select_color();
    llamar_select_lama();
    //llamar_select_accionamiento();
    //llamar_select_color_roller();
    //llamar_select_cortina();
    //llamar_select_accionamiento_roller();
    //llamar_select_repuestos();
    //llamar_select_otros();
    consultar_id_coti_persiana();
    consultar_id_coti_roller();
    consultar_id_coti_repuesto();
    consultar_id_coti_otro();
    consultar_id_coti_otrosss();
    consultar_descpersiana();
    consultar_descroller();
    consultar_descfinal();
    var a, b, c = 0;
    $(document).on("click","#boton_agregarfila",function(){
        $("#tabla_cotizar").each(function() {
            var tds = '<tr>';
            jQuery.each($('tr:last td', this), function() {
                tds += '<td contenteditable>' + $(this).html() + '</td>';
            });
            tds += '</tr>';
            if ($('tbody', this).length > 0) {
                $('tbody', this).append(tds);
            } else {
                $(this).append(tds);
            }
        });
        buscar_precio_lama_ancho_alto();
    });
    $(document).on("click","#boton_quitar_tabla_persiana",function(){
        limpiar_tabla_cotizacion();
        if (b = 0){
            a = 1;
        }else if (c = 0){
            a = 1;
        }else if (b == 0 && c == 0){
            a = 1;
        }
        $("#ext_tabla_cotizaciones").css("display", "none");
        $("#saldo_desc").val(0);
        $("#total").val(0);
        buscar_precio_lama_ancho_alto();
        sumar_subtotal();
        sumar_totales();
    });
    $(document).on("click","#boton_quitar_tabla_roller",function(){
        limpiar_tabla_cotizacion_roller();
        if (a = 0){
            b = 1;
        }else if (c = 0){
            b = 1;
        }else if (a == 0 && c == 0){
            b = 1;
        }
        $("#ext_tabla_roller").css("display", "none");
        $("#saldo_desc1").val(0);
        $("#total1").val(0);
        buscar_precio_roller_ancho_alto();
        sumar_subtotal_roller();
        sumar_totales();
    });

    $(document).on("click","#boton_quitar_tabla_repuesto",function(){
        limpiar_tabla_cotizacion_repuestos();
        if (a = 0){
            c = 1;
        }else if (b = 0){
            c = 1;
        }else if (a == 0 && b == 0){
            c = 1;
        }
        $("#ext_tabla_repuestos").css("display", "none");
        $("#subtotal9").val(0);
        buscar_precio_repuestos();
        sumar_subtotal_repuesto();
        sumar_totales();
    });

    $(document).on("click","#boton_quitar_tabla_otros",function(){
        limpiar_tabla_cotizacion_otros();
        $("#ext_tabla_otros").css("display", "none");
        $("#subtotal8").val(0);
        buscar_precio_otros();
        sumar_subtotal_otros();
        sumar_totales();
    });


    $(document).on("click","#boton_agregarfila_roller",function(){
        $("#tabla_roller").each(function() {
            var tds = '<tr>';
            jQuery.each($('tr:last td', this), function() {
                tds += '<td contenteditable>' + $(this).html() + '</td>';
            });
            tds += '</tr>';
            if ($('tbody', this).length > 0) {
                $('tbody', this).append(tds);
            } else {
                $(this).append(tds);
            }
        });
        buscar_precio_roller_ancho_alto();
    });

    $(document).on("click","#boton_agregarfila_rep",function(){
        $("#tabla_repuestos").each(function() {
            var tds = '<tr>';
            jQuery.each($('tr:last td', this), function() {
                tds += '<td contenteditable>' + $(this).html() + '</td>';
            });
            tds += '</tr>';
            if ($('tbody', this).length > 0) {
                $('tbody', this).append(tds);
            } else {
                $(this).append(tds);
            }
        });
        buscar_precio_repuestos();
    });

    $(document).on("click","#boton_agregarfila_otros",function(){
        $("#tabla_otros").each(function() {
            var tds = '<tr>';
            jQuery.each($('tr:last td', this), function() {
                tds += '<td contenteditable>' + $(this).html() + '</td>';
            });
            tds += '</tr>';
            if ($('tbody', this).length > 0) {
                $('tbody', this).append(tds);
            } else {
                $(this).append(tds);
            }
        });
        buscar_precio_otros();
    });
    $(document).on('click', '#quitar_fila', function (event) {
        event.preventDefault();
        $(this).closest('tr').remove();
        buscar_precio_lama_ancho_alto();
        buscar_precio_roller_ancho_alto();
        buscar_precio_repuestos();
        buscar_precio_otros();
        sumar_subtotal();
        sumar_subtotal_roller();
        sumar_subtotal_repuesto();
        sumar_subtotal_otros();
        sumar_totales();
    });
    $("#boton_persiana").on("click",function(){
        $("#modal_cotizar").css("display", "none");
        $("#ext_tabla_cotizaciones").css("display", "block");
        $("#guardar_coti").css("display", "block");
        $("#abrir_empresas").css("display", "block");
        $("#ext_tabla_ventas").css("display", "none");
        $("#aritmetica_cotizacion_ext").css("display", "block");
        if (b = 0){
            a = 1;
        }else if (c = 0){
            a = 1;
        }else if (b == 0 && c == 0){
            a = 1;
        }
    });
    $("#boton_roller").on("click",function(){
        $("#modal_cotizar").css("display", "none");
        $("#ext_tabla_roller").css("display", "block");
        $("#guardar_coti").css("display", "block");
        $("#abrir_empresas").css("display", "block");
        $("#ext_tabla_ventas").css("display", "none");
        $("#aritmetica_cotizacion_ext").css("display", "block");
        if (a = 0){
            b = 1;
        }else if (c = 0){
            b = 1;
        }else if (a == 0 && c == 0){
            b = 1;
        }
    });
    $("#boton_repuestos").on("click",function(){
        $("#modal_cotizar").css("display", "none");
        $("#ext_tabla_repuestos").css("display", "block");
        $("#guardar_coti").css("display", "block");
        $("#abrir_empresas").css("display", "block");
        $("#ext_tabla_ventas").css("display", "none");
        $("#aritmetica_cotizacion_ext").css("display", "block");
        if (a = 0){
            c = 1;
        }else if (b = 0){
            c = 1;
        }else if (a == 0 && b == 0){
            c = 1;
        }
    });
    $("#boton_otros").on("click",function(){
        $("#modal_cotizar").css("display", "none");
        $("#ext_tabla_otros").css("display", "block");
        $("#guardar_coti").css("display", "block");
        $("#abrir_empresas").css("display", "block");
        $("#ext_tabla_ventas").css("display", "none");
        $("#aritmetica_cotizacion_ext").css("display", "block");
    });
    $('#abrir_empresas').on("click",function(){
	    $("#modal_cotizar_final").css("display", "block");
    });
    $('#close_modal_final').on("click",function(){
    	$("#modal_cotizar_final").css("display", "none");
    });
    var modal_final = document.getElementById("modal_cotizar_final");
    $(window).on("click",function(event){
    	if (event.target == modal_final) {
    		$("#modal_cotizar_final").css("display", "none");
    	}
    });
    function recorrer_precio_lama_ancho_alto(){
        $('#tabla_cotizar tbody tr').each(function (e) {
            var valor_ajax, valor_accion, valor_desc1prov, valor_desc2prov, valor_desc1vent, valor_desc2vent, valor_ganancia, valor_desc1prov_acc, valor_desc2prov_acc, valor_desc1vent_acc, valor_desc2vent_acc, valor_ganancia_acc, sumatoria_instalacion = 0;
            var mult_producto = 0;
        	var fc = $(this).find('td:nth-child(1)').find('select').val();
            var cantidad_prod = parseInt($(this).find('td:nth-child(2)').text());
            var ancho = parseInt($(this).find('td:nth-child(3)').text());
        	var alto = parseInt($(this).find('td:nth-child(4)').text());
        	var lama = $(this).find('td:nth-child(5)').find('select').val();
        	var color = $(this).find('td:nth-child(6)').find('select').val();
        	var accionamiento = $(this).find('td:nth-child(7)').find('select').val();
        	if (lama == null && color == null){
        	}else if(lama != null && color == null || lama != null && color == '101'){
        	}else{
            	$.ajax({
                    url:"consulta_color.php",
                    method:"POST",
                    async:false,
                    data: {texto: lama, texto2: color},
                    success: function(data){
                        if (data == '0'){
                        }else if(data == '1'){
                            alert("El color no esta disponible para la Lama " + lama);
                        }
                    }
                });
        	}
        	var aprox_ancho, aprox_alto = 0;
        	var suma_ancho, suma_alto = 0;
        	if (accionamiento == '1'){
        	}else if(accionamiento != '1'){
        	    if (fc == 'Final'){
        	       aprox_ancho = Math.ceil(ancho/100)*100;
        	       aprox_alto = Math.ceil(alto/100)*100;
        	    }else if (fc == 'Crece'){
        	       suma_ancho = ancho + 200;
        	       suma_alto = alto + 300;
        	       aprox_ancho = Math.ceil(suma_ancho/100)*100;
        	       aprox_alto = Math.ceil(suma_alto/100)*100;
        	    }
        	    if(aprox_ancho < 1000){
        	       aprox_ancho = 1000;
        	    }
        	    if(aprox_alto < 1000){
        	       aprox_alto = 1000;
        	    }
            	$.ajax({
                    url: "llamar_precio_lama.php",
                    method: "POST",
                    async:false,
                    data: {ancho: aprox_ancho, alto: aprox_alto, nombre_lama: lama},
                    success: function(result){
                        valor_ajax = result;
                    }
                });
                $.ajax({
                    url: "llamar_precio_accionamiento.php",
                    method: "POST",
                    async:false,
                    data: {nombre_accionamiento: accionamiento},
                    success: function(result){
                        valor_accion = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc1_proveedor.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_desc1prov = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc2_proveedor.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_desc2prov = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc1_venta.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_desc1vent = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc2_venta.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_desc2vent = result;
                    }
                });
                $.ajax({
                    url: "llamar_ganancia.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_ganancia = result;
                    }
                });
                //accionamiento_valorinflado
                $.ajax({
                    url: "llamar_desc1_proveedor.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: accionamiento},
                    success: function(result){
                        valor_desc1prov_acc = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc2_proveedor.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: accionamiento},
                    success: function(result){
                        valor_desc2prov_acc = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc1_venta.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: accionamiento},
                    success: function(result){
                        valor_desc1vent_acc = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc2_venta.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: accionamiento},
                    success: function(result){
                        valor_desc2vent_acc = result;
                    }
                });
                $.ajax({
                    url: "llamar_ganancia.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: accionamiento},
                    success: function(result){
                        valor_ganancia_acc = result;
                    }
                });
                var desc1_proveedor, desc2_proveedor, ganancia, desc1_venta, desc2_venta, incremento_ganancia, subtotal_inflado, porc_1, porc_2, resta, total, desc1_proveedor_acc, desc2_proveedor_acc, ganancia_acc, desc1_venta_acc, desc2_venta_acc, incremento_ganancia_acc, subtotal_inflado_acc = 0;
                var precio_unitario = valor_ajax;
                var precio_unitario_acc = valor_accion;
                var mostrar_desc0 = 0;
                var costo, costo2, costo_acc, costo2_acc, vventa, vventa2, pventa, pventa2 = 0;
                desc1_proveedor = parseInt(precio_unitario) * valor_desc1prov /100;
                costo = Math.round(precio_unitario - desc1_proveedor);
                desc2_proveedor = Math.round(costo * valor_desc2prov / 100);
                costo2 = Math.round(costo - desc2_proveedor);
                ganancia = Math.round(costo * valor_ganancia / 100);
                vventa = parseInt(costo2) + parseInt(ganancia);
                desc1_venta = Math.round(vventa * valor_desc1vent /100);
                pventa = parseInt(vventa) + parseInt(desc1_venta);
                desc1_proveedor_acc = parseInt(precio_unitario_acc) * valor_desc1prov_acc /100;
                costo_acc = Math.round(precio_unitario_acc - desc1_proveedor_acc);
                desc2_proveedor_acc = Math.round(costo_acc * valor_desc2prov_acc / 100);
                costo2_acc = Math.round(costo_acc - desc2_proveedor_acc);
                ganancia_acc = Math.round(costo_acc * valor_ganancia_acc / 100);
                vventa2 = parseInt(costo2_acc) + parseInt(ganancia_acc);
                desc1_venta_acc = Math.round(vventa2 * valor_desc1vent_acc /100);
                pventa2 = parseInt(vventa2) + parseInt(desc1_venta_acc);
                /*porc_1 = ganancia * 100 / subtotal_inflado;
                porc_2 = 100 - porc_1;
                resta = porc_2 * subtotal_inflado;
                resta /= 100;
                total = Math.round(subtotal_inflado - resta);
                console.log('Desc: '+porc_2);
                console.log('Total: '+ total);*/
                $(this).find('td:nth-child(8)').text(Math.round(pventa) + parseInt(pventa2));
                mult_producto = cantidad_prod * pventa + cantidad_prod * parseInt(pventa2);
                $(this).find('td:nth-child(9)').text(Math.round(mult_producto));
                sumar_subtotal();
                var subtotal, desc, tot = 0;
                subtotal = $('#subtotal0').val();
                desc = $('#desc').val();
                valor_inssss();
                var valor_j = $('#valor_ins').val();
                tot = parseInt(subtotal) - parseInt(subtotal) * parseInt(desc) / 100;
                mostrar_desc0 = parseInt(subtotal) * parseInt(desc) / 100;
                $('#saldo_desc').val(Math.round(mostrar_desc0));
                $('#saldo_completo').val(subtotal-Math.round(mostrar_desc0));
                sumatoria_instalacion = Math.round(tot) +  parseInt(valor_j);
                $('#total').val(sumatoria_instalacion);
                sumar_totales();
            }
            
        });
    }
    function buscar_precio_lama_ancho_alto(){
        $('#tabla_cotizar').find('tr').on('input', function (e) {
            var valor_ajax, valor_accion, valor_desc1prov, valor_desc2prov, valor_desc1vent, valor_desc2vent, valor_ganancia, valor_desc1prov_acc, valor_desc2prov_acc, valor_desc1vent_acc, valor_desc2vent_acc, valor_ganancia_acc, sumatoria_instalacion = 0;
            var mult_producto = 0;
        	var fc = $(this).find('td:nth-child(1)').find('select').val();
            var cantidad_prod = parseInt($(this).find('td:nth-child(2)').text());
            var ancho = parseInt($(this).find('td:nth-child(3)').text());
        	var alto = parseInt($(this).find('td:nth-child(4)').text());
        	var lama = $(this).find('td:nth-child(5)').find('select').val();
        	var color = $(this).find('td:nth-child(6)').find('select').val();
        	var accionamiento = $(this).find('td:nth-child(7)').find('select').val();
        	if (lama == null && color == null){
        	}else if(lama != null && color == null || lama != null && color == '101'){
        	}else{
            	$.ajax({
                    url:"consulta_color.php",
                    method:"POST",
                    async:false,
                    data: {texto: lama, texto2: color},
                    success: function(data){
                        if (data == '0'){
                        }else if(data == '1'){
                            alert("El color no esta disponible para la Lama " + lama);
                        }
                    }
                });
        	}
        	var aprox_ancho, aprox_alto = 0;
        	var suma_ancho, suma_alto = 0;
        	if (accionamiento == '1'){
        	}else if(accionamiento != '1'){
        	    if (fc == 'Final'){
        	       aprox_ancho = Math.ceil(ancho/100)*100;
        	       aprox_alto = Math.ceil(alto/100)*100;
        	    }else if (fc == 'Crece'){
        	       suma_ancho = ancho + 200;
        	       suma_alto = alto + 300;
        	       aprox_ancho = Math.ceil(suma_ancho/100)*100;
        	       aprox_alto = Math.ceil(suma_alto/100)*100;
        	    }
        	    if(aprox_ancho < 1000){
        	       aprox_ancho = 1000;
        	    }
        	    if(aprox_alto < 1000){
        	       aprox_alto = 1000;
        	    }
            	$.ajax({
                    url: "llamar_precio_lama.php",
                    method: "POST",
                    async:false,
                    data: {ancho: aprox_ancho, alto: aprox_alto, nombre_lama: lama},
                    success: function(result){
                        valor_ajax = result;
                    }
                });
                $.ajax({
                    url: "llamar_precio_accionamiento.php",
                    method: "POST",
                    async:false,
                    data: {nombre_accionamiento: accionamiento},
                    success: function(result){
                        valor_accion = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc1_proveedor.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_desc1prov = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc2_proveedor.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_desc2prov = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc1_venta.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_desc1vent = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc2_venta.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_desc2vent = result;
                    }
                });
                $.ajax({
                    url: "llamar_ganancia.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_ganancia = result;
                    }
                });
                //accionamiento_valorinflado
                $.ajax({
                    url: "llamar_desc1_proveedor.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: accionamiento},
                    success: function(result){
                        valor_desc1prov_acc = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc2_proveedor.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: accionamiento},
                    success: function(result){
                        valor_desc2prov_acc = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc1_venta.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: accionamiento},
                    success: function(result){
                        valor_desc1vent_acc = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc2_venta.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: accionamiento},
                    success: function(result){
                        valor_desc2vent_acc = result;
                    }
                });
                $.ajax({
                    url: "llamar_ganancia.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: accionamiento},
                    success: function(result){
                        valor_ganancia_acc = result;
                    }
                });
                var desc1_proveedor, desc2_proveedor, ganancia, desc1_venta, desc2_venta, incremento_ganancia, subtotal_inflado, porc_1, porc_2, resta, total, desc1_proveedor_acc, desc2_proveedor_acc, ganancia_acc, desc1_venta_acc, desc2_venta_acc, incremento_ganancia_acc, subtotal_inflado_acc = 0;
                var precio_unitario = valor_ajax;
                var precio_unitario_acc = valor_accion;
                var mostrar_desc0 = 0;
                var costo, costo2, costo_acc, costo2_acc, vventa, vventa2, pventa, pventa2 = 0;
                desc1_proveedor = parseInt(precio_unitario) * valor_desc1prov /100;
                costo = Math.round(precio_unitario - desc1_proveedor);
                desc2_proveedor = Math.round(costo * valor_desc2prov / 100);
                costo2 = Math.round(costo - desc2_proveedor);
                ganancia = Math.round(costo * valor_ganancia / 100);
                vventa = parseInt(costo2) + parseInt(ganancia);
                desc1_venta = Math.round(vventa * valor_desc1vent /100);
                pventa = parseInt(vventa) + parseInt(desc1_venta);
                desc1_proveedor_acc = parseInt(precio_unitario_acc) * valor_desc1prov_acc /100;
                costo_acc = Math.round(precio_unitario_acc - desc1_proveedor_acc);
                desc2_proveedor_acc = Math.round(costo_acc * valor_desc2prov_acc / 100);
                costo2_acc = Math.round(costo_acc - desc2_proveedor_acc);
                ganancia_acc = Math.round(costo_acc * valor_ganancia_acc / 100);
                vventa2 = parseInt(costo2_acc) + parseInt(ganancia_acc);
                desc1_venta_acc = Math.round(vventa2 * valor_desc1vent_acc /100);
                pventa2 = parseInt(vventa2) + parseInt(desc1_venta_acc);
                /*porc_1 = ganancia * 100 / subtotal_inflado;
                porc_2 = 100 - porc_1;
                resta = porc_2 * subtotal_inflado;
                resta /= 100;
                total = Math.round(subtotal_inflado - resta);
                console.log('Desc: '+porc_2);
                console.log('Total: '+ total);*/
                $(this).find('td:nth-child(8)').text(Math.round(pventa) + parseInt(pventa2));
                mult_producto = cantidad_prod * pventa + cantidad_prod * parseInt(pventa2);
                $(this).find('td:nth-child(9)').text(Math.round(mult_producto));
                sumar_subtotal();
                var subtotal, desc, tot = 0;
                subtotal = $('#subtotal0').val();
                desc = $('#desc').val();
                valor_inssss();
                var valor_j = $('#valor_ins').val();
                tot = parseInt(subtotal) - parseInt(subtotal) * parseInt(desc) / 100;
                mostrar_desc0 = parseInt(subtotal) * parseInt(desc) / 100;
                $('#saldo_desc').val(Math.round(mostrar_desc0));
                $('#saldo_completo').val(subtotal-Math.round(mostrar_desc0));
                sumatoria_instalacion = Math.round(tot) +  parseInt(valor_j);
                $('#total').val(sumatoria_instalacion);
                sumar_totales();
            }
        });
    }
    /*function resolver_suma_valores_persiana(){
        sumar_subtotal();
        var subtotal, desc, tot, mostrar_desc0 = 0;
        subtotal = $('#subtotal0').val();
        desc = $('#desc').val();
        valor_inssss();
        var valor_j = $('#valor_ins').val();
        tot = parseInt(subtotal) - parseInt(subtotal) * parseInt(desc) / 100;
        mostrar_desc0 = parseInt(subtotal) * parseInt(desc) / 100;
        $('#saldo_desc').val(Math.round(mostrar_desc0));
        $('#saldo_completo').val(subtotal-Math.round(mostrar_desc0));
        sumatoria_instalacion = Math.round(tot) +  parseInt(valor_j);
        $('#total').val(sumatoria_instalacion);
        sumar_totales();
    }*/
    
    $("#ins").change(function(){
        valor_inssss();
        recorrer_precio_lama_ancho_alto();
    });

    function sumar_subtotal(){
        var suma = 0;
        $('#tabla_cotizar tbody tr').each(function () {
            var b = $(this).find('td').eq(8).html();
            suma += parseInt(b);
        });
        $('#subtotal0').val(suma);
    }
    
    /*$(document).on('blur', '#motor_add', function(){
        resolver_suma_valores_persiana();
        $('#tabla_roller tbody tr').each(function () {
            var b = $(this).find('td').eq(2).html();
            if (b == 0){
            }else if(b != 0){
                resolver_suma_valores_roller();
            }
        });
    });
    
    $(document).on('blur', '#lama_add', function(){
        resolver_suma_valores_persiana();
        $('#tabla_roller tbody tr').each(function () {
            var b = $(this).find('td').eq(2).html();
            if (b == 0){
            }else if(b != 0){
                resolver_suma_valores_roller();
            }
        });
    });
    
    $(document).on('blur', '#color_add', function(){
        resolver_suma_valores_persiana();
        $('#tabla_roller tbody tr').each(function () {
            var b = $(this).find('td').eq(2).html();
            if (b == 0){
            }else if(b != 0){
                resolver_suma_valores_roller();
            }
        });
    });
    
    $(document).on('blur', '#motor_addr', function(){
        resolver_suma_valores_roller();
        $('#tabla_cotizar tbody tr').each(function () {
            var b = $(this).find('td').eq(2).html();
            if (b == 0){
            }else if(b != 0){
                resolver_suma_valores_persiana();
            }
        });
        $('#tabla_roller tbody tr').each(function () {
            var b = $(this).find('td').eq(2).html();
            if (b == 0){
            }else if(b != 0){
                resolver_suma_valores_roller();
            }
        });
    });*/
    
    function valor_inssss(){
        var valor_instalacion, cant= 0;
        $('#tabla_cotizar tbody tr').each(function () {
            var a = $(this).find('td').eq(1).html();
            cant += parseInt(a);
        });
        $.ajax({
            url: "llamar_precio_instalacion.php",
            method: "POST",
            async:false,
            data: {cant: cant},
            success: function(result){
                valor_instalacion = result;
            }
        });
        var inss = $("#ins").val();
        $('#cant_cot').html(cant);
        if(inss == 'Si'){
            if (cant >= 4){
                $('#valor_ins').val(parseInt(cant) * parseInt(valor_instalacion));
            }else if(cant <= 3){
                $('#valor_ins').val(valor_instalacion);
            }
        }else if (inss == 'No'){
            $('#valor_ins').val("0");
        }
    }
    function recorrer_precio_roller_ancho_alto(){
        $('#tabla_roller tbody tr').each(function (e) {
            var valor_ajax, valor_accion, valor_desc1prov, valor_desc2prov, valor_desc1vent, valor_desc2vent, valor_ganancia, valor_desc1prov_acc2, valor_desc2prov_acc2, valor_desc1vent_acc2, valor_desc2vent_acc2, valor_ganancia_acc2 = 0;
            var mult_producto = 0;
            var fc = $(this).find('td:nth-child(1)').find('select').val();
            var cantidad_prod = parseInt($(this).find('td:nth-child(2)').text());
            var ancho = parseInt($(this).find('td:nth-child(4)').text());
            var alto = parseInt($(this).find('td:nth-child(3)').text());
            var lama = $(this).find('td:nth-child(6)').find('select').val();
            var accionamiento = $(this).find('td:nth-child(7)').find('select').val();
            var aprox_ancho, aprox_alto = 0;
            var suma_ancho, suma_alto = 0;
            if (accionamiento == '1'){
            }else if(accionamiento != '1'){
                if (fc == 'Final'){
                   aprox_ancho = Math.ceil(ancho/100)*100;
                   aprox_alto = Math.ceil(alto/100)*100;
                }else if (fc == 'Crece'){
                   suma_ancho = ancho + 150;
                   suma_alto = alto + 200;
                   aprox_ancho = Math.ceil(suma_ancho/100)*100;
                   aprox_alto = Math.ceil(suma_alto/100)*100;
                }
                if(aprox_ancho < 600){
        	       aprox_ancho = 600;
        	    }
        	    if(aprox_alto < 600){
        	       aprox_alto = 600;
        	    }
                $.ajax({
                    url: "llamar_precio_roller.php",
                    method: "POST",
                    async:false,
                    data: {ancho: aprox_ancho, alto: aprox_alto, nombre_roller: lama},
                    success: function(result){
                        valor_ajax = result;
                    }
                });
                $.ajax({
                    url: "llamar_precio_accionamiento.php",
                    method: "POST",
                    async:false,
                    data: {nombre_accionamiento: accionamiento},
                    success: function(result){
                        valor_accion = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc1_proveedor.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_desc1prov = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc2_proveedor.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_desc2prov = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc1_venta.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_desc1vent = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc2_venta.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_desc2vent = result;
                    }
                });
                $.ajax({
                    url: "llamar_ganancia.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_ganancia = result;
                    }
                });
                //accionamiento_valorinflado
                $.ajax({
                    url: "llamar_desc1_proveedor.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: accionamiento},
                    success: function(result){
                        valor_desc1prov_acc2 = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc2_proveedor.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: accionamiento},
                    success: function(result){
                        valor_desc2prov_acc2 = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc1_venta.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: accionamiento},
                    success: function(result){
                        valor_desc1vent_acc2 = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc2_venta.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: accionamiento},
                    success: function(result){
                        valor_desc2vent_acc2 = result;
                    }
                });
                $.ajax({
                    url: "llamar_ganancia.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: accionamiento},
                    success: function(result){
                        valor_ganancia_acc2 = result;
                    }
                });
                var desc1_proveedor, desc2_proveedor, ganancia, desc1_venta, desc2_venta, incremento_ganancia, subtotal_inflado, porc_1, porc_2, resta, total, sumatoria_instalacion, desc1_proveedor_acc2, desc2_proveedor_acc2, ganancia_acc2, desc1_venta_acc2, desc2_venta_acc2, incremento_ganancia_acc2, subtotal_inflado_acc2 = 0;
                var precio_unitario = valor_ajax;
                var precio_unitario_acc2 = valor_accion;
                var mostrar_desc1 = 0;
                var costo, costo2, costo_acc, costo2_acc, vventa, vventa2, pventa, pventa2 = 0;
                desc1_proveedor = parseInt(precio_unitario) * valor_desc1prov /100;
                costo = Math.round(precio_unitario - desc1_proveedor);
                desc2_proveedor = Math.round(costo * valor_desc2prov / 100);
                costo2 = Math.round(costo - desc2_proveedor);
                ganancia = Math.round(costo * valor_ganancia / 100);
                vventa = parseInt(costo2) + parseInt(ganancia);
                desc1_venta = Math.round(vventa * valor_desc1vent /100);
                pventa = parseInt(vventa) + parseInt(desc1_venta);
                desc1_proveedor_acc2 = parseInt(precio_unitario_acc2) * valor_desc1prov_acc2 /100;
                costo_acc = Math.round(precio_unitario_acc2 - desc1_proveedor_acc2);
                desc2_proveedor_acc2 = Math.round(costo_acc * valor_desc2prov_acc2 / 100);
                costo2_acc = Math.round(costo_acc - desc2_proveedor_acc2);
                ganancia_acc2 = Math.round(costo_acc * valor_ganancia_acc2 / 100);
                vventa2 = parseInt(costo2_acc) + parseInt(ganancia_acc2);
                desc1_venta_acc2 = Math.round(vventa2 * valor_desc1vent_acc2 /100);
                pventa2 = parseInt(vventa2) + parseInt(desc1_venta_acc2);
                /*porc_1 = ganancia * 100 / subtotal_inflado;
                porc_2 = 100 - porc_1;
                resta = porc_2 * subtotal_inflado;
                resta /= 100;
                total = Math.round(subtotal_inflado - resta);
                console.log('Desc: '+porc_2);
                console.log('Total: '+ total);*/
                $(this).find('td:nth-child(8)').text(Math.round(pventa) + parseInt(pventa2));
                mult_producto = cantidad_prod * pventa + cantidad_prod * parseInt(pventa2);
                $(this).find('td:nth-child(9)').text(Math.round(mult_producto));
                sumar_subtotal_roller();
                var subtotal, desc, tot = 0;
                subtotal = $('#subtotal1').val();
                desc = $('#desc1').val();
                valor_inssss_roller();
                var valor_j = $('#valor_ins1').val();
                tot = parseInt(subtotal) - parseInt(subtotal) * parseInt(desc) / 100;
                mostrar_desc1 = parseInt(subtotal) * parseInt(desc) / 100;
                $('#saldo_desc1').val(Math.round(mostrar_desc1));
                $('#saldo_completo0').val(subtotal-Math.round(mostrar_desc1));
                sumatoria_instalacion = Math.round(tot) +  parseInt(valor_j);
                $('#total1').val(sumatoria_instalacion);
                sumar_totales();
            }
        });
    }
    function buscar_precio_roller_ancho_alto(){
        $('#tabla_roller').find('tr').on('input', function (e) {
            var valor_ajax, valor_accion, valor_desc1prov, valor_desc2prov, valor_desc1vent, valor_desc2vent, valor_ganancia, valor_desc1prov_acc2, valor_desc2prov_acc2, valor_desc1vent_acc2, valor_desc2vent_acc2, valor_ganancia_acc2 = 0;
            var mult_producto = 0;
            var fc = $(this).find('td:nth-child(1)').find('select').val();
            var cantidad_prod = parseInt($(this).find('td:nth-child(2)').text());
            var ancho = parseInt($(this).find('td:nth-child(4)').text());
            var alto = parseInt($(this).find('td:nth-child(3)').text());
            var lama = $(this).find('td:nth-child(6)').find('select').val();
            var accionamiento = $(this).find('td:nth-child(7)').find('select').val();
            var aprox_ancho, aprox_alto = 0;
            var suma_ancho, suma_alto = 0;
            if (accionamiento == '1'){
            }else if(accionamiento != '1'){
                if (fc == 'Final'){
                   aprox_ancho = Math.ceil(ancho/100)*100;
                   aprox_alto = Math.ceil(alto/100)*100;
                }else if (fc == 'Crece'){
                   suma_ancho = ancho + 150;
                   suma_alto = alto + 200;
                   aprox_ancho = Math.ceil(suma_ancho/100)*100;
                   aprox_alto = Math.ceil(suma_alto/100)*100;
                }
                if(aprox_ancho < 600){
        	       aprox_ancho = 600;
        	    }
        	    if(aprox_alto < 600){
        	       aprox_alto = 600;
        	    }
        	    $.ajax({
                    url: "llamar_precio_roller.php",
                    method: "POST",
                    async:false,
                    data: {ancho: aprox_ancho, alto: aprox_alto, nombre_roller: lama},
                    success: function(result){
                        if (lama.indexOf("Coleccion") > -1){
                            var mult = 0;
                            mult = Math.round(ancho * alto / 1000000 * parseInt(result));
                            valor_ajax = parseInt(mult);
                        }else{
                            valor_ajax = result;
                        }
                        console.log(valor_ajax);
                    }
                });
                $.ajax({
                    url: "llamar_precio_accionamiento.php",
                    method: "POST",
                    async:false,
                    data: {nombre_accionamiento: accionamiento},
                    success: function(result){
                        valor_accion = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc1_proveedor.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_desc1prov = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc2_proveedor.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_desc2prov = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc1_venta.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_desc1vent = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc2_venta.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_desc2vent = result;
                    }
                });
                $.ajax({
                    url: "llamar_ganancia.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_ganancia = result;
                    }
                });
                //accionamiento_valorinflado
                $.ajax({
                    url: "llamar_desc1_proveedor.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: accionamiento},
                    success: function(result){
                        valor_desc1prov_acc2 = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc2_proveedor.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: accionamiento},
                    success: function(result){
                        valor_desc2prov_acc2 = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc1_venta.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: accionamiento},
                    success: function(result){
                        valor_desc1vent_acc2 = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc2_venta.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: accionamiento},
                    success: function(result){
                        valor_desc2vent_acc2 = result;
                    }
                });
                $.ajax({
                    url: "llamar_ganancia.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: accionamiento},
                    success: function(result){
                        valor_ganancia_acc2 = result;
                    }
                });
                var desc1_proveedor, desc2_proveedor, ganancia, desc1_venta, desc2_venta, incremento_ganancia, subtotal_inflado, porc_1, porc_2, resta, total, sumatoria_instalacion, desc1_proveedor_acc2, desc2_proveedor_acc2, ganancia_acc2, desc1_venta_acc2, desc2_venta_acc2, incremento_ganancia_acc2, subtotal_inflado_acc2 = 0;
                var precio_unitario = valor_ajax;
                var precio_unitario_acc2 = valor_accion;
                var mostrar_desc1 = 0;
                var costo, costo2, costo_acc, costo2_acc, vventa, vventa2, pventa, pventa2 = 0;
                desc1_proveedor = parseInt(precio_unitario) * valor_desc1prov /100;
                costo = Math.round(precio_unitario - desc1_proveedor);
                desc2_proveedor = Math.round(costo * valor_desc2prov / 100);
                costo2 = Math.round(costo - desc2_proveedor);
                ganancia = Math.round(costo * valor_ganancia / 100);
                vventa = parseInt(costo2) + parseInt(ganancia);
                desc1_venta = Math.round(vventa * valor_desc1vent /100);
                pventa = parseInt(vventa) + parseInt(desc1_venta);
                desc1_proveedor_acc2 = parseInt(precio_unitario_acc2) * valor_desc1prov_acc2 /100;
                costo_acc = Math.round(precio_unitario_acc2 - desc1_proveedor_acc2);
                desc2_proveedor_acc2 = Math.round(costo_acc * valor_desc2prov_acc2 / 100);
                costo2_acc = Math.round(costo_acc - desc2_proveedor_acc2);
                ganancia_acc2 = Math.round(costo_acc * valor_ganancia_acc2 / 100);
                vventa2 = parseInt(costo2_acc) + parseInt(ganancia_acc2);
                desc1_venta_acc2 = Math.round(vventa2 * valor_desc1vent_acc2 /100);
                pventa2 = parseInt(vventa2) + parseInt(desc1_venta_acc2);
                /*porc_1 = ganancia * 100 / subtotal_inflado;
                porc_2 = 100 - porc_1;
                resta = porc_2 * subtotal_inflado;
                resta /= 100;
                total = Math.round(subtotal_inflado - resta);
                console.log('Desc: '+porc_2);
                console.log('Total: '+ total);*/
                $(this).find('td:nth-child(8)').text(Math.round(pventa) + parseInt(pventa2));
                mult_producto = cantidad_prod * pventa + cantidad_prod * parseInt(pventa2);
                $(this).find('td:nth-child(9)').text(Math.round(mult_producto));
                sumar_subtotal_roller();
                var subtotal, desc, tot = 0;
                subtotal = $('#subtotal1').val();
                desc = $('#desc1').val();
                valor_inssss_roller();
                var valor_j = $('#valor_ins1').val();
                tot = parseInt(subtotal) - parseInt(subtotal) * parseInt(desc) / 100;
                mostrar_desc1 = parseInt(subtotal) * parseInt(desc) / 100;
                $('#saldo_desc1').val(Math.round(mostrar_desc1));
                $('#saldo_completo0').val(subtotal-Math.round(mostrar_desc1));
                sumatoria_instalacion = Math.round(tot) +  parseInt(valor_j);
                $('#total1').val(sumatoria_instalacion);
                sumar_totales();
            }
        });
    }
    /*function resolver_suma_valores_roller(){
        sumar_subtotal_roller();
        var subtotal, desc, tot, mostrar_desc1 = 0;
        subtotal = $('#subtotal1').val();
        desc = $('#desc1').val();
        valor_inssss_roller();
        var valor_j = $('#valor_ins1').val();
        tot = parseInt(subtotal) - parseInt(subtotal) * parseInt(desc) / 100;
        mostrar_desc1 = parseInt(subtotal) * parseInt(desc) / 100;
        $('#saldo_desc1').val(Math.round(mostrar_desc1));
        $('#saldo_completo0').val(subtotal-Math.round(mostrar_desc1));
        sumatoria_instalacion = Math.round(tot) +  parseInt(valor_j);
        $('#total1').val(sumatoria_instalacion);
        sumar_totales();
    }*/
    $("#ins1").change(function(){
        valor_inssss_roller();
        recorrer_precio_roller_ancho_alto();
    });
    function sumar_subtotal_roller(){
        var suma = 0;
        $('#tabla_roller tbody tr').each(function () {
            var b = $(this).find('td').eq(8).html();
            suma += parseInt(b);
        });
        $('#subtotal1').val(suma);
    }
    function valor_inssss_roller(){
        var valor_instalacion, cant= 0;
        $('#tabla_roller tbody tr').each(function () {
            var a = $(this).find('td').eq(1).html();
            cant += parseInt(a);
        });
        //id: echo $idempresa; ?>
        $.ajax({
            url: "llamar_precio_instalacion_roller.php",
            method: "POST",
            async:false,
            data: {cant: cant},
            success: function(result){
                valor_instalacion = result;
            }
        });
        var inss = $("#ins1").val();
        $('#cant_cot1').html(cant);
        if(inss == 'Si'){
            if (cant >= 4){
                $('#valor_ins1').val(parseInt(cant) * parseInt(valor_instalacion));
            }else if(cant <= 3){
                $('#valor_ins1').val(valor_instalacion);
            }
        }else if (inss == 'No'){
            $('#valor_ins1').val("0");
        }
    }
    function recorrer_precio_repuestos(){
        $('#tabla_repuestos tbody tr').each(function (e) {
            var valor_ajax, valor_desc1prov, valor_desc2prov, valor_desc1vent, valor_desc2vent, valor_ganancia = 0;
            var mult_producto = 0;
            var cantidad_prod = parseInt($(this).find('td:nth-child(1)').text());
        	var lama = $(this).find('td:nth-child(2)').find('select').val();
        	if (lama == '1'){
        	}else{
            	$.ajax({
                    url: "llamar_precio_repuesto.php",
                    method: "POST",
                    async:false,
                    data: {nombre_repuesto: lama},
                    success: function(result){
                        valor_ajax = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc1_proveedor.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_desc1prov = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc2_proveedor.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_desc2prov = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc1_venta.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_desc1vent = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc2_venta.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_desc2vent = result;
                    }
                });
                $.ajax({
                    url: "llamar_ganancia.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_ganancia = result;
                    }
                });
            }
            var desc1_proveedor, desc2_proveedor, ganancia, desc1_venta, desc2_venta, incremento_ganancia, subtotal_inflado, porc_1, porc_2, resta, total, sumatoria_instalacion = 0;
            var precio_unitario = valor_ajax;
            var costo, costo2, costo_acc, costo2_acc, vventa, vventa2, pventa, pventa2 = 0;
            desc1_proveedor = parseInt(precio_unitario) * valor_desc1prov /100;
            costo = Math.round(precio_unitario - desc1_proveedor);
            desc2_proveedor = Math.round(costo * valor_desc2prov / 100);
            costo2 = Math.round(costo - desc2_proveedor);
            ganancia = Math.round(costo * valor_ganancia / 100);
            vventa = parseInt(costo2) + parseInt(ganancia);
            desc1_venta = Math.round(vventa * valor_desc1vent /100);
            pventa = parseInt(vventa) + parseInt(desc1_venta);
            /*porc_1 = ganancia * 100 / subtotal_inflado;
            porc_2 = 100 - porc_1;
            resta = porc_2 * subtotal_inflado;
            resta /= 100;
            total = Math.round(subtotal_inflado - resta);
            console.log('Desc: '+porc_2);
            console.log('Total: '+ total);*/
            $(this).find('td:nth-child(3)').text(Math.round(pventa));
            mult_producto = cantidad_prod * pventa;
            $(this).find('td:nth-child(4)').text(Math.round(mult_producto));
            sumar_subtotal_repuesto();
            sumar_totales();
            /*
            $(this).find('td:nth-child(3)').text(valor_ajax);
            mult_producto = cantidad_prod * valor_ajax;
            $(this).find('td:nth-child(4)').text(mult_producto);
            */
        });
    }

    function buscar_precio_repuestos(){
        $('#tabla_repuestos').find('tr').on('input', function (e) {
            var valor_ajax, valor_desc1prov, valor_desc2prov, valor_desc1vent, valor_desc2vent, valor_ganancia = 0;
            var mult_producto = 0;
            var cantidad_prod = parseInt($(this).find('td:nth-child(1)').text());
        	var lama = $(this).find('td:nth-child(2)').find('select').val();
        	if (lama == '1'){
        	}else{
            	$.ajax({
                    url: "llamar_precio_repuesto.php",
                    method: "POST",
                    async:false,
                    data: {nombre_repuesto: lama},
                    success: function(result){
                        valor_ajax = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc1_proveedor.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_desc1prov = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc2_proveedor.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_desc2prov = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc1_venta.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_desc1vent = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc2_venta.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_desc2vent = result;
                    }
                });
                $.ajax({
                    url: "llamar_ganancia.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_ganancia = result;
                    }
                });
            }
            var desc1_proveedor, desc2_proveedor, ganancia, desc1_venta, desc2_venta, incremento_ganancia, subtotal_inflado, porc_1, porc_2, resta, total, sumatoria_instalacion = 0;
            var precio_unitario = valor_ajax;
            var costo, costo2, costo_acc, costo2_acc, vventa, vventa2, pventa, pventa2 = 0;
            desc1_proveedor = parseInt(precio_unitario) * valor_desc1prov /100;
            costo = Math.round(precio_unitario - desc1_proveedor);
            desc2_proveedor = Math.round(costo * valor_desc2prov / 100);
            costo2 = Math.round(costo - desc2_proveedor);
            ganancia = Math.round(costo * valor_ganancia / 100);
            vventa = parseInt(costo2) + parseInt(ganancia);
            desc1_venta = Math.round(vventa * valor_desc1vent /100);
            pventa = parseInt(vventa) + parseInt(desc1_venta);
            /*porc_1 = ganancia * 100 / subtotal_inflado;
            porc_2 = 100 - porc_1;
            resta = porc_2 * subtotal_inflado;
            resta /= 100;
            total = Math.round(subtotal_inflado - resta);
            console.log('Desc: '+porc_2);
            console.log('Total: '+ total);*/
            $(this).find('td:nth-child(3)').text(Math.round(pventa));
            mult_producto = cantidad_prod * pventa;
            $(this).find('td:nth-child(4)').text(Math.round(mult_producto));
            sumar_subtotal_repuesto();
            sumar_totales();
            /*
            $(this).find('td:nth-child(3)').text(valor_ajax);
            mult_producto = cantidad_prod * valor_ajax;
            $(this).find('td:nth-child(4)').text(mult_producto);
            */
        });
    }
    function sumar_subtotal_repuesto(){
        var suma = 0;
        $('#tabla_repuestos tbody tr').each(function () {
            var b = $(this).find('td').eq(3).html();
            suma += parseInt(b);
        });
        $('#subtotal9').val(suma);
    }
    function recorrer_precio_otros(){
        $('#tabla_otros tbody tr').each(function (e) {
            var valor_ajax, valor_desc1prov, valor_desc2prov, valor_desc1vent, valor_desc2vent, valor_ganancia = 0;
            var mult_producto = 0;
            var cantidad_prod = parseInt($(this).find('td:nth-child(1)').text());
        	var lama = $(this).find('td:nth-child(2)').find('select').val();
        	if (lama == '1'){
        	}else{
            	$.ajax({
                    url: "llamar_precio_otros.php",
                    method: "POST",
                    async:false,
                    data: {nombre_otros: lama},
                    success: function(result){
                        valor_ajax = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc1_proveedor.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_desc1prov = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc2_proveedor.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_desc2prov = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc1_venta.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_desc1vent = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc2_venta.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_desc2vent = result;
                    }
                });
                $.ajax({
                    url: "llamar_ganancia.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_ganancia = result;
                    }
                });
            }
            var desc1_proveedor, desc2_proveedor, ganancia, desc1_venta, desc2_venta, incremento_ganancia, subtotal_inflado, porc_1, porc_2, resta, total, sumatoria_instalacion = 0;
            var precio_unitario = valor_ajax;
            var costo, costo2, costo_acc, costo2_acc, vventa, vventa2, pventa, pventa2 = 0;
            desc1_proveedor = parseInt(precio_unitario) * valor_desc1prov /100;
            costo = Math.round(precio_unitario - desc1_proveedor);
            desc2_proveedor = Math.round(costo * valor_desc2prov / 100);
            costo2 = Math.round(costo - desc2_proveedor);
            ganancia = Math.round(costo * valor_ganancia / 100);
            vventa = parseInt(costo2) + parseInt(ganancia);
            desc1_venta = Math.round(vventa * valor_desc1vent /100);
            pventa = parseInt(vventa) + parseInt(desc1_venta);
            /*porc_1 = ganancia * 100 / subtotal_inflado;
            porc_2 = 100 - porc_1;
            resta = porc_2 * subtotal_inflado;
            resta /= 100;
            total = Math.round(subtotal_inflado - resta);
            console.log('Desc: '+porc_2);
            console.log('Total: '+ total);*/
            $(this).find('td:nth-child(3)').text(Math.round(pventa));
            mult_producto = cantidad_prod * pventa;
            $(this).find('td:nth-child(4)').text(Math.round(mult_producto));
            sumar_subtotal_otros();
            sumar_totales();
            /*$(this).find('td:nth-child(3)').text(valor_ajax);
            mult_producto = cantidad_prod * valor_ajax;
            $(this).find('td:nth-child(4)').text(mult_producto);*/
        });
    }

    function buscar_precio_otros(){
        $('#tabla_otros').find('tr').on('input', function (e) {
            var valor_ajax, valor_desc1prov, valor_desc2prov, valor_desc1vent, valor_desc2vent, valor_ganancia = 0;
            var mult_producto = 0;
            var cantidad_prod = parseInt($(this).find('td:nth-child(1)').text());
        	var lama = $(this).find('td:nth-child(2)').find('select').val();
        	if (lama == '1'){
        	}else{
            	$.ajax({
                    url: "llamar_precio_otros.php",
                    method: "POST",
                    async:false,
                    data: {nombre_otros: lama},
                    success: function(result){
                        valor_ajax = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc1_proveedor.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_desc1prov = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc2_proveedor.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_desc2prov = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc1_venta.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_desc1vent = result;
                    }
                });
                $.ajax({
                    url: "llamar_desc2_venta.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_desc2vent = result;
                    }
                });
                $.ajax({
                    url: "llamar_ganancia.php",
                    method: "POST",
                    async:false,
                    data: {nombre_lama: lama},
                    success: function(result){
                        valor_ganancia = result;
                    }
                });
            }
            var desc1_proveedor, desc2_proveedor, ganancia, desc1_venta, desc2_venta, incremento_ganancia, subtotal_inflado, porc_1, porc_2, resta, total, sumatoria_instalacion = 0;
            var precio_unitario = valor_ajax;
            var costo, costo2, costo_acc, costo2_acc, vventa, vventa2, pventa, pventa2 = 0;
            desc1_proveedor = parseInt(precio_unitario) * valor_desc1prov /100;
            costo = Math.round(precio_unitario - desc1_proveedor);
            desc2_proveedor = Math.round(costo * valor_desc2prov / 100);
            costo2 = Math.round(costo - desc2_proveedor);
            ganancia = Math.round(costo * valor_ganancia / 100);
            vventa = parseInt(costo2) + parseInt(ganancia);
            desc1_venta = Math.round(vventa * valor_desc1vent /100);
            pventa = parseInt(vventa) + parseInt(desc1_venta);
            /*porc_1 = ganancia * 100 / subtotal_inflado;
            porc_2 = 100 - porc_1;
            resta = porc_2 * subtotal_inflado;
            resta /= 100;
            total = Math.round(subtotal_inflado - resta);
            console.log('Desc: '+porc_2);
            console.log('Total: '+ total);*/
            $(this).find('td:nth-child(3)').text(Math.round(pventa));
            mult_producto = cantidad_prod * pventa;
            $(this).find('td:nth-child(4)').text(Math.round(mult_producto));
            sumar_subtotal_otros();
            sumar_totales();
            /*$(this).find('td:nth-child(3)').text(valor_ajax);
            mult_producto = cantidad_prod * valor_ajax;
            $(this).find('td:nth-child(4)').text(mult_producto);*/
        });
    }
    function sumar_subtotal_otros(){
        var suma = 0;
        $('#tabla_otros tbody tr').each(function () {
            var b = $(this).find('td').eq(3).html();
            suma += parseInt(b);
        });
        $('#subtotal8').val(suma);
    }
    buscar_precio_lama_ancho_alto();
    buscar_precio_roller_ancho_alto();
    buscar_precio_repuestos();
    buscar_precio_otros();
    function sumar_totales(){
        var suma_totales, suma_neto, suma_total_iva, total_cotizar, total_roller, subtotal_9, subtotal_8, desc_adicional = 0;
        /* borrar despues este*/var descc_flojo = $('#desc_c').val();
        total_cotizar = $('#total').val();
        total_roller = $('#total1').val();
        subtotal_9 = $('#subtotal9').val();
        subtotal_8 = $('#subtotal8').val();
        suma_totales = parseInt(total_cotizar) + parseInt(total_roller) + parseInt(subtotal_9) + parseInt(subtotal_8);
        $('#totales2').val(suma_totales);
        /*subtotal1 = $('#subtotal0').val();
        subtotal2 = $('#subtotal1').val();
        subtotal3 = $('#subtotal8').val();
        subtotal4 = $('#subtotal9').val();
        suma_neto = parseInt(subtotal1) + parseInt(subtotal2) + parseInt(subtotal3) + parseInt(subtotal4);
        $('#neto2').val(suma_neto);*/
        $('#valor_iva2').val(Math.round(suma_totales * 0.19));
        suma_total_iva = parseInt($('#valor_iva2').val()) + suma_totales;
        $('#total2').val(suma_total_iva);
        desc_adicional = $('#valor_desc').val();
        $('#total_cancelar2').val(Math.round(suma_total_iva - suma_total_iva * parseInt(desc_adicional)/100 - descc_flojo));
        $('#desc_completo2').val(Math.round(suma_total_iva * parseInt(desc_adicional)/100));
    }
    /* borrar despues este*/$("#desc_c").on("input",function(){
        var a, b, c = 0;
        a = $('#desc_c').val();
        b = $('#total2').val();
        c = b - a;
        $('#total_cancelar2').val(c);
    });

    var modal = document.getElementById("modal_cotizar");
    $('#boton_paracotizar').on("click",function(){
		$("#modal_cotizar").css("display", "block");
    });
	$('#close_modal').on("click",function(){
		$("#modal_cotizar").css("display", "none");
    });
	$(window).on("click",function(event){
		if (event.target == modal) {
			$("#modal_cotizar").css("display", "none");
		}
    });
    $('#close_modal_admin').on("click",function(){
		$("#modal_admin_desc").css("display", "none");
		$('#valor_desc').val("0");

    });
    var modal = document.getElementById("modal_admin_desc");
    $(window).on("click",function(event){
		if (event.target == modal) {
			$("#modal_admin_desc").css("display", "none");
			$('#valor_desc').val("0");
		}
    });
    $("#valor_desc").on("input",function(){
        var valor_d = parseInt($('#valor_desc').val());
        if (valor_d == "" || valor_d == '' || valor_d == null){
            $('#valor_desc').val('0');
        }else if (valor_d > valor_bd_desc_final){
            $('#valor_desc').val(valor_bd_desc_final);
        }
        sumar_totales();
    });
    $("#valor_desc").on("blur",function(){
        var valor_desc1 = $('#valor_desc').val();
        if(valor_desc1 == '' || valor_desc1 == "" || valor_desc1 == null){
            $('#valor_desc').val(0);
            $('#valor_desc').text('0');
        }
    });
    function limpiar_tabla_cotizacion(){
        var tableHeaderRowCount = 2;
        var table = document.getElementById('tabla_cotizar');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
        $('#tabla_cotizar').find('tr').find('td:nth-child(1)').html("<select class='fc_add' id='fc_add' name='fc_add'><option value='Final'>Final</option><option value='Crece'>Crece</option></select>");
        $('#tabla_cotizar').find('tr').find('td:nth-child(2)').text('1');
        $('#tabla_cotizar').find('tr').find('td:nth-child(3)').text('0');
        $('#tabla_cotizar').find('tr').find('td:nth-child(4)').text('0');
        $('#tabla_cotizar').find('tr').find('td:nth-child(5)').html("<div id='select_lama'></div>");
        $('#tabla_cotizar').find('tr').find('td:nth-child(6)').html("<div id='select_color'></div>");
        $('#tabla_cotizar').find('tr').find('td:nth-child(7)').html("<div id='select_accionamiento'></div>");
        $('#tabla_cotizar').find('tr').find('td:nth-child(8)').text('0');
        $('#tabla_cotizar').find('tr').find('td:nth-child(9)').text('0');
        llamar_select_color();
        llamar_select_lama();
        llamar_select_accionamiento();
    }
    function limpiar_tabla_cotizacion_roller(){
        var tableHeaderRowCount = 2;
        var table = document.getElementById('tabla_roller');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
        $('#tabla_roller').find('tr').find('td:nth-child(1)').html("<select class='fc_add' id='fc_add' name='fc_add'><option value='Final'>Final</option><option value='Crece'>Crece</option></select>");
        $('#tabla_roller').find('tr').find('td:nth-child(2)').text('1');
        $('#tabla_roller').find('tr').find('td:nth-child(3)').text('0');
        $('#tabla_roller').find('tr').find('td:nth-child(4)').text('0');
        $('#tabla_roller').find('tr').find('td:nth-child(5)').html('1');
        $('#tabla_roller').find('tr').find('td:nth-child(6)').html("<div id='select_cortina'></div>");
        $('#tabla_roller').find('tr').find('td:nth-child(7)').html("<div id='select_accionamiento_roller'></div>");
        $('#tabla_roller').find('tr').find('td:nth-child(8)').text('0');
        $('#tabla_roller').find('tr').find('td:nth-child(9)').text('0');
        llamar_select_cortina();
        llamar_select_accionamiento_roller();
    }
    function limpiar_tabla_cotizacion_repuestos(){
        var tableHeaderRowCount = 2;
        var table = document.getElementById('tabla_repuestos');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
        $('#tabla_repuestos').find('tr').find('td:nth-child(1)').text('1');
        $('#tabla_repuestos').find('tr').find('td:nth-child(2)').html("<div id='select_repuestos'></div>");
        $('#tabla_repuestos').find('tr').find('td:nth-child(3)').text('0');
        $('#tabla_repuestos').find('tr').find('td:nth-child(4)').text('0');
        llamar_select_repuestos();
    }
    function limpiar_tabla_cotizacion_otros(){
        var tableHeaderRowCount = 2;
        var table = document.getElementById('tabla_otros');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
        $('#tabla_otros').find('tr').find('td:nth-child(1)').text('1');
        $('#tabla_otros').find('tr').find('td:nth-child(2)').html("<div id='select_otros'></div>");
        $('#tabla_otros').find('tr').find('td:nth-child(3)').text('0');
        $('#tabla_otros').find('tr').find('td:nth-child(4)').text('0');
        llamar_select_otros();
    }
    $("#guardar_coti").on("click",function(){
        consultar_id_coti_persiana();
        consultar_id_coti_roller();
        consultar_id_coti_repuesto();
        consultar_id_coti_otro();
        consultar_id_coti_otrosss();
        var emp_sel = $('#empresa_seleccionada').val();
        var idemp= "";
        $.ajax({
            url: "consultar_id_empresa.php",
            method: "POST",
            async:false,
            data: {emp_sel: emp_sel},
            success: function(result){
                idemp = result;
            }
        });
        var valor_desc1 = $('#valor_desc').val();
        if(valor_desc1 == '' || valor_desc1 == "" || valor_desc1 == null){
            $('#valor_desc').val("0");
        }
        sumar_totales();
        var solo_una_vez = 0;
        var solo_una_vez_roller = 0;
        var solo_una_vez_repuesto = 0;
        var solo_una_vez_otros = 0;
        var otros = 0;
        var id_otros = "";
        $('#tabla_otros tbody tr').each(function (index) {
            var valor_total = $(this).find('td').eq(3).html();
            if (valor_total == 0){
                otros = 0;
            }else{
                otros = $(this).find('td').eq(1).find('select').val();
                $.ajax({
                    url: "consultar_id_otros.php",
                    method: "POST",
                    async:false,
                    data: {otros: otros},
                    success: function(result){
                        id_otros += '-'+result;
                    }
                });
            }
        });
        var comp1, comp2, comp3 = 0;
        $('#tabla_cotizar tbody tr').each(function (index) {
            var valor_total = $(this).find('td').eq(8).html();
            if (solo_una_vez == 0){
                if (valor_total == 'NaN'){
                    alert("Revise los Precios de Persianas, están en: " + valor_total);
                    $(this).find('td').eq(2).focus();
                    solo_una_vez = 1;
                }else{
                    if (valor_total == 0){
                        comp1 = 0;
                    }else{
                        comp1 = 1;
                        var id_coti = $('label#id_coti_persiana').text();
                        var fc = $(this).find('td').eq(0).find('select').val();
                        var cant = $(this).find('td').eq(1).html();
                        var ancho = $(this).find('td').eq(2).html();
                        var alto = $(this).find('td').eq(3).html();
                        var lama = $(this).find('td').eq(4).find('select').val();
                        var color = $(this).find('td').eq(5).find('select').val();
                        var accion = $(this).find('td').eq(6).find('select').val();
                        var valor_un = $(this).find('td').eq(7).html();
                        var valor_tot = $(this).find('td').eq(8).html();
                        if (fc == 'Final'){
                            fc = 0;
                        }else if (fc == 'Crece'){
                            fc = 1;
                        }
                        $.ajax({
                            url: "consultar_id_color.php",
                            method: "POST",
                            async:false,
                            data: {color: color},
                            success: function(result){
                                color = result;
                            }
                        });
                        $.ajax({
                            url: "consultar_id_lama.php",
                            method: "POST",
                            async:false,
                            data: {lama: lama},
                            success: function(result){
                                lama = result;
                            }
                        });
                        $.ajax({
                            url: "consultar_id_accion.php",
                            method: "POST",
                            async:false,
                            data: {accion: accion},
                            success: function(result){
                                accion = result;
                            }
                        });
                        $.ajax({
                            url: "insertar_cotizacion.php",
                            method: "POST",
                            data: {id_coti: id_coti, fc: fc, cant: cant, ancho: ancho, alto: alto, lama: lama, color: color, accion: accion, valor_un: valor_un, valor_tot: valor_tot},
                            success: function(result){}
                        });
                    }
                }
            }
        });
        var total_persiana = $("input#total").val();
        var total_roller = $("input#total1").val();
        var total_repuestos = $("input#subtotal9").val();
        var id1, id2 = "";
        if (total_persiana == 0 || total_persiana == 'NaN'){
            id1 = 0;
            id2 = 0;
        }else{
            var id_coti = $('label#id_coti_persiana').text();
            id1 = $('label#id_coti_roller').text();
            id2 = $('label#id_coti_repuesto').text();
            var id_add = $("input#id_add").val();
            var nombre_add = $("input#nombre_add1").val();
            var d = new Date();
            var month = d.getMonth()+1;
            var day = d.getDate();
            var fecha_add = d.getFullYear() + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + ((''+day).length<2 ? '0' : '') + day;
            var subtotal0_add = $("input#subtotal0").val();
            var subtotal8_otros = $("input#subtotal8").val();
            var desc_add = $("input#desc").val();
            var valor_ins = $("input#valor_ins").val();
            var totales2_add = $("input#totales2").val();
            var valor_iva2_add = $("input#valor_iva2").val();
            var total2_add = $("input#total2").val();
            var valor_desc_add = Math.round(parseInt(total2_add) * parseInt($("input#valor_desc").val())) / 100;
            var total_cancelar2_add = $("input#total_cancelar2").val();
            if($('#ext_tabla_cotizaciones').css('display') == 'block' && $('#ext_tabla_roller').css('display') == 'none' && $('#ext_tabla_repuestos').css('display') == 'none'){
                a = 0;
            }
            if($('#ext_tabla_cotizaciones').css('display') == 'block' && $('#ext_tabla_roller').css('display') == 'block' && $('#ext_tabla_repuestos').css('display') == 'block'){
                a = 0;
            }
            if ($('#ext_tabla_roller').css('display') == 'none'){
                id1 = 0;
            }
            if ($('#ext_tabla_repuestos').css('display') == 'none'){
                id2 = 0;
            }
            $.ajax({
                url: "insertar_total_cotizacion.php",
                method: "POST",
                data: {id_coti: id_coti, id_add: id_add, nombre_add: nombre_add, fecha_add: fecha_add, subtotal0_add: subtotal0_add, desc_add: desc_add, valor_ins: valor_ins, otros: id_otros, id_empresa: idemp, totales2_add: totales2_add, valor_iva2_add: valor_iva2_add, total2_add: total2_add, valor_desc_add: valor_desc_add, total_cancelar2_add: total_cancelar2_add, subtotal8_otros: subtotal8_otros, id1: id1, id2: id2, a: a, emp_sel: emp_sel},
                success: function(result){}
            });
            var vendedora = $("#vendedora_add1").val();
            $.ajax({
                url: "insertar_vendedora_cotizacion.php",
                method: "POST",
                data: {id_coti: id_coti, vendedora: vendedora},
                success: function(result){}
            });
        }
        if (total_roller == 0 || total_roller == 'NaN'){
            id1 = 0;
            id2 = 0;
        }else{
            var id_coti = $('label#id_coti_roller').text();
            id1 = $('label#id_coti_persiana').text();
            id2 = $('label#id_coti_repuesto').text();
            var id_add = $("input#id_add").val();
            var nombre_add = $("input#nombre_add1").val();
            var d = new Date();
            var month = d.getMonth()+1;
            var day = d.getDate();
            var fecha_add = d.getFullYear() + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + ((''+day).length<2 ? '0' : '') + day;
            var subtotal0_add = $("input#subtotal1").val();
            var subtotal8_otros = $("input#subtotal8").val();
            var desc_add = $("input#desc1").val();
            var valor_ins = $("input#valor_ins1").val();
            var totales2_add = $("input#totales2").val();
            var valor_iva2_add = $("input#valor_iva2").val();
            var total2_add = $("input#total2").val();
            var valor_desc_add = Math.round(parseInt(total2_add) * parseInt($("input#valor_desc").val())) / 100;
            var total_cancelar2_add = $("input#total_cancelar2").val();
            if($('#ext_tabla_cotizaciones').css('display') == 'none' && $('#ext_tabla_roller').css('display') == 'block' && $('#ext_tabla_repuestos').css('display') == 'none'){
                b = 0;
            }
            if($('#ext_tabla_cotizaciones').css('display') == 'block' && $('#ext_tabla_roller').css('display') == 'block' && $('#ext_tabla_repuestos').css('display') == 'block'){
                b = 1;
            }
            if($('#ext_tabla_cotizaciones').css('display') == 'none'){
                id1 = 0;
            }
            if($('#ext_tabla_repuestos').css('display') == 'none'){
                id2 = 0;
            }
            $.ajax({
                url: "insertar_total_cotizacion_roller.php",
                method: "POST",
                data: {id_coti: id_coti, id_add: id_add, nombre_add: nombre_add, fecha_add: fecha_add, subtotal0_add: subtotal0_add, desc_add: desc_add, valor_ins: valor_ins, otros: id_otros, id_empresa: idemp, totales2_add: totales2_add, valor_iva2_add: valor_iva2_add, total2_add: total2_add, valor_desc_add: valor_desc_add, total_cancelar2_add: total_cancelar2_add, subtotal8_otros: subtotal8_otros, id1: id1, id2: id2, b: b, emp_sel: emp_sel},
                success: function(result){}
            });
            var vendedora = $("#vendedora_add1").val();
            $.ajax({
                url: "insertar_vendedora_cotizacion.php",
                method: "POST",
                data: {id_coti: id_coti, vendedora: vendedora},
                success: function(result){}
            });
        }
        if (total_repuestos == 0 || total_repuestos == 'NaN'){
            id1 = 0;
            id2 = 0;
        }else{
            var id_coti = $('label#id_coti_repuesto').text();
            id1 = $('label#id_coti_persiana').text();
            id2 = $('label#id_coti_roller').text();
            var id_add = $("input#id_add").val();
            var nombre_add = $("input#nombre_add1").val();
            var d = new Date();
            var month = d.getMonth()+1;
            var day = d.getDate();
            var fecha_add = d.getFullYear() + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + ((''+day).length<2 ? '0' : '') + day;
            var subtotal0_add = $("input#subtotal9").val();
            var subtotal8_otros = $("input#subtotal8").val();
            var desc_add = $("input#desc1").val();
            var totales2_add = $("input#totales2").val();
            var valor_iva2_add = $("input#valor_iva2").val();
            var total2_add = $("input#total2").val();
            var valor_desc_add = Math.round(parseInt(total2_add) * parseInt($("input#valor_desc").val())) / 100;
            var total_cancelar2_add = $("input#total_cancelar2").val();
            if($('#ext_tabla_cotizaciones').css('display') == 'none' && $('#ext_tabla_roller').css('display') == 'none' && $('#ext_tabla_repuestos').css('display') == 'block'){
                c = 0;
            }
            if($('#ext_tabla_cotizaciones').css('display') == 'block' && $('#ext_tabla_roller').css('display') == 'block' && $('#ext_tabla_repuestos').css('display') == 'block'){
                c = 1;
            }
            if ($('#ext_tabla_cotizaciones').css('display') == 'none'){
                id1 = 0;
            }
            if ($('#ext_tabla_roller').css('display') == 'none'){
                id2 = 0;
            }
            $.ajax({
                url: "insertar_total_cotizacion_repuestos.php",
                method: "POST",
                data: {id_coti: id_coti, id_add: id_add, nombre_add: nombre_add, fecha_add: fecha_add, subtotal0_add: subtotal0_add, desc_add: desc_add, otros: id_otros, id_empresa: idemp, totales2_add: totales2_add, valor_iva2_add: valor_iva2_add, total2_add: total2_add, valor_desc_add: valor_desc_add, total_cancelar2_add: total_cancelar2_add, subtotal8_otros: subtotal8_otros, id1: id1, id2: id2, c: c, emp_sel: emp_sel},
                success: function(result){}
            });
            var vendedora = $("#vendedora_add1").val();
            $.ajax({
                url: "insertar_vendedora_cotizacion.php",
                method: "POST",
                data: {id_coti: id_coti, vendedora: vendedora},
                success: function(result){}
            });
        }
        
        $('#tabla_roller tbody tr').each(function (index) {
            var valor_total = $(this).find('td').eq(8).html();
            if (solo_una_vez_roller == 0){
                if (valor_total == 'NaN'){
                    alert("Revise los Precios de Roller, están en: " + valor_total);
                    $(this).find('td').eq(2).focus();
                    solo_una_vez_roller = 1;
                }else{
                    if (valor_total == 0){
                        comp2 = 0;
                    }else{
                        comp2 = 1;
                    }
                    var id_coti_rollers = $('label#id_coti_roller').text();
                        var fcs = $(this).find('td').eq(0).find('select').val();
                        var cant = $(this).find('td').eq(1).html();
                        var ancho = $(this).find('td').eq(2).html();
                        var alto = $(this).find('td').eq(3).html();
                        var color = $(this).find('td').eq(4).html();
                        var lama = $(this).find('td').eq(5).find('select').val();
                        var accion = $(this).find('td').eq(6).find('select').val();
                        var valor_un = $(this).find('td').eq(7).html();
                        var valor_tot = $(this).find('td').eq(8).html();
                        if (fcs == 'Final'){
                            fcs = 0;
                        }else if (fcs == 'Crece'){
                            fcs = 1;
                        }
                        $.ajax({
                            url: "consultar_id_cortina.php",
                            method: "POST",
                            async:false,
                            data: {lama: lama},
                            success: function(result){
                                lama = result;
                            }
                        });
                        $.ajax({
                            url: "consultar_id_accion_roller.php",
                            method: "POST",
                            async:false,
                            data: {accion: accion},
                            success: function(result){
                                accion = result;
                            }
                        });
                        $.ajax({
                            url: "insertar_cotizacion_roller.php",
                            method: "POST",
                            data: {id_coti: id_coti_rollers, fc: fcs, cant: cant, ancho: ancho, alto: alto, lama: lama, color: color, accion: accion, valor_un: valor_un, valor_tot: valor_tot},
                            success: function(result){}
                        });
                }
            }
        });
        $('#tabla_repuestos tbody tr').each(function (index) {
            var valor_total = $(this).find('td').eq(3).html();
            if (solo_una_vez_repuesto == 0){
                if (valor_total == 'NaN'){
                    alert("Revise los Precios de Repuesto, están en: " + valor_total);
                    $(this).find('td').eq(2).focus();
                    solo_una_vez_repuesto = 1;
                }else{
                    if (valor_total == 0){
                        comp3 = 0;
                    }else{
                        comp3 = 1;
                        var id_coti_repuesto = $('label#id_coti_repuesto').text();
                        var cant = $(this).find('td').eq(0).html();
                        var repuesto = $(this).find('td').eq(1).find('select').val();
                        var valor_un = $(this).find('td').eq(2).html();
                        var valor_tot = $(this).find('td').eq(3).html();
                        $.ajax({
                            url: "consultar_id_repuesto.php",
                            method: "POST",
                            async:false,
                            data: {repuesto: repuesto},
                            success: function(result){
                                repuesto = result;
                            }
                        });
                        $.ajax({
                            url: "insertar_cotizacion_repuesto.php",
                            method: "POST",
                            data: {id_coti: id_coti_repuesto, cant: cant, repuesto: repuesto, valor_un: valor_un, valor_tot: valor_tot},
                            success: function(result){}
                        });
                    }
                }
            }
        });
        if ($('#ext_tabla_cotizaciones').css('display') == 'none' && $('#ext_tabla_roller').css('display') == 'none' && $('#ext_tabla_repuestos').css('display') == 'none'){
            var id_add = $("input#id_add").val();
            var nombre_add = $("input#nombre_add1").val();
            var d = new Date();
            var month = d.getMonth()+1;
            var day = d.getDate();
            var fecha_add = d.getFullYear() + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + ((''+day).length<2 ? '0' : '') + day;
            var subtotal0_add = $("input#subtotal9").val();
            var subtotal8_otros = $("input#subtotal8").val();
            var desc_add = $("input#desc1").val();
            var totales2_add = $("input#totales2").val();
            var valor_iva2_add = $("input#valor_iva2").val();
            var total2_add = $("input#total2").val();
            var valor_desc_add = Math.round(parseInt(total2_add) * parseInt($("input#valor_desc").val())) / 100;
            var total_cancelar2_add = $("input#total_cancelar2").val();
            $.ajax({
                url: "insertar_total_cotizacion_otros.php",
                method: "POST",
                data: {id_coti: id_coti_otros, id_add: id_add, nombre_add: nombre_add, fecha_add: fecha_add, subtotal0_add: subtotal8_otros, desc_add: desc_add, otros: id_otros, id_empresa: idemp, totales2_add: totales2_add, valor_iva2_add: valor_iva2_add, total2_add: total2_add, valor_desc_add: valor_desc_add, total_cancelar2_add: total_cancelar2_add, subtotal8_otros: subtotal8_otros, c: 0},
                success: function(result){
                }
            });
            var vendedora = $("#vendedora_add1").val();
            $.ajax({
                url: "insertar_vendedora_cotizacion.php",
                method: "POST",
                data: {id_coti: id_coti_otros, vendedora: vendedora},
                success: function(result){}
            });
        }
        $('#tabla_otros tbody tr').each(function (index) {
            var valor_total = $(this).find('td').eq(3).html();
            if (solo_una_vez_otros == 0){
                if (valor_total == 'NaN'){
                    alert("Revise los Precios de Otros, están en: " + valor_total);
                    $(this).find('td').eq(2).focus();
                    solo_una_vez_otros = 1;
                }else{
                    if (valor_total == 0){
                    }else{
                        var cant = $(this).find('td').eq(0).html();
                        var otro = $(this).find('td').eq(1).find('select').val();
                        var nombre_otro = $(this).find('td').eq(1).find('select').val();
                        var valor_un = $(this).find('td').eq(2).html();
                        var valor_tot = $(this).find('td').eq(3).html();
                        var id1 = $('label#id_coti_persiana').text();
                        var id2 = $('label#id_coti_roller').text();
                        var id3 = $('label#id_coti_repuesto').text();
                        if($('#ext_tabla_cotizaciones').css('display') == 'none'){
                            id1 = 0;
                        }
                        if($('#ext_tabla_roller').css('display') == 'none'){
                            id2 = 0;
                        }
                        if ($('#ext_tabla_repuestos').css('display') == 'none'){
                            id3 = 0;
                        }
                        if (id_coti_otros == 0){
                            $.ajax({
                                url: "consultar_id_otros.php",
                                method: "POST",
                                async:false,
                                data: {otros: otro},
                                success: function(result){
                                    otro = result;
                                }
                            });
                            $.ajax({
                                url: "insertar_cotizacion_otros.php",
                                method: "POST",
                                data: {cant: cant, otro: otro, valor_un: valor_un, valor_tot: valor_tot, id1: id1, id2: id2, id3: id3, nombre_otro: nombre_otro},
                                success: function(result){}
                            });
                        }else{
                            $.ajax({
                                url: "consultar_id_otros.php",
                                method: "POST",
                                async:false,
                                data: {otros: otro},
                                success: function(result){
                                    otro = result;
                                }
                            });
                            $.ajax({
                                url: "insertar_cotizacion_otros_solo.php",
                                method: "POST",
                                data: {id_coti: id_coti_otros, cant: cant, otro: otro, valor_un: valor_un, valor_tot: valor_tot, id1: id1, id2: id2, id3: id3, nombre_otro: nombre_otro},
                                success: function(result){
                                }
                            });
                        }
                    }
                }
            }
        });
        alert("Cotización ingresada exitosamente");
        limpiar_tabla_cotizacion();
        limpiar_tabla_cotizacion_roller();
        limpiar_tabla_cotizacion_repuestos();
        limpiar_tabla_cotizacion_otros();
        sumar_subtotal();
        sumar_subtotal_roller();
        sumar_subtotal_repuesto();
        sumar_subtotal_otros();
        sumar_totales();
        consultar_id_coti_persiana();
        consultar_id_coti_roller();
        consultar_id_coti_repuesto();
        consultar_id_coti_otro();
        $("#ext_tabla_cotizaciones").css("display", "none");
        $("#ext_tabla_roller").css("display", "none");
        $("#ext_tabla_repuestos").css("display", "none");
        $("#ext_tabla_otros").css("display", "none");
        $("#guardar_coti").css("display", "none");
        $("#abrir_empresas").css("display", "none");
        $("#ext_tabla_ventas").css("display", "block");
        $("#aritmetica_cotizacion_ext").css("display", "none");
        obtener_datos("vacio");
    });
    $(".modal-content").draggable({
        handle: ".cuadrado_modal"
    });
});
</script>
</head>
<body>
<?php
$id = $_POST["id"];
$nombre = $_POST["nombre"];
$direccion = $_POST["direccion"];
$nombre = str_replace('Vendido', '', $nombre);
$direccion = str_replace('Deuda', '', $direccion);
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$comuna = $_POST["comuna"];
$vendedora = $_POST["vendedora"];
?>
<div class="grid-container">
    <label>ID:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="grid-item-cotizar" id="id_add" name="id_add" placeholder="ID Cliente..." size="30" maxlength="70" autocomplete="off" style="background-color:#E7E7E7;" value="<?php echo $id; ?>" disabled/></label>
    <label>Nombre:<input type="text" class="grid-item-cotizar" id="nombre_add1" name="nombre_add" placeholder="Nombre Cliente..." size="30" maxlength="70" autocomplete="off" style="background-color:#E7E7E7;" value="<?php echo $nombre; ?>" disabled/></label>
    <label>Direccion:&nbsp;&nbsp;&nbsp;<input type="text" class="grid-item-cotizar" id="direccion_add1" name="direccion_add" placeholder="Direccion..." size="30" maxlength="70" autocomplete="off" style="background-color:#E7E7E7;" value="<?php echo $direccion; ?>" disabled/></label>
    <label>Telefono:<input type="text" class="grid-item-cotizar" id="telefono_add1" name="telefono_add" placeholder="Teléfono..." size="30" maxlength="70" autocomplete="off" style="background-color:#E7E7E7;" value="<?php echo $telefono; ?>" disabled/></label>
    <label>Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="grid-item-cotizar" id="email_add1" name="email_add" placeholder="Email..." size="30" maxlength="70" autocomplete="off" style="background-color:#E7E7E7;" value="<?php echo $email; ?>" disabled/></label>
    <label>Comuna:<input type="text" class="grid-item-cotizar" id="comuna_add1" name="comuna_add" placeholder="Comuna..." size="30" maxlength="70" autocomplete="off" style="background-color:#E7E7E7;" value="<?php echo $comuna; ?>" disabled/></label>
    <label>Vendedor/a:<input type="text" class="grid-item-cotizar" id="vendedora_add1" name="vendedora_add" placeholder="Vendedora..." size="30" maxlength="70" autocomplete="off" value="<?php echo $vendedora; ?>"/></label>
</div>
<p>&nbsp;</p>
<div>
<button id='boton_paracotizar'>&nbsp;&nbsp;Cotizar&nbsp;&nbsp;</button>
<p>&nbsp;</p>
</div>
<label id="id_cliente" style="visibility: hidden;"></label>
<p></p>
<div id="ext_tabla_ventas">
    <div id="result_ventas"><b></b></div>
    <input list="lista_clientes" type="text" class="input_ventas" id="input_ventas" name="input_ventas" placeholder="Buscar Ventas..." size="30" maxlength="70" autocomplete="off"/>
</div>
<div id='ext_tabla_cotizaciones' style='display:none;'>
<button class="boton_ingresar" id='boton_agregarfila'>Agregar Fila</button><button class="boton_ingresar" id='boton_quitar_tabla_persiana'>Quitar Persiana</button>
<br></br>
<p>&nbsp;</p>
<label class="titulo_cotizaciones">Persianas<label id="id_coti_persiana" style="display:none;">0</label></label>
<table id='tabla_cotizar'>
    <thead>
        <tr>
            <th>F/C</th>
            <th>Cantidad</th>
            <th>Ancho</th>
            <th>Alto</th>
            <th>Lama</th>
            <th>Color</th>
            <th>Accionamiento</th>
            <th>Valor Unitario</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><select class='fc_add' id='fc_add' name='fc_add'>
            <option value='Final'>Final</option>
            <option value='Crece'>Crece</option>
            </select></td>
            <td contenteditable>1</td>
            <td contenteditable>0</td>
            <td contenteditable>0</td>
            <td><select class="lama_add" id="lama_add">
                    <option value='101' disabled selected>Seleccione Lama...</option>
                    <?php
                        $conexionxxx = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
                        mysqli_set_charset($conexionxxx,"utf8");
                        $ejecutarx = mysqli_query($conexionxxx,"Call Consulta_Lama_Habilitados()");
                    ?>
                    <?php while ($rowx = mysqli_fetch_array($ejecutarx)) {  ?> 
                        <option value='<?php echo $rowx[0];?>'><?php echo $rowx[0];?></option>
                    <?php } mysqli_close($conexionxxx);?>
                </select>
            </td>
            <td><select class="color_add" id="color_add">
                    <option value='101' disabled selected>Seleccione Color...</option>
                    <?php
                        $conexionaaa = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
                        mysqli_set_charset($conexionaaa,"utf8");
                        $ejecutarx = mysqli_query($conexionaaa,"Call Listar_Color()");
                    ?>
                    <?php while ($rowx = mysqli_fetch_array($ejecutarx)) {  ?> 
                        <option value='<?php echo $rowx[0];?>'><?php echo $rowx[0];?></option>
                    <?php } mysqli_close($conexionaaa);?>
                </select>
            </td>
            <td><select class="motor_add" id="motor_add">
                    <option value="1" selected>Seleccione Accionamiento...</option>
                    <?php
                        $conexion2 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
                        mysqli_set_charset($conexion2,"utf8");
                        $ejecutarx = mysqli_query($conexion2,"Call Consulta_Motor_Habilitados()");
                    ?>
                    <?php while ($rowx = mysqli_fetch_array($ejecutarx)) {  ?> 
                        <option value='<?php echo $rowx[0];?>'><?php echo $rowx[0];?></option>
                    <?php } mysqli_close($conexion2);?>
                </select></td>
            <td>0</td>
            <td>0</td>
            <td><button id="quitar_fila">x</button></td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p>
<div id="aritmetica_cotizacion">
<label for="subtotal">Subtotal: </label>
<input type="text" style="text-align:center" maxlength='8' id="subtotal0" name="subtotal" value="0" disabled></input>
<p></p>
<label for="desc">Descuento <input type="text" style="text-align:center" maxlength='2' id="desc" name="desc" value="0" disabled></input> %: </label>
<input type="text" style="text-align:center" maxlength='2' id="saldo_desc" name="saldo_desc" value="0" disabled></input>
<p></p>
<label for="desc">Saldo: <input type="text" style="text-align:center" maxlength='2' id="saldo_completo" name="saldo_desc" value="0" disabled></input> </label>
<p></p>
<label for="ins">Instalación: </label>
<select name='ins' id='ins'>
    <option value='Si'>Si</option>
    <option value='No'>No</option>
</select>
<label id="cant_cot"></label><input type="text" style="text-align:center" maxlength='8' id="valor_ins" name="valor_ins" value="0" disabled></input>
<p></p>
<label for="total">Saldo: </label>
<input type="text" style="text-align:center" maxlength='8' id="total" name="total" value="0"disabled></input>
<p></p>
</div>
<br></br>
<br></br>
</div>
<div id="modal_cotizar" class="modal_cotizar" style="display:none;">
    <div class="modal-content">
        <aside class="cuadrado_modal">
            <label class="adorno_botones_modal"><img src="../Imagenes/wincontrol_cerrar.png" id="close_modal" class="close_modal"></img></label>
            <label class= "titulo2">Cotizar</label>
        </aside>
            <br></br>
            <p style="text-align:center;">¿Por cuál desea Cotizar?</p>
            <br></br>
            <br></br>
            <div class="grid-container">
                <button class="grid-item-modal" id='boton_persiana'>Persianas</button>
                <button class="grid-item-modal" id='boton_roller'>Roller</button>
                <button class="grid-item-modal" id='boton_repuestos'>Repuestos</button>
                <button class="grid-item-modal" id='boton_otros'>Otros</button>
            </div>
            <br></br>
            <br></br>
            <br></br>
    </div>
</div>
<div id="modal_cotizar_final" class="modal_cotizar" style="display:none;">
    <div class="modal-content">
        <aside class="cuadrado_modal">
            <label class="adorno_botones_modal"><img src="../Imagenes/wincontrol_cerrar.png" id="close_modal_final" class="close_modal"></img></label>
            <label class= "titulo2">Seleccione Empresa</label>
        </aside>
            <br></br>
            <p style="text-align:center;">Empresa al cuál Guarda Cotización</p>
            <br></br>
            <br></br>
            <?php
                $conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
                mysqli_set_charset($conexion,"utf8");
                $ejecutar = mysqli_query($conexion,"select NombreEmpresa from Empresas");
                mysqli_set_charset($conexion,"utf8");
                ?>
                <label>Seleccione Empresa: <select id="empresa_seleccionada">
                <?php while ($row = mysqli_fetch_array($ejecutar)) { ?> 
                    <option value='<?php echo $row[0];?>'><?php echo $row[0];?></option>
                <?php } ?>
                </select></label>
                <br></br>
                <button id="guardar_coti" style='display:none;'>Guardar Cot.</button>
            <br></br>
            <br></br>
            <br></br>
    </div>
</div>
<div id="modal_admin_desc" class="modal_cotizar" style="display:none;">
    <div class="modal-content">
        <aside class="cuadrado_modal">
            <label class="adorno_botones_modal"><img src="../Imagenes/wincontrol_cerrar.png" id="close_modal_admin" class="close_modal"></img></label>
            <label class= "titulo2">Cambiar Descuento de Cotizacion</label>
        </aside>
            <br></br>
            <p style="text-align:center;">Para cambiar el descuento, Hable con su administrador e ingrese la contraseña</p>
            <br></br>
            <input type="text" placeholder="Ingrese Clave del Administrador..."></input>
            <br></br>
            <br></br>
            <br></br>
    </div>
</div>
<br></br>
<br></br>
<div id='ext_tabla_roller' style='display:none;'>
<button class="boton_ingresar" id='boton_agregarfila_roller'>Agregar Fila</button><button class="boton_ingresar" id='boton_quitar_tabla_roller'>Quitar Roller</button>
<br></br>
<p>&nbsp;</p>
<label class="titulo_cotizaciones">Roller <label id="id_coti_roller" style="display:none;">0</label></label>
<table id='tabla_roller'>
    <thead>
        <tr>
            <th>F/C</th>
            <th>Cantidad</th>
            <th>Ancho</th>
            <th>Alto</th>
            <th>Color</th>
            <th>Cortina</th>
            <th>Accionamiento</th>
            <th>Valor Unitario</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><select class='fc_add' id='fc_add' name='fc_add'>
            <option value='Final'>Final</option>
            <option value='Crece'>Crece</option>
            </select></td>
            <td contenteditable>1</td>
            <td contenteditable>0</td>
            <td contenteditable>0</td>
            <td contenteditable>1</td>
            <td><select class="cortina_add" id="cortina_add">
                    <option value="1" disabled selected>Seleccione Cortina...</option>
                    <?php
                        $conexion7 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
                        mysqli_set_charset($conexion7,"utf8");
                        $ejecutarx = mysqli_query($conexion7,"Call Consulta_Rollers_Habilitados()");
                    ?>
                    <?php while ($rowx = mysqli_fetch_array($ejecutarx)) {  ?> 
                        <option value='<?php echo $rowx[0];?>'><?php echo $rowx[0];?></option>
                    <?php } mysqli_close($conexion7);?>
                </select></td>
            <td><select class="motor_add" id="motor_addr">
                    <option value="1" selected>Seleccione Accionamiento...</option>
                    <?php
                        $conexion4 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
                        mysqli_set_charset($conexion4,"utf8");
                        $ejecutarx = mysqli_query($conexion4,"Call Consulta_Motor_Roller_Habilitados()");
                    ?>
                    <?php while ($rowx = mysqli_fetch_array($ejecutarx)) {  ?> 
                        <option value='<?php echo $rowx[0];?>'><?php echo $rowx[0];?></option>
                    <?php } mysqli_close($conexion4);?>
                </select></td>
            <td>0</td>
            <td>0</td>
            <td><button id="quitar_fila">x</button></td>
        </tr>
    </tbody>
</table>
<!--<div id='select_color_roller'></div>-->
<p>&nbsp;</p>
<div id="aritmetica_cotizacion">
<label for="subtotal">Subtotal: </label>
<input type="text" style="text-align:center" maxlength='8' id="subtotal1" name="subtotal" value="0" disabled autocomplete="off"></input>
<p></p>
<label for="desc">Descuento <input type="text" style="text-align:center" maxlength='2' id="desc1" name="desc" value="0" disabled autocomplete="off"></input> %: </label>
<input type="text" style="text-align:center" maxlength='2' id="saldo_desc1" name="saldo_desc1" value="0" disabled autocomplete="off"></input>
<p></p>
<label for="desc">Saldo: <input type="text" style="text-align:center" maxlength='2' id="saldo_completo0" name="saldo_desc" value="0" disabled autocomplete="off"></input> </label>
<p></p>
<label for="ins">Instalación: </label>
<select name='ins1' id='ins1'>
    <option value='Si'>Si</option>
    <option value='No'>No</option>
</select>
<label id="cant_cot1"></label><input type="text" style="text-align:center" maxlength='8' id="valor_ins1" name="valor_ins" value="0" disabled autocomplete="off"></input>
<p></p>
<label for="total">Saldo: </label>
<input type="text" style="text-align:center" maxlength='8' id="total1" name="total" value="0" disabled autocomplete="off"></input>
<p></p>
</div>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<br></br>
<br></br>
<div id='ext_tabla_repuestos' style='display:none;'>
<button class="boton_ingresar" id='boton_agregarfila_rep'>Agregar Fila</button><button class="boton_ingresar" id='boton_quitar_tabla_repuesto'>Quitar Repuesto</button>
<br></br>
<p>&nbsp;</p>
<label class="titulo_cotizaciones">Repuestos<label id="id_coti_repuesto" style="display:none;">0</label></label>
<table id='tabla_repuestos'>
    <thead>
        <tr>
            <th>Cantidad</th>
            <th>Detalle Repuestos</th>
            <th>Valor Unitario</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td contenteditable>1</td>
            <td><select class="detalle_add" id="detalle_add">
                    <option value="1" disabled selected>Seleccione Repuesto...</option>
                    <?php
                        $conexion8 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
                        mysqli_set_charset($conexion8,"utf8");
                        $ejecutarx = mysqli_query($conexion8,"Call Consulta_Repuesto_Habilitados()");
                    ?>
                    <?php while ($rowx = mysqli_fetch_array($ejecutarx)) {  ?> 
                        <option value='<?php echo $rowx[0];?>'><?php echo $rowx[0];?></option>
                    <?php } mysqli_close($conexion8);?>
                </select></td>
            <td>0</td>
            <td>0</td>
            <td><button id="quitar_fila">x</button></td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p>
<div id="aritmetica_cotizacion">
<label for="subtotal">Subtotal: </label>
<input type="text" style="text-align:center" maxlength='8' id="subtotal9" name="subtotal" value="0" disabled autocomplete="off"></input>
<p>&nbsp;</p>
</div>
<br></br>
<br></br>
</div>
<div id='ext_tabla_otros' style='display:none;'>
<button class="boton_ingresar" id='boton_agregarfila_otros'>Agregar Fila</button><button class="boton_ingresar" id='boton_quitar_tabla_otros'>Quitar Otros</button>
<br></br>
<p>&nbsp;</p>
<label class="titulo_cotizaciones">Otros</label>
<table id='tabla_otros'>
    <thead>
        <tr>
            <th>Cantidad</th>
            <th>Detalle Otros</th>
            <th>Valor Unitario</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td contenteditable>1</td>
            <td><select class="detalle_otros_add" id="detalle_otros_add">
                    <option value="1" disabled selected>Seleccione Otros...</option>
                    <?php
                        $conexion10 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
                        mysqli_set_charset($conexion10,"utf8");
                        $ejecutarx = mysqli_query($conexion10,"Call Consulta_Otros_Habilitados()");
                    ?>
                    <?php while ($rowx = mysqli_fetch_array($ejecutarx)) {  ?> 
                        <option value='<?php echo $rowx[0];?>'><?php echo $rowx[0];?></option>
                    <?php } mysqli_close($conexion10);?>
                </select></td>
            <td>0</td>
            <td>0</td>
            <td><button id="quitar_fila">x</button></td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p>
<div id="aritmetica_cotizacion">
<label for="subtotal">Subtotal: </label>
<input type="text" style="text-align:center" maxlength='8' id="subtotal8" name="subtotal" value="0" disabled autocomplete="off"></input>
<p>&nbsp;</p>
</div>
</div>
<br></br>
<div id="aritmetica_cotizacion_ext" style='display:none;'>
<label for="totales">Neto: </label>
<input type="text" style="text-align:center" maxlength='15' id="totales2" name="totales" value="0" disabled autocomplete="off"></input>
<p></p>
<!--<label for="neto">Neto: </label>
<input type="text" style="text-align:center" maxlength='8' id="neto2" name="neto" value="0" disabled></input>
<p></p>-->
<label for="valor_iva">&nbsp;&nbsp;IVA: </label>
<input type="text" style="text-align:center" maxlength='15' id="valor_iva2" name="valor_iva" value="0" disabled autocomplete="off"></input>
<p></p>
<label for="total">Total: </label>
<input type="text" style="text-align:center" maxlength='15' id="total2" name="total" value="0" disabled autocomplete="off"></input>
<br></br>
<label for="valor_desc">&nbsp;&nbsp;Descuento A <input type="text" style="text-align:center" maxlength='15' id="valor_desc" name="valor_desc" value="0" autocomplete="off">%:</input></label>
<input type="text" style="text-align:center" maxlength='15' id="desc_completo2" name="desc_completo2" value="0" disabled autocomplete="off"></input>
<p></p>
<!-- borrar despues este --><label for="desc_c">Descuento C: </label>
<input type="text" style="text-align:center" maxlength='15' id="desc_c" name="desc_c" value="0" autocomplete="off"></input>
<p></p>
<label for="total_cancelar">Saldo a Pagar: </label>
<input type="text" style="text-align:center" maxlength='15' id="total_cancelar2" name="total_cancelar" value="0" disabled autocomplete="off"></input>
<p>&nbsp;</p>
</div>
<br></br>
<br></br>
<button id="abrir_empresas" style='display:none;'>Guardar Cot.</button>
</body>
</html>
