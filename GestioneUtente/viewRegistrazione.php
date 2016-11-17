<?php
session_start();
	if(isset($_SESSION['username'])) header("location: index.php");
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../CSS/navbar.css">
		<link rel="stylesheet" type="text/css" href="../CSS/registrazione.css">
		<script type="text/javascript" src="../JS/controlliReg.js"></script>
		<title>Registrazione</title>
	</head>
	<body>
		<?php include("../common/header.php");?>
		<div id= "middle">
			<p>Inserisci i tuoi dati per registrarti a LinkTech </p>
			<form method="POST" action="gestore_registrazione.php">
			<table>
				<tr><td>Username</td>
					<td><input type="text" class="campi" name="username" onblur="controlUser(this.value)" id="usern"></td>
				</tr>
				<tr><td>Password</td>
					<td><input type="password" class="campi" name="password" onblur="controlPass(this.value)" id="pass"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" class="campi" name="email" onblur="controlEmail(this.value)" id="mail"></td>
				</tr>
				<tr><td>Nome</td>
					<td><input type="text" class="campi" name="nome" onblur="controlLeng(this.id,this.value)" id="na"></td></tr>
				<tr><td>Cognome</td><td><input type="text" class="campi" name="cognome" onblur="controlLeng(this.id,this.value)" id="co"></td></tr>
				<tr><td>Luogo di Nascita</td><td><input type="text" class="campi" name="luogonasc" id="luogo" onblur="controlLuogo(this.value)"></td></tr>
				<tr><td>Data di Nascita</td>
					<td id="data">
						<input type="text" name="gg" class="campi" placeholder="gg" id="gg" onblur="controlDataG(this.value)" >&nbsp;/&nbsp;
						<input type="text" name="mm" class="campi"  placeholder="mm" id="mm" onblur="controlDataM(this.value)" >&nbsp;/&nbsp;
						<input type="text" name="aaaa" class="campi" placeholder="aaaa" id="aaaa" onblur="controlDataA(this.value)" >
					</td>
				</tr>
			</table>
			<div id="bott">
					<input type="submit" value="Invia" id="submit" disabled> 
					<input type="reset" value="Cancella">
			</div>
			</form>
		</div>
		<div id="segnalazioni" style="display:none"></div>

		<?php include("../common/footer.php"); ?>
	</body>
</html>