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
    $('#tabla_cotizacioness').DataTable();
    $('#tabla_notaventasinfactura').DataTable();
});
</script>
</head>
<body>
<p></p>
<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion2 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion3 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion4 = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion5 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion6 = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion7 = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion8 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion9 = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexionx = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion111 = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexionxx = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
mysqli_set_charset($conexion2,"utf8");
mysqli_set_charset($conexion3,"utf8");
mysqli_set_charset($conexion4,"utf8");
mysqli_set_charset($conexion5,"utf8");
mysqli_set_charset($conexion6,"utf8");
mysqli_set_charset($conexion7,"utf8");
mysqli_set_charset($conexion8,"utf8");
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}
$texto = $_POST["texto"];
$consulta = $conexion->query("Call Total_NotaVenta_Ganancia_Filtracion_Empr ('$texto')");
$consulta2 = mysqli_query($conexion2,"Call Total_Factura_Ganancia_Filtracion_Empr ('$texto')");
$consulta3 = mysqli_query($conexion3,"Call Total_NotaCredito_Ganancia_Filtracion_Empr ('$texto')");
$consulta4 = $conexion4->query("Call Total_Gastos_Ganancia_Filtracion_Todo()");
$consulta6 = $conexion6->query("Call Total_Retiro_Socios_Ganancia_Filtracion_Todo()");
$consulta7 = $conexion7->query("Call Total_Pago_Creditos_Ganancia_Filtracion_Todo()");
$consulta9 = $conexion9->query("Call Total_Pago_Instalacion_Ganancia_Filtracion_Empr ('$texto')");
$consultax = $conexionx->query("Call Total_Credito_Filtracion_Todo ()");
$consultaxx = $conexionxx->query("Call Total_Compra_Filtracion_Todo ()");
$total_notaventa = 0;
$total_factura = 0;
$total_credito = 0;
$total_inst = 0;
$sumaf = 0;
$sumac = 0;
$total_gastos = 0;
$total_retirosocios = 0;
$total_pagocreditos = 0;
$total_credito2 = 0;
$total_compra = 0;
if ($consulta) {
    if($row = $consulta->fetch_assoc()){
        $total_notaventa = $row["Suma"];
    }
}
if ($consulta2) {
    if($row2 =  mysqli_fetch_array($consulta2)){
        $total_factura = $row2["Suma"];
    }
}
if ($consulta3) {
    if($row3 =  mysqli_fetch_array($consulta3)){
        $total_credito = $row3["Suma"];
    }
}
if ($consulta4) {
    if($row4 = $consulta4->fetch_assoc()){
        $total_gastos = $row4["Suma"];
    }
}
if ($consulta6) {
    if($row6 = $consulta6->fetch_assoc()){
        $total_retirosocios = $row6["Suma"];
    }
}
if ($consulta7) {
    if($row7 = $consulta7->fetch_assoc()){
        $total_pagocreditos = $row7["Suma"];
    }
}
if ($consulta9) {
    if($row9 = $consulta9->fetch_assoc()){
        $total_inst = $row9["Suma"];
    }
}
if ($consultax) {
    if($rowx = $consultax->fetch_assoc()){
        $total_credito2 = $rowx["Suma"];
    }
}
if ($consultaxx) {
    if($rowxx = $consultaxx->fetch_assoc()){
        $total_compra = $rowxx["Suma"];
    }
}
if ($total_notaventa == null or $total_notaventa == ""){
    $total_notaventa = 0;
}
if ($total_factura == null or $total_factura == ""){
    $total_factura = 0;
}
if ($total_credito == null or $total_credito == ""){
    $total_credito = 0;
}
if ($total_inst == null or $total_inst == ""){
    $total_inst = 0;
}
if ($total_gastos == null or $total_gastos == ""){
    $total_gastos = 0;
}
if ($total_retirosocios == null or $total_retirosocios == ""){
    $total_retirosocios = 0;
}
if ($total_pagocreditos == null or $total_pagocreditos == ""){
    $total_pagocreditos = 0;
}
if ($total_credito2 == null or $total_credito2 == ""){
    $total_credito2 = 0;
}
if ($total_compra == null or $total_compra == ""){
    $total_compra = 0;
}
$consulta->close();
$conexion->more_results();
$total = intval($total_notaventa) - intval($total_factura) + intval($total_credito) - intval($total_inst) - intval($total_compra) + intval($total_credito2) - intval($total_gastos) - intval($total_retirosocios) - intval($total_pagocreditos);
echo '<br></br>
    <br></br>
    <label><strong>Valor Ventas:&nbsp;&nbsp;</strong><input type="text" id="vventas" style="font-size: 1.1vw; padding:3px 3px 3px 10px" value="$ '.number_format($total_notaventa, 0, ',', '.').'" disabled></input></label>
    <p></p>
    <label><strong>Factura Compra:&nbsp;&nbsp;</strong><input type="text" id="fcompra" style="font-size: 1.1vw; padding:3px 3px 3px 10px" value="$ '.number_format($total_factura, 0, ',', '.').'" disabled></input></label>
    <p></p>
    <label><strong>Nota Crédito:&nbsp;&nbsp;</strong><input type="text" id="ncredito" style="font-size: 1.1vw; padding:3px 3px 3px 10px" value="$ '.number_format($total_credito, 0, ',', '.').'" disabled></input></label>
    <p></p>
    <label><strong>Instalación:&nbsp;&nbsp;</strong><input type="text" id="instalacion" style="font-size: 1.1vw; padding:3px 3px 3px 10px" value="$ '.number_format($total_inst, 0, ',', '.').'" disabled></input></label>
    <p></p>
    <label><strong>Compra NV:&nbsp;&nbsp;</strong><input type="text" id="compra" style="font-size: 1.1vw; padding:3px 3px 3px 10px" value="$ '.number_format($total_compra, 0, ',', '.').'" disabled></input></label>
    <p></p>
    <label><strong>Crédito NV:&nbsp;&nbsp;</strong><input type="text" id="credito" style="font-size: 1.1vw; padding:3px 3px 3px 10px" value="$ '.number_format($total_credito2, 0, ',', '.').'" disabled></input></label>
    <p></p>
    <label><strong>Gastos:&nbsp;&nbsp;</strong><input type="text" id="hgastos" style="font-size: 1.1vw; padding:3px 3px 3px 10px" value="$ '.number_format($total_gastos, 0, ',', '.').'" disabled></input></label>
    <p></p>
    <label><strong>Retiro Socios:&nbsp;&nbsp;</strong><input type="text" id="rsocios" style="font-size: 1.1vw; padding:3px 3px 3px 10px" value="$ '.number_format($total_retirosocios, 0, ',', '.').'" disabled></input></label>
    <p></p>
    <label><strong>Pago Creditos:&nbsp;&nbsp;</strong><input type="text" id="pcreditos" style="font-size: 1.1vw; padding:3px 3px 3px 10px" value="$ '.number_format($total_pagocreditos, 0, ',', '.').'" disabled></input></label>
    <p></p>
    <label><strong>Ganancias:&nbsp;&nbsp;</strong><input type="text" id="ganancias000" style="font-size: 1.1vw; padding:3px 3px 3px 10px" value="$ '.number_format($total, 0, ',', '.').'" disabled></input></label>
    <br></br>';
if($consulta5 = mysqli_query($conexion5,"Call Todo_Gastos_Ganancia_Filtracion_Todo")){
    echo "<label><strong>&nbsp;&nbsp;&nbsp;&nbsp;Gastos, Retiros Socios y Pago Créditos</strong></label><table id='tabla_cotizaciones' border='2px' align='center'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Detalle</th>
                    <th>Tipo</th>
                    <th>Fecha</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>";
    if ($consulta5) {
        while($row = mysqli_fetch_array($consulta5)){
            $fecha2 = date("d-m-Y",strtotime($row[3]));
            echo "<tr>
                    <td>".$row[0]."</td>
                    <td>".$row[1]."</td>
                    <td>".$row[2]."</td>
                    <td>".$fecha2."</td>
                    <td>$ ".number_format($row[4], 0, ',', '.')."</td>
            </tr>";
        }
    }
    echo "</tbody></table>";
    $consulta5->close();
    $conexion5->more_results();
};
if($consulta = mysqli_query($conexion8, "Call Buscar_Factura_Credito_Filtracion_Empr ('$texto')")){
    echo "<label><strong>&nbsp;&nbsp;&nbsp;&nbsp;Factura y Créditos</strong></label><table id='tabla_cotizacioness' border='2px' align='center'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>N° Factura / N° Crédito</th>
                    <th>Tipo</th>
                    <th>Nota Venta</th>
                    <th>Fecha</th>
                    <th>Valor</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>";
    if ($consulta) {
        while($row = mysqli_fetch_array($consulta)){
            $fecha2 = date("d-m-Y",strtotime($row[3]));
            echo "<tr>
                    <td>".$row[0]."</td>
                    <td>".$row[1]."</td>
                    <td>".$row[5]."</td>
                    <td>".$row[2]."</td>
                    <td>".$fecha2."</td>
                    <td>$ ".number_format($row[4], 0, ',', '.')."</td>
                    <td><button id='eliminar' data-tipo='".$row[5]."' data-id_eliminar='".$row[0]."'>Eliminar</button></td>
            </tr>";
        }
    }
    echo "</tbody></table>";
    $consulta->close();
    $conexion->more_results();
};
if($consulta111 = mysqli_query($conexion111, "Call Mostrar_NotaVenta_Sin_Facturas_Empr ('$texto')")){
    echo "<label><strong>&nbsp;&nbsp;&nbsp;&nbsp;Nota de Ventas SIN FACTURAS</strong></label><table id='tabla_notaventasinfactura' border='2px' align='center'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha Ingreso</th>
                    <th>Distribuidor</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>";
    if ($consulta111) {
        while($row111 = mysqli_fetch_array($consulta111)){
            $fecha2 = date("d-m-Y",strtotime($row111[1]));
            echo "<tr>
                    <td>".$row111[0]."</td>
                    <td>".$fecha2."</td>
                    <td>".$row111[2]."</td>
                    <td>".$row111[3]."</td>
            </tr>";
        }
    }
    echo "</tbody></table>";
    $consulta111->close();
    $conexion111->more_results();
};
?>
</body>
</html>
