<?php
session_start();
if(isset($_SESSION['username'])) header("location: ../index.php");
if(isset($_GET['error'])) $error = $_GET['error'];
else $error = 0;
?>
<!DOCTYPE html>
<html>  
<head>
	<link rel="stylesheet" type="text/css" href="../CSS/navbar.css">
	<link rel="stylesheet" type="text/css" href="../CSS/login.css">
	<title>Benvenuto su LINKTECH</title>
</head>
<body>
	<?php include("../common/header.php"); ?>

		<div id= "middle">
			<?php if($error==1) echo "<div id='segnala'><p>Errore nell'autenticazione, riprova</p></div>"; ?>
			<div id="tabella">
				<table>
					<form method="POST" action="effettua_login.php">
						<thead> <tr> <th colspan="3">Inserisci qui i tuoi dati </th></tr></thead>
						<tr><td> Username </td><td></td> <td><input type="text" name="user"></td></tr>
						<tr><td> Password </td><td></td><td><input type="password" name="pass"></td></tr>
						<tfoot>
							<tr id="bottoni">
								<td id="bottsx"> <input type="submit" value="Invia"></td><td></td>
								<td id="bottdx"><input type="reset" value="Cancella"></td>
							</tr>
						</tfoot>
				</table>
			</div>
			</form>
		</div>
	<?php include("../common/footer.php"); ?>
</body>
</html>