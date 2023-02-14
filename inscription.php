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
            <?php else: // Déconnecté?>
            
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
            $mdp_verif = htmlspecialchars($_POST['confirm_password']);
            $correct = 0;

            // Requête pour vérifier si le pseudo existe déjà dans la BDD
            $verif_login_exist = $bdd->prepare("SELECT identifiant FROM utilisateurs WHERE identifiant=?");
            $verif_login_exist->execute([$login]); 
            $pseudo = $verif_login_exist->fetch();

            if ($_POST && count($_POST)) { // Vérification si le formulaire a bien été transmis

                if (
                    // Vérifier si la variable $login existe
                    (isset($login))&&
                    // Vérifier que la variable est de type alphabet
                    (ctype_alpha($login))&&
                    // Vérifier qu'un pseudo a été saisi
                    (!empty($login))&&
                    // Vérifier le format
                    (preg_match("~^[a-zA-Z]+$~", $login))&& 
                    ((strlen($login) <= 25)&&(strlen($login) >= 3))
                ){

                    $correct++;

                    // Si le pseudo saisi n'exsite pas dans la BDD
                    if (!$pseudo) {

                        $correct++;

                        if (
                            // Vérifier si la variable $mdp existe
                            (isset($mdp))&&
                            // Vérifier que la variable est de type numérique
                            (is_string($mdp))&&
                            // Vérifier qu'un mot de passe a été saisi
                            (!empty($mdp))&&
                            // Vérifier le format
                            (strlen($mdp) >= 8)&&
                            (preg_match("/[A-Z]+[a-z]+[0-9]+[!.,?@%$&#]+/", $mdp))
                        ) {
                        
                            $correct++;

                            if (
                                // Vérifier si la variable $mdp _verif existe
                                (isset($mdp_verif))&&
                                // Vérifier que la variable est de type numérique
                                (is_string($mdp_verif))&&
                                // Vérifier qu'un mot de passe a été saisi
                                (!empty($mdp_verif))&&
                                // Vérifier le format
                                (strlen($mdp_verif) >= 8)&&
                                (preg_match("/[A-Z]+[a-z]+[0-9]+[!.,?@%$&#]+/", $mdp_verif))&&
                                // Vérifier que les mots de passes saisis sont identique
                                ($mdp == $mdp_verif)
                            ) {
                                $correct++;

                                if (
                                    // Tester si la variable $correct existe
                                    (isset($correct))&&
                                    // Vérifier si la variable est de type numérique
                                    (is_numeric($correct))&&
                                    // Vérifier si la variable a bien un résultat
                                    (!empty($correct))&&
                                    // Vérification si la variable est égal à 4 : validation du pseudo, pseudo inexistant dans la BDD, validation du mot de passe ainsi que du mot de passe de vérification
                                    ($correct == 4)
                                ){

                                    $info_ok = '<p id="sub_accept">Votre inscription a bien été prise en compte !</p>'; // Confirmation
                                    $button_connect_inscription = "<div><a href='connexion.php'><div id='log-in-inscription'>Connectez-vous</div></a></div>"; 
                                
                                }
                                
                            } else {
                                $mdp_verif_incorrect= '<p class="message_error">Saisissez un mot de passe identique</p>'; // Message d'erreur mot de passe de confirmation

                            }

                        } else {

                            $mdp_incorrect= '<p class="message_error">Saisissez un mot de passe valide (au moins 8 caractères avec minimum une lettre majuscule puis une lettre minuscule puis un chiffre et un caractère parmi : ! . , ? @ % $ & #)</p>'; // Message d'erreur mot de passe
                        }

                    } else {

                        $login_exist= '<p class="message_error">Pseudo déjà existant !</p>'; // Message d'erreur pseudo

                    }

                } else {

                    $login_incorrect= '<p class="message_error">Saisissez un pseudo valide (entre 3 et 25 lettres)</p>'; // Message d'erreur pseudo
                }
            }
        }

        ?>
		<!--Content-->
		<div class="content">
            <div class=banner-top><b><a href=index.php>Spotifun</a></b>   >   <a href="inscription.php">S'inscrire</a></div>
            <h1>Inscrivez-vous</h1>
            <form method="post" action="" id="form">
                <div class="field">
                    <label for="title">Pseudo</label>
                    <input type="text" id="title" name="id">
                    <?php 

                    if (isset($login_incorrect)) {

                        echo $login_incorrect;

                    }

                    if (isset($login_exist)) {

                        echo $login_exist;

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
                <div class="field">
                    <label>Confirmation mot de passe</label>
                    <input type="password" name="confirm_password">
                    <?php 

                    if (isset($mdp_verif_incorrect)) {

                        echo $mdp_verif_incorrect;

                    }

                    ?>
                </div>
				<input type="submit" value="Soumettre mon inscription" name="submit_inscription">
                <?php 
                    
                    if (isset($info_ok)) {

                        echo $info_ok;
                        echo $button_connect_inscription;

                        // Requête pour l'ajout d'utilisateur dans la BDD
                        $new_user = $bdd->prepare('INSERT INTO utilisateurs (identifiant, motdepasse) VALUES (:identifiant, :motdepasse)');
                            $new_user->execute(array(
                                'identifiant' => htmlspecialchars($_POST['id']),
                                'motdepasse' => htmlspecialchars($_POST['password'])
                                ));

                        $new_user->closeCursor();

                    }
                 ?>
            </form>
		</div>
	</body>
</html>
