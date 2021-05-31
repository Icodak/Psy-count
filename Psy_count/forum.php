<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Forum</title>
    <meta name="description" content="Forum de Psy-fi">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_forum.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" async defer></script>
    <script type="text/javascript" src="javaScript/javaScriptForum.js" async defer></script>
</head>

<body onload="loadTopics()">
    <?php include("menubar.php") ?>
    <section class="forum-background gray-background">
        <div class="forum-container">
            <div class="forum-header shadow white-background">
                <div class="forum-title">
                    <h1>Forum</h1>
                </div>
                <div class="forum-create">
                    <a href="forum/forumNew.php"><button class="button">Créer un nouveau sujet</button></a>
                </div>
            </div>
            <div id="forum-body" class="forum-body shadow white-background">
                

            </div>
        </div>

    </section>
    <?php include("footer.php") ?>
</body>

</html>