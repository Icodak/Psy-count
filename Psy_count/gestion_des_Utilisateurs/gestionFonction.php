<?php  
session_start();







if(isset($_POST['typeId4'])){

    $_SESSION["gestionModification"]='true';
    $_SESSION["permission"]=$_POST['permission'];
    header('Location:  gestion_des_utilisateurs/gestionDesUtilisateurs.php');

}











?>