<?php 
    session_start(); // On initialise ou relaye la session

    $_SESSION['requetes'] = array(); // Création de la variable session, définition d'un tableau vide pour les requêtes
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
			<?php else: // Non connecté ?>
			
            <div id="user-connect">
				<a href="connexion.php"><div id="log-in">Se connecter</div></a>
				<a href="inscription.php"><div id="sign-up">S'inscrire</div></a>
			</div>
            <?php endif; ?>
		</aside>
		<?php 

		// Fichier permettant de se connecter à la BDD
		include("inc.connexion.php");

	    if (isset($_POST['submit_inscription'])) { // Clique sur le bouton de soumission

		    $login = htmlspecialchars($_POST['id']);
		    $mdp = htmlspecialchars($_POST['password']);
		    $correct = 0;

		    // Requête pour vérifier si le pseudo et le mot de passe saisis correspondent bien
		    $verif_login = $bdd -> prepare('SELECT identifiant FROM utilisateurs WHERE identifiant = ? AND motdepasse = ?');
		    $verif_login->execute(array($_POST['id'],$_POST['password']));
		    $data_login = $verif_login->fetch();

		    // Requête pour vérifier le pseudo saisi est bien dans la BDD
			$verif_pseudo = $bdd -> prepare('SELECT identifiant FROM utilisateurs WHERE identifiant = ?');
		    $verif_pseudo->execute(array($_POST['id']));
		    $data_pseudo = $verif_pseudo->fetch();	    

	        if ($_POST && count($_POST)) { // Vérification si le formulaire a bien été transmis

	            if (
	            	// Test si la variable $login existe 
	                (isset($login))&&
	                // Test si le pseudo est bien de type alphabet
	                (ctype_alpha($login))&&
	                // Test si un pseudo a bien été saisi
	                (!empty($login))&&
	                // Vérification du format
	                (preg_match("~^[a-zA-Z._-]+$~", $login))&&
	                ((strlen($login) <= 25)&&(strlen($login) >= 3))&&
	                // Vérification si le pseudo existe déjà dans la BDD
	                ($data_pseudo)
	            ){

	                $correct++;

	                if (
	                	// Test si la variable $mdp existe
	                    (isset($mdp))&&
	                    // Test si le mot de passe est bien de type chaîne de caractère
	                    (is_string($mdp))&&
	                    // Vérifier si un mot de passe a bien été saisi
	                    (!empty($mdp))&&
	                    // Vérifier le format
	                    (strlen($mdp) >= 8)&&
	                    (preg_match("/[A-Z]+[a-z]+[0-9]+[!.,?@%$&#]+/", $mdp))&&

	                    // Tester si la variable $correct existe
	                    (isset($correct))&&
	                    // Vérifier si la variable est de type numérique
                        (is_numeric($correct))&&
                        // Vérifier si la variable a bien un résultat
                        (!empty($correct))&&
                        // Vérification si la variable est égal à 1 : validation du pseudo (+ validation du mot de passe dans cette condition)
                        ($correct == 1)&&
                        // Vérification si le mot de passe et le pseudo correspondent bien 
                        ($data_login)
	                ) {
	                	
                      	echo "<script>window.location.href='https://eportfolio-csiham.mssiweb.com/UEL204/phpGO7musique-main/compte.php'</script>";
	                   	//header('Location: compte.php'); // Redirection vers la page compte quand l'utilisateur se connecte
                        $_SESSION['id'] = htmlspecialchars($login);
                        $_SESSION['mdp'] = htmlspecialchars($mdp);

	                } else {

	                    $mdp_incorrect= '<p class="message_error">Votre mot de passe est invalide</p>'; // Message d'erreur mot de passe
	                }

	            } else {

	                $login_incorrect= '<p class="message_error">Pseudo invalide</p>'; // Message d'erreur pseudo
	            }
	        }
		    $verif_login->closeCursor();
		    $verif_pseudo->closeCursor();
	    }

		?>
		<!--Content-->
		<div class="content">
			<div class=banner-top><b><a href=index.php>Spotifun</a></b>   >   <a href="connexion.php">Se connecter</a></div>
            <h1>Connectez-vous</h1>
            <form method="post" action="" id="form">
                <div class="field">
                    <label for="title">Pseudo</label>
                    <input type="text" id="title" name="id">
                    <?php 

                    if (isset($login_incorrect)) {

                        echo $login_incorrect;

                    }

                    ?>
                </div>
                <div class="field">
                    <label>Mot de passe</label>
                    <input type="password" name="password">
                    <?php 

                    if (isset($mdp_incorrect)) {

                        echo $mdp_incorrect;

                    }
                  
                    ?>
                </div>
				<input type="submit" value="Se connecter" name="submit_inscription">
            </form>
		</div>
	</body>
</html>
