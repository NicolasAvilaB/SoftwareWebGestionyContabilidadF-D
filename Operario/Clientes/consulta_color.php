<?php
$texto = $_POST["texto"];
$texto2 = $_POST["texto2"];
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
mysqli_set_charset($conexion,"utf8");
$ejecutarx = mysqli_query($conexion,"Call Consulta_Color('$texto','$texto2')");
if(!$ejecutarx){
    echo "Error al insertar los datos ". mysqli_error();
}else{
    if (mysqli_num_rows($ejecutarx) == 0){
        echo 1;
    }else{
        echo 0;
    }
}
mysqli_close($conexion);
?>
