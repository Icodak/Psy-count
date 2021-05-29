<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>S'identifier</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style_Sign.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_Radio.css">
    <link rel="stylesheet" href="css/style_alert_box.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="javaScript/javaScriptCode.js" async defer></script>
    <script type="text/javascript" src="javaScript/javaScriptCodeVerification.js" async defer></script>
    <script type="text/javascript" src="javascript/javaScriptEmailCode.js"></script>
</head>

<body class="gray-background">

    <form class="card white-background shadow" action="getInformation.php" id="form1" method="post">
        <div class="select-menu">
            <ul>
                <li><a href="sign-in.php" class="underline-link">S'identifier</a></li>
                <li><a href="sign-up-medecin.php" class="underline-link">S'inscrire comme médecin</a></li>
                <li><a href="sign-up.php" class="underline-link underline">S'inscrire</a></li>
            </ul>
        </div>
        <div class="input-field">
            <div>
                <p>Prénom*</p>
                <div class="input-bar"><input type="text" required name="FirstName" /></div>
            </div>
            <div>
                <p>Nom*</p>
                <div class="input-bar"><input type="text" required name="LastName" /></div>
            </div>
            <div class="custom-chexbox">
                <p>Sexe*</p>
               <div class="radio-choice">
                    <input type="radio" name="genre" class="manWoman Man" id="radio1-up" checked>
                    <label for="radio1-up">Homme</label>
                    <input type="radio" name="genre" class="manWoman Woman" id="radio2-up">
                    <label for="radio2-up">Femme</label>
                </div>
            </div>

            <div>
                <p>Date de naissance* (vous devez avoir 15 ans pour utiliser notre service)</p>
                <div class="input-bar"><input name="dateDeNaissance" required type="date" /></div>
            </div>
            <div>
                <p>Email*</p>
                <div class="input-bar"><input name="Email" required type="email" /></div>
            </div>
            <div>
                <p>Mot de passe* ( au moins 8 caractéres dont 1 minuscule, 1 majuscule et 1 caractére spécial) </p>
                <div class="input-bar passwordType"><input name="Password" required class="showHide" type="password" />
                    <img src="images/eye.png" class="passwordImage" onclick="hidePassword()">
                    <img src="images/eyeHide.png" style="display:none;" class="passwordImage2" onclick="hidePassword()">
                </div>
            </div>
            <div>
                <p>Vérification du mot de passe</p>
                <div class="input-bar passwordType"><input name="password_verify" required class="showHide2"
                        type="password" />
                    <img src="images/eye.png" class="passwordImage" onclick="hidePassword2()">
                    <img src="images/eyeHide.png" style="display:none;" class="passwordImage2"
                        onclick="hidePassword2()">
                </div>
                <input name="type" type="hidden" value="patient">
            </div>

            <label for="horns">
                <input type="checkbox" id="checkbox" class="checkbox" required name="horns" OnClick="checkboxcheck()" />
                <p>J'accepte les <a href="TermsOfUse.php">conditions générales d'utilisations</a></p>
            </label>


        </div>
        <div class="confirm-field" id="signUpBlock">
            <input class="button"  style="background-color: grey;" name="submit" value="S'inscrire"
             disabled  id="submit-patient">

            <input class="button" type="button" onclick="locationAccueil()" value="Quitter">
        </div>
        <div class="white-color">
            <?php if (!empty($_SESSION['message'])) {
                echo $_SESSION['message'];
            } ?>
        </div>
    </form>

</body>
<script>
document.getElementById("submit").disabled = true;
</script>

</html>