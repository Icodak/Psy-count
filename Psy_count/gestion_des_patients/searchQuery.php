  
<?php
session_start();

$search_value = $_GET['search_value'];
$search_type = $_GET['search_type'];
if($_SESSION['showTable']=='oui'){

$prep  = "SELECT ".$search_type." FROM utilisateur AS U JOIN patient AS P ON P.ID_Utilisateur = U.ID_Utilisateur JOIN medecin AS M ON M.ID_Medecin = P.ID_Medecin WHERE U.".$search_type." LIKE \"".$search_value."\" AND M.ID_Utilisateur = ".$_SESSION['ID']." AND permission_lvl = 'patient' ORDER BY ".$search_type." LIMIT 10";
}else{
    $prep  = "SELECT ".$search_type." FROM utilisateur AS U JOIN patient AS P ON P.ID_Utilisateur = U.ID_Utilisateur WHERE P.ID_Medecin = '0' AND permission_lvl = 'patient' ORDER BY nom LIMIT 10";
}

try {
    $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi", 'root', '');
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req =  $dbco->prepare($prep);
    $req->execute();
    
    echo json_encode($req->fetchAll());
 
} catch (PDOException $e) {
    echo $e;
}
