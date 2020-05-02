		$(document).ready(function(){
			load(1);
		});

		function load(page){
			var q= $("#q").val();
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'./ajax/buscar_gabinetes.php?action=ajax&page='+page+'&q='+q,
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="../img/ajax-loader.gif"> Carregando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
					
				}
			})
		}

	
		
	function eliminar (id)
		{
		var q= $("#q").val();
		if (confirm("Realmente deseja eliminar este Gabinete")){
		$.ajax({
        type: "GET",
        url: "./ajax/buscar_gabinetes.php",
        data: "id="+id,"q":q,
		 beforeSend: function(objeto){
			$("#resultados").html("Menssagem: Carregando...");
		  },
        success: function(datos){
		$("#resultados").html(datos);
		load(1);
		}
			});
		}
		}
		
		
	
$( "#guardarGabinete" ).submit(function( event ) {
  $('#guardar_datos').attr("disabled", true);
 var parametros = $(this).serialize();

	 $.ajax({
			type: "POST",
			url: "ajax/novo_gabinete.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax").html("Mensagem: Carregando...");
			  },
			success: function(datos){
			$("#resultados_ajax").html(datos);
			$('#guardar_datos').attr("disabled", false);
			load(1);
		  }
	});
  event.preventDefault();
})

$( "#editar_gabinete" ).submit(function( event ) {
  $('#actualizar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();

	 $.ajax({
			type: "POST",
			url: "ajax/editar_gabinete.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax2").html("Menssagem: Carregando...");
			  },
			success: function(datos){
			$("#resultados_ajax2").html(datos);
			$('#actualizar_datos').attr("disabled", false);
			load(1);
		  }
	});
  event.preventDefault();
})

	
	$('#myModal2').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget) // Button that triggered the modal
	  var gabinete = button.data('gabinete')
	  var descripcion = button.data('descripcion') 
	  var id = button.data('id') 
	  var modal = $(this)
	  modal.find('.modal-body #mod_gabinete').val(gabinete)
	  modal.find('.modal-body #mod_descripcion').val(descripcion) 
	  modal.find('.modal-body #mod_id').val(id)

	})
		

