<?php
session_start(); // On démarre la session AVANT toute chose
?>
<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<title>Log in</title>
	<link rel="icon" type="image/png" href="images/psy-fi.png" />
	<link rel="stylesheet" href="css/style_fonts.css">
	<link rel="stylesheet" href="css/style_Sign_Up.css">
	<script type="text/javascript" src="javaScript/javaScriptCode.js"></script>
</head>

<body>
	<div id="signUp">
		<div id="accountText">
			<div id="titleText">
				<a href="signInEN.php"> <span class="latoType title" id="signInText">Log in </span><br></a>
				<a href="signUpMedecinEN.php"> <span class="latoType title" id="signUpMedecin">Sign in as a doctor</span><br></a>
				<a href="signUpEN.php"> <span class="latoType title" id="signUpText"> Sign in</span></a>
			</div>
		</div>
		<div id="signUpinformation" class="alignCenter">
			<form action="getInformationEN.php" method="post">
				<div id="informationInput">
				<div class="inputText">
					<h2 class="connexionText"> Firstname</h2>
					<input size=45% required pattern="[A-Za-zÀ-ÖØ-öø-ÿ-]+{4,255}" title="your firstname must contain only letters" name="FirstName" required minlength="4">
					<h2 class="connexionText"> Lastname</h2>
					<input size=45% required pattern="[A-Za-zÀ-ÖØ-öø-ÿ-]+{4,255}" title="your lastname must contain only letters" name="LastName" required minlength="4">
					<h2 class="connexionText"> Date of birth </h2>
					<input size=45% name="dateDeNaissance" type="date">
					<h2 class="connexionText"> Email</h2>
					<input size=45% name="Email" type="email">

					<h2 class="connexionText"> Password</h2>
					<div class="mot-de-passe">
					<input size=45% name="Password" class="showHide" type="password" required minlength="8">
					<img src="images/eye.png" class="passwordImage" onclick="hidePassword()">
					<img src="images/eyeHide.png" class="passwordImage2" onclick="hidePassword()">
					</div>
					<h2 class="connexionText"> Password checking</h2>
					<div class="mot-de-passe">
					<input size=45% name="password_verify" class="showHide2" type="password">
					<img src="images/eye.png" class="passwordImage" onclick="hidePassword2()">
					<img src="images/eyeHide.png" class="passwordImage2" onclick="hidePassword2()">
					</div>
					
				

					<div id="checkboxText">
						<input type="checkbox" id="checkbox" name="horns" OnClick="checkboxcheck()">
						<label for="horns"><span>I accept the</span> <a href="TermsOfUseEN.php"><span style="color:#aa3558"> general conditions of use</span></label></a>
					</div>
					<input name="type" type="hidden" value="patient">
					</div>
					<div id="signUpBlock">
						<input class="button" type="submit" style="background-color: grey;" name="submit" value="Sign in" id="submit">
						<input class="button" type="button" onclick="locationAccueil()" value="Exit">
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