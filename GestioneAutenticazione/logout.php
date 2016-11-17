<?php
include("../GestioneUtente/gestore_utente.php");
include("gestore_autenticazione.php");
	session_start();
	
	$ga = new gestore_autenticazione();
	$ga->logout();

?>