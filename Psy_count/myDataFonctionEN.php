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

      echo "Error : " . $e->getMessage();
    } 
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

function changeImageUsers($image){
  $maxSize=4500000;
  $typeOfFiles=array('jpg','png','jpge');
    if($image['size']<$maxSize){
      $extensionFile=strtolower(substr(strrchr($image['name'],'.'),1));
      if(in_array($extensionFile,$typeOfFiles)){
        $chemin="images_utilisateurs/".$_SESSION['ID'].".".$extensionFile;
        $test = move_uploaded_file($image['tmp_name'],$chemin);
        if($test){
          $avatar=$_SESSION['ID'].".".$extensionFile;
          $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
          $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
          $req =  $dbco->prepare(
          "UPDATE utilisateur SET images=? WHERE ID_Utilisateur=?");
          $req->execute([$avatar,$_SESSION['ID']]);
        }else{
          $_SESSION['errorImage']="transfer not possible, try again later"; 
      }
    }else{
      $_SESSION['errorImage']="your images must be in the format jpg/png/jpge";   
    }
}else{
  $_SESSION['errorImage']="your images must not be more than 5Mo in size";
}
}




function updatePassword($motDePasse){
  $Password = password_hash($motDePasse, PASSWORD_DEFAULT);
  $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
  $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  $req =  $dbco->prepare(
  "UPDATE utilisateur SET motDePasse=?  WHERE ID_Utilisateur=?");
  $req->execute([$Password,$_SESSION['ID']]);
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
  $image=$_FILES['avatar'];
  session_start();
  changeImageUsers($image);
  changeDataUsers($Prenom,$nom,$Email,$dateDeNaissance);
  header('Location: DataPage2EN.php'); 


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

      $_SESSION['messageData']="your new password must match";
      header('Location: DataPage3EN.php'); 
    }else{
  
      updatePassword($Password2);
      $_SESSION['messageData']="password changed";
      header('Location: DataPage3EN.php'); 
    }
  }else{
    $_SESSION['messageData']="your old password is incorrect";
    header('Location: DataPage3EN.php'); 
  }



  

}




?>