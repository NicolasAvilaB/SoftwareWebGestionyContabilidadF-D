<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<link href="clientes.css" rel="stylesheet" type="text/css">
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
<link rel="stylesheet"  href="../Imagenes/jquery.dataTables.min.css" type="text/css">
<script src="../Imagenes/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function(){
    $('#tabla_persianas').DataTable();
    $('#tabla_roller').DataTable();
    $('#tabla_repuesto').DataTable();
    $('#tabla_otro').DataTable();
});
</script>
</head>
<body>
<p></p>
<br></br>
<?php
$conexion = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion2 = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion3 = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion4 = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
mysqli_set_charset($conexion2,"utf8");
mysqli_set_charset($conexion3,"utf8");
mysqli_set_charset($conexion4,"utf8");
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}
$texto = $_POST["texto"];
if($consulta = $conexion->query("Call Buscar_Detalle_Venta('$texto')")){
    echo "<strong>Persianas</strong><table id='tabla_persianas' border='2px'> 
            <thead>
                <tr>
                    <th style='display:none;'>Id</th>
                    <th>N° Nota Venta</th>
                    <th>Cantidad</th>
                    <th>Ancho</th>
                    <th>Alto</th>
                    <th>Accionamiento</th>
                    <th>Color</th>
                    <th>Valor Unidad</th>
                    <th>Valor Total</th>
                    <th></th>
                </tr>
            </thead>
        <tbody id='agregar_fila_otro'>";
    if ($consulta) {
        while($row = $consulta->fetch_assoc()){
            $id0 = $row["IdNotaVenta"];
            echo "<tr>
            <td style='display:none;'>".$row["Id"]."</td>
            <td>".$id0."</td>
            <td>".$row["Cantidad"]."</td>
            <td>".$row["Ancho"]."</td>
            <td>".$row["Alto"]."</td>
            <td>".$row["Motor"]."</td>
            <td>".$row["Color"]."</td>
            <td>".$row["ValorUn"]."</td>
            <td>".$row["ValorTotal"]."</td>
            <td><button id='eliminar_detalleventa' data-id_eliminar_detalleventa='".$row["Id"]."'>Eliminar</button></tr>";
        }
    }
    echo "</tbody></table>";
    $consulta->close();
    $conexion->more_results();
};
if($consulta2 = $conexion2->query("Call Buscar_Detalle_Venta_Roller('$texto')")){
    echo "<br></br><strong>Roller</strong><table id='tabla_roller' border='2px'> 
            <thead>
                <tr>
                    <th style='display:none;'>Id</th>
                    <th>N° Nota Venta</th>
                    <th>Cantidad</th>
                    <th>Ancho</th>
                    <th>Alto</th>
                    <th>Accionamiento</th>
                    <th>Color</th>
                    <th>Valor Unidad</th>
                    <th>Valor Total</th>
                    <th></th>
                </tr>
            </thead>
        <tbody id='agregar_fila_otro'>";
    if ($consulta2) {
        while($row2 = $consulta2->fetch_assoc()){
            $id0 = $row2["IdTotalRollers"];
            echo "<tr>
            <td style='display:none;'>".$row2["Id"]."</td>
            <td>".$id0."</td>
            <td>".$row2["Cantidad"]."</td>
            <td>".$row2["Ancho"]."</td>
            <td>".$row2["Alto"]."</td>
            <td>".$row2["Motor"]."</td>
            <td>".$row2["Roller"]."</td>
            <td>".$row2["ValorUnitario"]."</td>
            <td>".$row2["ValorTotal"]."</td>
            <td><button id='eliminar_detalleventa_roller' data-id_eliminar_detalleventa_roller='".$row2["Id"]."'>Eliminar</button></tr>";
        }
    }
    echo "</tbody></table>";
    $consulta2->close();
    $conexion2->more_results();
};
if($consulta3 = $conexion3->query("Call Buscar_Detalle_Venta_Repuesto('$texto')")){
    echo "<br></br><strong>Repuestos</strong><table id='tabla_repuesto' border='2px'> 
            <thead>
                <tr>
                    <th style='display:none;'>Id</th>
                    <th>N° Nota Venta</th>
                    <th>Cantidad</th>
                    <th>Repuesto</th>
                    <th>Valor Unidad</th>
                    <th>Valor Total</th>
                    <th></th>
                </tr>
            </thead>
        <tbody id='agregar_fila_otro'>";
    if ($consulta3) {
        while($row3 = $consulta3->fetch_assoc()){
            $id0 = $row3["IdNotaVenta"];
            echo "<tr>
            <td style='display:none;'>".$row3["Id"]."</td>
            <td>".$id0."</td>
            <td>".$row3["Cantidad"]."</td>
            <td>".$row3["Repuesto"]."</td>
            <td>".$row3["ValorUnitario"]."</td>
            <td>".$row3["ValorTotal"]."</td>
            <td><button id='eliminar_detalleventa_repuesto' data-id_eliminar_detalleventa_repuesto='".$row3["Id"]."'>Eliminar</button></tr>";
        }
    }
    echo "</tbody></table>";
    $consulta3->close();
    $conexion3->more_results();
};
if($consulta4 = $conexion4->query("Call Buscar_Detalle_Venta_Otro('$texto')")){
    echo "<br></br><strong>Otros</strong><table id='tabla_otro' border='2px'> 
            <thead>
                <tr>
                    <th style='display:none;'>Id</th>
                    <th>N° Nota Venta</th>
                    <th>Cantidad</th>
                    <th>Otro</th>
                    <th>Valor Unidad</th>
                    <th>Valor Total</th>
                    <th></th>
                </tr>
            </thead>
        <tbody id='agregar_fila_otro'>";
    if ($consulta4) {
        while($row4 = $consulta4->fetch_assoc()){
            $id0 = $row4["IdNotaVenta"];
            echo "<tr>
            <td style='display:none;'>".$row4["Id"]."</td>
            <td>".$id0."</td>
            <td>".$row4["Cantidad"]."</td>
            <td>".$row4["Otro"]."</td>
            <td>".$row4["ValorUnitario"]."</td>
            <td>".$row4["ValorTotal"]."</td>
            <td><button id='eliminar_detalleventa_otro' data-id_eliminar_detalleventa_otro='".$row4["Id"]."'>Eliminar</button></tr>";
        }
    }
    echo "</tbody></table>";
    $consulta4->close();
    $conexion4->more_results();
};
?>
</body>
</html>
