<?php
function trame2db($data_date, $cat, $val)
{
    try {
        $dbData = new PDO("mysql:host=localhost;dbname=serveur_psy_fi", 'root', '');
        $dbData->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO mesures (ID_Mesure, data_date,catégorie,valeurs)
        VALUES('', '$data_date','$cat','$val')";
        $dbData->exec($sql);
    } catch (Exception $e) {
        echo "Erreur :", $e->getMessage(), "\n";
    }
}
