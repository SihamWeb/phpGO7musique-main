<?php

// On ouvre la session
session_start();

// On utilise les fonctions la page PHP inc.deconnexion pour se déconnecter
include 'inc.deconnexion.php';

// Message de validation de la déconnexion
adddMessageAlert("Vous avez bien été déconnecté.");

// On utilise la fonction de déconnexion et fermeture de session contenu dans le fichier inc.deconnexion.php
setDeconnecte();


?>