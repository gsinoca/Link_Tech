<?php
	include("gestore_prodotto.php");
	$input= $_GET['input'];
	$tipo_ricerca = $_GET['type'];

	header('Content-Type: text/xml');
	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	
	echo '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
	$gp = new gestore_prodotto();
	if($tipo_ricerca=="barcode"){
		$arr=$gp->get_prods_bybarcode($input);
	}
	if($tipo_ricerca=="nome"){
		$arr=$gp->get_prods_byname($input);
	}
	if($tipo_ricerca=="categoria"){
		$arr=$gp->get_prods_bycategoria($input);
	}

	echo "<response>";
		for($i=0;$i<count($arr);$i++){
			echo '<elemento>';
			$row = $arr[$i]->stampa_in_riga();
			foreach ($row as $key => $value) {
				echo "<$key>$value</$key>";
			}
			echo "</elemento>";
		}
	echo "</response>";


?>