<?php
session_start(); // On démarre la session AVANT toute chose
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>signIn</title>
  <link rel="icon" type="image/png" href="images/psy-fi.png" />
  <link rel="stylesheet" href="css/style_Sign_In_.css">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
</head>
<body>
	<div id="imageBackground">
		<div id="signUp">
			<div id="accountText" >
				<div id="titleText">
				<span class="latoType title" id="signInText" > Sign In </span><br>
				<a href="accueil.php"> <button id="closeButton">  X  </button> </a>
				</div>
				<div>
				<span class="latoType">New user ? </span> <a href="signUp.php"><span style="color:#1968FF" class="latoType">Create an acount </span></a>
				</div>
			</div>


			<div id="signUpinformation" class="alignCenter" >
				<div id="informationblock">
					<form action="connexion.php" method="post">
						<li ><input  size=45% name="Email"    type="email"    placeholder="Email Address " ></li>
						<li ><input  size=45% name="Password" placeholder="Password"   type="password"    ></li>
						<li ><input  class="button4" type="submit" name="submit" value="Sign In" ></li>
						<li> 
							<?php if(!empty($_SESSION['message2'])){echo $_SESSION['message2'];}?>
						</li>

					</form>
				</div>
				<div>
					<img class="responsive" src="images/sign_in_image2.png">
				</div>

			</div>

		</div>
	</div>
  
</body>
</html>