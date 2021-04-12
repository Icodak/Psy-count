

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>
  <link rel="stylesheet" href="css/style_des_utilisateurs.css">
  <script src="script.js"></script>
</head>
<body>
<header>
    <?php include("menuBar.php") ?>
    
</header>


<div id="gestionUtilisateur">


    <h1>Gestion des  Utilisateurs</h1>







<?php
    if(isset($_SESSION["gestionModification1"])&&$_SESSION["gestionModification1"]=='true'){


?>
    <form method="post" action="gestionFonction.php">
    <select name="permission" id="pet-select" placeholder="spécialité">
                                 <option value=""selected disabled hidden id="placeholderType2">niveau de permission</option>
                                 <option value="Medecin">Medecin</option>
                                 <option value="patient">patient</option>
                                 <option value="Admin">Admin</option>                  
    </select>



<?php
    }
?>



<?php
    if((isset($_SESSION["gestionModification1"])&&$_SESSION["gestionModification1"]=='true')
    ||(isset($_SESSION["gestionModification2"])&&$_SESSION["gestionModification2"]=='true')){


?>

    
    <input name="typeId4" type="submit" class="button4" value="choisir" name="Ajouter">
    </form>









<?php
}else{

?>

   

    <form method="post" action="gestionFonction.php">
    <input name="typeId3" type="submit" class="button4" value="Ajouter un profil" name="Ajouter">
    </form>


<?php
}
?>
    



<?php
    if(isset($_SESSION["gestionModification"])&&$_SESSION["gestionModification"]=='true'){
        if(isset($_SESSION["permission"])&&$_SESSION["permission"]=='Admin'){


?>
 <form method="post" action="gestionFonction.php">
    <div id="add">
        <div>
           <table>
            
            <thead>
             <tr>
            <th class="text2" align="left" colspan="1">nom</th>
            <th class="text2" align="left" colspan="1">prenom</th>
                </tr>
             </thead>
            <tbody>
                 <tr>
                        <td class="text2" align="left"><textarea name="nom"></textarea></td>
                        <td class="text2" align="left"><textarea name="prenom"></textarea></td>               
                 </tr>

             </tbody>
         </table>

         <table>
            
            <thead>
             <tr>
            <th class="text2" align="left" colspan="1">Email</th>
            <th class="text2" align="left" colspan="1">mot de passe</th>
                </tr>
             </thead>
            <tbody>
                 <tr>

                        <td class="text2" align="left"><textarea name="Email"></textarea></td>
                        <td class="text2" align="left"><textarea name="motDePasse"></textarea></td>
                   
                 </tr>

             </tbody>
         </table>



         </div>
            <div>

    <input type="submit" class='button4' name="typeId5" value="valider">
</div>
</div>

</form>

<?php  
}
}
?>



<?php
    if(isset($_SESSION["gestionModification"])&&$_SESSION["gestionModification"]=='true'){
        if(isset($_SESSION["permission"])&&$_SESSION["permission"]=='Medecin'){


?>
 <form method="post" action="gestionFonction.php">
    <div id="add">
        <div>
           <table>
            
            <thead>
             <tr>
            <th class="text2" align="left" colspan="1">mot de passe</th>
            <th class="text2" align="left" colspan="1">codePostalCabinet</th>
            <th class="text2" align="left" colspan="1">specialite</th>
                </tr>
             </thead>
            <tbody>
                 <tr>

                        <td class="text2" align="left"><textarea name="motDePasse"></textarea></td>
                        <td class="text2" align="left"><textarea name="codePostalCabinet"></textarea></td>
                        <td class="text2" align="left"><textarea name="specialite"></textarea></td>
                 </tr>

             </tbody>
         </table>

        <table>
            
            <thead>
             <tr>
            <th class="text2" align="left" colspan="1">nom</th>
            <th class="text2" align="left" colspan="1">prenom</th>
            <th class="text2" align="left" colspan="1">Email</th>

                </tr>
             </thead>
            <tbody>
                 <tr>

                        <td class="text2" align="left"><textarea name="nom"></textarea></td>
                        <td class="text2" align="left"><textarea name="prenom"></textarea></td>
                        <td class="text2" align="left"><textarea name="Email"></textarea></td>

                 </tr>

             </tbody>
         </table>



         </div>
            <div>

    <input type="submit" class='button4' name="typeId5" value="valider">
</div>
</div>

</form>

<?php  
}
}
?>



<?php
    if(isset($_SESSION["gestionModification"])&&$_SESSION["gestionModification"]=='true'){
        if(isset($_SESSION["permission"])&&$_SESSION["permission"]=='patient'){


?>
 <form method="post" action="gestionFonction.php">
    <div id="add">
        <div>
           <table>
            
            <thead>
             <tr>
            <th class="text2" align="left" colspan="1">nom</th>
            <th class="text2" align="left" colspan="1">prenom</th>
            <th class="text2" align="left" colspan="1">Email</th>

                </tr>
             </thead>
            <tbody>
                 <tr>
                        <td class="text2" align="left"><textarea name="nom"></textarea></td>
                        <td class="text2" align="left"><textarea name="prenom"></textarea></td>
                        <td class="text2" align="left"><textarea name="Email"></textarea></td>

                 </tr>

             </tbody>
         </table>
        <table>
            
            <thead>
             <tr>

            <th class="text2" align="left" colspan="1">mot de passe</th>
            <th class="text2" align="left" colspan="1">dateDeNaissance</th>
                </tr>
             </thead>
            <tbody>
                 <tr>
                        <td class="text2" align="left"><textarea name="motDePasse"></textarea></td>
                        <td class="text2" align="left"><textarea name="dateDeNaissance"></textarea></td>
                 </tr>

             </tbody>
         </table>



         </div>
            <div>

    <input type="submit" class='button4' name="typeId5" value="valider">


    <input type="submit" class='button4' name="typeId6" value="annuler">
</div>
</div>

</form>

<?php  
}
}
?>
























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

