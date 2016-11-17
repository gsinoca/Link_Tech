<?php
	
	if(!isset($_SESSION['type_user']) || $_SESSION['type_user']=="utente" ) header("location: ../index.php");
	
	include("../model/utente.php");
	include("gestore_utente.php");

	$gu = new gestore_utente();
	if($var==0){
		$resource = $gu->get_all_users();
		$size=$gu->get_size_utente();
	}
	if($var==1){
		$resource = $gu->get_admin_users();
		$size=$gu->get_size_admin();
	}
	if($size>0){
		$field_name = $resource[0]->get_all_info();
		echo ' <table id="catalogo"><thead><tr>';
		foreach ($field_name as $key => $value) {
			echo "<th>".$key."</th>";
		}
		echo "<th></th>";
		echo '</tr></thead>';
		for($i=0;$i<count($resource);$i++){
			$user= array();
			$user = $resource[$i]->get_all_info();
			echo "<tr>";
			foreach ($user as $key => $value) {
				echo "<td>".$value."</td>";
			}
			echo "<td><a href=elimina_utente.php?username=".$resource[$i]->get_username()."&operation=".$var.">Elimina</a></td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	else echo"<p>Nessun cliente è registrato al sito </p>";
?>