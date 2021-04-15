<?php  
session_start();

?>

<?php
if(isset($_POST['Ajouter']))
{
    $_SESSION["hidde"]='true' ;
    header('Location: gestionDesUtilisateurs.php');

}

?>


<?php

if(isset($_POST['idTable'])){

    $ID = json_decode($_POST['idTable']);
    
        try{

            $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
            $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "DELETE FROM utilisateur WHERE ID_Utilisateur=:ID_Utilisateur"; 
            $res = $dbco->prepare($sql);
            $exec = $res->execute(array(":ID_Utilisateur"=>$ID));
           
            $sql = "DELETE FROM Medecin,patient,administrateur WHERE ID_Utilisateur=:ID_Utilisateur"; 
            $res = $dbco->prepare($sql);
            $exec = $res->execute(array(":ID_Utilisateur"=>$ID));

        }catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }

}

if(isset($_POST['typeId4'])){

    $_SESSION["gestionModification"]='true';
    $_SESSION["permission"]=$_POST['permission'];
    header('Location: gestionDesUtilisateurs.php');

}

if(isset($_POST['typeId6'])){

    $_SESSION["gestionModification"]='false';
    $_SESSION["hidde"]='false';

    header('Location: gestionDesUtilisateurs.php');

}

if(isset($_POST['Ajouter'])){

    $_SESSION["gestionModification"]='true';
    header('Location: gestionDesUtilisateurs.php');
    

}



?>