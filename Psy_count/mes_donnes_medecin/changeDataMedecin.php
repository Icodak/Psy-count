





<?php
if(isset($_POST['dataPageChangeMedecin']))
{
  $Email=$_POST['Email'];
  $Prenom=$_POST['Prenom'];
  $nom=$_POST['nom'];
  $telephone=$_POST['telephone'];
  $codePostal=$_POST['codePostal'];
  $specialite=$_POST['specialite'];

  
  session_start();
  changeDataMedecin($Prenom,$nom,$Email,$specialite,$telephone,$codePostal);
  header('Location: ../myDataDoctor.php');
  
}




function changeDataMedecin($prenom,$nom,$Email,$specialite,$telephone,$codePostal)
{
  $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
  $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

  $req =  $dbco->prepare(
  "UPDATE utilisateur SET nom=?, prenom=?, Email=? WHERE ID_Utilisateur=?");
  $req->execute([$nom,$prenom,$Email,$_SESSION['ID']]);

  $req =  $dbco->prepare(
    "UPDATE medecin SET codePostalCabinet=?,specialite=?,telephonePortable=? WHERE ID_Utilisateur=?");
  $req->execute([$codePostal,$specialite,$telephone,$_SESSION['ID']]);

}

?>