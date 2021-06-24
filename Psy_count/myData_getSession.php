<?php
session_start();
//Requête AJAX dans myData_Fonction -> savoir quel type de Data on souhaite afficher
if (isset($_SESSION['dataType']) && !empty($_SESSION['dataType'])) {
    if (isset($_POST['session']) && !empty($_POST['session'])) {
        echo ($_SESSION['dataType']);
        if ($_SESSION['dataType'] == "Cardiaque") {
            echo "; la Fréquence Cardiaque.";
        }
        if ($_SESSION['dataType'] == "Temperature") {
            echo "; la Température superficielle de la peau.";
        }
        if ($_SESSION['dataType'] == "Tonalite") {
            echo "; scores des tests de Tonalité.";
        }
        if ($_SESSION['dataType'] == "Ref_visuel") {
            echo "; scores des tests de Réflexes.";
        }
    }
}

