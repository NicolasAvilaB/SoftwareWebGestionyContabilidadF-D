<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion2 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion3 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion4 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion5 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
mysqli_set_charset($conexion2,"utf8");
mysqli_set_charset($conexion3,"utf8");
mysqli_set_charset($conexion4,"utf8");
mysqli_set_charset($conexion5,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$fecha_inst = $_POST["fecha_inst"];
$tecnico = $_POST["tecnico"];
$horario = $_POST["horario"];
$manana = "Mañana";
$tarde = "Tarde";
$consulta4 = mysqli_query($conexion4,"Call Consultar_Existe_Fecha_Opciones('$fecha_inst','$tecnico')")or die (mysqli_error($conexion4));
if($row4 = mysqli_fetch_array($consulta4)) {
    $numero = $row4[0];
    if($numero == '0' || $numero == 0){
        for ($i = 0;$i<4;$i++){
          $consulta5 = mysqli_query($conexion5,"Call Ingresar_Opciones_Horariox4('$fecha_inst','Mañana','$tecnico')")or die (mysqli_error($conexion5));
        }
        for ($i = 0;$i<4;$i++){
          $consulta5 = mysqli_query($conexion5,"Call Ingresar_Opciones_Horariox4('$fecha_inst','Tarde','$tecnico')")or die (mysqli_error($conexion5));
        }
    }elseif($numero == '1' || $numero == 1){}
}
if($horario == "Mañana" || $horario == "Tarde"){
    $consulta2 = mysqli_query($conexion2,"Call Resetear_Horario_Manana_Tarde ('$fecha_inst','$tecnico','$manana')");
    $consulta3 = mysqli_query($conexion3,"Call Resetear_Horario_Manana_Tarde ('$fecha_inst','$tecnico','$tarde')");
    $consulta = mysqli_query($conexion,"Call Modificar_Horario_Inicio_Admin ('$fecha_inst','$tecnico','$horario')") or die ("P: ".mysqli_error($conexion));
}elseif($horario == "Dia"){
    $consulta = mysqli_query($conexion,"Call Modificar_Horario_Inicio_Todo_Dia_Mañana_Admin ('$fecha_inst','$tecnico')") or die ("P: ".mysqli_error($conexion));
    $consulta = mysqli_query($conexion,"Call Modificar_Horario_Inicio_Todo_Dia_Tarde_Admin ('$fecha_inst','$tecnico')") or die ("P: ".mysqli_error($conexion));
}elseif($horario == "Desocupar"){
    $consulta = mysqli_query($conexion,"Call Modificar_Horario_Inicio_Todo_Dia_Desocupar_Mañana_Admin ('$fecha_inst','$tecnico')") or die ("P: ".mysqli_error($conexion));
    $consulta = mysqli_query($conexion,"Call Modificar_Horario_Inicio_Todo_Dia_Desocupar_Tarde_Admin ('$fecha_inst','$tecnico')") or die ("P: ".mysqli_error($conexion));
}
if(!$consulta){
    echo "Error al modificar los datos". mysqli_error();
}else{}
?>
