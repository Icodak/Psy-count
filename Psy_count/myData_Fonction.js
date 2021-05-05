google.charts.load('current', {
    'packages': ['corechart']
});

function chart(chartType, data) {
    alert("TEST");
    if (chartType === 'pieChart') { //inverser data pour piechart
        var options = {
            title: "Graphe de l'évolution de la température superficielle",
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    } else if (chartType === 'lineChart') {
        var options = {
            title: "Courbe de l'évolution de la température superficielle",
            curveType: 'function',
            legend: {
                position: 'bottom'
            }
        };
        var chart = new google.visualization.LineChart(document.getElementById('linechart'));
    }

    chart.draw(data, options);

    //Afficher/Désafficher
    if (chart.display === "none") {
        document.querySelector("#piechart").hidden = true;

    } else if (chart.display === "block") {
        document.querySelector("#piechart").hidden = false;
    }
}

function test(){
    alert("I wanna die");
}