<?php



if(isset($_POST['supp'])){
    session_start();
    suppPatient($_POST['supp']);
  }


  
function suppPatient($idPatient){
    $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    $req2 =  $dbco->prepare( "UPDATE patient SET ID_Medecin='NULL' WHERE ID_Utilisateur='$idPatient'");
    $req2->execute();
  
  }



?>