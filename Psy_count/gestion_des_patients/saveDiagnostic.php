
<?php


if(isset($_POST['patientText'])){
    session_start();
  updatePatientText($_SESSION['addUser'],$_POST['patientText']);
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
  

?>

