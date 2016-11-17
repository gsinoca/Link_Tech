<?PHP
    include_once("../GestioneCatalogo/gestore_prodotto.php");
    $GP = new gestore_prodotto();

    if (!isset($_SESSION["carrello"]))
        echo "<p>Il tuo carrello è vuoto...</p>";
    else
    {
        $barcode = $_SESSION["carrello"][0]["prodotto"];
        $quantita = $_SESSION["carrello"][0]["quantita"];
        $prod = $GP->get_prodotto($barcode);
        echo '<table id="catalogo_user"><thead><tr><th></th><th></th>';
        $field_name = $prod->get_all_info($barcode);
        foreach ($field_name as $key => $value) {
            echo "<th>".$key."</th>";
        }
        echo "<th>Totale</th><th></th>";
        echo '</tr></thead>';

        for($x=0; $x<count($_SESSION["carrello"]); $x++)
        {
            echo "</tr>";
            $barcode = $_SESSION["carrello"][$x]["prodotto"];
            $quantita = $_SESSION["carrello"][$x]["quantita"];
            $prod = $GP->get_prodotto($barcode);
            $arr = $prod->stampa_in_riga();
            echo "<tr><td><a title='Vai alla descrizione' href='../GestioneCatalogo/viewDescrizioneProdotto.php?barcode=".$arr['barcode']."'><img src='../image/info.png' style='width:20px; height:20px; cursor:pointer;'></a></td>";
            echo "<td><img id='intab' src=".$arr['image']."></td>";
            echo "<td>".$arr['barcode']."</td>";
            echo "<td>".$arr['nome']."</td>";
            echo "<td>".$arr['categoria']."</td>";
            echo "<td>".$arr['marca']."</td>"; 
            echo "<td>".$quantita."</td>";
            echo "<td>".$arr['prezzo']."&euro;</td>";
            $tot[$x] = $arr['prezzo']*$quantita;
            echo "<td>".$tot[$x]."&euro;</td>";
            echo "<td><button style='background-color:white; border-width:0px; cursor:pointer'  onclick='eliminaCarrello(".$arr['barcode'].")'><img src='../image/elimina.jpg' style='width:20px; height:20px;'></button></td>";
            echo "</tr>";
        }
        $tt=0;
        for($i=0;$i<count($tot);$i++) $tt = $tt+$tot[$i];
        echo "<tr><td colspan='2' style='font-weight:bold'>Spesa totale:</td><td colspan='8' style='text-align:right; font-weight:bold'>$tt&euro;</td></tr>";
        echo "</table>";
        echo "<div style='position:absolute; left:2%; top:90%'><a href='../GestioneOrdini/acquista.php?spesa=$tt' title='Procedi'>Completa l'acquisto</a></div>";
    }
?>
