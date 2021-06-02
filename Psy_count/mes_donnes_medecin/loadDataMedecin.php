<?php

$dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




function selectInformationsMedecin(){
  try{
    $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $id=$_SESSION['ID'];

    $req =  $dbco->prepare('SELECT nom,prenom,Email,images,motDePasse FROM utilisateur WHERE ID_Utilisateur=:ID_Utilisateur');
    $req->execute(['ID_Utilisateur' => $id]);
    $resultat = $req->fetchAll();

    $req =  $dbco->prepare('SELECT codePostalCabinet,specialite,telephonePortable FROM medecin WHERE ID_Utilisateur=:ID_Utilisateur');
    $req->execute(['ID_Utilisateur' => $id]);
    $resultat2 = $req->fetchAll();

    $resultatArray= array();
    $resultatArray[0]=$resultat;
    $resultatArray[1]=$resultat2;
    return $resultatArray;
}
  catch(PDOException $e){
  echo "Erreur : " . $e->getMessage();
}}

?>