<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion2 = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$color = "";
$titulo = $_POST["titulo"];
$fechainicio = $_POST["fechainicio"];
$fechafin = $_POST["fechafin"];
$tecnico = $_POST["tecnico"];
if($consulta2 = $conexion2->query("Call Buscar_Color_Instalador_Evento ('$tecnico')")){
        if($row2 = $consulta2->fetch_assoc()){
            $color = $row2["Color"];
        }else{
            $color = "#612897";
        }
        $consulta2->close();
        $conexion2->more_results();
};
$horario = $_POST["horario"];
$detalle = $_POST["detalle"];
$idcliente = $_POST["idcliente"];
$nombre = $_POST["nombre"];
$direccion = $_POST["direccion"];
$comuna = $_POST["comuna"];
$telefono = $_POST["telefono"];
$observaciones = $_POST["observaciones"];
$observacionet = $_POST["observacionet"];
$vendedora = $_POST["vendedora"];
$id = $_POST["id"];
$consulta = mysqli_query($conexion,"Call Modificar_Calendario ('$titulo','$fechainicio','$fechafin','$color','$tecnico','$horario','$detalle','$idcliente','$nombre','$direccion','$comuna','$telefono','$observaciones','$observacionet','$vendedora','$id')")or die (mysqli_error($conexion));
if(!$consulta){
    echo "Error al insertar los datos ". mysqli_error();
}else{
    echo "Se ha insertado al Calendario";
}
?>
