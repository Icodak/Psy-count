
<?php


function tableCreationResearchPatient($currentPage,$searchTable)
{
// On détermine le nombre total d'elements

$nbUsers = count($searchTable);
// On détermine le nombre d'elements par page
$parPage = 4;
// On calcule le nombre de pages total
$pages = ceil($nbUsers / $parPage);
// Calcul du 1er element de la page
$premier = ($currentPage * $parPage) - $parPage;
$resultTable=array();
for ($i =$premier ; $i <= $parPage; $i++) {
  if(isset($searchTable[$i])){
  $resultTable[$i]=$searchTable[$i];
  }
}
$Resultat=array();
$Resultat[0]=$resultTable;
$Resultat[1]=$pages;
return $Resultat;

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
$parPage = 4;
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
    $parPage = 4;
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












?>