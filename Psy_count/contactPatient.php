<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="icon" type="image/png" href="images/psy-fi.png" />
    <link rel="stylesheet" href="css//style_Refonte.css">
</head>

<header>
    <div>
        <?php include("menuBar.php") ?>
        <h2 class="headerText"> Messages</h2>
    </div>
</header>

<?php //Fonction Récup Mail du Médecin traitant 
try {
    $dbMsg = new PDO("mysql:host=localhost;dbname=serveur_psy_fi", 'root', '');
    $dbMsg->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    if ($_SESSION['type'] = 'patient') {
        //echo 'Test messagerie patient : '.$_SESSION['ID']."\n\r";

        //TODO : J'assigne d'office un Doc à un patient prcq on n'a pas encore la fonction 
        //pour que le médecin choisisse ses patient !
        $testSQL2 = $dbMsg->query(
            'UPDATE patient
             SET ID_Medecin = 6
             WHERE ID_Utilisateur = "'.$_SESSION['ID'].'"'
        );

        //Trouver ID_Medecin à partir de ID_Utilisateur du patient
        $testSQL3 = $dbMsg->query(
            'SELECT ID_Medecin 
            FROM patient
             WHERE ID_Utilisateur = "'.$_SESSION['ID'].'"'
        );

        $ID_doc = $testSQL3->fetch();

      
        $_SESSION["ID_DocOfPatient"] = $ID_doc["ID_Medecin"];
        //echo "TEST".$_SESSION["ID_DocOfPatient"]."TEST";
      
        //Trouver ID_Utilisateur du médecin traitant à partir de son ID_Medecin
        $testSQL4 = $dbMsg->query(
            'SELECT ID_Utilisateur 
            FROM medecin
             WHERE ID_Medecin = "' . $_SESSION["ID_DocOfPatient"] . '"'
        );

        $ID_docUser = $testSQL4->fetch();
        $_SESSION["ID_DocAsUser"] = $ID_docUser["ID_Utilisateur"];
        
      

        //Enfin : récupérer l'email du médecin traitant
        $testSQL5 = $dbMsg->query(
            'SELECT Email
            FROM utilisateur
             WHERE ID_Utilisateur = "' . $_SESSION["ID_DocAsUser"] . '"'
        );
       
        $ID_docMail = $testSQL5->fetch();
        $_SESSION["ID_DocMail"] = $ID_docMail["Email"];
       

        //echo "\nLe mail du patient d'ID_Utilisateur = " . $_SESSION['ID'] . " est " . $_SESSION["ID_DocMail"];

        //Get nom, prenom, Email, from ID_Utilisateur pour auto remplir le formulaire

        $testSQL6 = $dbMsg->query(
            'SELECT prenom, nom, Email
            FROM utilisateur
             WHERE ID_Utilisateur = "' . $_SESSION["ID"] . '"'
        );

        $user_data = $testSQL6->fetch();
        //TODO : J'utilise des SuperGlobales prcq on peut les utiliser dans le profil
        //par ex si l'user change son prénom, le formulaire s'en souvient :D
        $_SESSION["user_prenom"] = $user_data["prenom"];
        $_SESSION["user_nom"] = $user_data["nom"];
        $_SESSION["user_mail"] = $user_data["Email"];

        //echo $_SESSION["user_prenom"] . $_SESSION["user_nom"] . $_SESSION["user_mail"];
    } else {
        //echo "Test messagerie médecin :";
    }
} catch (Exception $e) {
    echo "Erreur :", $e->getMessage(), "\n";
}
?>

<?php //Fonction Envoi de Mail/Contact
$msg_envoi = false;

try {
    if (isset($_POST['submit'])) { //A voir si c'est obligatoire ou pas, i don't think so
        $visitorMsgSubject = $_POST["msgSubject_Cct"];
        $visitorMsg = $_POST["msg_Cct"];

        if ($_POST['msg_destinataire'] == "medTraitant") {
            $to = $_SESSION["ID_DocMail"];
            //$to = "amanda.dieuaide@isep.fr";
        } else {
            $to = "amanda.dieuaide@gmail.com";
        } //Get mail from Admin, Doc, Patient
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
?>

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
        <div style="height: 100vh;" id="form">
            <h3 class="headerText"> Message bien reçu. Nous vous recontacterons prochainement.</h2>
        </div>
    <?php
    else :
    ?>


<div class="flex_column">
        <div class="form">
            <form action="contactPatient.php" method="POST" autocomplete="off">

                <div class="form_group"> <label class="form_label" for="text"> Je souhaite contacter : </label>
                    <select class="form_content" name="msg_destinataire">
                        <option value="medTraitant">Mon médecin traitant</option>
                        <option value="adminContact">L'administrateur PSY-fi</option>
                    </select>
                </div>

                <div class="form_group"> <label class="form_label" for="text"> Sujet du message </label>
                    <input class="form_content" required  minlength="1" type="text" name="msgSubject_Cct" placeholder="ex : Contact avec l'administrateur PSY-fi..."> </label>
                </div>

                <div class="form_group">
                    <label class="form_label" for="text"> Message </label>
                    <textarea class="form_content" required  minlength="1" name="msg_Cct" placeholder="Veuillez écrire votre message..."></textarea>
                </div>

                <div class="form_group">
                    <button class="form_button" type="submit" name="submit"> Envoyer </button>
                    <button class="form_button" type="reset"> Annuler </button>
                </div>
            </form>
            
        </div>
        <img src="images/psy-fi.png">
    </div>

    <?php
    endif;
    ?>

    <!-- v Should be in a footer :/ mais la mise en page marche pas?-->
</body>

<?php include("footer.php") ?>

</html>