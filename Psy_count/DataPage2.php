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


<link rel="stylesheet" href="css/style_myData_.css">

<div id="dataPage2">
    <div id="userAccount">
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
            <button class="button4">Enregistrer les modifications</button>
            </div>


            <div id="personalInformations">
                <h1>Mes informations personnel </h1>
                <h3>Nom</h3>
                <div class="inputImage">
                    <input type="text" class="crayon1" disabled value=<?php echo $resultat[0][0]?>><button class="crayon1" onclick="modificationInformations(this)"> <img src="images/crayon2.png">
                    </button>
                </div>
                <h3>Prenom</h3>
                <div class="inputImage">
                    <input type="text" class="crayon2" disabled  value=<?php echo $resultat[0][1]?>><button class="crayon2" onclick="modificationInformations(this)"> <img src="images/crayon2.png">
                    </button>
                </div>
                <h3>Email</h3>
                <div class="inputImage">
                    <input type="text"  class="crayon3" disabled  value=<?php echo $resultat[0][2]?>><button class="crayon3" onclick="modificationInformations(this)"> <img src="images/crayon2.png">
                    </button>
                </div>
                <h3>Date de naissance</h3>
                <div class="inputImage">
                    <input type="text"  class="crayon4" disabled value=<?php echo $resultat2[0][0]?>><button class="crayon4" onclick="modificationInformations(this)"> <img src="images/crayon2.png">
                    </button>
                </div>
                <h3>mot de passe</h3>
                <div class="inputImage">
                    <input type="text" class="crayon5"  disabled value="*********"><button class="crayon5" onclick="modificationInformations(this)"> <img src="images/crayon2.png">
                    </button>
                </div>
               

            </div>



        </div>
    </div>


</div>