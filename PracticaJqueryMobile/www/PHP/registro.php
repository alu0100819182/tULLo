<?php

    header("Access-Control-Allow-Origin: *");

    $server = "localhost";
    $user = "root";
    $pass = "";
    $bd = "tullo";

      $con = mysql_connect($server, $user, $pass, $bd)
      or die("Ha sucedido un error inexperado en la conexion de la base de datos");
      mysql_set_charset("utf8", $con);
      $conexion = mysql_select_db($bd, $con);

      $nombre = $_POST['valor'];
      $apellidos = $_POST['valor2'];
      $fecha = $_POST['valor3'];
      $correo = $_POST['valor4'];
      $telefono = $_POST['valor5'];
      $contrasena = $_POST['valor6'];
	    $encriptar = sha1($contrasena);

	    $consulta = "SELECT * FROM usuarios WHERE correo = '$correo'";
      $resultado = mysql_query($consulta);
      if(! $resultado) {
        echo "La conexion no se logro".mysql_error();
        die;
      }
      $count = mysql_num_rows($resultado);
      $row = mysql_fetch_array($resultado);

	    if($count == 1) {
        sleep(5);
	    }

      else {
		      $sql = "INSERT INTO `tullo`.`usuarios` (`nombre`, `apellidos`, `correo`, `fecha_nacimiento`, `telefono`, `contrasena`)
          VALUES ('$nombre', '$apellidos', '$correo', '$fecha', '$telefono', '$contrasena')";
		      $consulta = mysql_query($sql);
          if(! $consulta) {
            echo "La conexion no se logro".mysql_error();
            die;
          }
	    }

?>
