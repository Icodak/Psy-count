<?php
//Fonction Récupération du Mail du Destinataire
try {
    $dbMsg = new PDO("mysql:host=localhost;dbname=serveur_psy_fi", 'root', '');
    $dbMsg->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    include("contact_SQL.php");
} catch (Exception $e) {
    echo "Erreur :", $e->getMessage(), "\n";
}

//Fonction Envoi de Mail/Contact
$msg_envoi = false;
try {
    if (isset($_POST['submit'])) {
        $visitorMsgSubject = htmlspecialchars($_POST["msgSubject_Cct"]);
        $visitorMsg = htmlspecialchars($_POST["msg_Cct"]);

        if (isset($_POST['msg_destinataire']) && !empty($_POST['msg_destinataire'])) {
            $to = htmlspecialchars($_POST['msg_destinataire']);

            if ($_POST['msg_destinataire'] == "medTraitant") {
                $to = $_SESSION["ID_DocMail"];
            }
            if ($_POST['msg_destinataire'] == "adminContact") {
                $to = "amanda.dieuaide@qq.com"; //Mail de l'Admin
            }
        }

        $body = "";
        $body .= "De : " . $_SESSION["user_prenom"] . " " . $_SESSION["user_nom"] . "\r\n";
        $body .= "Email : " . $_SESSION["user_mail"] . "\r\n";
        $body .= "Message : " . $visitorMsg . "\r\n";

        ini_set('sendmail_from', $_SESSION["user_mail"]);
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
        mail($to, $visitorMsgSubject, $body);
        $msg_envoi = true;
    }
} catch (Exception $e) {
    echo "Erreur :", $e->getMessage(), "\n";
}
