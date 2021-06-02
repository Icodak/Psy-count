
<?php

if(isset($_POST['Ajouter'])){
    $_SESSION["gestionModification"]='true';
    header('Location: gestion_des_utilisateurs/gestionDesUtilisateurs.php');
}

?>