
<?php  
session_start();
//permet de supprimer
if(isset($_POST['idval']))
{

      $id=$_POST['typeId'];


      try{
                $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $req2 =  $dbco->prepare(
                  'SELECT question,reponse FROM faq');
                $req2->execute();
                $resultat3 = $req2->fetchAll();


                $req3 =  $dbco->prepare(
                'DELETE FROM faq WHERE question=:question ');

                $req3->execute(array(':question' => $resultat3[$id][0]));
                header('Location: faq.php');


      }
      catch(PDOException $e){
          echo "Erreur : " . $e->getMessage();
      }


    
}else{
  echo 'erreur de chargement';
}

?>