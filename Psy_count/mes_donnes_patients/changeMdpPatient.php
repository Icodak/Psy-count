
<?php

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
      header('Location: ../DataPage3.php'); 
    }else{
  
      updatePassword($Password2);
      $_SESSION['messageData']="mot de passe changé";
      header('Location: ../DataPage3.php'); 
    }
  }else{
    $_SESSION['messageData']="votre ancien mot de passe est incorrect";
    header('Location: ../DataPage3.php'); 
  }
}


function SelectPassword($id){
    $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $req =  $dbco->prepare('SELECT motDePasse FROM utilisateur WHERE ID_Utilisateur=:ID_Utilisateur');
    $req->execute(['ID_Utilisateur' => $id]);
    $resultat = $req->fetch();
    return $resultat['motDePasse'];
  }


  function updatePassword($motDePasse){
    $Password = password_hash($motDePasse, PASSWORD_DEFAULT);
    $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $req =  $dbco->prepare(
    "UPDATE utilisateur SET motDePasse=?  WHERE ID_Utilisateur=?");
    $req->execute([$Password,$_SESSION['ID']]);
  }
  





?>