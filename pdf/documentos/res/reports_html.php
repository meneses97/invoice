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

		<table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:35%;" class='midnight-blue'>Utilizador</td>
		   <td style="width:25%;" class='midnight-blue'>Data de Emissão</td>
		   <td style="width:40%;" class='midnight-blue'>Documento</td>
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
		   <td style="width:40%;" >
               Inventrio de Bens e Materiais
		   </td>
        </tr>

    </table>
    <br>

    <div style="background: #2c3e50; width: 100%; color:white" >
        <?php echo get_row("gabinete",'descricao',$srl,$session_id)?></div>
    <br>

    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">

        <tr>
            <th style="width: 15%;" class='midnight-blue'>Codigo</th>
            <th style="width: 50%;" class='midnight-blue'>Descrição do Bem</th>
            <th style="width: 15%;" class='midnight-blue'>Quantidade</th>
            <th style="width: 20%;" class='midnight-blue'>Data de Entrada</th>
        </tr>

        <?php

        $sql_r = "SELECT * FROM products INNER JOIN gabinete ON gabinete.idgabinete = products.idgabinete
 where  products.status_producto = 1 AND products.$srl=$session_id";

        $linha = mysqli_query($con, $sql_r);

        //echo $sql_r;

        while ($rl = mysqli_fetch_array($linha)) {
            $nums = 1;
        if (($nums % 2) == 0) {
            $clase = "clouds";
        } else {
            $clase = "silver";
        }

        ?>
        <tr>
            <td class='<?php echo $clase; ?>' style="width: 15%; text-align: left"><?php echo $rl['codigo'] ?></td>
            <td class='<?php echo $clase; ?>'
                style="width: 50%; text-align: left"><?php echo $rl['nombre_producto']; ?></td>
            <td class='<?php echo $clase; ?>' style="width: 15%; text-align: center"><?php echo $rl['stock']; ?></td>
            <td class='<?php echo $clase; ?>'
                style="width: 20%; text-align: right"><?php echo $rl['date_added']; ?></td>
        </tr>

        <?php $nums++; } ?>
    </table><br>

    <div style="background: #e3e3e3; padding: 10px; width: 49%"><i style="font-size:11pt;text-align:left; ">Documento processado por computador</i></div>

</page>