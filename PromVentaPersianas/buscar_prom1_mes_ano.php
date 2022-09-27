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
$(document).ready( function () {
    $('#tabla_deuda').DataTable();
    $('#tabla_roller').DataTable();
    $('#tabla_repuesto').DataTable();
    $('#tabla_otro').DataTable();
});
</script>
</head>
<body>
<?php
$suma = 0;
$suma2 = 0;
$suma3 = 0;
$suma4 = 0;
$conexion = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}
$mes = $_POST["mes"]; 
$ano = $_POST["ano"]; 
if($consulta = $conexion->query("Call Prom_Venta1_Persianas_Mes_Ano('$mes','$ano')")){
     echo " <p>&nbsp;</p><div id='seccion_persianas'><p>&nbsp;</p><label style='font-weight:bold;'>&nbsp;&nbsp;&nbsp;Persianas</label>
            <table id='tabla_deuda' align='center'>
            <thead>
                <tr>
                    <th>Color</th>
                    <th>Cantidad</th>
                    <th>Total ($)</th>
                    <th>Detalle</th>
                </tr>
            </thead>
            <tbody>";
    if ($consulta) { 
        while($row = $consulta->fetch_assoc()){
            $suma += $row["Total"];
            echo "
                <tr>
                    <td>".$row["Color"]."</td>
                    <td>".$row["Cantidad"]."</td>
                    <td>$ ".number_format($row["Total"], 0, ',', '.')."</td>
                    <td><button id='ver_detalle_persianas_mes_ano' data-mes='".$mes."' data-ano='".$ano."' data-color='".$row["Id"]."'>Ver Detalle</button></td>
                </tr>
            ";
        }
    }
    echo "</tbody></table></div>";
    $consulta->close();
    $conexion->more_results();
};
$conexion2 = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion2,"utf8");
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}
$mes = $_POST["mes"]; 
$ano = $_POST["ano"];
if($consulta2 = $conexion2->query("Call Prom_Venta1_Rollers_Mes_Ano('$mes','$ano')")){
     echo " <div id='seccion_rollers'><p>&nbsp;</p><label style='font-weight:bold;'>&nbsp;&nbsp;&nbsp;Rollers</label>
            <table id='tabla_roller' align='center'>
            <thead>
                <tr>
                    <th>Roller</th>
                    <th>Cantidad</th>
                    <th>Total ($)</th>
                    <th>Detalle</th>
                </tr>
            </thead>
            <tbody>";
    if ($consulta2) { 
        while($row2 = $consulta2->fetch_assoc()){
            $suma2 += $row2["Total"];
            echo "<tr>
                    <td>".$row2["Roller"]."</td>
                    <td>".$row2["Cantidad"]."</td>
                    <td>$ ".number_format($row2["Total"], 0, ',', '.')."</td>
                    <td><button id='ver_detalle_rollers_mes_ano' data-mes='".$mes."' data-ano='".$ano."' data-color='".$row2["Id"]."'>Ver Detalle</button></td>
                </tr>";
        }
    }
    echo "</tbody></table></div>";
    $consulta2->close();
    $conexion2->more_results();
};
$conexion3 = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion3,"utf8");
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}
$mes = $_POST["mes"]; 
$ano = $_POST["ano"];
if($consulta3 = $conexion3->query("Call Prom_Venta1_Repuestos_Mes_Ano('$mes','$ano')")){
     echo " <div id='seccion_repuestos'><p>&nbsp;</p><label style='font-weight:bold;'>&nbsp;&nbsp;&nbsp;Repuestos</label>
            <table id='tabla_repuesto' align='center'>
            <thead>
                <tr>
                    <th>Repuestos</th>
                    <th>Cantidad</th>
                    <th>Total ($)</th>
                    <th>Detalle</th>
                </tr>
            </thead>
            <tbody>";
    if ($consulta3) { 
        while($row3 = $consulta3->fetch_assoc()){
            $suma3 += $row3["Total"];
            echo "
                <tr>
                    <td>".$row3["Repuestos"]."</td>
                    <td>".$row3["Cantidad"]."</td>
                    <td>$ ".number_format($row3["Total"], 0, ',', '.')."</td>
                    <td><button id='ver_detalle_repuestos_mes_ano' data-mes='".$mes."' data-ano='".$ano."' data-color='".$row3["Id"]."'>Ver Detalle</button></td>
                </tr>
            ";
        }
    }
    echo "</tbody></table></div>";
    $consulta3->close();
    $conexion3->more_results();
};
$conexion4 = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion4,"utf8");
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}
$mes = $_POST["mes"]; 
$ano = $_POST["ano"];
if($consulta4 = $conexion4->query("Call Prom_Venta1_Otross_Mes_Ano('$mes','$ano')")){
     echo " <div id='seccion_otros'><p>&nbsp;</p><label style='font-weight:bold;'>&nbsp;&nbsp;&nbsp;Otros</label>
            <table id='tabla_otro' align='center'>
            <thead>
                <tr>
                    <th>Otros</th>
                    <th>Cantidad</th>
                    <th>Total ($)</th>
                    <th>Detalle</th>
                </tr>
            </thead>
            <tbody>";
    if ($consulta4) { 
        while($row4 = $consulta4->fetch_assoc()){
            $suma4 += $row4["Total"];
            echo "
                <tr>
                    <td>".$row4["Otros"]."</td>
                    <td>".$row4["Cantidad"]."</td>
                    <td>$ ".number_format($row4["Total"], 0, ',', '.')."</td>
                    <td><button id='ver_detalle_otros_mes_ano' data-mes='".$mes."' data-ano='".$ano."' data-color='".$row4["Id"]."'>Ver Detalle</button></td>
                </tr>
            ";
        }
    }
    echo "</tbody></table></div>
    <div style='position: absolute; top: 42px; left: 11%; font-size: 1.1vw; border: 2px solid #555; border-radius:5px;'>
        <label>&nbsp;Total Persianas: <strong>$ ".number_format($suma, 0, ',', '.')."&nbsp;&nbsp;&nbsp;</strong></label>
        <label>|&nbsp;&nbsp;&nbsp;Total Rollers: <strong>$ ".number_format($suma2, 0, ',', '.')."&nbsp;&nbsp;&nbsp;</strong></label>
        <label>|&nbsp;&nbsp;&nbsp;Total Repuestos: <strong>$ ".number_format($suma3, 0, ',', '.')."&nbsp;&nbsp;&nbsp;</strong></label>
        <label>|&nbsp;&nbsp;&nbsp;Total Otros: <strong>$ ".number_format($suma4, 0, ',', '.')."&nbsp;&nbsp;</strong></label>
    </div>";
    $consulta4->close();
    $conexion4->more_results();
};
?>
</body>
</html>
