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
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$id = $_POST["id"];
$tecnico = $_POST["tecnico"];
$rectificador = $_POST["rectificador"];
$fabricacion = $_POST["fabricacion"];
$instalacion = $_POST["instalacion"];
$efectuada = $_POST["efectuada"];
$vendedora = utf8_encode($_POST["vendedora"]);
$distribuidor = utf8_encode($_POST["distribuidor"]);
$fechaventa = $_POST["fechaventa"];
$tot = $_POST["tot"];
$horario = $_POST["horario"];
$tipoinicio = $_POST["tipoinicio"];
$cliente = $_POST["cliente"];
if($tipoinicio == '0' || $tipoinicio == null){
}elseif($tipoinicio != '0'){
    $consulta5 = mysqli_query($conexion5,"Call Ingresar_Pago ('$tecnico','$fecha_insta','$id','$cliente','$tipoinicio') ")or die ("P: ".mysqli_error($conexion5));
}
$consulta = mysqli_query($conexion,"Call Modificar_Fechas_NotaVenta ('$id','$tecnico','$rectificador','$fabricacion','$instalacion','$efectuada','$horario')");
$consulta2 = mysqli_query($conexion2,"Call Modificar_Vendedora_Fechas_NotaVenta ('$id','".utf8_decode($vendedora)."')");
$consulta3 = mysqli_query($conexion3,"Call Modificar_Vendedora_Distribuidor_NotaVenta ('$id','".utf8_decode($distribuidor)."')");
$consulta4 = mysqli_query($conexion4,"Call Modificar_Vendedora_FechaVenta_NotaVenta ('$id','$fechaventa')");
$consulta6 = mysqli_query($conexion6,"Call Modificar_Vendedora_Total_NotaVenta ('$id','$tot')");
if(!$consulta){
    echo "Error al insertar los datos ". mysqli_error();
}else{
}
?>
