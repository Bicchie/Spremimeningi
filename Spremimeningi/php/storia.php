<?php
	require_once "./utility/SpremiMeningiDB.php";
	require_once "./utility/GestoreSessione.php";
	session_start();
?>
<!DOCTYPE html>
<html lang = "it">
	<head>
		<title> Storia </title>
		<meta charset = "utf-8">
		<meta name = "author" content = "Iacopo Bicchierini">
		<meta name = "keywords" content = "logica,giochi,giochilogici">
        <link rel = "stylesheet" type = "text/css" href = "../css/general.css"> 
        <link rel = "stylesheet" type = "text/css" href = "../css/storia.css">
	</head>
    <body>
		<?php
            require_once "./layout/navbar.php";
        ?>

		<section id="sudoku">
			<h3> Sudoku </h3>
			<div class="box" >
				<p class="testo" > 
                    <img class="alignleft" src="../img/StoriaSudoku.jpg" alt="Giornale con Sudoku" style="width: 300px; height: 450px;">
                    I primi giochi di logica basati sui numeri apparvero sui giornali verso la fine del XIX secolo, quando alcuni enigmisti francesi iniziarono a sperimentarli rimuovendo opportunamente dei numeri dai quadrati magici. Le Siècle, un quotidiano parigino, pubblicò nel 1892 un quadrato magico di dimensioni 9×9 parzialmente completo con sottoquadrati di dimensioni 3×3. Non si trattava di un sudoku così come lo conosciamo oggi poiché conteneva numeri a doppia cifra e, per essere risolto, richiedeva l'aritmetica piuttosto che la logica, ma ammetteva comunque la regola per cui ogni riga, colonna e sottoquadrato dovesse contenere gli stessi numeri senza ripeterli. Successivamente un giornale rivale de Le Siècle, La France, ridefinì le regole di questo gioco, avvicinandosi di molto al sudoku moderno: ogni riga, colonna e sottoquadrato del quadrato magico doveva essere riempita soltanto con i numeri da 1 a 9, sebbene i sottoquadrati non fossero marcati all'interno dello schema. Questi giochi settimanali furono pubblicati anche da altri quotidiani francesi come L'Echo de Paris per circa un decennio, ma poi scomparvero all'epoca della Prima guerra mondiale. <br> <br>
                    Secondo l'enigmista statunitense Will Shortz, il sudoku moderno fu realizzato da Howard Garns, un ex architetto in pensione dell'Indiana (morto nel 1989), e pubblicato per la prima volta nel 1979 da Dell Magazines all'interno della rivista Dell Pencil Puzzles and Word Games con il titolo Number Place.<br><br>
                    <img class="alignright" src="../img/VecchioSudoku.jpg" alt="Anziano che gioca con Sudoku" style="width: 350px; height: 250px;">
                    Il gioco venne introdotto in Giappone dalla casa editrice Nikoli nella rivista Monthly Nikolist nell'aprile del 1984 con il titolo Suuji wa dokushin ni kagiru (数字は独身に限る?), successivamente abbreviato da Maki Kaji in Sudoku prelevando soltanto i primi caratteri kanji del nome completo. Nel 1986 Nikoli introdusse due novità: il numero massimo di celle già riempite fu ristretto a 32 e le griglie diventarono "simmetriche" (nel senso che i numeri già stampati venivano distribuiti su celle simmetriche).<br><br>
                    Nell'ottobre del 2004 il sudoku venne importato in Gran Bretagna da un ex giudice neozelandese, Wayne Gould, per poi diffondersi in Europa e nel resto del mondo nel 2005.<br><br>
				</p>
			</div>
		</section>

		<section id="gioco15">
			<h3> Gioco del 15 </h3>
			<div class="box" >
				<p class="testo" >  
                <img class="alignleft" src="../img/StoriaGioco15.jpg" alt="Giornale con Gioco15" style="width: 380px; height: 250px;">
                Loyd descrisse per la prima volta il suo fifteen puzzle ("rompicapo del quindici") nel volume Sam Loyd's Cyclopaedia of 5000 Puzzles, Tricks and Conundrums, pubblicato postumo nel 1914 dal figlio (anche lui Samuel Loyd). Il gioco ebbe subito grande successo, contribuendo alla fama del suo inventore, già rinomato enigmista e autore di altri giochi di successo. <br> <br>
                Loyd mise in palio la cifra di mille dollari come premio per chi fosse riuscito a risolvere una versione del gioco partendo da una posizione identica a quella finale, ma con i numeri 14 e 15 scambiati. Un premio che nessuno mai avrebbe potuto reclamare poiché, come l'autore sapeva benissimo, la soluzione del gioco partendo da una tale configurazione è matematicamente impossibile.  <br> <br>
				<img class="alignright" src="../img/VecchioGioco15.gif" alt="Vecchio Gioco15" style="width: 200px; height: 200px;">
                Il gioco del quindici è oggi considerato un solitario classico, un cosiddetto scacciapensieri o rompicapo. È stato commercializzato da tantissime case editrici e in moltissime varianti. Molte edizioni uniscono l'idea originale con quella del puzzle, distribuendo sulle tessere un disegno che riappare correttamente solo quando gli stessi sono state riordinati correttamente. Esistono anche varianti con un numero di caselle (e quindi di tessere) differente.  <br> <br>
				</p>
			</div>
		</section>

		<section id="torreHanoi">
			<h3> Torre di Hanoi </h3>
			<div class="box" >
				<p class="testo" >  
                <img class="alignleft" src="../img/StoriaTorreHanoi2.jpg" alt="Giornale con Gioco15" style="width: 200px; height: 350px;">
				Il gioco fu inventato nel 1883 dal matematico francese Édouard Lucas che diffuse il gioco sotto lo pseudonimo di N. Claus de Siam, mandarino del collegio di Li-Sou-Stian. <br> <br>
				<img class="alignright" src="../img/StoriaTorreHanoi.jpg" alt="Vecchio Gioco15" style="width: 300px; height: 200px;">
				La leggenda secondo la quale in un tempio Indù alcuni monaci sono costantemente impegnati a spostare su tre colonne di diamante 64 dischi d'oro secondo le regole della Torre di Hanoi (a volte chiamata Torre di Brahmā), è stata inventata dalla ditta che per prima ha messo in commercio il rompicapo. La leggenda narra che quando i monaci completeranno il lavoro, il mondo finirà. Esistono anche versioni videoludiche del rompicapo.  <br> <br>
				</p>
			</div>
		</section>

        <?php
            require_once "./layout/footer.php";
        ?>
    </body>

</html>
    