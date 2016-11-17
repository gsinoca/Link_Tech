<?php
session_start();
if(!isset($_SESSION['type_user']))$user = "none";
else{
	if($_SESSION['type_user']=="utente") $user="normal";
  	if($_SESSION['type_user']=="admin") $user="admin";
}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../CSS/navbar.css">
		<link rel="stylesheet" type="text/css" href="../CSS/admin.css">
		<script type="text/javascript" src="../JS/cercaProdotti.js"></script>
		<script type="text/javascript" src="../JS/carrello.js"></script>
		<title>Catalogo di LinkTech</title>
	</head>
	<body>
		<?php include("../common/header.php");?>
		<div id= "middle">
			<div id="operazioni">
				<?php include("seleziona_categorie.php");?>
				<input type="text" id="barcode"placeholder="Insert barcode" onkeyup='cercaProdotto(this.value,"barcode",<?php echo "\"$user\")";?>'>
				<input type="text" id="name"placeholder="Insert name" onkeyup='cercaProdotto(this.value,"nome",<?php echo "\"$user\")";?>'>
				<?php 
						if(isset($_SESSION['type_user']) && $_SESSION['type_user']=="admin") echo '<div id="add"><a href="viewAggiungiProdotto.php">Aggiungi prodotto</a></div>';?>
			</div>
			<div id="visualizza">
				<?php 
					
					include("visualizza_prodotti.php");
					    ?>
			</div>
		</div>

		<?php include("../common/footer.php"); ?>
	</body>
</html>