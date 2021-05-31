

function create(q_txt, a_txt, id_faq) {
    var contain = document.createElement("div");
    var question = document.createElement("div");
    var question_text = document.createElement("p");
    var arrow = document.createElement("img");
    var answr = document.createElement("div");
    var answr_text = document.createElement("p");
    var edit = document.createElement("img");
    var del = document.createElement("img");
    var confirm = document.createElement("img");
    var q_txt = document.createTextNode(q_txt);
    var a_txt = document.createTextNode(a_txt);
    var div_question = document.getElementById("question-container");

    edit.src = "images/crayon2.png";
    edit.alt = "edit button";
    edit.title = "Edit";
    edit.style.margin = "0px 20px";

    del.src = "images/cross.png";
    del.alt = "Delete button";
    del.title = "Delete";

    confirm.src = "images/confirm.png";
    confirm.alt = "confirm button";
    confirm.style.position = "absolute";
    confirm.style.right = "20px";
    confirm.title = "Confirm";

    arrow.src = "images/flecheBottom.png";
    arrow.alt = "display/hide answer"
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
    question.appendChild(edit);
    question.appendChild(del);
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

    edit.onclick = function () {
        this.display = "none";
        editRow();
    };

    function editRow() {
        while (question.firstChild) {
            question.removeChild(question.lastChild);
        }
        answr.style.display = "flex";

        var question_text = document.createElement("input");
        question_text.type = "text";
        question_text.value = q_txt.data;
        question.appendChild(question_text);
        question.appendChild(confirm);

        answr.removeChild(answr.firstChild);
        var answr_text = document.createElement("input");
        answr_text.type = "text";
        answr_text.value = a_txt.data;
        answr.appendChild(answr_text);


        confirm.onclick = function () {
            $.ajax({
                url: "FAQupdateQuestion.php",
                type: "post",
                dataType: 'json',
                data: {
                    id: id_faq,
                    q: question_text.value,
                    a: answr_text.value
                },
                success: function (result) {
                    document.location.reload()
                }
            });
        }
    };

    del.onclick = function () {
        deleteRow();
    };

    function deleteRow() {
        $.ajax({
            url: "FAQdel.php",
            type: "post",
            dataType: 'json',
            data: {
                id: id_faq
            },
            success: function (result) {
                document.location.reload()
            }
        });
    };
}