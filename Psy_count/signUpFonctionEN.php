<?php
session_start(); // On démarre la session AVANT toute chose


   // Vérifier si le formulaire est soumis 
   if ( isset( $_POST['submit'] ) ) {
     /* récupérer les données du formulaire en utilisant 
        la valeur des attributs name comme clé 
       */

     $FirstName = $_POST['FirstName']; 
     $LastName = $_POST['LastName']; 
     $Email = $_POST['Email'];
     $Password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
     $Password_verify = $_POST['password_verify'];
     $type=$_POST['type'];

     if($_POST['type']=='patient'){
        $dateOfBirth=$_POST['dateDeNaissance'];
     }else{
        $PostalCode=$_POST['codePostal'];
        $PhoneNumber=$_POST['telephone']; 
        $speciality=$_POST['specialite']; 
     }
     

     if( password_verify($Password_verify, $Password)){
      if(filter_var($Email, FILTER_VALIDATE_EMAIL)){
        
            $_SESSION['message']='';  

            try{
                $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                $req =  $dbco->prepare('SELECT Email FROM utilisateur');
                $req->execute();
                $resultat = $req->fetchAll();

                $allEmail = array(count($resultat));
                for ($i = 0; $i <= count($resultat)-1; $i++) {
                $allEmail[$i]= $resultat[$i][0];
                }
               
                if(in_array("$Email", $allEmail)){
                  $_SESSION['message']='email address already used for another account';
                  header('Location: signUpEN.php');
                }
                else{
                  if($_POST['type']=='patient'){

                $sql = "INSERT INTO utilisateur(motDePasse,nom,prenom,Email,permission_lvl)
                        VALUES('$Password','$LastName','$FirstName','$Email','$type')"; 
                $dbco->exec($sql);

                $sql = "INSERT INTO patient(dateDeNaissance,ID_Utilisateur)
                        VALUES('$dateOfBirth',(SELECT ID_Utilisateur from utilisateur where Email='$Email'))"; 
                $dbco->exec($sql);

              }else{
                $sql = "INSERT INTO utilisateur(motDePasse,nom,prenom,Email,permission_lvl)
                        VALUES('$Password','$LastName','$FirstName','$Email','$type')"; 
                $dbco->exec($sql);


                $sql = "INSERT INTO Medecin(codePostalCabinet,specialite,telephonePortable,ID_Utilisateur)
                        VALUES('$PostalCode','$speciality','$PhoneNumber',(SELECT ID_Utilisateur from utilisateur where Email='$Email'))"; 
                $dbco->exec($sql);

              }
                echo "Transfert vers la base de données";
                }
              }

                catch(PDOException $e){

              echo "Error : " . $e->getMessage();
            }    
    }
      else{
        $_SESSION['message']='invalid email address';
        header('Location: signUpEN.php');
      }
    }else{
      $_SESSION['message']='your password must match';
      header('Location: signUpEN.php');
    }

  }
?>