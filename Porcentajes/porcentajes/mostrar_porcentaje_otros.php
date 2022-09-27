<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
$conexion2 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
mysqli_set_charset($conexion,"utf8");
mysqli_set_charset($conexion2,"utf8");
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}
if($consulta_porc_otros = $conexion->query("Call Mostrar_Porc_Otros")){
    echo "<button id='aplicar_porc2'>Guardar</button><label class='titulo_tabla_porcentaje'>Otros</label>
            <table id='accion5'> 
            <thead>
                <tr>
                    <th>Otros</th>
                    <th>Descuento Proveedor 1 (%)</th>
                    <th>Descuento Proveedor 2 (%)</th>
                    <th>(%) de Descuento</th>
                    <!--<th>Descuento Venta 2 (%)</th>-->
                    <th>Ganancia (%)</th>
                </tr>
            </thead>
            <tbody>";
    if ($consulta_porc_otros) {
        while($row = $consulta_porc_otros->fetch_assoc()){
            $nom_producto = $row["NombreOtros"];
            $ejecutar2 = mysqli_query($conexion2,"select Producto, Desc_Prov_1, Desc_Prov_2, Desc_Venta_1, Desc_Venta_2, Ganancia from Descuento where Producto = '$nom_producto'");
            if (mysqli_num_rows($ejecutar2) == 0){
                echo "<tr>
                    <td>".$nom_producto."</td>
                    <td contenteditable>0</td>
                    <td contenteditable>0</td>
                    <td contenteditable>0</td>
                    <!--<td contenteditable>0</td>-->
                    <td contenteditable>35</td>
                </tr>";
            }else{
                while ($row2 = mysqli_fetch_array($ejecutar2)) {
                    echo "<tr>
                        <td>".$row2[0]."</td>
                        <td contenteditable>".$row2[1]."</td>
                        <td contenteditable>".$row2[2]."</td>
                        <td contenteditable>".$row2[3]."</td>
                        <td contenteditable>".$row2[5]."</td>
                    </tr>";
                }
            }
        }
    }
    echo "</tbody></table>";
    $consulta_porc_otros->close();
    $conexion->more_results();
};
?>
