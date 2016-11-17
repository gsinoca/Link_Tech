<?php
	
	class db {

		protected $HOST = "localhost";
		protected $USER = "root";
		protected $PASS = "";
		protected $DB_NAME = "my_progettolinktech";

		function __construct(){
			mysql_connect($this->HOST,$this->USER,$this->PASS) or die('Errore '.mysql_error);
			mysql_select_db($this->DB_NAME) or die('Errore '.mysql_error);
		}

		function query($query){
			$res = mysql_query($query);
			return $res;
		}

	}
	

