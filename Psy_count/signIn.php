<?php
session_start(); // On démarre la session AVANT toute chose
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>S'identifier</title>
    <link rel="icon" type="image/png" href="images/psy-fi.png" />
    <link rel="stylesheet" href="css/style_fonts.css">
    <link rel="stylesheet" href="css/style_Sign_In.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
    <script type="text/javascript" src="javaScript/javaScriptCode.js"></script>
</head>

<body>

    <div id="signIn">
        <div id="accountText">

            <div id="titleText">
                <div id="signInText"> 
                <a href="signIn.php" class="latoType title" > S'identifier </a>
                </div>
                <div id="signUpMedecin">
                <a href="signUpMedecin.php" class="latoType title" >S'inscrire comme
                        Médecin</a>
                </div>
                <div id="signUpText">
                <a href="signUp.php" class="latoType title" > S'inscrire </a>
                </div>
            </div>
        </div>


        <div id="signUpinformation" class="alignCenter">
            <div id="informationblock">
                <form action="connexion.php" method="post">
                    <div id="informationInput">
                        <h2 class="connexionText">Email </h2>
                        <input  name="Email" type="email">
                        <h2 class="connexionText">Mot de passe </h2>
                        <input name="Password" type="password">
                    </div>
                  
                        <div id="buttonSignIn">
                            
                                <input class="button" type="submit" name="submit" id="signInbutton" value="Connexion">
                            
                                <input class="button" type="button" onclick="locationAccueil()" name="submit"
                                    id="quitterbutton" value="Quitter">
                            
                        </div>
                   
                    <li>
                        <span class="White-color">
                            <?php if(!empty($_SESSION['message2'])){echo $_SESSION['message2'];}?>
                        </span>
                    </li>

                </form>
            </div>

        </div>

    </div>


</body>

</html>