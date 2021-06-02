<?php


if(isset($_POST['ModificationButton'])){

    $_SESSION["hidde"]='true';
    $_SESSION["gestionModification2"]='true';
    $_SESSION["idModification"]=$_POST['ModificationButton'];


}




?>