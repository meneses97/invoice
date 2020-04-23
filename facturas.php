<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	
	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$active_categoria="active";
	$title="Dashbord | Invoice";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("head.php");
    require_once 'funciones.php';
    ?>
      <script type = "text/javascript" src = "libraries/loader.js"></script>
      <script type = "text/javascript">
          google.charts.load('current', {packages: ['corechart']});
      </script>
  </head>
  <body>
	<?php
	include("navbar.php");
	?>
	
    <div class="container">

                <div class="col-md-3">
                    <ul class="list-group">

                        <h4 class="list-group-item" style="background: #cce5ff">Estatisticas Gerais</h4>

                        <li class="list-group-item" value="">
                            <a href="productos.php" target="frm_content" style=""> <?php echo 'Total Produtos';?>
                                <span class="pull-right badge"> <?php echo get_count('products','id_producto') ; ?></span>
                            </a></li>

                        <li class="list-group-item" value="">
                            <a href="clientes.php"  style=""> <?php echo 'Total Clientes';?>
                                <span class="pull-right badge"> <?php echo get_count('clientes','id_cliente') ?></span>
                            </a></li>

                        <li class="list-group-item" value="">
                            <a href="usuarios.php"  style=""> <?php echo 'Total Vendedores';?>
                                <span class="pull-right badge"> <?php echo get_count('users','user_id') ?></span>
                            </a></li>

                        <li class="list-group-item" value="">
                            <a href="vendas.php"  style=""> <?php echo 'Total Vendas';?>
                                <span class="pull-right badge"> <?php echo get_count('vendas','id_venda') ?></span>
                            </a></li>

                        <li class="list-group-item" value="">
                            <a href="facturas.php" style=""> <?php echo 'Total Facturas';?>
                                <span class="pull-right badge"> <?php echo get_count('facturas','id_factura') ?></span>
                            </a></li>

                    </ul>



                    <ul class="list-group alert-warning">

                        <h4 class="list-group-item alert alert-danger " style="background: #cce5ff">ANALISE DE STOCK</h4>

                        <li class="list-group-item" value="">
                            <strong   style=""> <?php echo 'Stock Minimo';?>
                                <span class="pull-right badge"> <?php echo get_count('products','id_producto') ; ?></span>
                            </strong></li>

                        <li class="list-group-item" value="">
                            <strong   style=""> <?php echo 'Stock Optimo';?>
                                <span class="pull-right badge"> <?php echo get_count('clientes','id_cliente') ?></span>
                            </strong></li>
                        <li class="list-group-item" value="">
                            <strong> <?php echo 'Fora do Prazo';?>
                                <span class="pull-right badge"> <?php echo get_count('clientes','id_cliente') ?></span>
                            </strong></li>

                    </ul>

                    <div class="panel panel-success">
                        <div class="panel-heading">ANALISE DE VENDAS</div>
                        <div class="panel-body">
                            <span><strong class="text-info">Total das vendas:</strong><hr></span>

                            <h3 class="text-right"><?php echo str_replace(",","",number_format(get_sun('vendas','total_venda'),2)); ?></h3>

                            <span><hr><strong class="text-success">Total dos lucros:</strong><hr></span>

                            <h3 class="text-right"><?php echo str_replace(",","",number_format(get_sun('vendas','total_venda'),2)); ?></h3>

                        </div>
                        <div class="panel-footer"><span class="glyphicon glyphicon-shopping-cart"></span>
                            <span class="pull-right glyphicon glyphicon-circle-arrow-right"></span></div>
                    </div>

                </div>

                <div class="col-md-9">

                    <br>
                    <div class="row alert alert-warning">
                        <br>

                        <div class="col-md-12">
                            <div id = "containers" style = "width: 100%; height: 300px; margin: 0 auto"></div>

                            <script language = "JavaScript">
                                function drawChart() {
                                    // Define the chart to be drawn.
                                    var data = google.visualization.arrayToDataTable([
                                        ['Mes', 'Total'],
                                        ['Jan',  9000],
                                        ['Fev',  1000],
                                        ['Mar',  1170],
                                        ['Abr',  1250],
                                        ['Mai',  1205],
                                        ['Jun',  1250],
                                        ['Jul',  15065],
                                        ['Ago',  2250],
                                        ['Set',  9250],
                                        ['Out',  11250],
                                        ['Nov',  35250],
                                        ['Dez',  530]
                                    ]);

                                    var options = {title: 'ANALISE DE VENDAS EFECTUAS POR MES'};
                                    // Instantiate and draw the chart.
                                    var chart = new google.visualization.ColumnChart
                                    (document.getElementById('containers'));
                                    chart.draw(data, options);
                                }
                                google.charts.setOnLoadCallback(drawChart);
                            </script>
                        </div>

                    <div class="col-md-12">

                    <form class="form-horizontal " role="form" id="datos">
                                    <div class="row ">
                                        <br>
                                       <hr>
                                        <strong>ANALISE DE STOCK/PRODUTO</strong>
                                        <div class='col-md-4 pull-right'>

                                            <input type="hidden" name="id_categoria" id="id_categoria" value="all">

                                            <input type="text" class="form-control" id="q" placeholder="Código ou nome do produto" onkeyup='load(1);'>
                                            <br>
                                        </div>

                                        <div class='col-md-12 text-center'>
                                            <span id="loader"></span>
                                        </div>
                                    </div>

                                    <div class='row-fluid'>
                                        <div id="resultados"></div><!-- Carga los datos ajax -->
                                    </div>

                                    <div class='row'>
                                        <div class='outer_div'></div><!-- Carga los datos ajax -->
                                    </div>
                                </form>
                </div>

</div>

                </div> <!-- fim tabelas -->



    </div>

	<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/dashbord.js"></script>
    <script type="text/javascript" src="js/reports.js"></script>

  <script>
      $(document).ready(function(){
          $.ajax({
              url:'./pdf/documentos/res/barGraphic.php',
              success:function(data){

                  $(".barGraphic").html(data);
              }
          })

      });
  </script>
  </body>
</html>
