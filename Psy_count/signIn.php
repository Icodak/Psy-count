<?php
session_start(); // On démarre la session AVANT toute chose
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>signIn</title>
    <link rel="icon" type="image/png" href="images/psy-fi.png" />
    <link rel="stylesheet" href="css/style_Sign_In.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
</head>

<body>

    <div id="signIn">
        <div id="accountText">
            <div id="titleText">
				<a href="signIn.php"> <span class="latoType title" id="signInText"> Sign In </span><br></a>
                <a href="signUp.php"> <span class="latoType title" id="signInText"> Sign Up </span></a>
            </div>
        </div>


        <div id="signUpinformation" class="alignCenter">
            <div id="informationblock">
                <form action="connexion.php" method="post">
                    <div id="informationInput">
                        <h2 class="connexionText">Nom d'utilisateur ou Email </h2>
                        <input size=45% name="Email" type="email" >
                        <h2 class="connexionText">Mot de passe </h2>
                        <input size=45% name="Password"  type="password">

                    </div>
                    <li><input class="button4" type="submit" name="submit" value="Sign In"></li>
					<li><a class="button4" id="quitter" href="accueil.php"> Quitter </a></li>
                    <li>
                        <span style="color:white">
                            <?php if(!empty($_SESSION['message2'])){echo $_SESSION['message2'];}?></span>
                    </li>

                </form>
            </div>

        </div>

    </div>


</body>

</html>