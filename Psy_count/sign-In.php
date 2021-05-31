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
    <script type="text/javascript" src="javaScript/javaScriptCode.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="la page de connexion">
</head>

<body class="gray-background">
    <form action="connexion.php" method="post" class="card white-background shadow">

        <div class="select-menu">
            <ul>
                <li><a href="sign-in.php" class="underline-link underline">S'identifier</a></li>
                <li><a href="sign-up-medecin.php" class="underline-link ">S'inscrire comme médecin</a></li>
                <li><a href="sign-up.php" class="underline-link ">S'inscrire</a></li>
            </ul>
        </div>
        <div class="input-field">
            <div>
                <p>Email</p>
                <div class="input-bar"><input name="Email" type="email" /></div>
            </div>
            <div>
                <p>Mot de passe</p>
                <div class="input-bar"><input name="Password" class="showHide" type="password" required minlength="8" />
                    <img src="images/eye.png" class="passwordImage" onclick="hidePassword()">
                    <img src="images/eyeHide.png" style="display:none;" class="passwordImage2" onclick="hidePassword()">
                </div>
            </div>
        </div>
        <div class="confirm-field">
            <div><input class="button" type="submit" name="submit" id="signInbutton" value="Connexion"></div>
            <div><input class="button" type="button" onclick="locationAccueil()" name="submit" id="quitterbutton" value="Quitter"></div>
        </div>
        <div class="white-color">
            <?php if (!empty($_SESSION['message2'])) {
                echo $_SESSION['message2'];
            } ?>
        </div>
    </form>

</body>

</html>