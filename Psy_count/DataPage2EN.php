<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>My profil</title>
    <link rel="icon" type="image/png" href="images/psy-fi.png" />
    <link rel="stylesheet" href="css/style_myData_.css">
    <script type="text/javascript" src="javascript//javaScriptCode.js"></script>
</head>

<body>
    <header>
        <?php include("menuBarEN.php") ?>
    </header>


    <?php


try{
    $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi",'root','');
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $id=$_SESSION['ID'];

    $req =  $dbco->prepare('SELECT nom,prenom,Email,images,motDePasse FROM utilisateur WHERE ID_Utilisateur=:ID_Utilisateur');
    $req->execute(['ID_Utilisateur' => $id]);
    $resultat = $req->fetchAll();

    $req =  $dbco->prepare('SELECT dateDeNaissance FROM patient WHERE ID_Utilisateur=:ID_Utilisateur');
    $req->execute(['ID_Utilisateur' => $id]);
    $resultat2 = $req->fetchAll();
}

    catch(PDOException $e){

  echo "Error : " . $e->getMessage();
}    

?>



    <div class="wrapper">

        <div class="main">
            <form method="post" action="myDataFonctionEN.php" enctype="multipart/form-data">
                <div class="frame-header">
                    <div>

                        <div class="User-image">
                            <?php
                  if($resultat[0][3]==NULL){
                   
                    ?>
                            <img src="images/backgroundImages vertical.png">
                            <?php
                  }else{
                    ?>
                            <?php                           
                        echo "<img src='images_utilisateurs/" . $resultat[0][3] . "'>";     
                  }              
                ?>        
                            <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">
                          
                        </div>


                    </div>
                    <div>
                        <h1>
                            My profil
                        </h1>
                    </div>
                </div>



                <div class="topic-main">
                    <div class="topic-list">

                        <div class="topic-items">
                            <div class="topic-right">

                                <h3>Name : </h3>
                            </div>



                            <div class="topic-right2">
                            <div class="topic-meta">

                                <input type="text" class="crayon1 datainput" name='nom' disabled
                                    value=<?php echo $resultat[0][0]?>>
                            </div>
                            <div class="inputImage">
                                <button type="button" class="crayon1" onclick="modificationInformations(this)"> <img
                                        src="images/crayon2.png">
                                </button>

                            </div>
                            </div>
                        </div>





                        <div class="topic-items">

                            <div class="topic-right">

                                <h3>Firstname : </h3>
                            </div >
                            <div class="topic-right2">
                            <div class="topic-meta">

                                <input type="text" class="crayon2 datainput" name='Prenom' disabled
                                    value=<?php echo $resultat[0][1]?>>
                            </div>
                            <div class="inputImage">
                                <button type="button" class="crayon2" onclick="modificationInformations(this)"> <img
                                        src="images/crayon2.png">
                                </button>
                            </div>
                            </div>

                        </div>


                        <div class="topic-items">
                            <div class="topic-right">

                                <h3>Email : </h3>
                            </div>

                            <div class="topic-right2">
                            <div class="topic-meta">
                                <input type="text" class="crayon3 datainput" name='Email' disabled
                                    value=<?php echo $resultat[0][2]?>>
                            </div>
                            <div class="inputImage">
                                <button type="button" class="crayon3" onclick="modificationInformations(this)"> <img
                                        src="images/crayon2.png">
                                </button>
                            </div>
                            </div>


                        </div>


                        <div class="topic-items">
                            <div class="topic-right">

                                <h3>Date of birth : </h3>
                            </div>
                            <div class="topic-right2">
                            <div class="topic-meta">

                                <input type="text" class="crayon4 datainput" name='dateDeNaissance' disabled
                                    value=<?php echo $resultat2[0][0]?>>
                            </div>
                            <div class="inputImage">
                                <button type="button" class="crayon4" onclick="modificationInformations(this)"> <img
                                        src="images/crayon2.png">
                                </button>
                            </div>
                            </div>

                        </div>


                        <div class="topic-items">
                            <div class="topic-right">

                                <h3>Password : </h3>
                            </div>
                            <div class="topic-right2">
                            <div class="topic-meta">
                                <input type="password" class="crayon5 datainput" name='motDePasse' disabled
                                    value="***************">
                            </div>
                            <div class="inputImage">
                                <button type="button" class="crayon5" onclick="redirectionDataPage3()">
                                    <img src="images/crayon2.png">
                                </button>
                            </div>
                            </div>

                        </div>
                    </div>

                   
                    <div class="data-button">
                        <div>
                            <input type="submit" onclick="ActiveInputDataPage()" name="dataPageChange"
                                value="Enregistrer" class="button">
                        </div>
                        <div>
                            <a href="myDataEN.php" class="button">
                                Cancel
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
    <?php include("footerEN.php") ?>
</body>