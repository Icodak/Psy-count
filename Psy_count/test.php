<?php





function suppPatient($idPatient){
    try{
    $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    $req2 =  $dbco->prepare( "UPDATE ID_Medecin SET ID_Medecin='NULL' FROM patient WHERE ID_Utilisateur=34");
    $req2->execute();
    } catch(PDOException $e){

        echo "Erreur : " . $e->getMessage();
      }   
  
  }



  suppPatient('34');













?>












