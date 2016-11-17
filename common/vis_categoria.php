<?php
	include_once("../utility/db.php");
	$db = new db();

	$res = $db->query("SELECT * from categorie");
	for($i=0;$i<mysql_num_rows($res);$i++){
		$arr = mysql_fetch_array($res,MYSQL_NUM);
		echo "<option value='$arr[0]'>$arr[0]</option>";
	}
?>