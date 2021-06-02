<?php

if(isset($_FILES['file'])){
    session_start();
    $imageSize=$_FILES['file']['size'];
    $imageName=$_FILES['file']['name'];
    $imageTmp=$_FILES['file']['tmp_name'];
    addPdfReport($imageSize,$imageName,$imageTmp);
  }

  
function addPdfReport($imageSize,$imageName,$imageTmpName){
    $maxSize=4500000;
    $typeOfFiles=array('pdf');
      if($imageSize<$maxSize){
        $extensionFile=strtolower(substr(strrchr($imageName,'.'),1));
        if(in_array($extensionFile,$typeOfFiles)){
          foreach ($typeOfFiles as $value) {
            unlink("../pdf_utilisateurs/".$_SESSION['addUser'].".".$value);
        }
          $chemin="../pdf_utilisateurs/".$_SESSION['addUser'].".".$extensionFile;
          $test = move_uploaded_file($imageTmpName,$chemin);
          if($test){ 
            try{      
            $avatar=$_SESSION['addUser'].".".$extensionFile;
            $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
            $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            $req =  $dbco->prepare("UPDATE patient SET compteRendu=? WHERE ID_Utilisateur=?");
            $req->execute([$avatar,$_SESSION['addUser']]);
            }catch(Exception $e){
              echo $e;
            }
          }else{
            echo"transfert impossible, retentez ultérieument"; 
        }
      }else{
        echo"votre images doit étre au format jpg/png/jpge";   
      }
  }else{
    echo"votre images ne doit pas avoir une taille de plus de 5Mo";
  }
  }

?>