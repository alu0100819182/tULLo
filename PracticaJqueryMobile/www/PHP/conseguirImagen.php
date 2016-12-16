<?php

$server = "localhost";
$user = "root";
$pass = "";
$bd = "tullo";

//Creamos la conexión
$con = mysql_connect($server, $user, $pass,$bd)
or die("Ha sucedido un error inexperado en la conexion de la base de datos");

mysql_set_charset("utf8", $con); //formato de datos utf8
$conexion = mysql_select_db($bd, $con);

$consulta = "SELECT * FROM incidencias";
$sql = mysql_query($consulta);

if(! $sql) {
  echo "La conexion no se logro".mysql_error();
  die;
}

$usuarios = array(); //creamos un array

while($row = mysql_fetch_array($sql))
{
  $cor = $row['correo'];
  $des = $row['descripcion'];
  $ima = $row['imagen'];
  $usuarios[] = array('c'=> $cor,
                      'd'=> $des,
                      'i'=> $ima);
}

//Creamos el JSON
$json_string = json_encode($usuarios);
echo $json_string;
//desconectamos la base de datos
$close = mysql_close($con)
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");

header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");

?>
