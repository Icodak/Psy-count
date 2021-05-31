<?php include_once("gestionDesUtilisateursFonctionSql.php") ?> 

 
  <?php
        if(isset($_SESSION["hidde"])&&$_SESSION["hidde"]=='true'){
        if(isset($_SESSION["gestionModification2"])&&$_SESSION["gestionModification2"]=='true'){ 
          
        $resultat = modificationUtilisateur($_SESSION["idModification"]);  
       
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
                        <td class="text2" align="left"><textarea name="nom"><?php  echo $resultat[0][0] ?></textarea></td>
                        <td class="text2" align="left"><textarea name="prenom"><?php  echo $resultat[0][1] ?></textarea></td>               
                 </tr>

             </tbody>
         </table>

         <table>
            
            <thead>
             <tr>
            <th class="text2" align="left" colspan="1">Email</th>
            <th class="text2" align="left" colspan="1">permission</th>
                </tr>
             </thead>
            <tbody>
                 <tr>

                        <td class="text2" align="left"><textarea name="Email"><?php  echo $resultat[0][2] ?></textarea></td>
                        <td class="text2" align="left"><textarea name="permission"><?php  echo $resultat[0][3]  ?></textarea></td>
                   
                 </tr>

             </tbody>
         </table>



         </div>
            <div>
            <div class="form-button">
    <input type="submit" class='button' name="typeId7" value="Modifier">
    <input type="submit" class='button' name="typeId6" value="annuler">
            </div>
</div>
</div>

</form>









<?php
        }
      }

?>