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
    $('#tabla_cotizaciones').DataTable();
});
</script>
</head>
<body>
<p></p>
<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion2 = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}
$texto = $_POST["texto"];
if($consulta = $conexion->query("Call Buscar_NotaVentas_Todo_Empr('$texto')")){
    echo "<table id='tabla_cotizaciones' border='2px' align='center'>
            <thead>
                <tr>
                    <th>ID Cliente </th>
                    <th>Nota Venta</th>
                    <th>Cliente</th>
                    <th>Empresa</th>
                    <th>Fecha Ingreso</th>
                    <th>Total</th>
                    <th>Instalador</th>
                    <th>Rectificador</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>";
            $suma = 0;
    if ($consulta) {
        while($row = $consulta->fetch_assoc()){
            $id = $row["Id"];
            $idc = $row["IdCliente"];
            $resta2 = 0;
            $fecha2 = date("d-m-Y",strtotime($row["FechaIngreso"]));
            $consulta00 = $conexion2->query("select sum(Valor) as 'Valor' from Historial_Descuento_B_NotaVenta where IdNotaVenta = '$id'");
            if(mysqli_num_rows($consulta00) > 0){
                if($row00 = $consulta00->fetch_assoc()){
                    $resta2 = $row00["Valor"];
                }
            }else{
                $resta2 = 0;
            }
            $total = intval($row["Total"]) - intval($resta2);
            $suma += $total;
            echo "<tr>
                <td>".$row["IdCliente"]."</td>
                <td>".$row["Id"]."</td>
                <td>".$row["N_Cliente"]."</td>
                <td>".$row["Empresa"]."</td>
                <td>".$fecha2."</td>
                <td>$ ".number_format($total, 0, ',', '.')."</td>
                <td>".$row["Instalador"]."</td>
                <td>".$row["Rectificador"]."</td>
                <td><button id='ver_abonos'>Ver</button><!--<a href='generar_notaventapdf.php?id=".$id."&idc=".$idc."' type='button' value='View PDF' class='btn btn-primary' target='_blank'>Ver--></td>
                <td><button id='eliminar' data-id_eliminar='".$row["Id"]."'>Eliminar</button></td>
            </tr>";
        }
    }
    echo "</tbody></table><label style='position: absolute;top: 35px;right: 28%;'>Total Filtrado: <strong>$ ".number_format($suma, 0, ',', '.')."</strong></label>";
    $consulta->close();
    $conexion->more_results();
};
?>
</body>
</html>
