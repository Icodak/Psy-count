<?php
$dbData = new PDO("mysql:host=localhost;dbname=serveur_psy_fi", 'root', '');
$dbData->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Récupérer les données de la BDD SQL
function getData($dbData, $dataType)
{
    try {
        $fetchTemp = $dbData->prepare(
            'SELECT data_date,valeurs
        FROM mesures
        WHERE catégorie=?'
        );

        if ($dataType == "Reflexes") { 
            //TODO : prendre en compte les 3 tests -> issues with JS?
            /*
            $fetchTemp->execute(array("Ref_audio"));
            $values0 = $fetchTemp->fetchAll();
            //var_dump($values0);
            $fetchTemp->execute(array("Ref_visuel1"));
            $values2 = $fetchTemp->fetchAll();
            //var_dump($values2);
            $fetchTemp->execute(array("Ref_visuel2"));
            $values3 = $fetchTemp->fetchAll();
            //var_dump($values3);
            $valuesT = array_push($values, $values2, $values3);
            //var_dump($valuesT);
            
            return $valuesT;
            */   
        }

        $fetchTemp->execute(array($dataType));
        $values = $fetchTemp->fetchAll();
        return $values;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function forData($values)
{
    for ($j = 0; $j <= count($values) - 1; $j++) {
        echo $values[$j][0] . ";" . $values[$j][1] . ";";
    }
}

//Création d'un tableau contenant les valeurs de la BDD
function forTable($values)
{
    for ($j = 0; $j <= count($values) - 1; $j++) {
        echo "<tr><td>" . $values[$j][0] . "</td>";
        echo "<td>" . $values[$j][1] . "</td></tr>";
    }
}

//Requête AJAX dans myData_Fonction -> création de google chart DataTable
if (isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    $values = getData($dbData, $action);
    forData($values);
}
