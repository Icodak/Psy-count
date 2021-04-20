<?php  
session_start();

?>

<?php

$dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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


if(isset($_POST['idTable2'])){

    $ID = json_decode($_POST['idTable2']);
    
        try{


            $sql = "INSERT INTO blacklist(ID_utilisateur)
            VALUES('$ID')"; 
            $dbco->exec($sql);

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

if(isset($_POST['typeId7'])){
    $id= $_SESSION["idModification"];
    $req =  $dbco->prepare(
    "UPDATE utilisateur SET nom=?, prenom=?, Email=?, permission_lvl=? WHERE ID_Utilisateur=?");
    $req->execute([$_POST['nom'],$_POST['prenom'],$_POST['Email'],$_POST['permission'],$id]);
    $_SESSION["faqModification2"]='false';
    header('Location: gestionDesUtilisateurs.php');

}



if(isset($_POST['Ajouter'])){

    $_SESSION["gestionModification"]='true';
    header('Location: gestionDesUtilisateurs.php');
    

}


if(isset($_POST['ModificationButton'])){

    $_SESSION["hidde"]='true';
    $_SESSION["gestionModification2"]='true';
    $_SESSION["idModification"]=$_POST['ModificationButton'];

}





if(isset($_POST['typeId5'])){

    $permission=$_SESSION["permission"];

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


        try{

            $sql = "INSERT INTO administrateur(ID_Utilisateur)
            VALUES((SELECT ID_Utilisateur from utilisateur where Email='$Email'))"; 
            $dbco->exec($sql);

        }catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }


    }
    if(isset($_SESSION["permission"])&&$_SESSION["permission"]=='Medecin'){

        try{

            $sql = "INSERT INTO administrateur(ID_Utilisateur)
            VALUES((SELECT ID_Utilisateur from utilisateur where Email='$Email'))"; 
            $dbco->exec($sql);

        }catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }


    }
    
}



?>