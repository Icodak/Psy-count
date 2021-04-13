<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Titre de la page</title>
    <link rel="stylesheet" href="css//style_des_utilisateurs.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="javaScript/javaScriptCode_.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
    <header>
        <?php include("menuBar.php") ?>

    </header>



    <?php
// On détermine sur quelle page on se trouve
if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}
$dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// On détermine le nombre total d'articles
$sql = "SELECT COUNT(*) AS nb_users FROM utilisateur";
$res = $dbco->prepare($sql);
$exec = $res->execute();
$resultat = $res->fetch();
$nbUsers = (int) $resultat['nb_users'];
// On détermine le nombre d'articles par page
$parPage = 7;
// On calcule le nombre de pages total
$pages = ceil($nbUsers / $parPage);
// Calcul du 1er article de la page
$premier = ($currentPage * $parPage) - $parPage;

if( !isset( $_SESSION['type']) || $_SESSION['type']!='Admin'){
  header('Location: accueil.php');
}


  try{

              $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
              $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              $req2 =  $dbco->prepare(
                "SELECT ID_Utilisateur,nom,prenom,Email,permission_lvl from utilisateur WHERE permission_lvl!=:permission_lvl LIMIT $premier, $parPage ");
              $req2->execute(array(':permission_lvl' => 'Admin'));
              $resultat3 = $req2->fetchAll();


      } catch(PDOException $e){
     echo "Erreur : " . $e->getMessage();
      }


 

?>





    <div id="gestionUtilisateur">


        <h1>Gestion des Utilisateurs</h1>




        <input onclick="window.open('popUpGestion.php')" class="button4" value="Ajouter un profil" name="Ajouter">



        <div id="actionButton">
            <input class="button4" value="Modifier" name="Modifier">
            <input class="button4" id="SuppButton" value="Supprimer" name="supprimer">
            <input class="button4" value="Bannir" name="Bannir">

        </div>







        <div id="tableau">
            <table>

                <thead>
                    <tr>
                        <th class="text2" align="left" colspan="1">id</th>
                        <th class="text2" align="left" colspan="1">nom</th>
                        <th class="text2" align="left" colspan="1">prenom</th>
                        <th class="text2" align="left" colspan="1">Email</th>
                        <th class="text2" align="left" colspan="1">permission</th>
                        <th>
                            <input type="checkbox" onclick="allSelect(this)">
                        </th>
                    </tr>
                </thead>

                <?php


        
                for ($i = 0; $i <= count( $resultat3)-1 ; $i++) {

         ?>




                <tbody>
                    <tr>
                        <td class="text2" align="left"><?php echo  $resultat3[$i][0]?></td>
                        <td class="text2" align="left"><?php echo  $resultat3[$i][1]?></td>
                        <td class="text2" align="left"><?php echo  $resultat3[$i][2]?></td>
                        <td class="text2" align="left"><?php echo  $resultat3[$i][3]?></td>
                        <td class="text2" align="left"><?php echo  $resultat3[$i][4]?></td>
                        <td>
                            <input type="checkbox" name="checkBoxGestion" id=<?php echo  $resultat3[$i][0]?>>
                        </td>

                    </tr>
                </tbody>


                <?php
         }
         ?>

            </table>
        </div>

        <nav>
            <ul class="pagination">
                <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                    <a href="gestionDesUtilisateurs.php?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                </li>
                <?php for($page = 1; $page <= $pages; $page++): ?>
                <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                    <a href="gestionDesUtilisateurs.php?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                </li>
                <?php endfor ?>
                <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                    <a href="gestionDesUtilisateurs.php?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                </li>
            </ul>
        </nav>

    </div>



    <?php include("footer.php") ?>


</body>





</html>