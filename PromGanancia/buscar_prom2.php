<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<link href="clientes.css" rel="stylesheet" type="text/css">
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
</head>
<body>
<p></p>
<br></br>
<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}
if($consulta = $conexion->query("Call Tabla2_Prom_Ganancia")){
    echo 
        "<table id='accion4'> 
            <thead>
                <tr>
                    <th style='display:none;'>ID Empresas</th>
                    <th>Empresas</th>
                    <th>Valor Venta ($)</th>
                    <th>Factura Compra ($)</th>
                    <th>Nota Credito ($)</th>
                    <!--<th>Gastos ($)</th>
                    <th>Retiro Socios ($)</th>
                    <th>Pago Creditos ($)</th>-->
                    <th>Total ($)</th>
                </tr>
            </thead>
        <tbody>
        ";
    if ($consulta) {
        $suma_completa = 0;
        while($row = $consulta->fetch_assoc()){
            $nombre_empresas = $row["Empresas"];
            if ($nombre_empresas == 'Admin'){
            }else{
                $suma = 0;
                $suma = intval($row["Venta"]) - intval($row["Factura"]) + intval($row["Credito"]); //- intval($row["Gasto"]) - intval($row["RetiroSocio"]) - intval($row["PagoCredito"]);
                $suma_completa += $suma;
                echo "<tr>
                        <td style='display:none;'>".$row["IdEmpresas"]."</td>
                        <td>".$nombre_empresas."</td>
                        <td>$ ".number_format($row["Venta"], 0, ',', '.')."</td>
                        <td>$ ".number_format($row["Factura"], 0, ',', '.')."</td>
                        <td>$ ".number_format($row["Credito"], 0, ',', '.')."</td>
                        <!--<td>$ ".number_format($row["Gasto"], 0, ',', '.')."</td>
                        <td>$ ".number_format($row["RetiroSocio"], 0, ',', '.')."</td>
                        <td>$ ".number_format($row["PagoCredito"], 0, ',', '.')."</td>-->
                        <td>$ ".number_format($suma, 0, ',', '.')."</td>
                    </tr>";
            }
        }
    }
    echo "</tbody><tr><td></td><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td style='font-weight:bold;'>Total Empresas:</td><td style='font-weight:bold;'>$ ".number_format($suma_completa, 0, ',', '.')."</td></tr></table><br></br>";
    $consulta->close();
    $conexion->more_results();
};
?>
</body>
</html>
