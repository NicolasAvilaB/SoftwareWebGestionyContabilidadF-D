<html>
<head>
<link rel="stylesheet"  href="../Imagenes/jquery.dataTables.min.css" type="text/css">
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
<script src="../Imagenes/jquery.dataTables.min.js"></script>
<script src="https://www.w3schools.com/lib/w3.js"></script>
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
echo "<button id='guardar_modificacion_tabla'>Guardar Modificacion</button>";
if($consulta_porc_roller = $conexion->query("select IdCotizacion, Valor from Descuento_B_Cotizacion")){
    echo "<br></br><table id='tabla_accion_descb'> 
            <thead>
                <tr>
                    <th>Cotización</th>
                    <th>Valor ($)</th>
                </tr>
            </thead>
            <tbody>";
    if ($consulta_porc_roller) {
        while($row = $consulta_porc_roller->fetch_assoc()){
            echo "<tr>
                <td contenteditable>".$row["IdCotizacion"]."</td>
                <td contenteditable>".$row["Valor"]."</td>
            </tr>";
        }
    }
    echo "</tbody></table>";
    $consulta_porc_roller->close();
    $conexion->more_results();
};
?>
</html>
