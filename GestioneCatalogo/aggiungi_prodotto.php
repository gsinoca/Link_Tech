<?php
	session_start();
	if(!isset($_SESSION['type_user']) || $_SESSION['type_user'] != 'admin') header("location: ../index.php");

	include_once("../model/prodotto.php");
	include_once("gestore_prodotto.php");

	$caricamento['nome'] = $_POST['nome'];
	$caricamento['marca'] = $_POST['marca'];
	$caricamento['barcode'] = $_POST['barcode'];
	$caricamento['categoria'] = $_POST['categoria'];
	$caricamento['descrizione'] = $_POST['descrizione'];
	$caricamento['quantita'] = $_POST['quantita'];
	$caricamento['prezzo'] = $_POST['prezzo'];
	$er = 0;
	
	foreach ($caricamento as $key => $value) {
		if($value=="") $er++;
	}
	if(is_nan($caricamento['prezzo'])) $er++;
	if(is_nan($caricamento['quantita']) || $caricamento['quantita']<=0) $er++;

	$image_tmp = $_FILES['image']['tmp_name'];
	$percorso ="../image/";
	$name = $percorso.$caricamento['barcode'].".jpg";
	$inv = file_exists($image_tmp);
	if($inv){
			move_uploaded_file($image_tmp,$name);
	}
	else{
		$name = $percorso."default.jpg";
	}	
	
	$prod = new prodotto($caricamento['barcode'],$caricamento['nome'],$caricamento['descrizione'],$caricamento['quantita'],$caricamento['prezzo'],$name,$caricamento['categoria'],$caricamento['marca']);
	$gp = new gestore_prodotto();
	if(!$gp->inserisci_prodotto($prod))  $er++;

	if($er==0) header("location: viewCatalogo.php");
	else  header("location: viewAggiungiProdotto.php?error=1");
?>