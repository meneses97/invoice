	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="guardar_gabinete" name="guardar_gabinete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header alert alert-info">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Adicionar Novo Gabinete</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="guardarGabinete" name="guardar_categoria">
			<div id="resultados_ajax"></div>
			  <div class="form-group">
				<label for="nombre" class="col-sm-3 control-label">Codgico</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="codigo" name="codigo" required>
				</div>
			  </div>
			 
				  
			  <div class="form-group">
				<label for="descripcion" class="col-sm-3 control-label">Descrição</label>
				<div class="col-sm-8">
					<textarea class="form-control" id="descricao" name="descricao"   maxlength="255" ></textarea>
				  
				</div>
			  </div>

		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
			<button type="submit" class="btn btn-primary" id="guardar_datos">Guardar Dados</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>