if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('sw.js')
    .then(reg => console.log('Registro de SW exitoso', reg))
    .catch(err => console.warn('Error al tratar de registrar el sw', err));
}
window.onload = function(){
    $("#contenedor_carga").css({"visibility": "hidden", "opacity": "0"});
    $("#carga").css("animation-play-state", "paused");
}
$(document).ready(function(){
    function consulta_login(){
        if ($('#nombre').val().length == 0 && $('#clave').val().length == 0) {
                alert("Escriba su Usuario y Clave");
                $('#nombre').focus();
                return false;
        }else{
            if ($('#nombre').val().length == 0) {
                alert("Olvido escribir su Usuario");
                $('#nombre').focus();
                return false;
            }else if ($('#clave').val().length == 0) {
                alert("Falta escribir su Clave");
                $('#clave').focus();
                return false;
            }else{
                $("#contenedor_carga").css({"visibility": "visible", "opacity": "100"});
        	    $("#carga").css("animation-play-state", "running");
                var nombre = $("input#nombre").val();
                var clave = $("input#clave").val();
                $.ajax({
                    url: "inicio_sesion_marcel.php",
                    method: "POST",
                    data: {nombre: nombre, clave: clave},
                    success: function(data){
                        if (data == "0"){
                            alert("Nombre de Usuario y/o Contraseña son Incorrectos");
                            $("#contenedor_carga").css({"visibility": "hidden", "opacity": "0"});
                            $("#carga").css("animation-play-state", "paused");
                        }else{
                            if (data == "1"){
                                location.replace('Administracion/menu_admin.php');
                            }else if (data == "2"){
                                location.replace('Operario/menu.php');
                            }else if (data == "3"){
                                location.replace('Tecnicos/menu.php');
                            }
                        }
                    }
                })
            }
        }
    }
	$(document).on("click","#gu",function(){
	    consulta_login();
    })
    $('#cuerpo_pagina').keypress(function (e) {
        var key = e.which;
        if(key == 13)
        {
            consulta_login();
        }
    });
});