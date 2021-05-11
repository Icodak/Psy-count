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

            $body .= "From : " . $visitorFirstName . "\r\n";
            $body .= "Email : " . $visitorEmail . "\r\n";
            $body .= "Message : " . $visitorMsg . "\r\n";

            ini_set('sendmail_from', $visitorEmail);
            ini_set('display_errors', 1);
            error_reporting(E_ALL);
            mail($to, $visitorMsgSubject, $body);
            $msg_envoi = true;
        }
    }
} catch (Exception $e) {
    echo "Error :", $e->getMessage(), "\n";
}
?>



<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="icon" type="image/png" href="images/psy-fi.png" />
    <link rel="stylesheet" href="css/styles_fonts.css">
    <link rel="stylesheet" href="css/style_Refonte.css">

</head>

<header>
    <div>
        <?php include("menuBarEN.php") ?>
        <h2 class="headerText"> A question? Contact us!</h2>
    </div>
</header>

<body>
    <div class="background"></div>
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
        <div>
            <h3 class="headerText"> Message recieved. You will be contacted soon.</h2>
        </div>
    <?php
    else :
    ?>


        <div class="flex_column">
            <div class="form">

                <form action="contactEN.php" method="POST" autocomplete="off">

                    <div class="form_field">
                        <div class="form_group">
                            <label class="form_label" for="text"> Firstname </label>
                            <input class="form_content"  required  minlength="1" type="text" name="prenom_Cct" placeholder="ex : John"> </label>
                        </div>
                        <div class="form_group">
                            <label class="form_label" for="text"> Lastame </label>
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
                            <label class="form_label" for="text"> Message subject </label>
                            <!--Faire un menu déroulant ?-->
                            <input class="form_content" required  minlength="1" type="text" name="msgSubject_Cct" placeholder="ex : Contact with the PSY-fi's admin..."> </label>
                        </div>
                    </div>
                    <div class="form_field">
                        <div class="form_group">
                            <label class="form_label" for="text"> Message </label>
                            <textarea class="form_content" required  minlength="1" name="msg_Cct" placeholder="Enter your message..."></textarea>
                        </div>
                    </div>
                    <div class="form_field">
                        <div class="form_group">
                            <button class="form_button" type="submit" name="submit"> Send </button>
                            <button class="form_button" onClick="javascript:window.location.href='accueilEN.php'" type="reset"> Cancel </button>
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
<?php include("footerEN.php") ?>
</html>