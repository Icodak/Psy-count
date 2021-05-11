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
        <?php include("menuBarEN.php") ?>
        <?php include("myDataFonctionEN.php") ?>
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
                <h4 class="consultbuttonText">My doctor : </h4>
                <button class="button" onclick="dataModification()"> Edit my data </button>
                <button class="button" onclick="requestContact()"> To consuslt </button>
            </div>
        </div>


        <div class="graphPage">

            <div class="subgraphPage">

                <div class="graph">
                    <h1>Cardiac</h1>

                    <img class="responsive" src="images/frequence.jpg">



                </div>

                <div class="graph">
                    <h1>Tone</h1>

                    <img class="responsive" src="images/voice.jpg">

                </div>

            </div>
            <div class="subgraphPage">

                <div class="graph">
                    <h1>Temperature</h1>

                    <img class="responsive" src="images/temperature2.jpg">

                </div>

                <div class="graph">
                    <h1>Reflexes</h1>

                    <img class="responsive" src="images//reaction2.jpg">

                </div>
            </div>

        </div>




    </div>



    <?php include("footerEN.php") ?>

</body>

</html>