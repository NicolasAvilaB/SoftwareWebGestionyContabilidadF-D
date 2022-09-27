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
    $('#tabla_clientes').DataTable();
    $('#nombre_add').on('input', function (e) {
        if (!/^[ a-z0-9áéíóúüñ]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^ a-z0-9áéíóúüñ]+/ig,"");
        }
    });
    $('#direccion_add').on('input', function (e) {
        if (!/^[ a-z0-9áéíóúüñ]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^ a-z0-9áéíóúüñ]+/ig,"");
        }
    });
    $('#telefono_add').on('input', function (e) {
        if (!/^[0-9]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^0-9]+/ig,"");
        }
    });
    $('#comuna_add').on('input', function (e) {
        if (!/^[ a-z0-9áéíóúüñ]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^ a-z0-9áéíóúüñ]+/ig,"");
        }
    });
});
</script>
</head>
<body>
<p></p>
<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}
if($consulta = $conexion->query("Call Mostrar_Todo_Clientes()")){
    echo 
        "<table id='tabla_clientes' border='2px' align='center'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Comuna</th>
                    <th>Fecha Ingreso</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
        ";
    if ($consulta) { 
        while($row = $consulta->fetch_assoc()){
            $id = $row["Id"];
            $fecha_cl = date("d-m-Y",strtotime($row["FechaIngreso"]));
            $conexion0 = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
            $consulta0 = $conexion0->query("Call Consultar_Cliente_Vendido('$id')");
            echo "
                <tr>
                    <td>".$row["Id"]."</td>";
                    if($row0 = $consulta0->fetch_assoc()){
                        $comparar_venta = $row0["Venta"];    
                        if ($comparar_venta == 1){
                            echo "<td id='nombre_cliente' data-id_usuario='".$row["Id"]."' style='background-color:green; color:white;' contenteditable>".$row["Nombre"]."</td>";  
                        }else if($comparar_venta == 0){
                            echo "<td id='nombre_cliente' data-id_usuario='".$row["Id"]."' contenteditable>".$row["Nombre"]."</td>";
                        }
                    }
                    echo "<td id='direccion_cliente' contenteditable>".$row["Direccion"]."</td>
                    <td id='telefono_cliente'  contenteditable>".$row["Telefono"]."</td>
                    <td id='email_cliente'  contenteditable>".$row["Email"]."</td>
                    <td id='comuna_cliente'  contenteditable>".$row["Comuna"]."</td>
                    <td id='fecha_cliente' >".$fecha_cl."</td>
                    <td><button id='modificar' class='modificar_cliente' data-id_modificar='".$row["Id"]."'>Modificar Cliente</td>
                    <td><button id='cotizar' class='cotizar_cliente' data-id_cotizar='".$row["Id"]."'>Cotizar</td>
                    <td><button id='eliminar' class='cotizar_cliente' data-id_eliminar='".$row["Id"]."'>Eliminar</td>
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
