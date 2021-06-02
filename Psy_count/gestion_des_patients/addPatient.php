
<?php

if(isset($_POST['Add1'])){
  session_start();
  addPatient($_SESSION['ID'],$_POST['Add1']);
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




?>


