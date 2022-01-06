// la difficoltà è data da quante caselle ci sono nel lato del quadrato
DIFFICOLTA_CASELLE = [0,3,4,5];

function Gioco15(difficolta){
    //dimensione
    this.numero = DIFFICOLTA_CASELLE[difficolta];
    // posizione casella vuoto
    this.vuoto = this.numero*this.numero;
    
    // se difficolta è 0 faccio griglia vuota
    if(difficolta == 0){
        var playground = document.getElementById("playground");
        playground.style.width = 400 + "px";
        playground.style.height = 400 + "px";
        return;
    } else {
        // creo la griglia per quel numero di caselle
        var playground = document.getElementById("playground");
        playground.style.width = 80*this.numero + "px";
        playground.style.height = 80*this.numero + "px";
    }

    
    // indice è valore casella, contenuto è posizione in griglia
    this.gridValue = new Array();
    // creo array con valori casuali validi
    var griglia = creaGriglia(this.numero);

    // ci tengo i vari box creati
    this.row = new Array();

    // controllo se la griglia è risolvibile
    while(!grigliaValida(griglia))
        griglia = creaGriglia(this.numero);

    
    // creo la griglia di gioco
    for(var i = 0; i < this.numero*this.numero; i++){
        this.row[i] = document.createElement("DIV");
        this.gridValue[griglia[i]] = i + 1; 
        this.row[i].innerText = griglia[i];
        if( griglia[i] == 0){
            this.row[i].setAttribute("id","last");
            this.vuoto = i + 1
        }
        else {
            this.row[i].setAttribute("class","box");  
            this.row[i].setAttribute("onclick","scambia(this)");
        }
        playground.append(this.row[i]);
    }

}

// crea un array di dimensione this.numero*this.numero con valori casuali
function creaGriglia(length){
    var griglia = new Array();
    var a = 0;
    var b;
    // obiettivo è creare vettore con length*length valori diversi
    for(var i=0; i < length*length;i++){
        b = true;
        a = Math.floor(Math.random() * length*length);
        // se è già stato reinserito ritenta
        for( var j = 0; j < i; j++)
        {
            if(a == griglia[j]){
                i--;
                b = false;
                break;
            }
        }
        if(b)
            griglia[i] = a;
    }
    return griglia;
}


// -----------------------PORZIONE CODICE PER VALIDITA' GRIGLIA-----------------------
function contaInversioni(griglia)
{
    var dim = griglia.length*griglia.length;
    var counter = 0;
    for (var i = 0; i < dim - 1; i++)
    {
        for (var j = i + 1; j < dim; j++)
        {
            // non conto i confronti con 0 poiché rappresenta la casella vuota
            if (griglia[j] && griglia[i] && griglia[i] > griglia[j])
                counter++;
        }
    }
    return counter;
}

// trova la posizione della casella vuota dal fondo
function posizioneVuoto(griglia)
{
    var j = Math.sqrt(griglia.length);
    var posizione = new Array();
    for(var i = 0; i<Math.sqrt(griglia.length); i++){
        posizione[i] = j;
        j--;
    }
    for(var i = 0; i<griglia.length*griglia.length; i++){
        if( griglia[i] == 0)
            break;
    }
    var a = Math.floor(i/ Math.sqrt(griglia.length));
    return posizione[a];
}
/* ---------- CONDIZIONE VALIDITA' GRIGLIA -----------------
- Se N è dispari, è risolvibile se il numero di inversioni è pari.
- Se N è pari, è risolvibile se: 
    - la casella vuota è in una riga pari contando dal fondo e il numero di inversioni è dispari.
    - la casella vuota è in una riga dispari contando dal fondo e il numero di inversioni è pari.
- Negli altri casi il puzzle è irrisolvibile.
*/
function grigliaValida(griglia)
{
    var inv = contaInversioni(griglia);
    var dim = Math.sqrt(griglia.length);
    // N è dispari
    if (dim%2 == 1){
        if(inv%2 == 0)
            return true;
        else
            return false;
    } else { // N è pari
        var pos = posizioneVuoto(griglia);
        if ((pos%2 == 0) && (inv%2 == 1))
            return true;
        if ((pos%2 == 1) && (inv%2 == 0))
            return true;
        return false;
    }
}

// -------------------PORZIONE CODICE PER CONTROLLO MOSSE------------------

// controlla che la casella premuto possa davvero andare nel posto vuoto
function mossaValida(premuto){
    if( ( ( (oggettoGioco.playground.gridValue[premuto] - 1) == oggettoGioco.playground.vuoto) && (oggettoGioco.playground.vuoto%oggettoGioco.playground.numero != 0) ) || 
        ( ( (oggettoGioco.playground.gridValue[premuto] + 1) == oggettoGioco.playground.vuoto) && (oggettoGioco.playground.vuoto%oggettoGioco.playground.numero != 1) ) || 
        (oggettoGioco.playground.gridValue[premuto] + oggettoGioco.playground.numero)  == oggettoGioco.playground.vuoto || 
        (oggettoGioco.playground.gridValue[premuto] - oggettoGioco.playground.numero) == oggettoGioco.playground.vuoto  )
        return true;
    else
        return false;
}

// funzione che scambia (se la mossa è possibile) la casella che hai cliccato nel posto vuoto
function scambia(elem){
    // prendo l'elemento
    var scambia = document.getElementById("last");
    // prendo il numero che ha pigiato l'utente
    var premuto = elem.innerText;
    var appoggio = oggettoGioco.playground.vuoto;

    if( mossaValida(premuto)){
        // ogni volta che clicco su un elemento la considero una mossa
        var mosse = document.getElementById("mosse");
        mosse.innerText = "Mosse: " +  ++oggettoGioco.mosse; 
        // imposto il box a invisibile
        elem.setAttribute("id","last");
        elem.removeAttribute("onclick");
        elem.removeAttribute("class");
        elem.innerText ="";
        // dico che la casella vuota è la posizione che aveva il numero premuto
        oggettoGioco.playground.vuoto = oggettoGioco.playground.gridValue[premuto];
        scambia.setAttribute("class","box");
        scambia.removeAttribute("id");
        scambia.setAttribute("onclick","scambia(this)");
        scambia.innerText = premuto;
        oggettoGioco.playground.gridValue[premuto] = appoggio;

        if(grigliaVincente(oggettoGioco.playground.gridValue)){
            window.alert("Hai vinto!!!!");
            oggettoGioco.salvaScore();
        }

        coloraCaselleGiuste(oggettoGioco.playground.numero,oggettoGioco.playground.gridValue);
    }
}

// colora le caselle che sono nella posizione giusta

function coloraCaselleGiuste(numero,griglia){
    for(var i = 1; i < numero*numero; i++){
        if(griglia[i] == i){
            oggettoGioco.playground.row[griglia[i] - 1].style.backgroundColor = "coral";
        } else {
            oggettoGioco.playground.row[griglia[i] - 1].style.backgroundColor = "lightblue";
        }
    }

    // mette bianco il background dell'elemento vuoto
    var a = document.getElementById("last");
    a.style.backgroundColor = "white";
}


// ritorna true se la griglia è stata risolta
function grigliaVincente(griglia){
    for(var i = 1; i<griglia.length; i++){
        if( griglia[i] != i)
            return false;
    }
    return true
}
