<?php
session_start(); // On démarre la session AVANT toute chose
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>signUp</title>
  <link rel="icon" type="image/png" href="images/psy-fi.png" />
  <link rel="stylesheet" href="css/style_Sign_Up.css">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
  <script type="text/javascript" src="javaScript//javaScriptCode_.js"></script>
</head>








<body>
		<div id="signUp">
			<div id="accountText" >
				<div id="titleText">
				<a href="signIn.php"> <span class="latoType title" id="signInText">s'identifier </span><br></a>
                <a href="signUp.php"> <span class="latoType title" id="signUpText"> S'inscrire</span></a>
				</div>
			</div>


			<div id="signUpinformation" class="alignCenter" >
				
			
					<form action="getInformation.php" method="post">

						<div id="informationInput">
						<h2 class="connexionText"> Prenom</h2>
						<input size=45% required pattern="[A-Za-zÀ-ÖØ-öø-ÿ-]+{4,255}" title="votre prenom ne doit contenir que des lettres" name="FirstName"   required minlength="4" >
						<h2 class="connexionText"> Nom</h2>
						<input  size=45% required pattern="[A-Za-zÀ-ÖØ-öø-ÿ-]+{4,255}" title="votre nom ne doit contenir que des lettres" name="LastName" required minlength="4" >
						<h2 class="connexionText"> date de naissance </h2>
						<input  size=45% name="dateDeNaissance" type="date" >
						<h2 class="connexionText"> Email</h2>
						<input  size=45% name="Email"    type="email"   >
						<h2 class="connexionText"> mot de passe</h2>
						<input  size=45% name="Password"   type="password"    required minlength="8" >
						<h2 class="connexionText"> vérification du mot de passe</h2>
						<input  size=45% name="password_verify" type="password"  >

						<div id="checkboxText">
						<input type="checkbox" id="checkbox" name="horns" OnClick="checkboxcheck()">

						<label for="horns"><span style="color:white">j'accepte les</span> 	<a href="TermsOfUse.php"><span style="color:#1968FF"> conditions generales d'utilisations</span></label></a>
						</div>

						<input  name="type" type="hidden" value="patient" >

						<input  class="button4" type="submit" name="submit" value="S'inscrire" disabled  id="submit">
						<a class="button5" id="quitter2" href="accueil.php"> Quitter </a>

						<li> 
							<?php if(!empty($_SESSION['message'])){echo $_SESSION['message'];}?>
						</li>

					</form>
				
					
			



			</div>
	</div>
  
</body>
</html>