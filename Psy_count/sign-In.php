<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>S'identifier</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style_Sign_In.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="gray-background">
    <div class="card white-background shadow">
        <div class="select-menu">
            <ul>
                <li><a href="" class="underline-link">S'identifier</a></li>
                <li><a href="" class="underline-link">S'inscrire comme médecin</a></li>
                <li><a href="" class="underline-link">S'inscrire</a></li>
            </ul>
        </div>
        <div class="input-field">
            <div class="input-email">
                <p>Email</p>
                <div class="input-bar"><input type="email" /></div>
            </div>
            <div class="input-email">
                <p>Mot de passe</p>
                <div class="input-bar"><input type="password" /></div>
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
    </div>

</body>

</html>