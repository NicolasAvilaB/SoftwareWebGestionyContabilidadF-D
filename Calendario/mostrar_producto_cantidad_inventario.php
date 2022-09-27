<html>
<head>
<link rel="stylesheet"  href="../Imagenes/jquery.dataTables.min.css" type="text/css">
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
<script src="../Imagenes/jquery.dataTables.min.js"></script>
<script src="https://www.w3schools.com/lib/w3.js"></script>
<script>
$(document).ready( function () {
    $('#tabla_producto_cantidad').DataTable();
    $('#tabla_factura_todo').DataTable();
    $('#tabla_retiros_tecnicos').DataTable();
});
</script>
</head>
<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion2 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
mysqli_set_charset($conexion,"utf8");
mysqli_set_charset($conexion2,"utf8");
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}
$texto = $_POST["texto"];
$consulta_porc_roller = $conexion->query("Call Mostrar_Producto_Todo_Tecnico_Inventario('$texto')");
    echo "<label><strong>Saldo Stock</strong></label><!--<button id='guardar_stock' data-stock_tecnico='$texto'>Guardar Stock</button>--><table id='tabla_producto_cantidad' border='1px'>
            <thead>
                <tr>
                    <th style='display:none;'>Id</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>";
    if ($consulta_porc_roller) {
        $resta = 0;
        while($row = $consulta_porc_roller->fetch_assoc()){
            $conexion300 = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
            $conexion302 = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
            $conexion303 = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
            $prod = $row["Producto"];
            $resta = $row["Cantidad"];
            $consulta300 = $conexion300->query("Call Mostrar_Cantidad_Salida_Todo_Detalle_Inventario_Producto('$texto','$prod')");
            $consulta302 = $conexion302->query("Call Mostrar_Cantidad_Salida_Todo_Detalle_Inventario_Producto_Retiro('$texto','$prod')");
            $consulta303 = $conexion303->query("Call Mostrar_Cantidad_Salida_Todo_Detalle_Inventario_Producto_Ingreso('$texto','$prod')");
            while($row300 = $consulta300->fetch_assoc()){
                $resta -= $row300["Cantidad"];
            }
            while($row302 = $consulta302->fetch_assoc()){
                $resta -= $row302["Cantidad"];
            }
            while($row303 = $consulta303->fetch_assoc()){
                $resta += $row303["Cantidad"];
            }
            echo "<tr>
                <td style='display:none;'>".$row["Id"]."</td>
                <td>".$prod."</td>
                <td>".$resta."</td>
            </tr>";
        }
    }
    echo "</tbody></table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <label><strong>Detalle Completo</strong></label>
    <table id='tabla_factura_todo' border='1px'>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Producto</th>
                <th>Nota Venta</th>
                <th>Factura</th>
                <th>Entrada</th>
                <th>Salida</th>
            </tr>
        </thead>
        <tbody>";
        $conexion3335 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
        $consulta3335 = mysqli_query($conexion3335, "Call Mostrar_Retiros_Tecnicos_Inventario('$texto')") or die (mysqli_error($conexion3335));
        while($row3335 = mysqli_fetch_array($consulta3335)){
            echo "<tr>
              <td><input type='date' min='2005-01-01' max='2100-12-31' style='font-size:1.2vw;width:125px;' value='$row3335[0]' disabled/></td>
              <td>".$row3335[3]."</td>
              <td>".$row3335[1]."</td>
              <td></td>
              <td>".$row3335[2]."</td>
              <td>".$row3335[4]."</td>
            </tr>";
        }
        $consulta_todo_factura_producto = $conexion2->query("Call Mostrar_Producto_Detalle_Inventario('$texto')");
        while($row1 = $consulta_todo_factura_producto->fetch_assoc()){
            $fecha_tab = $row1["Fecha"];
            $prod = $row1["Producto"];
            echo "<tr>
                  <td><input type='date' min='2005-01-01' max='2100-12-31' style='font-size:1.2vw;width:125px;' value=".$row1["Fecha"]." disabled/></td>
                  <td>".$row1["Producto"]."</td>
                  <td></td>
                  <td>".$row1["Factura"]."</td>
                  <td>".$row1["Cantidad"]."</td>
                  <td></td></tr>";
        }
        $conexion333 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
        $consulta333 = mysqli_query($conexion333, "Call Mostrar_Cantidad_Salida_Todo_Detalle_Inventario('$texto')") or die (mysqli_error($conexion333));
        while($row333 = mysqli_fetch_array($consulta333)){
          echo "<tr>
            <td><input type='date' min='2005-01-01' max='2100-12-31' style='font-size:1.2vw;width:125px;' value='$row333[0]' disabled/></td>
            <td>".$row333[2]."</td>
            <td>".$row333[1]."</td>
            <td></td>
            <td></td>
            <td>".$row333[3]."</td>
          </tr>";

        }
        echo "</tbody></table>
        <!--<p>&nbsp;</p>
        <p>&nbsp;</p>
        <label><strong>Detalle Retiros</strong></label>
        <table id='tabla_retiros_tecnicos' border='1px'>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Detalle</th>
                    <th>Técnico al cual Ingresó</th>
                    <th>Producto</th>
                    <th>Cantidad Ret.</th>
                    <th>Tipo Ingreso</th>
                </tr>
            </thead>
            <tbody>";
            $conexion3335 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
            $consulta3335 = mysqli_query($conexion3335, "Call Mostrar_Retiros_Tecnicos_Inventario('$texto')") or die (mysqli_error($conexion3335));
            while($row3335 = mysqli_fetch_array($consulta3335)){
                echo "<tr>
                  <td><input type='date' min='2005-01-01' max='2100-12-31' style='font-size:1.2vw;width:125px;' value='$row3335[0]' disabled/></td>
                  <td>".$row3335[1]."</td>
                  <td>".$row3335[2]."</td>
                  <td>".$row3335[3]."</td>
                  <td>".$row3335[4]."</td>
                  <td>".$row3335[5]."</td>
                </tr>";
            }
            echo "</tbody></table>-->";
    $consulta_porc_roller->close();
    $conexion->more_results();
    $consulta_todo_factura_producto->close();
    $conexion2->more_results();

?>
</html>
