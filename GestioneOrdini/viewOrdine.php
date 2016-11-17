<?php
session_start();
if(!isset($_SESSION['type_user']))header("location: ../index.php");
else{
    if($_SESSION['type_user']=="admin") header("location: ../index.php");
    $user = $_SESSION['username'];
}
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../CSS/navbar.css">
        <link rel="stylesheet" type="text/css" href="../CSS/admin.css">
        <script type="text/javascript" src="../JS/cercaProdotti.js"></script>
        <script type="text/javascript" src="../JS/carrello.js"></script>
        <title>Storico ordini</title>
    </head>
    <body>
        <?php include("../common/header.php");?>
        <div id= "middle">
            <div id="visualizza">
                <?php 
                    include("visualizza_ordini.php");
                        ?>
            </div>
        </div>

        <?php  include("../common/footer.php"); ?>
    </body>
</html>