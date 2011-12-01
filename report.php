<?php
//php functions
//session_start();

function getValue($field){
	$value='';
	//$clear=false;

	//if(isset($errors)){
		//$clear=array_key_exists($field, $errors);
		//echo $clear;
	//}	
	if(isset($_REQUEST[$field])/*&&!$clear*/){
		$value=$_REQUEST[$field];
		
	}
	return $value;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
	<!-- ////////////////// obligatorios ////////////////// -->
	<!-- /////////////////////////////////////////////////// -->
	<!-- metas obligatorias -->
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="cache-control" content="no-cache" />
	<meta http-equiv="expires" content="3600" />
	<meta name="revisit-after" content="2 days" />
	<meta name="robots" content="index,follow" />
	<meta name="publisher" content="Menel Sebastian" />
	<meta name="copyright" content="Menel Sebastian copyright" />
	<meta name="author" content="Menel Sebastian" />
	<meta name="distribution" content="global" />
	<meta name="description" content="Pagina principal" />
	<meta name="keywords" content="Menel Sebastian, Sebastian Menel, Licenciado, Informatico, Sebi, Seba, Licenciado en Ciencias de la Computacion, java, php," />
	<!-- icono obligatorio -->
	<link rel="icon" type="image/x-icon" href="/img/favicon.ico" />
	<!-- stylesheet obligatorios -->
	<link rel="stylesheet" type="text/css" media="screen,projection,print" href="/css/commons_setup.css" />
	<link rel="stylesheet" type="text/css" media="screen,projection,print" href="/css/commons_text.css" />
	<!-- javascript obligatorio -->
	<script type="text/javascript" src="/js/commons.js"></script>
	<script type="text/javascript" src="/js/commons-target.js"></script>

	<!-- ////////////////// customizados /////////////////// -->
	<!-- /////////////////////////////////////////////////// -->
	<!-- title customizados -->
	<title>Sebasti&aacute;n Menel</title>
	<!-- stylesheet customizados -->
	<link rel="stylesheet" type="text/css" media="screen,projection,print" href="/css/layout4_setup.css" />
	<link rel="stylesheet" type="text/css" media="screen,projection,print" href="/css/layout4_text.css" />
	<!-- javascript customizados -->
	<script type="text/javascript" src="js.js"></script>
	
</head>

<!-- Global IE fix to avoid layout crash when single word size wider than column width -->
<!--[if IE]><style type="text/css"> body {word-wrap: break-word;}</style><![endif]-->

<body>
	<!-- Main Page Container -->
	<div class="page-container">

	<!-- For alternative headers START PASTE here -->
	<!-- A. HEADER -->
	<div class="header">


		<!-- A.2 HEADER MIDDLE -->
		<div class="header-middle">
			<!-- Site message -->
			<div class="sitemessage">
				<h2>Mercado Libre Integration</h2>
			</div>
		</div>
		<!-- END A.2 HEADER MIDDLE -->

		<!-- A.3 HEADER BREADCRUMBS -->
		<!-- Breadcrumbs -->
		<div class="header-breadcrumbs">

		        <!-- Search form -->
			<div class="searchform">
				<form action="#" method="get" class="form">
					<fieldset>
						<input value=" Search..." name="field" class="field" />
						<input type="submit" value="go!" name="button" class="button" />
					</fieldset>
				</form>
			</div>
		</div>
		<!-- END A.3 HEADER BREADCRUMBS -->
	</div>
	<!-- END A. HEADER -->
	<!-- For alternative headers END PASTE here -->

	<!-- B. MAIN -->
	<div class="main">
		<!-- B.1 MAIN NAVIGATION -->
		<!--div class="main-navigation"-->
			<!-- Navigation Level 3 -->
			<!--div class="round-border-topright"></div-->

			<!-- Text formats -->
			<!--h1 class="first">Birthday Report</h1-->
		
		<!--/div-->
		<!-- END B.1 MAIN NAVIGATION -->

		<!-- B.2 MAIN CONTENT -->
		<div class="main-content">
	
			<!-- Pagetitle -->
			<h1 class="pagetitle">Report</h1>
	
			<!-- Content unit - One column -->
			<div class="column1-unit">
				
				<?
				if(!($result==false||mysql_num_rows($result)==0)){
				?>
				<table>
					<tr>
						<th class="top" scope="col">id</th>
						<th class="top" scope="col">acc_id</th>
                                                <th class="top" scope="col">seller_op_id</th>
                                                <th class="top" scope="col">mp_op_id</th>
                                                <th class="top" scope="col">status</th>
                                                <th class="top" scope="col">item_id</th>
                                                <th class="top" scope="col">name</th>
                                                <th class="top" scope="col">price</th>
                                                <th class="top" scope="col">ship_cost_amount</th>
                                                <th class="top" scope="col">additional_amount</th>
                                                <th class="top" scope="col">total_amount</th>
                                                <th class="top" scope="col">payment_method</th>
						<th class="top" scope="col">extra_part</th>
					</tr>
				
					<?
						while ($fila = mysql_fetch_array($result)){
							$id = $fila['id'];
							$acc_id = $fila['acc_id'];
                                                        $seller_op_id = $fila['seller_op_id'];
                                                        $mp_op_id = $fila['mp_op_id'];
                                                        $status = $fila['status'];
                                                        $item_id = $fila['item_id'];
                                                        $name = $fila['name'];
                                                        $price = $fila['price'];
                                                        $ship_cost_amount = $fila['ship_cost_amount'];
                                                        $additional_amount = $fila['additional_amount'];
                                                        $total_amount = $fila['total_amount'];
                                                        $payment_method = $fila['payment_method'];
                                                        $extra_part = $fila['extra_part'];
					?>
						<tr>
							<td scope="row"><?=$id?></td>
                                                        <td scope="row"><?=$acc_id?></td>
                                                        <td scope="row"><?=$seller_op_id?></td>
                                                        <td scope="row"><?=$mp_op_id?></td>
                                                        <td scope="row"><?=$status?></td>
                                                        <td scope="row"><?=$item_id?></td>
                                                        <td scope="row"><?=$name?></td>
                                                        <td scope="row"><?=$price?></td>
                                                        <td scope="row"><?=$ship_cost_amount?></td>
                                                        <td scope="row"><?=$additional_amount?></td>
                                                        <td scope="row"><?=$total_amount?></td>
                                                        <td scope="row"><?=$payment_method?></td>
							<td scope="row"><?=$extra_part?></td>							
						</tr>
						<?
						}
						?>
				</table>
				
				<?
				}
				?>
			</div>
		</div>
		<!-- END B.2 MAIN CONTENT -->
	</div>
	<!-- END B. MAIN -->

	<!-- C. FOOTER AREA -->
	<div class="footer">
		<p>Copyright &copy; 2007 Menel Sebasti&aacute;n | All Rights Reserved</p>
		<p class="credits">Original design by <a href="http://www.1-2-3-4.info" title="Designer Homepage" class="non-html">G. Wolfgang</a> | Adapted by Menel Sebasti&aacute;n | <a href="http://validator.w3.org/check?uri=referer" title="Validate XHTML code" class="non-html">W3C XHTML 1.0</a> | <a href="http://jigsaw.w3.org/css-validator/" title="Validate CSS code" class="non-html">W3C CSS 2.0</a></p>
	</div>
	<!-- END C. FOOTER AREA -->
	</div>
	<!-- END Main Page Container -->
</body>
</html>