<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<link href="clientes.css" rel="stylesheet" type="text/css">
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
</head>
<body>
<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}
$texto = $_POST["texto"];
if($consulta = $conexion->query("Call Buscar_Rectificacion_Tecnico_Producto ('$texto')")){
    echo "<table id='accion_rectificacion_tecnico'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Instalador</th>
                    <th>Valor Unitario</th>
                    <th>Bono Diario</th>
                    <th></th>
                </tr>
            </thead>
        <tbody id='agregar_fila_rectificacion_tecnico'>";
    if ($consulta) {
        while($row = $consulta->fetch_assoc()){
            $nombre_tec = $row["Instalador"];
            echo "<tr>
                    <td>".$row["Id"]."</td>
	                   <td>";
                        $conexion223 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
                        mysqli_set_charset($conexion223,"utf8");
                        $ejecutar223 = mysqli_query($conexion223,"select Rectificador from Rectificadores");
                        mysqli_set_charset($conexion223,"utf8");
                        echo "<select id='nombre_tecnico' name='nombre_tecnico'>
                        <option value='0' disabled selected>Seleccione Técnico...</option>";
                            while ($row223 = mysqli_fetch_array($ejecutar223)) {
                                $valor_nombre_tec = $row223[0];
                                if ($nombre_tec == $valor_nombre_tec){
                                    echo "<option value='$valor_nombre_tec' selected>".$valor_nombre_tec."</option>";
                                }else if($nombre_tec != $valor_nombre_tec){
                                    echo "<option value='$valor_nombre_tec'>".$valor_nombre_tec."</option>";
                                }
                            }
                        echo "</select></td>
            		    <td contenteditable>".$row["ValorUnit"]."</td>
            		    <td contenteditable>".$row["BonoDiario"]."</td>
                    <td><button id='eliminar_tecnico_rect' data-id_eliminar_tec_rectificador='".$row["Id"]."'>Eliminar</td>
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
