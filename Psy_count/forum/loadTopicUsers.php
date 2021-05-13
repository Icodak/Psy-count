<?php
$o_usr = $_GET['o_usr'];
$m_usr = $_GET['m_usr'];


    try {
        $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi", 'root', '');
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $req =  $dbco->prepare('SELECT prenom AS O_User_Name FROM `utilisateur` WHERE ID_Utilisateur = :o_usr;');
        $req->bindParam(':o_usr', $o_usr);
        $req->execute();
        $req2 =  $dbco->prepare('SELECT prenom AS M_User_Name, images AS M_User_Profile FROM `utilisateur` WHERE ID_Utilisateur = :m_usr;');
        $req2->bindParam(':m_usr', $m_usr);
        $req2->execute();
        echo json_encode(array($req->fetchAll(),$req2->fetchAll()));
    } catch (PDOException $e) {
}
?>