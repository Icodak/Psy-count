<?php
$usr = $_GET['usr'];
    try {
        $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi", 'root', '');
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $req =  $dbco->prepare('SELECT prenom AS User_Firstname, nom AS User_Lastname, images AS User_Profile FROM `utilisateur` WHERE ID_Utilisateur = :usr;');
        $req->bindParam(':usr', $usr);
        $req->execute();
        echo json_encode($req->fetchAll());
    } catch (PDOException $e) {
}
?>