<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$id = $_POST["id"];
$id_cliente = $_POST["id_cliente"];
$fecha_abono_actual = $_POST["fecha_abono_actual"];
$abono = $_POST["abono"];
$medio_pago = $_POST["medio_pago"];
$abono = preg_replace('/^0+/', '', $abono);
$consulta_insert_hist_abonos = mysqli_query($conexion,"Call Ingresar_Historial_Abonos ('$id','$id_cliente','$fecha_abono_actual','$abono','$medio_pago')") or die ("P: ".mysqli_error($conexion));
if(!$consulta_insert_hist_abonos){
    echo "Error al ingresar los datos". mysqli_error();
}else{
}
?>
