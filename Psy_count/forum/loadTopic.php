<?php
    try {
        $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi", 'root', '');
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $req =  $dbco->prepare('SELECT * FROM `forum` ORDER BY creationDate');
        $req->execute();
        echo json_encode($req->fetchAll());
    } catch (PDOException $e) {
}
?>