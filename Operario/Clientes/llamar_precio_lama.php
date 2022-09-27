<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion2 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion3 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion4 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion5 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion6 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion7 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion8 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion9 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion10 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion11 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion12 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
mysqli_set_charset($conexion2,"utf8");
mysqli_set_charset($conexion3,"utf8");
mysqli_set_charset($conexion4,"utf8");
mysqli_set_charset($conexion5,"utf8");
mysqli_set_charset($conexion6,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$ancho = $_POST["ancho"];
$alto = $_POST["alto"];
$nombre_lama = $_POST["nombre_lama"];
$valor_ajax = 0;
$valor_accion = 0;
$valor_desc1prov = 0;
$valor_desc2prov = 0;
$valor_desc1vent = 0;
$valor_desc2vent = 0;
$valor_ganancia = 0;
$valor_desc1prov_acc = 0;
$valor_desc2prov_acc = 0;
$valor_desc1vent_acc = 0;
$valor_desc2vent_acc = 0;
$valor_ganancia_acc = 0;
$sumatoria_instalacion = 0;
$consulta = mysqli_query($conexion,"Call Mostrar_Precio_Lama ('$ancho','$alto','$nombre_lama')");
$consulta2 = mysqli_query($conexion2,"Call Mostrar_Precio_Desc1_Proveedor ('$nombre_lama')");
$consulta3 = mysqli_query($conexion3,"Call Mostrar_Precio_Desc2_Proveedor ('$nombre_lama')");
$consulta4 = mysqli_query($conexion4,"Call Mostrar_Precio_Desc1_Venta ('$nombre_lama')");
$consulta5 = mysqli_query($conexion5,"Call Mostrar_Precio_Desc2_Venta ('$nombre_lama')");
$consulta6 = mysqli_query($conexion6,"Call Mostrar_Precio_Ganancia ('$nombre_lama')");
$nombre_accionamiento = $_POST["nombre_accionamiento"];
$consulta7 = mysqli_query($conexion7,"Call Mostrar_Precio_Accionamiento ('$nombre_accionamiento')");
$consulta8 = mysqli_query($conexion8,"Call Mostrar_Precio_Desc1_Proveedor ('$nombre_accionamiento')");
$consulta9 = mysqli_query($conexion9,"Call Mostrar_Precio_Desc2_Proveedor ('$nombre_accionamiento')");
$consulta10 = mysqli_query($conexion10,"Call Mostrar_Precio_Desc1_Venta ('$nombre_accionamiento')");
$consulta11 = mysqli_query($conexion11,"Call Mostrar_Precio_Desc2_Venta ('$nombre_accionamiento')");
$consulta12 = mysqli_query($conexion12,"Call Mostrar_Precio_Ganancia ('$nombre_accionamiento')");
/*if (mysqli_num_rows($consulta) == 0){
    echo "No existe el Precio";
}else{
    if($row2 = mysqli_fetch_array($consulta)) {
        echo $row2[0];
    }
}*/
if($row = mysqli_fetch_array($consulta)) {
    $valor_ajax = $row[0];
    if ($valor_ajax == '0' || $valor_ajax == null){
        $valor_ajax = 0;
    }
}
if($row2 = mysqli_fetch_array($consulta2)) {
    $valor_desc1prov = $row2[0];
}
if($row3 = mysqli_fetch_array($consulta3)) {
    $valor_desc2prov = $row3[0];
}
if($row4 = mysqli_fetch_array($consulta4)) {
    $valor_desc1vent = $row4[0];
}
if($row5 = mysqli_fetch_array($consulta5)) {
    $valor_desc2vent = $row5[0];
}
if($row6 = mysqli_fetch_array($consulta6)) {
    $valor_ganancia = $row6[0];
}

if($row7 = mysqli_fetch_array($consulta7)) {
    $valor_accion = $row7[0];
}
if($row8 = mysqli_fetch_array($consulta8)) {
    $valor_desc1prov_acc = $row8[0];
}
if($row9 = mysqli_fetch_array($consulta9)) {
    $valor_desc2prov_acc = $row9[0];
}
if($row10 = mysqli_fetch_array($consulta10)) {
    $valor_desc1vent_acc = $row10[0];
}
if($row11 = mysqli_fetch_array($consulta11)) {
    $valor_desc2vent_acc = $row11[0];
}
if($row12 = mysqli_fetch_array($consulta12)) {
    $valor_ganancia_acc = $row12[0];
}

$desc1_proveedor = 0;
$desc2_proveedor = 0;
$ganancia = 0;
$desc1_venta = 0;
$desc2_venta = 0;
$incremento_ganancia = 0;
$subtotal_inflado = 0;
$porc_1 = 0;
$porc_2 = 0;
$resta = 0;
$total = 0;
$desc1_proveedor_acc = 0;
$desc2_proveedor_acc = 0;
$ganancia_acc = 0;
$desc1_venta_acc = 0;
$desc2_venta_acc = 0;
$incremento_ganancia_acc = 0;
$subtotal_inflado_acc = 0;
$precio_unitario = $valor_ajax;
$precio_unitario_acc = $valor_accion;
$mostrar_desc0 = 0;
$costo = 0;
$costo2 = 0;
$costo_acc = 0;
$costo2_acc = 0;
$vventa = 0;
$vventa2 = 0;
$pventa = 0;
$pventa2 = 0;
$desc1_proveedor = intval($precio_unitario) * $valor_desc1prov /100;
$costo = round($precio_unitario - $desc1_proveedor);
$desc2_proveedor = round($costo * $valor_desc2prov / 100);
$costo2 = round($costo - $desc2_proveedor);
$ganancia = round($costo * $valor_ganancia / 100);
$vventa = intval($costo2) + intval($ganancia);
$desc1_venta = round($vventa * $valor_desc1vent /100);
$pventa = intval($vventa) + intval($desc1_venta);
$desc1_proveedor_acc = intval($precio_unitario_acc) * $valor_desc1prov_acc /100;
$costo_acc = round($precio_unitario_acc - $desc1_proveedor_acc);
$desc2_proveedor_acc = round($costo_acc * $valor_desc2prov_acc / 100);
$costo2_acc = round($costo_acc - $desc2_proveedor_acc);
$ganancia_acc = round($costo_acc * $valor_ganancia_acc / 100);
$vventa2 = intval($costo2_acc) + intval($ganancia_acc);
$desc1_venta_acc = round($vventa2 * $valor_desc1vent_acc /100);
$pventa2 = intval($vventa2) + intval($desc1_venta_acc);
mysqli_close($conexion);
mysqli_close($conexion2);
mysqli_close($conexion3);
mysqli_close($conexion4);
mysqli_close($conexion5);
mysqli_close($conexion6);
mysqli_close($conexion7);
mysqli_close($conexion8);
mysqli_close($conexion9);
mysqli_close($conexion10);
mysqli_close($conexion11);
mysqli_close($conexion12);
if ($valor_ajax == null || $valor_ajax  == 0){
	echo 'No existe el Precio';
}else{
	echo round($pventa) + intval($pventa2);
}
?>
