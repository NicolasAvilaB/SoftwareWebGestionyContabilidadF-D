<?php
header("Content-Type: text/html;charset=utf-8");
$nombre = $_POST["nombre"];
$clave = $_POST["clave"];
$conversion1 = base64_encode($nombre);
$conversion2 = base64_encode($clave);
$conexion = mysqli_connect("127.0.0.1","nicolas_usersoc","usersocifyd","nicolas_socifyd");
mysqli_set_charset($conexion,"utf8");
$consulta = mysqli_query($conexion, "Call Login('".$nombre."','".$clave."')") or die ("Error");;
if (mysqli_fetch_assoc($consulta) == true){
    include('functions.php');
  if ($resultset = getSQLResultSet("Call Consulta_Tipo_Usuario('".$nombre."','".$clave."')"))
	{
		if ($row = $resultset->fetch_array(MYSQLI_NUM)) {
			$id_empresa = $row[0];
			$tipo_usuario = $row[1];
			$nombre_usuario = $row[2];
      $estado_tecnico = $row[3];
		}
		if ($tipo_usuario == "Admin" || $tipo_usuario == "Superusuario"){
			/*date_default_timezone_set('America/Santiago');
			$horainicio=strftime("%H:%M:%S", time());
			$fechainicio=strftime("%Y-%m-%d", time());
			$pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
            for($i = 0; $i < 15; $i++) {
                $suma .= $pattern{rand(0, 35)};
            }
			ejecutarSQLCommand("Call Ingreso_Sesion('".$suma."','".$nombre."','".$horainicio."','".$fechainicio."')");*/
			session_start();
			mysqli_free_result($consulta);
			mysqli_close($conexion);
			$_SESSION['nombre'] = $nombre_usuario;
			$_SESSION['idempresa'] = $id_empresa;
			$_SESSION['empresa'] = $tipo_usuario;
			echo "1";
			//header("Location:Administracion/menu_admin.php");
		}else if ($tipo_usuario == "Técnico"){
			/*date_default_timezone_set('America/Santiago');
			$horainicio=strftime("%H:%M:%S", time());
			$fechainicio=strftime("%Y-%m-%d", time());
			$pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
            for($i = 0; $i < 15; $i++) {
                $suma .= $pattern{rand(0, 35)};
            }
			ejecutarSQLCommand("Call Ingreso_Sesion('".$suma."','".$nombre."','".$horainicio."','".$fechainicio."')");*/
			session_start();
			mysqli_free_result($consulta);
			mysqli_close($conexion);
			$_SESSION['nombre'] = $nombre_usuario;
			$_SESSION['idempresa'] = $id_empresa;
			$_SESSION['empresa'] = $tipo_usuario;
      $_SESSION['estadotecnico'] = $estado_tecnico;
			echo "3";
			//header("Location:Administracion/menu_admin.php");
		}else{
		    session_start();
	    	mysqli_free_result($consulta);
			mysqli_close($conexion);
			$_SESSION['nombre'] = $nombre_usuario;
			$_SESSION['idempresa'] = $id_empresa;
			$_SESSION['empresa'] = $tipo_usuario;
			$_SESSION['usuario'] = $nombre;
			echo "2";
			//header("Location:Operario/menu.php");
		}
	}
}
else
{
	echo "0";
	mysqli_free_result($consulta);
	mysqli_close($conexion);
}
?>
