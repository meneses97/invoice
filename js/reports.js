		$(document).ready(function(){
			load(1,2);
		});

		function load(page, ctr){

			var q= $("#q").val();
			var id_categoria='';
			$('#controlador').val(ctr);

			if(ctr === 0){
				id_categoria = $("#id_categoria").val();
			}else{
				id_categoria = $("#id_gabinete").val();
				//alert(id_categoria)
			}

			var parametros={'action':'ajax','page':page,'q':q,'id_categoria':id_categoria,'ctr':ctr};
			$("#loader").fadeIn('slow');
			//alert(q);
			$.ajax({
				data: parametros,
				url:'ajax/buscar_reports.php',
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./img/ajax-loader.gif"> Carregando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
				}
			})

		}
		function print_report_stock(){

			var id_categoria='';
			var ctr = $('#controlador').val();

			if(ctr === 0){
				id_categoria = $("#id_categoria").val();
			}else{
				id_categoria = $("#id_gabinete").val();
				//alert(id_categoria)
			}

			//var id_categoria= $("#id_categoria").val();
			var cp = $('#q').val();
			//alert(id_categoria+'/'+codigo_produto);
			VentanaCentrada('pdf/documentos/reports_pdf.php?ctr='+ctr+'&id_categoria='+id_categoria+'&fp='+cp,'Relatorio','','1024','768','true');
		}

		function print_report_stock_geral(){

			var id_categoria= $("#id_categoria").val();
			var cp = $('#q').val();
			//alert(id_categoria+'/'+codigo_produto);
			VentanaCentrada('pdf/documentos/reports_geral.php?id_categoria='+id_categoria+'&fp='+cp,'Relatorio','','1024','768','true');
		}



		
		
		
		
		
		
		

