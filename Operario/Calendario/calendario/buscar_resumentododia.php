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
    $('#tabla_resumendia').DataTable();
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
    echo "<div id='scroll2'><table id='tabla_resumendia' border='1px' style='width:99%;' align='center'>
            <thead>
                <tr>
                    <th>Horario</th>
                    <th>Tipo</th>
                    <th>N° Orden</th>
                    <th>Cliente</th>
                    <th>Direccion</th>
                    <th>Comuna</th>
                    <th>Teléfono</th>
                    <th>Descripción</th>
                    <th>Técnico</th>
                    <th>Observ. Cl</th>
                    <th>Observ. Téc</th>
                    <th>Vendedora</th>
                    <th style='display:none;'></th>
                    <th style='display:none;'></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>";
            $suma = 0;
    if ($consulta) {
        while($row = mysqli_fetch_array($consulta)){
            if ($row[0] == null || $row[0] == ''){
            }else{
                $tipo_dato = $row[7];
                if ($tipo_dato == 'Instalación'){
                    $fecha2 = date("d-m-Y",strtotime($row[2]));
                    $conexion2 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
                    $consulta2 = mysqli_query($conexion2, "Call Mostrar_Todo_Tipo_NotaVenta_Calendario('$row[0]')") or die (mysqli_error($conexion2));
                    while($row2 = mysqli_fetch_array($consulta2)){
                        $tipo_dato .= ", " .$row2[0];
                    }
                    echo "<tr>
                          <td>".$row[17]."</td>
                          <td>".$tipo_dato."</td>
                          <td>".$row[0]."</td>
                          <td>".$row[8]."</td>
                          <td>".$row[9]."</td>
                          <td>".$row[10]."</td>
                          <td>".$row[11]."</td>
                          <td>".$row[1]."</td>
                          <td>".$row[4]."</td>
                          <td>".$row[12]."</td>
                          <td>".$row[15]."</td>
                          <td>".$row[16]."</td>
                          <td style='display:none;'>".$row[13]."</td>
                          <td style='display:none;'>".$row[14]."</td>
                          <td><button id='dato_pincha_inst_modal' data-id_notaventa='".$row[0]."' data-observaciones_cliente='".$row[12]."' data-tarea='".$row[14]."' data-observaciones_tecnico='".$row[15]."'>Ingresar</button></td>
                    </tr>";
                    //<button id='ver_datos'>Ver</button>
                    $suma += intval($row[3]);
                }else if($tipo_dato != 'Instalación'){
                    $fecha2 = date("d-m-Y",strtotime($row[2]));
                    echo "<tr>
                          <td>".$row[17]."</td>
                          <td>".$row[7]."</td>
                          <td style='visibility:hidden'>".$row[0]."</td>
                          <td>".$row[8]."</td>
                          <td>".$row[9]."</td>
                          <td>".$row[10]."</td>
                          <td>".$row[11]."</td>
                          <td>".$row[1]."</td>
                          <td>".$row[4]."</td>
                          <td>".$row[12]."</td>
                          <td>".$row[15]."</td>
                          <td>".$row[16]."</td>
                          <td style='display:none;'>".$row[13]."</td>
                          <td style='display:none;'>".$row[14]."</td>
                          <td><button id='ver_datos'>Ver</button></td>
                    </tr>";
                    $suma += intval($row[3]);
                }
            }
        }
    }
    echo "</tbody></table></div>";
    $consulta->close();
    $conexion->more_results();
};
?>
</body>
</html>
