
function popUpEmail(text,code){
  

    var box = document.createElement("div");
    var text2 = "Valider";
    var button = document.createElement("input");
    var textContainer = document.createElement("h1");
    var buttonContainer = document.createElement("div");
    var passwordContainer = document.createElement("div");

    box.setAttribute("class","alert-box2 shadow2");
    box.setAttribute("id","box-patient-verification");
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
        newInput.maxLength=1;
        passwordContainer.appendChild(newInput);
    }

    $(box).ready(function(){
        console.log(code);

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

    button.onclick = function () {
      verificationInput = document.getElementsByClassName("InputEmailVerification");    
      var passwordStringConfirm ="";
      for(var i=0, n=verificationInput.length;i<n;i++)
      {
            var passwordStringConfirm = passwordStringConfirm+verificationInput[i].value.toString();
      }
      if(passwordStringConfirm===code)
      {
      
        
       var form = document.forms["form1"];
       HTMLFormElement.prototype.submit.call(form);

      }else{
        alert('fail');
      }
    };












    box.appendChild(textContainer);
    box.appendChild(passwordContainer);
    buttonContainer.appendChild(button);
    box.appendChild(buttonContainer);
    
    document.body.appendChild(box);

 
    
}










