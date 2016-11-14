<?php

$server = "localhost";
$user = "root";
$pass = "";
$bd = "tullo";

//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd)
or die("Ha sucedido un error inexperado en la conexion de la base de datos");

//generamos la consulta
$sql = "SELECT * FROM usuarios";
mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

if(!$result = mysqli_query($conexion, $sql)) die();

$usuarios = array(); //creamos un array

while($row = mysqli_fetch_array($result))
{
    $nombre=$row['nombre'];
    $apellido=$row['apellido'];
    $correo=$row['correo'];
    $fecha=$row['fecha'];
    $telefono=$row['telefono'];

    $usuarios[] = array('nombre'=> $nombre, 'apellido'=> $apellido,
                        'correo'=> $correo, 'fecha'=> $fecha, 'telefono'=> $telefono);

}

//desconectamos la base de datos
$close = mysqli_close($conexion)
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");


//Creamos el JSON
$json_string = json_encode($usuarios);
echo $json_string;

//Si queremos crear un archivo json, sería de esta forma:
/*
$file = 'usuarios.json';
file_put_contents($file, $json_string);
*/

?>
