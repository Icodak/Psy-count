google.charts.load('current', {
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
}