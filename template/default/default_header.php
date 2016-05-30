<html>
	<head>
		<title>BlackPear - BlackPear Drive-by Generator.</title>
		<link href="<?php print $templateUsed['css']; ?>" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="template/default/js/jquery.js"></script>
		<script type="text/javascript" src="template/default/js/interface.js"></script>
		<link href="template/default/fisheye.css" rel="stylesheet" type="text/css" />

		<!--[if lt IE 7]>
		 <style type="text/css">
		 div, img { behavior: url(template/default/iepngfix.htc) }
		 </style>
		<![endif]-->
	</head>
	<body>
		
		<div align="center">
			<?php if($mod_login->isLogged()) include("pages/menu.php"); ?>
				<img style="margin-top: 5px; margin-bottom: 20px;" id="banner" src="template/default/images/logo.png"/><br/>
		</div>