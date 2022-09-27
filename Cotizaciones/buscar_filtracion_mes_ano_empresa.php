<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<link href="clientes.css" rel="stylesheet" type="text/css">
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
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}
$texto = $_POST["texto"];
$texto2 = $_POST["texto2"];
$texto3 = $_POST["texto3"];
if($consulta = mysqli_query($conexion, "Call Buscar_Cotizaciones_Filtracion_Admin ('$texto','$texto2','$texto3')")){
    echo 
        "<table id='tabla_cotizaciones' border='2px' align='center'>
            <thead>
                <tr>
                    <th>ID Cliente</th>
                    <th>N° Cot</th>
                    <th>Cliente</th>
                    <th>Empresa</th>
                    <th>Producto</th>
                    <th>Fecha Ingreso</th>
                    <th>Total</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
        ";
    if ($consulta) {
        while($row = mysqli_fetch_array($consulta)){
            $idc = $row[0];
            $id = $row[1];
            $producto = $row[4];
            $fecha3 = date("d-m-Y",strtotime($row[5]));
            $total = 0;
            $cantidad = 0;
    	    $resto_cotizacion = 0;
                $conexion232 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd"); 
                mysqli_set_charset($conexion232,"utf8");
                $consulta232 = mysqli_query($conexion232, "select Valor from Descuento_B_Cotizacion where IdCotizacion = '$id'") or die ("P: ".mysqli_error($conexion232));
                if($resultados232 = mysqli_fetch_array($consulta232)) {
                    $resto_cotizacion = $resultados232[0];
                }
                echo "<tr>
                        <td>".$row[0]."</td>
                        <td>".$row[1]."</td>
                        <td>".$row[2]."</td>
                        <td>".$row[3]."</td>
                        <td>".$producto."</td>
                        <td>".$fecha3."</td>
                        <td>$ ".number_format(intval($row[6]) - intval($resto_cotizacion), 0, ',', '.')."</td>";
                        if ($producto == "Persianas"){
                            echo "<td><a href='generar_cotizacionpdf.php?id=".$id."&idc=".$idc."' type='button' value='View PDF' class='btn btn-primary' target='_blank'>Ver</td>";
                        }elseif ($producto == "Rollers"){
                            echo "<td><a href='generar_cotizacion_rollerpdf.php?id=".$id."&idc=".$idc."' type='button' value='View PDF' class='btn btn-primary' target='_blank'>Ver</td>";
                        }elseif ($producto == "Repuestos"){
                            echo "<td><a href='generar_cotizacion_repuestopdf.php?id=".$id."&idc=".$idc."' type='button' value='View PDF' class='btn btn-primary' target='_blank'>Ver</td>";
                        }elseif ($producto == "Otros"){
                            echo "<td><a href='generar_cotizacion_otrospdf.php?id=".$id."&idc=".$idc."' type='button' value='View PDF' class='btn btn-primary' target='_blank'>Ver</td>";
                        }
                        if ($producto == "Persianas"){
                            echo "<td><a href='cgenerar_cotizacionpdf.php?id=".$id."&idc=".$idc."' type='button' value='View PDF' class='btn btn-primary' target='_blank'>Ver Costo</td>";
                        }elseif ($producto == "Rollers"){
                            echo "<td><a href='cgenerar_cotizacion_rollerpdf.php?id=".$id."&idc=".$idc."' type='button' value='View PDF' class='btn btn-primary' target='_blank'>Ver Costo</td>";
                        }elseif ($producto == "Repuestos"){
                            echo "<td><a href='cgenerar_cotizacion_repuestopdf.php?id=".$id."&idc=".$idc."' type='button' value='View PDF' class='btn btn-primary' target='_blank'>Ver Costo</td>";
                        }elseif ($producto == "Otros"){
                            echo "<td><a href='cgenerar_cotizacion_otrospdf.php?id=".$id."&idc=".$idc."' type='button' value='View PDF' class='btn btn-primary' target='_blank'>Ver Costo</td>";
                        }
                        echo "<td><button id='mod'>Modificar</button></td>
                        <td><button id='eliminar' data-producto='".$producto."' data-id_eliminar='".$row[1]."'>Eliminar </button></td>
                    </tr>";
    	    
        }
    }
    echo "</tbody></table>";
    $consulta->close();
    $conexion->more_results();
};
?>
</body>
</html>
