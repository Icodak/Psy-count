<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<link rel="icon" type="image/png" href="images/psy-fi.png" />
	<link rel="stylesheet" href="css/styleAccueil.css">
	<link rel="stylesheet" href="css/styles_fonts.css">
</head>


<body>
<div class="menuBar1">
	<div>
			<?php include("menuBarEN.php") ?>
			</div>
</div>
	<section class="banner">

		<div>
			<h1 class="headerText"> PSY-Count</h1>
		</div>
		<div class="headerDescription">
			<p class="headerPresentation"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed<br>
				do eiusmod tempor incididunt ut labore et dolore magna<br>
				aliqua.
			</p>
		</div>
		<div>
			<button class="button">Discover</button>
		</div>
	</section>

	<section class="container1">
		<h2>Our goals</h2>
		<hr size=3 class="separator">
		<div class="block1">
			<div class="column1">
				<div><img src="images/Placement_Area_ASSETsmallSIZED.png" alt="" /></div>
				<div class="abstractText">
					<h2>Checkup </h2>
				</div>
				<div>
					<p> Lorem ipsum dolor sit amet, consectetur<br>
					adipiscing elit, sed do eiusmod tempor incididunt <br>
					ut labore et dolore magna aliqua.
					</p>
				</div >
				<div  class="En-savoir-plus"><button class="button">Read more</button></div>
			</div>
			<div class="column1">
				<div><img src="images/Placement_Area_ASSETsmallSIZED_di.png" alt="" /></div>
				<div class="abstractText">
					<h2>help to hospitals</h2>
				</div>
				<div>
					<p>  Lorem ipsum dolor sit amet, consectetur<br>
					adipiscing elit, sed do eiusmod tempor incididunt <br>
					ut labore et dolore magna aliqua.
					</p>
				</div >
				<div class="En-savoir-plus"><button class="button">Read more</button></div>
			</div>
			<div class="column1">
				<div><img src="images/Placement_Area_ASSETsmallSIZED_dy.png" alt="" /></div>
				<div class="abstractText">
					<h2>Senior monitoring</h2>
				</div>
				<div>
					<p>  Lorem ipsum dolor sit amet, consectetur<br>
					adipiscing elit, sed do eiusmod tempor incididunt <br>
					ut labore et dolore magna aliqua.
					</p>
				</div>
				<div  class="En-savoir-plus"><button class="button">Read more</button></div>
			</div>
		</div>
	</section>


	<section class="container2">
		<video class="video1" controls poster="images/Placement_Area_ASSETpanelSTATE@2x.png" src="video/SEP_V0_P1.mp4" type="video/mp4"></video>
	</section>

	<section class="container3">
		<div class="descriptifText white-text">
			<h2>Psy-Fi's History</h2>
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
		<div class="presentation1">
			<div class="who">
				<h2>The Psy-Fi's Team</h2>
			</div>
			<hr size=3 class="separator">
			<div class="discordImages">
				<div class="discordGroup">
					<div class="discord-description"><img src="images/nicolas.jpg"><p>Nicolas</p></div>
					<div class="discord-description"><img src="images/victoria.jpg"><p>Victoria</p></div>
					<div class="discord-description"><img src="images/justin.jpg"><p>Justin</p></div>
				</div>
				<div class="discordGroup">
					<div class="discord-description"><img src="images/amanda.jpg"><p>Amanda</p></div>
					<div class="discord-description"><img src="images/arsene.jpg"><p>Arsène</p></div>
					<div class="discord-description"><img src="images/thibault.jpg"><p>Thibault</p></div>
				</div>
			</div>
		</div>
		<div class="psy-icon">
			<img class="imagePsyFi" src="images/psy-fi.png" />
		</div>
	</section>

	<section class="container4 white-text" id="menuBarAnchor">
		<?php include("footerEN.php") ?>
	</section>
</body>

</html>