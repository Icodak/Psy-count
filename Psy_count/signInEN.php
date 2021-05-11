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
    <script type="text/javascript" src="javaScript/javaScriptCode.js"></script>
</head>

<body>

    <div id="signIn">
        <div id="accountText">

            <div id="titleText">
                <div id="signInText"> 
                <a href="signInEN.php" class="latoType title" > Log in </a>
                </div>
                <div id="signUpMedecin">
                <a href="signUpMedecinEN.php" class="latoType title" >Sign in as a doctor</a>
                </div>
                <div id="signUpText">
                <a href="signUpEN.php" class="latoType title" > Sign in </a>
                </div>
            </div>
        </div>


        <div id="signUpinformation" class="alignCenter">
            <div id="informationblock">
                <form action="connexionEN.php" method="post">
                    <div id="informationInput">
                        <h2 class="connexionText">Email </h2>
                        <input  name="Email" type="email">
                        <h2 class="connexionText">Password </h2>
                        <div class="mot-de-passe">
					<input size=45% name="Password" class="showHide" type="password" required minlength="8">
					<img src="images/eye.png" class="passwordImage" onclick="hidePassword()">
					<img src="images/eyeHide.png" class="passwordImage2" onclick="hidePassword()">
					</div>
                    </div>
                  
                        <div id="buttonSignIn">
                            
                                <input class="button" type="submit" name="submit" id="signInbutton" value="Log in">
                            
                                <input class="button" type="button" onclick="locationAccueil()" name="submit"
                                    id="quitterbutton" value="Exit">
                            
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