<?php
	require_once "./../utility/GestoreDB.php"; 
    require_once "./../utility/SpremiMeningiDB.php";

    // prendiamo i valori passati da registrazione.php
    $username = $_POST['username'];
	$nome = $_POST['nome'];
	$cognome = $_POST['cognome'];
	$email = 	$_POST['email'];
	$password = $_POST['password'];

	
	$errorMessage = checkUsername($username, $password);
	if($errorMessage === null)
	{
		$password = password_hash($password, PASSWORD_BCRYPT);
		addUtente($username, $nome, $cognome, $email, $password);
		header('location: ./../login.php');
	}
	else 
	{
		header('location: ./../registrazione.php?errorMessage=' . $errorMessage);
	}

	function checkUsername($username, $password){
		$result = getUtenti();
		while($account = $result->fetch_assoc())
		{
			if($username == $account['username'])
				return "Username esistente"	;
		}
		return null;
    }
 
?>