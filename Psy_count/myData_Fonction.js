/*google.charts.load('current', {
    'packages': ['corechart']
});

function chart(chartType, data, type1, type2) {
    alert("TEST");
    if (chartType == 'pieChart') { //inverser data pour piechart
        var options = {
            title: "Graphe de l'évolution de la température superficielle",
        };
        var chart = new google.visualization.PieChart(type1);
    } else if (chartType == 'lineChart') {
        var options = {
            title: "Courbe de l'évolution de la température superficielle",
            curveType: 'function',
            legend: {
                position: 'bottom'
            }
        };
        var chart = new google.visualization.LineChart(type2);
    }

    chart.draw(data, options);
    return chart;
}

function test(){
    alert("I wanna die");
}*/

var endMe1 = true;
var endMe2 = true;
window.addEventListener('resize', reportWindowSize);

function reportWindowSize() {
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
        ['2021-05-29',9000], //recup le php $array_data en ajax là
        /*<?php
        for ($j = 0; $j <= count($array_data_date) - 1; $j++) {
            echo "['" . $array_data_value[$j] . "'," . $array_data_date[$j] . "],";
        }
        ?>*/
    ]);

    //Grouper si data[?][i] = data[?][i+1] et retourner dans data [?][i] ???

    var options = {
        title: "Graphe de l'évolution de ???", //Changer selon la page
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
        ['2021-05-29',9000], //recup le php $array_data en ajax là
        /*
        <?php
        for ($j = 0; $j <= count($array_data_date) - 1; $j++) {
            echo "['" . $array_data_date[$j] . "'," . $array_data_value[$j] . "],";
        }
        ?>*/
    ]);

    var options = {
        title: "Courbe de l'évolution de ???",  //Changer selon la page
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
        table.style.display = "block";

    } else if (table.style.display == "block") {
        table.style.display = "";
    }
}