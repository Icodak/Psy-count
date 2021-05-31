
<?php

try{
	ini_set('sendmail_from', 'tullinnicolas@gmail.com');
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "tullinnicolas@gmail.com";
    $to = "tullinnicolas@gmail.com";
    $subject = "Essai de PHP Mail";
    $message = "Votre Code de verification est : ";
    $headers = "De :" . $from;
    mail($to,$subject,$message, $headers);
    echo 'message envoyé';
}
 catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
      }  

?>