<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
<!--<link rel="stylesheet"  href="../Imagenes/jquery.dataTables.min.css" type="text/css">-->
<!--<script src="../Imagenes/jquery.dataTables.min.js"></script>-->
<script>

</script>
</head>
<body>
<p></p>
<?php
$conexion = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}
$texto = $_POST["texto"];
if($consulta = $conexion->query("Call Buscar_Clientes_Id_Calendario ('$texto')")){
        if($row = $consulta->fetch_assoc()){
            $nombre = $row["Nombre"];
            $direccion = $row["Direccion"];
            $comuna = $row["Comuna"];
            $telefono = $row["Telefono"];
            echo "<label><strong id='nombrecliente'>Nombre:&nbsp;&nbsp;</strong>
                <input type='text' id='nombre_cliente_modal' name='nombre_cliente_modal' placeholder='Nombre Cliente...' size='40' maxlength='150' autocomplete='off' value='$nombre' disabled />
            </label>
            <p>&nbsp;</p>
            <label><strong id='direccioncliente'>Dirección:&nbsp;&nbsp;</strong>
                <input type='text' id='direccion_modal' name='direccion_modal' placeholder='Dirección...' size='40' maxlength='300' autocomplete='off' value='$direccion' disabled />
            </label>
            <p>&nbsp;</p>
            <label><strong id='comunacliente'>Comuna:&nbsp;&nbsp;</strong>
                <input type='text' id='comuna_modal' name='comuna_modal' placeholder='Comuna...' size='40' maxlength='300' autocomplete='off' value='$comuna' disabled />
            </label>
            <p>&nbsp;</p>
            <label><strong id='telefonocliente'>Teléfono:&nbsp;&nbsp;</strong>
                <input type='text' id='telefono_modal' name='telefono_modal' placeholder='Teléfono...' size='40' maxlength='300' autocomplete='off' value='$telefono' disabled />
            </label>
            <p>&nbsp;</p>";
            
        }else{
            echo "<label> No se ha encontrado los Datos </label>
            <p>&nbsp;</p>";
        }
        $consulta->close();
        $conexion->more_results();
};
?>
</body>
</html>
