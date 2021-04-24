

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
    var d3 = element.id;
    
    for (let pas = 0; pas < d1.length; pas++) {

        if(d3==texte[pas][0]){


            if(d1[pas].style.display=="none"){
                d1[pas].style.display="block";
            


            }else{
                d1[pas].style.display="none";
              
             }
}}}



function dataModification(){
    var element = document.getElementById("myDataPage");
    var element2 = document.getElementById("modificationPage");
    element.style.display='none';
    element2.style.display='block';
}



function modificationInformations(element){
    var type = element.className;
    var champ = document.getElementsByClassName(type);
    champ[0].disabled=false;
}




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
        if(element[i].checked!=true){
            for(var p=0, f=button.length;p<f;p++) {
                button[p].disabled=true;
                button[p].style.backgroundColor ="grey";
            }
           
        }else{
            for(var b=0, d=button.length;b<d;b++) {
                button[b].disabled=false;
                button[b].style.backgroundColor ="#BB66BF";       
            } 
            break;
        }
    }
}

function verifyOneCheckBox(){
    var count =0;
    var element = document.getElementsByClassName("checkBoxUtilisateurs");
    for(var i=0, n=element.length;i<n;i++) {
        if(element[i].checked==true){
            count+=1;
        }
    }
    if(count>1){
        return true;
    }else{
        return false;
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




    $(document).ready(function(){
 
        $("#banButton").click(function(){
          
    
    
        checkboxes = document.getElementsByName('checkBoxGestion');
        var tableau = new Array(checkboxcheck.length);
        if (confirm("Voulez vous vraiment bannir ces utilisateurs ?"))
    {
        for(var i=0, n=checkboxes.length;i<n;i++) {
            if(checkboxes[i].checked ==true){
                tableau[i]=checkboxes[i].id;
                $.ajax({
                    url : 'gestionFonction.php',
                    type : 'POST',
                    data : "idTable2=" + tableau[i],
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
    




$(document).ready(function(){
 
        $("#ModifierButton").click(function(){
    
         if(verifyOneCheckBox()) 
         {
            alert('vous ne pouvez modifier qu\'un seul utilisateurs à la fois'); 


         }else{
            checkboxes = document.getElementsByName('checkBoxGestion');
            for(var i=0, n=checkboxes.length;i<n;i++) {
                if(checkboxes[i].checked ==true){
                    $.ajax({
                        url : 'gestionFonction.php',
                        type : 'POST',
                        data : "ModificationButton=" + checkboxes[i].id,
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












    




