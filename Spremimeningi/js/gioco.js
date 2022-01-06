// oggetto Gioco che riceve la difficoltà, il gioco e l'username e fa partire il gioco richiesto
//               inoltre mantiene i dati riguardanti le mosse e il tempo e le salva 
//               se l'utente completa il gioco

function Gioco(difficolta,gioco,username) {
    this.username = username;
    this.nomeGioco = gioco;
    this.difficolta = difficolta;
    this.mosse = 0;
    this.tempo = 0;
    this.playground;
    
    // livello 0 si intende che l'utente non ha ancora scelto la difficoltà
    var livello;
    
    switch(difficolta){
        case 'Facile': livello = 1; break;
        case 'Medio' : livello = 2; break;
        case 'Difficile' : livello = 3; break;
        case 'vuoto' : livello = 0; break;
    }

    switch(this.nomeGioco){
        case "Sudoku":
            this.playground = new Sudoku(livello);
            break;
        case "Gioco15":
            this.playground = new Gioco15(livello);
            break;
        case "TorreHanoi":
            this.playground = new TorreHanoi(livello);
            break;
    };

    // va fatto partire solo se l'utente ha scelto la difficoltà
    if(livello != 0){
        setInterval(function(){
            oggettoGioco.tempo++;
            var minuti ;
            var secondi;
            var ore;
            // metto il tempo nel formato giusto 
            if( oggettoGioco.tempo < 60 ){
                ore = 0;
                minuti = 0;
                secondi = oggettoGioco.tempo;
            } if(oggettoGioco.tempo < 3600){
                ore = 0;
                minuti = Math.floor(oggettoGioco.tempo/60);
                secondi = oggettoGioco.tempo%60;
            } else {
                ore = Math.floor(oggettoGioco.tempo/3600);
                minuti =  Math.floor(oggettoGioco.tempo/60)%60;
                secondi = oggettoGioco.tempo%60;
            }
    
            var tempo = document.getElementById("tempo");
            tempo.innerText = "Tempo: " + ore + ":" + minuti  + ":" + secondi;
        }, 1000);
    }
}

// viene chiamata per salvare lo Score
Gioco.prototype.salvaScore = function(){
    var get = "?username=" + this.username + "&gioco=" + this.nomeGioco + "&difficolta=" + this.difficolta + "&mosse=" + this.mosse + "&tempo=" + this.tempo;
    window.location = "../php/process/salvaScore.php" + get;
}

// chiamata all'avvio per creare il Gioco
function begin(difficolta,gioco,username){
    oggettoGioco = new Gioco(difficolta,gioco,username);
}

