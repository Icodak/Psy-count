  
<?php

$search_value = $_GET['search_value'];
$search_type = $_GET['search_type'];
if($_SESSION['showTable']='oui'){

$prep = "SELECT ID_utilisateur FROM patient WHERE ID_Medecin != ".$_SESSION['ID']." AND ID_utilisateur IN
 (SELECT ID_utilisateur FROM `utilisateur` WHERE ".$search_type." LIKE \"".$search_value."\" AND permission_lvl = \"patient\" ORDER BY ".$search_type." LIMIT 10)";

}else{
$prep = "SELECT ID_utilisateur FROM patient WHERE ID_Medecin = ".$_SESSION['ID']." AND ID_utilisateur IN
    (SELECT ID_utilisateur FROM `utilisateur` WHERE ".$search_type." LIKE \"".$search_value."\" AND permission_lvl = \"patient\" ORDER BY ".$search_type." LIMIT 10)";
}

try {
    $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi", 'root', '');
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req =  $dbco->prepare($prep);
    $req->execute();
    $resultat = $req->fetch();
    $prep2 = "SELECT $search_type FROM utilisateur WHERE ID_utilisateur IN  $resultat ";
    

   
} catch (PDOException $e) {
}