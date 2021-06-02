<?php

if(isset($_POST['choice'])){
  session_start();
  $_SESSION['researchPatient']=[]; 
  $_SESSION['showTable']=$_POST['choice'];
}


?>