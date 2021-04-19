
<?php  
session_start();
//ajouter
if(isset($_POST))
{

      $question=$_POST['question'];
      $reponse=$_POST['reponse'];

      try{
                $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "INSERT INTO `faq`(`question`,`reponse`)
                        VALUES(:question,:reponse)"; 

                 $res = $dbco->prepare($sql);
                 $exec = $res->execute(array(":question"=>$question,":reponse"=>$reponse));
                 header('Location: faqAdmin.php');

      }
      catch(PDOException $e){
          echo "Erreur : " . $e->getMessage();
      }


    
}else{
  echo 'fail';
}



?>