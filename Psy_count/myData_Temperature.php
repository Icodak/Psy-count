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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        var endMe1 = true;
        var endMe2 = true;
        window.addEventListener('resize', reportWindowSize);

        function reportWindowSize() { //Ce code est horrible haha sorry TuT
            if (endMe1 === false) {
                endMe1 = true;
                pieChart();
            }
            if (endMe2 === false) {
                endMe2 = true;
                lineChart();
            }
        }

        google.charts.load('current', {
            'packages': ['corechart']
        });

        function pieChart() { //pieChart Data is wrong, check what is wrong  (╯°Д°)╯
            var data = google.visualization.arrayToDataTable([
                ['data_date', 'valeurs'],
                <?php
                for ($j = 0; $j <= count($array_data_date) - 1; $j++) {
                    echo "['" . $array_data_value[$j] . "'," . $array_data_date[$j] . "],";
                }
                ?>
            ]);

            //Grouper si data[?][i] = data[?][i+1] et retourner dans data [?][i] ???


            var options = {
                title: "Graphe de l'évolution de la température superficielle",
            };
            var chart = new google.visualization.PieChart(document.getElementById('pieChart'));

            chart.draw(data, options);

            if (endMe1 === true) {
                chart.draw(data, options);
                endMe1 = false;
            } else {
                chart.clearChart();
                endMe1 = true;
            }
        }

        function lineChart() {
            var data = google.visualization.arrayToDataTable([
                ['data_date', 'valeurs'],
                <?php
                for ($j = 0; $j <= count($array_data_date) - 1; $j++) {
                    echo "['" . $array_data_date[$j] . "'," . $array_data_value[$j] . "],";
                }
                ?>
            ]);

            var options = {
                title: "Courbe de l'évolution de la température superficielle",
                curveType: 'function',
                legend: {
                    position: 'bottom'
                }
            };
            var chart = new google.visualization.LineChart(document.getElementById('lineChart'));

            chart.draw(data, options);

            if (endMe2 === true) {
                chart.draw(data, options);
                endMe2 = false;
            } else {
                chart.clearChart();
                endMe2 = true;
            }

        }

        function display(id) { //This works for all kinds of elements (except google charts :D)
            var table = document.getElementById(id);
            if (table.style.display == "") {
                //alert("GIT");
                table.style.display = "block";

            } else if (table.style.display == "block") {
                //alert("GUD");
                table.style.display = "";
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
        <input type="button" onclick="display('hide')" value="Voir mes données sous forme de tableau">
        <div id="hide">
            <table>
                <thead>
                    <tr>
                        <th colspan="2">Température superficielle de la peau</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($j = 0; $j <= count($array_data_date) - 1; $j++) {
                        echo "<tr><td>" . $array_data_date[$j] . "</td>";
                        echo "<td>" . $array_data_value[$j] . "</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <input type="button" onclick="pieChart()" value="Voir mes données sous forme de camembert">
        <div id="pieChart"></div>

        <input type="button" onclick="lineChart()" value="Voir mes données sous forme de courbe d'évolution">
        <div id="lineChart"></div>
    </div>

    <?php include("footer.php") ?>

</body>

</html>