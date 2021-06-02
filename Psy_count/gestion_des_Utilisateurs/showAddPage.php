
<?php

if(isset($_POST['Ajouter']))
{
    $_SESSION["hidde"]='true' ;
    header('Location:  gestion_des_utilisateurs/gestionDesUtilisateurs.php');

}

?>