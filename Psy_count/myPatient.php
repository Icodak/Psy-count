<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Mes Patients</title>
    <link rel="icon" type="image/png" href="images/psy-fi.png" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_myPatient.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="javascript/javaScriptCode.js"></script>
    <script type="text/javascript" src="javascript/javaScriptCodePatient.js"></script>
</head>

<body>
    <header>
        <?php include("menuBar.php") ?>

    </header>
    <main>

        <?php
 include("myPatientFonction.php");

// On détermine sur quelle page on se trouve
if (isset($_GET['page']) && !empty($_GET['page'])) {
    $currentPage = (int) strip_tags($_GET['page']);
} else {
    $currentPage = 1;
}

if (isset($_SESSION['showTable']) && $_SESSION['showTable']=='oui') {
    $resultat = tableCreationMesPatient($currentPage);
}else{
    $resultat = tableCreationPatient($currentPage);
} 

$resultat3 = $resultat[0];
$pages = $resultat[1];

?>

        <div class="gestionDesPatients shadow2">
          
    <div class="Menu-And-Text">
     <img id="image-Menu" onclick=" showMenu()" src="images/menu.png">
     <img id="image-Menu2" onclick="HideMenu()" src="images/cross.png">
        <ul class="Menu-lines">
            <li><a href="myPatient.php">Mes patients</a></li>
            <li><a href="myPatient.php">Mes informations</a></li>
        </ul>
    </div>


                <h1>Gestion des patients</h1>
          

            <div class="selectButton">

                <div>
                    <select id="select1" name="type" placeholder="classement">
                        <option value="">--Please choose an option--</option>
                        <option value="non">patients sans Medecin</option>
                        <option value="oui">Mes patients</option>
                    </select>
                </div>
            </div>



            <div id="tableau">

                <table>

                    <thead>
                        <tr>

                            <th class="text2" align="left" colspan="1">Nom</th>
                            <th class="text2" align="left" colspan="1">Prénom</th>
                            <th class="text2" align="left" colspan="1">Email</th>
                            <th class="text2" align="left" colspan="1">Actions</th>

                        </tr>
                    </thead>

                    <?php



                        for ($i = 0; $i <= count($resultat3) - 1; $i++) {

                        ?>

                    <tbody>
                        <tr>

                            <td class="text2" align="left"> <?php echo  $resultat3[$i][0] ?> </td>
                            <td class="text2" align="left"> <?php echo  $resultat3[$i][1] ?> </td>
                            <td class="text2" align="left"> <?php echo  $resultat3[$i][2] ?> </td>
                            <td class="text2 flex-column" align="left">
                                <form method="post" action="myPatient2.php">
                                    <button name="patientProfil" class="actionButtonVoir" title="voir le profil"
                                        value=<?php echo $resultat3[$i][3] ?>><img src="images/look.png"> </button>
                                </form>

                                <?php if(isset($_SESSION['showTable']) && $_SESSION['showTable']=='oui'){
                                    echo'<input  type="image" class="actionButtonSupprimer" title="Supprimer ce patient" src="images/suppr.png" value='.$resultat3[$i][3],' >';
                                    }else{
                                    echo'<input  type="image" class="actionButtonAjouter" title="Ajouter un Utilisateur" src="images/ADD.png" value='.$resultat3[$i][3],'>';   
                                    }?>
                            </td>
                        </tr>
                    </tbody>


                    <?php
                        }
                        ?>

                </table>

                <div class="pagination">


                    <div class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                        <a href="myPatient.php?page=<?php if ($currentPage == 1) {
                                                                            echo $currentPage;
                                                                        } else {
                                                                            echo $currentPage - 1;
                                                                        } ?>" class="page-link">«</a>
                    </div>
                    <?php for ($page = 1; $page <= $pages; $page++) : ?>


                    <div class="page-item <?= ($currentPage == $page) ? "active" : "" ?> ">
                        <a href="myPatient.php?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                    </div>
                    <?php endfor ?>




                    <div class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                        <a href="myPatient.php?page=<?php if ($currentPage == $pages) {
                                                                            echo $currentPage;
                                                                        } else {
                                                                            echo $currentPage + 1;
                                                                        } ?>" class="page-link ">»</a>
                    </div>
                </div>

            </div>

            <?php
    
    ?>












    </main>

    <?php include("footer.php") ?>

</body>