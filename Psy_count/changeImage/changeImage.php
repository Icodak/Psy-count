<?php

if(isset($_FILES['file']))
{
  $imageSize=$_FILES['file']['size'];
  $imageName=$_FILES['file']['name'];
  $imageTmp=$_FILES['file']['tmp_name'];
  session_start();
  changeImageUsers($imageSize,$imageName,$imageTmp);
}


function changeImageUsers($imageSize,$imageName,$imageTmpName){
    $maxSize=4500000;
    $typeOfFiles=array('jpg','png','jpge');
      if($imageSize<$maxSize){
        $extensionFile=strtolower(substr(strrchr($imageName,'.'),1));
        if(in_array($extensionFile,$typeOfFiles)){
          foreach ($typeOfFiles as $value) {
            unlink("../images_utilisateurs/".$_SESSION['ID'].".".$value);
        }
          $chemin="../images_utilisateurs/".$_SESSION['ID'].".".$extensionFile;
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
  
  
  
  
  
  
  
  
  
  
  
  


  ?>