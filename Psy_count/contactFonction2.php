<?php
//Pour les utilisateurs non connectés/visiteurs
$msg_envoi = false;

try {
    if (isset($_POST['submit']) && isset($_POST["mail_Cct"]) && $_POST["mail_Cct"] != '') {
        if (filter_var($_POST["mail_Cct"], FILTER_VALIDATE_EMAIL)) { //check si c'est une adresse email
            $visitorFirstName = $_POST["prenom_Cct"];
            $visitorLastName = $_POST["nom_Cct"];
            $visitorEmail = $_POST["mail_Cct"];
            $visitorMsgSubject = $_POST["msgSubject_Cct"];
            $visitorMsg = $_POST["msg_Cct"];

            $to = "amanda.dieuaide@qq.com"; //Get mail from Admin
            $body = "";

            $body .= "De : " . $visitorFirstName . "\r\n";
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
    echo "Erreur :", $e->getMessage(), "\n";
}
