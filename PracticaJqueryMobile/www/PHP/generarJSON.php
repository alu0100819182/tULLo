<?php

session_start();

$server = "localhost";
$user = "root";
$pass = "";
$bd = "tullo";

//Creamos la conexión
$con = mysql_connect($server, $user, $pass,$bd)
or die("Ha sucedido un error inexperado en la conexion de la base de datos");

mysql_set_charset("utf8", $con); //formato de datos utf8
$conexion = mysql_select_db($bd, $con);

//generamos la consulta
/*$usuario = $_SESSION['user'];
session_destroy();
 WHERE correo='$usuario'
 */

 
$consulta = "SELECT * FROM usuarios";

$sql = mysql_query($consulta);
if(! $sql) {
  echo "La conexion no se logro".mysql_error();
  die;
}

$usuarios = array(); //creamos un array

while($row = mysql_fetch_array($sql))
{
  $nombre = $row['nombre'];
  $apellido = $row['apellidos'];
  $correo = $row['correo'];
  $fecha = $row['fecha_nacimiento'];
  $telefono = $row['telefono'];
  $usuarios[] = array('nombre'=> $nombre,
                        'apellido'=> $apellido,
                        'correo'=> $correo,
                        'fecha'=> $fecha,
                        'telefono'=> $telefono);
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
