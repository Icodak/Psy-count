<?php
$dbData = new PDO("mysql:host=localhost;dbname=serveur_psy_fi", 'root', '');
$dbData->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dataType = 'Cardiaque';
include "myData_Fonction.php";
$values = getData($dbData, $dataType);
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Mes données</title>
    <link rel="icon" type="image/png" href="images/psy-fi.png" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_myData_Data.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
    <script type="text/javascript" src="javascript//javaScriptCode.js"></script>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        window.addEventListener('resize', reportWindowSize);
        //Faire une fonction qui refresh les graphs quand on change la taille de la fenêtre !
        function reportWindowSize() {
            //alert("Window size has changed!");
            //document.getElementById('linechart').reload();
        }
    </script>

    <script type="text/javascript" src="myData_Fonction.js">
        google.charts.load('current', {
            'packages': ['corechart']
        });

        var data = google.visualization.arrayToDataTable([
            ['data_date', 'valeurs'],
            <?php
            for ($j = 0; $j <= count($values) - 1; $j++) {
                echo "['" . $values[$j][0] . "'," . $values[$j][1] . "],";
            }
            ?>
        ]);
 
        chart(chartType, data);
        
    </script>
</head>

<body>

    <header>
        <?php include("menuBar.php") ?>
    </header>

    <div class="form">
        <h1>Test</h1>
        <p>Veuillez cliquer sur le choix d'affichage qui vous convient le mieux :</p>
        <input type="button" onclick="test()" value="Voir mes données sous forme de camembert">
        <div id="piechart"></div>

        <input type="button" onclick="chart('lineChart', data)" value="Voir mes données sous forme de courbe d'évolution">
        <div id="linechart"></div>
    </div>

    <?php include("footer.php") ?>

</body>

</html>