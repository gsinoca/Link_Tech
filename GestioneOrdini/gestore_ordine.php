<?php
	include_once("../model/ordine.php");
	include_once("../utility/db.php");

	class gestore_ordine{

		var $db;
		var $gp;

		function gestore_ordine(){
			$this->db = new db();
			$this->gp = new gestore_prodotto();
		}
		function inserisci_ordine($_ordine){
			$query = "INSERT INTO ordine(idordine,user, data, ora, spesa) VALUES ('$_ordine->idordine','$_ordine->utente','$_ordine->data','$_ordine->ora','$_ordine->spesa')";
			$this->db->query($query);

			$prod = $_ordine->prodotti;

			for($i=0;$i<count($prod);$i++){
				$query = "INSERT INTO ordine_prodotto(codordine,codprodotto,quantita) VALUES ('".$_ordine->idordine."','".$prod[$i]['prodotto']->get_barcode()."','".$prod[$i]['quantita']."')";
				$this->db->query($query);
			}
		}

		function get_size_ordini(){
			$res = $this->db->query("SELECT * FROM ordine");
			return mysql_num_rows($res);
		}

		function get_ordini_utente($user){
			$ordini = array();
			$res = $this->db->query("SELECT idordine,data,ora,spesa FROM ordine WHERE user = '$user'");
			for($i=0;$i<mysql_num_rows($res);$i++){
				$arr = mysql_fetch_array($res,MYSQL_NUM);
				$info[$i]['Codice ordine'] = $arr[0];
				$info[$i]['Data'] = $arr[1];
				$info[$i]['Ora'] = $arr[2];
				$info[$i]['Spesa'] = $arr[3];
			}
			return $info;
		}

		function get_prodotti_ordine($idord){
			$prodotti = array();
			$res = $this->db->query("SELECT codprodotto,quantita FROM ordine_prodotto WHERE codordine = '$idord'");
			for($i=0;$i<mysql_num_rows($res);$i++){
				$arr = mysql_fetch_array($res,MYSQL_NUM);
				$prod = $this->gp->get_prodotto($arr[0]);
				$prodotti[$i]['prodotto'] = $prod;
				$prodotti[$i]['quantita'] = $arr[1];
			}
			
			return $prodotti;
		}
	}
?>