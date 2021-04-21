<?php
$msg_envoi = false;

try {
    if (isset($_POST['submit']) && isset($_POST["mail_Cct"]) && $_POST["mail_Cct"] != '') { //Check if we have an email
        if (filter_var($_POST["mail_Cct"], FILTER_VALIDATE_EMAIL)) { //check si c'est une adresse email
            $visitorFirstName = $_POST["prenom_Cct"];
            $visitorLastName = $_POST["nom_Cct"];
            $visitorEmail = $_POST["mail_Cct"];
            $visitorMsgSubject = $_POST["msgSubject_Cct"];
            $visitorMsg = $_POST["msg_Cct"];

            $to = "amanda.dieuaide@gmail.com"; //Get mail from Admin
            $body = "";

            $body .= "De : " . $visitorFirstName . "\r\n";
            $body .= "Email : " . $visitorEmail . "\r\n";
            $body .= "Message : " . $visitorMsg . "\r\n";

            ini_set('sendmail_from', $visitorEmail);
            ini_set('display_errors', 1);
            error_reporting(E_ALL);
            //mail($to, $visitorMsgSubject, $body);
            $msg_envoi = true;
        }
    }
} catch (Exception $e) {
    echo "Erreur :", $e->getMessage(), "\n";
}
?>



<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="icon" type="image/png" href="images/psy-fi.png" />
    <link rel="stylesheet" href="css//style_Contact.css">
</head>

<header>
    <div>
        <?php include("menuBar.php") ?>
        <h2 id="headerText"> Une question ? Contactez-nous !</h2>
    </div>
</header>

<body>
    
<!--Faire un truc plus clean avec du JS
    <//?php
        if (isset($_POST['submit']) && $msg_filled != true) { 
        if (empty($visitorEmail) || empty($visitorFirstName) || empty($visitorLastName) || empty($visitorMsgSubject) || empty($visitorMsg)) {
        ?>
            <div id="form">
                <h3 id="headerText"> Vous n'avez pas complété tous les champs ! </h3>
            </div>
    <//?php 
    }
    } 

    ?>
-->
    <?php
    if ($msg_envoi) :
    ?>
        <div id="form">
            <h3 id="headerText"> Message bien reçu ! Nous vous recontacterons prochainement.</h2>
        </div>
    <?php
    else :
    ?>


        <div id="form" class="form_content">
            <form action="contact.php" method="POST" autocomplete="off">
                <div><label id="form" class="form_label" for="text"> Prénom </label>
                    <input id="form" class="form_content" type="text" name="prenom_Cct" placeholder="ex : John"> </label>
                </div>

                <div><label id="form" class="form_label" for="text"> Nom </label>
                    <input id="form" class="form_content" type="text" name="nom_Cct" placeholder="ex : Doe"> </label>
                </div>

                <div> <label id="form" class="form_label" for="text"> E-mail </label>
                    <input id="form" class="form_content" type="text" name="mail_Cct" placeholder="ex : john.doe@gmail.com"> </label>
                </div>

                <div> <label id="form" class="form_label" for="text"> Sujet du message </label>
                    <!--Faire un menu déroulant ?-->
                    <input id="form" class="form_content" type="text" name="msgSubject_Cct" placeholder="ex : Contact avec l'administrateur PSY-fi..."> </label>
                </div>

                <div>
                    <label id="form" class="form_label" for="text"> Message </label>
                    <textarea id="form" class="form_content" name="msg_Cct" placeholder="Veuillez écrire votre message..."></textarea>
                </div>

                <div>
                    <button id="form" type="submit" name="submit"> Envoyer </button>
                </div>
            </form>
        </div>

    <?php
    endif;
    ?>

    <!-- v Should be in a footer :/ mais la mise en page marche pas?-->
    <div id="container4">

        <div id="groupInformation">
            <span style="color:white">
                <li>
                    <h2>PSY-FI</h2>
                </li>
                <li>28 Rue Notre Dame des Champs, 75006 Paris<br></li>
                <li>01 23 45 67 89</li>

            </span>
        </div>


        <div id="groupeSettings">
            <span style="color:white">
                <li>
                    <h2> Accessibilité </h2>
                </li>
                <li> Thème</li>
                <li> Langue</li>
            </span>

        </div>

        <div id="groupeRessources">
            <span style="color:white">
                <li>
                    <h2> Ressources </h2>
                </li>
                <li> Actualités </li>
                <li> FAQ </li>
                <li> Videos </li>
            </span>

        </div>

        </span>

    </div>


    <?php include("footer.php") ?>
</body>

<footer>

</footer>

</html>