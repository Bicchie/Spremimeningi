<?php
	require_once "./php/utility/SpremiMeningiDB.php";
	require_once "./php/utility/GestoreSessione.php";
	session_start();
?>
<!DOCTYPE html>
<html lang = "it">
	<head>
		<title> Spremi Meningi </title>
		<meta charset = "utf-8">
		<meta name = "author" content = "Iacopo Bicchierini">
		<meta name = "keywords" content = "logica,giochi,giochilogici">
		<link rel = "stylesheet" type = "text/css" href = "./css/general.css"> 
	</head>
    <body>>
		
		<?php
            require_once "php/layout/navbar.php";
        ?>

		<section>
			<h3> Sudoku </h3>
			<div class="box">
				<img class="gameimg" src="./img/sudoku.png" alt="Griglia del Sudoku">
				<p class="paragrafo"> 
					Il Sudoku è uno dei più famosi giochi di logica 
					Se non ti manca la pazienza e l'audacia allora mettiti
					alla prova e mostra di essere il migliore.
				</p>
				<div> STORIA <a href="./php/storia.php#sudoku" draggable="false"> <img src="./img/history.svg" alt="Storia"> </a> </div>

				<div> REGOLE <a href="./php/regole.php#sudoku">  <img src="./img/regole.png" alt="Regole"> </a> </div>

				<div> GIOCA <a href="./php/gioco.php?gioco=Sudoku"> <img src="./img/play-button.jpg" alt="Gioca!"> </a> </div>
			</div>
		</section>

		<section>
			<h3> Gioco del 15 </h3>
			<div class="box">
				<img class="gameimg" src="./img/giocodel15.png" alt="Griglia del Gioco del 15">
				<p class="paragrafo"> 
					Il gioco del 15 può sembrare snervante poiché in molti casi
					richiede molte mosse, fatti prendere e viaggerai con la mente.
				</p>
				<div> STORIA <a href="./php/storia.php#gioco15"> <img src="./img/history.svg" alt="Storia"> </a> </div>

				<div> REGOLE <a href="./php/regole.php#gioco15">  <img src="./img/regole.png" alt="Regole"> </a> </div>

				<div> GIOCA <a href="./php/gioco.php?gioco=Gioco15"> <img src="./img/play-button.jpg" alt="Gioca!"> </a> </div>
			</div>
		</section>

		<section>
			<h3> Torre di Hanoi </h3>
			<div class="box">
				<img class="gameimg" src="./img/torreHanoi.png" alt="Griglia del Gioco del 15">
				<p class="paragrafo"> 
					Si dice che quando i monaci riusciranno a disporre 64 dischi d'oro secondo le Regole
					di questo gioco finirà il mondo. Qui ci sono molti meno dischi per scongiurare questo rischio.
				</p>
				<div> STORIA <a href="./php/storia.php#torreHanoi"> <img src="./img/history.svg" alt="Storia"> </a> </div>

				<div> REGOLE <a href="./php/regole.php#torreHanoi">  <img src="./img/regole.png" alt="Regole"> </a> </div>

				<div> GIOCA <a href="./php/gioco.php?gioco=TorreHanoi"> <img src="./img/play-button.jpg" alt="Gioca!"> </a> </div>
			</div>
		</section>

        <?php
            require_once "php/layout/footer.php";
        ?>
    </body>

</html>
    