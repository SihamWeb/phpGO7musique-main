<?php
	// Param�tres de connexion
	$serveur  = "db5011317353.hosting-data.io:3306";
	$database = "dbs9553759";
	$user     = "dbu438236";
	$password = "2r-CsL3tQ8aiOP897gh";
	
	// CONNEXION A LA BASE DE DONNEES mysql //
	/* 
		La structure try ... catch permet de r�aliser les actions suivantes :
		PHP essaie d'ex�cuter les instructions pr�sentes � l'int�rieur du bloc "try"
		En cas d'erreur, les instructions du bloc "catch" sont ex�cut�es.
		Dans ce cas, un message d'erreur est affich�.
	*/
	try
	{	
		/* 
			PDO est une extension "orient�e objet". Il faut donc v�rifier que l'extension PDO est bien activ�e sur votre version de PHP (cf cours)
			On travaille en local : localhost
			La BDD s'appelle "UE_L204"
			Le login par d�faut est "root"
			Le mot de passe (sur MAMP) est aussi "root". Il peut �tre vide pour WampServer.
			On cr�e un objet $bdd
		*/

		// Connexion � la base de donn�es
		// $bdd est un objet correspondant � la connexion � la BDD
		$bdd=new PDO('mysql:host='.$serveur.';charset=utf8;dbname='.$database.'',$user,$password);
		
		/* La ligne ci-dessous permet d'activer les erreurs lors de la connexion � la BDD via PDO.
		Les messages d'erreur li� � des requ�tes SQL comportant des erreurs seront plus clairs. */
		array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
	}
	catch(Exception $e)
	{
		// On lance une fonction PHP qui permet de conna�tre l'erreur renvoy�e lors de la connection � la base (en r�cup�rant le message li� � l'exception)
		die('<strong>Erreur d�tect�e !!! </strong> : ' . $e->getMessage());
	}
?>