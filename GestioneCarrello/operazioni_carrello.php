<?php
    $barcode = $_GET['barcode'];
	$quantita = $_GET['quantita'];
	$op = $_GET['operation'];
    include("gestore_carrello.php");
	session_start();
    if(!isset($_SESSION['carrello']))$_SESSION['carrello'] = array();
    $gc = new gestore_carrello();
    if ($op != "")
    {
        switch ($op)
        {
            case "aggiungi" :
                    $_SESSION["carrello"] = $gc->aggiungi($barcode, $quantita,$_SESSION["carrello"]);
           			break;
            case "elimina" :
                $_SESSION['carrello'] = $gc->elimina($barcode,$_SESSION['carrello']);
                if (count($_SESSION["carrello"]) == 0) unset($_SESSION["carrello"]);
                break;
        }
        header("location: ../GestioneCarrello/viewCarrello.php");
    }
?>