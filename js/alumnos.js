		$(document).ready(function(){
			load(1);
		});

		function load(page){
			var q= $("#q").val();
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'./ajax/buscar_alumnos.php?action=ajax&page='+page+'&q='+q,
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
					
				}
			})
		}

	
		
			function eliminar (id)
		{
			swal({
					  title: "Seguro que deseas Eliminar este Alumno?",
					  text: "No podras deshacer este paso",
					  type: "warning",
					  showCancelButton: true,
					  confirmButtonClass: "btn-danger",
					  confirmButtonText: "SI",
					  cancelButtonText: "NO",
					  closeOnConfirm: false,
					  closeOnCancel: false
					},
					function(isConfirm) {
					  if (isConfirm) {
						swal("Eliminado!", "El Alumno ha sido eliminado de la base de datos.", "success");
						var q= $("#q").val();	
						
					//if (confirm("Realmente deseas eliminar el Alumno")){	
					$.ajax({
					type: "GET",
					url: "./ajax/buscar_alumnos.php",
					data: "id="+id,"q":q,
					 beforeSend: function(objeto){
						$("#resultados").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					}
						});
					 } else {
						swal("Cancelado", "El Alumno no ha sido eliminado.", "error");
					  }
					});
		}
		
		
		
		

