<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Mes données</title>
    <link rel="icon" type="image/png" href="images/psy-fi.png" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_alert_box.css">
    <link rel="stylesheet" href="css/style_myData_.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="javascript//javaScriptFonctionPatient2.js"></script>
    <script type="text/javascript" src="javaScript/javaScriptFonctionAlertBox.js"></script>
</head>

<body>

    <header>
        <?php 
        include("menuBar.php");
        include("myPatientFonction.php");        
	    $information = initialisationPatient($_POST['patientProfil']);
        $_SESSION['addUser']=$_POST['patientProfil'];  
        $text = SelectPatientText($_SESSION['addUser']); 
	    ?>
    </header>

   
    <div class="myDataPage">
        <div id="doctorPage">
            <h1>Fiche du patient</h1>
            <div class="doctorData">
                <?php
                if($information[3]!=NULL){
                    echo "<img src='images_utilisateurs/" . $information[3] . "'>";   
                }
                else{
                    echo'<img src="images/backgroundImages vertical.png">';
                }    
            ?>
                <div class="doctorLabel">
                    <ul>
                        <li>
                            <?php
							 
							  echo $information[0];
							  ?>
                            <hr size=3 class="sepator1">

                        </li>
                        <li>
                            <?php
							    echo $information[1];
							  ?>
                            <hr size=3 class="sepator1">

                        </li>
                        <li>
                            <?php
							    echo $information[2];
							  ?>
                            <hr size=3 class="sepator1">
                        </li>


                    </ul>

                </div>


            </div>
           
                    <h1>Diagnostic du patient</h1>
            <div>
           
            <textarea class="patient-Diagnostic"  id="diagnostic-text-doctor" maxlength="1234"><?php if(isset($_SESSION['showTable'])&&$_SESSION['showTable']=='oui'){ echo $text['diagnostic'];}?></textarea>


            </div>


            <div class="consultButton">
            <?php if( isset($_SESSION['showTable'])&&$_SESSION['showTable']=='oui'){
                echo '<label class="button2" for="file2">';
                echo '<img class="upload-image"src="images/upload.png">';
                echo 'Charger<br> un compte rendu';
                echo '</label>';
                echo '<input id="file2"  accept=".pdf" hidden type="file">';              
                }
                ?>
            <?php if( isset($_SESSION['showTable'])&&$_SESSION['showTable']=='oui'){  
                     echo '<label class="button2" id="save-Diagnostic" disabled for="file3" >';
                     echo '<img class="upload-image"src="images/enregistrer.png">';
                     echo 'Enregistrer<br> le diagnostic';
                     echo '</label>';
                     echo '<input id="file3"  accept=".pdf" type="button" hidden >';   
      
            }
            ?>
                

           

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