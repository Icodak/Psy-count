<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Gestion des utilisateurs</title>
    <link rel="icon" type="image/png" href="images/psy-fi.png" />
    <link rel="stylesheet" href="css/style_des_utilisateurs.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="javascript/javaScriptCode.js"></script>


</head>

<body>
    <header>
        <?php include("menuBarEN.php") ?>

    </header>
<section class="main">

    <?php include_once("gestionDesUtilisateursFonctionSqlEN.php") ?>



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


    <div id="gestionUtilisateur">

        <h1>User management</h1>
        <?php include_once("popUpGestionEN.php") ?>
        <?php include_once("popUpGestion2EN.php") ?>

        <?php
        if (!isset($_SESSION["hidde"]) || $_SESSION["hidde"] == 'false') {
        ?>

            <form method="post" action="gestionFonctionEN.php">
                <input type="submit" class="button5" value="Add profile" name="Ajouter">
            </form>
        <?php
        }
        ?>
        <?php
        if (!isset($_SESSION["hidde"]) || $_SESSION["hidde"] == 'false') {
        ?>
            <div id="globalPage">
                <div id="actionButton">
                    <input class="button4" disabled type="button" id="ModifierButton" value="Edit" name="Modifier">
                    <input class="button4" disabled type="button" id="SuppButton" value="Delete" name="supprimer">
                    <input class="button4" disabled type="button" id="banButton" value="Banish" name="Bannir">

                </div>

                <div id="tableau">
                    <div id="subTable">
                        <table>

                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" onclick="allSelect(this)">
                                    </th>
                                    <th class="text2" align="left" colspan="1">id</th>
                                    <th class="text2" align="left" colspan="1">Lastname</th>
                                    <th class="text2" align="left" colspan="1">FirstName</th>
                                    <th class="text2" align="left" colspan="1">Email</th>
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
                                        <td class="text2" align="left"> <?php echo  $resultat3[$i][0] ?></td>
                                        <td class="text2" align="left"> <?php echo  $resultat3[$i][1] ?> </td>
                                        <td class="text2" align="left"> <?php echo  $resultat3[$i][2] ?> </td>
                                        <td class="text2" align="left"> <?php echo  $resultat3[$i][3] ?> </td>
                                        <td class="text2 " align="left"> <?php echo  $resultat3[$i][4] ?> </td>

                                    </tr>
                                </tbody>


                            <?php
                            }
                            ?>

                        </table>

                        <div class="pagination">


                            <div class="page-items <?= ($currentPage == 1) ? "disabled" : "" ?>">
                                <a href="gestionDesUtilisateursEN.php?page=<?php if ($currentPage == 1) {
                                                                                echo $currentPage;
                                                                            } else {
                                                                                echo $currentPage - 1;
                                                                            } ?>" class="page-link">«</a>
                            </div>
                            <?php for ($page = 1; $page <= $pages; $page++) : ?>


                                <div class="page-item <?= ($currentPage == $page) ? "active" : "" ?> ">
                                    <a href="gestionDesUtilisateursEN.php?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                                </div>
                            <?php endfor ?>




                            <div class="page-items <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                                <a href="gestionDesUtilisateursEN.php?page=<?php if ($currentPage == $pages) {
                                                                                echo $currentPage;
                                                                            } else {
                                                                                echo $currentPage + 1;
                                                                            } ?>" class="page-link ">»</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
</section>
        <section class="footer"><?php include("footerEN.php") ?></section>
        
</body>







</html>