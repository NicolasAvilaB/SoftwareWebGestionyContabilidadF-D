<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$id_coti = $_POST["id_coti"];
$id_add = $_POST["id_add"];
$nombre_add = $_POST["nombre_add"];
$fecha_add = $_POST["fecha_add"];
$subtotal0_add = $_POST["subtotal0_add"];
$desc_add = $_POST["desc_add"];
$valor_ins = $_POST["valor_ins"];
$otros = $_POST["otros"];
$id_empresa = $_POST["id_empresa"];
$totales2_add = $_POST["totales2_add"];
$valor_iva2_add = $_POST["valor_iva2_add"];
$total2_add = $_POST["total2_add"];
$valor_desc_add = $_POST["valor_desc_add"];
$total_cancelar2_add = $_POST["total_cancelar2_add"];
$subtotal8_otros = $_POST["subtotal8_otros"];
$id1 = $_POST["id1"];
$id2 = $_POST["id2"];
$b = $_POST["b"];
$consulta = mysqli_query($conexion,"Call Modificar_Total_Cotizacion_Rollers ('$id_coti','$id_add','$nombre_add','$fecha_add','$subtotal0_add','$desc_add','$valor_ins','$otros','$id_empresa','$totales2_add','$valor_iva2_add','$total2_add','$valor_desc_add','$total_cancelar2_add','$subtotal8_otros','$id1','$id2','$b')");
if(!$consulta){
    echo "Error al insertar los datos ". mysqli_error();
}else{
}
?>
