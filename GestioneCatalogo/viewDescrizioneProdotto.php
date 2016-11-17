<?php session_start();?>
	<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../CSS/navbar.css">
		<link rel="stylesheet" type="text/css" href="../CSS/admin.css">
		<link rel="stylesheet" type="text/css" href="../CSS/descrizione.css">
		<title>Catalogo di LinkTech</title>
	</head>
	<body>
		<?php include("../common/header.php");?>
		<div id= "middle">
			<div id="visualizza">
				<?php include('descrizione_prodotto.php'); ?>
			</div>
		</div>
		<?php include("../common/footer.php"); ?>
	</body>
</html>
