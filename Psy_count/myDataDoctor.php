<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Mes Patients</title>
    <link rel="icon" type="image/png" href="images/psy-fi.png" />
    <link rel="stylesheet" href="css/style_myData_2.css">
    <link rel="stylesheet" href="css/style_myData_Doctor.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="javascript/javaScriptCode.js"></script>
    <script type="text/javascript" src="javascript/javaScriptCodePatient.js"></script>
    <script type="text/javascript" src="javascript/javaScriptFonctionData.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="page de donnée du medecin">
</head>

<body>
    <header>
        <?php 
              include("menuBar.php") ;
              include("mes_donnes_medecin/loadDataMedecin.php");    
              $outPut = selectInformationsMedecin();
              $resultat =  $outPut[0];
              $resultat2 = $outPut[1];
        ?>
    </header>



    <div class="wrapper">
        <div class="main">
            <form method="post" action="mes_donnes_medecin/changeDataMedecin.php" enctype="multipart/form-data">
                <div class="frame-header">



                    <h1>
                        Mon profil
                    </h1>

                    <div class="User-image">





                        <label for="file">
                            <?php if($resultat[0][3]==NULL){
                               echo  "<img src=images/default-user.png>";                       
                  }else{                                     
                        echo "<img src='images_utilisateurs/".$resultat[0][3] ."?rand=". rand() ."'>";     
                  }              
                ?>

                        </label>
                        <input type="file" id="file" hidden name="avatar" accept="image/png, image/jpeg">

                    </div>




                </div>



                <div class="topic-main">
                    <div class="topic-list">

                        <div class="topic-items">
                            <div class="topic-right">

                                <h3>Nom : </h3>
                            </div>



                            <div class="topic-right2">
                                <div class="topic-meta">

                                    <input type="text" class="crayon1 datainput" name='nom' disabled
                                        value=<?php if(!empty($resultat[0][0])){ echo $resultat[0][0];}?>>
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

                                <h3>Pr&eacutenom : </h3>
                            </div>
                            <div class="topic-right2">
                                <div class="topic-meta">

                                    <input type="text" class="crayon2 datainput" name='Prenom' disabled
                                        value=<?php if(!empty($resultat[0][1])){ echo $resultat[0][1];}?>>
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
                                        value=<?php if(!empty($resultat[0][2])){ echo $resultat[0][2];}?>>
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

                                <h3>Numero de telephone : </h3>
                            </div>
                            <div class="topic-right2">
                                <div class="topic-meta">

                                    <input type="text" class="crayon4 datainput" name='telephone' disabled
                                        value=<?php if(!empty($resultat2[0][2])){ echo $resultat2[0][2];}?>>
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

                                <h3>Code postal du cabinet : </h3>
                            </div>
                            <div class="topic-right2">
                                <div class="topic-meta">

                                    <input type="text" class="crayon5 datainput" name='codePostal' disabled
                                        value=<?php if(!empty($resultat2[0][0])){ echo $resultat2[0][0];}?>>
                                </div>
                                <div class="inputImage">
                                    <button type="button" class="crayon5" onclick="modificationInformations(this)"> <img
                                            src="images/crayon2.png">
                                    </button>
                                </div>
                            </div>

                        </div>

                        <div class="topic-items">
                            <div class="topic-right">
                                <h3>Specialite : </h3>
                            </div>
                            <div class="topic-right2">
                                <div class="topic-meta">

                                    <select class="crayon6 datainput" disabled name="specialite" id="pet-select">
                                        <option value=""><?php if(!empty($resultat2[0][1])){ echo $resultat2[0][1];}?></option>
                                        <option value="Anesthésiologie">Anesthésiologie</option>
                                        <option value="Cardiologie">Cardiologie</option>
                                        <option value="Andrologie">Andrologie</option>
                                    </select>
                                </div>
                                <div class="inputImage">
                                    <button type="button" class="crayon6" onclick="modificationInformations(this)"> <img
                                            src="images/crayon2.png">
                                    </button>
                                </div>
                            </div>

                        </div>

                        <div class="topic-items">
                            <div class="topic-right">

                                <h3>Mot de passe : </h3>
                            </div>
                            <div class="topic-right2">
                                <div class="topic-meta">
                                    <input type="password" class="crayon7 datainput" name='motDePasse' disabled
                                        value="***************">
                                </div>
                                <div class="inputImage">
                                    <button type="button" class="crayon7" onclick="redirectionDataPage3()">
                                        <img src="images/crayon2.png">
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="data-button">
                        <div>
                            <input type="submit" onclick="ActiveInputDataPage()" name="dataPageChangeMedecin"
                                value="Enregistrer" class="button">
                        </div>
                    </div>
                </div>
        </div>




        </form>
    </div>
    </div>



    </div>


















    <?php include("footer.php") ?>

</body>