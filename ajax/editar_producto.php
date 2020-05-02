<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['mod_id'])) {
           $errors[] = "ID vazío";
        }else if (empty($_POST['mod_codigo'])) {
           $errors[] = "Código vazio";
        } else if (empty($_POST['mod_nombre'])){
			$errors[] = "Nome do produto vazio";
		} else if ($_POST['mod_categoria']==""){
			$errors[] = "Seleccionar categoria do produto";
		} else if (empty($_POST['mod_precio'])){
			$errors[] = "Precio de venda vazio";
		} else if (
			!empty($_POST['mod_id']) &&
			!empty($_POST['mod_codigo']) &&
			!empty($_POST['mod_nombre']) &&
			$_POST['mod_categoria']!="" &&
			!empty($_POST['mod_precio'])
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$codigo=mysqli_real_escape_string($con,(strip_tags($_POST["mod_codigo"],ENT_QUOTES)));
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["mod_nombre"],ENT_QUOTES)));
		$categoria=intval($_POST['mod_categoria']);
		$stock=intval($_POST['mod_stock']);
		$precio_venta=floatval($_POST['mod_precio']);
		$id_producto=$_POST['mod_id'];

        $fabricante=$_POST['mod_fabricante'];
        $modelo=$_POST['mod_modelo'];
        $numero_serie=$_POST['mod_numeroSerie'];
        $vida_util=intval( $_POST['mod_vidaUtil']);
        $garantia =$_POST['mod_garantia'];
        $observacao=$_POST['mod_observacao'];
        $data_compra= date($_POST['mod_dataCompra']);
        $ano_fabrico= intval($_POST['mod_anoFabrico']);

        $idgabinete= intval($_POST['mod_gabinete']);
        $status_producto = $_POST['status_producto'];

		$sql="UPDATE products SET idgabinete='".$idgabinete."', ano_fabrico='".$ano_fabrico."', 
		        observacao='".$observacao."', garantia='".$garantia."', vida_util='".$vida_util."',
		        numero_serie='".$numero_serie."', modelo='".$modelo."', fabricante='".$fabricante."', 
		        codigo_producto='".$codigo."', nombre_producto='".$nombre."',
		        id_categoria='".$categoria."', precio_producto='".$precio_venta."', 
		        stock='".$stock."' WHERE id_producto='".$id_producto."'";

		$query_update = mysqli_query($con,$sql);

			if ($query_update){
				$messages[] = "Producto actualizado com sucesso";
			} else{
				$errors []= "Lamentamos houve problemas na actualização de dados.".mysqli_error($con);
			}
		} else {
			$errors []= "Error desconhecido.";
		}

		if (isset($errors)){
			
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