<?php
$user = "root";
$pwd = "";
$db = "reservas";
$host = "localhost";

$conexion = mysqli_connect($host,$user,$pwd,$db);

if($conexion){
    mysqli_query($conexion,"SET NAMES 'utf8'");
}else{
    die("Error en la conexión");
}

?>