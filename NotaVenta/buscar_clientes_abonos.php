<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
if(!$conexion){
    echo "No se ha podido conectar" . mysqli_error();
    exit();
}
$id_cliente = $_POST["id_cliente"];
$consulta = mysqli_query($conexion,"Call Buscar_Clientes_Abonos ('$id_cliente')");
if(!$consulta){
    echo "Error al cargar los datos ". mysqli_error();
}else{
    if($row = mysqli_fetch_array($consulta)){
        echo "<label id='id_l' for='id'>ID: </label>
            <label id='id'>".$id_cliente."</label>
        <p></p>
            <label id='nombre_l' for='nombre'>Nombre: </label>
            <label id='nombre'>".$row[0]."</label>
        <p></p>
            <label id='direccion_l' for='direccion'>Dirección: </label>
            <label id='direccion'>".$row[1]."</label>
        <p></p>
            <label id='telefono_l' for='telefono'>Teléfono: </label>
            <label id='telefono'>".$row[2]."</label>
        <p></p>
            <label id='comuna_l' for='comuna'>Comuna: </label>
            <label id='comuna'>".$row[3]."</label>
        <p></p>
            <label id='correo_l' for='correo'>Correo: </label>
            <label id='correo'>".$row[4]."</label>";
    }
}
?>
