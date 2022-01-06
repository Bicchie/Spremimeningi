<?php
	require_once "/GestoreDB.php";
	
	// aggiunge un account
	function addUtente($username, $nome, $cognome, $email, $password)
	{
        global $database;
        $username = $database -> sqlInjectionFilter($username);
		$nome = $database -> sqlInjectionFilter($nome);
		$cognome = $database -> sqlInjectionFilter($cognome);
		$email = $database -> sqlInjectionFilter($email);
		$password = $database -> sqlInjectionFilter($password);
		$query = 'INSERT INTO utenti (username, nome, cognome, email, password) 
				  VALUES (\''.$username.'\', \''.$nome.'\', \''.$cognome.'\', \''.$email.'\', \''.$password.'\')';
		$database -> performQuery($query);
		$database -> closeConnection();
	}
	
	// aggiunge un risultato
	function addScore($username, $gioco, $difficolta, $mosse, $tempo)
	{
		// se l'utente l'amministratore non si registra il punteggio poiché non è un utente 
		// e sta usando il servizio presumibilmente per testarlo
		if($username == 'admin')
			return;
		global $database;
		$username = $database -> sqlInjectionFilter($username);
        $gioco = $database -> sqlInjectionFilter($gioco);
        $difficolta = $database -> sqlInjectionFilter($difficolta);
        $mosse = $database -> sqlInjectionFilter($mosse);
        $tempo = $database -> sqlInjectionFilter($tempo);
		$query = 'INSERT INTO score (username,gioco,difficolta,mosse,tempo)
				  VALUES (\''.$username.'\', \''.$gioco.'\', \''.$difficolta.'\', \''.$mosse.'\', \''.$tempo.'\')';
		$database -> performQuery($query);
		$database -> closeConnection();
	}	

	// ritorna la lista di tutti gli utenti
	function getUtenti()	
	{ 
		global $database;
		$query = 'SELECT * FROM utenti';
		$result = $database -> performQuery($query);
		$database -> closeConnection();
		return $result;
	}

    // ritorna gli score per gioco e livello di difficolta
	function getScores($gioco,$difficolta)	
	{
		global $database;
		$query = 'SELECT username,mosse,tempo
				  FROM score
				  WHERE gioco = \''.$gioco.'\' AND difficolta = \''.$difficolta.'\'
				  ORDER BY mosse,tempo';
		$result = $database -> performQuery($query);
		$database -> closeConnection();
		return $result;
	}
	
	// ritorna il numero di giocatori registrati
	function numUtenti(){
		global $database;
		$query = 'SELECT COUNT(distinct username) AS numero
				  FROM utenti';
		$result = $database -> performQuery($query);
		$database -> closeConnection();
		$userRow = $result -> fetch_assoc();
		// tolgo 1 poiché c'è l'amministratore
		return $userRow['numero'] - 1;
	}

	// ritorna il numero di giochi risolti
	function numScores(){
		global $database;
		$query = 'SELECT COUNT(*) AS numero
				  FROM score';
		$result = $database -> performQuery($query);
		$database -> closeConnection();
		$userRow = $result -> fetch_assoc();
		return $userRow['numero'];
	}

	// ritorna la statistica richiesta in 'operazione' riguardo al gioco e alla difficolta richiesta nei confronti del parametro in 'quale'
	function getStat($gioco,$difficolta,$quale,$operazione){
		global $database;
		$query = 'SELECT '.$operazione.'('.$quale.') AS statistica
					FROM score
					WHERE gioco = \''.$gioco.'\' AND difficolta = \''.$difficolta.'\'';
		$result = $database -> performQuery($query);
		$database -> closeConnection();
		$userRow = $result -> fetch_assoc();

		// se non c'è nessun dato ritorno 'vuoto'
		$numRows = mysqli_num_rows($result);
		if($numRows == 0)
			return 'vuoto';

		return round($userRow['statistica'],2);
	}
?>