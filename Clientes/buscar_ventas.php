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
<div class="grid-container">
    <!--<input type="text" class="grid-item" id="nombre_add" name="nombre_add" placeholder="Nombre Cliente..." size="30" maxlength="70" autocomplete="off"/>
    <input type="text" class="grid-item" id="direccion_add" name="direccion_add" placeholder="Direccion..." size="30" maxlength="70" autocomplete="off"/>
    <input type="text" class="grid-item" id="telefono_add" name="telefono_add" placeholder="Teléfono..." size="30" maxlength="70" autocomplete="off"/>
    <input type="text" class="grid-item" id="email_add" name="email_add" placeholder="Email..." size="30" maxlength="70" autocomplete="off"/>
    <input type="text" class="grid-item" id="comuna_add" name="comuna_add" placeholder="Comuna..." size="30" maxlength="70" autocomplete="off"/>
    <input type="date" class="grid-item" id="fecha_add" name="fecha_add" placeholder="Fecha Cliente..." size="30" maxlength="70" autocomplete="off"/>
    <button class="boton_ingresar" id='add'>Ingresar</button><button id="boton_guardar_modificacion" class="boton_modificar" id='add'>Guardar</button>-->
</div>
    <label id="id_cliente" style="visibility: hidden;"></label>

<p></p>
<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}
$texto = $_POST["texto"];
$id_empresa= $_POST["id_empresa"];
if($consulta = $conexion->query("Call Buscar_NotaVenta_Vendedoras ('$texto%','$id_empresa')")){
    echo 
        "<table id='tabla_cotizaciones' border='2px' align='center'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Empresa</th>
                    <th>Fecha Ingreso</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
        ";
    if ($consulta) {
        while($row = $consulta->fetch_assoc()){
            $id = $row["Id"];
            $idc = $row["IdCliente"];
                echo "
                    <tr>
                        <td>".$row["Id"]."</td>
                        <td>".$row["N_Cliente"]."</td>
                        <td>".$row["Empresa"]."</td>
                        <td>".$row["FechaIngreso"]."</td>
                        <td>".$row["Total"]."</td>
                        <td><a href='generar_notaventapdf.php?id=".$id."&idc=".$idc."' type='button' value='View PDF' class='btn btn-primary' target='_blank'>Ver</td>
                    </tr>
                ";
        }
    }
    echo "</tbody></table>";
    
    $consulta->close();
    $conexion->more_results();
};

?>

</body>
</html>
