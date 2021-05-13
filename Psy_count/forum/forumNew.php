<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Forum</title>
    <meta name="description" content="Forum de Psy-fi">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/styleMenu.css">
    <link rel="stylesheet" href="../css/style_footer.css">
    <link rel="stylesheet" href="../css/style_forum.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="../javaScript/javaScriptForum.js" async defer></script>
</head>

<body>
    <?php include("../menubar.php") ?>
    <section class="forum-background gray-background">
        <div class="forum-container ">
            <div class="forum-header shadow white-background">
                <div class="forum-title">
                    <h1>Créer un nouveau sujet</h1>
                </div>
            </div>
            <div class="forum-body shadow white-background">
                <div class="forum-sujet">
                    <h2>Sujet</h2>
                    <div class="input-container">
                        <input class="input-field" id="topicTitle" type="text" placeholder="Titre du sujet"/>
                        <p class="must-fill">* ce champ est obligatoire</p>
                    </div>
                </div>
                <div class="forum-message">
                    <h2>Message</h2>
                    <div class="input-container message">
                        <textarea id="topicMessage" class="input-field" name="message" placeholder="Contenu du message" oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"'></textarea>
                        <p class="must-fill">* ce champ est obligatoire</p>
                    </div>
                </div>
                <div class="forum-submit">
                    <button class="button" onclick="addTopic()">Publier le sujet</button>
                </div>
            </div>
        </div>
        <button class="button" onclick="toptop('nochier')">TEST</button>
    </section>

    <?php include("../footer.php") ?>
</body>

</html>