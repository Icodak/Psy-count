<?php

if(isset($_POST['codeEmail']) && isset($_POST['EmailName']))
{

  /*je suis un petit commentaire*/
try{
  $from = "amanda;dieuaide@gmail.com";
  $to = $_POST['EmailName'];
  $subject = "Verification adresse mail ";
  $message = "Votre Code de verification est : " . $_POST['codeEmail'];
  $headers = "De :" . $from;
	ini_set('sendmail_from', 'amanda;dieuaide@gmail.com');
  ini_set( 'display_errors', 1 );
  error_reporting( E_ALL );
  mail($to,$subject,$message, $headers);
}
catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
      }  

    }


?>