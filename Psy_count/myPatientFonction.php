


<?php





function initialisationPatient($id){
  try{
    $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $req =  $dbco->prepare('SELECT Email,nom,prenom,images FROM utilisateur WHERE ID_Utilisateur=:ID_Utilisateur');
      $req->execute(['ID_Utilisateur' => $id]);
      $resultat = $req->fetchAll();
      $information=array();
      $information[0]=$resultat[0][0];
      $information[1]=$resultat[0][1];
      $information[2]=$resultat[0][2];
      $information[3]=$resultat[0][3];
      return $information;
    }    
    catch(PDOException $e){
   echo "Erreur : " . $e->getMessage();
  } 
}


function SelectPatientText($id)
{
  try{
    $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req2 =  $dbco->prepare(
      "SELECT diagnostic FROM patient WHERE ID_Utilisateur=?");
    $req2->execute(array($id));
    $resultat = $req2->fetch();
    return $resultat;

    }catch(PDOException $e){
      echo "Erreur : " . $e->getMessage();
    
  }
}

function updatePatientText($id,$text){
  try{
  $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
  $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $req2 =  $dbco->prepare(
    "UPDATE patient SET diagnostic=? WHERE ID_Utilisateur=?");
  $req2->execute(array($text,$id));
  }catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
  }
}

function addPatient($idUtilisateur_ofMedecin,$idUtilsiateur)
{
  try{
    $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req1 = $dbco->prepare("SELECT ID_Medecin FROM medecin WHERE ID_Utilisateur='$idUtilisateur_ofMedecin'");
    $req1->execute();
    $resultat = $req1->fetch();
    $req2 =  $dbco->prepare(
      "UPDATE patient SET ID_Medecin=? WHERE ID_Utilisateur=?");
    $req2->execute(array($resultat['ID_Medecin'],$idUtilsiateur));
  }
  catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
  
}
}


function tableCreationPatient($currentPage){
$dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// On détermine le nombre total d'articles
$sql = "SELECT COUNT(*) AS nb_users FROM patient WHERE ID_Medecin='0'";
$res = $dbco->prepare($sql);
$res->execute();
$resultat = $res->fetch();
$nbUsers = (int) $resultat['nb_users'];
// On détermine le nombre d'articles par page
$parPage = 5;
// On calcule le nombre de pages total
$pages = ceil($nbUsers / $parPage);
// Calcul du 1er article de la page
$premier = ($currentPage * $parPage) - $parPage;
  try{
              $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
              $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $req2 =  $dbco->prepare(
                "SELECT nom,prenom,Email,ID_Utilisateur from utilisateur WHERE ID_Utilisateur IN (SELECT ID_Utilisateur from patient WHERE ID_Medecin='0')  LIMIT $premier, $parPage ");
              $req2->execute();
              $resultat3 = $req2->fetchAll();
              $Resultat=array();
              $Resultat[0]=$resultat3;
              $Resultat[1]=$pages;
              return $Resultat;

      } catch(PDOException $e){
     echo "Erreur : " . $e->getMessage();
      }
}


function suppPatient($idPatient){
  $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
  $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $req2 =  $dbco->prepare( "UPDATE patient SET ID_Medecin='NULL' WHERE ID_Utilisateur='$idPatient'");
  $req2->execute();

}



function tableCreationMesPatient($currentPage){
    $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // On détermine le nombre total d'articles


    $req2 =  $dbco->prepare( 'SELECT ID_Medecin FROM medecin WHERE ID_Utilisateur=?');
    $req2->execute(array($_SESSION['ID']));
    $Id_Medecin = $req2->fetch();

    $req2 =  $dbco->prepare( 'SELECT COUNT(*) AS nb_users FROM patient WHERE ID_Medecin=?');
    $req2->execute(array($Id_Medecin['ID_Medecin']));
    $resultat = $req2->fetch();

    
    $nbUsers = (int) $resultat['nb_users'];
    // On détermine le nombre d'articles par page
    $parPage = 5;
    // On calcule le nombre de pages total
    $pages = ceil($nbUsers / $parPage);
    // Calcul du 1er article de la page


    $premier = ($currentPage * $parPage) - $parPage;   


    try{ 
                  $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
                  $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                  $req2 =  $dbco->prepare(
                    "SELECT nom,prenom,Email,ID_Utilisateur from utilisateur WHERE ID_Utilisateur IN (SELECT ID_Utilisateur FROM patient WHERE ID_Medecin=:ID_Medecin) LIMIT $premier,$parPage ");
                  $req2->execute(array(':ID_Medecin' => $Id_Medecin['ID_Medecin']));
                  $resultat3 = $req2->fetchAll();
                  $Resultat=array();
                  $Resultat[0]=$resultat3;
                  $Resultat[1]=$pages;
                  return $Resultat;


    
    } catch(PDOException $e){
         echo "Erreur : " . $e->getMessage();
    }
}



function addPdfReport($imageSize,$imageName,$imageTmpName){
  $maxSize=4500000;
  $typeOfFiles=array('pdf');
    if($imageSize<$maxSize){
      $extensionFile=strtolower(substr(strrchr($imageName,'.'),1));
      if(in_array($extensionFile,$typeOfFiles)){
        foreach ($typeOfFiles as $value) {
          unlink("pdf_utilisateurs/".$_SESSION['ID'].".".$value);
      }
        $chemin="pdf_utilisateurs/".$_SESSION['ID'].".".$extensionFile;
        $test = move_uploaded_file($imageTmpName,$chemin);
        if($test){       
          $avatar=$_SESSION['ID'].".".$extensionFile;
          $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
          $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
          $req =  $dbco->prepare(
          "UPDATE utilisateur SET images=? WHERE ID_Utilisateur=?");
          $req->execute([$avatar,$_SESSION['ID']]);
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





if(isset($_POST['choice'])){
  session_start();
  $_SESSION['showTable']=$_POST['choice'];
}

if(isset($_POST['supp'])){
  session_start();
  suppPatient($_POST['supp']);
}

if(isset($_POST['Add1'])){
  session_start();
  addPatient($_SESSION['ID'],$_POST['Add1']);
}
   
if(isset($_POST['patientText'])){
  session_start();
  updatePatientText($_SESSION['addUser'],$_POST['patientText']);
}

if(isset($_POST['patientText'])){
  updatePatientText($_SESSION['addUser'],$_POST['patientText']);
}

if(isset($_FILES['file'])){
  session_start();
  $imageSize=$_FILES['file']['size'];
  $imageName=$_FILES['file']['name'];
  $imageTmp=$_FILES['file']['tmp_name'];
  addPdfReport($imageSize,$imageName,$imageTmp);
}
?>