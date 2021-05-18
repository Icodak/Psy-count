<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Gestion des utilisateurs</title>
    <link rel="icon" type="image/png" href="images/psy-fi.png" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style_des_utilisateurs.css">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="javascript/javaScriptCode.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="la page de gestion des administrateur de psy-fi">


</head>

<body>
    <header>
        <?php include("menuBar.php") ?>

    </header>
<div class="main">

    <?php include_once("gestionDesUtilisateursFonctionSql.php") ?>



    <?php

    // On détermine sur quelle page on se trouve
    if (isset($_GET['page']) && !empty($_GET['page'])) {
        $currentPage = (int) strip_tags($_GET['page']);
    } else {
        $currentPage = 1;
    }
    $resultat = tableCreation($currentPage);
    $resultat3 = $resultat[0];
    $pages = $resultat[1];
    ?>


    <div id="gestionUtilisateur" class="shadow2">

        <h1>Gestion des Utilisateurs</h1>
        <?php include_once("popUpGestion.php") ?>
        <?php include_once("popUpGestion2.php") ?>

        <?php
        if (!isset($_SESSION["hidde"]) || $_SESSION["hidde"] == 'false') {
        ?>

            <form method="post" action="gestionFonction.php">
                <input type="submit" class="button2" value="Ajouter un profil" name="Ajouter">
            </form>
        <?php
        }
        ?>
        <?php
        if (!isset($_SESSION["hidde"]) || $_SESSION["hidde"] == 'false') {
        ?>
            
                <div id="actionButton">
                    <input class="button2 buttonAction" disabled type="button" id="ModifierButton" value="Modifier" name="Modifier">
                    <input class="button2 buttonAction" disabled type="button" id="SuppButton" value="Supprimer" name="supprimer">
                    <input class="button2 buttonAction" disabled type="button" id="banButton" value="Bannir" name="Bannir">

                </div>

                <div id="tableau">
               
                        <table>

                            <thead>
                                <tr>
                                    <th>
                                        <input class="text2"type="checkbox" onclick="allSelect(this)">
                                    </th>
                                    <th class="text2 responsiveTable" align="left" colspan="1">id</th>
                                    <th class="text2" align="left" colspan="1">Nom</th>
                                    <th class="text2" align="left" colspan="1">Prénom</th>
                                    <th class="text2 responsiveTable" align="left" colspan="1">Email</th>
                                    <th class="text2" align="left" colspan="1">Permission</th>

                                </tr>
                            </thead>

                            <?php



                            for ($i = 0; $i <= count($resultat3) - 1; $i++) {

                            ?>

                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="checkBoxGestion" class="checkBoxUtilisateurs" onclick="checkboxcheckGestionsUtilisateurs()" id=<?php echo  $resultat3[$i][0] ?>>
                                        </td>
                                        <td class="text2 responsiveTable" align="left"> <?php echo  $resultat3[$i][0] ?></td>
                                        <td class="text2" align="left"> <?php echo  $resultat3[$i][1] ?> </td>
                                        <td class="text2" align="left"> <?php echo  $resultat3[$i][2] ?> </td>
                                        <td class="text2 responsiveTable" align="left"> <?php echo  $resultat3[$i][3] ?> </td>
                                        <td class="text2 " align="left"> <?php echo  $resultat3[$i][4] ?> </td>

                                    </tr>
                                </tbody>


                            <?php
                            }
                            ?>

                        </table>

                        <div class="pagination">


                            <div class="page-items <?= ($currentPage == 1) ? "disabled" : "" ?>">
                                <a href="gestionDesUtilisateurs.php?page=<?php if ($currentPage == 1) {
                                                                                echo $currentPage;
                                                                            } else {
                                                                                echo $currentPage - 1;
                                                                            } ?>" class="page-link">«</a>
                            </div>
                            <?php for ($page = 1; $page <= $pages; $page++) : ?>


                                <div class="page-items <?= ($currentPage == $page) ? "active" : "" ?> ">
                                    <a href="gestionDesUtilisateurs.php?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                                </div>
                            <?php endfor ?>




                            <div class="page-items <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                                <a href="gestionDesUtilisateurs.php?page=<?php if ($currentPage == $pages) {
                                                                                echo $currentPage;
                                                                            } else {
                                                                                echo $currentPage + 1;
                                                                            } ?>" class="page-link ">»</a>
                            </div>
                        </div>
                   
                </div>
                </div>
        <?php
        }
        ?>
</div>
      <?php include("footer.php") ?>
        
</body>







</html>