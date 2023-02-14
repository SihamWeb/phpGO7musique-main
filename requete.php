<?php 
    session_start(); // On initialise ou relaye la session
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="styles.css" />
		<title>Spotifun - De la musique pour tous !</title>
		<link rel="shortcut icon" href="media/logo.png" />
		<link rel="stylesheet" href="https://static.tumblr.com/svdghan/wUSr83npl/tempcf.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
		<script src="https://unpkg.com/@popperjs/core@2"></script>
		<script src="https://unpkg.com/tippy.js@6"></script>
		<link rel="stylesheet" href="https://unpkg.com/tippy.js@6/animations/scale.css" />
		<script src="script.js"></script>
	</head>

	<body>
		<!--Sidebar-->
		<aside>
			<a href="index.php" id="logo"><img src="media/logo.png">Spotifun</a>
			<nav>
				<ul>
					<a href="index.php"><li><i class="fa-solid fa-xl fa-house"></i>Accueil</li></a>
					<a href="recherche.php"><li><i class="fa-solid fa-xl fa-magnifying-glass"></i>Rechercher</li></a>
					<a href="compte.php"><li><i class="fa-solid fa-xl fa-user"></i>Mon compte</li></a>
				</ul>
			</nav>
			<div id="requete">
				<p>Vous ne trouvez pas votre chanson préférée ?</p>
				<a href="requete.php">
					<div class="btn-container">
						Envoyez-nous vos requêtes
					</div>
				</a>
			</div>
			<?php 
				if( // Connecté
					$_SESSION && 
					count($_SESSION) && 
					array_key_exists('id', $_SESSION) && 
					!empty($_SESSION['id'])
				) : 
			?>
			<div id="user-connected">
                <div id="user">
                    <div id="profile-picture"><?php echo mb_substr($_SESSION['id'], 0, 1); ?></div>
                    <p id="pseudo"><?php echo $_SESSION['id'] ?><a href="deconnexion.php"><br><span>Se déconnecter</span></a></p>
                </div>
                <a href="compte.php" data-tippy-content="Mon compte"><i class="fa-solid fa-chevron-right"></i></a>
            </div> 
			<?php else: ?>
			
            <div id="user-connect">
				<a href="connexion.php"><div id="log-in">Se connecter</div></a>
				<a href="inscription.php"><div id="sign-up">S'inscrire</div></a>
			</div>
            <?php endif; // Déconnecté ?>
		</aside>
		<?php 

		// Fichier permettant de se connecter à la BDD
		include("inc.connexion.php");

		if (isset($_POST['submit'])){ // Clique sur le bouton de soumission du formulaire 
			
			$title = htmlspecialchars($_POST['new_title']);
			$artiste = htmlspecialchars($_POST['new_artiste']);
			$album = htmlspecialchars($_POST['new_album']);
			$annee = htmlspecialchars($_POST['year']);
			$submit = htmlspecialchars($_POST['submit']);
			$correct = 0;

			if ($_POST && count($_POST)) { // Vérification si le formulaire a bien été transmis

	            if (
	            	// Vérifier que la variable 'new_title' existe dans le tableau $_POST
	                (array_key_exists('new_title', $_POST))&&
	                // Vérifier qu'il s'agit bien d'une variable de type chaîne de caractère
	                (is_string($title))&&
	                // Vérifier que la variable n'est pas vide
	                (!empty($title))
	            ){

	                $correct++;

	                if (
	                	// Vérifier que la variable 'new_artiste' existe dans le tableau $_POST
	                    (array_key_exists('new_artiste', $_POST))&&
	                    // Vérifier qu'il s'agit bien d'une variable de type chaîne de caractère
		                (is_string($artiste))&&
		                // Vérifier que la variable n'est pas vide
		                (!empty($artiste))
	                ){
	                
	                    $correct++;

	                    if (
	                    	// Vérifier que la variable 'new_album' existe dans le tableau $_POST
	                        (array_key_exists('new_album', $_POST))&&
	                        // Vérifier qu'il s'agit bien d'une variable de type chaîne de caractère
			                (is_string($album))&&
			                // Vérifier que la variable n'est pas vide
			                (!empty($album))
	                    ){
	                        $correct++;

	                        if (
	                        	// Vérifier que la variable 'year' existe dans le tableau $_POST
	                        	(array_key_exists('year', $_POST))&&
	                        	// Vérifier qu'il s'agit bien d'une variable de type numérique
				                (is_numeric($annee))&&
				                // Vérifier que la variable n'est pas vide
				                (!empty($annee))&&
				                // Vérification du format
				                (preg_match("~^[0-9]{4}$~",$annee))
	                        ){
	                        	$correct++;

	                        	if (
	                        		// Vérifier que la variable $correct existe
		                            (isset($correct))&&
		                            // Vérifier qu'il s'agit bien d'une variable de type numérique
		                            (is_numeric($correct))&&
		                            // Vérifier que la variable n'est pas vide
		                            (!empty($correct))&&
		                            // Vérifier que la variable a une valeur de 4 : l'utilisateur a saisi un titre valide, un artiste valide, un album valide et une année de sortie valide ?
		                            ($correct == 4)
		                        ){

		                            $info_ok = 'validé'; // Validation

		                        }

	                        } else {

	                        	$annee_incorrect= '<p class="message_error">Saisissez une année valide</p>'; // Message d'erreur année

	                        }
	                        
	                    } else {

	                        $album_incorrect= '<p class="message_error">Saisissez un album valide</p>'; // Message d'erreur album

	                    }

	                } else {

	                    $artiste_incorrect= '<p class="message_error">Saisissez un artiste valide</p>'; // Message d'erreur artiste

	                }

	            } else {

	                $title_incorrect= '<p class="message_error">Saisissez un titre valide</p>'; // Message d'erreur titre

	            }
	        }

		}
			
		?>
		<!--Content-->
		<div class="content">
			<div class=banner-top><b><a href=index.php>Spotifun</a></b>   >   <a href=requete.php>Requête</a></div>
            <h1>Quelle chanson souhaitez-vous voir sur Spotifun ?</h1>
            <?php if(!isset($info_ok)) : // Affichage quand aucun formulaire n'a été soumis ou que les conditions ne sont pas toutes respectées?>
	            <form method="post" action="" id="form">
	                <div class="field">
	                    <label for="title">Titre</label>
	                    <input type="text" id="title" name="new_title">
	                    <?php

	                    if (isset($title_incorrect)){

	                    	echo $title_incorrect;

	                    }

	                    ?>
	                </div>
	                <div class="field">
	                    <label>Artiste</label>
	                    <input type="text" name="new_artiste">
	                    <?php

	                    if (isset($artiste_incorrect)){

	                    	echo $artiste_incorrect;
	                    	
	                    }

	                    ?>
	                </div>
	                <div class="field">
	                    <label>Album</label>
	                    <input type="text" name="new_album">
	                    <?php

	                    if (isset($album_incorrect)){

	                    	echo $album_incorrect;
	                    	
	                    }

	                    ?>
	                </div>
	                <div class="field">
	                    <label>Année de sortie</label>
	                    <input type="number" name="year">
	                    <?php

	                    if (isset($annee_incorrect)){

	                    	echo $annee_incorrect;
	                    	
	                    }

	                    ?>
	                </div>
					<input id="submit_request" name="submit" type="submit" value="Envoyer ma requête">
	            </form>
	        <?php else: // Affichage quand le formulaire est soumis et que toutes les conditions sont respectées?>
	            	<?php



	                    if (isset($info_ok)){

	                    	// Requête pour ajouter les requêtes à la BDD
	                    	$requete_user = $bdd->prepare('INSERT INTO requetes (titre, artiste, album, annee) VALUES (:titre, :artiste, :album, :annee)');
	                            $requete_user->execute(array(
	                                'titre' => htmlspecialchars($title),
	                                'artiste' => htmlspecialchars($artiste),
	                                'album' => htmlspecialchars($album),
	                                'annee' => htmlspecialchars($annee) 
	                                ));

	                        // Affichage du récapitulatif
	                        echo
	                        '<div id="form">
	                        	<h2>Votre demande a bien été prise en compte ! Voici un récapitulatif :</h2>
		                       		<p><span>Titre</span>' .htmlspecialchars($title). '</p>
					                <p><span>Artiste</span>' .htmlspecialchars($artiste). '</p>
					                <p><span>Album</span>' .htmlspecialchars($album). '</p>
					                <p><span>Année de sortie</span>' .htmlspecialchars($annee). '</p>        
	                        	<a href="requete.php" id="new_request">Nouvelle requête</a>
	                        </div>';

	                        $requete_user->closeCursor();
	                    	
	                    }

	                    // Création et définition du tableau $_requete qui contient la requête de l'utilisateur
	                    $_requete = array(
							'title' => htmlspecialchars($title),
							'artiste' => htmlspecialchars($artiste),
							'album' => htmlspecialchars($album),
							'annee'   => htmlspecialchars($annee),
						);

	                    // On ajoute le tableau $_requete au tableau $_SESSION['requetes']
						array_push($_SESSION['requetes'], $_requete);

	                ?>
	        <?php endif; ?>
		</div>
	</body>
</html>
