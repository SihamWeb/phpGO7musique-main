<?php 
	session_start(); // On initialise ou relaye la session

	// On charge le fichier permettant de se connecter à la bdd
	include 'inc.connexion.php';
	
	// On supprime des données dans une BDD avec la requête DELETE
	$requete = $bdd->prepare('DELETE FROM utilisateurs WHERE identifiant = :pseudo');
	$requete->execute(array(
		'pseudo' => $_SESSION['id']
		));
	$requete->closeCursor();

	// Déconnexion + suppression des informations de la session
	session_destroy();
	unset($_SESSION);

	// Redirection vers la page d'accueil
	header('Location: index.php');

	exit;
?>