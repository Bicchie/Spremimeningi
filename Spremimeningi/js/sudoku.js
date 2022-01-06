// COME LEGGERE CODICE:
// - creato una griglia risolvibile
// - mischiato le colonne per non far riconoscere il pattern con il quale ho creato la griglia
// - riportato la griglia in formato che sia scrivile nei cubi dell'html
// - a seconda del livello mostro un tot di caselle vuote e compilate

// quante caselle andranno riempite per livello di difficolta'
DIFFICOLTA_CASELLE = [0,38,30,22];

function Sudoku(difficolta) {
    // creo la griglia
    this.tabella = creaTab();
    // mi salvo tutti gli elementi HTML creati in una matrice
    this.cube = new Array();

    // decido quali valori dare già compilati all'utente in base alla difficoltà
    // se ricevo 0 vuol dire che devo stampare una griglia vuota
    if(difficolta != 0)
        var daMostrare = valoriMostrati(81 - DIFFICOLTA_CASELLE[difficolta]);
    else
        var grigliaVuota = true;

    // prendo il div che contiene il sudoku
    var sudoku = document.getElementById("playground");

    // riempio la griglia coi valori
    for (var i = 0; i < 9; i++)
    {
        var temp = document.createElement("div");
        temp.setAttribute("class","parentCube");
        this.cube[i]=new Array();
        for (var j=0; j<9; j++)
        { 
            this.cube[i][j] = document.createElement("input");
            if(!grigliaVuota && daMostrare[i*9 +j] != 1){
                this.cube[i][j].setAttribute("value",this.tabella[i][j] );
                this.cube[i][j].value = this.tabella[i][j];
                this.cube[i][j].readOnly = true;
            } else {
                this.cube[i][j].style.color = "cornflowerblue";
                this.cube[i][j].setAttribute("onblur","vinto(this)");
                this.cube[i][j].setAttribute("maxLength",1);
            }
            // se devo creare griglia vuota non associo alle caselle la funzione
            if(!grigliaVuota)
                this.cube[i][j].setAttribute("onClick","fun(this)");
            this.cube[i][j].setAttribute("class", "childCube");
            temp.appendChild(this.cube[i][j]);  
        }			
        sudoku.appendChild(temp);
    }
}

// sceglie quali valori far vedere all'utente
// imposta ad 1 i valori da far vedere nell'indice corrispondente dell'Array
function valoriMostrati(quanti){
    var count = 0;
    var valoriDati = new Array();
    while(count < quanti){
        var a = Math.floor(Math.random() * 80);  
        if(valoriDati[a] == 1)
            continue;
        else {
            count++;
            valoriDati[a] = 1;
        }
    }
    return valoriDati;
}

//---------------PORZIONE CODICE PER VALIDITA' GRIGLIA------------

// crea la tabella risolvibile
function creaTab(){
    var valori = new Array();
    var v = vettoreRandom();
    // creo la prima versione della tabella facendo shift fra le righe
	for(var i=0; i<9; i++){
		for(var j=0; j<9; j++){
            if(j==0)
                valori[i] = new Array();
			if(i==0)
                valori[i][j] = v[j];
			else if( (i+1)%3 == 1 )
                valori[i][(j-1+9)%9] = valori[i-1][j];
            else 
                valori[i][(j-3+9)%9] = valori[i-1][j];
		}
    }
    // ricevo il vettore che mi dice l'ordine da dare alle colonne
    var a = scompiglia();
    // creo una nuova tabella dove saranno presenti i valori scompigliati
    var tab = new Array();
    // inizializzo l'array di array (matrice per gli amici)
    for (var i = 0; i < 9; i++)
        tab[i]=new Array();
    // per ogni colonna
    for(var j=0; j<9; j++){
        // scorro le righe e le metto nella colonna giusta
        for(var i=0; i<9; i++){
            var s = a[j];
            tab[i][j] = valori[i][s];
        }
    }
    // questo decommentalo se vuoi vedere la soluzione nella console
    console.log("Questi sono i valori pre formattazione: ");
    console.log(tab);
    tab = formatoCubi(tab);
    return tab;    
}	

// creare un vettore di 9 numeri diversi
function vettoreRandom(){
    var v = new Array();
    // vettore per ricordarsi quali numeri sono già stati estratti
	var estratto = [false,false,false,false,false,false,false,false,false];
	// come creare vettore casuale di 9 numeri diversi
	for(var i = 0; i<9; i++){
		do{
			v[i] =Math.floor(Math.random() * 9) + 1; 
			if(!estratto[v[i]]){
				estratto[v[i]] = true;
				break;
			}
		} while( estratto[v[i]]);
    }
    return v;
}

// ritorna un vettore contenente lo scompigliamento da fare nelle colonne
function scompiglia(){
    var a = new Array([0,2,1],[1,0,2],[1,2,0],[2,1,0],[2,0,1]);
    var quale1 = Math.floor(Math.random() * 5);
    var quale2 = Math.floor(Math.random() * 5);
    var quale3 = Math.floor(Math.random() * 5);
    var b = a[quale1];
    b = b.concat(a[quale2]);
    b = b.concat(a[quale3]);
    for(var i = 0; i<9; i++){
        if( i < 6 && i >= 3)
            b[i] += 3;
        if( i >= 6)
            b[i] += 6;
    }
    return b;
}

// porta la matrice ad essere nella forma tale da essere scrivibile nella griglia HTML
// cioé mettendo in ogni riga i valori che stanno in un 'parentCube'
function formatoCubi(tab){
    var a = new Array();
    for (var i = 0; i < 9; i++)
        a[i]=new Array();

    var c = 0;
    for(var i = 0; i < 9; i++){
        for(var j = 0; j < 9; j++){
            if( c < 27){
                if(numColonna(c) == 0)
                    a[0].push(tab[i][j]);
                if(numColonna(c) == 1)
                    a[1].push(tab[i][j]);
                if(numColonna(c) == 2)
                    a[2].push(tab[i][j]);
            } else if ( c < 54){
                if(numColonna(c) == 0)
                    a[3].push(tab[i][j]);
                if(numColonna(c) == 1)
                    a[4].push(tab[i][j]);
                if(numColonna(c) == 2)
                    a[5].push(tab[i][j]);
            } else {
                if(numColonna(c) == 0)
                    a[6].push(tab[i][j]);
                if(numColonna(c) == 1)
                    a[7].push(tab[i][j]);
                if(numColonna(c) == 2)
                    a[8].push(tab[i][j]);
            }
            c++;
        }
    }
    return a;
}

// funzione di supporto che trova la colonna di appartenza dato l'indice della casella
function numColonna(c){
    if(c%9 == 0 || c%9 == 1 || c%9 == 2)
        return 0;
    if(c%9 == 3 || c%9 == 4 || c%9 == 5)
        return 1;
    if(c%9 == 6 || c%9 == 7 || c%9 == 8)
        return 2;
}

//---------------------PORZIONE CODICE PER L'EFFETTO CASELLE BLU-----------------------

// dice se una casella è da illuminare di blu o meno vedendo se condivide il cubo o se è nella riga o colonna
function condizione(i,j,elemI,elemJ){
    var a = (( (elemI+3) %9)==i || ((elemI+6) %9)==i || (elemI==i));
    var b = (( (elemJ+3) %9) == j || ((elemJ+6) %9) == j || (elemJ == j));
    var c = (i == elemI)
    
    var x = i % 3; var y = j % 3;

    var d = false;
    switch(x){
        case 0: if( ((i+1) == elemI) || ((i+2) == elemI) || (i == elemI)  )
                    d = true;
                break;
        case 1: if( ((i+1) == elemI) || ((i-1) == elemI) || (i == elemI)  )
                    d = true;
                break;

        case 2: if( ((i-1) == elemI) || ((i-2) == elemI) || (i == elemI)  )
                    d = true;
                break;
    }

    var e = false;
    switch(y){
        case 0: if( ((j+1) == elemJ) || ((j+2) == elemJ) || (j == elemJ)  )
                    e = true;
                break;
            
        case 1: if( ((j+1) == elemJ) || ((j-1) == elemJ) || (j == elemJ)  )
                    e = true;
                break;

        case 2: if( ((j-1) == elemJ) || ((j-2) == elemJ) || (j == elemJ)  )
                    e = true;
                break;
    }

    if( (a && b) || c || (e && d) )
        return true;
    else
        return false;
}


// -------------------PORZIONE CODICE PER CONTROLLO GIOCO------------------

// funzione richiamata al click
function fun(elem){
    var elemI,elemJ;

    // trovo quale elemento era nelle row
    for(var i = 0; i < 9; i++){
        for(var j = 0; j < 9; j++){
            if(oggettoGioco.playground.cube[i][j] == elem){
                elemI = i;
                elemJ = j;
            }
        }
    }
    // faccio blu quelli nella mia stessa colonna e riga e nello stesso cubo
    for(var i=0; i<9; i++){
        for(var j=0; j<9; j++){
            if(condizione(i,j,elemI,elemJ))
                oggettoGioco.playground.cube[i][j].style.backgroundColor = "lightblue";
            else
                oggettoGioco.playground.cube[i][j].style.backgroundColor = "white";
        }
    }
}

// controllo se l'utente ha vinto sommando i valori
function vinto(elem){
    //se l'utente ha inserito qualcosa che non è un numero verrà tolto
    if(isNaN(elem.value) || (elem.value==0)){
        elem.value=null;
        return;
    }

    // ogni volta che clicco su un elemento la considero una mossa
    var mosse = document.getElementById("mosse");
    mosse.innerText = "Mosse: " +  ++oggettoGioco.mosse; 

    var a = true;
    for(var i = 0; i < 9; i++){
        for(var j = 0; j < 9; j++){
            if(oggettoGioco.playground.cube[i][j].value != oggettoGioco.playground.tabella[i][j])
                a = false;
        }
    }
    if(a){
        window.alert("Hai vinto!!!!");
        oggettoGioco.salvaScore();
    }
}
