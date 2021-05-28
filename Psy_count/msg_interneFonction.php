 <?php
    function openMsg($j, $i, $isSend, $youvegotmail)
    {
        echo "<div id='openMessage" . $j . $isSend . "' class='form'><span>" . $youvegotmail[$j][5 * $i] . "</span>
    <button id='" . $j . $isSend . "' class='form_button' name='X'> X </button>
    </div>";
    }

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

    function delete($dbMsgInt, $msgChoosen)
    {
        $deleteMsg = $dbMsgInt->prepare(
            'DELETE
            FROM msg_interne
            WHERE ID_Message = ?'
        );
        $deleteMsg->execute(array($msgChoosen));
        echo "Message supprimé.";
    }
    ?>

    

   
            

    