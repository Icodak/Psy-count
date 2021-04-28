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


<div class="wrapper">

    <div class="main">
        <form>
            <div class="frame-header">
                <div>
                    <?php
                  if($resultat[0][3]==NULL){
                   
                    ?>
                    <div class="User-image">
                        <img src="images/backgroundImages vertical.png">
                        <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">
                    </div>

                    <?php
                  }else{
                      echo 'non';
                  }
                  

                ?>
                </div>
                <div>
                    <h1>
                        Mon profil
                    </h1>
                </div>
            </div>



            <div class="topic-main">
                <div class="topic-list">

                    <div class="topic-items">
                        <div class="topic-right">

                            <h3>Nom : </h3>
                        </div>



                        <div class="topic-meta">

                            <input type="text" class="crayon1" name='nom' disabled value=<?php echo $resultat[0][0]?>>
                        </div>
                        <div class="inputImage">
                            <button type="button" class="crayon1" onclick="modificationInformations(this)"> <img
                                    src="images/crayon2.png">
                            </button>

                        </div>
                    </div>





                    <div class="topic-items">

                        <div class="topic-right">

                            <h3>Prenom : </h3>
                        </div>

                        <div class="topic-meta">

                            <input type="text" class="crayon2" name='prenom' disabled
                                value=<?php echo $resultat[0][1]?>>
                        </div>
                        <div class="inputImage">
                            <button type="button" class="crayon2" onclick="modificationInformations(this)"> <img
                                    src="images/crayon2.png">
                            </button>
                        </div>

                    </div>


                    <div class="topic-items">
                        <div class="topic-right">

                            <h3>Email : </h3>
                        </div>


                        <div class="topic-meta">
                            <input type="text" class="crayon3" name='prenom' disabled
                                value=<?php echo $resultat[0][2]?>>
                        </div>
                        <div class="inputImage">
                            <button type="button" class="crayon3" onclick="modificationInformations(this)"> <img
                                    src="images/crayon2.png">
                            </button>
                        </div>


                    </div>


                    <div class="topic-items">
                        <div class="topic-right">

                            <h3>Date de naissance : </h3>
                        </div>

                        <div class="topic-meta">

                            <input type="text" class="crayon4" name='prenom' disabled
                                value=<?php echo $resultat2[0][0]?>>
                        </div>
                        <div class="inputImage">
                            <button type="button" class="crayon4" onclick="modificationInformations(this)"> <img
                                    src="images/crayon2.png">
                            </button>
                        </div>

                    </div>


                    <div class="topic-items">
                        <div class="topic-right">

                            <h3>Mot de passe: </h3>
                        </div>

                        <div class="topic-meta">
                            <input type="text" class="crayon5" name='prenom' disabled value="*********">
                        </div>
                        <div class="inputImage">
                            <button type="button" class="crayon5" onclick="modificationInformations(this)">
                                <img src="images/crayon2.png">
                            </button>
                        </div>

                    </div>
                </div>


                <div class="data-button">
                    <div>
                    <a class="new-subject">
                        <p>Enregistrer</p>
                    </a>
                    </div>
                    <div>
                    <a class="new-subject">
                        <p>Annuler</p>
                    </a>
                    </div>

                </div>
            </div>





    </div>




    </form>
</div>
</div>
</div>


</div>