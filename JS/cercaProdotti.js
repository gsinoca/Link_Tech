function cercaProdotto(stringa,type,usertype){
	//if(stringa){
	var url = "../GestioneCatalogo/cerca_prodotto.php?input="+stringa+"&type="+type;
	var req = new XMLHttpRequest();
	req.onreadystatechange = function(){
		if(req.readyState == 4 && req.status==200){
			var doc = req.responseXML.documentElement;
			elementi = doc.childNodes;
			var tablebody = document.getElementsByTagName("tbody");
			tablebody[0].innerHTML="";

			for(i=0;i<elementi.length;i++){
				riga = elementi[i].childNodes;
				tr=document.createElement("tr");
				td=document.createElement("td");
				td.innerHTML= "<a title='Vai alla descrizione' href='viewDescrizioneProdotto.php?barcode="+riga[1].firstChild.data+"'><img src='../image/info.png' style='width:20px; height:20px; cursor:pointer;'></a>";
				tr.appendChild(td);
				td=document.createElement("td");
				td.innerHTML= "<img src='"+riga[0].firstChild.data+"'>";
				tr.appendChild(td);
				for(j=1;j<riga.length;j++){
					td=document.createElement("td");
					td.innerHTML=riga[j].firstChild.data;
					tr.appendChild(td);
				}
				if(usertype=="admin"){
					td=document.createElement("td");
					td.innerHTML="<a href=elimina_prodotto.php?barcode="+riga[1].firstChild.data+">Elimina</a><br><a href=modifica_prodotto.php?barcode="+riga[1].firstChild.data+" id='modifica' style='color:green'>Modifica</a>";
					tr.appendChild(td);
				}
				if(usertype=="normal"){
					td=document.createElement("td");
					td.innerHTML="<a title='Aggiungi al carrello' href='gestore_carrello.php?barcode="+riga[1].firstChild.data+"'><img src='../image/carrello.jpg' style='width:20px; height:20px;'>";
					tr.appendChild(td);
				}
				tablebody[0].appendChild(tr);
			}
		}
	};
	req.open("GET",url,true);
	req.send("");	
}
//else/
//}
