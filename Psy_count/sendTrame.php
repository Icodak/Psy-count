<?php

function ascii2hex($ascii){
    $hex = bin2hex($ascii);
    $arr = str_split($hex, 2);
    if(preg_match('[d-z]', $ascii)){
        $arr = str_split($hex, 3);
    }
    foreach($arr as $val){
        $val = "0x".$val;
    }
    return $arr;
}

function sendTrame()
{
    /*
    //Envoyer des données
    $tra = "1";
    $tra0 = "0x31";

    $obj = "G10D";
    $obj0 = ascii2hex($obj);
    //$obj0 = "71";
    $obj1 = "49";
    $obj2 = "48";
    $obj3 = "68";

    $req = "1";
    $req0 = "0x32"; //Requete en écriture

    $typ = "3";
    $typ0 = "0x33";

    $num = "01";
    $num0 = "0x30";
    $num1 = "0x31";

    $val = "002B"; //Valeur du capteur
    $val0 = "0x30";
    $val1 = "0x31";
    $val2 = "0x32";
    $val3 = "0x42";

    $tim = "0125"; //Time, ici 1min 25s
    $tim0 = "0x30";
    $tim1 = "0x31";
    $tim2 = "0x32";
    $tim3 = "0x35";

    //Test
    $trameListed = [$tra0, $obj0[0], $obj0[1], $obj0[2], $obj0[3], $req0, $typ0, $num0, $num1, $val0, $val1, $val2, $val3, $tim0, $tim1, $tim2, $tim3];
    //echo($trameListed[2]."</br>");

    $chk = 0;
    foreach($trameListed as $val){
        $chk += hexdec($val);
        echo($chk."</br>");
    }

    $chk = dechex($chk);
    //echo($chk);

    $trame = $tra.$obj.$req.$typ.$num.$val.$tim.$chk;
    echo("Trame envoyée = ".$trame."</br>");*/

    $trame = "1G10D1501000001251B";

    $url = "http://projets-tomcat.isep.fr:8080/appService/?ACTION=COMMAND&TEAM=G10D&TRAME=" . $trame;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_exec($ch);
    
}

if (isset($_POST['send']) && !empty($_POST['send'])) {
    $send = $_POST['send'];
    sendTrame();
}