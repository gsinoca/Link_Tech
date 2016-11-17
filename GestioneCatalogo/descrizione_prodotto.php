<?php
	include_once("gestore_prodotto.php");
	include_once("../model/prodotto.php");
	$gp = new gestore_prodotto();

	$barcode = $_GET['barcode'];
	$prodotto = $gp->get_prodotto($barcode);

	echo "<p id='intestazione'>".$prodotto->get_marca()."&nbsp;".$prodotto->get_nome()."&nbsp;&nbsp;(".$prodotto->get_barcode().")</p>";
	echo "<div id='image'><img src='".$prodotto->get_image()."'></div>";
	echo "<div id='descrizione'>".$prodotto->get_descrizione()."</div>";
	echo "<div id='compra'><p>Disponibilit&agrave; : ".$prodotto->get_quantita()."pz&nbsp;&nbsp;Prezzo: ".$prodotto->get_prezzo()."€</p></div>";
	echo "<div id='back'><a href='viewCatalogo.php' title='Vai al catalogo'>Vai al catalogo</a></div>";
?>
