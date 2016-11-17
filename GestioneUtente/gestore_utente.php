<?php
	include_once("../model/utente.php");
	include_once("../utility/db.php");
	class gestore_utente{ 
		
		var $db;

		function gestore_utente(){
			$this->db = new db();
		}

		function inserisci_utente($_user){
			$query ="INSERT INTO utente(username, password, nome, cognome, luogonasc, datanasc, email) VALUES ('$_user->username','$_user->password','$_user->nome','$_user->cognome','$_user->luogoNascita','$_user->dataNascita','$_user->email')";
			if($this->db->query($query)) return true;
			else return false;
		} 
 
		function elimina_user($user){
			$query ="DELETE FROM utente WHERE username = '$user' ";
			if($this->db->query($query)) return true;
			else return false;
		}
		function inserisci_admin($_user){
			$query ="INSERT INTO utente(username, password, nome, cognome, luogonasc, datanasc, email,admin) VALUES ('$_user->username','$_user->password','$_user->nome','$_user->cognome','$_user->luogoNascita','$_user->dataNascita','$_user->email','0')";
			if($this->db->query($query)) return true;
			else return false;
		}

		function get_size_utente(){
			$res = $this->db->query("SELECT * FROM utente WHERE admin = '1'");
			return mysql_num_rows($res);
		}

		function get_size_admin(){
			$res = $this->db->query("SELECT * FROM utente WHERE admin = '0'");
			return mysql_num_rows($res);

		}
		//Controlla se esiste un username passato come parametro
		function esiste_username($_username){
			$query = "SELECT * FROM utente WHERE username= '$_username'";
			$res = $this->db->query($query);
			if(mysql_num_rows($res)==0)return false;
			else return true;
		}

		function esiste_email($_email){
			$query = "SELECT * FROM utente WHERE email= '$_email'";
			$res = $this->db->query($query);
			if(mysql_num_rows($res)==0)return false;
			else return true;
		}


		//Controlla se esiste un utente
		function esiste_utente($_user,$_pass){
			$res = $this->db->query("SELECT * FROM utente WHERE username= '$_user' AND password='$_pass'");
			if(mysql_num_rows($res)==0)return false;
			else return true;
		}

		//Controlla se l'utente è un admin
		function type_user($_username){
			$res = $this->db->query("SELECT admin from utente where username= '$_username'");
			if(!$res) return "none";
			$row = mysql_fetch_array($res,MYSQL_NUM);
			$admin = $row[0];

			if($admin==0) 
				return "admin";
			else{ 
				return "utente";
			}
		}

		function get_all_users(){
			$users = array();
			$res = $this->db->query("SELECT username,password,email,nome,cognome,datanasc,luogonasc FROM utente WHERE admin = '1'");
			for($i=0;$i<mysql_num_rows($res);$i++){
				$arr = mysql_fetch_array($res,MYSQL_NUM);
				$users[$i] = new utente($arr[0],$arr[1],$arr[2],$arr[3],$arr[4],$arr[5],$arr[6],'1');
			}
			return $users;
		}

		function get_admin_users(){
			$res = $this->db->query("SELECT username,password,email,nome,cognome,datanasc,luogonasc FROM utente WHERE admin = '0'");
			for($i=0;$i<mysql_num_rows($res);$i++){
				$arr = mysql_fetch_array($res,MYSQL_NUM);
				$users[] = new utente($arr[0],$arr[1],$arr[2],$arr[3],$arr[4],$arr[5],$arr[6],'0');
			}
			return $users;
		}

	}
?>