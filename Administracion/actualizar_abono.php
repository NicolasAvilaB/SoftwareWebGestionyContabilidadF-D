<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion2 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$fecha_fab = $_POST["fecha_fab"];
$fecha_ins = $_POST["fecha_ins"];
$fecha_insta = $_POST["fecha_insta"];
$abono = $_POST["abono"];
$instalador = $_POST["instalador"];
$rectificador = $_POST["rectificador"];
$id = $_POST["id"];
$id_cliente = $_POST["id_cliente"];
$fecha_abono_actual = $_POST["fecha_abono_actual"];
$distribuidor = $_POST["distribuidor"];
$observaciones = $_POST["observaciones"];
$instalacionfin = $_POST["instalacionfin"];
$consulta_insert_hist_abonos= "";
$abono = preg_replace('/^0+/', '', $abono);
$horario_bloquear_calendario = $_POST["horario_bloquear"];
$fechaventa = $_POST["fechaventa"];
$tipoinicio = $_POST["tipoinicio"];
$tipo_inicios = utf8_decode($tipoinicio);
$cliente = $_POST["cliente"];
$fechaVenta = date("Y/m/d", strtotime($fechaventa));
if($tipo_inicios == '0' || $tipo_inicios == null){
}elseif($tipo_inicios != '0'){
    $consulta2 = mysqli_query($conexion2,"Call Ingresar_Pago ('$instalador','$fecha_insta','$id','$cliente','$tipo_inicios') ")or die ("P: ".mysqli_error($conexion2));
}
$consulta = mysqli_query($conexion,"Call Modificar_Abono ('$fecha_fab','$fecha_ins','$fecha_insta','$abono','$id','$instalador','$rectificador','$distribuidor','$observaciones','$instalacionfin','$horario_bloquear_calendario','$tipo_inicios')") or die ("P: ".mysqli_error($conexion));
if(!$consulta){
    echo "Error al modificar los datos". mysqli_error();
}else{
    echo "Se ha modificado los datos";
}
?>
