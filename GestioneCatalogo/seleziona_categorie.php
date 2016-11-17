<?php
	include("gestore_prodotto.php");

	$gp = new gestore_prodotto();
	$res = $gp->get_categorie();
	echo "<select id='categoria' onchange='cercaProdotto(this.value,\"categoria\",\"".$user."\")'><option value=''>Seleziona categoria</option>";
	for($i=0;$i<count($res);$i++){
		echo "<option value='$res[$i]'>$res[$i]</option>";
	}
	echo "</select>";
?>