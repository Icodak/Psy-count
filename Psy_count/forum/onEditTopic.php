<?php

$topic_id = $_GET['topic_id'];
    try {
        $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi", 'root', '');
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $req =  $dbco->prepare('UPDATE `forum` SET `messageCount` = (SELECT COUNT(*) FROM messages WHERE messages.ID_topic = :topic_id AND messages.isHidden = "0") WHERE forum.ID_topic = :topic_id');
        $req->bindParam(':topic_id', $topic_id);
        $req->execute();
        $req2 =  $dbco->prepare('UPDATE forum SET forum.ID_latestUser=(SELECT ID_utilisateur FROM messages WHERE messages.ID_topic = :topic_id ORDER BY messages.creationDate DESC LIMIT 1),forum.latestUpdate = (SELECT creationDate FROM messages WHERE messages.ID_topic = :topic_id ORDER BY messages.creationDate DESC LIMIT 1) WHERE forum.ID_topic = :topic_id');
        $req2->bindParam(':topic_id', $topic_id);
        $req2->execute();
        echo json_encode(array("success" => true));
    } catch (PDOException $e) {
}
?>