<?php 
	session_start(); // On initialise ou relaye la session

	if (isset($_POST['submit_modif_pseudo'])) { // Clique sur le bouton de soumission du formulaire (de modification du pseudo)

	    $pseudo = htmlspecialchars($_POST['pseudo']);
	    $confirm_pseudo = htmlspecialchars($_POST['confirm_pseudo']);

	    $correct_id = 0;

	    if ($_POST && count($_POST)) { // Vérification si le formulaire a bien été transmis

	        if (
	        	// Test si la variable $pseudo existe 
	            (isset($pseudo))&& 
	            // Test si le pseudo est bien de type alphabet
	            (ctype_alpha($pseudo))&& 
	            // Test si un pseudo a bien été saisi
	            (!empty($pseudo))&& 
	            // Vérification du format
	            (preg_match("~^[a-zA-Z]+$~", $pseudo))&& 
	            ((strlen($pseudo) <= 25)&&(strlen($pseudo) >= 3)) 
	            
	        ){

	            $correct_id++;

                if (
                	// Test si la variable $confirm_pseudo existe 
                	(isset($confirm_pseudo))&&
                	// Test si le pseudo est bien de type alphabet
		            (ctype_alpha($confirm_pseudo))&&
		            // Test si un pseudo a bien été saisi
		            (!empty($confirm_pseudo))&&
		            // Vérification du format
		            (preg_match("~^[a-zA-Z]+$~", $confirm_pseudo))&& 
		            ((strlen($confirm_pseudo) <= 25)&&(strlen($confirm_pseudo) >= 3))&&
		            // Vérification si les deux pseudo saisi sont identiques
                    ($pseudo == $confirm_pseudo)
                ) {
                    $correct_id++;

                    if (
                    	// Test si la variable $correct_id existe 
                        (isset($correct_id))&&
                        // Test si le pseudo est bien de type numérique
                        (is_numeric($correct_id))&&
                        // Test si la variable a bien un résultat
                        (!empty($correct_id))&&
                        // Vérification si la variable est égal à 2 : validation du pseudo et validation du pseudo de confirmation
                        ($correct_id == 2)
                    ){
                    	
                        $info_ok_pseudo = "</br><p id='sub_accept'>Votre nouveau pseudo est " .$pseudo. "</p>"; // Confirmation

                    }
                    
                } else {

                    $pseudo_verif_incorrect = '<p class="message_error">Saisissez un pseudo valide et identique</p>'; // Message d'erreur pour le pseudo de confirmation

                }

	        } else {

	            $pseudo_incorrect= '<p class="message_error">Saisissez un pseudo valide (entre 3 et 25 lettres)</p>'; // Message d'erreur du pseudo saisi
	        }
	    }
	}

	if (isset($_POST['submit_modif_mdp'])) { // Clique sur le bouton de soumission du formulaire (de modification du pseudo)
	    
	    $mdp = htmlspecialchars($_POST['password']);
	    $confirm_mdp = htmlspecialchars($_POST['confirm_password']);

	    $correct_mdp = 0;

	    if ($_POST && count($_POST)) { // Vérification si le formulaire a bien été transmis

	        if (
	        	// Test si la variable $mdp existe 
	            (isset($mdp))&&
	            // Test si le mot de passe est bien de type chaîne de caractère
                (is_string($mdp))&&
                // Vérifier si un mot de passe a bien été saisi
                (!empty($mdp))&&
                // Vérifier le format
                (strlen($mdp) >= 8)&&
                (preg_match("/[A-Z]+[a-z]+[0-9]+[!.,?@%$&#]+/", $mdp))
	        ){

	            $correct_mdp++;

                if (
                	// Test si la variable $confirm_mdp existe 
                	(isset($confirm_mdp))&&
                	// Test si le mot de passe est bien de type chaîne de caractère
	                (is_string($confirm_mdp))&&
	                // Vérifier si le champs a bien été saisi
	                (!empty($confirm_mdp))&&
	                // Vérifier le format
	                (strlen($confirm_mdp) >= 8)&&
	                (preg_match("/[A-Z]+[a-z]+[0-9]+[!.,?@%$&#]+/", $confirm_mdp))&&
	                // Vérifier si les deux mots de passe saisis sont bien identiques
                    ($mdp == $confirm_mdp)
                ) {
                    $correct_mdp++;

                    if (
                    	// Tester si la variable $correct_mdp existe
                        (isset($correct_mdp))&& 
                        // Vérifier si la variable est de type numérique
                        (is_numeric($correct_mdp))&&
                        // Vérifier si la variable a bien un résultat
                        (!empty($correct_mdp))&&
                        // Vérification si la variable est égal à 2 : validation du mot de passe et validation du mot de passe de confirmation
                        ($correct_mdp == 2)
                    ){

                        $info_ok_mdp = "</br><p id='sub_accept'>Votre nouveau mot de passe a bien été enregistré.</p>"; // Confirmation

                    }
                    
                } else {

                    $mdp_verif_incorrect = '<p class="message_error">Saisissez un mot de passe valide et identique</p>'; // Message d'erreur du pseudo de confirmation saisi

                }

	        } else {

	            $mdp_incorrect= '<p class="message_error">Saisissez un mot de passe valide (au moins 8 caractères avec minimum une lettre majuscule puis une lettre minuscule puis un chiffre et un caractère parmi : ! . , ? @ % $ & #)</p>'; // Message d'erreur du pseudo
	        }
	    }
	}
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
					<a href="compte.php"><li class="active"><i class="fa-solid fa-xl fa-user"></i>Mon compte</li></a>
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
				if( // Utilisateur connecté
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
			<?php else: // Utilisateur non connecté ?>
			
            <div id="user-connect">
				<a href="connexion.php"><div id="log-in">Se connecter</div></a>
				<a href="inscription.php"><div id="sign-up">S'inscrire</div></a>
			</div>
            <?php endif; ?>
		</aside>
		<!--Content-->
		<div class="content">
			<div class=banner-top><b><a href=index.php>Spotifun</a></b>   >   <a href="compte.php">Mon compte</a></div>
            <?php 
				if( // Utilisateur connecté
					$_SESSION && 
					count($_SESSION) && 
					array_key_exists('id', $_SESSION) && 
					!empty($_SESSION['id'])
				) : 
			?>
            	<h1>Bonjour, <?php echo $_SESSION['id'] ?> !</h1>
            		<h2>Modifier mes paramètres de connexion</h2>
		            	<div id="form-inline">	
	            			<form method="POST" action="" id="form">
	            				<h3>Pseudo</h3>
				                <div class="field">
				                    <label for="title">Nouveau pseudo</label>
				                    <input type="text" id="title" name="pseudo">
				                    <?php
			                    		if (isset($pseudo_incorrect)) {

			                    			echo $pseudo_incorrect;

			                    		}
			                    	?>
				                </div>
				                <div class="field">
				                    <label for="title">Confirmation pseudo</label>
				                    <input type="text" id="title" name="confirm_pseudo">
				                    <?php
				                    	if (isset($pseudo_verif_incorrect)) {
				                    		
				                    		echo $pseudo_verif_incorrect;

				                    	}
				                    ?>
				                </div>
								<input type="submit" value="Modifier mon pseudo" name="submit_modif_pseudo">
				                <?php
				                	// Fichier permettant de se connecter à la BDD
									include 'inc.connexion.php';

									if (isset($info_ok_pseudo)) {
										// Modification des données dans la BDD avec la requête UPDATE
										$requete = $bdd->prepare('UPDATE utilisateurs SET identifiant = :new_pseudo WHERE identifiant = :old_pseudo');
										$requete->execute(array(
											'old_pseudo' => $_SESSION['id'],
											'new_pseudo' => $_POST['pseudo']
											));
										$requete->closeCursor();

										echo $info_ok_pseudo; // Affichage du message de confirmation

										$_SESSION['id'] = $_POST['pseudo']; // Nouveau pseudo ajouté à la session

									}
								?>
				            </form>
						
	            			<form method="post" action="" id="form">
	            				<h3>Mot de passe</h3>
				                <div class="field">
				                    <label>Nouveau mot de passe</label>
				                    <input type="password" name="password">
				                    <?php
			                    		if (isset($mdp_incorrect)) {

			                    			echo $mdp_incorrect;

			                    		}
			                    	?>
				                </div>
				                <div class="field">
				                    <label>Confirmation mot de passe</label>
				                    <input type="password" name="confirm_password">
				                    <?php
			                    		if (isset($mdp_verif_incorrect)) {

			                    			echo $mdp_verif_incorrect;

			                    		}
			                    	?>
				                </div>
								<input type="submit" value="Modifier mon mot de passe" name="submit_modif_mdp">
				                <?php 
			                     	if (isset($info_ok_mdp)) {
										// Modification des données dans la BDD avec la requête UPDATE
										$requete_mdp = $bdd->prepare('UPDATE utilisateurs SET motdepasse = :new_mdp WHERE motdepasse = :old_mdp');
										$requete_mdp->execute(array(
											'old_mdp' => $_SESSION['mdp'],
											'new_mdp' => $_POST['password']
											));
										$requete_mdp->closeCursor();

										echo $info_ok_mdp; // Affichage du message de confirmation

										$_SESSION['mdp'] = $_POST['password']; // Nouveau mot de passe ajouté à la session
									}
			                     ?>
				            </form>
					    </div>			

					<h2>Mes requêtes</h2>
					<div class ="requete-inline">
					<?php
					$i = 1;
                     	if( // Si l'utilisateur a réalisé des requêtes
                     		$_SESSION && 
                     		count($_SESSION) && 
                     		array_key_exists('requetes', $_SESSION) && 
                     		gettype($_SESSION['requetes']) === 'array' && 
                     		count($_SESSION['requetes'])
                     	){
                    
                        	foreach($_SESSION['requetes'] as $requete){
                    ?>		
	            			<div id="form">
	                    	<h2><?php echo 'Requête n°'.$i; // Elles s'affichent?></h2> 
	                       		<p><span>Titre</span><?php echo htmlspecialchars($requete['title']); ?></p>
				                <p><span>Artiste</span><?php echo htmlspecialchars($requete['artiste']); ?></p>
				                <p><span>Album</span><?php echo htmlspecialchars($requete['album']); ?></p>
				                <p><span>Année de sortie</span><?php echo htmlspecialchars($requete['annee']); ?></p>        
	                        </div>
		                        <?php
                        	$i++;}
                        } else {
                        	
                        	echo 'Vous n\'avez envoyé aucune requête.';
                        }

                    ?>
					</div>
                    <h2>Supprimer mon compte</h2>
	                    <div id="buttons-compte">
							<a href="suppression.php"><div id="button-supp">Supprimer</div></a>
						</div>
            <?php else: // Utilisateur non connecté ?>
	           	<h1>Vous n'êtes pas connecté. <a href='connexion.php'><span>Connectez-vous</span></a> pour accéder à votre compte !</h1>
            <?php endif; ?>
		</div>
	</body>
</html>
