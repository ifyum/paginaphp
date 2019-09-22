		$(document).ready(function(){
			load(1);
		});

		function load(page){
			var q= $("#q").val();
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'./ajax/buscar_libros.php?action=ajax&page='+page+'&q='+q,
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
			// acá iba un confirm("seguro de eliminar?")
				swal({
					  title: "¿Seguro que deseas Eliminar este Cliente?",
					  text: "No podrás deshacer este paso, se eliminarán Mascotas, vacunas, desparasitaciones e historial medico asociado a este cliente.",
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
						swal("Eliminado!", "Cliente y datos asociados, han sido eliminados de la base de datos.", "success");
						var q= $("#q").val();				
																					
							$.ajax({
							type: "GET",
							url: "./ajax/buscar_librosEdit.php",
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
						swal("Cancelado", "El Cliente no ha sido eliminado.", "error");
					  }
					});
		} 
		
/*  		function eliminar (id)
		{
			var q= $("#q").val();
		if (confirm(" deseas eliminar el usuario")){	
		$.ajax({
        type: "GET",
        url: "./ajax/buscar_cliente.php",
        data: "id="+id,"q":q,
		 beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		  },
        success: function(datos){
		$("#resultados").html(datos);
		load(1);
		}
			});
		}
		}  */
		
		$( "#eliminarDatos" ).submit(function( event ) {
		var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "buscar_librosEdit.php",
					data: parametros,
					 beforeSend: function(objeto){
						$(".datos_ajax_delete").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$(".datos_ajax_delete").html(datos);
					
					$('#dataDelete').modal('hide');
					load(1);
				  }
			});
		  event.preventDefault();
		}); 
		
		
		
		

