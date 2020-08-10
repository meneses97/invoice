<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: ../../login.php");
		exit;
    }
	/* Connect To Database*/
	include("../../config/db.php");
	include("../../config/conexion.php");
	//Archivo de funciones PHP
	include("../../funciones.php");

    $filtro_producto= $_REQUEST['fp'];
    $session_id =$_REQUEST['id_categoria'];

    $ctr = intval($_REQUEST['ctr']);
    $srl = '';

    if ($ctr == 0){
        $srl ='id_categoria';
    }else{
        $srl ='idgabinete';
    }

	require_once(dirname(__FILE__).'/../html2pdf.class.php');
		
	//Variables por GET
	//$id_cliente=intval($_GET['id_cliente']);
	//$id_vendedor=intval($_GET['id_vendedor']);

     ob_start();
     include(dirname('__FILE__').'/res/reports_html.php');
     $content = ob_get_clean();
    try{
        // init HTML2PDF
        $html2pdf = new HTML2PDF('P', 'LETTER', 'es', true, 'UTF-8', array(0, 0, 0, 0));
        // display the full page
        $html2pdf->pdf->SetDisplayMode('fullpage');
        // convert
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        // send the PDF
        $html2pdf->Output('stock.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
