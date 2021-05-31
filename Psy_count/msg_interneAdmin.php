<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messagerie interne</title>
    <link rel="icon" type="image/png" href="images/psy-fi.png" />
    <link rel="stylesheet" href="css//style.css">
    <link rel="stylesheet" href="css//style_Refonte.css">
    <meta name="description" content="page de messagerie interne de psy-fi">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
</head>

<header>
    <div>
        <?php include("menuBar.php") ?>
        <h2 class="headerText"> Messages</h2>
    </div>
</header>

<script type="text/javascript" src='msg_interneFonction.js'></script>

<body>
    <?php
    include('msg_interneFonction.php');
    include("msg_interneFonction3.php");
    if (isset($_GET['msg']) && !empty($_GET['msg'])) {
        delete($dbMsg, htmlspecialchars($_GET['msg']));
    }
    ?>

    <section>
        <div class="flex-column">
            <nav class="niceBox">
                <button id="openContactForm" class="form_button"> Nouveau message </button>
                <button id="openReceptBox" class="form_button"> Boite de réception </button>
                <button id="openSendBox" class="form_button"> Boite d'envoi </button>
            </nav>

            <div class="flex-colW">
                <!-- Boîte de réception -->
                <div id="receptBox" class="niceBox">
                    <?php
                    $youvegotmail = getRecep($dbMsg);
                    if (empty($youvegotmail)) {
                        echo "Vous avez 0 nouveau message.";
                    }

                    if (!empty($youvegotmail)) {
                        $openMsg = openMail($youvegotmail, 0, $_SESSION['type']);
                    }
                    ?>
                </div>

                <div id='openMessage' class='form'><span id='msg_content'></span><button id='closeMessage' class='form_button' name='X'> X </button></div>

                <!-- Boîte d'envoi -->
                <div id="sendBox" class="niceBox">
                    <?php
                    $youvesentmail = getSend($dbMsg);
                    if (empty($youvesentmail)) {
                        echo "Vous avez envoyé 0 nouveau message.";
                    }

                    if (!empty($youvesentmail)) {
                        openMail($youvesentmail, 1, $_SESSION['type']);
                    }
                    ?>
                </div>

                <div id='openMessage2' class='form'><span id='msg_content2'></span><button id='closeMessage2' class='form_button' name='X'> X </button></div>

                <!-- Formulaire de contact / création de message -->
                <div id="form" class="form">
                    <form action="msg_interneAdmin.php" method="POST" autocomplete="off">

                        <div class="form_group"> <label class="form_label" for="text"> Je souhaite contacter : </label>
                            <select class="form_content" name="msg_destinataire">
                                <optgroup>
                                    <?php foreach ($allUsersMail as $values) {
                                        echo "<option>" . $values['Email'] . "</option>";
                                    } ?>
                                </optgroup>
                            </select>
                        </div>

                        <div class="form_group"> <label class="form_label" for="text"> Sujet du message </label>
                            <input class="form_content" required minlength="1" type="text" name="msgSubject_Cct" placeholder="ex : Contact avec l'administrateur PSY-fi..."> </label>
                        </div>

                        <div class="form_group">
                            <label class="form_label" for="text"> Message </label>
                            <textarea class="form_content" required minlength="1" name="msg_Cct" placeholder="Veuillez écrire votre message..."></textarea>
                        </div>

                        <div class="form_group">
                            <button class="form_button" type="submit" name="submit"> Envoyer </button>
                            <button id="closeContactForm" class="form_button"> Annuler </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <?php include("footer.php") ?>
</body>


</html>