<?php

$topic_uuid = $_GET['topic_uuid'];
    try {
        $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi", 'root', '');
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $req =  $dbco->prepare('SELECT M.ID_message, M.ID_utilisateur, M.isHidden, M.isModified, M.creationDate, M.message, U.nom AS userLastName, U.prenom AS userFirstName, u.images AS userProfile, u.permission_lvl AS userRank FROM messages AS M LEFT JOIN utilisateur AS U ON M.ID_utilisateur = U.ID_Utilisateur WHERE M.ID_topic = :topic_uuid ORDER BY M.creationDate;');
        $req->bindParam(':topic_uuid', $topic_uuid);
        $req->execute();
        $req2 =  $dbco->prepare('UPDATE `forum` SET `viewCount`=(`viewCount` + 1) WHERE `ID_topic` = :topic_uuid;');
        $req2->bindParam(':topic_uuid', $topic_uuid);
        $req2->execute();
        echo json_encode($req->fetchAll());
    } catch (PDOException $e) {
}
?>