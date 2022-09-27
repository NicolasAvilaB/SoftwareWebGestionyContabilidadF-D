<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion2 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion3 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion4 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion5 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion6 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
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
$nombre_repuesto = $_POST["nombre_repuesto"];
$valor_ajax = 0;
$valor_desc1prov = 0;
$valor_desc2prov = 0;
$valor_desc1vent = 0;
$valor_desc2vent = 0;
$valor_ganancia = 0;
$sumatoria_instalacion = 0;
$consulta = mysqli_query($conexion,"Call Mostrar_Precio_Repuesto ('$nombre_repuesto')");
$consulta2 = mysqli_query($conexion2,"Call Mostrar_Precio_Desc1_Proveedor ('$nombre_repuesto')");
$consulta3 = mysqli_query($conexion3,"Call Mostrar_Precio_Desc2_Proveedor ('$nombre_repuesto')");
$consulta4 = mysqli_query($conexion4,"Call Mostrar_Precio_Desc1_Venta ('$nombre_repuesto')");
$consulta5 = mysqli_query($conexion5,"Call Mostrar_Precio_Desc2_Venta ('$nombre_repuesto')");
$consulta6 = mysqli_query($conexion6,"Call Mostrar_Precio_Ganancia ('$nombre_repuesto')");
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
$precio_unitario = $valor_ajax;
$mostrar_desc0 = 0;
$costo = 0;
$costo2 = 0;
$vventa = 0;
$pventa = 0;
$desc1_proveedor = intval($precio_unitario) * $valor_desc1prov /100;
$costo = round($precio_unitario - $desc1_proveedor);
$desc2_proveedor = round($costo * $valor_desc2prov / 100);
$costo2 = round($costo - $desc2_proveedor);
$ganancia = round($costo * $valor_ganancia / 100);
$vventa = intval($costo2) + intval($ganancia);
$desc1_venta = round($vventa * $valor_desc1vent /100);
$pventa = intval($vventa) + intval($desc1_venta);
mysqli_close($conexion);
mysqli_close($conexion2);
mysqli_close($conexion3);
mysqli_close($conexion4);
mysqli_close($conexion5);
mysqli_close($conexion6);
echo round($pventa);
?>
