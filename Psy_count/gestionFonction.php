<?php  
session_start();

if(isset($_POST["typeId2"]))
{

      $id=$_POST['typeId2'];
      echo $id;

      try{
                $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "DELETE FROM utilisateur WHERE ID_Utilisateur=:ID_Utilisateur"; 
                $res = $dbco->prepare($sql);
                $exec = $res->execute(array(":ID_Utilisateur"=>$id));
                header('Location: gestionDesUtilisateurs.php');


      }
      catch(PDOException $e){
          echo "Erreur : " . $e->getMessage();
      }


}



if(isset($_POST["typeId3"]))
{

    $_SESSION["gestionModification1"]='true';
    header('Location:gestionDesUtilisateurs.php');


    
}




if(isset($_POST["typeId4"]))
{
    $_SESSION["permission"]=$_POST['permission'];
    $_SESSION["gestionModification"]='true';
    header('Location:gestionDesUtilisateurs.php');
    
}


if(isset($_POST["typeId5"]))
{



if($_SESSION["permission"]=='Admin'){

    $_SESSION["gestionModification"]='false';
    $_SESSION["gestionModification1"]='false';
    $motDePasse= $Password = password_hash($_POST['motDePasse'], PASSWORD_DEFAULT);
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $Email=$_POST['Email'];
    $type=$_SESSION["permission"];



    try{
        $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO utilisateur(motDePasse,nom,prenom,Email,permission_lvl)
                        VALUES('$motDePasse','$nom','$prenom','$Email','$type')"; 
        $dbco->exec($sql);

        $sql = "INSERT INTO administrateur(ID_Utilisateur)
                        VALUES((SELECT ID_Utilisateur from utilisateur where Email='$Email'))"; 
        $dbco->exec($sql);
        header('Location:gestionDesUtilisateurs.php');


    }catch(PDOException $e){

              echo "Erreur : " . $e->getMessage();
    }


}elseif($_SESSION["permission"]=='Medecin') {

    $_SESSION["gestionModification"]='false';
    $_SESSION["gestionModification1"]='false';
    $motDePasse= $Password = password_hash($_POST['motDePasse'], PASSWORD_DEFAULT);
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $Email=$_POST['Email'];
    $type=$_SESSION["permission"];
    $codePostalCabinet=$_POST["codePostalCabinet"];
    $specialite=$_POST["specialite"];


     try{
        $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO utilisateur(motDePasse,nom,prenom,Email,permission_lvl)
                        VALUES('$motDePasse','$nom','$prenom','$Email','$type')"; 
        $dbco->exec($sql);

        $sql = "INSERT INTO medecin(codePostalCabinet,specialite,ID_Utilisateur)
                        VALUES('$codePostalCabinet','$specialite',(SELECT ID_Utilisateur from utilisateur where Email='$Email'))"; 
        $dbco->exec($sql);
        header('Location:gestionDesUtilisateurs.php');


    }catch(PDOException $e){

              echo "Erreur : " . $e->getMessage();
    }
      
      
    } elseif($_SESSION["permission"]=='patient') {
    $_SESSION["gestionModification"]='false';
    $_SESSION["gestionModification1"]='false';
    $motDePasse= $Password = password_hash($_POST['motDePasse'], PASSWORD_DEFAULT);
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $Email=$_POST['Email'];
    $type=$_SESSION["permission"];
    $dateDeNaissance=$_POST["dateDeNaissance"];


     try{
        $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO utilisateur(motDePasse,nom,prenom,Email,permission_lvl)
                        VALUES('$motDePasse','$nom','$prenom','$Email','$type')"; 
        $dbco->exec($sql);

        $sql = "INSERT INTO patient(dateDeNaissance,ID_Utilisateur)
                        VALUES('$dateDeNaissance',(SELECT ID_Utilisateur from utilisateur where Email='$Email'))"; 
        $dbco->exec($sql);
        header('Location:gestionDesUtilisateurs.php');


    }catch(PDOException $e){

              echo "Erreur : " . $e->getMessage();
    }
      
      
    } 

    

}


if(isset($_POST["typeId6"]))
{
    $_SESSION["gestionModification"]='false';
    $_SESSION["gestionModification1"]='false';
    header('Location:gestionDesUtilisateurs.php');



    }


?>