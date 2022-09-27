<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
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
$texto2 = $_POST["texto2"];
$texto3 = $_POST["texto3"];
if($consulta = $conexion->query("Call Mostrar_Anticipo_Mes_Ano('$texto','$texto2','$texto3')")){
    echo "<table id='accion_anti'>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Valor</th>
                    <th>Detalle</th>
                    <th></th>
                    <th>OK</th>
                    <th></th>
                </tr>
            </thead>
        <tbody id='agregar_fila_tabla_anticipos'>";
        $suma_total = 0;
    if ($consulta) {
        while($row = $consulta->fetch_assoc()){
            $pag = $row["Pagado"];
            $est = $row["Estado"];
            echo "<tr>
                <td><input type='date' id='fecha_anticipos' name='fecha_anticipos' min='2005-01-01' max='2100-12-31' placeholder='Fecha Inicio...' size='40' maxlength='100' autocomplete='off' style='font-size: 1.25vw;width: 80%;' value='".$row["Fecha"]."'/></td>
                <td contentEditable>".$row["Valor"]."</td>
                <td contentEditable>".$row["Detalle"]."</td>
                <td><button id='quitar_fila_anticipos'>X</button></td>
                <td><select id='ant_pagado_sino' name='ant_pagado_sino'>";
                if ($pag == 'Si'){
                    echo "<option value=".$row["Id"]." selected>Si</option>
                          <option value=".$row["Id"].">No</option>";
                }else if ($pag == 'No'){
                    echo "<option value=".$row["Id"].">Si</option>
                          <option value=".$row["Id"]." selected>No</option>";
                }else{
                     echo "<option value='' selected disabled></option>
                          <option value='Si'>Si</option>
                          <option value='No'>No</option>";
                }echo "</select></td>";
                if ($est == '1'){
                    echo "<td><button id='quitar_pagado_ant' class='quitar_pagado_ant' data-id_modificar=".$row["Id"].">Quitar Pagado</button></td>";
                }elseif($est != '1'){
                    echo "<td></td>";
                }echo "</tr>";
            if ($pag == 'Si'){
                $suma_total+= $row["Valor"];
            }else{}
        }
    }
    echo "</tbody></table><script>$('#total_anticipos').val('".$suma_total."'); $('label#label_total_anticipos').css('display','block'); $('#guardar_anticipos').attr('data-tecnico','".$texto."');
    $('label#label_anticipos').css('display','block');
    $('#agregar_fila_anticipos').css('display','block');
    $('#guardar_anticipos').css('display','block');
    $('label#label_total_completo').css('display','block');
    </script>";
    $consulta->close();
    $conexion->more_results();
};
?>
</body>
</html>
