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
			<h4 class="modal-title" id="myModalLabel">
                <i class='glyphicon glyphicon-edit'></i> Novo Item</h4>
		  </div>

		  <div class="modal-body">
              <div id="resultados_ajax_productos"></div>
              <form class="" method="post" id="guardar_producto" name="guardar_producto">
                  <div class="form-row">

                      <div class="form-group col-md-6">
                          <label for="inputEmail4">Codigo</label>
                          <input type="text" class="form-control" id="codigo" name="codigo"
                                 placeholder="Código do Bem" required>
                      </div>

                      <div class="form-group col-md-6">
                          <label for="inputPassword4">Categoria</label>
                          <select class='form-control' name='categoria' id='categoria' required>
                              <option value="">Selecciona uma categoría</option>
                              <?php
                              $query_categoria=mysqli_query($con,"select * from categorias order by nombre_categoria");
                              while($rw=mysqli_fetch_array($query_categoria)){
                                  ?>
                                  <option value="<?php echo $rw['id_categoria'];?>">
                                      <?php echo $rw['nombre_categoria'];?></option>
                                  <?php
                              }
                              ?>
                          </select>
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="inputEmail4">Gabinete</label>
                          <select class='form-control' name='gabinete' id='gabinete' required>
                              <option value="">Selecciona um Gabinete</option>
                              <?php
                              $query_gabinete=mysqli_query($con,"select * from gabinete order by codigo");
                              while($rw=mysqli_fetch_array($query_gabinete)){
                                  ?>
                                  <option value="<?php echo $rw['idgabinete'];?>">
                                      <?php echo $rw['descricao'];?></option>
                                  <?php
                              }
                              ?>
                          </select>
                      </div>

                      <div class="form-group col-md-6">
                          <label for="inputPassword4">nº de Serie:</label>
                          <input type="text" class="form-control" id="numeroSerie"
                                 name="numeroSerie" placeholder="Numero de Serie/ Matricula" required>

                      </div>
                  </div>
                  <div class="form-group col-md-12">
                      <label for="inputAddress">Descricao do Bem ou Imovel</label>
                      <textarea class="form-control" id="nombre" name="nombre"
                                placeholder="Nome do produto" required maxlength="255"></textarea>

                  </div>
                  <div style="background: #e3e3e3">
                  <div class="form-row" >
                      <div class="form-group col-md-5">
                          <label for="inputCity">Preco de Compra</label>
                          <input type="text" class="form-control" id="precio"
                                 name="precio" placeholder="Preço do produto"
                                 required pattern="^[0-9]{1,5}(\.[0-10]{0,10})?$"
                                 title="Introuzir numeros de 0 a 10 decimales" maxlength="8">

                      </div>
                      <div class="form-group col-md-4">
                          <label for="inputState">Quantidade</label>
                          <input type="number" min="0" class="form-control"
                                 id="stock" name="stock" placeholder="Inventario inicial"
                                 required  maxlength="8">
                      </div>
                      <div class="form-group col-md-3">
                          <label for="inputZip">Estado</label>
                          <select class='form-control' name='status_producto' id='status_producto' required>
                              <option value="1">Novo</option>
                              <option value="1">Medio</option>
                          </select>
                      </div>
                  </div>
                  <div class="form-group col-md-12" >
                      <label for="inputAddress">Fabricante:</label>
                      <input type="text" class="form-control" id="fabricante"
                             name="fabricante" placeholder="Fabricante do Produto" required>

                  </div>
                  <div class="form-group col-md-12">
                      <label for="inputAddress">Modelo:</label>
                      <input type="text" class="form-control" id="modelo" name="modelo"
                             placeholder="Modelo do Produto" required>
                  </div>
                  <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="inputEmail4">Data de Compra</label>
                          <input type="date" class="form-control" id="dataCompra"
                                 name="dataCompra" placeholder="Data de Compra" required>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="inputPassword4">Data de Frabrico</label>
                          <input type="number" class="form-control" id="anoFabrico"
                                 name="anoFabrico" placeholder="Ano de fabrico" required>

                      </div>
                  </div>
                  </div>
                  <div class="form-group col-md-12">
                      <label for="inputAddress">Termos de Garantia:</label>
                      <textarea class='form-control' name='garantia' id='garantia' required></textarea>
                  </div>
                  <div class="form-group col-md-12">
                      <label for="inputAddress">Observacoes Gerais:</label>
                      <textarea class="form-control" id="observacao"
                                name="observacao" placeholder="Observacao"></textarea>
                  </div>
                  <div class="form-group col-md-12">
                      <label for="inputAddress">Tempo de Vida:</label>
                      <input type="number" class="form-control" id="vidaUtil"
                             name="vidaUtil" placeholder="Vida util" required>

                  </div>

                  <div class="modal-footer">
			<button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
			<button type="submit" class="btn btn-primary" id="guardar_datos">Guardar dados</button>
		  </div>

            </form>
        </div>

		</div>
	  </div>
	</div>

	<?php
		}
	?>