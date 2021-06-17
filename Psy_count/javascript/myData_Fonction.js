var typeMesure; var msgGraphe;
//Requête -> récupère le type de données et le titre des graphes
$.ajax({
    async: false,
    url: 'myData_getSession.php',
    type: 'POST',
    data: {
        session: 'session'
    },
    success: function (data) {
        console.log(data);
        var array_data = data.split(';');
        console.log(array_data);

        typeMesure = array_data[0];
        msgGraphe = array_data[1];
        console.log(typeMesure);
        console.log(msgGraphe);
    }
});

var endMe1 = true; var endMe2 = true;

//Responsivité des graphes -> refresh on window size change
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

//Création des graphes -> API Google Charts
google.charts.load('current', {
    'packages': ['corechart']
});

function pieChart() {
    $.ajax({
        url: 'myData_Fonction.php',
        data: { action: typeMesure },
        type: 'POST',
        success: function (result) {
            //Manipulation des données -> .addRow n'accepte que des array(type:string,type:float)
            console.log(result);
            var array_data = result.split(';'); //Array : ["date1","var1","date2","var2",...,"\r\n"]
            array_data.pop(); //Supprime \r\n
            console.log(array_data);

            var size = 2; var arrayOfArrays = []; //Slice into arrays sans détruire l'array originel
            for (var i = 0; i < array_data.length; i += size) {
                arrayOfArrays.push(array_data.slice(i, i + size)); //Array : [["date1","var1"],["",""],...]
            }
            console.log(arrayOfArrays);

            //Création de la table de données -> Il faut séparer les dates/mesures
            var array_dataDate = [];
            var array_dataValue = [];
            for (var i = 0; i < arrayOfArrays.length; i++) {
                array_dataDate.push(arrayOfArrays[i][0]);
                array_dataValue.push(parseFloat(arrayOfArrays[i][1])); //Attention : Type de données accepté = float
            }
            console.log(array_dataDate);
            console.log(array_dataValue);

            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Date du test');
            data.addColumn('number', 'Valeur');

            for (i = 0; i < array_dataDate.length; i++)
                data.addRow([array_dataDate[i], array_dataValue[i]]);

            var options = {
                title: "Graphe de l'évolution de" + msgGraphe,
            };
            var chart = new google.visualization.PieChart(document.getElementById('pieChart'));

            chart.draw(data, options);

            //Voir fonction windowResize
            if (endMe1 === true) {
                chart.draw(data, options);
                endMe1 = false;
            } else {
                chart.clearChart();
                endMe1 = true;
            }
        }
    });

}

function lineChart() {
    //TODO : Créer une fonction pour éviter la duplication de code
    $.ajax({
        url: 'myData_Fonction.php',
        data: { action: typeMesure },
        type: 'POST',
        success: function (result) {
            console.log(result);

            var array_data = result.split(';');
            array_data.pop();
            console.log(array_data);

            var size = 2; var arrayOfArrays = [];
            for (var i = 0; i < array_data.length; i += size) {
                arrayOfArrays.push(array_data.slice(i, i + size));
            }
            console.log(arrayOfArrays);

            var array_dataDate = [];
            var array_dataValue = [];
            for (var i = 0; i < arrayOfArrays.length; i++) {
                array_dataDate.push(arrayOfArrays[i][0]);
                array_dataValue.push(parseFloat(arrayOfArrays[i][1]));
            }
            console.log(array_dataDate);
            console.log(array_dataValue);

            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Date du test');
            data.addColumn('number', 'Valeur');

            for (i = 0; i < array_dataDate.length; i++)
                data.addRow([array_dataDate[i], array_dataValue[i]]);

            var options = {
                title: "Courbe de l'évolution de" + msgGraphe,
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
    });

}

//Hide/Show du tableau des données
function display(id) {
    var table = document.getElementById(id);
    if (table.style.display == "") {
        table.style.display = "block";

    } else if (table.style.display == "block") {
        table.style.display = "";
    }
}

$(function () {
    $("#refresh").click(function () {
        $("#trame").load("testTrame.php");
    });
});

$(function () {
    $("#sendTrame").click(function () {
        $.ajax({
            url: 'sendTrame.php',
            data: { send: 'on' },
            type: 'post',
            success: function (output) {
                console.log(output);
            }
        });
    });
});