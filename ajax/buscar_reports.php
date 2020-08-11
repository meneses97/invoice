<?php

	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	//Archivo de funciones PHP
	include("../funciones.php");
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';

	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $id_categoria =intval($_REQUEST['id_categoria']);
		 $aColumns = array('id_categoria','nombre_producto','codigo_producto');//Columnas de busqueda
		 $sTable = "products";
		 $sWhere = "";

			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		
		if ($id_categoria>0){
			$sWhere .=" and id_categoria='$id_categoria'";
		}
		$sWhere.=" order by id_producto desc";
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 3; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './productos.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data

		if ($numrows>0) {?>
            <div class="table-responsive">
                <table class="table">
                    <tr class="warning">

                        <th>#</th>
                        <th>Nome do Produto</th>
                        <th>Stock</th>
                        <th>Data de Entrada</th>
                        <th class='text-right'>Acções</th>

                    </tr>
                    <?php
                    while ($row = mysqli_fetch_array($query)) {

                        $id_producto = $row['id_producto'];
                        $codigo_producto = $row['codigo_producto'];
                        $nombre_producto = $row['nombre_producto'];
                        $data_entrada = $row['date_added'];
                        $stock = $row['stock'];

                        ?>
                        <tr>

                            <td><?php echo $codigo_producto; ?></td>
                            <td><?php echo $nombre_producto; ?></td>

                            <td class="text-center">

                                <span title="Current quantity" class="badge badge-default stock-counter ng-binding"><?php echo number_format($stock,2); ?></span>
                                <span title="Low stock" class="low-stock-alert ng-hide" ng-show="item.current_quantity <= item.low_stock_threshold">
                                  <i class="fa fa-exclamation-triangle"></i></span>

                            </td>


                            <td><?php echo $data_entrada; ?></td>


                            <td class="text-right">

                                <a class='btn btn-default' href="productos.php?id=<?php echo $id_producto;?>" title='Mostrar Detalhes' onclick=""><i
                                            class="glyphicon glyphicon-eye-open"></i></a>

                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <td colspan=7><span class="pull-right"><?php
                                echo paginate($reload, $page, $total_pages, $adjacents);
                                ?></span></td>
                    </tr>
                </table>
            </div>

            <?php
        }}


?>