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
    session_start();

    $server = "localhost";
    $user = "root";
    $pass = "";
    $bd = "tullo";

    if(isset($_POST['iniciar_sesion'])) {
        if($_POST['usermail']!="" && $_POST['userpass']!="") {
        $con = mysql_connect($server, $user, $pass, $bd)
        or die("Ha sucedido un error inexperado en la conexion de la base de datos");
        mysql_set_charset("utf8", $con);

        $conexion = mysql_select_db($bd, $con);
        $mail = $_POST['usermail'];
        $pass = $_POST['userpass'];
        $encri = sha1($pass);

        $consulta = "SELECT * FROM usuarios WHERE correo = '$mail' AND contrasena = '$pass'";
        $resultado = mysql_query($consulta);
        if(! $resultado) {
          echo "La conexion no se logro".mysql_error();
          die;
        }
        $count = mysql_num_rows($resultado);

          if($count == 1) {
            $_SESSION['iniciar_sesion'] = 'dog';
            header("location:indexDos.html");
          }
          else {
            echo "No se pudo iniciar sesion";
          }
        }
    }
    else {
      echo "Rellena los campos";
    }

    ?>
	</body>
</html>
