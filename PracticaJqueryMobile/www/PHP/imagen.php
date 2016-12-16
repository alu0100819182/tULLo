<?php

  $descripcion = $_REQUEST ['descripcion'];
  echo " FICHERO => ".$_FILES["file"]["name"].", Descripcion = >".$descripcion;

  header("Access-Control-Allow-Origin: *");

  $server = "localhost";
  $user = "root";
  $pass = "";
  $bd = "tullo";

  $con = mysql_connect($server, $user, $pass, $bd)
  or die("Ha sucedido un error inexperado en la conexion de la base de datos");
  mysql_set_charset("utf8", $con);
  $conexion = mysql_select_db($bd, $con);

  $consul = "SELECT * FROM correos";
  $resul = mysql_query($consul);

  if(! $resul) {
    echo "La conexion no se logro".mysql_error();
    die;
  }

  $row = mysql_fetch_array($resul);

  $nombre = $row['corre'];
  $descrip = $descripcion;
  $image = $_FILES["file"]["name"];

  $sql = "INSERT INTO `tullo`.`incidencias` (`correo`, `descripcion`, `imagen`) VALUES ('$nombre', '$descrip', '$image')";
  $consulta = mysql_query($sql);
  if(! $consulta) {
    echo "La conexion no se logro".mysql_error();
    die;
  }

?>
