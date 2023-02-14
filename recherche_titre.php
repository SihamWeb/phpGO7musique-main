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
					<a href="recherche.php"><li class="active"><i class="fa-solid fa-xl fa-magnifying-glass"></i>Rechercher</li></a>
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
			<?php else: // Déconnecté ?>
			
            <div id="user-connect">
				<a href="connexion.php"><div id="log-in">Se connecter</div></a>
				<a href="inscription.php"><div id="sign-up">S'inscrire</div></a>
			</div>
            <?php endif; ?>
		</aside>
		<!--Content-->
		<div class="content">
			<div class=banner-top><b><a href=index.php>Spotifun</a></b>   >   <a href=recherche.php>Recherche</a>   >   Recherche par titre</div>
			<?php

				//~ Lors de la soumission du formulaire
				if($_POST 
				&& count($_POST) 
					&& array_key_exists('nom_musique', $_POST)
						&& !empty($_POST['nom_musique'])){

				// On charge le fichier permettant de se connecter à la bdd
				include 'inc.connexion.php';

				// On prépare la requête
				$requete = $bdd -> prepare('SELECT couverture, titre_chanson, artiste, nom_cd, duree FROM chansons WHERE titre_chanson LIKE "%"?"%"');

				// Exécution de la requête via la méthode 'execute'
				$requete->execute(array($_POST['nom_musique'])); // Le paramètre indiqué va aller remplacer le '?' de la ligne précédente

				// On teste s'il existe quelconque résultat pour la recherche
				if ($requete->rowCount() == 0)
				{
					echo '<h1 id="no-result">Aucune chanson ne correspond à <em>'.htmlspecialchars($_POST['nom_musique']).'</em></h1>';
				}
				else
				{
					// On affiche la première ligne du tableau contenant les titres des colonnes
					echo '<h1>Voici le(s) titre(s) contenant <em>'.htmlspecialchars($_POST['nom_musique']).'</em></h1>
							<div class="column">
							<div class="song-container">
								<div id="title-cover">
									<img src="media/exemple.jpg">
									<p>Titre</p>
								</div>
								<p>Artiste</p>
								<p>Album</p>
								<p>Durée</p>
							</div>';

					while ($data = $requete->fetch())
					{	
						// On reformate la durée en enlevant les heures
						$duree_chanson = str_replace("00:", "", $data['duree']);

						// Affichage ligne par ligne des résultats de recherche
						echo '<div class="song-container">
								<div id="title-cover">
									<img src="'.$data['couverture'].'">
									<p>'.$data['titre_chanson'].'</p>
								</div>
								<p>'.$data['artiste'].'</p>
								<p>'.$data['nom_cd'].'</p>
								<p>'.$duree_chanson.'</p>
							  </div>';
					}
				}

				$requete->closeCursor();
				}
				else
				{
					echo '<h1 id="no-result">Erreur lors de la soumission du formulaire</h1>';
				}

			?>
		</div>
	</body>
</html>
