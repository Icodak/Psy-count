
<?php

try{
	ini_set('sendmail_from', 'tullinnicolas@gmail.com');
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "tullinnicolas@gmail.com";
    $to = "amanda.dieuaide@gmail.com";
    $subject = "Essai de PHP Mail";
    $message = "mouton";
    $headers = "From :" . $from;
    mail($to,$subject,$message, $headers);
    echo 'Message sent';
}
 catch(PDOException $e){
        echo "Error : " . $e->getMessage();
      }  

?>