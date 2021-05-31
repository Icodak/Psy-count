<?php

$search_value = $_GET['search_value'];
$search_type = $_GET['search_type'];
$prep = "SELECT ".$search_type." FROM `utilisateur` WHERE ".$search_type." LIKE \"".$search_value."\" AND permission_lvl = \"patient\" ORDER BY ".$search_type." LIMIT 10;";
try {
    $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi", 'root', '');
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req =  $dbco->prepare($prep);
    $req->execute();
    echo json_encode($req->fetchAll());
   
} catch (PDOException $e) {
}
