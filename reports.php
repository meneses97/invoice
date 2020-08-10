<?php

	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }

	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$active_productos="active";
        $title="Relatorio | Stock";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("head.php");?>
  </head>
  <body>
	<?php
	include("navbar.php");
	?>
	
    <div class="container">
	<div class="panel panel-info">
		<div class="panel-body">

			<div class="form-horizontal" role="form" id="datos">
				<div class="row">

                    <div class='col-md-3'>
                        <label>Codigo ou Nome </label>
                        <input type="text" class="form-control" id="q" placeholder="Código ou nome do produto" onkeyup='load(1);'>
                    </div>

					<div class='col-md-3'>
						<label><i class='glyphicon glyphicon-search'></i> */Categoría</label>
						<select class='form-control' name='id_categoria' id='id_categoria' onchange="load(1,0);">
							
                            <option value="0">Todos Produtos</option>
							<?php
                            $id_categoria = "";
							$query_categoria=mysqli_query($con,"select * from categorias order by nombre_categoria");

							while($rw=mysqli_fetch_array($query_categoria))	{
								?>
							<option value="<?php echo $rw['id_categoria'];?>"><?php echo $rw['nombre_categoria'];?></option>			
								<?php
							}
							?>
						</select>
					</div>

                    <div class='col-md-3'>
                        <label><i class='glyphicon glyphicon-search'></i> *Por Secção</label>
                        <select class='form-control' name='id_gabinete' id='id_gabinete' onchange="load(1,1);">

                            <option value="0">Todos Produtos</option>
                            <?php
                            $id_categoria = "";
                            $query_categoria=mysqli_query($con,"select * from gabinete order by gabinete.descricao");

                            while($rw=mysqli_fetch_array($query_categoria))	{
                                ?>
                                <option value="<?php echo $rw['idgabinete'];?>"><?php echo $rw['descricao'];?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <input type="hidden" name="controlador" id="controlador" value="">

                    <div class="col col-md-3 pull-right">
                        <label>&nbsp;</label>

                        <button onclick="print_report_stock_geral()"
                                class="btn btn-info bnt-sm"
                                id="print_reports"> Relatorio Geral</button>

                        <span> </span><button onclick="print_report_stock()"
                                              class="btn btn-info bnt-sm
"
                                id="print_reports">/ Categoria</button>
                    </div>

					<div class='col-md-2 text-center'>
						<span id="loader"></span>
					</div>
				</div>
				<hr>
				<div class='row-fluid'>
					<div id="resultados"></div><!-- Carga los datos ajax -->
				</div>	
				<div class='row'>
					<div class='outer_div'></div><!-- Carga los datos ajax -->
				</div>
			</div>

  </div>
</div>
		 
	</div>
	<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/reports.js"></script>
    <script type="text/javascript" src="js/VentanaCentrada.js"></script>
  </body>
</html>
<script>

</script>