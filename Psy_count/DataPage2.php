<?php


try{
    $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $id=$_SESSION['ID'];

    $req =  $dbco->prepare('SELECT nom,prenom,Email,images FROM utilisateur WHERE ID_Utilisateur=:ID_Utilisateur');
    $req->execute(['ID_Utilisateur' => $id]);
    $resultat = $req->fetchAll();

    $req =  $dbco->prepare('SELECT dateDeNaissance FROM patient WHERE ID_Utilisateur=:ID_Utilisateur');
    $req->execute(['ID_Utilisateur' => $id]);
    $resultat2 = $req->fetchAll();



}

    catch(PDOException $e){

  echo "Erreur : " . $e->getMessage();
}    

?>


<link rel="stylesheet" href="css//style_myData_.css">

<div id="dataPage2">
    <div id="userAccount">
        <form  method="post" action="myDataFonction.php">
        <div id="inputAccount">
        <div id="imageAccount">
            <h1>Mon image </h1>

                <?php
                  if($resultat[0][3]==NULL){
                   
                    ?>
         
                    <img src="images/backgroundImages vertical.png">
                    

                    <?php
                  }else{
                      echo 'non';
                  }
                  

                ?>
          
            </div>

            
            <div id="personalInformations">
                <h1>Mes informations personnel </h1>

                <div class="inputChamp">
                <h3>Nom</h3>
                <div class="inputImage">
                    <input type="text" class="crayon1"  name='nom' disabled value=<?php echo $resultat[0][0]?>><button type="button" class="crayon1" onclick="modificationInformations(this)"> <img src="images/crayon2.png">
                    </button>
                </div>
                </div>

                <div class="inputChamp">
                <h3>Prenom</h3>
                <div class="inputImage">
                    <input type="text" class="crayon2" name='prenom' disabled  value=<?php echo $resultat[0][1]?>><button type="button" class="crayon2" onclick="modificationInformations(this)"> <img src="images/crayon2.png">
                    </button>
                </div>
                </div>

                <div class="inputChamp">
                <h3>Email</h3>
                <div class="inputImage">
                    <input type="text"  class="crayon3" name='Email' disabled  value=<?php echo $resultat[0][2]?>><button  type="button" class="crayon3" onclick="modificationInformations(this)"> <img src="images/crayon2.png">
                    </button>
                </div>
                </div>


                <div class="inputChamp">
                <h3>Date de naissance</h3>
                <div class="inputImage">
                    <input type="text"  class="crayon4" name='DateDeNaissance' disabled value=<?php echo $resultat2[0][0]?>><button  type="button" class="crayon4" onclick="modificationInformations(this)"> <img src="images/crayon2.png">
                    </button>
                </div>
                </div>

                <div class="inputChamp">
                <h3>mot de passe</h3>
                <div class="inputImage">
                    <input type="text" class="crayon5"  name='motDePasse' disabled value="*********"><button type="button" class="crayon5" onclick="modificationInformations(this)"> <img src="images/crayon2.png">
                    </button>
                </div>
                </div>
                <button type="submit"  id="saveInforamtions" name="idtype8" class="button4">Enregistrer les modifications</button>
            </div>
         
            </form>

           



        </div>
    </div>


</div>