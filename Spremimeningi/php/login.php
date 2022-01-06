<?php
	require_once "utility/SpremiMeningiDB.php";
	require_once "utility/GestoreSessione.php";
	session_start();
	
	if(isLogged()){
		header('Location: ./../index.php');
		exit;
	}
?>
<!DOCTYPE html>
<html lang = "it">
	<head>
		<title> Login </title>
		<meta charset = "utf-8">
		<meta name = "author" content = "Iacopo Bicchierini">
        <link rel = "stylesheet" type = "text/css" href = "../css/general.css"> 
        <link rel = "stylesheet" type = "text/css" href = "../css/login.css">
	</head>
	<body>
		<?php
            require_once "/layout/navbar.php";
        ?>
        
        <section id="login">
			<h3> Login </h3>
			<div>
            <form id = "form_login" action = "./process/login_process.php" method = "post">
				<label> Effettua l'accesso </label>
				<input type = "text" placeholder = "Username" name = "username" required autofocus>
				<input type = "password" placeholder = "Password" name = "password" required>
				<button type = "submit"> Accedi </button>
			</form>
			<p> Se non sei ancora registrato, inizia a scaldare le meningi e clicca <a id="registrazione" href = "./registrazione.php"> qui </a>
			<?php
				if (isset($_GET['errorMessage'])){
					$error = $_GET['errorMessage'];
					echo "<p id=\"error\"> $error </p>";
				}
			?>
			</div>
		</section>
		
		<?php
			require_once "layout/footer.php";
		?>
	</body>
</html>
