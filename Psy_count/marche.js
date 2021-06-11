
var marche = function () {
    $.ajax({
        url: "http://projets-tomcat.isep.fr:8080/appService/?ACTION=GETLOG&TEAM=G10D", type: "GET",
        /* dataType: 'JSON', */
    })
        .done(function (result) {
            console.log(result);
        })
        .fail(function (xhr, thrownError) {
            console.log(xhr);
            console.log(thrownError);
        })
}