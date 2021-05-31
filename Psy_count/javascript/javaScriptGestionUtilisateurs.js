
function unlockSearchInput() {
    $('#tableau').load('myPatient.php #tableau');
    var inputToUnlock = document.getElementsByClassName("search-div");
    for (let pas = 0; pas < inputToUnlock.length; pas++) {
        inputToUnlock[pas].childNodes[0].disabled = false;
    }
    document.getElementById("searchButton").disabled = false;

}



function allSelect(source) {
    checkboxes = document.getElementsByName('checkBoxGestion');
    for (var i = 0, n = checkboxes.length; i < n; i++) {
        checkboxes[i].checked = source.checked;
    }
    checkboxcheckGestionsUtilisateurs();
}

function checkboxcheckGestionsUtilisateurs() {

    var element = document.getElementsByClassName("checkBoxUtilisateurs");
    var button = document.getElementsByClassName("buttonAction");

    for (var i = 0, n = element.length; i < n; i++) {
        if (element[i].checked != true) {
            for (var p = 0, f = button.length; p < f; p++) {

                button[p].disabled = true;
                button[p].style.backgroundColor = "grey";

            }
            
        }else{
            for(var b=0, d=button.length;b<d;b++) {
                button[b].disabled=false;
                button[b].style.backgroundColor ="#aa3558";       
            } 
            break;
        }
    }
    if (verifyOneCheckBox()) {
        button[0].disabled = true;
        button[0].style.backgroundColor = "grey";
    }
}


function verifyZeroCheckBox() {
    var count = 0;
    var element = document.getElementsByClassName("checkBoxUtilisateurs");
    for (var i = 0, n = element.length; i < n; i++) {
        if (element[i].checked == true) {
            count += 1;
        }
    }
    if (count = 0) {
        return true;
    } else {
        return false;
    }
}


function verifyOneCheckBox() {
    var count = 0;
    var element = document.getElementsByClassName("checkBoxUtilisateurs");
    for (var i = 0, n = element.length; i < n; i++) {
        if (element[i].checked == true) {
            count += 1;
        }
    }
    if (count > 1) {
        return true;
    } else {
        return false;
    }
}


$(document).ready(function () {

    $("#SuppButton").click(function () {


                checkboxes = document.getElementsByName('checkBoxGestion');
                var tableau = new Array(checkboxes.length);
                if (confirm("Voulez vous vraiment supprimer ces utilisateurs ?")) {
                    for (var i = 0; i < checkboxes.length; i++) {
                        if (checkboxes[i].checked == true) {
                            tableau[i] = checkboxes[i].id;
                            $.ajax({
                                url: 'gestionFonction.php',
                                type: 'POST',
                                data: "idTable=" + tableau[i],
                                success: function (code_html, statut) {
                                    document.location.reload();
                                },

                                error: function (resultat, statut, erreur) {

                                },

                                complete: function (resultat, statut) {

                                }

                            });



                        }

                    }

                }
    });
});




$(document).ready(function () {
                $("#ModifierButton").click(function () {

                    if (verifyOneCheckBox()) {
                        alert('vous ne pouvez modifier qu\'un seul utilisateurs à la fois');


                    } else {
                        checkboxes = document.getElementsByName('checkBoxGestion');
                        for (var i = 0, n = checkboxes.length; i < n; i++) {
                            if (checkboxes[i].checked == true) {
                                $.ajax({
                                    url: 'gestionFonction.php',
                                    type: 'POST',
                                    data: "ModificationButton=" + checkboxes[i].id,
                                    success: function (code_html, statut) {
                                        document.location.reload();
                                    },

                                    error: function (resultat, statut, erreur) {

                                    },

                                    complete: function (resultat, statut) {

                                    }

                                });

                            }

                        }

                    }
    });
});


$(document).ready(function () {
    $('#select1').change(function () {
        var selection = document.getElementById("select1");
        $.ajax({
            url: 'myPatientFonction.php',
            type: 'POST',
            data: "choice=" + selection.value,
            success: function (code_html, statut) {
                unlockSearchInput();
            },

            error: function (resultat, statut, erreur) {

            },

            complete: function (resultat, statut) {

            }

        });

    });

});

$(document).ready(function () {
    $('#AjouterButton').click(function () {
        var selection = document.getElementById("AjouterButton");

        $.ajax({
            url: 'gestionFonction.php',
            type: 'POST',
            data: "Ajouter=" + selection.value,
            success: function (code_html, statut) {
                document.location.reload();
            },

            error: function (resultat, statut, erreur) {

            },

            complete: function (resultat, statut) {

            }

        });

    });

});

