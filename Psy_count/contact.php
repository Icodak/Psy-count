<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="icon" type="image/png" href="images/psy-fi.png" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_Refonte.css">
</head>

<header>
    <div>
        <?php include("menuBar.php") ?>
        <h2 class="headerText"> Une question ? Contactez-nous !</h2>
    </div>
</header>


<?php
include "contactFonction2.php";
?>

<body>
<?php
    if ($msg_envoi) :
    ?>
        <div>
            <h3 class="headerText"> Message bien envoyé. Nous vous recontacterons prochainement.</br>
                Vous allez être redirigé vers la page de contact dans 5 secondes.
            </h3>
        </div>
    <?php
        header("Refresh: 5;URL=contact.php");
    else :
    ?>

        <div class="flex_column">
            <div class="form">

                <form action="contact.php" method="POST" autocomplete="off">

                    <div class="form_field">
                        <div class="form_group">
                            <label class="form_label" for="text"> Prénom </label>
                            <input class="form_content"  required  minlength="1" type="text" name="prenom_Cct" placeholder="ex : John"> </label>
                        </div>
                        <div class="form_group">
                            <label class="form_label" for="text"> Nom </label>
                            <input class="form_content" required  minlength="1" type="text" name="nom_Cct" placeholder="ex : Doe"> </label>
                        </div>
                    </div>

                    <div class="form_field">
                        <div class="form_group">
                            <label class="form_label" for="text"> E-mail </label>
                            <input class="form_content" required  minlength="1" type="text" name="mail_Cct" placeholder="ex : john.doe@gmail.com"> </label>
                        </div>
                    </div>
                    <div class="form_field">
                        <div class="form_group">
                            <label class="form_label" for="text"> Sujet du message </label>
                            <input class="form_content" required  minlength="1" type="text" name="msgSubject_Cct" placeholder="ex : Contact avec l'administrateur PSY-fi..."> </label>
                        </div>
                    </div>
                    <div class="form_field">
                        <div class="form_group">
                            <label class="form_label" for="text"> Message </label>
                            <textarea class="form_content" required  minlength="1" name="msg_Cct" placeholder="Veuillez écrire votre message..."></textarea>
                        </div>
                    </div>
                    <div class="form_field">
                        <div class="form_group">
                        <div class="form-button">
                            <button class="button" type="submit" name="submit"> Envoyer </button>
                            <button class="button" type="reset"> Annuler </button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <div class="image-scale">
            <img src="images/psy-fi.png">
            </div>
        </div>

    <?php
    endif;
    ?>
</body>
<?php include("footer.php") ?>
</html>