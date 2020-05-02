	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header alert alert-info">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar producto</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="editar_producto" name="editar_producto">
			<div id="resultados_ajax2"></div>



			  <div class="form-group">
				<label for="mod_codigo" class="col-sm-3 control-label">Código</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_codigo" name="mod_codigo" placeholder="Código del producto" required>
					<input type="hidden" name="mod_id" id="mod_id">
				</div>
			  </div>
			   <div class="form-group">
				<label for="mod_nombre" class="col-sm-3 control-label">Descrição do Bem</label>
				<div class="col-sm-8">
				  <textarea class="form-control" id="mod_nombre" name="mod_nombre" placeholder="Nombre del producto" required></textarea>
				</div>
			  </div>

			  <div class="form-group">
				<label for="mod_categoria" class="col-sm-3 control-label">Categoría</label>
				<div class="col-sm-8">
					<select class='form-control' name='mod_categoria' id='mod_categoria' required>
						<option value="">Selecciona una categoría</option>
							<?php
							$query_categoria=mysqli_query($con,"select * from categorias order by nombre_categoria");
							while($rw=mysqli_fetch_array($query_categoria))	{
								?>
							<option value="<?php echo $rw['id_categoria'];?>"><?php echo $rw['nombre_categoria'];?></option>
								<?php
							}
							?>
					</select>
				</div>
			  </div>

			  <div class="form-group">
				<label for="mod_precio" class="col-sm-3 control-label">Preço de Compra</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_precio"
				  name="mod_precio" placeholder="Preço de venda dO producto"
                         required pattern="^[0-9]{1,10}(\.[0-9]{0,10})?$" title="Introduzir apenas 0 ou 10 decimais" maxlength="10">
				</div>
			  </div>

			 <div class="form-group">
				<label for="mod_stock" class="col-sm-3 control-label">Quantidade</label>
				<div class="col-sm-8">
				  <input type="number" min="0" class="form-control" id="mod_stock" name="mod_stock" placeholder="Inventario inicial" required  maxlength="8" readonly>
				</div>
			</div>

                <div class="form-group">
                    <label for="categoria" class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-8">
                        <select class='form-control' name='status_producto' id='status_producto' required>
                            <option value="1">Novo</option>
                            <option value="2">Medio</option>
                            <option value="3">Estragado</option>
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label for="categoria" class="col-sm-3 control-label">Gabinete</label>

                    <div class="col-sm-8">
                        <select class='form-control' name='mod_gabinete' id='mod_gabinete' required>
                            <option value="">Selecciona um Gabinete</option>
                            <?php
                            $query_gabinete=mysqli_query($con,"select * from gabinete order by codigo");
                            while($rw=mysqli_fetch_array($query_gabinete)){
                                ?>
                                <option value="<?php echo $rw['idgabinete'];?>"><?php echo $rw['descricao'];?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fabricante" class="col-sm-3 control-label">Fabricante</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="mod_fabricante" name="mod_fabricante" placeholder="Fabricante do Produto" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="modelo" class="col-sm-3 control-label">Modelo</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="mod_modelo" name="mod_modelo" placeholder="Modelo do Produto" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="numeroSerie" class="col-sm-3 control-label">Numero de Serie/ Matricula</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="mod_numeroSerie" name="mod_numeroSerie" placeholder="Numero de Serie/ Matricula" required>
                    </div>
                </div>

             <div class="form-group">
                  <label for="dataCompra" class="col-sm-3 control-label">Data de Compra</label>
                 <div class="col-sm-8">
                     <input type="text" class="form-control" id="mod_dataCompra" name="mod_dataCompra" placeholder="Data de Compra" required>
                 </div>
             </div>

                <div class="form-group">
                    <label for="anoFabrico" class="col-sm-3 control-label">Data de Fabrico</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="mod_anoFabrico" name="mod_anoFabrico" placeholder="Ano de fabrico" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="vidaUtil" class="col-sm-3 control-label">Tempo de Vida</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="mod_vidaUtil" name="mod_vidaUtil" placeholder="Vida util" required>

                    </div>
                </div>
                <div class="form-group">
                    <label for="garantia" class="col-sm-3 control-label">Termos de Garantia</label>
                    <div class="col-sm-8">

                        <textarea  class="form-control" id="mod_garantia" name="mod_garantia"
                                  placeholder="Termos de Garantia" required></textarea>

                    </div>
                </div>

                <div class="form-group">
                    <label for="observacao" class="col-sm-3 control-label">Observações Gerais</label>
                    <div class="col-sm-8">
                        <textarea  class="form-control" id="mod_observacao"
                                   name="mod_observacao" placeholder="Observacao"></textarea>
                    </div>
                </div>

		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
			<button type="submit" class="btn btn-primary" id="actualizar_datos">Actualizar dados</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>