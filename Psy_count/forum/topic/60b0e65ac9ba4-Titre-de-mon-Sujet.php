<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Titre-de-mon-Sujet</title>
    <meta name="description" content="Contenu de mon message">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta topicID = "60b0e65ac9ba4">
    <meta UAID = "10">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/styleMenu.css">
    <link rel="stylesheet" href="../../css/style_footer.css">
    <link rel="stylesheet" href="../../css/style_forum.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="../../javaScript/javaScriptForum.js" async defer></script>
</head>

<body onload="loadMessageUsers('60b0e65ac9ba4')">
    <?php include("../../menubar.php") ?>

    <section class="forum-background gray-background">
        <div class="forum-container shadow white-background">
            <div class="forum-title">
                <h1>Titre-de-mon-Sujet</h1>
                </div>
                <div class="forum-messages" id="forum-messages">
    
                </div>
                <?php error_reporting(E_ERROR | E_WARNING | E_PARSE);
                if (isset($_SESSION['type'])) {
                    include("../response.php");
                }
                ?>
            </div>
        </section>
    
        <?php include("../../footer.php") ?>
    </body>
    
    </html>