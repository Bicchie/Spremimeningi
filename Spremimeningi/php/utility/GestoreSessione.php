<?php	
	// imposta appropiatamente il nome dell'utente nella variabile di sessione 'username'
	function setSession($username){
		$_SESSION['username'] = $username;
	}

	// controlla se l'utente ha effettuato l'accesso
	function isLogged(){	
		if(isset($_SESSION['username']))
			return true;
		else
			return false;
	}

	// controlla se ha effettuato l'accesso l'amministratore
	function isAdmin()
	{
		if(isset($_SESSION['username']) && $_SESSION['username'] == "admin")
			return true;
		else
			return false;
	}
?>