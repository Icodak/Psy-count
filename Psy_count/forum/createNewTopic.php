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
?>