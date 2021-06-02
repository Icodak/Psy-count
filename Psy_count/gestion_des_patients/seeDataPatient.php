<?php

function initialisationPatient($id){
    try{
      $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
      $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $req =  $dbco->prepare('SELECT Email,nom,prenom,images FROM utilisateur WHERE ID_Utilisateur=:ID_Utilisateur');
        $req->execute(['ID_Utilisateur' => $id]);
        $resultat = $req->fetchAll();
        $information=array();
        $information[0]=$resultat[0][0];
        $information[1]=$resultat[0][1];
        $information[2]=$resultat[0][2];
        $information[3]=$resultat[0][3];
        return $information;
      }    
      catch(PDOException $e){
     echo "Erreur : " . $e->getMessage();
    } 
  }

  function SelectPatientText($id)
{
  try{
    $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req2 =  $dbco->prepare(
      "SELECT diagnostic FROM patient WHERE ID_Utilisateur=?");
    $req2->execute(array($id));
    $resultat = $req2->fetch();
    return $resultat;

    }catch(PDOException $e){
      echo "Erreur : " . $e->getMessage();
    
  }
}



?>