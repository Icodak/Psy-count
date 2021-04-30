<?php
session_start(); // On démarre la session AVANT toute chose
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>S'inscrire comme Médecin</title>
    <link rel="icon" type="image/png" href="images/psy-fi.png" />
    <link rel="stylesheet" href="css/styles_fonts.css">
    <link rel="stylesheet" href="css/style_Sign_UpMedecin_.css">
    <script type="text/javascript" src="javaScript/javaScriptCode.js"></script>
</head>

<body>
    <div id="signUp">
        <div id="accountText">
            <div id="titleText">
                <a href="signIn.php"> <span class="latoType title" id="signInText">S'identifier </span><br></a>
                <a href="signUpMedecin.php"> <span class="latoType title" id="signUpMedecinText">S'inscrire comme
                        médecin </span><br></a>
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
                    <h2 class="connexionText">Code postal de cabinet</h2>
                    <input size=45% name="codePostal">
                    <h2 class="connexionText">Numéro de téléphone</h2>
                    <input size=45% name="telephone">
                    <h2 class="connexionText">Spécialité</h2>
                    <div class="drop-down">
                    <select name="specialite" id="pet-select" placeholder="spécialité">
                        <option value="Anesthésiologie">Anesthésiologie</option>
                        <option value="Cardiologie">Cardiologie</option>
                        <option value="Andrologie">Andrologie</option>
                    </select></div>
                    <h2 class="connexionText"> Mot de passe</h2>
                    <input size=45% name="Password" type="password" required minlength="8">
                    <h2 class="connexionText"> Vérification du mot de passe</h2>
                    <input size=45% name="password_verify" type="password">

                    <div id="checkBoxContainer">
                        <div id="checkboxText">
                            <input type="checkbox" id="checkbox" name="horns" OnClick="checkboxcheck()">
                        
                        <label for="horns"><span>J'accepte les</span> <a href="TermsOfUse.php"><span style="color:#aa3558"> conditions générales d'utilisations</span></label></a>
                    </div></div>

                    <input name="type" type="hidden" value="Medecin">
                    <div id="signMedecinButton">
                        <input class="button" type="submit" name="submit" value="S'inscrire" disabled id="submit">
                        <input class="button" type="button" name="submit" value="Quitter" onclick="locationAccueil()">
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