 
 function checkboxcheck(){
 
   		var element = document.getElementById("checkbox");
   		var button  = document.getElementById("submit");

        if(element.checked==true){
        		button.disabled=false;
        		button.style.backgroundColor ="#B1589E";
        }
        else{
            button.disabled=true;
            button.style.backgroundColor ="grey";
        }
    }


 function faq(texte,element){
    var d1 = document.getElementsByClassName("reponse");
    var d2 = document.getElementsByClassName("question");
    var d3 = element.innerText;
    
    for (let pas = 0; pas < d1.length; pas++) {

        if(d3==texte[pas][0]){


            if(d1[pas].style.display=="none"){
                d1[pas].style.display="block";


            }else{
                d1[pas].style.display="none";
             }
}}}



   





             












