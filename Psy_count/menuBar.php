<?php
session_start();
?>
<link rel="stylesheet" href="css/style.css">

<div id="Menu">
  <nav id="navbar">
    <img src="http://localhost/Psy-count/Psy_count/images/menu.png" alt="burger" id="burger" displayed="burger" onclick="toggle(this)" />
    <div id="navlist">
      <span class="menuText" id="psyfimenutext"> Psy-fi</span>
      <a href="http://localhost/Psy-count/Psy_count/accueil.php" class="menuText"> Accueil </a>
      <?php
      if (isset($_SESSION['type'])) {
        if ($_SESSION['type'] == 'patient') {
      ?>
          <a href="http://localhost/Psy-count/Psy_count/myData.php" class="menuText"> Mes données </a>
        <?php
        }
      }
      if (isset($_SESSION['type'])) {
        if ($_SESSION['type'] == 'Admin') {
        ?>
          <a href="http://localhost/Psy-count/Psy_count/gestionDesUtilisateurs.php" class="menuText"> Gestion des utilisateurs </a>
        <?php
        }
      }
      if (isset($_SESSION['type'])) {
        if ($_SESSION['type'] == 'Medecin') {
        ?>
          <a href="http://localhost/Psy-count/Psy_count/myPatient.php" class="menuText"> Mes patients </a>
          <a href="http://localhost/Psy-count/Psy_count/myDataDoctor.php" class="menuText"> Mon compte </a>

      <?php
        }
      }
      ?>
      <a href="http://localhost/Psy-count/Psy_count/faq.php" class="menuText"> FAQ </a>
      <a href="http://localhost/Psy-count/Psy_count/forum.php" class="menuText"> Forum </a>
      <a href="http://localhost/Psy-count/Psy_count/accueil.php#about" class="menuText"> A propos </a>

      <?php
      if (isset($_SESSION['connexion']) && $_SESSION['connexion'] == 1) {
        if ($_SESSION['type'] == 'patient') {
      ?>
          <a href="http://localhost/Psy-count/Psy_count/msg_internePatient.php" class="menuText"> Messagerie </a>
        <?php
        }
        if ($_SESSION['type'] == 'Medecin') {
        ?>
          <a href="http://localhost/Psy-count/Psy_count/msg_interneMedecin.php" class="menuText"> Messagerie </a>
        <?php
        }
        if ($_SESSION['type'] == 'Admin') {
        ?>
          <a href="http://localhost/Psy-count/Psy_count/msg_interneAdmin.php" class="menuText"> Messagerie </a>
        <?php
        }
      }
      if (!isset($_SESSION['connexion']) || $_SESSION['connexion'] != 1) {
        ?>
        <a href="http://localhost/Psy-count/Psy_count/contact.php" class="menuText"> Contact </a>
        <?php
      }

      if (isset($_SESSION['type']) && (isset($_SESSION['connexion']) || $_SESSION['connexion'] = 1)) {
        if ($_SESSION['type'] == 'patient') {
        ?>
          <a href="http://localhost/Psy-count/Psy_count/contactPatient.php" class="menuText"> Contact </a>
        <?php
        }
        if ($_SESSION['type'] == 'Medecin') {
        ?>
          <a href="http://localhost/Psy-count/Psy_count/contactMedecin.php" class="menuText"> Contact </a>
        <?php
        }
        if ($_SESSION['type'] == 'Admin') {
        ?>
          <a href="http://localhost/Psy-count/Psy_count/contactAdmin.php" class="menuText"> Contact </a>
        <?php
        }
      }
      if (isset($_SESSION['connexion'])) {
        if ($_SESSION['connexion'] == 1) {
          ?>
          <a href="http://localhost/Psy-count/Psy_count/DataPage2.php" class="menuText">
          <img alt="user profile" src="http://localhost/Psy-count/Psy_count/images_utilisateurs/<?php echo $_SESSION['image']?>" style="width:40px;height:40px;align-items:center"/>
          </a>
          <?php
        }}


      if (!isset($_SESSION['connexion']) || $_SESSION['connexion'] != 1) {
        ?>

        <a href="http://localhost/Psy-count/Psy_count/sign-In.php"> <button class="button"> Login </button> </a>

        <?php
      }
      if (isset($_SESSION['connexion'])) {
        if ($_SESSION['connexion'] == 1) {
        ?>
          <a href="http://localhost/Psy-count/Psy_count/deconnexion.php"> <button class="button"> logout  <img src="http://localhost/Psy-count/Psy_count/images/logOut.png" alt="logout" style="width:30px;height:20px;"/></button>  </a>
      <?php
        }
      }
      ?>
    </div>
  </nav>
</div>

<script>
  window.addEventListener('resize', onResize);

  function onResize() {
    let burger = document.getElementById("burger");
    let navlist = document.getElementById("navlist");
    let navbar = document.getElementById("navbar");
    console.log(window.innerWidth)
    if (window.innerWidth < 900) {
      burger.style = "display:flex;";
      if (burger.getAttribute("displayed") == "burger") {
        navlist.style.display = "none";
        navlist.style.flexDirection = "column";
      } else {
        navlist.style.display = "flex";
        navlist.style.flexDirection = "column";
      }
      console.log("smol")
    } else {
      burger.style.display = "none";
      navlist.style.display = "flex";
      navlist.style.justifyContent =  "center";
        navlist.style.flexDirection = "row";
      console.log("big")
    }
  }

  function toggle(el) {
    if (el.getAttribute("displayed") == "burger") {
      el.setAttribute("displayed", "cross");
      el.setAttribute("src", "http://localhost/Psy-count/Psy_count/images/cross.png");
      document.getElementById("navlist").style.display = "flex";
      document.getElementById("navlist").style.flexDirection = "column";
    } else {
      el.setAttribute("displayed", "burger");
      el.setAttribute("src", "http://localhost/Psy-count/Psy_count/images/menu.png");
      document.getElementById("navlist").style.display = "none";

    }
  }
</script>