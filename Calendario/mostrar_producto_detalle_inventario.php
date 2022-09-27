<html>
<head>
<link rel="stylesheet"  href="../Imagenes/jquery.dataTables.min.css" type="text/css">
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
<script src="../Imagenes/jquery.dataTables.min.js"></script>
<script src="https://www.w3schools.com/lib/w3.js"></script>
<script>
$(document).ready( function () {
    $('.tabla_detalle_producto').DataTable({
      "dom": 'lrtip',
      "order": [[ 1, "desc" ]]
    });
});
</script>
</head>
<?php
		$conexion111 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
		mysqli_set_charset($conexion111,"utf8");
		if(mysqli_connect_errno()){
				echo mysqli_connect_error();
		}
    $texto = $_POST["texto"];
		$consulta111 = mysqli_query($conexion111, "Call Mostrar_Producto_Detalle_Inventario_2 ('$texto')") or die (mysqli_error($conexion111));
		$botones = "";
    $resta = 0;
		while($row111 = mysqli_fetch_array($consulta111)){
				$botones .= "<label><strong>".$row111[0]."</strong></label>
        <table class='tabla_detalle_producto' border='1px'>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Nota Venta</th>
                    <th>Factura</th>
                    <th>Entrada</th>
                    <th>Salida</th>
                </tr>
            </thead>
            <tbody>";
            $conexion222 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
            $consulta222 = mysqli_query($conexion222, "select Fecha, Factura, Producto, Cantidad from Facturas_Inventario where Producto = '$row111[0]' and Tecnico = '$texto' ORDER BY Fecha DESC ") or die (mysqli_error($conexion222));
            $suma = 0;
            while($row222 = mysqli_fetch_array($consulta222)){
                $suma += $row222[3];
                $botones .= "<tr>
                  <td><input type='date' min='2005-01-01' max='2100-12-31' style='font-size:1.2vw;width:125px;' value='$row222[0]' disabled/></td>
                  <td></td>
                  <td>".$row222[1]."</td>
                  <td>".$row222[3]."</td>
                  <td></td>
                </tr>";
            }
            $conexion2225 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
            $consulta2225 = mysqli_query($conexion2225, "select Fecha, Detalle, Producto, Cantidad from Facturas_Retiros_Ingreso_Inventario where Producto = '$row111[0]' and Tecnico_Ingreso = '$texto' and TipoIngreso = 'Tecnico' ORDER BY Fecha DESC ") or die (mysqli_error($conexion2225));
            while($row2225 = mysqli_fetch_array($consulta2225)){
                $suma += $row2225[3];
                $botones .= "<tr>
                  <td><input type='date' min='2005-01-01' max='2100-12-31' style='font-size:1.2vw;width:125px;' value='$row2225[0]' disabled/></td>
                  <td>".$row2225[1]."</td>
                  <td></td>
                  <td>".$row2225[3]."</td>
                  <td></td>
                </tr>";
            }
            $conexion333 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
            $consulta333 = mysqli_query($conexion333, "Call Mostrar_Cantidad_Salida_Detalle_Inventario('$texto','$row111[0]')") or die (mysqli_error($conexion333));
            while($row333 = mysqli_fetch_array($consulta333)){
              $suma -= $row333[2];
              $botones .= "<tr>
                <td><input type='date' min='2005-01-01' max='2100-12-31' style='font-size:1.2vw;width:125px;' value='$row333[0]' disabled/></td>
                <td>".$row333[1]."</td>
                <td></td>
                <td></td>
                <td>".$row333[2]."</td>
              </tr>";

            }
            $conexion3338 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
            $consulta3338 = mysqli_query($conexion3338, "Call Mostrar_Cantidad_Salida_Detalle_Retiro_Inventario('$texto','$row111[0]')") or die (mysqli_error($conexion3338));
            while($row3338 = mysqli_fetch_array($consulta3338)){
              $suma -= $row3338[4];
              $botones .= "<tr>
                <td><input type='date' min='2005-01-01' max='2100-12-31' style='font-size:1.2vw;width:125px;' value='$row3338[0]' disabled/></td>
                <td>".$row3338[1]."</td>
                <td></td>
                <td></td>
                <td>".$row3338[4]."</td>
              </tr>";

            }
            $botones .= "<label style='margin-left:150px;'><strong>Saldo: </strong>".$suma."</label></tbody></table>
        <p>&nbsp;</p>";
		}
		echo "<div>".$botones."</div>";
		$consulta111->close();
		$conexion111->more_results();
?>
</html>
