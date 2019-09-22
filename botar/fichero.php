<?php
$link = new mysqli('localhost', 'root', '', 'alumnos');
 
if($link->connect_errno > 0){
    die('Error: No es posible establecer la conexión: [' . $link->connect_error . ']');
}
 
$id=mysqli_real_escape_string($_POST['rut']);
 
$extraerdato = $link->query("SELECT * FROM notas where rut=$rut");
$fetch = mysqli_fetch_array($extraerdato);
$nombre = $fetch['nombre'];
$asignatura = $fetch['asignatura'];
$nota1 = $fetch['nota1'];
$nota2 = $fetch['nota2'];
$nota3 = $fetch['nota3'];
$nota4 = $fetch['nota4'];
 $nota5 = $fetch['nota5'];
echo "Datos asociados con el rut: $rut<br/><br/>$nombre<br/>$apellido<br/>$asignatura<br/>$nota1<br/> <br/>$nota2<br/>$nota3<br/>$nota4<br/> $nota5<br/> ";
 
?>