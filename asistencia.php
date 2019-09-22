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
	
<h1>Asistencia<h1> 
<form action="index.php">
    <input type="submit" value="Notas" />
</form>
<form action="tareas.php">
    <input type="submit" value="Tareas" />
</form>
<form action="anotaciones.php">
    <input type="submit" value="Anotaciones" />
</form>
<form action="https://controlcolegio.freshdesk.com/">
    <input type="submit" value="Soporte Tecnico" />
</form>

<?php
 
 	$res = $conexion->query("SELECT *
							FROM `asistencia` 
							WHERE rut ='".$rut."'
							ORDER BY nombre");
	
	if ($res->num_rows > 0)		
	{
		echo'<table align="center" width="100%" border="1" class="table table-hover text-center">';
		echo'<tr>
				
				<th style="color: #FFF;background:#009688"><div align="center">Nombre</div></th>
				<th style="color: #FFF;background:#009688"><div align="center">Asignatura</div></th>
				<th style="color: #FFF;background:#009688"><div align="center">Semestre</div></th>
				<th style="color: #FFF;background:#009688"><div align="center">A&ntilde;o</div></th>
				<th style="color: #FFF;background:#009688"><div align="center">Dia 1</div></th>
				<th style="color: #FFF;background:#009688"><div align="center">Dia 2</div></th>
				<th style="color: #FFF;background:#009688"><div align="center">Dia 3</div></th>
				<th style="color: #FFF;background:#009688"><div align="center">Dia 4</div></th>										
				<th style="color: #FFF;background:#009688"><div align="center">Dia 5</div></th>	
			</tr>';
			
		while($muestra = $res->fetch_object())
			
		{
			
			echo '<tr>';
			echo '<td><input type="hidden" name="proxima_vacuna" value="'.$muestra->nombre.'"/>'.htmlentities($muestra->nombre).'</td>';
			echo '<td><input type="hidden" name="nombre_vacuna" value="'.$muestra->asignatura.'"/>'.htmlentities($muestra->asignatura).'</td>';
			echo '<td><input type="hidden" name="nombre_mascota" value="'.$muestra->semestre.'"/>'.htmlentities($muestra->semestre).'</td>';
			echo '<td><input type="hidden" name="nombre_mascota" value="'.$muestra->anio.'"/>'.htmlentities($muestra->anio).'</td>';
			echo '<td><input type="hidden" name="nombre_mascota" value="'.$muestra->dia1.'"/>'.htmlentities($muestra->dia1).'</td>';
			echo '<td><input type="hidden" name="nombre_mascota" value="'.$muestra->dia2.'"/>'.htmlentities($muestra->dia2).'</td>';
			echo '<td><input type="hidden" name="nombre_mascota" value="'.$muestra->dia3.'"/>'.htmlentities($muestra->dia3).'</td>';
			echo '<td><input type="hidden" name="nombre_mascota" value="'.$muestra->dia4.'"/>'.htmlentities($muestra->dia4).'</td>';
			echo '<td><input type="hidden" name="nombre_mascota" value="'.$muestra->dia5.'"/>'.htmlentities($muestra->dia5).'</td>';
			echo '</tr>';
			 
		}
		
	}else{

			echo '<a>Sin Asistencia registradas.</a>';
		}	
	

?><a href="#!" class="btn-exit-system">
							<i class="zmdi zmdi-power"></i>
						</a>
						

		
	
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