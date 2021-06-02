<?php


if(isset($_POST['typeId6'])){

    $_SESSION["gestionModification"]='false';
    $_SESSION["gestionModification2"]='false';
    $_SESSION["hidde"]='false';

    header('Location: gestionDesUtilisateurs.php');

}


if(isset($_POST['typeId5'])){

    $permission=$_SESSION["permission"];
    $Password=password_hash($_POST['motDePasse'], PASSWORD_DEFAULT);
    $LastName=$_POST['nom'];
    $FirstName=$_POST['prenom'];
    $Email=$_POST['Email'];

    try{
    $sql = "INSERT INTO utilisateur(motDePasse,nom,prenom,Email,permission_lvl)
    VALUES('$Password','$LastName','$FirstName','$Email','$permission')"; 
    $dbco->exec($sql);

    }catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }

    if(isset($_SESSION["permission"])&&$_SESSION["permission"]=='Admin'){


        try{

            $sql = "INSERT INTO administrateur(ID_Utilisateur)
            VALUES((SELECT ID_Utilisateur from utilisateur where Email='$Email'))"; 
            $dbco->exec($sql);

        }catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }


    }

    if(isset($_SESSION["permission"])&&$_SESSION["permission"]=='patient'){
        $dateDeNaissance=$_POST['dateDeNaissance'];
        try{

            $sql = "INSERT INTO patient(ID_Utilisateur,dateDeNaissance)
            VALUES((SELECT ID_Utilisateur from utilisateur where Email='$Email'),$dateDeNaissance)"; 
            $dbco->exec($sql);

        }catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }


    }
    if(isset($_SESSION["permission"])&&$_SESSION["permission"]=='Medecin'){
        $codePostalCabinet=$_POST['codePostalCabinet'];
        $specialite=$_POST['specialite'];

        try{

            $sql = "INSERT INTO medecin(ID_Utilisateur,codePostalCabinet,specialite)
            VALUES((SELECT ID_Utilisateur from utilisateur where Email='$Email'),$codePostalCabinet, $specialite)"; 
            $dbco->exec($sql);

        }catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }


    }
    header('Location: gestion_des_utilisateur/gestionDesUtilisateurs.php');
    
}












?>