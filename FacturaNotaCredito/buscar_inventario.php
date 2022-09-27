<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<link rel="stylesheet"  href="../Imagenes/jquery.dataTables.min.css" type="text/css">
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
<script src="../Imagenes/jquery.dataTables.min.js"></script>
<script>
$(document).ready( function () {
    $('#accion_inventario').DataTable();
});
</script>
</head>
<body>
<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}
$texto = $_POST["texto"];
if($consulta = $conexion->query("Call Buscar_Facturas_Inventario ('$texto')")){
    echo "<table id='accion_inventario'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Factura</th>
                    <th>Técnico</th>
                    <th>Valor</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
        <tbody id='agregar_fila_inventario'>";
    if ($consulta) {
        while($row = $consulta->fetch_assoc()){
            $nombre_tec = $row["Tecnico"];
            echo "<tr>
                    <td id='id_inventario' data-id_id='".$row["Id"]."'>".$row["Id"]."</td>
                    <td><input type='date' class='grid-item' id='fechas' name='fechas' min='2005-01-01' max='2100-12-31' size='30' maxlength='70' autocomplete='off' value='".$row["Fecha"]."'/></td>
                    <td id='factura_inventario' data-id_facturainventario='".$row["Id"]."' contenteditable>".$row["Factura"]."</td>
                    <td id='tecnico_inventario' data-id_tecnico_inventario='".$row["Id"]."'>";
		                $conexion223 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
                    mysqli_set_charset($conexion223,"utf8");
                    $ejecutar223 = mysqli_query($conexion223,"select Instalador from Instaladores where Estado = 'Desactivar'");
                    mysqli_set_charset($conexion223,"utf8");
                    echo "<select id='nombre_tecnico' name='nombre_tecnico'>
                    	<option value='0' disabled selected>Seleccione Técnico...</option>";
                        while ($row223 = mysqli_fetch_array($ejecutar223)) {
                        	$valor_nombre_tec = $row223[0];
                                if ($nombre_tec == $valor_nombre_tec){
                                    echo "<option value='$valor_nombre_tec' selected>".$valor_nombre_tec."</option>";
                                }else if($nombre_tec != $valor_nombre_tec){
                                    echo "<option value='$valor_nombre_tec'>".$valor_nombre_tec."</option>";
                                }
                        }
                        echo "</select></td>
	                  <td id='valor_inventario' data-id_valor_inventario='".$row["Id"]."' contentEditable>".$row["Valor"]."</td>
                    <td id='producto_inventario' data-id_producto_inventario='".$row["Id"]."'>".$row["Producto"]."</td>
                    <td id='cantidad_inventario' data-id_cantidad_inventario='".$row["Id"]."' contentEditable>".$row["Cantidad"]."</td>
                    <td><button id='modificar_inventario' data-id_modificar_inventario='".$row["Id"]."'>Modificar</button></td>
                    <td><button id='eliminar_inventario' data-id_eliminar_inventario='".$row["Id"]."'>Eliminar</button></td>
                </tr>
            ";
        }
    }
    echo "</tbody></table>";
    $consulta->close();
    $conexion->more_results();
};
?>
</body>
</html>
