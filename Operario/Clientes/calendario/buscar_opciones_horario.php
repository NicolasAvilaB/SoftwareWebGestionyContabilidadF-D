<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<script src="../jquery-3.6.0.min.js"></script>
<!--<link rel="stylesheet"  href="../Imagenes/jquery.dataTables.min.css" type="text/css">-->
<!--<script src="../Imagenes/jquery.dataTables.min.js"></script>-->
<script>
</script>
</head>
<body>
<p></p>
<?php
    $conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
    mysqli_set_charset($conexion,"utf8");
    $texto = $_POST["texto"];
    $ejecutar = mysqli_query($conexion,"select * FROM Opciones_HorarioVend where Fecha = '$texto'");
?>
<select id='select_horario' name='select_horario'>
    <option value='1' disabled selected>Seleccione Horario...</option>
<?php while ($row = mysqli_fetch_array($ejecutar)) { ?>
    <option value='<?php echo $row[1];?>'><?php echo $row[2];?></option>
<?php } ?>
</select>
</body>
</html>
