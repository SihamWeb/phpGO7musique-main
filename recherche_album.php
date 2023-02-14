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
			<div class=banner-top><b><a href=index.php>Spotifun</a></b>   >   <a href=recherche.php>Recherche</a>   >   Recherche par album</div>
				<?php

					//~ Lors de la soumission du formulaire
    				if($_POST 
        				&& count($_POST) 
            				&& array_key_exists('nom_album', $_POST)
                				&& !empty($_POST['nom_album'])){

						// On charge le fichier permettant de se connecter à la bdd
						include 'inc.connexion.php';

						// On prépare la requête
						$requete = $bdd -> prepare('SELECT couverture, artiste, nom_cd FROM chansons WHERE nom_cd LIKE "%"?"%"');

						// Exécution de la requête via la méthode 'execute'
						$requete->execute(array($_POST['nom_album'])); // Le paramètre indiqué va aller remplacer le '?' de la ligne précédente

						// Création du tableau $album pour y rentrer les résultats de recherche
						$albums = array();

						// On teste s'il existe quelconque résultat pour la recherche
						if ($requete->rowCount() == 0)
						{
							echo '<h1 id="no-result">Aucun album ne correspond à <em>'.htmlspecialchars($_POST['nom_album']).'</em></h1>';
						}
						else
						{
							echo '<h1>Voici le(s) albums(s) contenant <em>'.htmlspecialchars($_POST['nom_album']).'</em></h1>
								  <div class="row album-results">';

							while ($data = $requete->fetch())
							{	
								if (!$data) // On teste si la réponse à la requête est vide.
								{
									echo 'La BDD n\'existe pas ou est vide.';
									break;
								}
								else
								{
									// On crée un tableau $album et on y rentre les couvertures, noms et artises des albums correspondant à la recherche
									$album=array("couverture"=>$data['couverture'],"album"=>$data['nom_cd'],"artiste"=>$data['artiste']);
									// On ajoute le tableau $album au tableau multidimensionnel $albums
									array_push ($albums, $album);
								}
						 	}

							// On supprime les valeurs dupliquées du tableau $albums
							$temp = array_unique(array_column($albums, 'couverture'));
							$unique_albums = array_intersect_key($albums, $temp);

							// On affiche chaque album avec sa couverture, nom et artiste associés
							foreach($unique_albums as $album)
							{
								echo '<div class="container album-container">
										<img src="'.$album['couverture'].'">
										<h3>'.$album['album'].'</h3>
                    					<p>'.$album['artiste'].'</p>
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
            <!--<h1>Voici le(s) album(s) correspondant à votre recherche</h1>
			<div class="row album-results">
				<div class="container album-container">
					<img src="media/exemple.jpg">
					<h3>Album ailnerjkwhr fsarcwe</h3>
                    <p>Artiste akrnejenkfln</p>
				</div>
			</div>-->
		</div>
	</body>
</html>
