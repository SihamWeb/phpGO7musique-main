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
					<a href="index.php"><li class="active"><i class="fa-solid fa-xl fa-house"></i>Accueil</li></a>
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
		<!--Content-->
		<div class="content home-content">
			<div class=banner-top><b><a href=index.php>Spotifun</a></b><br>De la musique pour tous !</div>
			<div class="section">
				<h1>Nos artistes du moment</h1>
				<div class="row artists">
					<?php
						// On charge le fichier permettant de se connecter à la bdd
						include 'inc.connexion.php';

						$requete = $bdd -> query('SELECT artiste FROM chansons');

						$artists_all = array();

						while ($data = $requete->fetch())
						{
							if (!$data) // On teste si la réponse à la requête est vide.
							{
								echo 'La BDD n\'existe pas ou est vide.';
								break;
							}
							else
							{
								array_push($artists_all, $data['artiste']);
							}
						}

						$artistes = array_unique($artists_all);

						foreach ($artistes as $artiste)
						{
							echo '<div class="container artist_container">
							<h3>'.$artiste.'</h3>
						   </div>';
						}
						

						$requete->closeCursor();
					?>
				</div>
			</div>
			<div class="section">
				<h1>Nos albums du moment</h1>
				<div class="row">
					<?php

						$requete_album = $bdd -> query('SELECT nom_cd, artiste, couverture FROM chansons ORDER BY annee_sortie DESC '); // Requête 

						$albums = array(); // Création et définition d'un tableau

						while ($data = $requete_album->fetch())
						{
							if (!$data) // On teste si la réponse à la requête est vide.
							{
								echo 'La BDD n\'existe pas ou est vide.';
								break;
							}
							else
							{
								$album_bdd=array('nom_album' => $data['nom_cd'], 'nom_artiste' => $data['artiste'], 'couverture_album' => $data['couverture']); 
								array_push($albums, $album_bdd); // alimenter le tableau avec le nom de l'album, son artiste et sa couverture
							}
						}

						$column_album = array_column($albums, "nom_album"); // Tableau comportant seulement les noms d'albums
						$results_unique=array_unique($column_album); // Enlever les doublons
						$results = array_intersect_key($albums, $results_unique); // Associer les noms d'albums avec leur artiste et couverture présents dans le tableau $albums
						$top_5 = array_splice($results, 0, 5); // Stocker les 5 premiers

						foreach ($top_5 as $album_bdd) 
						{
							// Affichage
							echo '
							<div class="container album-container">
								<img src="' .htmlspecialchars($album_bdd['couverture_album']). '">
								<h3>' .htmlspecialchars($album_bdd['nom_album']). '</h3>
								<p>' .htmlspecialchars($album_bdd['nom_artiste']). '</p>
							</div>';
						}

						$requete_album->closeCursor();

					?>
				</div>
			</div>
		</div>
	</body>
</html>
