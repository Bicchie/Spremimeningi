<?php
	require_once "./utility/SpremiMeningiDB.php";
	require_once "./utility/GestoreSessione.php";
    session_start();
    
    if(!isAdmin())
        header('location: ./../index.php');
?>
<!DOCTYPE html>
<html lang = "it">
	<head>
		<title> Statistiche </title>
		<meta charset = "utf-8">
		<meta name = "author" content = "Iacopo Bicchierini">
        <link rel = "stylesheet" type = "text/css" href = "../css/general.css">
		<link rel = "stylesheet" type = "text/css" href = "../css/statistiche.css">
	</head>
    <body>
        <header>
			SPREMI MENINGI 
		</header>
		
		<nav>
			<a href="../index.php" class ="link"> Home </a>
		</nav>

		<section style="height: 270px;">
			<h3> Statistiche </h3>
			<img src="../img/statistic.jpg" class="alignleft" style="width: 200px; height: 140px;" alt="statistiche">
			<img src="../img/statistic.jpg" class="alignright" style="width: 200px; height: 140px;" alt="statistiche">
			<?php
				echo "<p class=\"info\"> Hanno giocato ai nostri giochi ". numUtenti() . " <em> GIOCATORI </em> <br><br><br> che hanno risolto ". numScores() ." <em>PARTITE</em>!!! </p>";
			?>
			
		</section>

		
		<?php
			$giochi = array('Sudoku','Gioco15','TorreHanoi');
			$img = array('sudoku','giocodel15','torreHanoi');
			$difficolta = array('Facile','Medio','Difficile');
			$statistiche = array('AVG','MIN','MAX');
			$nomeStat = array('La media', 'Il minimo', 'Il massimo');
			

			for($i=0; $i < count($giochi); $i++){
				echo "<section> <img src=\"../img/".$img[$i].".png\" class=\"alignleft\" alt=\"".$img[$i]."\"> <img src=\"../img/".$img[$i].".png\" class=\"alignright\" alt=\"".$img[$i]."\"> <h3>".$giochi[$i]." </h3> ";
				echo "<div class=\"container\">";
				for($j=0; $j < count($difficolta); $j++){
					echo "<div class=\"partizione\">"; 
					echo "<h6>".$difficolta[$j]."</h6>";
					echo "<ul>";
					for($k=0; $k < count($statistiche); $k++){
						echo "<li>".$nomeStat[$k]." del tempo è ". getStat($giochi[$i], $difficolta[$j], 'tempo', $statistiche[$k])." secondi.</li>";
						echo "<li>".$nomeStat[$k]." delle mosse è ". getStat($giochi[$i], $difficolta[$j], 'mosse', $statistiche[$k]).".</li>";
					}
					echo "</ul>";
					echo "</div>";
				}
				echo "</div>";
				echo "</section>";
			}
			

		?>
		

		<?php
            require_once "/layout/footer.php";
        ?>
    </body>
</html>