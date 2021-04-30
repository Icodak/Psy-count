<?php
session_start(); // On démarre la session AVANT toute chose
?>
<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<title>S'inscrire</title>
	<link rel="icon" type="image/png" href="images/psy-fi.png" />
	<link rel="stylesheet" href="css/style_fonts.css">
	<link rel="stylesheet" href="css/style_Sign_Up.css">
	<script type="text/javascript" src="javaScript//javaScriptCode.js"></script>
</head>

<body>
	<div id="signUp">
		<div id="accountText">
			<div id="titleText">
				<a href="signIn.php"> <span class="latoType title" id="signInText">S'identifier </span><br></a>
				<a href="signUpMedecin.php"> <span class="latoType title" id="signUpMedecin">S'inscrire comme Médecin</span><br></a>
				<a href="signUp.php"> <span class="latoType title" id="signUpText"> S'inscrire</span></a>
			</div>
		</div>
		<div id="signUpinformation" class="alignCenter">
			<form action="getInformation.php" method="post">
				<div id="informationInput">
					<h2 class="connexionText"> Prénom</h2>
					<input size=45% required pattern="[A-Za-zÀ-ÖØ-öø-ÿ-]+{4,255}" title="votre prenom ne doit contenir que des lettres" name="FirstName" required minlength="4">
					<h2 class="connexionText"> Nom</h2>
					<input size=45% required pattern="[A-Za-zÀ-ÖØ-öø-ÿ-]+{4,255}" title="votre nom ne doit contenir que des lettres" name="LastName" required minlength="4">
					<h2 class="connexionText"> Date de naissance </h2>
					<input size=45% name="dateDeNaissance" type="date">
					<h2 class="connexionText"> Email</h2>
					<input size=45% name="Email" type="email">
					<h2 class="connexionText"> Mot de passe</h2>
					<input size=45% name="Password" type="password" required minlength="8">
					<h2 class="connexionText"> Vérification du mot de passe</h2>
					<input size=45% name="password_verify" type="password">
					<div id="checkboxText">
						<input type="checkbox" id="checkbox" name="horns" OnClick="checkboxcheck()">
						<label for="horns"><span>J'accepte les</span> <a href="TermsOfUse.php"><span style="color:#aa3558"> conditions générales d'utilisations</span></label></a>
					</div>
					<input name="type" type="hidden" value="patient">
					<div id="signUpBlock">
						<input class="button" type="submit" style="background-color: grey;" name="submit" value="S'inscrire" id="submit">
						<input class="button" type="button" onclick="locationAccueil()" value="Quitter">
					</div>
					<li>
						<?php if (!empty($_SESSION['message'])) {
							echo $_SESSION['message'];
						} ?>
					</li>
			</form>
		</div>
	</div>
</body>

</html>