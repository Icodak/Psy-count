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
    <script type="text/javascript" src="javascript/myData_Fonction.js"></script>
</head>

<body>

    <header>
        <?php include("menuBar.php");
        $dbData = new PDO("mysql:host=localhost;dbname=serveur_psy_fi", 'root', '');
        $dbData->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $dataType = 'Cardiaque';
        include "myData_Fonction.php";
        $values = getData($dbData, $dataType);
        $_SESSION['dataType'] = $dataType;
        ?>
    </header>
    <div class="form">
        <h1>Test</h1>
        <p>Veuillez cliquer sur le choix d'affichage qui vous convient le mieux :</p>
        <input type="button" onclick="display('hide')" value="Voir mes données sous forme de tableau">
        <div id="hide">
            <table>
                <thead>
                    <tr>
                        <th colspan="2">Mesures de fréquence cardiaque</th>
                    </tr>
                </thead>
                <tbody>
                    <?php forTable($values); ?>
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