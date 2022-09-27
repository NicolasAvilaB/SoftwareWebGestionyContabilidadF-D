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
    $('#tabla_descripcioninstalacion').DataTable();
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
if($consulta = mysqli_query($conexion, "Call Consultar_FechaInstalacion_Inicio_Calendario_ResumenDia_Vendedor ('$texto','$texto2')") or die (mysqli_error($conexion))){
    echo "<div id='scroll3'><table id='tabla_descripcioninstalacion' border='1px' style='width:99%;' align='center'>
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>";
    if ($consulta) {
        $id_comp = 0;
        while($row = mysqli_fetch_array($consulta)){
            $id0 = $row[0];
            $tipo = $row[7];
            if($id0 == $id_comp){
                echo "<tr>
                    <td>".$row[8].' / '.$row[1].' / '.$row[10].' - '.$row[9].' / '.$row[6]."</td>
                    <td></td>
                </tr>";
            }elseif($id0 != $id_comp){
                if ($tipo == 'Visita Técnica' || $tipo == 'Restificación' || $tipo == 'Reparación'){
                    /*echo "<tr>
                        <td>".$row[8].' / '.$row[1].' / '.$row[10].' - '.$row[9].' / '.$row[6]."</td>
                        <td></td>
                    </tr>";*/
                }else{
                    echo "<tr>
                        <td>".$row[8].' / '.$row[1].' / '.$row[10].' - '.$row[9].' / '.$row[6]."</td>
                        <td><button id='dato_pincha_inst' data-id_notaventa='".$row[0]."' data-observaciones_cliente='".$row[12]."' data-tarea='".$row[14]."' data-observaciones_tecnico='".$row[15]."'>Ingresar</button></td>
                    </tr>";
                }
            }
            $id_comp = $row[0];
        }
    }
    echo "</tbody></table></div>";
    $consulta->close();
    $conexion->more_results();
};
?>
</body>
</html>
