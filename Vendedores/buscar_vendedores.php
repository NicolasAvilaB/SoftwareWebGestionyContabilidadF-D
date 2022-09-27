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
$conexion2 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
$ejecutar2 = mysqli_query($conexion2,"Call Obtener_Empresas");
mysqli_set_charset($conexion2,"utf8");
$texto = $_POST["texto"];
if($consulta = $conexion->query("Call Buscar_Vendedores ('$texto')")){
    echo "<table id='accion3'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Clave</th>
                    <th>Empresa</th>
                    <th>Email</th>
                    <th>Color</th>
                    <th></th>
                </tr>
            </thead>
        <tbody id='agregar_fila'>
        ";
    if ($consulta) {
        while($row = $consulta->fetch_assoc()){
            $empresas_lista = $row["Empresa"];
            $color = $row["Color"];
            if ($empresas_lista == "Superusuario"){
            }elseif($empresas_lista != "Superusuario"){
                echo "<tr>
                        <td id='rut_vendedor' data-id_rut='".$row["Rut"]."'>".$row["Rut"]."</td>
                        <td id='nombre_vendedor' data-id_nombre='".$row["Rut"]."' contenteditable>".$row["Nombre"]."</td>
                        <td id='usuario_vendedor' data-id_usuario='".$row["Rut"]."' contenteditable>".$row["Usuario"]."</td>
                        <td id='clave_vendedor' data-id_clave='".$row["Rut"]."' contenteditable>".$row["Clave"]."</td>
                        <td id='empresa_vendedor' data-id_empresa='".$row["Rut"]."'>";
                            $conexion223 = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
                            mysqli_set_charset($conexion223,"utf8");
                            $ejecutar223 = mysqli_query($conexion223,"select NombreEmpresa from Empresas");
                            mysqli_set_charset($conexion223,"utf8");
                            echo "<select class='empresa_add' id='empresa_add' name='empresa_add'>
                            <option value='0' disabled selected>Seleccione Empresa...</option>";
                                while ($row223 = mysqli_fetch_array($ejecutar223)) {
                                    $valor_nombre_emp = $row223[0];
                                    if ($empresas_lista == $valor_nombre_emp){
                                        echo "<option value='$valor_nombre_emp' selected>".$valor_nombre_emp."</option>";
                                    }else if($empresas_lista != $valor_nombre_emp){
                                        echo "<option value='$valor_nombre_emp'>".$valor_nombre_emp."</option>";
                                    }
                                }
                            echo "</select>
                            <datalist id='lista_empresas'>";
                            while ($row2 = mysqli_fetch_array($ejecutar2)) {
                                echo "<option>".utf8_encode($row2[1])."</option>";
                            }
                            echo "</datalist></td>
                        <td id='email_vendedor' data-id_email='".$row["Rut"]."' contenteditable>".$row["Email"]."</td>
                        <td><input type='color' value='$color'/></td>
                        <td><button id='eliminar' data-id_eliminar='".$row["Rut"]."'>Eliminar</button></td>
                    </tr>
                ";
            }
        }
    }
    echo "</tbody></table>";
    $consulta->close();
    $conexion->more_results();
};
?>
</body>
</html>
