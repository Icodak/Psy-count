<?php
session_start();
?>
<link rel="stylesheet" href="css/styleMenu.css">



<div id="Menu">
  <nav id="navbar">
    <span class="menuText" id="psyfimenutext"> Psy-fi</span>
    <a href="accueil.php" class="menuText"> Accueil </a>
    <a href="forum.php" class="menuText"> Forum </a>

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
    <a href="accueil.php#about" class="menuText"> A propos </a>


    <?php
    if (isset($_SESSION['connexion']) && $_SESSION['connexion'] == 1) {
      if ($_SESSION['type'] == 'patient') {
    ?>
      <a href="msg_internePatient.php" class="menuText"> Messagerie </a>
    <?php
    }
    if ($_SESSION['type'] == 'Medecin') {
    ?>
      <a href="msg_interneMedecin.php" class="menuText"> Messagerie </a>
    <?php
    }
    if ($_SESSION['type'] == 'Admin') {
    ?>
      <a href="msg_interneAdmin.php" class="menuText"> Messagerie </a>
  <?php
    }
  }
  ?>

    <?php
    if (!isset($_SESSION['connexion']) || $_SESSION['connexion'] != 1) {
    ?>
      <a href="contact.php" class="menuText"> Contact </a>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['type']) && (isset($_SESSION['connexion']) || $_SESSION['connexion'] = 1)) {
      if ($_SESSION['type'] == 'patient') {
    ?>
        <a href="contactPatient.php" class="menuText"> Contact </a>
      <?php
      }
      if ($_SESSION['type'] == 'Medecin') {
      ?>
        <a href="contactMedecin.php" class="menuText"> Contact </a>
      <?php
      }
      if ($_SESSION['type'] == 'Admin') {
      ?>
        <a href="contactAdmin.php" class="menuText"> Contact </a>
    <?php
      }
    }
    ?>

    <?php
    if (!isset($_SESSION['connexion']) || $_SESSION['connexion'] != 1) {
    ?>

      <a href="sign-in.php"> <button class="button"> Login </button> </a>

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
        <a href="deconnexion.php"> <button class="button"> Déconnexion </button> </a>
    <?php
      }
    }
    ?>











  </nav>
</div>