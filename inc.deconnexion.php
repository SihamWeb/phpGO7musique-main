<?php
	
	// Fonction setDeconnecte permettant de déconnecter l'utilisateur en supprimant les informations de sa session
	
	function setDeconnecte(){
		session_destroy();
		unset($_SESSION);
		header('Location: connexion.php');
		exit;
	}

	
	// Fonction addMessageAlert permettant d'afficher un message notamment lors de la déconnexion

	function adddMessageAlert($msg = ""){
		if(!array_key_exists('msg', $_SESSION)){
			$_SESSION['msg'] = "";
		}

		$_SESSION['msg'] .= $msg." ";
	}


?>