<?php
session_start();
?>
<link rel="stylesheet" href="css/styles_fonts.css">
<link rel="stylesheet" href="css/styleMenu.css">



<div id="Menu">
  <nav id="navbar">
    <span class="menuText" id="psyfimenutext"> Psy-fi</span>
    <a href="accueil.php" class="menuText"> Accueil </a>
    <a href="" class="menuText"> Forum </a>
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
        <a href="gestionDesUtilisateurs.php" class="menuText"> Gestion des utilisateurs </a>
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
    <a href="" class="menuText"> Support </a>

    <?php
    if (!isset($_SESSION['connexion']) || $_SESSION['connexion'] != 1) {
    ?>
      <a href="signIn.php"> <button class="button"> Login </button> </a>
    <?php
    }
    ?>

    <?php
    if (!isset($_SESSION['connexion']) || $_SESSION['connexion'] != 1) {
    ?>
      <a href="signUpMedecin.php"> <button class="button"> Professionnel de santé ? </button> </a>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['connexion'])) {
      if ($_SESSION['connexion'] == 1) {
    ?>
        <a href="deconnexion.php"> <button class="button"> deconnexion </button> </a>
    <?php
      }
    }
    ?>
  </nav>
</div>






