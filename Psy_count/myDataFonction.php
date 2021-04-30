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


function changeDataUsers($prenom,$nom,$Email,$dateDeNaissance){
  session_start();

  $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
  $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  $req =  $dbco->prepare(
  "UPDATE utilisateur SET nom=?, prenom=?, Email=? WHERE ID_Utilisateur=?");
  $req->execute([$nom,$prenom,$Email,$_SESSION['ID']]);
  $req =  $dbco->prepare(
    "UPDATE patient SET dateDeNaissance=? WHERE ID_Utilisateur=?");
  $req->execute([$dateDeNaissance,$_SESSION['ID']]);
  header('Location: DataPage2.php');  
}


function updatePassword($motDePasse){
  $Password = password_hash($motDePasse, PASSWORD_DEFAULT);
  $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
  $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  $req =  $dbco->prepare(
  "UPDATE utilisateur SET motDePasse=?  WHERE ID_Utilisateur=?");
  $req->execute([$Password,$_SESSION['ID']]);
  header('Location: myDataPage2.php');  
}

function SelectPassword($id){
  $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
  $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  $req =  $dbco->prepare('SELECT motDePasse FROM utilisateur WHERE ID_Utilisateur=:ID_Utilisateur');
  $req->execute(['ID_Utilisateur' => $id]);
  $resultat = $req->fetch();
  return $resultat['motDePasse'];
}


if(isset($_POST['dataPageChange']))
{

  $dateDeNaissance=$_POST['dateDeNaissance'];
  $Email=$_POST['Email'];
  $Prenom=$_POST['Prenom'];
  $nom=$_POST['nom'];
  changeDataUsers($Prenom,$nom,$Email,$dateDeNaissance);

}

if(isset($_POST['dataPageChange2']))
{

  $Password1=$_POST['mdp'];
  $Password2=$_POST['newmdp'];
  $Password3=$_POST['newmdpverif'];
  session_start();
  $PasswordTest=SelectPassword($_SESSION['ID']);
  $isPasswordCorrect = password_verify($Password1,$PasswordTest);


  if($isPasswordCorrect){
    if($Password2!=$Password3){

      $_SESSION['messageData']="vos nouveaux mot de passe doivent correspondre";
      header('Location: DataPage3.php'); 
    }else{
  
      updatePassword($Password2);
      $_SESSION['messageData']="mot de passe changé";
      header('Location: DataPage3.php'); 
    }
  }else{
    $_SESSION['messageData']="votre ancien mot de passe est incorrect";
    header('Location: DataPage3.php'); 
  }



  

}




?>