<?php
	include_once("gestore_ordine.php");

	$go = new gestore_ordine();

	$ordini = $go->get_ordini_utente($user);
	if(count($ordini) == 0) echo "<p>Non ci sono ordini da visualizzare</p>";
	else{
		echo "<table id='catalogo_user'><thead>";
		echo "<th>Codice ordine</th><th>Numero prodotti</th><th>Spesa Totale</th><th>Data</th></thead>";

		for($i=0;$i<count($ordini);$i++){
			echo "<tr>";
			echo "<td>".$ordini[$i]['Codice ordine']."</td>";
			echo "<td></td>";
			echo "<td>".$ordini[$i]['Spesa']."&euro;</td>";
			echo "<td>".$ordini[$i]['Data']."</td>";
			echo "<tr>";
		}

		echo "<table>";
	}
?>