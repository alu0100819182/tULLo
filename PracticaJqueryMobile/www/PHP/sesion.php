
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
        $row = mysql_fetch_array($resultado);
          if($count == 1) {
            $_SESSION['user'] = $row['correo'];
            header("location:http://10.159.2.227:3000//indexDos.html");
          }
          else {
            echo "No se pudo iniciar sesion porque no estas registrado";
          }
        }
    }
    else {
      echo "Rellena los campos";
    }

    ?>
