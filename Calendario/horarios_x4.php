<?php
		$texto = $_REQUEST["texto"];
		$texto2 = $_REQUEST["texto2"];
		$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
		mysqli_set_charset($conexion,"utf8");
		$ejecutar = mysqli_query($conexion,"Call Consultar_Opciones_Horariox4_Vend ('$texto','$texto2')");
		mysqli_set_charset($conexion,"utf8");
?>
<select id="select_horario" name="select_horario">
		<option value='1' selected disabled>Seleccione Horario...</option>
		<option value='Mañana'>Mañana</option>
<?php while ($row = mysqli_fetch_array($ejecutar)) { ?>
		<option value='<?php echo $row[0];?>'><?php echo $row[1];?></option>
<?php } ?>
		<option value='Tarde'>Tarde</option>
</select>
