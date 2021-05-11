<?php
session_start(); 
?>

<?php


    $pwdHashed = "112";
    $pwdHashed2= "122";
    $Password = password_hash($pwdHashed, PASSWORD_DEFAULT);
    $checkPwd = password_verify( $pwdHashed2, $Password);

    if ($checkPwd==true ) {
       echo 'success';
    }else{
      echo 'no';
    }








