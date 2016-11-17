<?php
	class prodotto{
		var $barcode;
		var $nome;
		var $descrizione;
		var $quantita;
		var $prezzo;
		var $image;
		var $categoria;
		var $marca;

		function prodotto($_barcode,$_nome,$_descrizione,$_quantita,$_prezzo,$_image,$_categoria,$_marca){
			$this->barcode = $_barcode;
			$this->nome = $_nome;
			$this->descrizione = $_descrizione;
			$this->quantita = $_quantita;
			$this->prezzo = $_prezzo;
			$this->image = $_image;
			$this->categoria = $_categoria;
			$this->marca = $_marca;
		}

		function get_barcode(){
			return $this->barcode;
		}
		function get_nome(){return $this->nome;}
		function get_descrizione(){return $this->descrizione;}
		function get_quantita(){return $this->quantita;}
		function get_prezzo(){return $this->prezzo;}
		function get_image(){return $this->image;}
		function get_categoria(){return $this->categoria;}
		function get_marca(){return $this->marca;}

		function get_all_info(){
			$s= array();
			$s['Barcode']=$this->barcode;
			$s['Nome']=$this->nome;
			$s['Categoria']=$this->categoria;
			$s['Marca']=$this->marca;
			$s['Quantit&agrave;']=$this->quantita;
			$s['Prezzo']=$this->prezzo;
			return $s;
		}

		function stampa_in_riga(){
			$s= array();
			$s['image']=$this->image;
			$s['barcode']=$this->barcode;
			$s['nome']=$this->nome;
			$s['categoria']=$this->categoria;
			$s['marca']=$this->marca;
			$s['quantita']=$this->quantita;
			$s['prezzo']=$this->prezzo;
			
			return $s;
		}		
	}
?>