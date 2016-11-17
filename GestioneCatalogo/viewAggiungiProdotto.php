<?php
session_start();
	if(!isset($_SESSION['type_user']) || $_SESSION['type_user'] != 'admin') header("location: ../index.php");
	if(!isset($_GET['error'])) $error = 0;
	else $error = $_GET['error'];
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../CSS/navbar.css">
		<link rel="stylesheet" type="text/css" href="../CSS/admin.css">
		<title>Catalogo di LinkTech</title>
	</head>
	<body>
		<?php include("../common/header.php");?>
		<div id= "middle">
			<div id="segnalazione"><?php if($error!=0) echo "<p> Caricamento non riuscito, riprova</p>"; ?>
			</div>
			<div id="visualizza">
			<form method='POST' action='aggiungi_prodotto.php' enctype='multipart/form-data'>
				<table id='insert'>
					<tr><td class='sx'>Nome del prodotto</td><td><input type= 'text' name='nome' ></td></tr>
					<tr><td class='sx'>Marca</td><td><input type='text' name='marca' ></td></tr>
					<tr><td class='sx'>Codice a barre</td><td><input type='text' name='barcode'></td></tr>
					<tr><td class='sx'>Categoria</td><td><select name='categoria' id='cat'>
						<?php include("../utility/vis_categoria.php"); ?>
					</select></td></tr>
					<tr><td class='sx'>Descrizione</td><td><textarea name='descrizione'  cols='25' rows='4' ></textarea></td></tr>
					<tr><td class='sx'>Disponibilit&agrave;</td><td><input type='text' name='quantita'>&nbsp;pz</td></tr>
					<tr><td class='sx'>Prezzo vendita</td><td><input type='text' name='prezzo'>&nbsp;€</td></tr>
					<tr><td class='sx'>Immagine</td><td><input type='file' name='image' id='immagine'></td></tr>
					<input type='hidden' name='MAX_FILE_SIZE' value='30000'>
				</table>
				<div id='pulsanti'><input type='submit' value='Inserisci'>&nbsp;&nbsp;<input type='reset' value='Cancella'></div>
			</form>
			</div>
		</div>

		<?php include("../common/footer.php"); ?>
	</body>
</html>