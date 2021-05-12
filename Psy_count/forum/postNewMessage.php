<?php

$topic_name = $_POST['topic_name'];
$msg = $_POST['msg'];

try {
    $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi", 'root', '');
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req =  $dbco->prepare('INSERT INTO `messages`( `ID_topic`, `ID_utilisateur`,`message`) VALUES ((SELECT `ID_topic` FROM `forum` WHERE name = :topic_name),42,:msg)');
    $req->bindParam(':topic_name', $topic_name);
    $req->bindParam(':msg', $msg);
    $req->execute();
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
