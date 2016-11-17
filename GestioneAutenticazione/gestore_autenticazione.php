<?php
	//include("../GestioneUtente/gestore_utente.php");
	class gestore_autenticazione{

		var $gu;

		function gestore_autenticazione(){
			$this->gu = new gestore_utente();
		}

		function login($_user,$_password){
			
			if($this->gu->esiste_utente($_user,$_password)){
				$type = $this->gu->type_user($_user);
				$_SESSION['username'] = $_user;
				$_SESSION['type_user'] = $type;
				return true;
			}
			return false;
		}

		function logout(){
			session_destroy();
			header("location: ../index.php");
		}

	}

?>