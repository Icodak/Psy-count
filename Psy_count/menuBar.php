<?php
session_start();
?>
<!--En include(menubar.php) dans les autres pages, pas besoin de reécrire session start!-->

<link rel="stylesheet" href="css/styleMenu.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">



<div id="Menu">
  <nav id="navbar">
    <span class="menuText" id="psyfimenutext"> Psy-fi</span>
    <a href="accueil.php" class="menuText"> Accueil </a>
    <a href="" class="menuText"> Forum </a>

    <!--'type' hek connexion-->
    <?php
    if (isset($_SESSION['type'])) {
      if ($_SESSION['type'] == 'patient') {
    ?>
        <a href="myData.php" class="menuText"> Mes données </a>
    <?php
      }
    }
    ?>
    <?php
    if (isset($_SESSION['type'])) {
      if ($_SESSION['type'] == 'Admin') {
    ?>
        <a href="gestionDesUtilisateurs.php" class="menuText"> gestion des utilisateurs </a>
    <?php
      }
    }
    ?>
    <?php
    if (isset($_SESSION['type'])) {
      if ($_SESSION['type'] == 'Medecin') {
    ?>
        <a href="" class="menuText"> Mes patients </a>
    <?php
      }
    }
    ?>

    <a href="faq.php" class="menuText"> FAQ </a>
    <a href="accueil.php#menuBarAnchor" class="menuText"> A propos </a>
    <a href="msg_interne.php" class="menuText"> Messagerie (en test) </a>
    <?php
    if (!isset($_SESSION['connexion']) || $_SESSION['connexion'] != 1) {
      //Le formulaire de Contact normal est utilisable par les visiteurs
      //sinon il s'agit de la messagerie interne accessible par d'autres pages du site
    ?>
      <a href="contact.php" class="menuText"> Contact </a>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['type']) && (isset($_SESSION['connexion']) || $_SESSION['connexion'] = 1)) {
      if ($_SESSION['type'] == 'patient') {
    ?>
        <a href="contactPatient.php" class="menuText"> Consulter </a>
    <?php
      }
    }
    ?>

    <?php
    if (!isset($_SESSION['connexion']) || $_SESSION['connexion'] != 1) {
      //si connexion = 1, une connexion a été établie
    ?>
      <a href="signIn.php"> <button class="button6"> Login </button> </a>
    <?php
    }
    ?>

    <?php
    if (!isset($_SESSION['connexion']) || $_SESSION['connexion'] != 1) {
    ?>
      <a href="signUpMedecin.php"> <button class="button6"> professionnel de santé ? </button> </a>
    <?php
    }
    ?>


    <?php
    if (isset($_SESSION['connexion'])) {
      if ($_SESSION['connexion'] == 1) {
    ?>
        <a href="deconnexion.php"> <button class="button6"> deconnexion </button> </a>
    <?php
      }
    }
    ?>





  </nav>
</div>