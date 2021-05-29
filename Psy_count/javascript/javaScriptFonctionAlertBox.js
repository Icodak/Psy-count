

function diagnosticBoxCorrect(text){
    var box = document.createElement("div");
    var text2 = "Ok";
    var button = document.createElement("input");
    var textContainer = document.createElement("h1");
    var buttonContainer = document.createElement("div");

    box.setAttribute("class","alert-box shadow2");
  
    button.setAttribute("class","button-box");
    button.setAttribute("type","button");
    button.setAttribute("value",text2);
    textContainer.setAttribute("class","text-container-box");

    textContainer.textContent=text;

    box.appendChild(textContainer);
    buttonContainer.appendChild(button);
    box.appendChild(buttonContainer);
    
    document.body.appendChild(box);


 
    button.onclick = function() 
    {
        document.location.reload(); 
        document.body.removeChild(box);
    } 
}




