

function diagnosticBoxCorrect(){
    var box = document.createElement("div");
    var text = "Le nouveau diagnostic est bien enregistré";
    var text2 = "Fermer";
    var button = document.createElement("input");
    var textContainer = document.createElement("h1");

    box.setAttribute("class","alert-box shadow2");
    button.setAttribute("class","button-box");
    button.setAttribute("type","button");
    button.setAttribute("value",text2);
    textContainer.setAttribute("class","text-container-box");

    textContainer.textContent=text;

    box.appendChild(textContainer);
    box.appendChild(button);

    document.body.appendChild(box);


    button.onclick = function() 
    {
        document.body.removeChild(box);


    }
}

function diagnosticBoxIncorrect(){


}