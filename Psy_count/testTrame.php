<!--
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
</head>

<body>
</body>
</html>
-->

<?php
//Récupérer les données
$url = "http://projets-tomcat.isep.fr:8080/appService/?ACTION=GETLOG&TEAM=G10D";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
curl_close($ch);
//echo "Raw Data:<br />";
//echo($data); //En données brutes (string)

//Données sous forme de tableau
$data_tab = str_split($data, 33);
echo "Tabular Data:<br />";
for ($i = 0, $size = count($data_tab); $i < $size; $i++) {
    echo "Trame $i: $data_tab[$i]<br />";
}

//Décoder 1 trame
$trame = $data_tab[0];
// décodage avec des substring
$t = substr($trame, 0, 1);
$o = substr($trame, 1, 4);
// ...
// décodage avec sscanf
list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) = sscanf($trame, "%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
echo ("<br/>$t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec<br/>");

echo ("</br><button id='refresh' class='button'>Refresh data</button>");
//header("Refresh: 2;URL=#");
?>