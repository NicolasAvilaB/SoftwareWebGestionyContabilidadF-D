<?php
header("Content-Type: text/html;charset=utf-8");
$conn = new mysqli("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$lama = $_POST["lama"];
$ancho = $_POST["ancho"];
$alto = $_POST["alto"];
$texto = $_POST["texto"];
$ancho = str_replace('.', '', $ancho);
$alto = str_replace('.', '', $alto);
$texto = str_replace('.', '', $texto);
$ancho = str_replace(',', '', $ancho);
$alto = str_replace(',', '', $alto);
$texto = str_replace(',', '', $texto);
if ($texto == 0 || $texto == "" || $ancho == 0 || $ancho == ""){
}else{
    $consulta = "Call Ingresar_Lama ('$lama','$ancho','$alto','$texto')";
    if ($conn->query($consulta) === TRUE) {
    } else {
    }
$conn->close();
}
?>
