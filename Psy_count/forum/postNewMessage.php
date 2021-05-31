<?php

$topic_id = $_POST['topic_id'];
$msg = $_POST['msg'];
$usr_id = $_POST['usr_id'];

try {
    $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi", 'root', '');
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req =  $dbco->prepare('INSERT INTO `messages`( `ID_topic`, `ID_utilisateur`,`message`) VALUES (:topic_id,:usr_id,:msg)');
    $req->bindParam(':topic_id', $topic_id);
    $req->bindParam(':msg', $msg);
    $req->bindParam(':usr_id', $usr_id);
    $req->execute();
    echo json_encode(array("success" => true));
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
