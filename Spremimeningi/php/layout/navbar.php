<header>
	SPREMI MENINGI
</header>

<nav>
	<?php
        //i percorsi variano dipendentemente da dove ci troviamo
		if(basename($_SERVER['PHP_SELF']) == "index.php"){
            echo "<a href=\"./html/documentazione.html\" class =\"link\"> About </a>";
			$path = "php";
        } else {
            echo "<a href=\"../html/documentazione.html\" class =\"link\"> About </a>";
            $path = ".";
        }

        //se non è loggato allora mostrerò il link per il Login
        if(!isLogged())
            echo "<a href=\"$path/login.php\" class =\"link\"> Login </a>";
        else // sennò per il Logout
            echo "<a href=\"$path/process/logout.php\" class =\"link\"> Logout </a>";
           
        // se è l'amministratore ed è nella home, metto il riferimento alla pagina delle statistiche
        if(isAdmin() && (basename($_SERVER['PHP_SELF']) == "index.php")) 
            echo " <a href=\"./php/statistiche.php\" class=\"link\"> Statistiche </a>";

        echo "<a href=\"$path/regole.php\" class =\"link\"> Regole </a>";
        echo "<a href=\"$path/storia.php\" class =\"link\"> Storia </a>";

        if(basename($_SERVER['PHP_SELF']) == "index.php")
            echo "<a href=\"./index.php\" class =\"link\"> Home </a>";
        else
            echo "<a href=\"../index.php\" class =\"link\"> Home </a>";


            
        // se è loggato saluto l'utente
        if(isLogged())
            echo "<a id=\"salutiUtente\"> Ciao ".$_SESSION['username']." ! </a>";
	?>
</nav>