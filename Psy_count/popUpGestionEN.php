




 <?php
        if(isset($_SESSION["hidde"])&&$_SESSION["hidde"]=='true'){
?>


   <?php
        if(isset($_SESSION["gestionModification"])&&$_SESSION["gestionModification"]=='true'){
        ?>

    <form method="post" action="gestionFonctionEN.php">
    <select name="permission" id="pet-select" placeholder="spécialité">
                                 <option value=""selected disabled hidden id="placeholderType2">Permission level</option>
                                 <option value="Medecin">Medecin</option>
                                 <option value="patient">Patient</option>
                                 <option value="Admin">Admin</option>                  
    </select>


    
    <input name="typeId4" type="submit" class="button3" value="Choose" name="Ajouter">
    </form>
<?php

        }
        ?>





<?php
    if(isset($_SESSION["gestionModification"])&&$_SESSION["gestionModification"]=='true'){
        if(isset($_SESSION["permission"])&&$_SESSION["permission"]=='Admin'){


?>
 <form method="post" action="gestionFonctionEN.php">
    <div id="add">
        <div>
           <table>
            
            <thead>
             <tr>
            <th class="text2" align="left" colspan="1">Lastname</th>
            <th class="text2" align="left" colspan="1">Firstname</th>
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
            <th class="text2" align="left" colspan="1">Password</th>
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

    <input type="submit" class='button3' name="typeId5" value="Save">
    <input type="submit" class='button3' name="typeId6" value="Cancel">
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
 <form method="post" action="gestionFonctionEN.php">
    <div id="add">
        <div>
           <table>
            
            <thead>
             <tr>
            <th class="text2" align="left" colspan="1">Password</th>
            <th class="text2" align="left" colspan="1">Doctor's office ZIP code </th>
            <th class="text2" align="left" colspan="1">speciality</th>
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
            <th class="text2" align="left" colspan="1">Lastname</th>
            <th class="text2" align="left" colspan="1">Firstname</th>
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

    <input type="submit" class='button3' name="typeId5" value="Save">
    <input type="submit" class='button3' name="typeId6" value="Cancel">
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
 <form method="post" action="gestionFonctionEN.php">
    <div id="add">
        <div>
           <table>
            
            <thead>
             <tr>
            <th class="text2" align="left" colspan="1">Lastname</th>
            <th class="text2" align="left" colspan="1">Firstname</th>
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

            <th class="text2" align="left" colspan="1">Password</th>
            <th class="text2" align="left" colspan="1">Date of birth</th>
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

    <input type="submit" class='button3' name="typeId5" value="Save">


    <input type="submit" class='button3' name="typeId6" value="Cancel">
</div>
</div>

</form>

<?php  
}
}
?>

<?php
        }
?>