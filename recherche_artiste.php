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
			<div class=banner-top><b><a href=index.php>Spotifun</a></b>   >   <a href=recherche.php>Recherche</a>   >   Recherche par artiste</div>
			<?php

				//~ Lors de la soumission du formulaire
				if($_POST 
				&& count($_POST) 
					&& array_key_exists('nom_artiste', $_POST)
						&& !empty($_POST['nom_artiste'])){

				// On charge le fichier permettant de se connecter à la bdd
				include 'inc.connexion.php';

				// On prépare la requête (on trie les noms des artistes par ordre alphabétique)
				$requete = $bdd -> prepare('SELECT artiste FROM chansons WHERE artiste LIKE "%"?"%" ORDER BY artiste');

				// Exécution de la requête via la méthode 'execute'
				$requete->execute(array($_POST['nom_artiste'])); // Le paramètre indiqué va aller remplacer le '?' de la ligne précédente

				// Création du tableau $artists pour y rentrer les résultats de recherche
				$artists = array();

				// On teste s'il existe quelconque résultat pour la recherche
				if ($requete->rowCount() == 0)
				{
					echo '<h1 id="no-result">Aucun artiste ne correspond à <em>'.htmlspecialchars($_POST['nom_artiste']).'</em></h1>';
				}
				else
				{
					echo '<h1>Voici le ou les artistes contenant <em>'.htmlspecialchars($_POST['nom_artiste']).'</em></h1>
						  <div class="row album-results artist-results">';

					while ($data = $requete->fetch())
					{	
						if (!$data) // On teste si la réponse à la requête est vide.
						{
							echo 'La BDD n\'existe pas ou est vide.';
							break;
						}
						else
						{
							// On crée un tableau $artist et on y rentre les artistes correspondant à la recherche
							$artist=array("artiste"=>$data['artiste']);
							// On ajoute le tableau $artist au tableau multidimensionnel $artists
							array_push ($artists, $artist);
						}
					}

					// On compte le nombre de titres par artiste et on stocke les valeurs dans le tableau $count_songs
					$count_songs = array_count_values(array_merge(array_column($artists,"artiste")));

					// On affiche chaque artiste avec son nombre de titres disponibles sur Spotifun et la première lettre de son prénom (avec mb_substr)
					foreach($count_songs as $artist => $songs)
					{
						echo '<div class="artist-container">
									<div class="header"></div>
                   					<div class="artist-content">
                        				<div id="circle">'.mb_substr($artist, 0, 1).'</div>
					    				<h2>'.$artist.'</h2>
                            			<p id="tippy-songs"><i class="fa-solid fa-headphones"></i>'.$songs.'<p>
                    				</div>
								  </div>';
					}
					echo '</div>';
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
