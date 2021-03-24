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


     if( password_verify($Password_verify, $Password)){
      if(filter_var($Email, FILTER_VALIDATE_EMAIL)){
        
            $_SESSION['message']='';  

            try{
                $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'user','root');
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                $req =  $dbco->prepare('SELECT Email FROM users');
                $req->execute();
                $resultat = $req->fetchAll();

                $allEmail = array(count($resultat));
                for ($i = 0; $i <= count($resultat)-1; $i++) {
                $allEmail[$i]= $resultat[$i][0];
                }
               
                if(in_array("$Email", $allEmail)){
                  $_SESSION['message']='adresse mail deja utilisé pour un autre compte';
                  header('Location: signUp.php');
                }
                else{

                $sql = "INSERT INTO users(motDePasse,nom,prenom,Email,type)
                        VALUES('$Password','$LastName','$FirstName','$Email','$type')"; 
                $dbco->exec($sql);
                echo "Transfert vers la base de données";
                }
              }

                catch(PDOException $e){

              echo "Erreur : " . $e->getMessage();
            }    
    }
      else{
        $_SESSION['message']='adresse mail invalide';
        header('Location: signUp.php');
      }
    }else{
      $_SESSION['message']='vos mot de passe doivent correspondre';
      header('Location: signUp.php');
    }

  }
?>