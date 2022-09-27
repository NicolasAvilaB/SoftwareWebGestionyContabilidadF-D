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
if($consulta = $conexion->query("Call Mostrar_Filtro_Pagos_Admin_Mes_Ano('$texto','$texto2','$texto3')")){
    echo "<table id='accion4'>
            <thead>
                <tr>
                    <th>Fecha Efectuada</th>
                    <th>Nota Venta</th>
                    <th>Cliente</th>
                    <th>Tipo</th>
                    <th>Cantidad</th>
                    <th>Valor Unit.</th>
                    <th>Valor Total </th>
                    <th></th>
                    <th>OK</th>
                    <th>N° B. D.</th>
                    <th>Desc. Bono</th>
                </tr>
            </thead>
        <tbody id='agregar_fila_otro'>";
        $suma_total = 0;
    if ($consulta) {
        while($row = $consulta->fetch_assoc()){
          $est_bono = $row["Estado_Bono"];
          $bonodescs = $row["Bono_Desc"];
            $fecha = $row["Fecha"];
            $numnotaventa = $row["NotaVenta"];
            $tip = $row["Tipo"];
            $fecha_pag = $row["Fecha_Pagado"];
            $pag = $row["Pagado"];
            $cantidad = 0;
            $valor = 0;
            $valor_unit_inst = 0;
            if ($tip == 'Rectificación' || $tip == 'Rectificación con Bono Diario'){
                $numnotaventa = 0;
            }
            echo "<tr>
                <td><input type='date' min='2005-01-01' max='2100-12-31' style='font-size: 1.25vw; width:80%;text-align:center;' value=".$row["Fecha"]." disabled/></td>
                <td>".$numnotaventa."</td>
                <td>".utf8_decode($row["Cliente"])."</td>
                <td>".$row["Tipo"]."</td>";
                $conexion2222 = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
                $conexion3333 = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
                $conexion4444 = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
                if ($tip == 'Instalacion'){
                    $consulta2222 = $conexion2222->query("Call Mostrar_Cantidad_Pagos_Tipo_Tecnico_Instalacion('$numnotaventa')");
                    if($row2222 = $consulta2222->fetch_assoc()){
                        $cantidad = $row2222["Cantidad"];
                    };
                    $consulta3333 = $conexion3333->query("Call Mostrar_Precio_Pagos_Tipo_Tecnico_Instalacion('$numnotaventa')");
                    if($row3333 = $consulta3333->fetch_assoc()){
                        $valor = $row3333["Valor"];
                        $valor_unit_inst = $row3333["ValorUnitario"];
                    };
                }elseif($tip == 'Rectificación con Bono Diario'){
                    $consulta4444 = $conexion4444->query("Call Mostrar_Precio_Pagos_Tipo_Tecnico_Rectificacion_Bono('$texto')");
                    if($row4444 = $consulta4444->fetch_assoc()){
                        $valor = $row4444["Valor"];
                    };
                    $cantidad = 1;
                }elseif($tip == 'Rectificación'){
                    $consulta4444 = $conexion4444->query("Call Mostrar_Precio_Pagos_Tipo_Tecnico_Rectificacion('$texto')");
                    if($row4444 = $consulta4444->fetch_assoc()){
                        $valor = $row4444["Valor"];
                    };
                    $cantidad = 1;
                }else{
                  $tipoo = utf8_decode($tip);
                    $consulta2222 = $conexion2222->query("Call Mostrar_Cantidad_Pagos_Tipo_Tecnico('$numnotaventa','$tipoo')");
                    if($row2222 = $consulta2222->fetch_assoc()){
                        $cantidad = $row2222["Cantidad"];
                    };
                    $consulta3333 = $conexion3333->query("Call Mostrar_Precio_Pagos_Tipo_Tecnico('$tipoo')");
                    if($row3333 = $consulta3333->fetch_assoc()){
                        $valor = $row3333["Valor"];
                    };
                }
                echo "<td>".$cantidad."</td>";
                if ($tip == 'Instalacion'){
                    if ($est_bono == 'bono'){
                      echo "<td contentEditable>".intval($valor_unit_inst + $bonodescs)."</td>";
                    }elseif ($est_bono == 'descuento'){
                      echo "<td contentEditable>".intval($valor_unit_inst - $bonodescs)."</td>";
                    }else{
                      echo "<td contentEditable>".$valor_unit_inst."</td>";
                    }
                }else{
                    if ($est_bono == 'bono'){
                        echo "<td contentEditable>".$valor = intval($valor + $bonodescs)."</td>";
                    }elseif ($est_bono == 'descuento'){
                        echo "<td contentEditable>".$valor = intval($valor - $bonodescs)."</td>";
                    }else{
                        echo "<td contentEditable>".$valor."</td>";
                    }
                }
                if ($tip == 'Instalacion' || $tip == 'Rectificación' || $tip == 'Rectificación con Bono Diario'){
                    echo "<td contentEditable>".$valor."</td>";
                }else{
                    echo "<td contentEditable>".intval($valor * $cantidad)."</td>";
                }
                echo "<td><button id='eliminar_pago' class='eliminar_pago' data-id_pago='".$row["Id"]."' data-tecnico='".$texto."'>Eliminar</button></td>
                <td><select id='pagado_sino' name='pagado_sino'>";
                if ($pag == 'Si'){
                    echo "<option value=".$row["Id"]." selected>Si</option>
                          <option value=".$row["Id"].">No</option>";
                }else if ($pag == 'No'){
                    echo "<option value=".$row["Id"].">Si</option>
                          <option value=".$row["Id"]." selected>No</option>";
                }else{
                     echo "<option value='' selected disabled></option>
                          <option value=".$row["Id"].">Si</option>
                          <option value=".$row["Id"].">No</option>";
                }echo "</select></td>  <td contentEditable>".$bonodescs."</td>
                  <td><button id='bono_descuento' data-id_pagos='".$row["Id"]."'>Bono Desc.</button></td></tr>";
            if ($tip == 'Instalacion' || $tip == 'Rectificación' || $tip == 'Rectificación con Bono Diario'){
                if ($pag == 'Si'){
                    $suma_total += $valor;
                }else{}
            }else{
                if ($pag == 'Si'){
                    $suma_total += intval($valor * $cantidad);
                }else{}
            }
        }
    }
    echo "</tbody></table><script>$('#sueldo_total').val('".$suma_total."'); $('label#label_total').css('display','block');</script>";
    $consulta->close();
    $conexion->more_results();
};
?>
</body>
</html>
