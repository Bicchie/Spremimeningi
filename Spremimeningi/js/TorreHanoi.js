// quanti blocchetti ci sono per difficoltà
DIFFICOLTA = [0,4,5,6];

// valori che servono a creare i tasselli con grandezze simili anche con difficolta diverse
DECREMENTO_LUNGHEZZA = [0,36.3,27.5,22];
INCREMENTO_SINISTRA = [0,16.5,12,10];

function TorreHanoi(difficolta){

    this.dim = DIFFICOLTA[difficolta];
    // matrice contente 3 vettori, ogni vettore una colonna del gioco
    this.colonne = new Array();
    this.colonne[0] = new Array();
    this.colonne[1] = new Array();
    this.colonne[2] = new Array();

    // serve per creare le 3 colonne
    creaPlayground();
    
    // inizializzo col1 che ha tutti i tasselli
    // istanzio la distanza dalla cima da dare a seconda della posizione
    // che il tassello ha
    this.distanzaTop = new Array(this.dim);
    for(var i = 0; i < this.dim; i++){
        this.distanzaTop[i] = 335 -i*52;
        this.colonne[0].push(String(i));
    }

    var lunghezza = 150;
    var sinistra = 20;
    var su = 335;

    // metto i tasselli nella prima colonna
    var a = document.getElementById("primo");

    for(var i = 0; i < this.dim; i++){
        var div = document.createElement("div");
        div.setAttribute("id",i);
        div.setAttribute("class","pezzi");
        div.setAttribute("draggable",true);
        div.setAttribute("ondragstart","iniziaTrascinamento(event)")
        div.style.width = lunghezza + "px";
        div.style.left = sinistra + "px";
        div.style.top = su + "px"; 
        lunghezza-=DECREMENTO_LUNGHEZZA[difficolta];
        sinistra+=INCREMENTO_SINISTRA[difficolta];
        su-=52;
        a.append(div);
    }

    // per tutti i tasselli ho questa funzione all'inizio del trascinamento
    // che comunica l'id del tassello trascinato
    iniziaTrascinamento = function(evento){
        evento.dataTransfer.setData("text",evento.target.id);
    }


    // metto l'evento della ricezione del tassello a tutte e 3 le colonne
    var divTarget = document.getElementById("col1");
    divTarget.ondrop = function(e) {
        e.preventDefault();
        // in 'data' ho l'id del tassello trascinato
        var data = e.dataTransfer.getData("text");
        // se l'utente aveva preso un tassello non ultimo, abortisco 
        // il drop
        var colonnaPartenza = mossaLegale(data,oggettoGioco.playground.colonne);
        if(colonnaPartenza == -1)
            return;
        // prendo l'indice della colonna su cui è stato trascinato il tassello
        var col = colonna(e.target.id);

        var colonnaArrivo = mossaValida(oggettoGioco.playground.colonne[col],data)
        // mossa non valida, esci senza far nulla
        if(colonnaArrivo == -1){
            return;
        }
        // se la mossa è valida allora tolgo l'id dal vettore
        // della colonna dove stava prima e lo metto nella nuova
        oggettoGioco.playground.colonne[colonnaPartenza].pop();
        oggettoGioco.playground.colonne[col].push(data);

        // registra la mossa
        var mosse = document.getElementById("mosse");
        mosse.innerText = "Mosse: " +  ++oggettoGioco.mosse;

        var metti = document.getElementById("col1");
        // metto effettivamente il tassello dove deve stare
        metti.append(document.getElementById(data));
        document.getElementById(data).style.top = oggettoGioco.playground.distanzaTop[ (oggettoGioco.playground.colonne[col].length) - 1 ] + "px";
    }
    divTarget.ondragover = function(e) {
        e.preventDefault();
    }

    var divTarget = document.getElementById("col2");
    divTarget.ondrop = function(e) {
        e.preventDefault();
        // in 'data' ho l'id del tassello trascinato
        var data = e.dataTransfer.getData("text");
        // se l'utente aveva preso un tassello non ultimo, abortisco 
        // il drop
        var colonnaPartenza = mossaLegale(data,oggettoGioco.playground.colonne);
        if(colonnaPartenza == -1)
            return;
        // prendo l'indice della colonna su cui è stato trascinato il tassello
        var col = colonna(e.target.id);

        var colonnaArrivo = mossaValida(oggettoGioco.playground.colonne[col],data)
        // mossa non valida, esci senza far nulla
        if(colonnaArrivo == -1){
            return;
        }
        // se la mossa è valida allora tolgo l'id dal vettore
        // della colonna dove stava prima e lo metto nella nuova
        oggettoGioco.playground.colonne[colonnaPartenza].pop();
        oggettoGioco.playground.colonne[col].push(data);

        // registra la mossa
        var mosse = document.getElementById("mosse");
        mosse.innerText = "Mosse: " +  ++oggettoGioco.mosse;

        var metti = document.getElementById("col2");
        // metto effettivamente il tassello dove deve stare
        metti.append(document.getElementById(data));

        document.getElementById(data).style.top = oggettoGioco.playground.distanzaTop[ (oggettoGioco.playground.colonne[col].length) - 1 ] + "px";
    }
    divTarget.ondragover = function(e) {
        e.preventDefault();
    }

    var divTarget = document.getElementById("col3");
    divTarget.ondrop = function(e) {
        e.preventDefault();
        // in 'data' ho l'id del tassello trascinato
        var data = e.dataTransfer.getData("text");
        // se l'utente aveva preso un tassello non ultimo, abortisco 
        // il drop
        var colonnaPartenza = mossaLegale(data,oggettoGioco.playground.colonne);
        if(colonnaPartenza == -1)
            return;
        // prendo l'indice della colonna su cui è stato trascinato il tassello
        var col = colonna(e.target.id);

        // controllo che io possa mettere il tassello nella colonna
        // cioé che non sia più grande dell'ultimo tassello
        var colonnaArrivo = mossaValida(oggettoGioco.playground.colonne[col],data)
        // mossa non valida, esci senza far nulla
        if(colonnaArrivo == -1){
            return;
        }
        // se la mossa è valida allora tolgo l'id dal vettore
        // della colonna dove stava prima e lo metto nella nuova
        oggettoGioco.playground.colonne[colonnaPartenza].pop();
        oggettoGioco.playground.colonne[col].push(data);

        // registra la mossa
        var mosse = document.getElementById("mosse");
        mosse.innerText = "Mosse: " +  ++oggettoGioco.mosse; 

        var metti = document.getElementById("col3");
        // metto effettivamente il tassello dove deve stare
        metti.append(document.getElementById(data));
        document.getElementById(data).style.top = oggettoGioco.playground.distanzaTop[ (oggettoGioco.playground.colonne[col].length) - 1 ] + "px";


        // controllo se l'utente ha vinto
        var vinto = hovinto(oggettoGioco.playground.colonne[2],oggettoGioco.playground.dim);
        if(vinto){
            window.alert("Hai vinto!!!!");
            oggettoGioco.salvaScore();
        }
    }
    divTarget.ondragover = function(e) {
        e.preventDefault();
    }
    

}

// la mossa è legale se l'id è l'ultimo di una delle 3 colonne, restituisco l'indice della colonna dove l'ho trovato
// sennò restituisco -1
function mossaLegale(id,colonne){
    var esito = -1;
    console.log(colonne);
    for(var i = 0; i < 3; i++){
        if((colonne[i][colonne[i].length - 1 ]) == id)
            esito = i;
    }
    return esito;
}

// dato un'id ritorna l'indice dell'Array che ne contiene i tasselli
function colonna(id){
    switch(id){
        case "col1": return 0;
        case "col2": return 1;
        case "col3": return 2;
    }
}



// dato vettore della colonna su cui voglio fare la mossa e l'id del 
// tassello, dico se la mossa è valida, se lo è restituisco l'indice che
// deve occupare nella nuova colonna, altrimenti -1
function mossaValida(col,id){
    // se è vuota la colonna potrà accettare qualsiasi tassello
    if(col.length == 0)
        return 0;

    // il valore per andare bene deve essere minore
    if(col[col.length - 1] < id)
        return col.length;
    else
        return -1;
}



// controlla se l'utente ha vinto
function hovinto(col,dim){
    for(var i = 0; i<dim; i++){
        if(col[i] != i)
            return false;
    }
    return true;
}


// serve per creare nel playground del pattern dei giochi, il campo da gioco
// della Torre di Hanoi che prevede 3 colonne
function creaPlayground(){
    var playground = document.getElementById("playground");

    var col1 = document.createElement("div");
    col1.setAttribute("id","col1");
    playground.appendChild(col1);

    var primo = document.createElement("div");
    primo.setAttribute("id","primo");
    col1.appendChild(primo);

    var col2 = document.createElement("div");
    col2.setAttribute("id","col2");
    playground.appendChild(col2);

    var secondo = document.createElement("div");
    secondo.setAttribute("id","secondo");
    col2.appendChild(secondo);

    var col3 = document.createElement("div");
    col3.setAttribute("id","col3");
    playground.appendChild(col3);

    var terzo = document.createElement("div");
    terzo.setAttribute("id","terzo");
    col3.appendChild(terzo);
}