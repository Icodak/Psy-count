

<?php

function modificationUtilisateur($ID)
{
    $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  try{
$req2 =  $dbco->prepare(
  "SELECT nom,prenom,Email,permission_lvl from utilisateur WHERE ID_Utilisateur=:ID_Utilisateur ");
$req2->execute(array(":ID_Utilisateur"=>$ID));
$resultat3 = $req2->fetchAll();
return $resultat3 ;

}catch(PDOException $e){
echo "Erreur : " . $e->getMessage();
}

}




function tableCreation($currentPage){
$dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// On détermine le nombre total d'articles
$sql = "SELECT COUNT(*) AS nb_users FROM utilisateur WHERE permission_lvl!='Admin'";
$res = $dbco->prepare($sql);
$exec = $res->execute();
$resultat = $res->fetch();
$nbUsers = (int) $resultat['nb_users'];
// On détermine le nombre d'articles par page
$parPage = 5;
// On calcule le nombre de pages total
$pages = ceil($nbUsers / $parPage);
// Calcul du 1er article de la page
$premier = ($currentPage * $parPage) - $parPage;

if( !isset( $_SESSION['type']) || $_SESSION['type']!='Admin'){
  header('Location: accueil.php');
}
  try{
              $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
              $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              $req2 =  $dbco->prepare(
                "SELECT ID_Utilisateur,nom,prenom,Email,permission_lvl from utilisateur WHERE permission_lvl!=:permission_lvl LIMIT $premier, $parPage ");
              $req2->execute(array(':permission_lvl' => 'Admin'));
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
