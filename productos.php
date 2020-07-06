<?php

	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }

	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
	include("funciones.php");
	
	$active_productos="active";
	$active_clientes="";
	$active_usuarios="";	
	$title="Producto | Stock";
	
	if (isset($_POST['reference']) and isset($_POST['quantity'])){
		$quantity=intval($_POST['quantity']);
		$reference=mysqli_real_escape_string($con,(strip_tags($_POST["reference"],ENT_QUOTES)));
		$id_producto=intval($_GET['id']);
		$user_id=$_SESSION['user_id'];
		$firstname=$_SESSION['firstname'];
		$nota="$firstname adicionou $quantity producto(s) no inventario";
		$fecha=date("Y-m-d H:i:s");
		echo guardar_historial($id_producto,$user_id,$fecha,$nota,$reference,$quantity);
		$update = agregar_stock($id_producto,$quantity);

		if ($update==1){
			$message=1;
		} else {
			$error=1;
		}
	}
	
	if (isset($_POST['reference_remove']) and isset($_POST['quantity_remove'])){
		$quantity=intval($_POST['quantity_remove']);
		$reference=mysqli_real_escape_string($con,(strip_tags($_POST["reference_remove"],ENT_QUOTES)));
		$id_producto=intval($_GET['id']);
		$user_id=$_SESSION['user_id'];
		$firstname=$_SESSION['firstname'];
		$nota="$firstname eliminou $quantity producto(s) do inventario";
		$fecha=date("Y-m-d H:i:s");
		guardar_historial($id_producto,$user_id,$fecha,$nota,$reference,$quantity);
		$update=eliminar_stock($id_producto,$quantity);
		if ($update==1){
			$message=1;
		} else {
			$error=1;
		}
	}
	
	if (isset($_GET['id'])){
		$id_producto=intval($_GET['id']);
		$query=mysqli_query($con,"select * from products where id_producto='$id_producto'");
		$row=mysqli_fetch_array($query);
		
	} else {
		die("Producto no existe");
	}
	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("head.php");?>
  </head>
  <body>
	<?php
	include("navbar.php");
	include("modal/agregar_stock.php");
	include("modal/eliminar_stock.php");
	include("modal/editar_productos.php");
	
	?>
	
	<div class="container">

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
              <div class="col-sm-4 col-sm-offset-2 text-center">
				 <img class="item-img img-responsive" src="img/stock.png" alt=""> 
				  <br>
                    <a href="#" class="btn btn-danger" onclick="eliminar('<?php echo $row['id_producto'];?>')" title="Eliminar"> <i class="glyphicon glyphicon-trash"></i> Eliminar </a> 
					<a href="#myModal2" data-toggle="modal"
                       data-codigo='<?php echo $row['codigo_producto'];?>'
                       data-nombre='<?php echo $row['nombre_producto'];?>'
                       data-categoria='<?php echo $row['id_categoria']?>'
                       data-precio='<?php echo $row['precio_producto']?>'
                       data-stock='<?php echo $row['stock'];?>'
                       data-id='<?php echo $row['id_producto'];?>'
                       data-fabricante='<?php echo $row['fabricante'];?>'
                       data-gabinete='<?php echo $row['idgabinete'];?>'
                       data-modelo='<?php echo $row['modelo'];?>'
                       data-numeroserie='<?php echo $row['numero_serie'];?>'
                       data-vidautil='<?php echo $row['vida_util'];?>'
                       data-garantia='<?php echo $row['garantia'];?>'
                       data-observacao='<?php echo $row['observacao'];?>'
                       data-datacompra='<?php echo $row['data_compra'];?>'
                       data-fabrico='<?php echo $row['ano_fabrico'];?>'
                       class="btn btn-info" title="Editar">
                        <i class="glyphicon glyphicon-pencil"></i> Editar </a>
					
              </div>
			  
              <div class="col-sm-6 text-left">
                  <div class="table-striped">
                      <table  class="table table-condensed">
                          <tr class="alert alert-info">
                              <th> Codigo </th>
                          <th>Produto</th>
                          <th>Qtd. Stock</th>
                              <th>Preço de Compra</th>
                          </tr>
                          <tr>
                              <td> <span class="item-number"><?php echo $row['codigo_producto'];?></span></td>
                              <td><span class="item-title"> <?php echo $row['nombre_producto'];?></span></td>
                             <td><span class="item-quantity"><?php echo number_format($row['stock'],0);?></span></td>
                              <td> <span class="item-price"> <?php echo number_format($row['precio_producto'],2) .' '. get_row("perfil","moneda","id_perfil","1");?></span></td>
                          </tr>
                      </table>
                  </div>

                <div class="row margin-btm-20">

                    <div class="col-sm-6  col-md-4 ">
                      <a href="" data-toggle="modal" data-target="#add-stock"><img width="70px" height="50px"  src="img/stock-in.png"></a>

                      <a href="" data-toggle="modal" data-target="#remove-stock"><img width="70px" height="50px" src="img/stock-out.png"></a>
                    </div>
                </div>

              </div>
            </div>

            <br>
            <div class="row">
            <div class="col-sm-8 col-sm-offset-2 text-left">
                  <div class="row">
                    <?php
						if (isset($message)){
							?>
						<div class="alert alert-success alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <strong>Aviso!</strong> Dados procesados com sucesso.
						</div>	
							<?php
						}
						if (isset($error)){
							?>
						<div class="alert alert-danger alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <strong>Error!</strong> Não se pode eliminar produtos do stock.
						</div>	
							<?php
						}
					?>	
					 <table class='table table-bordered'>
						<tr>
							<th class='text-center' colspan=5 >HISTORIAL DE INVENTARIO</th>
						</tr>
						<tr>
							<td>Data</td>
							<td>Hora</td>
							<td>Descrição</td>
							<td>Referencia</td>
							<td class='text-center'>Total</td>
						</tr>
						<?php
							$query=mysqli_query($con,"select * from historial where id_producto='$id_producto'");
							while ($row=mysqli_fetch_array($query)){
								?>
						<tr>
							<td><?php echo date('d/m/Y', strtotime($row['fecha']));?></td>
							<td><?php echo date('H:i:s', strtotime($row['fecha']));?></td>
							<td><?php echo $row['nota'];?></td>
							<td><?php echo $row['referencia'];?></td>
							<td class='text-center'><?php echo number_format($row['cantidad'],2);?></td>
						</tr>		
								<?php
							}
						?>
					 </table>
                  </div>
                                    
                                    
				</div>
            </div>
          </div>
        </div>
    </div>
</div>

</div>

	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/productos.js"></script>
  </body>
</html>
<script>
$( "#editar_producto" ).submit(function( event ) {
  $('#actualizar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/editar_producto.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax2").html("Mensagem: Carregando...");
			  },
			success: function(datos){
			$("#resultados_ajax2").html(datos);
			$('#actualizar_datos').attr("disabled", false);
			window.setTimeout(function() {
				$(".alert").fadeTo(500, 0).slideUp(500, function(){
				$(this).remove();});
				location.replace('stock.php');
			}, 4000);
		  }
	});
  event.preventDefault();
})

	$('#myModal2').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Button that triggered the modal
		var codigo = button.data('codigo') // Extract info from data-* attributes
		var nombre = button.data('nombre')
		var categoria = button.data('categoria')
		var precio = button.data('precio')
		var stock = button.data('stock')
		var id = button.data('id')
        var gabinete = button.data('gabinete')
        var fabricante = button.data('fabricante')
        var modelo = button.data('modelo')
        var numeroserie = button.data('numeroserie')
        var vidautil = button.data('vidautil')
        var garantia = button.data('garantia')
        var observacao = button.data('observacao')
        var datacompra = button.data('datacompra')
        var anoFabrico = button.data('fabrico')

       // alert(datacompra+"/"+fabricante)


		var modal = $(this)
        modal.find('.modal-body #mod_fabricante').val(fabricante)
        modal.find('.modal-body #mod_gabinete').val(gabinete)
        modal.find('.modal-body #mod_numeroSerie').val(numeroserie)
        modal.find('.modal-body #mod_dataCompra').val(datacompra)
        modal.find('.modal-body #mod_anoFabrico').val(anoFabrico)
        modal.find('.modal-body #mod_vidaUtil').val(vidautil)
        modal.find('.modal-body #mod_modelo').val(modelo)
        modal.find('.modal-body #mod_observacao').val(observacao)
		modal.find('.modal-body #mod_codigo').val(codigo)
        modal.find('.modal-body #mod_garantia').val(garantia)
		modal.find('.modal-body #mod_nombre').val(nombre)
		modal.find('.modal-body #mod_categoria').val(categoria)
		modal.find('.modal-body #mod_precio').val(precio)
		modal.find('.modal-body #mod_stock').val(stock)
		modal.find('.modal-body #mod_id').val(id)
	})
	
	function eliminar (id){
		var q= $("#q").val();
		if (confirm("Realmente deseja eliminar este produto")){
			location.replace('stock.php?delete='+id);
		}
	}
</script>