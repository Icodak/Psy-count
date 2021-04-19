<?php
session_start(); // On démarre la session AVANT toute chose
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>signUp</title>
  <link rel="icon" type="image/png" href="images/psy-fi.png" />
  <link rel="stylesheet" href="css/style_Sign_Up_.css">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
  <script type="text/javascript" src="javaScript//javaScriptCode_.js"></script>
</head>








<body>
	<div id="imageBackground">
		<div id="signUp">
			<div id="accountText" >
				<div id="titleText">
				<span class="latoType title">Create A account</span><br>
				<a href="accueil.php"> <button id="closeButton2">  X  </button> </a>
				</div>
				<div>
				<span class="latoType">Already a user ? </span> <a href="signIn.php"><span style="color:#1968FF" class="latoType">Sign In </span></a>
				</div>
			</div>


			<div id="signUpinformation" class="alignCenter" >
				<div id="informationblock">
					<form action="getInformation.php" method="post">


						<li ><input  size=45% name="dateDeNaissance" type="date" ></li>
						<li ><input size=45% required pattern="[A-Za-zÀ-ÖØ-öø-ÿ-]+{4,255}" title="votre prenom ne doit contenir que des lettres" name="FirstName"  placeholder="First Name" required minlength="4" >
							 <input  size=45% required pattern="[A-Za-zÀ-ÖØ-öø-ÿ-]+{4,255}" title="votre nom ne doit contenir que des lettres" name="LastName" placeholder="Last Name" required minlength="4" >
				   		</li>
						<li ><input  size=45% name="Email"    type="email"    placeholder="Email Address " ></li>
						<li ><input  size=45% name="Password" placeholder="Password"   type="password"    required minlength="8" ></li>
						<li ><input  size=45% name="password_verify" type="password" placeholder="Password verification" ></li>

						<input type="checkbox" id="checkbox" name="horns" OnClick="checkboxcheck()">

						<label for="horns"><span style="color:black">j'accepte les</span> 	<a href="TermsOfUse.php"><span style="color:#1968FF"> conditions generales d'utilisations</span></label></a>
  						

						<li ><input  name="type" type="hidden" value="patient" ></li>

						<li ><input  class="button4" type="submit" name="submit" value="Sign Up" disabled  id="submit"></li>




						<li> 
							<?php if(!empty($_SESSION['message'])){echo $_SESSION['message'];}?>
							<!--value vient de getInformation.php-->
						</li>
					</form>
				</div>
				<div>
					<img class="responsive" src="images/sign_up_image.png">
				</div>



			</div>

		</div>
	</div>
  
</body>
</html>