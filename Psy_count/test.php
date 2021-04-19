<?php
session_start(); 
?>

<?php

try{

$dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$req2 =  $dbco->prepare(
  "SELECT nom from utilisateur WHERE ID_Utilisateurs=4");
$req2->execute();
$resultat3 = $req2->fetch();


} catch(PDOException $e){
echo "Erreur : " . $e->getMessage();
}



$Mavaraible='lien.php';

echo ("<a href='$Mavaraible' class='sommaire_niveau2'>". 'bonjour'. "</a><br/>");
?>





