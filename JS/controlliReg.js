var prova = true;
var errori = [];

function segnalaErrore(id, error, numb){

	var div = document.getElementById("segnalazioni");
	id.style.backgroundColor = "#FF3010";
	errori[numb]=error;
	div.innerHTML="";
	var c=0;
	for(i=0;i<errori.length;i++){
		if(errori[i]){
			c++;
			p = document.createElement("p");
			p.innerHTML = errori[i];
			div.appendChild(p);
		}
	}
	if(c!=0) div.style.display="block";
	generalControl();
	
}

function segnalaGiusto(id,numb){
	var div = document.getElementById("segnalazioni");
	id.style.backgroundColor = "#109000";
	errori[numb] = "";
	var c=0;
	div.innerHTML="";
	for(i=0;i<errori.length;i++){
		if(errori[i]){
			c++;
			p = document.createElement("p");
			p.innerHTML = errori[i];
			div.appendChild(p);
		}
	}
	if(c!=0) div.style.display="block";
	else  div.style.display="none";

	generalControl();
}



function generalControl(){
	var bottone = document.getElementById("submit");
	var div = document.getElementById("segnalazioni");
	var inserimento = document.getElementsByClassName("campi");
	var flag = 0;
	var c = 0;
	for(i=0;i<errori.length;i++){
		if(errori[i]) c++;
	}
	console.log(c);
	if(c==0){
		for(i=0;i<inserimento.length;i++){
			if(!inserimento[i].value){
				flag = 1;
			}
		}
	}
	if(flag==0 && c==0) bottone.removeAttribute("disabled");
	else  bottone.setAttribute("disabled","true");
}

/* Controllo della username*/
function controlUser(input){
	var div = document.getElementById("segnalazioni");
	var figli = div.childNodes;
	var inp= document.getElementById("usern");
	if(input.length > 4){
		if(input.length > 20){
			segnalaErrore(inp,"Username troppo lungo (massimo 20 caratteri!)",0);		
		}
		else{
		var req = new XMLHttpRequest();
		req.onreadystatechange = function(){
			if(req.readyState == 4 && req.status==200){
				console.log(req.responseText);
				if(req.responseText == "esiste"){
					segnalaErrore(inp,"Username gi&agrave; esistente nel sistema",0);
				}
				else{
					segnalaGiusto(inp,0);					
				}
			}
		};
		}
		req.open("GET","../GestioneUtente/ajax_controlliReg.php?user="+input,true);
		req.send("");
	}
	else{
		segnalaErrore(inp,"Username troppo corto (almeno 5 caratteri!)",0);
	}
}

/*Controllo password */
function controlPass(input){
	var div = document.getElementById("segnalazioni");
	var inp = document.getElementById("pass");
	if(input.length>5){
		if(input.length > 20){
			segnalaErrore(inp,"Password troppo lunga (massimo 20 caratteri!)",1);
		}
		else{
			segnalaGiusto(inp,1);
		}
	}
	else{
		segnalaErrore(inp,"Password troppo corta (almeno 6 caratteri!)",1);
	}
}

/*Controllo email */
function controlEmail(input){
	var div = document.getElementById("segnalazioni");
	var inp = document.getElementById("mail");
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
 	if (!reg.test(input)){
 		segnalaErrore(inp,"Inserire un indirizzo di posta elettronica valido!",2);
 	} 
 	else{
 		if(input.length > 30){
			segnalaErrore(inp,"Email troppo lunga (massimo 30 caratteri!)",2);
		}
		else{
 		var req = new XMLHttpRequest();
		req.onreadystatechange = function(){
			if(req.readyState == 4 && req.status==200){
				if(req.responseText == "esiste"){
					segnalaErrore(inp,"Email gi&agrave; esistente nel sistema",2);
				}
				else{
					segnalaGiusto(inp,2);	
				}
			}
		};
		req.open("GET","../GestioneUtente/ajax_controlliReg.php?mail="+input,true);
		req.send("");
 	}
}
}

/* Data controllo giorno */
function controlDataG(input){
	var div = document.getElementById("segnalazioni");
	var gg = document.getElementById("gg");
	g=parseInt(input);
	if(isNaN(input) || input.length != 2 || g<1 || g>31){
		segnalaErrore(gg,"Il giorno inserito non è valido!",3);
	}
	else{
		segnalaGiusto(gg,3);
	}
}

/* Data controllo mese */
function controlDataM(input){
	var div = document.getElementById("segnalazioni");
	var gg = document.getElementById("mm");
	g=parseInt(input);
	if(isNaN(input) || input.length != 2 || g<1 || g>12){
		segnalaErrore(gg,"Il mese inserito non è valido!",4);
	}
	else{
		segnalaGiusto(gg,4);
		
	}
}

/* Data controllo anno */
function controlDataA(input){
	var div = document.getElementById("segnalazioni");
	var gg = document.getElementById("aaaa");
	g=parseInt(input);
	if(isNaN(input) || input.length != 4 || g<1910 || g>2016){
		segnalaErrore(gg,"L'anno inserito non è valido!",5);
	}
	else{
		segnalaGiusto(gg,5);
		
	}
}

/* Controllo lunghezze */
function controlLeng(ele,input)
{
	var inp = document.getElementById(ele);
	if(input.length<2 || input.length>20){
		segnalaErrore(inp,"Inserimento non valido",6);
	}
	else{
		segnalaGiusto(inp,6);
		
	}
}


/* Controllo generale per abilitare il submit */
function controlGen()
{
	

}

function controlLuogo(input){
	inp = document.getElementById("luogo");
	if(input.length<3){
		segnalaErrore(inp,"Inserire luogo di nascita",7);
	}
	else{
		segnalaGiusto(inp,7);
	}
}