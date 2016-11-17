<?php
	session_start();
	if(isset($_SESSION['username'])) header("location: ../index.php");

	include("../model/utente.php");
	include("gestore_utente.php");

	$user = $_POST['username'];
	$pass = $_POST['password'];
	$mail = $_POST['email'];
	$nome = $_POST['nome'];
	$cognome = $_POST['cognome'];
	$luogonasc = $_POST['luogonasc'];
	$gg = $_POST['gg'];
	$mm = $_POST['mm'];
	$aa = $_POST['aaaa'];
	$data = $aa."-".$mm."-".$gg;

	$user = new utente($user,$pass,$mail,$nome,$cognome,$data,$luogonasc,'1');
	$gu = new gestore_utente();
	$gu->inserisci_utente($user);
	header("location: ../GestioneAutenticazione/viewLogin.php");

?>