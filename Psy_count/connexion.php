<?php 
session_start(); 
//  Récupération de l'utilisateur et de son pass hashé

if ( isset( $_POST['submit'] ) ) {
  $Email = $_POST['Email'];
  $Password = $_POST['Password'];
try{
      $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
      //PDO = requête préparé

      $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $req =  $dbco->prepare(
      'SELECT motDePasse FROM utilisateur where Email=:Email'
      );

      $req->execute(array('Email' => $Email));

      $resultat = $req->fetch();

      $isPasswordCorrect = password_verify($Password, $resultat['motDePasse']);
      //vérifier si le mdp est dans la database

      $req2 =  $dbco->prepare(
      'SELECT permission_lvl FROM utilisateur where Email=:Email');

      $req2->execute(array('Email' => $Email));
      //récupérer valeur dans variable, autre méthode avec des ? possible

      $resultat3 = $req2->fetch();
     //requête sql, resultat est un tableau associatif
     //pour plusieurs sorties/résultats, faire un fetch all
      $req3 =  $dbco->prepare(
      'SELECT ID_Utilisateur FROM utilisateur where Email=:Email ');
      //Je veux Selectionner l'ID_USer de l'User où la valeur est l'Email

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
        //indique si c'est Admin/User/Médecin
        $_SESSION['connexion']='1';
        $_SESSION['ID']=$resultat2['ID'];
        //récupère l'id utilisateur, la clé primaire différente pour tout le monde
        //permet de récupérer les infos d'un user selon son id (nom, prénom...)
        header('Location: accueil.php');
        //redirection/permet de relier les pages
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
