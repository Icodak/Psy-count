

<?php
session_start();
$elementOne = $_POST['researchElementOne'];
$elementTwo = $_POST['researchElementTwo'];
$prep = "SELECT nom, prenom, email,ID_Utilisateur FROM utilisateur AS U WHERE U.prenom LIKE '%".$elementOne."%' AND U.nom LIKE '%".$elementTwo."%' AND permission_lvl = 'patient'";
try {
    $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi", 'root', '');
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req =  $dbco->prepare($prep);
    $req->execute();
    $_SESSION['researchPatient']=$req->fetchAll();
    echo json_encode( $_SESSION['researchPatient']);
   
} catch (PDOException $e) {
}