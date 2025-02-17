<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Mes données</title>
    <link rel="icon" type="image/png" href="images/psy-fi.png" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_myData_.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="javascript//javaScriptCode.js"></script>
    <script type="text/javascript" src="javascript//javaScriptFonctionData.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="page d'accés aux données du patient">
</head>

<body>

    <header>
        <?php include("menuBar.php");
         include("mes_donnes_patients/loadDataPatient.php") ;
         $informations = selectInformationsPatient()[0];
         $diagnosticText = selectInformationsPatient()[2];
         $compteRendu = selectInformationsPatient()[3]; 
         $informationsMedecin= selectInformationsMyMedecin($_SESSION['ID']);  
        ?>
    </header>

    <?php
	initialisation();
	?>


    <div class="myDataPage">
        <div id="doctorPage">
            <h1>Mon medecin</h1>
            <div class="doctorData">

            <?php if(empty($informationsMedecin[0][3])){
                               echo  "<img alt='image du patient' src=images/default-user.png>";                       
                  }else{                                     
                        echo "<img  alt='image du patient' src='images_utilisateurs/".$informationsMedecin[0][3] ."?rand=". rand() ."'>";     
                  }              
                ?>
            
                <div class="doctorLabel">
                    <ul>
                        <li>
                            <?php
							 
							  if(!empty($informationsMedecin[0][2])){ echo $informationsMedecin[0][2];}
							  ?>
                            <hr size=3 class="sepator1">

                        </li>
                        <li>
                            <?php
							    if(!empty($informationsMedecin[0][0])){ echo $informationsMedecin[0][0];}
							  ?>
                            <hr size=3 class="sepator1">

                        </li>
                        <li>
                            <?php
							  if(!empty($informationsMedecin[0][1])){ echo $informationsMedecin[0][1];}
							  ?>
                            <hr size=3 class="sepator1">
                        </li>


                    </ul>

                </div>


            </div>
            
            <label for="diagnostic-text"><h1>Mon diagnostic</h1></label>
            <div>
        
                <textarea class="patient-Diagnostic" disabled id="diagnostic-text"  maxlength="1234"><?php echo $diagnosticText['diagnostic']?></textarea>

            </div>

            <div class="consultButton">
                <?php echo  "<a  class='button2'  href='pdf_utilisateurs/".$compteRendu['compteRendu']."' download='compte rendu ". $informations[0][0].$informations[0][1]."' >
                <img class='upload-image' alt='icone de telechargement' src='images/dowload.png'> Télécharger<br> mon compte rendu</a>" ?>


                <button class="button2" onclick="dataModification()" style="height: 70px;"> Modifier mes données </button>
            </div>
        </div>


        <div class="graphPage">

            <div class="subgraphPage">

                <div class="graph">
                    <h1>Cardiaque</h1>

                    <a href="myData_Cardiaque.php"><img class="responsive" src="images/frequence.jpg"></a>



                </div>

                <div class="graph">
                    <h1>Tonalité</h1>

                    <a href="myData_Tonalite.php"><img class="responsive" src="images/voice.jpg"></a>

                </div>

            </div>
            <div class="subgraphPage">

                <div class="graph">
                    <h1>Température</h1>

                    <a href="myData_Temperature.php"><img class="responsive"  alt="image d'ilustration temperature" src="images/temperature2.jpg"></a>

                </div>

                <div class="graph">
                    <h1>Réaction</h1>

                    <a href="myData_Reflexes.php"><img class="responsive" src="images//reaction2.jpg"></a>

                </div>
            </div>

        </div>
    </div>
    <?php include("footer.php") ?>

</body>

</html>