<?php
require "Connections/is_logged.php"; 
require_once('Connections/conexion.php');

	$id_usuario = $_SESSION['user_id'];
	
	$sqlEmpresa = "SELECT rut FROM users WHERE user_id = '$id_usuario'";
	$resultE 	= $conexion->query($sqlEmpresa);	
	$mostrarRut = $resultE->fetch_object();
	$rut 		= $mostrarRut->rut; 

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Notas</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="./css/main.css">
	<link rel="stylesheet" type="text/css" href="css/sweetalert.min.css">
</head>
<body>
	
<h1>Notas del alumno: <?php echo $rut; ?><h1> 

<?php
 
 	$res = $conexion->query("SELECT *
							FROM `notas` 
							WHERE rut ='".$rut."'
							ORDER BY asignatura");
	
	if ($res->num_rows > 0)		
	{
		echo'<table align="center" width="100%" border="1" class="table table-hover text-center">';
		echo'<tr>
				<th style="color: #FFF;background:#009688"><div align="center">Nombre</div></th>
				<th style="color: #FFF;background:#009688"><div align="center">Asignatura</div></th>
				<th style="color: #FFF;background:#009688"><div align="center">Semestre</div></th>
				<th style="color: #FFF;background:#009688"><div align="center">A&ntilde;o</div></th>
				<th style="color: #FFF;background:#009688"><div align="center">Nota 1</div></th>
				<th style="color: #FFF;background:#009688"><div align="center">Nota 2</div></th>
				<th style="color: #FFF;background:#009688"><div align="center">Nota 3</div></th>
				<th style="color: #FFF;background:#009688"><div align="center">Nota 4</div></th>
				<th style="color: #FFF;background:#009688"><div align="center">Nota 5</div></th>										
				
			</tr>';
			
		while($muestra = $res->fetch_object())
			
		{
			
			echo '<tr>';
			echo '<td><input type="hidden" name="proxima_vacuna" value="'.$muestra->nombre.'"/>'.htmlentities($muestra->nombre).'</td>';
			echo '<td><input type="hidden" name="nombre_vacuna" value="'.$muestra->asignatura.'"/>'.htmlentities($muestra->asignatura).'</td>';
			echo '<td><input type="hidden" name="nombre_mascota" value="'.$muestra->semestre.'"/>'.htmlentities($muestra->semestre).'</td>';
			echo '<td><input type="hidden" name="nombre_mascota" value="'.$muestra->anio.'"/>'.htmlentities($muestra->anio).'</td>';
			echo '<td><input type="hidden" name="nombre_mascota" value="'.$muestra->nota1.'"/>'.htmlentities($muestra->nota1).'</td>';
			echo '<td><input type="hidden" name="nombre_mascota" value="'.$muestra->nota2.'"/>'.htmlentities($muestra->nota2).'</td>';
			echo '<td><input type="hidden" name="nombre_mascota" value="'.$muestra->nota3.'"/>'.htmlentities($muestra->nota3).'</td>';
			echo '<td><input type="hidden" name="nombre_mascota" value="'.$muestra->nota4.'"/>'.htmlentities($muestra->nota4).'</td>';
			echo '<td><input type="hidden" name="nombre_mascota" value="'.$muestra->nota5.'"/>'.htmlentities($muestra->nota5).'</td>';
			echo '</tr>';
			 
		}
		
	}else{

			echo '<a>Sin Notas registradas.</a>';
		}	
	

?><a href="#!" class="btn-exit-system">
							<i class="zmdi zmdi-power"></i>
						</a>
						
<form action="asistencia.php">
    <input type="submit" value="Asistencia" />
</form>
<form action="tareas.php">
    <input type="submit" value="tarea" />
</form>
		<form action="anotaciones.php">
    <input type="submit" value="anotaciones" />
</form>

<form action="https://controlcolegio.freshdesk.com/">
    <input type="submit" value="Soporte Tecnico" />
</form>
		
	
	<!--====== Scripts -->
	<script src="./js/jquery-3.1.1.min.js"></script>
	<script src="./js/sweetalert.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/material.min.js"></script>
	<script src="./js/ripples.min.js"></script>
	<script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="./js/main.js"></script>
	<script language="JavaScript"> 
if(window.screen.availWidth == 1920)window.parent.document.body.style.zoom="140%" 
if(window.screen.availWidth == 1366)window.parent.document.body.style.zoom="50%" 
if(window.screen.availWidth == 1280)window.parent.document.body.style.zoom="120%" 
if(window.screen.availWidth == 1152)window.parent.document.body.style.zoom="108%" 
if(window.screen.availWidth == 1024)window.parent.document.body.style.zoom="96%" 
if(window.screen.availWidth == 800)window.parent.document.body.style.zoom="75%"; 
if(window.screen.availWidth == 640)window.parent.document.body.style.zoom="60%" 
</script> 
	<script>
		$.material.init();
		
		$('.btn-exit-system').on('click', function(){
		swal({
		  title: "Estas Seguro?",
		  text: "La sesión actual se cerrará",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonClass: "btn-danger",
		  confirmButtonText: "Si, Desconectar",
		  cancelButtonText: 'No, Cancelar',
		  closeOnConfirm: false
		},
		function(){
			
		  
		  window.location.href="login.php?logout";
		});
	</script>
</body>
</html>