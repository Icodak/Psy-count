

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>
  <link rel="stylesheet" href="css/style_des_utilisateurs.css">
  <script type="text/javascript" src="javaScript//javaScriptCode_.js"></script>
  <script src="script.js"></script>
</head>
<body>
<header>
    <?php include("menuBar.php") ?>
    
</header>


<div id="gestionUtilisateur">


    <h1>Gestion des  Utilisateurs</h1>




    <form method="post" action="gestionFonction.php">
    <input name="typeId3" type="submit" onclick="window.open('popUpGestion.php',)" class="button4" value="Ajouter un profil" name="Ajouter">
    </form>







    <?php 
  if( !isset( $_SESSION['type']) || $_SESSION['type']!='Admin'){
    header('Location: accueil.php');
}
?>


    <?php
    try{

                $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $req2 =  $dbco->prepare(
                  'SELECT ID_Utilisateur,nom,prenom,Email,permission_lvl from utilisateur WHERE permission_lvl!=:permission_lvl');
                $req2->execute(array(':permission_lvl' => 'Admin'));
                $resultat3 = $req2->fetchAll();

        } catch(PDOException $e){
       echo "Erreur : " . $e->getMessage();


    }

    ?>
    <div id="tableau">
           <table>
            
            <thead>
             <tr>
            <th class="text2" align="left" colspan="1">id</th>
            <th class="text2" align="left" colspan="1">nom</th>
            <th class="text2" align="left" colspan="1">prenom</th>
            <th class="text2" align="left" colspan="1">Email</th>
            <th class="text2" align="left" colspan="1">permission</th>
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
                        <td align="left " class="inputType"> 
    
                            <form method="post" action="gestionFonction.php">
                          <input  name="typeId" type="hidden"  value=<?php echo  $resultat3[$i][0] ?>  > 
                          <input  type="submit" class="button4"  value="Modifier    ">
                          </form>


                           <form method="post" action="gestionFonction.php">
                            <input  name="typeId2" type="hidden"  value=<?php echo  $resultat3[$i][0] ?>  > 
                           <input type="submit" class="button5 "  value="Supprimer"> 
                           </form>   


                                 </td>

                 </tr>
             </tbody>


         <?php
         }
         ?>

          </table>
        </div>



</div>


  <?php include("footer.php") ?>


</body>
</html>

