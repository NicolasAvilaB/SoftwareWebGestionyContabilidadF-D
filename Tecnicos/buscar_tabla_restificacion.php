<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<script src="../Imagenes/jquery-3.6.0.min.js"></script>
</head>
<body>
<p></p>
<?php
header("Content-Type: text/html;charset=utf-8");
$texto = $_POST["texto"];
echo "<table id='tabla_medidas_restificacion' align='center'>
        <thead>
        <tr>
            <th>N°</th>
            <th>Ubicación</th>
            <th>Piso</th>
            <th>F/C</th>
            <th>Ancho</th>
            <th>Alto</th>
            <th>Color</th>
            <th>Lama</th>
            <th>Accionamiento</th>
            <th>T/Click</th>
            <th style='display:none'>C/Rto</th>
            <th>Cajón</th>
            <th>Guía</th>
            <th>Ventana</th>
            <th>Perfiles</th>
            <th>Escala Telec.</th>
        </tr>
        </thead>
        <tbody>";
        $conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
        mysqli_set_charset($conexion,"utf8");
        if(!$conexion){
            echo "No se ha podido conectar" . mysqli_error();
            exit();
        }
        $consulta = mysqli_query($conexion,"Call Buscar_Datos_Restificacion_Calendario('$texto')");
        if(!$consulta){
            echo "Error al insertar los datos ". mysqli_error();
        }else{
            if (mysqli_num_rows($consulta) == 0){
                echo "<tr>
                    <td>1</td>
                    <td contenteditable></td>
                    <td contenteditable></td>
                    <td><select id='fc_add' name='fc_add'>
                        <option value='F' selected>F</option>
                        <option value='C'>C</option>
                    </select></td>
                    <td contenteditable></td>
                    <td contenteditable></td>
		    <td><select class='color_add' id='color_add'>
                        <option value='' disabled selected></option>";
                        $conexionxx = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
                        mysqli_set_charset($conexionxx,"utf8");
                        $ejecutarxx = mysqli_query($conexionxx,"Call Listar_Color()");

                        while ($rowxx = mysqli_fetch_array($ejecutarxx)) {
                            echo "<option value='".$rowxx[0]."'>".$rowxx[0]."</option>";
                        }
                        echo "<option value='Cliente Decida'>Cliente Decida</option>";
                        mysqli_close($conexionxx);
                    echo "</select></td>
		    <td><select class='lama_add' id='lama_add'>
                        <option value='' disabled selected></option>";
                        $conexionx = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ('Error');
                        mysqli_set_charset($conexionx,'utf8');
                        $ejecutarx = mysqli_query($conexionx,'Call Consulta_Lama_Habilitados()');

                        while ($rowx = mysqli_fetch_array($ejecutarx)) {
                            echo "<option value='".$rowx[0]."'>".$rowx[0]."</option>";
                        }
                        mysqli_close($conexionx);
                    echo "</select></td>
                    <td><select id='motor' name='motor'>
                        <option value='' selected ></option>
                        <option value='Motor'>Motor</option>
                        <option value='Manual'>Manual</option>
                        <option value='Pulsador'>Pulsador</option>
                        <option value='Control Remoto'>Control Remoto</option>
                        <option value='Muelle Chapa'>Muelle Chapa</option>
                        <option value='Manual Chapa'>Manual Chapa</option>
                        <option value='Falso'>Falso</option>
                        <option value='Paño Fijo'>Paño Fijo</option>
                    </select></td>
                    <td><select id='tclicka' name='tclicka'>
                        <option value='' selected disabled></option>
                        <option value='Si'>Si</option>
                        <option value='No'>No</option>
                    </select></td>
                    <td style='display:none'><select id='crtos' name='crtos'>
                        <option value='' selected disabled></option>
                        <option value='Si'>Si</option>
                        <option value='No'>No</option>
                    </select></td>
                    <td><select id='cajon' name='cajon'>
                        <option value='' selected disabled></option>
                        <option value='13.7'>13.7</option>
                        <option value='16.5'>16.5</option>
                        <option value='18.0'>18.0</option>
                        <option value='20.5'>20.5</option>
                    </select></td>
                    <td><select id='guia' name='guia'>
                        <option value='' selected disabled></option>
                        <option value='Si'>Si</option>
                        <option value='No'>No</option>
                    </select></td>
                    <td><select id='vent' name='vent'>
                        <option value='' selected disabled></option>
                        <option value='Fija'>Fija</option>
                        <option value='Corredera'>Corredera</option>
                        <option value='Batiente'>Batiente</option>
			                  <option value='Media Corredera'>Media Corredera</option>
                        <option value='Puerta'>Puerta</option>
                        <option value='Sin Ventana'>Sin Ventana</option>
                        <option value='Falso'>Falso</option>
                        <option value='Falso con Cajon'>Falso con Cajon</option>
                        <option value='Paño Fijo'>Paño Fijo</option>
                    </select></td>
                    <td><select id='perfil' name='perfil'>
                        <option value='' selected disabled></option>
                        <option value='Si' >Si</option>
                        <option value='No'>No</option>
                    </select></td>
                    <td><select id='escate' name='escate'>
                        <option value='' selected disabled></option>
                        <option value='Si'>Si</option>
                        <option value='No'>No</option>
                    </select></td>
                    <td><button id='quitar_fila'>X</button></td>
                </tr>";
            }else{
            while($row = mysqli_fetch_array($consulta)){
                $n = $row[0];
                $ubic = $row[1];
                $piso = $row[2];
                $fc = $row[3];
                $anch = $row[4];
                $alt = $row[5];
                $mot = $row[6];
                $man = $row[7];
                $tclick = $row[8];
                $crto = $row[9];
                $cajon = $row[10];
                $guia = $row[11];
                $vent = $row[12];
                $perf = $row[13];
                $esctele = $row[14];
                $lama = $row[15];
                $color = $row[16];
                echo "<tr>
                    <td>".$n."</td>
                    <td contenteditable>".$ubic."</td>
                    <td contenteditable>".$piso."</td>
                    <td><select class='fc_add' id='fc_add' name='fc_add'>";
                    if ($fc == 'F'){
                        echo "<option value='F' selected>F</option>
                      <option value='C'>C</option>";
                    }else if ($fc == 'C'){
                        echo "<option value='F'>F</option>
                        <option value='C' selected>C</option>";
                    }echo "</select></td>
                    <td contenteditable>".$anch."</td>
                    <td contenteditable>".$alt."</td>
		    <td><select class='color_add' id='color_add'>
                        <option value='' disabled selected></option>";
                        $conexionxx = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ("Error");
                        mysqli_set_charset($conexionxx,"utf8");
                        $ejecutarxx = mysqli_query($conexionxx,"Call Listar_Color()");
                        while ($rowxx = mysqli_fetch_array($ejecutarxx)) {
                            if ($color == $rowxx[0]){
                                echo "<option value='".$rowxx[0]."' selected>".$rowxx[0]."</option>";
                            }else{
                                echo "<option value='".$rowxx[0]."'>".$rowxx[0]."</option>";
                            }
                        }
                        echo "<option value='Cliente Decida'>Cliente Decida</option>";
                        mysqli_close($conexionxx);
                    echo "</select></td>
	            <td><select class='lama_add' id='lama_add'>
                        <option value='' disabled selected></option>";
                        $conexionx = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd") or die ('Error');
                        mysqli_set_charset($conexionx,'utf8');
                        $ejecutarx = mysqli_query($conexionx,'Call Consulta_Lama_Habilitados()');
                        while ($rowx = mysqli_fetch_array($ejecutarx)) {
                            if ($lama == $rowx[0]){
                                echo "<option value='".$rowx[0]."' selected>".$rowx[0]."</option>";
                            }else{
                                echo "<option value='".$rowx[0]."'>".$rowx[0]."</option>";
                            }
                        }
                        mysqli_close($conexionx);
                    echo "</select></td>
                    <td><select id='motor' name='motor'>";
                    if ($mot == 'Motor'){
                        echo "<option value='Motor' selected>Motor</option>
                              <option value='Manual'>Manual</option>
			                        <option value='Pulsador'>Pulsador</option>
	                            <option value='Control Remoto'>Control Remoto</option>
                              <option value='Muelle Chapa'>Muelle Chapa</option>
                              <option value='Manual Chapa'>Manual Chapa</option>
                              <option value='Falso'>Falso</option>
                              <option value='Paño Fijo'>Paño Fijo</option>";
                    }else if ($mot == 'Manual'){
                        echo "<option value='Motor'>Motor</option>
	                            <option value='Manual' selected>Manual</option>
			                        <option value='Pulsador'>Pulsador</option>
	                            <option value='Control Remoto'>Control Remoto</option>
                              <option value='Muelle Chapa'>Muelle Chapa</option>
                              <option value='Manual Chapa'>Manual Chapa</option>
                              <option value='Falso'>Falso</option>
                              <option value='Paño Fijo'>Paño Fijo</option>";
                    }else if ($mot == 'Pulsador'){
                        echo "<option value='Motor'>Motor</option>
                	            <option value='Manual'>Manual</option>
			                        <option value='Pulsador' selected>Pulsador</option>
	                            <option value='Control Remoto'>Control Remoto</option>
                              <option value='Muelle Chapa'>Muelle Chapa</option>
                              <option value='Manual Chapa'>Manual Chapa</option>
                              <option value='Falso'>Falso</option>
                              <option value='Paño Fijo'>Paño Fijo</option>";
                    }else if ($mot == 'Control Remoto'){
                        echo "<option value='Motor'>Motor</option>
                              <option value='Manual'>Manual</option>
                              <option value='Pulsador'>Pulsador</option>
                              <option value='Control Remoto' selected>Control Remoto</option>
                              <option value='Muelle Chapa'>Muelle Chapa</option>
                              <option value='Manual Chapa'>Manual Chapa</option>
                              <option value='Falso'>Falso</option>
                              <option value='Paño Fijo'>Paño Fijo</option>";
                    }else if ($mot == 'Muelle Chapa'){
                        echo "<option value='Motor'>Motor</option>
                              <option value='Manual'>Manual</option>
                              <option value='Pulsador'>Pulsador</option>
                              <option value='Control Remoto'>Control Remoto</option>
                              <option value='Muelle Chapa' selected>Muelle Chapa</option>
                              <option value='Manual Chapa'>Manual Chapa</option>
                              <option value='Falso'>Falso</option>
                              <option value='Paño Fijo'>Paño Fijo</option>";
                    }else if ($mot == 'Manual Chapa'){
                        echo "<option value='Motor'>Motor</option>
                              <option value='Manual'>Manual</option>
                              <option value='Pulsador'>Pulsador</option>
                              <option value='Control Remoto'>Control Remoto</option>
                              <option value='Muelle Chapa' >Muelle Chapa</option>
                              <option value='Manual Chapa' selected>Manual Chapa</option>
                              <option value='Falso'>Falso</option>
                              <option value='Paño Fijo'>Paño Fijo</option>";
                    }else if ($mot == 'Falso'){
                        echo "<option value='Motor'>Motor</option>
                              <option value='Manual'>Manual</option>
                              <option value='Pulsador'>Pulsador</option>
                              <option value='Control Remoto'>Control Remoto</option>
                              <option value='Muelle Chapa' >Muelle Chapa</option>
                              <option value='Manual Chapa'>Manual Chapa</option>
                              <option value='Falso' selected>Falso</option>
                              <option value='Paño Fijo'>Paño Fijo</option>";
                    }else if ($mot == 'Paño Fijo'){
                        echo "<option value='Motor'>Motor</option>
                              <option value='Manual'>Manual</option>
                              <option value='Pulsador'>Pulsador</option>
                              <option value='Control Remoto'>Control Remoto</option>
                              <option value='Muelle Chapa' >Muelle Chapa</option>
                              <option value='Manual Chapa'>Manual Chapa</option>
                              <option value='Falso'>Falso</option>
                              <option value='Paño Fijo' selected>Paño Fijo</option>";
                    }else{
			                   echo "<option value='' selected disabled></option>
                        <option value='Motor'>Motor</option>
                        <option value='Manual'>Manual</option>
                        <option value='Pulsador'>Pulsador</option>
                        <option value='Control Remoto'>Control Remoto</option>
                        <option value='Muelle Chapa'>Muelle Chapa</option>
                        <option value='Manual Chapa'>Manual Chapa</option>
                        <option value='Falso'>Falso</option>
                        <option value='Paño Fijo'>Paño Fijo</option>";
		                }echo "</select></td>
                    <td><select id='tclicka' name='tclicka' >";
                    if ($tclick == 'Si'){
                        echo "<option value='Si' selected>Si</option>
                      <option value='No'>No</option>";
                    }else if ($tclick == 'No'){
                        echo "<option value='Si'>Si</option>
                      <option value='No' selected>No</option>";
                    }else{
                        echo "<option value='Si'>Si</option>
                    <option value='No'>No</option>";
                    }
                    echo "</select></td>
                    <td style='display:none'><select id='crtos' name='crtos' >";
                    if ($crto == 'Si'){
                        echo "<option value='Si' selected>Si</option>
                      <option value='No'>No</option>";
                    }else if ($crto == 'No'){
                        echo "<option value='Si'>Si</option>
                      <option value='No' selected>No</option>";
                    }echo "</select></td>
                    <td><select id='cajon' name='cajon' >";
                    if ($cajon == '13.7'){
                        echo "<option value='13.7' selected>13.7</option>
                        <option value='16.5'>16.5</option>
                        <option value='18.0'>18.0</option>
                        <option value='20.5'>20.5</option>";
                    }else if ($cajon == '16.5'){
                        echo "<option value='13.7' >13.7</option>
                        <option value='16.5' selected>16.5</option>
                        <option value='18.0'>18.0</option>
                        <option value='20.5'>20.5</option>";
                    }else if ($cajon == '18.0'){
                        echo "<option value='13.7' >13.7</option>
                        <option value='16.5'>16.5</option>
                        <option value='18.0' selected>18.0</option>
                        <option value='20.5'>20.5</option>";
                    }else if ($cajon == '20.5'){
                        echo "<option value='13.7'>13.7</option>
                        <option value='16.5'>16.5</option>
                        <option value='18.0'>18.0</option>
                        <option value='20.5' selected>20.5</option>";
                    }else{
                        echo "<option value='' selected></option>
                        <option value='13.7'>13.7</option>
                        <option value='16.5'>16.5</option>
                        <option value='18.0'>18.0</option>
                        <option value='20.5'>20.5</option>";
                    }echo "</select></td>
                    <td><select id='guia' name='guia' >";
                    if ($guia == 'Si'){
                        echo "<option value='Si' selected>Si</option>
                      <option value='No'>No</option>";
                    }else if ($guia == 'No'){
                        echo "<option value='Si'>Si</option>
                      <option value='No' selected>No</option>";
                    }else{
                        echo "<option value='' selected></option>
                        <option value='Si'>Si</option>
                      <option value='No'>No</option>";
                    }echo "</select></td>
                    <td><select id='vent' name='vent' >";
                    if ($vent == 'Fija'){
                        echo "<option value='Fija' selected>Fija</option>
                              <option value='Corredera'>Corredera</option>
                              <option value='Batiente'>Batiente</option>
			                        <option value='Media Corredera'>Media Corredera</option>
                              <option value='Puerta'>Puerta</option>
                              <option value='Sin Ventana'>Sin Ventana</option>
                              <option value='Falso'>Falso</option>
                              <option value='Falso con Cajon'>Falso con Cajon</option>
                              <option value='Paño Fijo'>Paño Fijo</option>";
                    }else if ($vent == 'Corredera'){
                        echo "<option value='Fija' >Fija</option>
                              <option value='Corredera' selected>Corredera</option>
                              <option value='Batiente'>Batiente</option>
			                        <option value='Media Corredera'>Media Corredera</option>
                              <option value='Puerta'>Puerta</option>
                              <option value='Sin Ventana'>Sin Ventana</option>
                              <option value='Falso'>Falso</option>
                              <option value='Falso con Cajon'>Falso con Cajon</option>
                              <option value='Paño Fijo'>Paño Fijo</option>";
                    }else if ($vent == 'Batiente'){
                        echo "<option value='Fija' >Fija</option>
                              <option value='Corredera' >Corredera</option>
                              <option value='Batiente' selected>Batiente</option>
      			                  <option value='Media Corredera'>Media Corredera</option>
                              <option value='Puerta'>Puerta</option>
                              <option value='Sin Ventana'>Sin Ventana</option>
                              <option value='Falso'>Falso</option>
                              <option value='Falso con Cajon'>Falso con Cajon</option>
                              <option value='Paño Fijo'>Paño Fijo</option>";
                    }else if ($vent == 'Media Corredera'){
              		    	echo "<option value='Fija' >Fija</option>
                              <option value='Corredera' >Corredera</option>
                              <option value='Batiente'>Batiente</option>
              			          <option value='Media Corredera' selected>Media Corredera</option>
                              <option value='Puerta'>Puerta</option>
                              <option value='Sin Ventana'>Sin Ventana</option>
                              <option value='Falso'>Falso</option>
                              <option value='Falso con Cajon'>Falso con Cajon</option>
                              <option value='Paño Fijo'>Paño Fijo</option>";
              		  }else if ($vent == 'Puerta'){
              		    	echo "<option value='Fija' >Fija</option>
                              <option value='Corredera' >Corredera</option>
                              <option value='Batiente'>Batiente</option>
              			          <option value='Media Corredera'>Media Corredera</option>
                              <option value='Puerta' selected>Puerta</option>
                              <option value='Sin Ventana'>Sin Ventana</option>
                              <option value='Falso'>Falso</option>
                              <option value='Falso con Cajon'>Falso con Cajon</option>
                              <option value='Paño Fijo'>Paño Fijo</option>";
              		  }else if ($vent == 'Sin Ventana'){
              		    	echo "<option value='Fija' >Fija</option>
                              <option value='Corredera' >Corredera</option>
                              <option value='Batiente'>Batiente</option>
              			          <option value='Media Corredera'>Media Corredera</option>
                              <option value='Puerta'>Puerta</option>
                              <option value='Sin Ventana' selected>Sin Ventana</option>
                              <option value='Falso'>Falso</option>
                              <option value='Falso con Cajon'>Falso con Cajon</option>
                              <option value='Paño Fijo'>Paño Fijo</option>";
              		  }else if ($vent == 'Falso'){
              		    	echo "<option value='Fija' >Fija</option>
                              <option value='Corredera' >Corredera</option>
                              <option value='Batiente'>Batiente</option>
              			          <option value='Media Corredera'>Media Corredera</option>
                              <option value='Puerta'>Puerta</option>
                              <option value='Sin Ventana' >Sin Ventana</option>
                              <option value='Falso' selected>Falso</option>
                              <option value='Falso con Cajon'>Falso con Cajon</option>
                              <option value='Paño Fijo'>Paño Fijo</option>";
              		  }else if ($vent == 'Falso con Cajon'){
              		    	echo "<option value='Fija' >Fija</option>
                              <option value='Corredera' >Corredera</option>
                              <option value='Batiente'>Batiente</option>
              			          <option value='Media Corredera'>Media Corredera</option>
                              <option value='Puerta'>Puerta</option>
                              <option value='Sin Ventana' >Sin Ventana</option>
                              <option value='Falso'>Falso</option>
                              <option value='Falso con Cajon' selected>Falso con Cajon</option>
                              <option value='Paño Fijo'>Paño Fijo</option>";
              		  }else if ($vent == 'Paño Fijo'){
              		    	echo "<option value='Fija' >Fija</option>
                              <option value='Corredera' >Corredera</option>
                              <option value='Batiente'>Batiente</option>
              			          <option value='Media Corredera'>Media Corredera</option>
                              <option value='Puerta'>Puerta</option>
                              <option value='Sin Ventana' >Sin Ventana</option>
                              <option value='Falso'>Falso</option>
                              <option value='Falso con Cajon'>Falso con Cajon</option>
                              <option value='Paño Fijo' selected>Paño Fijo</option>";
              		  }else{
                      echo "<option value='' selected></option>
                            <option value='Fija' >Fija</option>
                            <option value='Corredera' >Corredera</option>
                            <option value='Batiente'>Batiente</option>
                            <option value='Media Corredera'>Media Corredera</option>
                            <option value='Puerta'>Puerta</option>
                            <option value='Sin Ventana' >Sin Ventana</option>
                            <option value='Falso'>Falso</option>
                            <option value='Falso con Cajon'>Falso con Cajon</option>
                            <option value='Paño Fijo'>Paño Fijo</option>";
                    }echo "</select></td>
                    <td><select id='perfil' name='perfil' >";
                    if ($perf == 'Si'){
                        echo "<option value='Si' selected>Si</option>
                              <option value='No'>No</option>";
                    }else if ($perf == 'No'){
                        echo "<option value='Si'>Si</option>
                              <option value='No' selected>No</option>";
                    }else{
                        echo "<option value='' selected></option>
                              <option value='Si'>Si</option>
                              <option value='No'>No</option>";
                    }echo "</select></td>
                    <td><select class='escate' id='escate' name='escate' >";
                    if ($esctele == 'Si'){
                        echo "<option value='Si' selected>Si</option>
                              <option value='No'>No</option>";
                    }else if ($esctele == 'No'){
                        echo "<option value='Si'>Si</option>
                              <option value='No' selected>No</option>";
                    }else{
                        echo "<option value='' selected></option>
                              <option value='Si'>Si</option>
                              <option value='No'>No</option>";
                    }echo "</select></td>
                    </tr>";
            }
        }
    }
mysqli_close($conexion);
?>
</tbody>
</table>
</body>
</html>
