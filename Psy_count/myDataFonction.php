<?php 

$dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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
} 
}


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
} 

}


function selectInformationsMyMedecin($idPatient){
  $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
  $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $req =  $dbco->prepare('SELECT id_Utilisateur FROM medecin where ID_Medecin=(SELECT ID_Medecin FROM patient WHERE ID_Utilisateur=:ID_Utilisateur)');
  $req->execute(['ID_Utilisateur' => $idPatient]);
  $resultat = $req->fetch();

  $req =  $dbco->prepare('SELECT nom,prenom,Email,images FROM utilisateur WHERE ID_Utilisateur=:ID_Utilisateur');
  $req->execute(['ID_Utilisateur' => $resultat['id_Utilisateur']]);
  $resultat2 = $req->fetchAll();
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

  echo $specialite;
  echo $telephone;
  echo $codePostal;

}



function changeImageUsers($imageSize,$imageName,$imageTmpName){
  $maxSize=4500000;
  $typeOfFiles=array('jpg','png','jpge');
    if($imageSize<$maxSize){
      $extensionFile=strtolower(substr(strrchr($imageName,'.'),1));
      if(in_array($extensionFile,$typeOfFiles)){
        foreach ($typeOfFiles as $value) {
          unlink("images_utilisateurs/".$_SESSION['ID'].".".$value);
      }
        $chemin="images_utilisateurs/".$_SESSION['ID'].".".$extensionFile;
        $test = move_uploaded_file($imageTmpName,$chemin);
        if($test){       
          $avatar=$_SESSION['ID'].".".$extensionFile;
          $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
          $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
          $req =  $dbco->prepare(
          "UPDATE utilisateur SET images=? WHERE ID_Utilisateur=?");
          $req->execute([$avatar,$_SESSION['ID']]);
        }else{
          $_SESSION['errorImage']="transfert impossible, retentez ultérieument"; 
      }
    }else{
      $_SESSION['errorImage']="votre images doit étre au format jpg/png/jpge";   
    }
}else{
  $_SESSION['errorImage']="votre images ne doit pas avoir une taille de plus de 5Mo";
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

  session_start();
  changeDataUsers($Prenom,$nom,$Email,$dateDeNaissance);
  header('Location: DataPage2.php');

}


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
}



if(isset($_FILES['file']))
{
  $imageSize=$_FILES['file']['size'];
  $imageName=$_FILES['file']['name'];
  $imageTmp=$_FILES['file']['tmp_name'];
  session_start();
  changeImageUsers($imageSize,$imageName,$imageTmp);
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