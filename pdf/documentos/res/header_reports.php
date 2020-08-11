<?php 
	if ($con){
?>		
    <table cellspacing="0" style="width: 100%;">

        <tr>

            <td style="width: 20%; color: #444444; ">
			
            </td>
			
			<td style="width: 50%; color: #34495e;font-size:12px;text-align:center">
                <span style="color: #34495e;font-size:14px;font-weight:bold">
				<img style="width: 20%;" src="../../<?php echo get_row('perfil','logo_url', 'id_perfil', 1);?>" alt="Logo"><br>
                <?php echo 'REPÚBLICA DE MOÇAMBIQUE';?></span><br>
                <?php echo '____________';?><br><br>
                <?php echo 'GOVERNO DA PROVÍNCIA DE CABO DELGADO';?><br>
                <?php echo 'INSTITUTO NACIONAL DE GESTÃO DE CALAMIDADES';?><br>
				<?php echo '<strong>PATRIMONIO</strong>';?>
                
            </td>
			<td style="width: 30%;text-align:center"><div style="border:1px; width:80%;text-align:center; padding:5px 5px;">
                       Visto
                <br><br>
				
				___ /___/<?php echo date('Y');?>
				
				<br><br>
				<p style="font-size:12px">A Delegada Provincial</p>


                _______________
				<p style="font-size:13px">Elizete da Silva Manuel</p>
				</div><br><br></td>
			
        </tr>
    </table>
	<?php }?>	