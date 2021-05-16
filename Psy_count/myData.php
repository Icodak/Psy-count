<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Mes données</title>
    <link rel="icon" type="image/png" href="images/psy-fi.png" />

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_myData_.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
    <script type="text/javascript" src="javascript//javaScriptCode.js"></script>
</head>

<body>

    <header>
        <?php include("menuBar.php");
         include("myDataFonction.php") ;
         $informations = selectInformationsPatient()[0];
         $diagnosticText = selectInformationsPatient()[2];
         $compteRendu = selectInformationsPatient()[3]; 
         $informationsMedecin=  selectInformationsMyMedecin($_SESSION['ID']);  
        ?>
    </header>

    <?php
	initialisation();
	?>


    <div id="myDataPage">
        <div id="doctorPage">
            <h1>Mon medecin</h1>
            <div class="doctorData">
                
                <?php if($informations[0][3]==NULL){
                               echo  "<img src=images/default-user.png>";                       
                  }else{                                     
                        echo "<img src='images_utilisateurs/".$informationsMedecin[0][3] ."?rand=". rand() ."'>";     
                  }              
                ?>
                <div class="doctorLabel">
                    <ul>
                        <li>
                            <?php
							 
							  echo $informationsMedecin[0][2];
							  ?>
                            <hr size=3 class="sepator1">

                        </li>
                        <li>
                            <?php
							  echo $informationsMedecin[0][0];
							  ?>
                            <hr size=3 class="sepator1">

                        </li>
                        <li>
                            <?php
							  echo $informationsMedecin[0][1];
							  ?>
                            <hr size=3 class="sepator1">
                        </li>


                    </ul>

                </div>


            </div>
            <div>
        
                <textarea class="patient-Diagnostic" maxlength="1234"><?php echo $diagnosticText['diagnostic']?></textarea>

            </div>

            <div class="consultButton">
                <?php echo  "<a  class='button2'  href='pdf_utilisateurs/".$compteRendu['compteRendu']."' download='compte rendu ". $informations[0][0].$informations[0][1]."' >
                <img class='upload-image' src='images/dowload.png'> Télécharger<br> mon compte rendu</a>" ?>


                <button class="button2" onclick="dataModification()"> Modifier mes données </button>
                <button class="button2" onclick="requestContact()"> Consulter </button>
            </div>
        </div>


        <div class="graphPage">

            <div class="subgraphPage">

                <div class="graph">
                    <h1>Cardiaque</h1>

                    <img class="responsive" src="images/frequence.jpg">



                </div>

                <div class="graph">
                    <h1>Tonalité</h1>

                    <img class="responsive" src="images/voice.jpg">

                </div>

            </div>
            <div class="subgraphPage">

                <div class="graph">
                    <h1>Température</h1>

                    <a href="myData_Temperature.php"><img class="responsive" src="images/temperature2.jpg"></a>

                </div>

                <div class="graph">
                    <h1>Réaction</h1>

                    <img class="responsive" src="images//reaction2.jpg">

                </div>
            </div>

        </div>
    </div>
    <?php include("footer.php") ?>

</body>

</html>