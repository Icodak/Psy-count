<?php
function getData($dbData,$dataType)
{
    try {
        $fetchTemp = $dbData->prepare(
            'SELECT data_date,valeurs
        FROM mesures
        WHERE catégorie=?'
        );
        $fetchTemp->execute(array($dataType));

        $values = $fetchTemp->fetchAll();
        return $values;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function forData($values){
    for ($j = 0; $j <= count($values) - 1; $j++) {
        echo "['" . $values[$j][0] . "'," . $values[$j][1] . "],";
    }
}

function forTable($values){
    for ($j = 0; $j <= count($values) - 1; $j++) {
        echo "<tr><td>" . $values[$j][0] . "</td>";
        echo "<td>" . $values[$j][1] . "</td></tr>";
    }
}
?>

