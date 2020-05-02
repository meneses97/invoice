<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
.midnight-blue{
	background:#2c3e50;
	padding: 4px 4px 4px;
	color:white;
	font-weight:bold;
	font-size:12px;
}
.silver{
	background:white;
	padding: 3px 4px 3px;
}
.clouds{
	background:#e3e3e3;
	padding: 3px 4px 3px;
}
.border-top{
	border-top: solid 1px #bdc3c7;
	
}
.border-left{
	border-left: solid 1px #bdc3c7;
}
.border-right{
	border-right: solid 1px #bdc3c7;
}
.border-bottom{
	border-bottom: solid 1px #bdc3c7;
}
table.page_footer {width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}
}
-->
</style>
<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >
        <page_footer>
        <table class="page_footer">
            <tr>

                <td style="width: 50%; text-align: left">
                    P&aacute;gina [[page_cu]]/[[page_nb]]
                </td>
                <td style="width: 50%; text-align: right">
                    &copy; <?php echo get_row('perfil','nombre_empresa', 'id_perfil', 1) ; echo  $anio=date('Y'); ?>
                </td>
            </tr>
        </table>
    </page_footer>
    <?php include("header_reports.php");?>
    <br>

    <table class="table table-striped" border="0.1px"
           style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
            <td style="width:30%; padding: 20px" >Departamento</td>
            <td style="width:50%;padding: 20px" class="text-center">Inventario</td>
            <td style="width:20%;padding: 20px"><?php echo date("d/m/Y");?></td>
        </tr>

    </table>
    <br>

		<table class="table table-striped" border="0.1px" style="width: 50%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:30%; padding: 10px" >Departamento</td>
		   <td style="width:25%; padding: 10px" >Docuemnto</td>

        </tr>
		<tr>
           <td style="width:35%;">
			<?php 
				$sql_user=mysqli_query($con,"select * from users where user_id=".$_SESSION['user_id']);
				$rw_user=mysqli_fetch_array($sql_user);
				echo $rw_user['firstname']." ".$rw_user['lastname'];
			?>
		   </td>

		  <td style="width:25%;"><?php echo date("d/m/Y");?></td>
        </tr>

    </table>
	<br>

    <table class="table table-condensed" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr style="text-align: center">
            <th style="width: 7%;"  class='midnight-blue'>CODIGO</th>
            <th style="width: 15%;"  class='midnight-blue'>CATEGORIA</th>
            <th style="width: 9%;"  class='midnight-blue'>DESCRIÇÃO</th>
            <th style="width: 10%;"  class='midnight-blue'>FABRICANTE</th>
            <th style="width: 8%;"  class='midnight-blue'>GABINETE</th>
            <th style="width: 7%;"  class='midnight-blue'>MODELO</th>
            <th style="width: 5%;"  class='midnight-blue'>Nr. SERIE</th>
            <th style="width: 7%;"  class='midnight-blue'>DATA DE COMPRA</th>
            <th style="width: 7%;"  class='midnight-blue'>ANO DE FABRICO</th>
            <th style="width: 8%;"  class='midnight-blue'>TEMPO DE VIDA</th>
            <th style="width: 7%;"  class='midnight-blue'>GARANTIA</th>
            <th style="width: 10%;"  class='midnight-blue'>OBSERVACOES</th>
        </tr>
<?php
$nums=1;
$sql = "select * from products inner join gabinete on gabinete.idgabinete = products.idgabinete where status_producto = 1";

if ($session_id != 'all'){
    $sql.=" AND products.id_categoria='$session_id'";
}

if (is_string($filtro_producto)){
    $sql.=" AND products.nombre_producto LIKE '%".$filtro_producto."%'";
}else{
    $sql.=" AND products.codigo_producto LIKE '%".$filtro_producto."%'";
}

$results_x=mysqli_query($con, $sql);
while ($row=mysqli_fetch_array($results_x))
	{
        $id_producto = $row['id_producto'];
        $codigo_producto = $row['codigo_producto'];
        $nombre_producto = $row['nombre_producto'];
        $data_entrada = $row['date_added'];
        $stock = $row['stock'];
        $cod_gabinete = $row['codigo'];

	if (($nums%2) == 0){
		$clase="clouds";
	} else {
		$clase="silver";
	}

	?>
        <tr>
            <td class='<?php echo $clase;?>' style="width: 7%; text-align: left"><?php echo $cod_gabinete.'/'.$codigo_producto  ?></td>
            <td class='<?php echo $clase;?>' style="width: 15%; text-align: left"><?php echo $nombre_producto;?></td>
            <td class='<?php echo $clase;?>' style="width: 9%; text-align: center"><?php echo ''?></td>
            <td class='<?php echo $clase;?>' style="width: 10%; text-align: right"><?php echo '';?></td>

            <td class='<?php echo $clase;?>' style="width: 8%; text-align: left"><?php echo ''  ?></td>
            <td class='<?php echo $clase;?>' style="width: 7%; text-align: left"><?php echo '';?></td>
            <td class='<?php echo $clase;?>' style="width: 5%; text-align: center"><?php echo ''?></td>
            <td class='<?php echo $clase;?>' style="width: 7%; text-align: right"><?php echo ''?></td>

            <td class='<?php echo $clase;?>' style="width: 7%; text-align: left"><?php echo ''  ?></td>
            <td class='<?php echo $clase;?>' style="width: 8%; text-align: left"><?php echo '';?></td>
            <td class='<?php echo $clase;?>' style="width: 7%; text-align: center"><?php echo '';?></td>
            <td class='<?php echo $clase;?>' style="width: 10%; text-align: right"><?php echo '';?></td>
        </tr>

	<?php $nums++;
	}

?>
    </table><br>
    <div style="background: #e3e3e3; padding: 10px; width: 49%"><i style="font-size:11pt;text-align:left; ">Documento processado por computador</i></div>

</page>