<?php
	include_once("../model/prodotto.php");
	include_once("../utility/db.php");
	class gestore_prodotto{
		var $db;

		function gestore_prodotto(){
			$this->db = new db();
		}


		function inserisci_prodotto($_prod){
			$query ="INSERT INTO prodotto(idprodotto, nome, descrizione, quantita, prezzo, image, categoria,marca) VALUES ('$_prod->barcode','$_prod->nome','$_prod->descrizione','$_prod->quantita','$_prod->prezzo','$_prod->image','$_prod->categoria','$_prod->marca')";
			if($this->db->query($query)) return true;
			else return false;
		}

		function elimina_prodotto($_barcode){
			$query ="DELETE FROM prodotto WHERE idprodotto = '$_barcode' ";
			if($this->db->query($query)) return true;
			else return false;
		}

		function get_all_prodotti(){
			$prods = array();
			$res = $this->db->query("SELECT idprodotto, nome, descrizione, quantita, prezzo, image, categoria,marca FROM prodotto");
			for($i=0;$i<mysql_num_rows($res);$i++){
				$arr = mysql_fetch_array($res,MYSQL_NUM);
				$prods[$i] = new prodotto($arr[0],$arr[1],$arr[2],$arr[3],$arr[4],$arr[5],$arr[6],$arr[7]);
			}
			return $prods;
		}

		function get_size_catalogo(){
			$res = $this->db->query("SELECT * FROM prodotto");
			return mysql_num_rows($res);
		}

		function get_esauriti(){
			$prods = array();
			$res = $this->db->query("SELECT idprodotto, nome, descrizione, quantita, prezzo, image, categoria,marca FROM prodotto WHERE quantita = '0'");
			for($i=0;$i<mysql_num_rows($res);$i++){
				$arr = mysql_fetch_array($res,MYSQL_NUM);
				$prods[$i] = new prodotto($arr[0],$arr[1],$arr[2],$arr[3],$arr[4],$arr[5],$arr[6],$arr[7]);
			}
			return $prods;
		}

		function get_disponibili(){
			$prods = array();
			$res = $this->db->query("SELECT idprodotto, nome, descrizione, quantita, prezzo, image, categoria,marca FROM prodotto WHERE quantita > '0'");
			for($i=0;$i<mysql_num_rows($res);$i++){
				$arr = mysql_fetch_array($res,MYSQL_NUM);
				$prods[$i] = new prodotto($arr[0],$arr[1],$arr[2],$arr[3],$arr[4],$arr[5],$arr[6],$arr[7]);
			}
			return $prods;
		}

		function get_categorie(){
			$prods = array();
			$res = $this->db->query("SELECT DISTINCT categoria FROM prodotto");
			for($i=0;$i<mysql_num_rows($res);$i++){
				$arr = mysql_fetch_array($res,MYSQL_NUM);
				$prods[$i] = $arr[0];
			}
			return $prods;
		}
		
		function get_prodotto($barcode){
			$res = $this->db->query("SELECT idprodotto,nome,descrizione,quantita,prezzo,image,categoria,marca FROM prodotto WHERE idprodotto = '".$barcode."'");
			for($i=0;$i<mysql_num_rows($res);$i++){
				$arr = mysql_fetch_array($res,MYSQL_NUM);
				$prods = new prodotto($arr[0],$arr[1],$arr[2],$arr[3],$arr[4],$arr[5],$arr[6],$arr[7]);
			}
			return $prods;
		}

		function get_prods_byname($nome){
			$prods = array();
			$res = $this->db->query("SELECT idprodotto, nome, descrizione, quantita, prezzo, image, categoria,marca FROM prodotto WHERE nome LIKE '%$nome%'");
			for($i=0;$i<mysql_num_rows($res);$i++){
				$arr = mysql_fetch_array($res,MYSQL_NUM);
				$prods[$i] = new prodotto($arr[0],$arr[1],$arr[2],$arr[3],$arr[4],$arr[5],$arr[6],$arr[7]);
			}
			return $prods;
		}

		function get_prods_bybarcode($barcode){
			$prods = array();
			$res = $this->db->query("SELECT idprodotto, nome, descrizione, quantita, prezzo, image, categoria,marca FROM prodotto WHERE idprodotto LIKE '%$barcode%'");
			for($i=0;$i<mysql_num_rows($res);$i++){
				$arr = mysql_fetch_array($res,MYSQL_NUM);
				$prods[$i] = new prodotto($arr[0],$arr[1],$arr[2],$arr[3],$arr[4],$arr[5],$arr[6],$arr[7]);
			}
			return $prods;
		}

		function get_prods_bycategoria($cat){
			$prods = array();
			$res = $this->db->query("SELECT idprodotto, nome, descrizione, quantita, prezzo, image, categoria,marca FROM prodotto WHERE categoria = '$cat'");
			for($i=0;$i<mysql_num_rows($res);$i++){
				$arr = mysql_fetch_array($res,MYSQL_NUM);
				$prods[$i] = new prodotto($arr[0],$arr[1],$arr[2],$arr[3],$arr[4],$arr[5],$arr[6],$arr[7]);
			}
			return $prods;
		}
		
		function esiste_barcode($barcode){
			$res = $this->db->query("SELECT * FROM prodotto WHERE idprodotto= '$barcode'");
			if(mysql_num_rows($res)==0)return false;
			else return true;
		}
		
		function compra($barcode,$quantita){
			$p = $this->get_prodotto($barcode);
			$disp = $p->get_quantita();
			if( $disp >= $quantita ){
				$disp = $disp-$quantita;
				$res = $this->db->query("UPDATE prodotto SET quantita = '$disp' WHERE idprodotto= '$barcode'");
				return true;
			}
			else return false;
		}

	}

?>