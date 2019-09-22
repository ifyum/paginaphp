<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$server     = 'localhost'; //servidor
$username   = 'root'; //usuario de la base de datos
$password   = ''; //password del usuario de la base de datos
$database   = 'alumnos'; //nombre de la base de datos
 


$conexion = @new mysqli($server, $username, $password, $database);
 
$acentos = $conexion->query("SET NAMES 'utf8'");
 
if ($conexion->connect_error) //verificamos si hubo un error al conectar, recuerden que pusimos el @ para evitarlo
{
    die('Error de conexión: ' . $conexion->connect_error); //si hay un error termina la aplicación y mostramos el error
}

define('server', 'localhost');//DB_HOST:  generalmente suele ser "127.0.0.1"
define('username', 'root');//Usuario de tu base de datos
define('password', '');//Contraseña del usuario de la base de datos
define('database', 'alumnos');//Nombre de la base de datos




?>