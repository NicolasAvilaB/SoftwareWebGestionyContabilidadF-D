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
if($consulta = $conexion->query("Call Mostrar_Anticipo_Mes_Actual('$texto')")){
  echo "<table id='accion_anti'>
          <thead>
              <tr>
                  <th>Fecha</th>
                  <th>Valor</th>
                  <th>Pagados</th>
              </tr>
          </thead>
      <tbody id='agregar_fila_tabla_anticipos'>";
      $suma_total = 0;
  if ($consulta) {
      while($row = $consulta->fetch_assoc()){
          $pag = $row["Pagado"];
          echo "<tr>
              <td><input type='date' id='fecha_anticipos' name='fecha_anticipos' min='2005-01-01' max='2100-12-31' placeholder='Fecha Inicio...' size='40' maxlength='100' autocomplete='off' style='font-size: 1.25vw;width: 80%;' value='".$row["Fecha"]."' disabled/></td>
              <td contentEditable>".$row["Valor"]."</td>
              <td>".$pag."</td>
          </tr>";
          if ($pag == "Si"){
              $suma_total += $row["Valor"];
          }else{}
      }
  }
  echo "</tbody></table><script>$('#total_anticipos').val('".$suma_total."'); $('label#label_total_anticipos').css('display','block'); $('#guardar_anticipos').attr('data-tecnico','".$texto."');
  $('label#label_anticipos').css('display','block');
  $('#agregar_fila_anticipos').css('display','block');
  $('#guardar_anticipos').css('display','block');</script>";
  $consulta->close();
  $conexion->more_results();
};
?>
</body>
</html>
