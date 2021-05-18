 <?php
    function getRecep($dbMsgInt)
    {
        $youvegotmail = $dbMsgInt->prepare(
            'SELECT *
            FROM msg_interne
            WHERE ID_Destinataire = (SELECT Email FROM utilisateur WHERE ID_Utilisateur =?)'
        );
        $youvegotmail->execute(array($_SESSION['ID']));
        $youvegotmail = $youvegotmail->fetchAll();

        return $youvegotmail;
    }

    function getSend($dbMsgInt)
    {
        $youvegotmail = $dbMsgInt->prepare(
            'SELECT *
            FROM msg_interne
            WHERE ID_Expediteur = (SELECT Email FROM utilisateur WHERE ID_Utilisateur =?)'
        );
        $youvegotmail->execute(array($_SESSION['ID']));
        $youvegotmail = $youvegotmail->fetchAll();

        return $youvegotmail;
    }
    ?>

   
            

    