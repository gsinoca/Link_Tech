<?php
session_start();
	if(!isset($_SESSION['type_user'])) header("location: ../index.php");
	if($_SESSION['type_user']=="utente") header("location: ../index.php");
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../CSS/navbar.css">
		<link rel="stylesheet" type="text/css" href="../CSS/admin.css">
		<title>Clienti di LinkTech</title>
	</head>
	<body>
		<?php include("../common/header.php");?>
		<div id= "middle">
			<div id="visualizza">
				<?php $var = $_GET['operation']; include("visualizza_utenti.php");?>
			</div>
		</div>

		<?php include("../common/footer.php"); ?>
	</body>
</html>