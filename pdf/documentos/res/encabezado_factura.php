<?php 
	if ($con){
?>
    <table cellspacing="0" style="width: 100%;">
        <tr>

            <td style="width: 25%; color: #444444;">
                <img style="width: 60%;" src="../../<?php echo get_row('perfil','logo_url', 'id_perfil', 1);?>" alt="Logo"><br>
                
            </td>
			<td style="width: 50%; color: #34495e;font-size:12px;text-align:center">
                <span style="color: #34495e;font-size:14px;font-weight:bold">
                <?php echo get_row('perfil','nombre_empresa', 'id_perfil', 1);?></span><br>
                <?php echo get_row('perfil','direccion', 'id_perfil', 1).", ". get_row('perfil','ciudad', 'id_perfil', 1)." ".get_row('perfil','estado', 'id_perfil', 1);?><br>
                NUIT: <?php echo get_row('perfil','codigo_postal', 'id_perfil', 1);?><br>
                Cel.: <?php echo get_row('perfil','telefono', 'id_perfil', 1);?><br>
				Email: <?php echo get_row('perfil','email', 'id_perfil', 1);?>
                
            </td>
			<td style="width: 25%;text-align:right">
			 <?php  if (isset($numero_factura)){
			    echo 'COTAÇÃO Nº: '. $numero_factura;
			}else{ echo 'Factura Nº: '.  $numero_venda;}?>
			</td>
			
        </tr>
    </table>
	<?php }?>	