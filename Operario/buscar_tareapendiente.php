<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
<!--<link rel="stylesheet"  href="../Imagenes/jquery.dataTables.min.css" type="text/css">-->
<!--<script src="../Imagenes/jquery.dataTables.min.js"></script>-->
</head>
<body>
<p></p>
<?php
$conexion = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}
$texto = $_POST["texto"];
if($consulta = $conexion->query("Call Contar_Etiquetas_Pendientes_Calendario('$texto')")){
    if ($consulta) { 
        if($row = $consulta->fetch_assoc()){
            $numero_cantidad = $row["Numero"];
            echo "<button id='tareaspendientes' class='tareaspendientes'>Tareas Pendientes: ".$numero_cantidad."</button>";
        }
    }
    $consulta->close();
    $conexion->more_results();
};
?>
</body>
</html>
