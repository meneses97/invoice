	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="nuevoProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">

		<div class="modal-content">
		  <div class="modal-header alert alert-info">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Adicionar Novo Produto</h4>
		  </div>

		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="guardar_producto" name="guardar_producto">
			<div id="resultados_ajax_productos"></div>

                <div class="form-group">
				<label for="codigo" class="col-sm-3 control-label">Código</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Código do Produto" required>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="nombre" class="col-sm-3 control-label">Nome</label>
				<div class="col-sm-8">
					<textarea class="form-control" id="nombre" name="nombre" placeholder="Nome do produto" required maxlength="255"></textarea>
				  
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="categoria" class="col-sm-3 control-label">Categoría</label>

                  <div class="col-sm-8">
                    <select class='form-control' name='categoria' id='categoria' required>
                        <option value="">Selecciona uma categoría</option>
                            <?php
                            $query_categoria=mysqli_query($con,"select * from categorias order by nombre_categoria");
                            while($rw=mysqli_fetch_array($query_categoria)){
                                ?>
                            <option value="<?php echo $rw['id_categoria'];?>"><?php echo $rw['nombre_categoria'];?></option>
                                <?php
                            }
                            ?>
					</select>
				</div>
              </div>
			  
			<div class="form-group">
				<label for="precio" class="col-sm-3 control-label">Preço</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="precio"
                         name="precio" placeholder="Preço do produto"
                         required pattern="^[0-9]{1,5}(\.[0-10]{0,10})?$" title="Introuzir numeros de 0 a 10 decimales" maxlength="8">
				</div>
			</div>
			
			<div class="form-group">
				<label for="stock" class="col-sm-3 control-label">Stock</label>
				<div class="col-sm-8">
				  <input type="number" min="0" class="form-control"
                         id="stock" name="stock" placeholder="Inventario inicial"
                         required  maxlength="8">
				</div>
			</div>

            <div class="form-group">
                <label for="categoria" class="col-sm-3 control-label">Status</label>
                <div class="col-sm-8">
                    <select class='form-control' name='status_producto' id='status_producto' required>
                        <option value="1">Novo</option>
                        <option value="1">Medio</option>
                    </select>
                </div>
            </div>

                <div class="form-group">
                    <label for="categoria" class="col-sm-3 control-label">Gabinete</label>

                    <div class="col-sm-8">
                        <select class='form-control' name='gabinete' id='gabinete' required>
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
                    <input type="text" class="form-control" id="fabricante" name="fabricante" placeholder="Fabricante do Produto" required>
                </div>
            </div>
            <div class="form-group">
                <label for="modelo" class="col-sm-3 control-label">Modelo</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Modelo do Produto" required>
                </div>
            </div>
                <div class="form-group">
                    <label for="numeroSerie" class="col-sm-3 control-label">Numero de Serie/ Matricula</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="numeroSerie" name="numeroSerie" placeholder="Numero de Serie/ Matricula" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="dataCompra" class="col-sm-3 control-label">Data de Compra</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="dataCompra" name="dataCompra" placeholder="Data de Compra" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="anoFabrico" class="col-sm-3 control-label">Ano de Fabrico</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="anoFabrico" name="anoFabrico" placeholder="Ano de fabrico" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="vidaUtil" class="col-sm-3 control-label">Vida Util</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="vidaUtil" name="vidaUtil" placeholder="Vida util" required>
                    </div>
                </div>
                <div class="form-group">
                <label for="garantia" class="col-sm-3 control-label">Garantia</label>
                <div class="col-sm-8">
                    <select class='form-control' name='garantia' id='garantia' required>
                        <option value="Sim">Sim</option>
                        <option value="Nao">Nao</option>
                    </select>
                </div>
                </div>

                <div class="form-group">
                    <label for="observacao" class="col-sm-3 control-label">Observacao</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="observacao" name="observacao" placeholder="Observacao">
                    </div>
                </div>
		  </div>

		  <div class="modal-footer">
			<button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
			<button type="submit" class="btn btn-primary" id="guardar_datos">Guardar dados</button>
		  </div>
		  </form>

		</div>
	  </div>
	</div>
	<?php
		}
	?>