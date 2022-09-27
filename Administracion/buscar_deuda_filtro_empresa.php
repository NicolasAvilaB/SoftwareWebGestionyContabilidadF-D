<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<link href="menu_admin.css" rel="stylesheet" type="text/css">
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
<link rel="stylesheet"  href="../Imagenes/jquery.dataTables.min.css" type="text/css">
<script src="../Imagenes/jquery.dataTables.min.js"></script>
<script>
$(document).ready( function () {
    $('#tabla_deuda').DataTable();
});
</script>
</head>
<body>
<?php
$conexion = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion2 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
$conexion3 = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion4 = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
mysqli_set_charset($conexion4,"utf8");
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}
$texto = $_POST["texto"];
if($consulta = $conexion->query("Call Buscar_NotaVentas_Filtro_Deuda_Abonos('$texto')")){
     echo "<button id='actualizar_clientes' class='boton_actualizar_clientes_deuda'>Actualizar Clientes Deuda</button>
        <table id='tabla_deuda' align='center'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nota Venta</th>
                    <th>Nombre Cliente</th>
                    <th>Observaciones</th>
                    <th>Fecha Venta</th>
                    <th>Fabricación</th>
                    <th>Fecha Instalación Aprox</th>
                    <th>Efectuada</th>
                    <th>Medio de Pago</th>
                    <th>Medio de Pago</th>
                    <th>Medio de Pago</th>
                    <th>Deuda Cliente</th>
                    <th>Técnico</th>
                    <th>Rectificador</th>
                    <th>Distribuidor</th>
                    <th>Horario</th>
                    <th>Tipo</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
        ";
    if ($consulta) {
        while($row = $consulta->fetch_assoc()){
            $id_venta = $row["Id"];
            $resta2 = 0;
            $medi = "";
            $resta = intval($row["Total"]) - intval($row["Abono"]);
            $instalador_per = $row["Instalador"];
            $rectificador_per = $row["Rectificador"];
            $observaciones = $row["Observaciones"];
            $distribuidor = $row["Distribuidor"];
            $fecha2 = date("d-m-Y",strtotime($row["FechaIngreso"]));
            $consulta00 = $conexion3->query("select sum(Valor) as 'Valor' from Historial_Descuento_B_NotaVenta where IdNotaVenta = '$id_venta'");
            if(mysqli_num_rows($consulta00) > 0){
                if($row00 = $consulta00->fetch_assoc()){
                    $resta2 = $row00["Valor"];
                }
            }else{
                $resta2 = 0;
            }
            echo "<tr>
                    <td>".$row["IdCliente"]."</td>
                    <td>".$row["Id"]."</td>
                    <td>".$row["N_Cliente"]."</td>
                    <td contenteditable>".$observaciones."</td>
                    <td>".$fecha2."</td>
                    <td><input type='date' id='fabricacion' min='2005-01-01' max='2100-12-31' value=".date('Y-m-d', strtotime($row["Fecha_Fabricacion"]))."></input></td>
                    <td><input type='date' id='instalacion' min='2005-01-01' max='2100-12-31' value='".date('Y-m-d', strtotime($row["Fecha_Instalacion"]))."'></input>
                        <button id='agregar_fechas' type='button'>&nbsp;+&nbsp;</button>
                        <button id='quitar_fechas' type='button'>&nbsp;-&nbsp;</button>
                        <p id='contador' style='display:none;'>0</p></td>
                    <td><input type='date' id='instalada' min='2005-01-01' max='2100-12-31' value='".date('Y-m-d', strtotime($row["Fecha_Instalada"]))."'></input></td>
                    <td><input type='date' id='fecha_abono' min='2005-01-01' max='2100-12-31' value='0000-00-00'></input></td>
                    <td><input list='lista_medio' class='medio_add' id='medio_add' name='medio_add' type='text' style='text-align:center' placeholder='Busque Medio Pago...' size='30' maxlength='105' autocomplete='off'/>
                        <datalist id='lista_medio'>
                        <option>Efectivo</option>
                        <option>Tarjeta</option>
                        <option>Transferencia</option>
                        <option>Cheque</option>
                        </datalist></td>
                    <td contenteditable>0</td>
                    <td>$ ".number_format(intval($resta) - intval($resta2), 0, ',', '.')."</td>
                    <td><input list='lista_instalador' class='instalador_add' id='instalador_add' name='instalador_add' type='text' style='text-align:center' placeholder='Busque Instalador...' size='30' maxlength='105' autocomplete='off' value='".$instalador_per."'/>
                        <datalist id='lista_instalador'>";
                        $ejecutar2 = mysqli_query($conexion2,"select Instalador from Instaladores where Estado = 'Desactivar'");
                        mysqli_set_charset($conexion2,"utf8");
                        while ($row2 = mysqli_fetch_array($ejecutar2)) {
                            echo "<option>".$row2[0]."</option>";
                        }
                        echo "</datalist></td>
                    <td><input list='lista_rectificador' class='rectificador_add' id='rectificador_add' name='rectificador_add' type='text' style='text-align:center' placeholder='Busque Rectificador...' size='30' maxlength='105' autocomplete='off' value='".$rectificador_per."'/>
                        <datalist id='lista_rectificador'>";
                        $ejecutar2 = mysqli_query($conexion2,"select Rectificador from Rectificadores where Estado = 'Desactivar'");
                        mysqli_set_charset($conexion2,"utf8");
                        while ($row2 = mysqli_fetch_array($ejecutar2)) {
                            echo "<option>".$row2[0]."</option>";
                        }
                        echo "</datalist></td>
                    <td contenteditable>".$distribuidor."</td>
                    <td><select id='horario_bloquear' name='horario_bloquear'>";
                    if ($horbloq == "Mañana"){
                        echo "<option value='0' disabled>Seleccione Horario...</option>
                        <option value='Mañana' selected>Mañana</option>
                        <option value='Tarde'>Tarde</option>
                        <option value='Dia'>Dia</option>
                        <option value='Desocupar'>Desocupar</option>";
                    }else if ($horbloq == "Tarde"){
                        echo "<option value='0' disabled>Seleccione Horario...</option>
                        <option value='Mañana'>Mañana</option>
                        <option value='Tarde' selected>Tarde</option>
                        <option value='Dia'>Dia</option>
                        <option value='Desocupar'>Desocupar</option>";
                    }else if ($horbloq == "Dia"){
                        echo "<option value='0' disabled>Seleccione Horario...</option>
                        <option value='Mañana'>Mañana</option>
                        <option value='Tarde'>Tarde</option>
                        <option value='Dia'selected>Dia</option>
                        <option value='Desocupar'>Desocupar</option>";
                    }else if ($horbloq == "Desocupar"){
                        echo "<option value='0' disabled>Seleccione Horario...</option>
                        <option value='Mañana'>Mañana</option>
                        <option value='Tarde'>Tarde</option>
                        <option value='Dia'>Dia</option>
                        <option value='Desocupar' selected>Desocupar</option>";
                    }else{
                      echo "<option value='0' selected disabled>Seleccione Horario...</option>
                      <option value='Mañana'>Mañana</option>
                      <option value='Tarde'>Tarde</option>
                      <option value='Dia'>Dia</option>
                      <option value='Desocupar'>Desocupar</option>";
                    }
                    echo "</select></td>";
                    $conexion223 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
                    mysqli_set_charset($conexion223,"utf8");
                    $ejecutar223 = mysqli_query($conexion223,"select NombreOtros from Otros where Estado = 'Desactivar' and Apar_Inicio ='Si'");
                    mysqli_set_charset($conexion223,"utf8");
                    echo "<td><select class='tipo' id='tipo' name='tipo'>
                    <option value='0' disabled selected>Seleccione Tipo...</option>
                    <option value='Instalacion'>Instalación</option>";
                        while ($row223 = mysqli_fetch_array($ejecutar223)) {
                            $valor_nombre_emp = $row223[0];

                                echo "<option value='$valor_nombre_emp'>".$valor_nombre_emp."</option>";

                            //echo "<option value='$valor_nombre_emp'>".$valor_nombre_emp."</option>";
                        }
                    echo "</select><button id='agregar_tipo' type='button'>&nbsp;+&nbsp;</button>
                    <button id='quitar_tipo' type='button'>&nbsp;-&nbsp;</button>
                    <p id='contador_tipo' style='display:none;'>0</p>
                    <br></br>";
                    $dom = "";
                    $conexion5 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
                    mysqli_set_charset($conexion5,"utf8");
                    $ejecutar5 = mysqli_query($conexion5,"select Tipo from Pagos where NotaVenta = '$id_venta'");
                    mysqli_set_charset($conexion5,"utf8");
                    $conttipo = 0;
                    while ($row5 = mysqli_fetch_array($ejecutar5)) {
                        $conttipo += 1;
                        $valor_tipos = $row5[0];
                        $dom .= "<p></p><input list='lista_tipos' type='text' placeholder='Busque Tipo...' style='text-align:center;width:85%;' name='input_tipo_usado[]' className='inputti' autocomplete='off' data-tipo_input='".$valor_tipos."' value='".$valor_tipos."' id='inputtiu".$conttipo."'/><button id='$conttipo' class='boton_quitar' data-notaventa='".$row["Id"]."' data-tipo='".$valor_tipos."'>X</button>";
                    }
                    echo $dom."</td>
                    <td><button id='aplicar_abono' class='aplicar_abono' data-id_aplicar_abono='".$row["Id"]."'>Guardar</td>
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
