<select class="detalle_otros_add" id="detalle_otros_add">
    <option value="1" disabled selected>Seleccione Otros...</option>
    <?php
        $conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
        mysqli_set_charset($conexion,"utf8");
        $ejecutarx = mysqli_query($conexion,"Call Consulta_Otros_Habilitados()");
    ?>
    <?php while ($rowx = mysqli_fetch_array($ejecutarx)) {  ?> 
        <option value='<?php echo $rowx[0];?>'><?php echo $rowx[0];?></option>
    <?php } ?>
</select>
