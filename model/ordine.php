<?php
	class ordine{
		var $idordine;
		var $utente;
		var $data;
		var $ora;
		var $prodotti;
		var $spesa;


		function ordine($_id,$_user,$_data,$_ora,$_spesa,$_prodotti){
			$this->idordine = $_id;
			$this->utente = $_user;
			$this->data = $_data;// date('Y-m-d');
			$this->ora = $_ora;// date('H:i');
			$this->prodotti = $_prodotti;
			$this->spesa = $_spesa;
		}
		function get_id(){
			return $this->idordine;
		}

		function get_utente(){
			return $this->utente;
		}

		function get_spesa(){
			return $this->spesa;
		}

		function get_date(){
			return $this->data." ".$this->ora;
		}

		function get_prodotti(){
			return $this->$_prodotti;
		}


	}
?>