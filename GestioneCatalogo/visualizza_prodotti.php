<?php
	
	//if(!isset($_SESSION['type_user']) || $_SESSION['type_user']=="utente" ) header("location: ../index.php");
	
	/*include("../model/utente.php");
	include("gestore_prodotto.php");*/

	$gp = new gestore_prodotto();
	if($user == "admin")$resource = $gp->get_all_prodotti();
	else $resource = $gp->get_disponibili();
	$size = count($resource);
	if($size>0){
		if($user=="admin") {

			echo ' <table id="catalogo">';
		}
		else echo'<table id="catalogo_user">';
		echo '<thead><tr><th></th><th></th>';
		$field_name = $resource[0]->get_all_info();
		foreach ($field_name as $key => $value) {
			echo "<th>".$key."</th>";
		}
		echo "<th></th>";
		echo '</tr></thead>';
		echo '<tbody>';
		for($i=0;$i<count($resource);$i++){
			$prod= array();
			$prod = $resource[$i]->stampa_in_riga();
			echo "<tr><td><a title='Vai alla descrizione' href='viewDescrizioneProdotto.php?barcode=".$resource[$i]->get_barcode()."'><img src='../image/info.png' style='width:20px; height:20px; cursor:pointer;'></a></td>";
			echo "<td><img id='intab' src=".$prod['image']."></td>";
			echo "<td>".$prod['barcode']."</td>";
			echo "<td>".$prod['nome']."</td>";
			echo "<td>".$prod['categoria']."</td>";
			echo "<td>".$prod['marca']."</td>";
			if($user=="normal"){
				echo "<td><select id='$i'>";
				for($k=1;$k<=$prod['quantita'];$k++) echo "<option value='$k'>$k</option>";
				echo "</select></td>";
			}
			else echo "<td>".$prod['quantita']."</td>";
			echo "<td>".$prod['prezzo']."&euro;</td>";


			if($user=="admin"){
				echo "<td><a href=elimina_prodotto.php?barcode=".$resource[$i]->get_barcode().">Elimina</a><br><a href=modifica_prodotto.php?barcode=".$resource[$i]->get_barcode()." id='modifica' style='color:green'>Modifica</a></td>";
				echo "</tr>";
			}
			if($user=="normal"){
				echo "<td><button style='background-color:white; border-width:0px; cursor:pointer'  onclick='aggiungiCarrello(".$resource[$i]->get_barcode().",document.getElementById(\"$i\").value)'><img src='../image/carrello.jpg' style='width:20px; height:20px;'></button>";
				//echo "<td><a title='Aggiungi al carrello' href='gestore_carrello.php?barcode=".$resource[$i]->get_barcode()."'><img src='../image/carrello.jpg' style='width:20px; height:20px;'></a>";
			}
			else{
				echo "</tr>";
			}
		}
		echo "</tbody>";
		echo "</table>";
	}
	else echo"<p>Nessun prodotto è presente nel catalogo </p>";
?>