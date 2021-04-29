<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="icon" type="image/png" href="images/psy-fi.png" />
    <link rel="stylesheet" href="css//style_Refonte.css">
</head>



<?php //Fonction Récup Mail du Médecin traitant 
try {
    $dbMsgInt = new PDO("mysql:host=localhost;dbname=serveur_psy_fi", 'root', '');
    $dbMsgInt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['submit'])) {
        if (isset($_POST['msg_destinataire'], $_POST['msg_Cct']) && !empty($_POST['msg_destinataire']) && !empty($_POST['msg_Cct'])) {
            /*$msg_destinataire = htmlspecialchars($_POST['msg_destinataire']);
            $message = htmlspecialchars($_POST['msg_Cct']);
            echo $msg_destinataire.$message.$d['ID_Utilisation'];
            $recipient_user_ID = $dbMsgInt->query('SELECT ID_Destinataire FROM message WHERE ID_Utilisateur ='.$d["ID_Utilisateur"].'');
            $recipient_user_ID = $recipient_user_ID->fetch();
            $recipient_user_ID = $recipient_user_ID['ID_Destinataire'];
            print_r($recipient_user_ID);
            $sender_user_ID = $dbMsgInt->prepare('INSERT INTO message(ID_Expediteur, ID_Destinataire, Message) VALUES (?,?,?)');
            $sender_user_ID->execute(array($_SESSION['ID_Utilisateur'], $recipient_user_ID, $message));
*/
        }
    } else {
        $warning = "Veuillez compléter tous les champs.";
    }
} catch (Exception $e) {
    echo "Erreur :", $e->getMessage(), "\n";
}

$recipient_from_users = $dbMsgInt->query('SELECT ID_Utilisateur, nom, prenom FROM utilisateur ORDER BY nom'); //CREER PSEUDO UNIQUE
?>

<body>
<header>
    <div>
        <?php include("menuBar.php") ?>
        <h2 class="headerText"> Consultation et Aide</h2>
    </div>
</header>

    <div class="background"></div>
    <?php
    if (isset($warning)) {
        echo "<span style='color:lightcoral;'>" . $warning . "</span>";
    }
    ?>

    <div class="flex_column">
        <div class="form">
            <form action="msg_interne.php" method="POST" autocomplete="off">

                <div class="form_group"> <label class="form_label" for="text"> Je souhaite contacter : </label>
                    <select class="form_content" name="msg_destinataire">
                        <?php while ($d = $recipient_from_users->fetch()) { ?>
                            <option><?= $d['nom'] . " " . $d['prenom'] //?= == php echo
                                    ?></option>
                        <?php } ?>
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
    
    </div>

</body>

<?php include("footer.php") ?>

</html>