<?php
  session_start();
?>

<!DOCTYPE html>

<html>

  <head>

    <meta charset="utf-8" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="msapplication-tap-highlight" content="no" />
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width" />
    <meta http-equiv="Content-Security-Policy" content="default-src * 'unsafe-inline'; style-src 'self' 'unsafe-inline'; media-src *" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/index.css" />
    <link rel="stylesheet" type="text/css" href="css/general.css" />
    <script src="js/jquery.js"></script>
    <script src="js/index.js"></script>
    <link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
    <script src="js/jquery.mobile-1.4.5.min.js"></script>
    <link href="css/fuente.css" rel="stylesheet">
    <link href="css/fontawesome.css" rel="stylesheet">
    <link href="css/botones.css" rel="stylesheet">
    <!--<script src="js/calendario.js"></script>-->
    <title>Tullo</title>

  </head>
	<body>
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

	    $consulta = "SELECT * FROM usuarios WHERE correo = '$correo'";
      $resultado = mysql_query($consulta);
      if(! $resultado) {
        echo "La conexion no se logro".mysql_error();
        die;
      }
      $count = mysql_num_rows($resultado);

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
          $_SESSION['iniciar_sesion'] = 'dog';
          header("location:index.html");
		      echo "Fila insertada";
	    }

    } else {
      echo "Fallo";
    }

    ?>

	</body>

</html>