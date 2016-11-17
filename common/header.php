<?php 
function getBaseURL() {
	if ( (isset($_SERVER["HTTPS"])) && ($_SERVER["HTTPS"] == "on") ) $base_url = "https://" ;
	else $base_url = 'http://' ;
	if ($_SERVER["SERVER_PORT"] != "80") {
		$base_url .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"] ;
	} else {
		$base_url .= $_SERVER["SERVER_NAME"] ;
	}
	return $base_url.'/~GSinoca/Link_Tech';
}

$root = getBaseURL();
//include($root."/GestioneAutenticazione/logout.php");
/*Controllo il tipo di user e di conseguenza setto i link della navbar*/
if(isset($_SESSION['type_user']) && isset($_SESSION['username'])){
	if($_SESSION['type_user']=='admin'){
		$navbar_1 = '<a href="'.$root.'/GestioneUtente/viewUtenti.php?operation=0" title="Login"> CLIENTI </a>';
		$navbar_2 = '<a  href="'.$root.'/GestioneAccount/viewRegistrazione.php" title="Registrati" > ORDINI </a>';
		$navbar_4 = '<a  href="'.$root.'/GestioneUtente/viewUtenti.php?operation=1" title="Admin di linktech"> ADMIN </a>';
		$header_1 = '<a id="primo" href="'.$root.'/GestioneAutenticazione/logout.php" title="logout">LOGOUT</a>';
	}
	else{
		$navbar_1 = '<a href="'.$root.'/GestioneAutenticazione/logout.php" title="Logout"> LOGOUT </a>';
		$navbar_2 = '<a id="primo" href="'.$root.'/GestioneCarrello/viewCarrello.php" title="Vai al carrello"> CARRELLO</a>';
		$navbar_4 = '<a  href="'.$root.'/GestioneOrdini/viewOrdine.php" title="Vai agli ordini"> ORDINI</a>';
		$header_1 = '<a id="primo" href="'.$root.'/index.php" title="LINK Technologies: La nostra esperienza al vostro servizio!"> LINK technologies</a>';
	}
	$header_3 = '<p> Benvenuto '.$_SESSION['username'].'</p>';
}
else{
	$navbar_1 = '<a href="'.$root.'/GestioneAutenticazione/viewlogin.php" title="Login"> LOGIN </a>';
	$navbar_2 = '<a  href="'.$root.'/GestioneUtente/viewRegistrazione.php" title="Registrati" > REGISTRATI </a>';
	$navbar_4 = '<a  href="" title="Chiedi al Negozio"> INFO</a>';
	$header_1 = '<a id="primo" href="'.$root.'/index.php" title="LINK Technologies: La nostra esperienza al vostro servizio!"> LINK technologies</a>';
	$header_3 = '<a id="terzo" href="'.$root.'/index.php" title="Per info e contatti chiama al numero di sopra riportato"> Contatti</a>';
}
	$navbar_3 = '<a href="'.$root.'/GestioneCatalogo/viewCatalogo.php" title="Catalogo"> CATALOGO </a>';
	echo '<div id="header">
				<span id="left">'.$header_1.'
				</span>
				<span id="center">
					<a id="secondo" href="'.$root.'/index.php" title="Contatta il nostro supporto E-mail!"> info.linktech.ita@gmail.com </a>
				</span>
				<span id="right">'.$header_3.'
				</span>
		</div>';
	echo '<div id="navbar">
			<div id="red" >'.$navbar_1.'</div>
			<div id="blue">'.$navbar_2.'</div>
			<div id="green">'.$navbar_3.'</div>
			<div id="yellow">'.$navbar_4.'</div>
		</div>';
?>