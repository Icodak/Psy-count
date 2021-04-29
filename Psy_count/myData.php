<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Mes données</title>
    <link rel="icon" type="image/png" href="images/psy-fi.png" />
    <link rel="stylesheet" href="css/style_myData_.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
    <script type="text/javascript" src="javascript//javaScriptCode.js"></script>
</head>

<body>

    <header>
        <?php include("menuBar.php") ?>
        <?php include("myDataFonction.php") ?>
    </header>

    <?php
	initialisation();
	?>


    <div id="myDataPage">

        <div id="doctorPage">

            <div class="doctorData">
                <div class="UserImage">
                    <img src="images/backgroundImages vertical.png">

                </div>

                <div class="doctorLabel">
                    <ul>
                        <li>
                            <?php
							 
							  echo $_SESSION['DataEmail'];
							  ?>
                            <hr size=3 class="sepator1">

                        </li>
                        <li>
                            <?php
							  echo $_SESSION['DataNom'];
							  ?>
                            <hr size=3 class="sepator1">

                        </li>
                        <li>
                            <?php
							  echo $_SESSION['DataPrenom'];
							  ?>
                            <hr size=3 class="sepator1">
                        </li>


                    </ul>

                </div>


            </div>

            <div class="consultButton">
                <h4 class="consultbuttonText">Medecin traitant: </h4>
                <button class="button4" onclick="dataModification()"> Modifier mes données </button>
                <button class="button4" onclick=""> consulter </button>
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

                    <img class="responsive" src="images/temperature2.jpg">

                </div>

                <div class="graph">
                    <h1>Reaction</h1>

                    <img class="responsive" src="images//reaction2.jpg">

                </div>
            </div>

        </div>




    </div>



    <?php include("footer.php") ?>

</body>

</html>