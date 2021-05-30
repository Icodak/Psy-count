<?php
if (isset($_SESSION['type'])) {
    if ($_SESSION['type'] == 'patient') {
        //echo 'Test messagerie patient : ' . $_SESSION['ID'] . "\n\r";
        //Trouver ID_Medecin à partir de ID_Utilisateur du patient
        $ID_doc = $dbMsg->prepare(
            'SELECT ID_Medecin 
        FROM patient
         WHERE ID_Utilisateur =?'
        );
        $ID_doc->execute(array($_SESSION['ID']));
        $ID_doc = $ID_doc->fetch();
        //$_SESSION["ID_DocOfPatient"] = $ID_doc["ID_Medecin"];

        //Trouver ID_Utilisateur du médecin traitant à partir de son ID_Medecin
        $ID_docUser = $dbMsg->prepare(
            'SELECT ID_Utilisateur 
        FROM medecin
         WHERE ID_Medecin =?'
        );
        $ID_docUser->execute(array($ID_doc["ID_Medecin"]));
        $ID_docUser = $ID_docUser->fetch();
        //$_SESSION["ID_DocAsUser"] = $ID_docUser["ID_Utilisateur"];

        //Enfin : récupérer l'email du médecin traitant
        $ID_docMail = $dbMsg->prepare(
            'SELECT Email
        FROM utilisateur
         WHERE ID_Utilisateur =?'
        );
        $ID_docMail->execute(array($ID_docUser["ID_Utilisateur"]));
        $ID_docMail = $ID_docMail->fetch();
        $_SESSION["ID_DocMail"] = $ID_docMail["Email"];
    }

    if ($_SESSION['type'] == 'Medecin') {
        //echo "Test messagerie médecin :" . $_SESSION['ID'] . "\n\r";
        //Trouver ID_Medecin à partir de ID_Utilisateur du médecin
        $ID_doc = $dbMsg->prepare(
            'SELECT ID_Medecin 
        FROM medecin
         WHERE ID_Utilisateur =?'
        );
        $ID_doc->execute(array($_SESSION['ID']));
        $ID_doc = $ID_doc->fetchAll();

        //Trouver les patients du médecin selon qui l'ont en médecin
        $ID_patient = $dbMsg->prepare(
            'SELECT ID_Utilisateur 
        FROM patient
         WHERE ID_Medecin =?'
        );
        $ID_patient->execute(array(intval($ID_doc[0]['ID_Medecin'])));
        $ID_patient = $ID_patient->fetchAll();

        $stringSQL = 'SELECT Email
    FROM utilisateur
    WHERE';
        //Récupérer les ID de chaque patients du médecin
        foreach ($ID_patient as $values) {
            $stringSQL .= " ID_Utilisateur = " . intval($values['ID_Utilisateur']) . " OR";
        }
        $stringSQL = substr($stringSQL, 0, -3);

        //Enfin : récupérer les mails
        $ID_patientMail = $dbMsg->prepare(
            $stringSQL,
            array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY)
        );
        $ID_patientMail->execute();
        $ID_patientMail = $ID_patientMail->fetchAll();
    }

    if ($_SESSION['type'] == 'Admin') {
        //echo "Test messagerie administrateur :" . $_SESSION['ID'] . "\n\r";
        //L'administrateur peut contacter tout le monde à l'exception de lui-même
        $allUsersMail = $dbMsg->prepare(
            'SELECT Email
         FROM utilisateur
         EXCEPT
         SELECT Email
         FROM utilisateur
         WHERE ID_Utilisateur =?'
        );
        $allUsersMail->execute(array($_SESSION['ID']));
        $allUsersMail = $allUsersMail->fetchAll();
    } else {
        return;
    }

    //Get nom, prenom, Email, from ID_Utilisateur pour auto remplir le formulaire
    $user_data = $dbMsg->prepare(
        'SELECT prenom, nom, Email
    FROM utilisateur
     WHERE ID_Utilisateur =?'
    );
    $user_data->execute(array($_SESSION["ID"]));
    $user_data = $user_data->fetch();

    $_SESSION["user_prenom"] = $user_data["prenom"];
    $_SESSION["user_nom"] = $user_data["nom"];
    $_SESSION["user_mail"] = $user_data["Email"];
}
