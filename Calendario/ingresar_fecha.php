<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion2 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion3 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
mysqli_set_charset($conexion2,"utf8");
mysqli_set_charset($conexion3,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$texto = $_REQUEST["texto"];
$texto2 = $_REQUEST["texto2"];
$texto3 = $_REQUEST["texto3"];
$texto4 = $_REQUEST["texto4"];
$consulta = mysqli_query($conexion,"Call Consultar_Existe_Fecha_Opciones('$texto2','$texto4')")or die (mysqli_error($conexion));
if(!$consulta){
    echo "Error al insertar los datos ". mysqli_error();
}else{
    if($row2 = mysqli_fetch_array($consulta)) {
      	$numero = $row2[0];
      	if($numero == '0' || $numero == 0){
        		for ($i = 0;$i<4;$i++){
        			$consulta2 = mysqli_query($conexion2,"Call Ingresar_Opciones_Horariox4('$texto2','Mañana','$texto4')")or die (mysqli_error($conexion2));
        		}
        		for ($i = 0;$i<4;$i++){
        			$consulta2 = mysqli_query($conexion2,"Call Ingresar_Opciones_Horariox4('$texto2','Tarde','$texto4')")or die (mysqli_error($conexion2));
        		}
        		$consulta3 = mysqli_query($conexion3,"Call Modificar_Opciones_Horariox4_Vend('$texto','$texto3','$texto4')")or die (mysqli_error($conexion3));
      	}elseif($numero == '1' || $numero == 1){
      		  $consulta3 = mysqli_query($conexion3,"Call Modificar_Opciones_Horariox4_Vend('$texto','$texto3','$texto4')")or die (mysqli_error($conexion3));
      	}
    }
}
?>
