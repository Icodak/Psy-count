<?php
session_start();
$topic_name = $_POST['topic_name'];
$msg = $_POST['msg'];
$topic_id = uniqid();
$usr_id = "0";
$result = false;


if (isset($_SESSION['type'])) {
    $usr_id = $_SESSION['ID'];
    try {
        $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi", 'root', '');
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $req =  $dbco->prepare('INSERT INTO `forum`(`ID_topic`, `name`, `ID_creationUser`, `ID_latestUser`) VALUES (:topic_id,:topic_name,:usr_id,:usr_id)');
        $req->bindParam(':topic_name', $topic_name);
        $req->bindParam(':topic_id', $topic_id);
        $req->bindParam(':usr_id', $usr_id);
        $req->execute();
        $req2 =  $dbco->prepare('INSERT INTO `messages`( `ID_topic`, `ID_utilisateur`,`message`) VALUES (:topic_id,:usr_id,:msg)');
        $req2->bindParam(':topic_id', $topic_id);
        $req2->bindParam(':msg', $msg);
        $req2->bindParam(':usr_id', $usr_id);
        $req2->execute();
        $result = true;
    } catch (PDOException $e) {
        echo json_encode($result);
    }
}
echo json_encode($result);

$file = "topic/" . $topic_id . "-". "$topic_name" . ".php";

$content = "<!DOCTYPE html>
<html lang=\"en\">

<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <title>". $topic_name . "</title>
    <meta name=\"description\" content=\"". substr($msg,0,min(200,strlen($msg))) . "\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta topicID = \"" . $topic_id . "\">
    <meta UAID = \"" . $usr_id . "\">
    <link rel=\"stylesheet\" href=\"../../css/style.css\">
    <link rel=\"stylesheet\" href=\"../../css/style_footer.css\">
    <link rel=\"stylesheet\" href=\"../../css/style_forum.css\">
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js\"></script>
    <script type=\"text/javascript\" src=\"../../javaScript/javaScriptForum.js\" async defer></script>
</head>

<body onload=\"loadMessageUsers('" . $topic_id . "')\">
    <?php include(\"../../menubar.php\") ?>

    <section class=\"forum-background gray-background\">
        <div class=\"forum-container shadow white-background\">
            <div class=\"forum-title\">
                <h1>" . $topic_name . "</h1>
                </div>
                <div class=\"forum-messages\" id=\"forum-messages\">
    
                </div>
                <?php error_reporting(E_ERROR | E_WARNING | E_PARSE);
                if (isset($" . "_SESSION['type'])) {
                    include(\"../response.php\");
                }
                ?>
            </div>
        </section>
    
        <?php include(\"../../footer.php\") ?>
    </body>
    
    </html>";

file_put_contents($file, $content, FILE_APPEND | LOCK_EX);
?>