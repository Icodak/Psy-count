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
//echo "Tabular Data:<br />";
/*for ($i = 0, $size = count($data_tab); $i < $size; $i++) {
    echo "Trame $i: $data_tab[$i]<br />";
}*/

//Décoder 1 trame
$trame = $data[0] . $data_tab[count($data_tab) - 1];
// décodage avec des substring
$t = substr($trame, 0, 1);
$o = substr($trame, 1, 4);
// ...
// décodage avec sscanf
list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) = sscanf($trame, "%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
echo ("<br/> Dernière Trame reçue (" . (count($data_tab) - 1) . "): $t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec<br/>");

//echo ("</br><button id='refresh' class='button'>Refresh data</button>");

include("testTrame_sql.php");

if (isset($_SESSION["trame_Date"]) && (intval($hour) >= $_SESSION["trame_Date"][0]) && (intval($min) > $_SESSION["trame_Date"][1])) {
    if ($c = '5') {
        $cat = 'Ref_visuel';
    };
    $data_date = $year . "-" . $month . "-" . $day;
    trame2db($data_date, $cat, $a);
}

$array_trameDate = [intval($hour), intval($min), intval($sec)];
$_SESSION["trame_Date"] = $array_trameDate;
//header("Refresh: 2;URL=#");
