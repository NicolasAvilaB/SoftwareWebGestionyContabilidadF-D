<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion2 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
mysqli_set_charset($conexion,"utf8");
mysqli_set_charset($conexion2,"utf8");
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}
$ejecutar2 = mysqli_query($conexion2,"select Desc_Persiana, Desc_Roller, Desc_Final from Descuento_Cotizacion");
echo "<label class='titulo_tabla_porcentaje'>Descuentos</label><p>&nbsp;</p>";
if (mysqli_num_rows($ejecutar2) == 0){
            echo "<label id='1descpe'>Primer Descuento Persianas: <input id='1descpersiana' value='0'></input></label><p>&nbsp;</p>
            <label id='2descro'>Segundo Descuento Roller: <input id='2descroller' value='0'></input></label><p>&nbsp;</p>
            <label id='descf'>Descuento Final Máximo: <input id='descfinal' value='0'></input></label><p>&nbsp;</p>
            <button id='aplicar_porc_desc'>Guardar</button>";
        }else{
            while ($row2 = mysqli_fetch_array($ejecutar2)) {
            echo "<label id='1descper'>Primer Descuento Persianas: <input id='1descpersiana' value=".$row2[0]."></input></label><p>&nbsp;</p>
            <label id='2descr'>Segundo Descuento Roller: <input id='2descroller' value=".$row2[1]."></input></label><p>&nbsp;</p>
            <label id='descf'>Descuento Final Máximo: <input id='descfinal' value=".$row2[2]."></input></label><p>&nbsp;</p>
            <button id='aplicar_porc_desc'>Guardar</button>";
        }
    }
?>
