<?php

//connexion BD

try {$db = new PDO('mysql:host= ;dbname= ;charset=utf8', '', '');}
catch (PDOException $e)
	{
		$db = null;
		print ("Connexion a la base de donnees impossible !");
		exit(1);
	}
?>