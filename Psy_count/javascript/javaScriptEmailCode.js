
function popUpEmail(text,code){

    var box = document.createElement("div");
    var text2 = "Valider";
    var button = document.createElement("input");
    var textContainer = document.createElement("h1");
    var buttonContainer = document.createElement("div");
    var passwordContainer = document.createElement("div");

    box.setAttribute("class","alert-box2 shadow2");
    passwordContainer.setAttribute("class","passwordInput");
    button.setAttribute("id","submit-valdiation-code")
    button.setAttribute("class","button-box");
    button.setAttribute("type","button");
    button.setAttribute("value",text2);
    textContainer.setAttribute("class","text-container-box");
    textContainer.textContent=text;


    for (let pas = 0; pas < 8; pas++) {
        var newInput = document.createElement("input");
        newInput.setAttribute("class","InputEmailVerification");
        passwordContainer.appendChild(newInput);
    }


    box.appendChild(textContainer);
    box.appendChild(passwordContainer);
    buttonContainer.appendChild(button);
    box.appendChild(buttonContainer);
    
    document.body.appendChild(box);
    

    $(document).ready(function(){
        $('#submit-valdiation-code').click(function(){
           
            $.ajax({
                url : 'confirmationMail.php',
                type : 'POST',
                data : "code=" + code,
                success : function(code_html, statut){
                    alert(code_html);
                },
         
                error : function(resultat, statut, erreur){
                  
                },
         
                complete : function(resultat, statut){
         
                }
         
             });
    
        });
    }); 

}

function getRandomInt(max) {
    return Math.floor(Math.random() * max);
}




