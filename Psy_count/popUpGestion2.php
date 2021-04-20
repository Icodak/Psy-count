  
 
 
 
  <?php
        if(isset($_SESSION["hidde"])&&$_SESSION["hidde"]=='true'){
        if(isset($_SESSION["gestionModification2"])&&$_SESSION["gestionModification2"]=='true'){
    
  
  
  try{

$ID=$_SESSION["idModification"];
$dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$req2 =  $dbco->prepare(
  "SELECT nom,prenom,Email,permission_lvl from utilisateur WHERE ID_Utilisateur=:ID_Utilisateur ");
$req2->execute(array(":ID_Utilisateur"=>$ID));
$resultat3 = $req2->fetchAll();



}catch(PDOException $e){
echo "Erreur : " . $e->getMessage();
}

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
                        <td class="text2" align="left"><textarea name="nom"><?php  echo $resultat3[0][0] ?></textarea></td>
                        <td class="text2" align="left"><textarea name="prenom"><?php  echo $resultat3[0][1] ?></textarea></td>               
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

                        <td class="text2" align="left"><textarea name="Email"><?php  echo $resultat3[0][2] ?></textarea></td>
                        <td class="text2" align="left"><textarea name="permission"><?php  echo $resultat3[0][3]  ?></textarea></td>
                   
                 </tr>

             </tbody>
         </table>



         </div>
            <div>

    <input type="submit" class='button3' name="typeId7" value="Modifier">
    <input type="submit" class='button3' name="typeId6" value="annuler">
</div>
</div>

</form>


<?php




        }
      }

?>