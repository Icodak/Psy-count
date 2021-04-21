<?php 
session_start(); 
//  Récupération de l'utilisateur et de son pass hashé

if ( isset( $_POST['submit'] ) ) {
  $Email = $_POST['Email'];
  $Password = $_POST['Password'];
try{
      $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');

      $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $req =  $dbco->prepare(
      'SELECT motDePasse FROM utilisateur where Email=:Email'
      );

      $req->execute(array('Email' => $Email));

      $resultat = $req->fetch();


      

      $isPasswordCorrect = password_verify($Password, $resultat['motDePasse']);






      $req2 =  $dbco->prepare(
      'SELECT permission_lvl FROM utilisateur where Email=:Email');

      $req2->execute(array('Email' => $Email));

      $resultat3 = $req2->fetch();




      $req3 =  $dbco->prepare(
      'SELECT ID_Utilisateur FROM utilisateur where Email=:Email ');

      $req3->execute(array('Email' => $Email));

      $resultat2 = $req3->fetch();

      if (!$resultat)
      {
         $_SESSION['message2']='identifiant ou mot de passe incorrect!';
         header('Location: signIn.php');

      }
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
