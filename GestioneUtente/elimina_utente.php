<?php
session_start();
include("gestore_utente.php");
	if(!isset($_SESSION['type_user'])) header("location: ../index.php");
	if($_SESSION['type_user']=="utente") header("location: ../index.php");
	$username = $_GET['username'];
	$var=$_GET['operation'];
	$gu = new gestore_utente();
	if($username == $_SESSION['username']) header("location: viewUtenti.php?operation=1");
	else if($gu->esiste_username($username)) {
		$gu->elimina_user($username);
	}
	
	header("location: viewUtenti.php?operation=".$var);
?>