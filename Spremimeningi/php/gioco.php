<?php
	require_once "./utility/SpremiMeningiDB.php";
	require_once "./utility/GestoreSessione.php";
    session_start();

    if(!isLogged())
        header('location: ./login.php');

    $utente = $_SESSION['username'];
    if(isset($_GET['gioco']))
        $_SESSION['gioco'] = $_GET['gioco'];
    $gioco = $_SESSION['gioco'];
    if(!isset($_POST['difficolta']))
        $difficolta = 'vuoto';
    else
        $difficolta = $_POST['difficolta'];
?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <?php
            echo "<title> ".$gioco." </title>";
            echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/".$gioco.".css\">";
            echo "<script src = \"../js/".$gioco.".js\"> </script>";
        ?>
        <link rel = "stylesheet" type = "text/css" href = "../css/general.css">
        <link rel = "stylesheet" type = "text/css" href = "../css/gioco.css">  
        <script src = "../js/gioco.js"> </script>
    </head>
        <?php 
            echo '<body onLoad="begin('."'$difficolta'".','."'$gioco'".','."'$utente'".')">';
            require_once "layout/navbar.php";
        ?>

        <section>
            <?php
                echo "<h3> ".$gioco." </h3>";
            ?>
            <div id="container">
                <div id="partizione1">
                    <div class="stat" id="mosse"> Mosse: </div>
                    <div class="stat" id="tempo"> Tempo: </div>
                    <?php
                        if(isset($_POST['difficolta']))
                            echo "<div class=\"stat\" id=\"Difficolta\"> Difficolta: ".$_POST['difficolta']." </div>";
                    ?>
                    <div class="stat" id="scegli"> Scegli la difficolt&#224 </div>
                        <form class="stat" action="./gioco.php" method="post">
                        <label for="difficolta">Difficolt&#224:</label>
                        <select name="difficolta" id="difficolta">
                            <option value="Facile">Facile</option>
                            <option value="Medio">Medio</option>
                            <option value="Difficile">Difficile</option>
                        </select>
                        <br><br>
                        <input id="gioca" type="submit" value="Gioca">
                    </form>
                </div>
                
                <div id="partizione2"> 
                    <div id="playground"></div>
                </div>
                
                <div id="partizione3"> 
                <?php
                        $contatore = 0;
                        $result = getScores($gioco,$difficolta);
                        if(mysqli_num_rows($result) == 0)
                        {
                            echo "<p style=\"text-align:center; margin-left:35%;\"> Nessuno score presente. </p>";
                        }
                        else
                        {
                            echo "<table id = \"tab_score\">";
                            echo "<caption> Primi 10 punteggi </caption>";
                            echo "<thead>";
                            echo "<tr> <th> Username </th> <th> Mosse </th> <th> Tempo(s) </th>";
                            echo "</thead>";
                            echo "<tbody>";
                            while($score = $result -> fetch_assoc())
                            {
                                $contatore++;
                                $username = $score['username'];
                                $mosse = $score['mosse'];
                                $tempo = $score['tempo'];
                                echo "<tr> <td> ".$username." </td> <td> ".$mosse." </td> <td> ".$tempo." </td>";
                                if($contatore == 10)
                            break;
                        }
                        echo "</tbody>";
                        echo "</table>";
                    }
                    ?>

                </div>
            </div>
        </section>

        <?php
            require_once "layout/footer.php";
        ?>
    </body>
</html>