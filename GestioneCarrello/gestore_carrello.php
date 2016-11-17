<?php
	class gestore_carrello{

	function aggiungi($barcode, $quantita, $carrello)
    {
    	$conta = count($carrello);
        if ($this->esiste($barcode, $carrello)) {
        	for($x=0; $x<$conta; $x++)
       		{
           		if ($barcode == $carrello[$x]["prodotto"])
           		{
                	 $carrello[$x]["quantita"]=$quantita;
           		}
        	}
		}
		else{
        	$carrello[$conta]["prodotto"] = $barcode;
       		$carrello[$conta]["quantita"] = $quantita;
       	}

        return $carrello;
    }

    function esiste($barcode,$carrello)
    {
        $conta = count($carrello);
        $controllo = 0;
        for($x=0; $x<$conta; $x++)
        {
           if ($barcode == $carrello[$x]["prodotto"])
           {
               return true;
           }
        }
        return false;
    }

    function elimina($barcode,$carrello)
    {
        $conta = count($carrello);
        for($x=0; $x<$conta; $x++)
        {
            if ($barcode == $carrello[$x]["prodotto"])
            {
                unset($carrello[$x]);
                break;
            }
        }
        $carrello = array_values($carrello);
        return $carrello;
    }

}
    
?>