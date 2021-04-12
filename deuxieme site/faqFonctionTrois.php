<?php  
session_start();

if(isset($_POST['idval2']))
{

      $_SESSION["faqModification"]='true';
      $_SESSION["faqID"]=$_POST['typeId2'];
      header('Location: faq.php');
}

if(isset($_POST['idval3']))
{

      $question=$_POST['question'];
      $reponse=$_POST['reponse'];
      $id=$_POST['typeId3'];

      try{

                $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $req =  $dbco->prepare(
                  'SELECT question,reponse from faq');
                $req->execute();
                $resultat2 = $req->fetchAll();

                $req =  $dbco->prepare(
                  'SELECT ID_faq from faq WHERE question=? AND reponse=?');
                $req->execute(array($resultat2[ $id][0],$resultat2[ $id][1]));
                $resultat3 = $req->fetchAll();


                $req =  $dbco->prepare(
                  "UPDATE faq SET question=?, reponse=? WHERE ID_faq=?");
                $req->execute([$question, $reponse, $resultat3[0][0]]);
                $_SESSION["faqModification"]='false';
                header('Location: faq.php');



        }catch(PDOException $e){
          echo "Erreur : " . $e->getMessage();
      }


      




}





?>