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
    $('#tabla_clientes2').DataTable();
});
</script>
</head>
<body>
<p></p>
<br></br>
<?php
$conexion = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}
$conexion2 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
mysqli_set_charset($conexion2,"utf8");
if($consulta = $conexion->query("Call Buscar_Historial_Abonos_Todo()")){
    echo "<table id='tabla_clientes2' border='2px'> 
            <thead>
                <tr>
                    <th style='display:none;'>Id</th>
                    <th>N° Nota Venta</th>
                    <th>Fecha Pago</th>
                    <th>Abono</th>
                    <th>Medio Pago</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
        <tbody id='agregar_fila_otro'>";
    if ($consulta) {
        $id0 = 0;
        $id_comp = 0;
        while($row = $consulta->fetch_assoc()){
            $id0 = $row["IdNotaVenta"];
            $mediopago = $row["MedioPago"];
            if($id0 == $id_comp){
                echo "<tr>
                <td style='display:none;'>".$row["Id"]."</td>
                <td>".$id0."</td>
                <td><input type='date' value='".$row["Fecha_Pago"]."'/></td>
                <td contenteditable>".$row["Valor_Abono"]."</td>
                <td>
                <input list='lista_medio' class='medio_add' id='medio_add' name='medio_add' type='text' style='text-align:center' placeholder='Busque Medio Pago...' size='30' maxlength='105' autocomplete='off' value='$mediopago'/>
                        <datalist id='lista_medio'>
                        <option>Efectivo</option>
                        <option>Tarjeta</option>
                        <option>Transferencia</option>
                        <option>Cheque</option>
                        </datalist>
                </td>
                <td></td>
                <td><button id='eliminar_pagina' class='cotizar_cliente' data-id_eliminar_pagina='".$row["Id"]."' data-notaventa='".$row["IdNotaVenta"]."' data-valor='".$row["Valor_Abono"]."'>Eliminar</button></tr>";
            }elseif($id0 != $id_comp){
                echo "<tr>
                <td style='display:none;'>".$row["Id"]."</td>
                <td>".$id0."</td>
                <td><input type='date' value='".$row["Fecha_Pago"]."'/></td>
                <td contenteditable>".$row["Valor_Abono"]."</td>
                <td>
                <input list='lista_medio' class='medio_add' id='medio_add' name='medio_add' type='text' style='text-align:center' placeholder='Busque Medio Pago...' size='30' maxlength='105' autocomplete='off' value='$mediopago'/>
                        <datalist id='lista_medio'>
                        <option>Efectivo</option>
                        <option>Tarjeta</option>
                        <option>Transferencia</option>
                        <option>Cheque</option>
                        </datalist>
                </td>
                <td>$ ".number_format($row["Total"], 0, ',', '.')."</td>
                <td><button id='eliminar_pagina' class='cotizar_cliente' data-id_eliminar_pagina='".$row["Id"]."' data-notaventa='".$row["IdNotaVenta"]."' data-valor='".$row["Valor_Abono"]."'>Eliminar</button></tr>";
            }
            $id_comp = $row["IdNotaVenta"];
        }
    }
    echo "</tbody></table>";
    $consulta->close();
    $conexion->more_results();
};
?>
</body>
</html>
