<?php
session_start();
?>

<link rel="stylesheet" href="css/styles_fonts.css">

<link rel="stylesheet" href="css/styleMenu.css">
<script type="text/javascript" src="javascript//javaScriptCode.js"></script>


<div id="Menu">
  <nav id="navbar">
    <span class="menuText" id="psyfimenutext"> Psy-fi</span>
    <a href="accueilEN.php" class="menuText"> Home </a>
    <a href="forumEN.php" class="menuText"> Forum </a>

    <?php
    if (isset($_SESSION['type'])) {
      if ($_SESSION['type'] == 'patient') {
    ?>
        <a href="myDataEN.php" class="menuText"> My data </a>

    <?php
      }
    }
    ?>
    <?php
    if (isset($_SESSION['type'])) {
      if ($_SESSION['type'] == 'Admin') {
    ?>
        <a href="gestionDesUtilisateursEN.php" class="menuText"> User management </a>
    <?php
      }
    }
    ?>
    <?php
    if (isset($_SESSION['type'])) {
      if ($_SESSION['type'] == 'Medecin') {
    ?>
        <a href="" class="menuText"> My patients </a>

    <?php
      }
    }
    ?>


    <a href="faqEN.php" class="menuText"> FAQ </a>
    <a href="accueilEN.php#menuBarAnchor" class="menuText"> About </a>


    <?php
    if (isset($_SESSION['connexion']) && $_SESSION['connexion'] == 1) {
      //Le formulaire de Contact normal est utilisable par les visiteurs
      //sinon il s'agit de la messagerie interne accessible par d'autres pages du site
    ?>
      <a href="msg_interneEN.php" class="menuText"> Messaging </a>
    <?php
    }
    ?>

    <?php
    if (!isset($_SESSION['connexion']) || $_SESSION['connexion'] != 1) {
      //Le formulaire de Contact normal est utilisable par les visiteurs
      //sinon il s'agit de la messagerie interne accessible par d'autres pages du site
    ?>
      <a href="contactEN.php" class="menuText"> Contact </a>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['type']) && (isset($_SESSION['connexion']) || $_SESSION['connexion'] = 1)) {
      if ($_SESSION['type'] == 'patient') {
    ?>
        <a href="contactPatientEN.php" class="menuText"> Rendez-vous </a>
    <?php
      }
    }
    ?>

    <?php
    if (!isset($_SESSION['connexion']) || $_SESSION['connexion'] != 1) {
    ?>

      <a href="signInEN.php"> <button class="button"> Login </button> </a>

    <?php
    }
    ?>

    <?php
    if (!isset($_SESSION['connexion']) || $_SESSION['connexion'] != 1) {
    ?>
      <a href="signUpMedecinEN.php"> <button class="button"> health professional ? </button> </a>
    <?php
    }
    ?>

  <img src="images/translateButton.png" onclick="translateFR()"> 

    <?php
    if (isset($_SESSION['connexion'])) {
      if ($_SESSION['connexion'] == 1) {
    ?>
        <a href="deconnexionEN.php"> <button class="button"> Log out </button> </a>
    <?php
      }
    }
    ?>




                           
       
                          
   



  </nav>
</div>