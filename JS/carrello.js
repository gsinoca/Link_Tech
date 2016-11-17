function aggiungiCarrello(barcode,quantity){
	document.location.href = "../GestioneCarrello/operazioni_carrello.php?operation=aggiungi&barcode="+barcode+"&quantita="+quantity;
}
function eliminaCarrello(barcode){
	document.location.href = "../GestioneCarrello/operazioni_carrello.php?operation=elimina&barcode="+barcode+"&quantita=0";
}