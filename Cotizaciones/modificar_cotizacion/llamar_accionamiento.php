<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<link href="clientes.css" rel="stylesheet" type="text/css">
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
</head>
<body>
<select class="motor_add" id="motor_add">
    <option value="1" selected>Seleccione Accionamiento...</option>
    <?php
        $conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
        mysqli_set_charset($conexion,"utf8");
        $ejecutarx = mysqli_query($conexion,"Call Consulta_Motor_Habilitados()");
    ?>
    <?php while ($rowx = mysqli_fetch_array($ejecutarx)) {  ?> 
        <option value='<?php echo $rowx[0];?>'><?php echo $rowx[0];?></option>
    <?php } ?>
</select>
</body>
</html>
