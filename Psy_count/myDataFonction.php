<?php 

$dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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


function changeDataUsers($prenom,$nom,$Email,$motDePasse){
   
  $Password = password_hash($motDePasse, PASSWORD_DEFAULT);
  $req =  $dbco->prepare(
  "UPDATE utilisateur SET nom=?, prenom=? Email=? motDePasse=?  WHERE ID_Utilisateur=?");
  $req->execute([$prenom, $nom,$Email,$Password,$_SESSION['ID']]);
  $req =  $dbco->prepare(
    "UPDATE patient SET dateDeNaissance=? WHERE ID_Utilisateur=?");
  $req->execute([$prenom, $nom,$Email,$Password,$_SESSION['ID']]);


  header('Location: myData.php');

  
}





if(isset($_POST['idtype8']))
{

  $_POST['prenom'];
  $_POST['nom'];
  $_POST['Email'];
  $_POST['motDePasse'];


}

?>