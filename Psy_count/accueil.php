<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Accueil</title>
	<meta name="description" content="Page d'accueil de Psy-fi">
	<link rel="icon" type="image/png" href="images/psy-fi.png" />
	<link rel="stylesheet" href="css/styleAccueil.css">
	<link rel="stylesheet" href="css/style.css">
</head>


<body>
 

	<div class="menu-bar">
		<div>
			<?php include("menuBar.php") ?>
		</div>
	</div>


	<section class="banner">

		<div>
			<h1 class="header-text">PSY-Count</h1>
		</div>
		<div class="header-description">
			<p class="header-presentation"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed<br>
				do eiusmod tempor incididunt ut labore et dolore magna<br>
				aliqua.
			</p>
		</div>
		<div>
			<button class="button">Découvrir</button>
		</div>

	</section>


	<section class="section-1">

		<h2>Nos objectifs</h2>
		<hr>
		<div class="section-1-main">
			<div class="section-1-column">
				<img src="images/Placement_Area_ASSETsmallSIZED.jpg" width="688" height="468" alt="Photographie santé" />
				<h2>Bilan de santé </h2>
				<p> Lorem ipsum dolor sit amet, consectetur<br>
					adipiscing elit, sed do eiusmod tempor incididunt <br>
					ut labore et dolore magna aliqua.
				</p>
				<div><button class="button">En savoir plus</button></div>
			</div>
			<div class="section-1-column">
				<img src="images/Placement_Area_ASSETsmallSIZED_di.jpg" width="688" height="468" alt="Photographie hôpital" />
				<h2>Soutien des hopitaux</h2>
				<p> Lorem ipsum dolor sit amet, consectetur<br>
					adipiscing elit, sed do eiusmod tempor incididunt <br>
					ut labore et dolore magna aliqua.
				</p>
				<div><button class="button">En savoir plus</button></div>
			</div>
			<div class="section-1-column">
				<img src="images/Placement_Area_ASSETsmallSIZED_dy.jpg" width="688" height="468" alt="Photographie seniors heureux" />
				<h2>Suivi des seniors</h2>
				<p> Lorem ipsum dolor sit amet, consectetur<br>
					adipiscing elit, sed do eiusmod tempor incididunt <br>
					ut labore et dolore magna aliqua.
				</p>
				<div><button class="button">En savoir plus</button></div>
			</div>
	</section>


	<section class="section-2">

		<video class="section-2-video" controls poster="images/Placement_Area_ASSETpanelSTATE@2x.jpg" src="video/SEP_V0_P1.mp4" type="video/mp4"></video>

	</section>


	<section class="section-3" id="about">

		<div class="section-3-text white-text">
			<h2>Notre histoire</h2>
			<p>Natus error sit voluptatem accusantium<br>
				doloremque laudantium, totam rem.</p>
			<p>Aperiam, eaque ipsa quae ab illo inventore <br>
				eritatis et quasi architecto beatae vitae dicta sunt explicabo.<br>
				Nemo enim ipsam voluptatem quia voluptas.</p>
			<p>
				Neque perro quisquam est, qui dolorem ipsum<br>
				quia dolor sit amet, consectetur, adipisci velit,sed<br>
				quia non numquam eius modi tempora incidunt ut<br>
				labore et dolore magnam aliquam quaerat voluptatem.
			</p>
		</div>

		<div class="section-3-people">

			<h2>Qui sommes nous ?</h2>
			<hr>
			<div class="psy-fi-creator-section">
				<div class="psy-fi-creator-group">
					<div class="psy-fi-creator-description">
						<img class="psy-fi-creator-picture" width="300" height="300" src="images/nicolas.jpg" alt="Nicolas profil">
						<p>Nicolas</p>
					</div>
					<div class="psy-fi-creator-description">
						<img class="psy-fi-creator-picture" width="300" height="300" src="images/victoria.jpg" alt="Victoria profil">
						<p>Victoria</p>
					</div>
					<div class="psy-fi-creator-description">
						<img class="psy-fi-creator-picture" width="300" height="300" src="images/justin.jpg" alt="Justin profil">
						<p>Justin</p>
					</div>
				</div>
				<div class="psy-fi-creator-group">
					<div class="psy-fi-creator-description">
						<img class="psy-fi-creator-picture" width="300" height="300" src="images/amanda.jpg" alt="Amanda profil">
						<p>Amanda</p>
					</div>
					<div class="psy-fi-creator-description">
						<img class="psy-fi-creator-picture" width="300" height="300" src="images/arsene.jpg" alt="Arsène profil">
						<p>Arsène</p>
					</div>
					<div class="psy-fi-creator-description">
						<img class="psy-fi-creator-picture" width="300" height="300" src="images/thibault.jpg" alt="Thibault profil">
						<p>Thibault</p>
					</div>
				</div>
			</div>
		</div>

		<div class="psy-icon">
			<img class="image-psy-fi" src="images/psy-fi-flat.png" />
		</div>

	</section>


	<section class="section-4 white-text">

		<?php include("footer.php") ?>

	</section>
</body>

</html>