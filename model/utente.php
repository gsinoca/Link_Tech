<?php
	class utente{
		var $username;
		var $password;
		var $email;
		var $nome;
		var $cognome;
		var $dataNascita;
		var $luogoNascita;
		var $is_admin;

		function utente($_username,$_password,$_email,$_nome,$_cognome,$_dataNascita,$_luogoNascita,$_is_admin){
			$this->username = $_username;
			$this->password = $_password;
			$this->email = $_email;
			$this->nome = $_nome;
			$this->cognome = $_cognome;
			$this->dataNascita = $_dataNascita;
			$this->luogoNascita = $_luogoNascita;
			$this->is_admin = $_is_admin;
		}

		function get_all_info(){
			$s= array();
			$s['Username']=$this->username;
			$s['E-mail']=$this->email;
			$s['Nome']=$this->nome;
			$s['Cognome']=$this->cognome;
			$s['Data di nascita']=$this->dataNascita;
			$s['Luogo di nascita']=$this->luogoNascita;
			return $s;
		}

		function get_username(){
			return $this->username;
		}
		function get_email(){
			return $this->email;
		}

	}
?>