<?php
include("../GestioneOrdini/gestore_ordine.php");
//include("../model/ordine.php");
include("../GestioneCatalogo/gestore_prodotto.php");
session_start();
if(!isset($_SESSION['type_user']))header("location: ../index.php");
else{
    if($_SESSION['type_user']=="admin") header("location: ../index.php");
}

$spes = $_GET['spesa'];
$user = $_SESSION['username'];

$go = new gestore_ordine();
$gp = new gestore_prodotto();

for($i=0;$i<count($_SESSION['carrello']);$i++){
	$acquisti[$i]['prodotto']=$_SESSION['carrello'][$i]['prodotto'];
	$acquisti[$i]['quantita']=$_SESSION['carrello'][$i]['quantita'];
}
$ord = new ordine($spes,$user,$acquisti);
for($i=0;$i<count($acquisti);$i++){
	$gp->compra($acquisti[$i]['prodotto']);
}
$go->inserisci_ordine($ord);


header("location: ../GestioneOrdini/viewOrdine.php");

?>