
var click = "true";

function checkboxcheck() {

    var element = document.getElementById("checkbox");
    var button = document.getElementsByClassName("create-account")[0];

    if (element.checked == true) {
        button.disabled = false;
        button.style.backgroundColor = "#aa3558";
    }
    else {
        button.disabled = true;
        button.style.backgroundColor = "grey";
    }
}

function faq(texte, element) {
    var d1 = document.getElementsByClassName("reponse");
    var d2 = document.getElementsByClassName("question");
    var d3 = element.id;
    if (click == "true") {
        element.style.transform = "rotate(0.5turn)";
        click = "false";
    } else {
        element.style.transform = "rotate(0turn)";
        click = "true";
    }

    for (let pas = 0; pas < d1.length; pas++) {

        if (d3 == texte[pas][0]) {


            if (d1[pas].style.display == "none") {
                d1[pas].style.display = "block";



            } else {
                d1[pas].style.display = "none";

            }
        }
    }
}

function redirectionDataPage3() {
    document.location.href = "DataPage3.php";
}

function dataModification() {
    document.location.href = "DataPage2.php";
}


function ReversedataModification() {
    document.location.href = "myData.php";
}

function requestContact() {
    document.location.href = "contactPatient.php";
}

function locationAccueil() {
    document.location.href = "accueil.php";
}

function locationMyData() {
    document.location.href = "myPatient2.php";
}

function returnGestionPatient() {
    document.location.href = "myPatient.php";
}


function hidePassword() {
    elements = document.getElementsByClassName("showHide");
    elements2 = document.getElementsByClassName("passwordImage2");
    elements3 = document.getElementsByClassName("passwordImage");

    for (var i = 0, n = elements.length; i < n; i++) {
        if (elements[i].type == "password") {
            elements[i].type = "text";
            elements2[0].style.display = "block";
            elements3[0].style.display = "none";
        } else {
            elements[i].type = "password";
            elements2[0].style.display = "none";
            elements3[0].style.display = "block";
        }
    }
}

function hidePassword2() {
    elements = document.getElementsByClassName("showHide2");
    elements2 = document.getElementsByClassName("passwordImage2");
    elements3 = document.getElementsByClassName("passwordImage");

    for (var i = 0, n = elements.length; i < n; i++) {
        if (elements[i].type == "password") {
            elements[i].type = "text";
            elements2[1].style.display = "block";
            elements3[1].style.display = "none";
        } else {
            elements[i].type = "password";
            elements2[1].style.display = "none";
            elements3[1].style.display = "block";
        }
    }
}



function ActiveInputDataPage() {
    var champ = document.getElementsByClassName("datainput");
    for (var i = 0, n = champ.length; i < n; i++) {
        champ[i].disabled = false;
    }
}


function modificationInformations(element) {
    var type = element.className;
    var champ = document.getElementsByClassName(type);
    champ[0].disabled = false;
}








function create(q_txt, a_txt, id_faq) {
    var contain = document.createElement("div");
    var question = document.createElement("div");
    var question_text = document.createElement("p");
    var arrow = document.createElement("img");
    var answr = document.createElement("div");
    var answr_text = document.createElement("p");
    var q_txt = document.createTextNode(q_txt);
    var a_txt = document.createTextNode(a_txt);
    var div_question = document.getElementById("question-container");

    arrow.src = "images/flecheBottom.png";
    answr.style.display = "none";

    contain.className = "container white-background";
    question.className = "question";
    arrow.className = "arrow";
    answr.className = "answer";

    question.appendChild(question_text);
    question.appendChild(arrow);
    answr.appendChild(answr_text);
    contain.appendChild(question);
    contain.appendChild(answr);
    question_text.appendChild(q_txt);
    answr_text.appendChild(a_txt);
    div_question.appendChild(contain);

    arrow.onclick = function () {
        var color = $(answr).css('display');
        if (color == "flex") {
            answr.style.display = "none";
            arrow.src = "images/flecheBottom.png";
        } else {
            answr.style.display = "flex";
            arrow.src = "images/flecheUp.png";
        }
    };

}





function create(q_txt, a_txt, id_faq) {
    var contain = document.createElement("div");
    var question = document.createElement("div");
    var question_text = document.createElement("p");
    var arrow = document.createElement("img");
    var answr = document.createElement("div");
    var answr_text = document.createElement("p");
    var q_txt = document.createTextNode(q_txt);
    var a_txt = document.createTextNode(a_txt);
    var div_question = document.getElementById("question-container");

    arrow.src = "images/flecheBottom.png";
    arrow.alt = "display/hide answer";
    answr.style.display = "none";

    contain.className = "container white-background";
    question.className = "question";
    arrow.className = "arrow";
    answr.className = "answer";

    question.appendChild(question_text);
    question.appendChild(arrow);
    answr.appendChild(answr_text);
    contain.appendChild(question);
    contain.appendChild(answr);
    question_text.appendChild(q_txt);
    answr_text.appendChild(a_txt);
    div_question.appendChild(contain);

    arrow.onclick = function () {
        var color = $(answr).css('display');
        if (color == "flex") {
            answr.style.display = "none";
            arrow.src = "images/flecheBottom.png";
        } else {
            answr.style.display = "flex";
            arrow.src = "images/flecheUp.png";
        }
    };

}







