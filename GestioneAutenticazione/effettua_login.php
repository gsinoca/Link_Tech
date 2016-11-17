<?php

include("../GestioneUtente/gestore_utente.php");
include("gestore_autenticazione.php");
session_start();

if(isset($_SESSION['username'])){
	if ($_SESSION['admin'] == 1) header("../index.php");
	else header("location: ../index.php");
}

$username = $_POST['user'];
$password = $_POST['pass'];

$ga = new gestore_autenticazione; 
	if($ga->login($username,$password))
		header("location: ../index.php");
	else{
		header("location: viewLogin.php?error=1");
	}
?>

