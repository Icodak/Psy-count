<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="icon" type="image/png" href="images/psy-fi.png" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_Refonte.css">
</head>

<header>
    <div>
        <?php include("menuBar.php") ?>
        <h2 class="headerText"> Consultation et Aide </h2>
    </div>
</header>

<?php
include "contact_Fonction.php";
?>

<body>

    <div class="background"></div>
    <?php
    if ($msg_envoi) :
    ?>
        <div>
            <h3 class="headerText"> Message bien envoyé.</br>
                Vous allez être redirigé vers la page de contact dans 5 secondes.
            </h3>
        </div>
    <?php
        header("Refresh: 5;URL=contactMedecin.php");
    else :
    ?>

        <div class="flex_column">
            <div class="form">
                <form action="contactMedecin.php" method="POST" autocomplete="off">

                    <div class="form_group"> <label class="form_label" for="text"> Je souhaite contacter : </label>
                        <select class="form_content" name="msg_destinataire">
                            <optgroup>
                                <?php foreach ($allUsersMail as $values) {
                                    echo "<option>" . $values['Email'] . "</option>";
                                } ?>
                            </optgroup>
                        </select>
                    </div>

                    <div class="form_group"> <label class="form_label" for="text"> Sujet du message </label>
                        <input class="form_content" required minlength="1" type="text" name="msgSubject_Cct" placeholder="ex : Contact avec l'administrateur PSY-fi..."> </label>
                    </div>

                    <div class="form_group">
                        <label class="form_label" for="text"> Message </label>
                        <textarea class="form_content" required minlength="1" name="msg_Cct" placeholder="Veuillez écrire votre message..."></textarea>
                    </div>

                    <div class="form_group">
                        <button class="form_button" type="submit" name="submit"> Envoyer </button>
                        <button class="form_button" type="reset" onclick="return confirm('Voulez-vous vraiment annuler votre message ?')"> Annuler </button>
                    </div>
                </form>

            </div>
            <img src="images/psy-fi.png">
        </div>

    <?php
    endif;
    ?>

    <?php include("footer.php") ?>
</body>

</html>