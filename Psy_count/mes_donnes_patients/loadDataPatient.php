
<?php

function selectInformationsPatient(){
  try{
    $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $id=$_SESSION['ID'];

    $req =  $dbco->prepare('SELECT nom,prenom,Email,images,motDePasse FROM utilisateur WHERE ID_Utilisateur=:ID_Utilisateur');
    $req->execute(['ID_Utilisateur' => $id]);
    $resultat = $req->fetchAll();

    $req =  $dbco->prepare('SELECT dateDeNaissance FROM patient WHERE ID_Utilisateur=:ID_Utilisateur');
    $req->execute(['ID_Utilisateur' => $id]);
    $resultat2 = $req->fetchAll();

    $req =  $dbco->prepare('SELECT diagnostic FROM patient WHERE ID_Utilisateur=:ID_Utilisateur');
    $req->execute(['ID_Utilisateur' => $id]);
    $resultat3 = $req->fetch();

    $req =  $dbco->prepare('SELECT compteRendu FROM patient WHERE ID_Utilisateur=:ID_Utilisateur');
    $req->execute(['ID_Utilisateur' => $id]);
    $resultat4 = $req->fetch();

    $resultatArray= array();
    $resultatArray[0]=$resultat;
    $resultatArray[1]=$resultat2;
    $resultatArray[2]=$resultat3;
    $resultatArray[3]=$resultat4;
    return $resultatArray;
}
  catch(PDOException $e){
  echo "Erreur : " . $e->getMessage();
}}


function selectInformationsMyMedecin($idPatient){
    $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req =  $dbco->prepare('SELECT ID_Utilisateur FROM medecin where ID_Medecin=(SELECT ID_Medecin FROM patient WHERE ID_Utilisateur=:ID_Utilisateur)');
    $req->execute(['ID_Utilisateur' => $idPatient]);
    $resultat = $req->fetch();

    if(!empty($resultat)){
    $req =  $dbco->prepare('SELECT nom,prenom,Email,images FROM utilisateur WHERE ID_Utilisateur=:ID_Utilisateur');
    $req->execute(['ID_Utilisateur' => $resultat['ID_Utilisateur']]);
    $resultat2 = $req->fetchAll();
    }else{
      $resultat2=[];
    }
    return $resultat2;
}


function initialisation(){
    try{
      $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
      $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $id=$_SESSION['ID'];
        $req =  $dbco->prepare('SELECT Email,nom,prenom FROM utilisateur WHERE ID_Utilisateur=:ID_Utilisateur');
        $req->execute(['ID_Utilisateur' => $id]);
        $resultat = $req->fetchAll();
        $_SESSION['DataEmail']=$resultat[0][0];
        $_SESSION['DataNom']=$resultat[0][1];
        $_SESSION['DataPrenom']=$resultat[0][2];      
      }    
      catch(PDOException $e){
      echo "Erreur : " . $e->getMessage();
    } 
}


?>