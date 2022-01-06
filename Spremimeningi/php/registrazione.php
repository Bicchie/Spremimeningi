<?php
	session_start();
	require_once "utility/GestoreSessione.php";
	require_once "utility/SpremiMeningiDB.php";
	
	if(isLogged())
	{
		header("Location: ./../index.php");
		exit;
	}
?>
<!DOCTYPE html>
<html lang = "it">
	<head>
	<head>
		<title> Registrazione </title>
		<meta charset = "utf-8">
		<meta name = "author" content = "Iacopo Bicchierini">
        <link rel = "stylesheet" type = "text/css" href = "../css/general.css"> 
        <link rel = "stylesheet" type = "text/css" href = "../css/form.css">
		</script>
		<script>
			function convalidaRegistrazione()
			{
				var pass1 = document.forms['registrazione']['password'].value;
				var pass2 = document.forms['registrazione']['confPassword'].value;
				
				if (pass1 == pass2)
					return true;
				else 
				{
					alert("Le password devono coincidere");
					return false;
				}
			}
		</script>
	</head>
	<body>
        <header>
			SPREMI MENINGI
		</header>
        <nav>
			<a href="../index.php" class ="link"> Home </a>
		</nav>

        <section class="container">
			<h3> Registrazione </h3>
            <form id = "registrazione" action = "process/registrazione_process.php" method = "post" onsubmit = "return convalidaRegistrazione()">
                <label for = "username"> Username (usare solo caratteri alfanumerici) </label>
                <input pattern = "[a-zA-Z]{1,}" type = "text" name = "username" placeholder = "DonnyDuck" id = "username" autofocus required> 
                <label for = "nome"> Nome </label>
                <input pattern = "[a-zA-Z]{1,}" type = "text" name = "nome" placeholder = "Donald" id = "nome" required> 
                <label for = "cognome"> Cognome </label>
                <input pattern = "[a-zA-Z]{1,}" type = "text" name = "cognome" placeholder = "Trump" id = "cognome" required>
                <label for = "email"> E-mail </label>
                <input type = "email" name = "email" placeholder = "donald.trump@whitehouse.gov" id = "email" required>
                <label for = "password"> Password (usare solo caratteri alfanumerici, lunghezza minima 6 caratteri) </label>
                <input pattern = "[a-zA-Z0-9]{6,}"
                    type = "password" name = "password" placeholder = "password" id = "password" required>
                <label for = "confPassword"> Conferma Password </label>
                <input pattern =  "[a-zA-Z0-9]{6,}"
                    type = "password" name = "confPassword" placeholder = "password" id = "confPassword" required>
                <button type = "submit"> Registrati </button>
            </form>
            <?php
                if (isset($_GET['errorMessage'])){
                    $error = $_GET['errorMessage'];
                    echo "<p id=\"error\"> $error </p>";
                }
            ?>
        </section>
		<?php
			require_once "layout/footer.php";
		?>
	</body>
</html>