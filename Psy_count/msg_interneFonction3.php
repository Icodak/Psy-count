<?php
try {
    $dbMsg = new PDO("mysql:host=localhost;dbname=serveur_psy_fi", 'root', '');
    $dbMsg ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $recipient_from_users = $dbMsg ->query('SELECT ID_Utilisateur, nom, prenom, Email FROM utilisateur ORDER BY nom');
    include("contact_SQL.php");

    if (isset($_POST['submit'])) {
        if (isset($_POST['msg_destinataire'], $_POST['msg_Cct']) && !empty($_POST['msg_destinataire']) && !empty($_POST['msg_Cct'])) {
            $msg_destinataire = htmlspecialchars($_POST['msg_destinataire']);
            if ($_POST['msg_destinataire'] == "medTraitant") {
                $msg_destinataire = $_SESSION["ID_DocMail"];
            }
            if ($_POST['msg_destinataire'] == "adminContact") {
                $msg_destinataire = "amanda.dieuaide@qq.com"; //Mail de l'Admin
            }

            $sujet = htmlspecialchars($_POST['msgSubject_Cct']);
            $message = htmlspecialchars($_POST['msg_Cct']);
            //echo $msg_destinataire . "\n"; //Destinataire

            $msg_envoyeur = $dbMsg->prepare(
                'SELECT Email 
                FROM utilisateur
                WHERE ID_Utilisateur =?'
            );
            $msg_envoyeur->execute(array($_SESSION['ID']));
            $msg_envoyeur = $msg_envoyeur->fetch();
            //echo $msg_envoyeur[0] . "\n"; //Envoyeur

            $add_msg =
                "INSERT INTO msg_interne (ID_Message, ID_Expediteur, ID_Destinataire, msg_date, msg_subject, msg_content)
                VALUES ('', '$msg_envoyeur[0]', '$msg_destinataire', NOW(), '$sujet', '$message')" //Mettre des '' else it doesn't work/recognizes strings
            ;
            $dbMsg->exec($add_msg);
            echo "Message bien envoyé.";
        }
    } else {
        $warning = "Veuillez compléter tous les champs.";
    }
} catch (Exception $e) {
    echo "Erreur :", $e->getMessage(), "\n";
}
