<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
<link rel="stylesheet"  href="../Imagenes/jquery.dataTables.min.css" type="text/css">
<script src="../Imagenes/jquery.dataTables.min.js"></script>
<script>
$(document).ready( function () {
    $('#tabla_todo_calendario_etiquetas').DataTable();
});
</script>
</head>
<body>
<?php
$conexion = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
$texto = $_REQUEST["texto"];
if($consulta = $conexion->query("call Buscar_Todo_Calendario_Etiquetas_Vendedora('$texto')")){
     echo "<div id='scrolltabla'><table id='tabla_todo_calendario_etiquetas' align='center' border='2px'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Técnico</th>
                    <th>Horario</th>
                    <th>Detalle</th>
                    <th>Cliente</th>
                    <th>Dirección</th>
                    <th>Comuna</th>
                    <th>Teléfono</th>
                    <th>Descripción Cliente</th>
                    <th>Observaciones Técnico</th>
                    <th></th>
                    <th>Pendientes</th>
                </tr>
            </thead>
            <tbody>
        ";
    if ($consulta) {
        while($row = $consulta->fetch_assoc()){
            $tarea = $row["Estado_Tarea"];
            $detalle = $row["Detalle"];
            if ($tarea == '1'){
                if ($detalle == 'Restificación'){
                    echo "<tr>
                        <td>".$row["id"]."</td>
                        <td>".$row["title"]."</td>
                        <td>".$row["start"]."</td>
                        <td>".$row["end"]."</td>
                        <td>".$row["Tecnico"]."</td>
                        <td>".$row["Horario"]."</td>
                        <td>".$detalle."</td>
                        <td>".$row["Nombre"]."</td>
                        <td>".$row["Direccion"]."</td>
                        <td>".$row["Comuna"]."</td>
                        <td>".$row["Telefono"]."</td>
                        <td>".$row["Observaciones"]."</td>
                        <td>".$row["Observacionet"]."</td>
                        <td><button id='revisar_restificacion' data-tipotarea='".$tarea."' data-idevento='".$row["id"]."' data-idcliente='".$row["IdCliente"]."' data-tecnico='".$row["Tecnico"]."' data-observaciones_tecnico='".$row["Observacionet"]."'>Revisar Rect.</button></td>
                        <td></td>
                    </tr>";
                }else{
                    echo "<tr>
                        <td>".$row["id"]."</td>
                        <td>".$row["title"]."</td>
                        <td>".$row["start"]."</td>
                        <td>".$row["end"]."</td>
                        <td>".$row["Tecnico"]."</td>
                        <td>".$row["Horario"]."</td>
                        <td>".$detalle."</td>
                        <td>".$row["Nombre"]."</td>
                        <td>".$row["Direccion"]."</td>
                        <td>".$row["Comuna"]."</td>
                        <td>".$row["Telefono"]."</td>
                        <td>".$row["Observaciones"]."</td>
                        <td>".$row["Observacionet"]."</td>
                        <td></td>
                        <td><button id='completar_tramite' data-idevento='".$row["id"]."'
                        data-titulo='".$row["title"]."'
                        data-fechastart='".$row["start"]."'
                        data-fechaend='".$row["end"]."'
                        data-tecnico='".$row["Tecnico"]."'
                        data-horario='".$row["Horario"]."'
                        data-nombre='".$row["Nombre"]."'
                        data-direccion='".$row["Direccion"]."'
                        data-comuna='".$row["Comuna"]."'
                        data-telefono='".$row["Telefono"]."'
                        data-descrcliente='".$row["Observaciones"]."'
                        data-observacionestecnico='".$row["Observacionet"]."'
                        data-tipo='".$detalle."'>Completar</button></td>
                    </tr>";
                }
            }/*elseif ($tarea == '2'){
                if ($detalle == 'Restificación'){
                    echo "<tr>
                        <td>".$row["id"]."</td>
                        <td>".$row["title"]."</td>
                        <td>".$row["start"]."</td>
                        <td>".$row["end"]."</td>
                        <td>".$row["Tecnico"]."</td>
                        <td>".$row["Horario"]."</td>
                        <td>".$detalle."</td>
                        <td>".$row["Nombre"]."</td>
                        <td>".$row["Direccion"]."</td>
                        <td>".$row["Comuna"]."</td>
                        <td>".$row["Telefono"]."</td>
                        <td>".$row["Observaciones"]."</td>
                        <td>".$row["Observacionet"]."</td>
                        <td><button id='revisar_restificacion' data-tipotarea='".$tarea."' data-idevento='".$row["id"]."' data-idcliente='".$row["IdCliente"]."' data-tecnico='".$row["Tecnico"]."' data-observaciones_tecnico='".$row["Observacionet"]."'>Revisar Rest.</button></td>
                        <td>Se ha completado la ".$detalle."</td>
                    </tr>";
                }else{
                    echo "<tr>
                        <td>".$row["id"]."</td>
                        <td>".$row["title"]."</td>
                        <td>".$row["start"]."</td>
                        <td>".$row["end"]."</td>
                        <td>".$row["Tecnico"]."</td>
                        <td>".$row["Horario"]."</td>
                        <td>".$detalle."</td>
                        <td>".$row["Nombre"]."</td>
                        <td>".$row["Direccion"]."</td>
                        <td>".$row["Comuna"]."</td>
                        <td>".$row["Telefono"]."</td>
                        <td>".$row["Observaciones"]."</td>
                        <td>".$row["Observacionet"]."</td>
                        <td></td>
                        <td>Se ha completado la ".$detalle."</td>
                    </tr>";
                }
            }elseif ($tarea == '0'){
                if ($detalle == 'Restificación'){
                    echo "<tr>
                        <td>".$row["id"]."</td>
                        <td>".$row["title"]."</td>
                        <td>".$row["start"]."</td>
                        <td>".$row["end"]."</td>
                        <td>".$row["Tecnico"]."</td>
                        <td>".$row["Horario"]."</td>
                        <td>".$detalle."</td>
                        <td>".$row["Nombre"]."</td>
                        <td>".$row["Direccion"]."</td>
                        <td>".$row["Comuna"]."</td>
                        <td>".$row["Telefono"]."</td>
                        <td>".$row["Observaciones"]."</td>
                        <td>".$row["Observacionet"]."</td>
                        <td>Falta Restificación</td>
                        <td>Aún no se ha confirmado</td>
                    </tr>";
                }else{
                    echo "<tr>
                        <td>".$row["id"]."</td>
                        <td>".$row["title"]."</td>
                        <td>".$row["start"]."</td>
                        <td>".$row["end"]."</td>
                        <td>".$row["Tecnico"]."</td>
                        <td>".$row["Horario"]."</td>
                        <td>".$detalle."</td>
                        <td>".$row["Nombre"]."</td>
                        <td>".$row["Direccion"]."</td>
                        <td>".$row["Comuna"]."</td>
                        <td>".$row["Telefono"]."</td>
                        <td>".$row["Observaciones"]."</td>
                        <td>".$row["Observacionet"]."</td>
                        <td>Falta ".$detalle."</td>
                        <td>Aún no se ha confirmado</td>
                    </tr>";
                }
            }*/
        }
    }
    echo "</tbody></table></div>";
    $consulta->close();
    $conexion->more_results();
};
?>
</body>
</html>
