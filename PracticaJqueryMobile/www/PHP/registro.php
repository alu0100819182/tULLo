<?php

    $server = "localhost";
    $user = "root";
    $pass = "";
    $bd = "tullo";

    if(isset($_POST['registrarse'])) {

      $con = mysql_connect($server, $user, $pass, $bd)
      or die("Ha sucedido un error inexperado en la conexion de la base de datos");
      mysql_set_charset("utf8", $con);
      $conexion = mysql_select_db($bd, $con);

      $nombre = $_POST['nickname'];
      $apellidos = $_POST['nickape'];
      $fecha = $_POST['fecha'];
      $correo = $_POST['usermail'];
      $telefono = $_POST['nicktele'];
      $contrasena = $_POST['userpass'];
	    $encriptar = sha1($contrasena);
      echo "$contrasena";

	    $consulta = "SELECT * FROM usuarios WHERE correo = '$correo'";
      $resultado = mysql_query($consulta);
      if(! $resultado) {
        echo "La conexion no se logro".mysql_error();
        die;
      }
      $count = mysql_num_rows($resultado);
      $row = mysql_fetch_array($resultado);
	    if($count == 1) {
		      echo "Ese correo ya está registrado";
	    }
      else {
		      $sql = "INSERT INTO `tullo`.`usuarios` (`nombre`, `apellidos`, `correo`, `fecha_nacimiento`, `telefono`, `contrasena`)
          VALUES ('$nombre', '$apellidos', '$correo', '$fecha', '$telefono', '$contrasena')";
		      $consulta = mysql_query($sql);
          if(! $consulta) {
            echo "La conexion no se logro".mysql_error();
            die;
          }
          header("location:http://10.159.2.227:3000/index.html");
	    }
    } else {
      echo "Fallo";
    }

?>
