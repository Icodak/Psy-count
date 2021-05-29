<?php

if(isset($_POST['codeEmail']))
{

  /*je suis un petit commentaire*/
try{
  $from = "tullinnicolas@gmail.com";
  $to = $_POST['EmailName'];
  $subject = "Verification adresse mail ";
  $message = "Votre Code de verification est \$_POST['codeEmail']";
  $headers = "De :" . $from;
	ini_set('sendmail_from', 'tullinnicolas@gmail.com');
  ini_set( 'display_errors', 1 );
  error_reporting( E_ALL );
  mail($to,$subject,$message, $headers);
  echo $_POST['EmailName'];
}
catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
      }  

    }


?>