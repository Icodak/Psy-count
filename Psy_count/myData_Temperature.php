<?php
$dbData = new PDO("mysql:host=localhost;dbname=serveur_psy_fi", 'root', '');
$dbData->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$fetchTemp = $dbData->query(
    'SELECT data_date,valeurs
    FROM mesures
    WHERE catégorie="Temperature"'
);

$array_data_date = array();
$array_data_value = array();
$values = $fetchTemp->fetchAll();
for ($i = 0; $i <= count($values) - 1; $i++) {
    //print_r($values[$i][0]);
    $array_data_date[$i] = $values[$i][0];
    echo "\n\r";
    //print_r($values[$i][1]);
    echo "\n\r";
    $array_data_value[$i] = $values[$i][1];
    print_r($array_data_date);
    print_r($array_data_value);
}

//Test :  envoi des données sur un fichier json
/*$testGraph = fopen('temp_test.json', 'w');
fwrite($testGraph, json_encode($values));
fclose($testGraph);

$fp = fopen('temp_date.json', 'w');
fwrite($fp, json_encode($array_data_date));
fclose($fp);

$fp2 = fopen('temp_value.json', 'w');
fwrite($fp2, json_encode($array_data_value));
fclose($fp2);
*/
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

        function reportWindowSize() {
            //alert("Window size has changed!");
            //document.getElementById('linechart').reload();
        }
    </script>

    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });

        function chart(chartType) {

            var data = google.visualization.arrayToDataTable([
                ['data_date', 'valeurs'],
                <?php
                for ($j = 0; $j <= count($array_data_date) - 1; $j++) {
                    echo "['" . $array_data_date[$j] . "'," . $array_data_value[$j] . "],";
                }
                ?>
            ]);

            if (chartType === 'pieChart') { //inverser data pour piechart
                var options = {
                    title: "Graphe de l'évolution de la température superficielle",
                };
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            } else if (chartType === 'lineChart') {
                var options = {
                    title: "Courbe de l'évolution de la température superficielle",
                    curveType: 'function',
                    legend: {
                        position: 'bottom'
                    }
                };
                var chart = new google.visualization.LineChart(document.getElementById('linechart'));
            }

            chart.draw(data, options);

            //Afficher/Désafficher
            if (chart.display === "none") {
                document.querySelector("#piechart").hidden = true;

            } else if (chart.display === "block") {
                document.querySelector("#piechart").hidden = false;
            }
        }
    </script>
</head>

<body>

    <header>
        <?php include("menuBar.php") ?>
    </header>

    <div class="form">
        <h1>Test</h1>
        <p>Veuillez cliquer sur le choix d'affichage qui vous convient le mieux :</p>
        <input type="button" onclick="chart('pieChart')" value="Voir mes données sous forme de camembert">
        <div id="piechart"></div>

        <input type="button" onclick="chart('lineChart')" value="Voir mes données sous forme de courbe d'évolution">
        <div id="linechart"></div>
    </div>

    <?php include("footer.php") ?>

</body>

</html>