<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messagerie interne</title>
    <link rel="icon" type="image/png" href="images/psy-fi.png" />
    <link rel="stylesheet" href="css//style.css">
    <link rel="stylesheet" href="css//style_Refonte.css">
</head>

<header>
    <div>
        <?php include("menuBar.php") ?>
        <h2 class="headerText"> Consultation et Aide</h2>
    </div>
</header>

<script>
    function pop_up(url) {
        window.open(url, 'win2', 'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=1076,height=768,directories=no,location=no')
    }
</script>

<body>
    <?php //Fonction Récup Mail du Médecin traitant 
    try {
        $dbMsgInt = new PDO("mysql:host=localhost;dbname=serveur_psy_fi", 'root', '');
        $dbMsgInt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $recipient_from_users = $dbMsgInt->query('SELECT ID_Utilisateur, nom, prenom, Email FROM utilisateur ORDER BY nom');

        if (isset($_POST['submit'])) {
            if (isset($_POST['msg_destinataire'], $_POST['msg_Cct']) && !empty($_POST['msg_destinataire']) && !empty($_POST['msg_Cct'])) {
                $msg_destinataire = htmlspecialchars($_POST['msg_destinataire']);
                $sujet = htmlspecialchars($_POST['msgSubject_Cct']);
                $message = htmlspecialchars($_POST['msg_Cct']);
                echo $msg_destinataire . "\n"; //Destinataire

                $msg_envoyeur = $dbMsgInt->prepare(
                    'SELECT Email 
                    FROM utilisateur
                    WHERE ID_Utilisateur =?'
                );
                $msg_envoyeur->execute(array($_SESSION['ID']));
                $msg_envoyeur = $msg_envoyeur->fetch();
                echo $msg_envoyeur[0] . "\n"; //Envoyeur

                $add_msg = 
                    "INSERT INTO msg_interne (ID_Message, ID_Expediteur, ID_Destinataire, msg_date, msg_subject, msg_content)
                    VALUES ('', '$msg_envoyeur[0]', '$msg_destinataire', NOW(), '$sujet', '$message')" //Mettre des '' else it doesn't work/recognizes strings
                ;
                $dbMsgInt->exec($add_msg);
                echo "Message envoyé dans la BDD :D";
                
            }
        } else {
            $warning = "Veuillez compléter tous les champs.";
        }
    } catch (Exception $e) {
        echo "Erreur :", $e->getMessage(), "\n";
    }

    ?>

    <div class="background"></div>
    <?php
    if (isset($warning)) {
        echo "<div class='warning'>" . $warning . "</div>";
    }
    ?>

    <div class="flex_column">
        <div class="form">
            <form action="msg_interne.php" method="POST" autocomplete="off">

                <div class="form_group"> <label class="form_label" for="text"> Je souhaite contacter : </label>
                    <select class="form_content" name="msg_destinataire">
                        <optgroup>
                            <?php while ($d = $recipient_from_users->fetch()) { ?>
                                <option><?=
                                        //$d['nom'] . " " . $d['prenom'] //?= == php echo
                                        $d['Email']
                                        ?></option>
                            <?php } ?>
                        </optgroup>
                    </select>
                </div>

                <div class="form_group"> <label class="form_label" for="text"> Sujet du message </label>
                    <input class="form_content" type="text" name="msgSubject_Cct" placeholder="ex : Contact avec l'administrateur PSY-fi..."> </label>
                </div>

                <div class="form_group">
                    <label class="form_label" for="text"> Message </label>
                    <textarea class="form_content" name="msg_Cct" placeholder="Veuillez écrire votre message..."></textarea>
                </div>

                <div class="form_group">
                    <button class="form_button" type="submit" name="submit"> Envoyer </button>
                    <button class="form_button" type="reset"> Annuler </button>
                </div>
            </form>

        </div>
        <img src="images/psy-fi.png">
    </div>

    <div class="niceBox">
        <table>
            <?php  /*
            $youvegotmail = $dbMsgInt->prepare(
                'SELECT *
        FROM msg_interne
        WHERE ID_Destinataire = (SELECT Email FROM utilisateur WHERE ID_Utilisateur =?)'
            );
            $youvegotmail->execute(array($_SESSION['ID']));
            $youvegotmail = $youvegotmail->fetchAll();

            for ($j = 0; $j < count($youvegotmail); $j += 1) {
                    for ($i = 1; $i <= count($youvegotmail[0]) - 6; $i += 6) {
                        echo "<tr><td>";
                        echo "<a href='msg_interneBox.php?read_msg=" . $youvegotmail[$j][5 * $i] . "' onclick='pop_up(this);' >" . "Message De : " . $youvegotmail[$j][$i] . " Sujet : " . $youvegotmail[$j][4 * $i] . " Le : " . $youvegotmail[$j][3 * $i] . "</a>";
                        //echo "<div>" . $youvegotmail[$j][5 * $i] . "</div>";
                        echo "</td></tr>";
                    }
                }
*/
            include('msg_interneFonction.php');
            $youvegotmail = getMail($dbMsgInt);

            function openMail($youvegotmail)
            {
                for ($j = 0; $j < count($youvegotmail); $j += 1) {
                    for ($i = 1; $i <= count($youvegotmail[0]) - 6; $i += 6) {
                        echo "<tr><td>";
                        echo "<a href='msg_interneBox.php?read_msg=" . $youvegotmail[$j][5 * $i] . "' onclick='pop_up(this);' >" . "Message De : " . $youvegotmail[$j][$i] . " Sujet : " . $youvegotmail[$j][4 * $i] . " Le : " . $youvegotmail[$j][3 * $i] . "</a>";
                        //echo "<div>" . $youvegotmail[$j][5 * $i] . "</div>";
                        echo "</td></tr>";
                    }
                }
            }

            if (empty($youvegotmail)) {
                echo "Vous n'avez pas de nouveau message.";
            } else {
                openMail($youvegotmail);
            }

            ?>
        </table>
    </div>

</body>

<?php include("footer.php") ?>

</html>