
    <?php

    header("Access-Control-Allow-Origin: *");

    $server = "localhost";
    $user = "root";
    $pass = "";
    $bd = "tullo";

    if($_POST['valor']!="" && $_POST['valor2']!="") {

        $con = mysql_connect($server, $user, $pass, $bd)
        or die("Ha sucedido un error inexperado en la conexion de la base de datos");
        mysql_set_charset("utf8", $con);
        $conexion = mysql_select_db($bd, $con);

        $mail = $_POST['valor'];
        $pass = $_POST['valor2'];
        $encri = sha1($pass);

        $consulta = "SELECT * FROM usuarios WHERE correo = '$mail' AND contrasena = '$pass'";
        $resultado = mysql_query($consulta);

        if(! $resultado) {
          echo "La conexion no se logro".mysql_error();
          die;
        }

        $count = mysql_num_rows($resultado);
        $row = mysql_fetch_array($resultado);

          if($count == 1) {
            header("location:http://10.159.1.200:3000//indexDos.html");
          }
          else {
            echo "No se pudo iniciar sesion porque no estas registrado";
          }
    }
    else {
      echo "Rellena los campos";
    }

    ?>
