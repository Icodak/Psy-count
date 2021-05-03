<?php 
session_start(); 



if ( isset( $_POST['submit'] ) ) {
  //  Récupération de l'utilisateur et de son pass hashé
  $Email = $_POST['Email'];
  $Password = $_POST['Password'];


try{
      //  connexion à la base de donnée
      $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','root');
      $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      //  récuperer le mot de passe de l'utilisateur
      $req =  $dbco->prepare(
      'SELECT motDePasse FROM utilisateur where Email=:Email'
      );
      $req->execute(array('Email' => $Email));
      $resultat = $req->fetch();

       //  récuperer la permission de l'utilisateur de l'utilisateur
      $req2 =  $dbco->prepare(
        'SELECT permission_lvl FROM utilisateur where Email=:Email');
        $req2->execute(array('Email' => $Email));
        $resultat3 = $req2->fetch();

      //  vérifier si le mot de passe est correct
      $isPasswordCorrect = password_verify($Password, $resultat['motDePasse']);

      //  selectionner l'id de l'utilisateur
      $req3 =  $dbco->prepare(
      'SELECT ID_Utilisateur FROM utilisateur where Email=:Email ');
      $req3->execute(array('Email' => $Email));
      $resultat2 = $req3->fetch();

      //  vérifier s'il existe un mot de passe pour l'adresse mail donné
      if (!$resultat)
      {
         $_SESSION['message2']='identifiant ou mot de passe incorrect!';
         header('Location: signIn.php');

      }
      //  si le mot de passe est correct récupérer les informations de l'utilisateur
      else
      {
      if ($isPasswordCorrect) {
        $_SESSION['type']=$resultat3['permission_lvl'];
        $_SESSION['connexion']='1';
        $_SESSION['ID']=$resultat2['ID_Utilisateur'];
        header('Location: accueil.php');
      }
      else {
        $_SESSION['message2']= 'mot de passe ou Email incorrect';
        header('Location: signIn.php');
      }
      }
      }
        catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
      }  
      }  


?>
