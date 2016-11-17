<?php
session_start();
if(!isset($_SESSION['type_user']))header("location: ../index.php");
else{
    if($_SESSION['type_user']=="utente") $user="normal";
    if($_SESSION['type_user']=="admin") header("location: ../index.php");
}
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../CSS/navbar.css">
        <link rel="stylesheet" type="text/css" href="../CSS/admin.css">
        <script type="text/javascript" src="../JS/cercaProdotti.js"></script>
        <script type="text/javascript" src="../JS/carrello.js"></script>
        <title>Catalogo di LinkTech</title>
    </head>
    <body>
        <?php include("../common/header.php");?>
        <div id= "middle">
            <div id="visualizza">
                <?php 
                    include("visualizza_carrello.php");
                        ?>
            </div>
        </div>

        <?php  include("../common/footer.php"); ?>
    </body>
</html>



