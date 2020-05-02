<?php
include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
		
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['codigo'])) {
           $errors[] = "Código vazio";
        } else if (empty($_POST['nombre'])){
			$errors[] = "Nome do bem vazio";
		} else if ($_POST['stock']==""){
			$errors[] = "Quantidade vazio";
		} else if (empty($_POST['precio'])){
			$errors[] = "Preço de compra vazio";
		} else if (
			!empty($_POST['codigo']) &&
			!empty($_POST['nombre']) &&
			$_POST['stock']!="" &&
			!empty($_POST['precio'])
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		include("../funciones.php");
		// escaping, additionally removing everything that could be (html/javascript-) code
		$codigo=mysqli_real_escape_string($con,(strip_tags($_POST["codigo"],ENT_QUOTES)));
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$stock=intval($_POST['stock']);
		$id_categoria=intval($_POST['categoria']);
		$precio_venta=floatval($_POST['precio']);
        $status_producto=$_POST['status_producto'];
		$date_added=date("Y-m-d H:i:s");
		$fabricante=$_POST['fabricante'];
        $modelo=$_POST['modelo'];
        $numero_serie=$_POST['numeroSerie'];
        $vida_util=intval( $_POST['vidaUtil']);
        $garantia=$_POST['garantia'];
        $observacao=$_POST['observacao'];
        $data_compra=date($_POST['dataCompra']);
        $ano_fabrico=intval($_POST['anoFabrico']);
        $idgabinete=intval($_POST['gabinete']);
		
		$sql="INSERT INTO products(codigo_producto, nombre_producto, status_producto, date_added, precio_producto, stock, id_categoria, idgabinete, fabricante, modelo, numero_serie, vida_util, garantia, observacao, data_compra, ano_fabrico)
                VALUES ('$codigo','$nombre', '$status_producto','$date_added','$precio_venta', '$stock','$id_categoria','$idgabinete','$fabricante','$modelo','$numero_serie','$vida_util','$garantia','$observacao','$data_compra','$ano_fabrico')";
		$query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert){
				$messages[] = "Producto adicionado com sucesso";
				$id_producto=get_row('products','id_producto', 'codigo_producto', $codigo);
				$user_id=$_SESSION['user_id'];
				$firstname=$_SESSION['firstname'];
				$nota="$firstname adicionou $stock producto(s) no inventario";

				guardar_historial($id_producto,$user_id,$date_added,$nota,$codigo,$stock);

			} else{

            }
    } else {
        $errors []= "Error desconhecido.";
    }

if (isset($errors)){

    $errors []= "Lamentamos houve problemas no registo.".mysqli_error($con);
    ?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Operação Efectuada</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>