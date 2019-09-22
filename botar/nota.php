<?php 

	$conexion=mysqli_connect('localhost','root','','alumnos');

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>mostrar datos</title>
</head>
<body>

<br>

	<table border="1" >
		<tr>
			<td>rut</td>
			<td>nombre</td>
			<td>aisgnatura</td>
			<td>nota1</td>
			<td>nota2</td>	
	           <td>nota3</td>
			<td>nota4</td>	
                <td>nota5</td>	
		</tr>

		<?php 
		$sql="SELECT * FROM notas where rut='11.111.111-1'";
		$result=mysqli_query($conexion,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr>
			<td><?php echo $mostrar['rut'] ?></td>
			<td><?php echo $mostrar['nombre'] ?></td>
			<td><?php echo $mostrar['asignatura'] ?></td>
			<td><?php echo $mostrar['nota1'] ?></td>
			<td><?php echo $mostrar['nota2'] ?></td>
                	<td><?php echo $mostrar['nota3'] ?></td>
			<td><?php echo $mostrar['nota4'] ?></td>
                <td><?php echo $mostrar['nota5'] ?></td>  
		</tr>
	<?php 
	}
	 ?>
	</table>

</body>
</html>
