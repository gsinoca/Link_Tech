<?php
	include("gestore_ordine.php");
	//include("../model/ordine.php");
	include("../GestioneCatalogo/gestore_prodotto.php");
	session_start();
	if(!isset($_SESSION['type_user']) || $_SESSION['type_user']=="admin" )header("location: ../index.php");


	$spes = $_GET['spesa'];
	$user = $_SESSION['username'];

	$go = new gestore_ordine();
	$gp = new gestore_prodotto();

	$acquisti = $_SESSION['carrello'];
	unset($_SESSION['carrello']);
	$prodotti = array();

	for($i=0;$i<count($acquisti);$i++){
		$barcode = $acquisti[$i]['prodotto'];
		$prodotto = $gp->get_prodotto($barcode);
		$prodotti[$i]['prodotto'] = $prodotto;
		$prodotti[$i]['quantita'] = $acquisti[$i]['quantita'];
	}
	$id = $go->get_size_ordini();
	$id++;

	$ordine = new ordine($id,$user,date('Y-m-d'),date('H:i'),$spes,$prodotti);
	for($i=0;$i<count($prodotti);$i++){

		$gp->compra($prodotti[$i]['prodotto']->get_barcode(),$prodotti[$i]['quantita']);
	}

	$go->inserisci_ordine($ordine);
    header("location: ../GestioneOrdini/viewOrdine.php");

?>