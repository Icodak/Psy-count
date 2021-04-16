

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


function allSelect(source){
    checkboxes = document.getElementsByName('checkBoxGestion');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
  checkboxcheckGestionsUtilisateurs();
}



function checkboxcheckGestionsUtilisateurs(){

    var element = document.getElementsByClassName("checkBoxUtilisateurs");
    var button  = document.getElementsByClassName("button4");

    for(var i=0, n=element.length;i<n;i++) {

        if(element[i].checked==true){
            for(var i=0, n=button.length;i<n;i++) {
            button[i].disabled=false;
            button[i].style.backgroundColor ="#B1589E";
            }
        } else{
            for(var i=0, n=button.length;i<n;i++) {
            button[i].disabled=true;
            button[i].style.backgroundColor ="grey";
            }
        }
    }
   

    
}




$(document).ready(function(){
 
    $("#SuppButton").click(function(){


    checkboxes = document.getElementsByName('checkBoxGestion');
    var tableau = new Array(checkboxcheck.length);
    if (confirm("Voulez vous vraiment supprimer ces utilisateurs ?"))
{
    for(var i=0, n=checkboxes.length;i<n;i++) {
        if(checkboxes[i].checked ==true){
            tableau[i]=checkboxes[i].id;
            $.ajax({
                url : 'gestionFonction.php',
                type : 'POST',
                data : "idTable=" + tableau[i],
                success : function(code_html, statut){
                    document.location.reload();
                },
         
                error : function(resultat, statut, erreur){
                  
                },
         
                complete : function(resultat, statut){
         
                }
         
             });
        }

      }
    }


        
    
    });
    
    });
















    




