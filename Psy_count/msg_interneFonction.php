 <?php

    function openMail($youvegotmail, $isSend,$userType)
    {
        echo "<table class='wideT'>";
        for ($j = 0; $j < count($youvegotmail); $j += 1) {
            for ($i = 1; $i <= count($youvegotmail[0]) - 6; $i += 6) {
                echo "<tr><td>";
                if ($isSend == 0) {
                    $rec = "Message de : " . $youvegotmail[$j][$i];
                } else {
                    $rec = "Message à : " . $youvegotmail[$j][$i * 2];
                }
                echo "<div class='niceMsg'><a class='clickMsg' id='" . $j . $isSend . "' name='" . $youvegotmail[$j][$i - 1] . "'>" . $rec . " Sujet : " . $youvegotmail[$j][4 * $i] . " Le : " . $youvegotmail[$j][3 * $i] . "</a></div>";
                if($userType == "patient"){
                    echo "<a class='eraseMsg' href='msg_internePatient.php?msg=" . $youvegotmail[$j][$i - 1] . "'><img src='images/erase.png' alt='eraseMsg' class='eraseMsg'></a>";
                }
                if($userType == "Medecin"){
                    echo "<a class='eraseMsg' href='msg_interneMedecin.php?msg=" . $youvegotmail[$j][$i - 1] . "'><img src='images/erase.png' alt='eraseMsg' class='eraseMsg'></a>";
                }
                if($userType == "Admin"){
                    echo "<a class='eraseMsg' href='msg_interneAdmin.php?msg=" . $youvegotmail[$j][$i - 1] . "'><img src='images/erase.png' alt='eraseMsg' class='eraseMsg'></a>";
                }
                //echo "<div><a class='eraseMsg' href='msg_interne.php?msg=" . $youvegotmail[$j][$i - 1] . "' onclick=\"demo();\"><img src='images/erase.png' alt='eraseMsg' class='eraseMsg'></a></div>";
                echo "</td></tr>";
            }
        }
        echo "</table>";
    }

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
        echo "<span class='alert'>Message supprimé.</span>";
    }
    ?>

    

   
            

    