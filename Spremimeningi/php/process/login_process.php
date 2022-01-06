<?php
	require_once "./../utility/GestoreDB.php";
    require_once "./../utility/SpremiMeningiDB.php";
	require_once "./../utility/GestoreSessione.php";
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$errorMessage = login($username, $password);
	if($errorMessage === NULL)
		if($_SESSION['username'] === 'admin')
			header('location: ./../statistiche.php');
		else
			header('location: ./../../index.php');
	else
		header('location: ./../login.php?errorMessage=' . $errorMessage);
	
	function login($username, $password){
		if($username != NULL && $password != NULL)
		{
			$result = checkUser($username, $password);
			if($result != -1 && mysqli_num_rows($result) == 1)
			{
				session_start();
				$userRow = $result -> fetch_assoc();
				$passwordVerify = password_verify($password,$userRow['password']);
				if(!$passwordVerify)
					return 'password non valida';
				setSession($userRow['username']);
				return null;
			}
			else
				return 'username e/o password non validi';
		}
	}
	
	function checkUser($username, $password)
	{
		global $database;
		$username = $database -> sqlInjectionFilter($username);
		$password = $database -> sqlInjectionFilter($password);
		
		$queryText = "select * from utenti where username='" . $username . "'";
		
		$result = $database -> performQuery($queryText);
		$numRows = mysqli_num_rows($result);
		if($numRows != 1)
			return -1;
		$database -> closeConnection();
		return $result;
	}
?>