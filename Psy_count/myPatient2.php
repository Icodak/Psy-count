<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Mes données</title>
    <link rel="icon" type="image/png" href="images/psy-fi.png" />
    <link rel="stylesheet" href="css/style_myData_.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
    <script type="text/javascript" src="javascript//javaScriptCode.js"></script>
</head>

<body>

    <header>
        <?php include("menuBar.php") ?>
        <?php include("myPatientFonction.php") ?>
    </header>

    <?php
	$information = initialisationPatient($_POST['ID']);
	?>


    <div id="myDataPage">

        <div id="doctorPage">
            <h1>Fiche du patient</h1>
             

            <div class="doctorData">

                <img src="images/backgroundImages vertical.png">



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
            <div class="doctorText">
            <textarea>blablablablablzblblablablablablzblablablablvablablablvblablablablablzblblablablablablzblablablablvablablablv
            blablablablablzblblablablablablzblablablablvablablablvblablablablablzblblablablablablzblablablablvablablablv
            blablablablablzblblablablablablzblablablablvablablablv
            blablablablablzblblablablablablzblablablablvablablablv
            blablablablablzblblablablablablzblablablablvablablablv
            blablablablablzblblablablablablzblablablablvablablablv
            blablablablablzblblablablablablzblablablablvablablablv
            blablablablablzblblablablablablzblablablablvablablablv
            blablablablablzblblablablablablzblablablablvablablablv
            blablablablablzblblablablablablzblablablablvablablablv</textarea>
           
            
            </div>


            <div class="consultButton">
                <button class="button" > Modifier mes données </button>     
               <button class="button" onclick="returnGestionPatient()"> revenir à la page de gestion </button>
              
              <?php if($_SESSION['showTable']=='non'){
                echo '<button class="button" onclick="returnGestionPatient()"> ajouter ce Patient </button>';   
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