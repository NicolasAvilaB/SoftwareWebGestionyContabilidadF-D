<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
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
if($consulta = $conexion->query("select Nombre from Tecnicos where Nombre = '$texto'")){
    echo "<table id='accion4'>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Nota Venta</th>
                    <th>Cliente</th>
                    <th>Tipo</th>
                    <th>Cantidad</th>
                    <th>Valor Unit.</th>
                    <th>Valor Total </th>
                    <th></th>
                </tr>
            </thead>
        <tbody id='agregar_fila_otro'>";
        $suma_total = 0;
    if ($consulta) {
        while($row = $consulta->fetch_assoc()){
            echo "<tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>";
            //$suma_total+= $row["total"];
        }
    }
    echo "</tbody></table><label style='float:right;'><strong>Total: <input type='text' placeholder='Total...' size='30' maxlength='70' autocomplete='off' value='".$suma_total."' style='text-align:center; font-size:1.3vw;' disabled/></strong></label>";
    $consulta->close();
    $conexion->more_results();
};
?>
</body>
</html>
