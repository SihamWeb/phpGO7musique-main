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
			<div class=banner-top><b><a href=index.php>Spotifun</a></b>   >   <a href="recherche.php">Recherche</a></div>
            <div class="section">
                <h1>Une musique...</h1>
                <form method="post" id="form" action="recherche_titre.php">
                    <input type="text" name="nom_musique" placeholder="Quelle musique recherchez-vous ?">
                    <input type="submit" value="Rechercher">
                </form>
            </div>
            <div class="section">
                <h1>Un album...</h1>
                <form method="post" id="form" action="recherche_album.php">
                    <input type="text" name="nom_album" placeholder="Quel album recherchez-vous ?">
                    <input type="submit" value="Rechercher">
                </form>
            </div>
            <div class="section">
                <h1>Un artiste ?</h1>
                <form method="post" id="form" action="recherche_artiste.php">
                    <input type="text" name="nom_artiste" placeholder="Quel artiste recherchez-vous ?">
                    <input type="submit" value="Rechercher">
                </form>
            </div>
		</div>
	</body>
</html>
