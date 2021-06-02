<?php
if(isset($_POST['dataPageChange']))
{

  $dateDeNaissance=$_POST['dateDeNaissance'];
  $Email=$_POST['Email'];
  $Prenom=$_POST['Prenom'];
  $nom=$_POST['nom'];

  session_start();
  changeDataUsers($Prenom,$nom,$Email,$dateDeNaissance);
  header('Location: ../DataPage2.php');

}





function changeDataUsers($prenom,$nom,$Email,$dateDeNaissance){
  $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
  $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  $req =  $dbco->prepare(
  "UPDATE utilisateur SET nom=?, prenom=?, Email=? WHERE ID_Utilisateur=?");
  $req->execute([$nom,$prenom,$Email,$_SESSION['ID']]);
  $req =  $dbco->prepare(
    "UPDATE patient SET dateDeNaissance=? WHERE ID_Utilisateur=?");
  $req->execute([$dateDeNaissance,$_SESSION['ID']]);
}

?>