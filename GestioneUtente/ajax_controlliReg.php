<?php
	include("gestore_utente.php");
	$gu = new gestore_utente();
	if(isset($_GET['mail'])){
		$mail = $_GET['mail'];
		if($gu->esiste_email($mail)) echo "esiste";
		else "non esiste";
	}
	if(isset($_GET['user'])){
		$username = $_GET['user'];
		if($gu->esiste_username($username))echo "esiste";
		else "non esiste";
	}
?>