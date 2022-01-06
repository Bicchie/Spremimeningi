<?php
	require_once "./utility/SpremiMeningiDB.php";
	require_once "./utility/GestoreSessione.php";
	session_start();
?>
<!DOCTYPE html>
<html lang = "it">
	<head>
		<title> Regole </title>
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
				<p class="regole" >     
                    Esiste una sola regola per giocare a Sudoku: bisogna riempire la scacchiera in modo tale che ogni riga, ogni colonna e ogni riquadro contengano i numeri dall'1 al 9. La condizione è che nessuna riga, nessuna colonna o riquadro presentino due volte lo stesso numero. Niente di più semplice no?
				</p>
			</div>
		</section>

		<section id="gioco15">
			<h3> Gioco del 15 </h3>
			<div class="box" >
				<p class="regole" >  
                    L'obiettivo del gioco è quello di riordinare le tessere fino a portarle ordinate dal numero più basso al più alto. Le mosse consentite sono quelle che muovono orizzontalmente e/o verticalmente le tessere che sono in prossimità dello spazio vuoto.
				</p>
			</div>
		</section>

		<section id="torreHanoi">
			<h3> Torre di Hanoi </h3>
			<div class="box" >  
				<p class="regole" >  
					Il gioco inizia con tutti i dischi incolonnati su un paletto in ordine decrescente, in modo da formare un cono. Lo scopo del gioco è portare tutti i dischi sul terzo paletto, potendo spostare solo un disco alla volta e potendo mettere un disco solo su un altro disco più grande, mai su uno più piccolo.
				</p>
			</div>
		</section>

        <?php
            require_once "./layout/footer.php";
        ?>
    </body>

</html>
    