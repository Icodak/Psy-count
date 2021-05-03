<?php
$x = 800;
$y = 500;
$marge = 50;
$intX = ($x - (2 * $marge)) / 12;
$intY = ($y - (2 * $marge)) / 10;

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

$testGraph = fopen('temp_test.json', 'w');
fwrite($testGraph, json_encode($values));
fclose($testGraph);

$fp = fopen('temp_date.json', 'w');
fwrite($fp, json_encode($array_data_date));
fclose($fp);

$fp2 = fopen('temp_value.json', 'w');
fwrite($fp2, json_encode($array_data_value));
fclose($fp2);


//Librairy needed
/*$img = imagecreatetruecolor($x, $y);
$noir = imagecolorallocate($img, 0, 0, 0);
$blanc = imagecolorallocate($img, 255, 255, 255);
$orange = imagecolorallocate($img, 220, 100, 0);
$gris = imagecolorallocate($img, 220, 220, 220);

imagefill($img, 0, 0, $blanc);
imageline($img, $marge, $y - $marge, $x - $marge, $y - $marge, $noir);
imageline($img, $marge, $y - $marge, $marge, $marge, $noir);
imagettftext($img, 20, 0, $x - $marge - 10, $y - $marge + 30, $noir, "css/fonts/POPPINS-BLACK.ttf", "Date");
imagettftext($img, 20, 0, $marge - 45, $marge - 25, $noir, "css/fonts/POPPINS-BLACK.ttf", "Températures");
for ($i = 0; $i <= 10; $i++) {
    imageline($img, $marge - 2, $y - $marge - ($i * $intY), $marge + 2, $y - $marge - ($i * $intY), $noir);
    imagettftext($img, 10, 0, $marge - 45, $y - $marge - ($i * $intY), $noir, "css/fonts/POPPINS-BLACK.ttf", $i * 100);
    if ($i > 0)
        imageline($img, $marge + 2, $y - $marge - ($i * $intY), $x - $marge, $y - $marge - ($i * $intY), $gris);
}
for ($i = 0; $i < 12; $i++) {
    imageline($img, $marge + $i * $intX, $y - $marge - 2, $marge + $i * $intX, $y - $marge + 2, $noir);
    imagettftext($img, 10, -45, $marge + $i * $intX, $y - $marge + 20, $noir, "css/fonts/POPPINS-BLACK.ttf", $array_data_date[$i]);

    imagesetthickness($img, 1);
    if ($i < 11) {
        imageline($img, $marge + $i * $intX + 1, $y - $marge - ($array_data_value[$i] * ($y - 2 * $marge) / 1000), $marge + ($i + 1) * $intX + 1, $y - $marge - ($array_data_value[$i + 1] * ($y - 2 * $marge) / 1000), $orange);
    }
    imagefilledellipse($img, $marge + $i * $intX + 1, $y - $marge - ($array_data_value[$i] * ($y - 2 * $marge) / 1000), 10, 10, $noir);
}
imagettftext($img, 12, 0, $marge + $i * $intX + 8, $y - $marge - ($array_data_value[$i] * ($y - 2 * $marge) / 1000) - 10, $orange, "css/fonts/POPPINS-BLACK.ttf", $array_data_value[$i]);
*/
//$resultats=array(); //GET VALUE FROM BDD
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
</head>

<body>

    <header>
        <?php include("menuBar.php") ?>
    </header>

    <div class="light-background">
        <div class="form">
            <h1>Test</h1>

        </div>
    </div>


    <?php include("footer.php") ?>

</body>

</html>