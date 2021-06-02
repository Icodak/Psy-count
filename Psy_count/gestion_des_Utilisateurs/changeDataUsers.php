<?php

if(isset($_POST['typeId7'])){
    $id= $_SESSION["idModification"];
    $req =  $dbco->prepare(
    "UPDATE utilisateur SET nom=?, prenom=?, Email=?, permission_lvl=? WHERE ID_Utilisateur=?");
    $req->execute([$_POST['nom'],$_POST['prenom'],$_POST['Email'],$_POST['permission'],$id]);
    $_SESSION["faqModification2"]='false';
    header('Location: gestion_des_utilisateurs/gestionDesUtilisateurs.php');

}


if(isset($_POST['typeId6'])){

    $_SESSION["gestionModification"]='false';
    $_SESSION["gestionModification2"]='false';
    $_SESSION["hidde"]='false';

    header('Location:  gestion_des_utilisateurs/gestionDesUtilisateurs.php');

}


?>