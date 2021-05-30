  
<?php
session_start();
if(isset($_POST['researchElementOne'])){


$search_value_one = $_POST['researchElementOne'];
$search_value_two = $_POST['researchElementTwo'];


$prep = "SELECT ID_utilisateur FROM utilisateur WHERE prenom LIKE $search_value_one OR nom Like $search_value_two";
try {
    $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi", 'root', '');
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req =  $dbco->prepare($prep);
    $req->execute();
    $researchID=$req->fetchAll();
    if($_SESSION['showTable']=='oui'){
    $prep = "SELECT nom,prenom,Email FROM utilisateur WHERE ID_utilisateur In (SELECT ID_utilisateur FROM patient WHERE ID_Medecin=? AND ID_utilisateur In ?";
    $req = $dbco->prepare($prep);
    $req->execute([$_SESSION[('ID')],$researchID]);
    $researchPatient=$req->fetchAll();
        }else{
    $prep = "SELECT nom,prenom,Email FROM utilisateur WHERE ID_utilisateur In (SELECT ID_utilisateur FROM patient WHERE ID_Medecin!=? AND ID_utilisateur In ?";
    $req = $dbco->prepare($prep);
    $req->execute([$_SESSION[('ID')],$researchID]);
    $researchPatient=$req->fetchAll();    
        }
    $_SESSION['researchPatient']=$researchPatient; 
    echo'ok';

} catch (PDOException $e) {
}
}else{
    echo'non';
}
?>