<?php
    try {
        $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi", 'root', '');
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $req =  $dbco->prepare('SELECT forum.*, OU.nom AS originUserName, MU.nom AS latestUserName, MU.images AS latestUserProfile FROM `forum` LEFT JOIN `utilisateur` AS OU ON forum.`ID_creationUser`=OU.`ID_Utilisateur` LEFT JOIN `utilisateur` AS MU ON forum.`ID_latestUser`= MU.`ID_Utilisateur` ORDER BY creationDate');
        $req->execute();
        echo json_encode($req->fetchAll());
    } catch (PDOException $e) {
}
?>