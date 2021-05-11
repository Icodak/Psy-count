// Page divisée en deux partie la premiere en francais la deuxieme en anglais, toute modification apportée à l'une doit etre apportée à l'autre


var click = "true";



 function checkboxcheck(){
 
   		var element = document.getElementById("checkbox");
   		var button  = document.getElementById("submit");

        if(element.checked==true){
        		button.disabled=false;
        		button.style.backgroundColor ="#aa3558";
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
    if(click=="true"){
    element.style.transform="rotate(0.5turn)";
    click="false";
    }else{
        element.style.transform="rotate(0turn)";
        click="true";
    }
    
    for (let pas = 0; pas < d1.length; pas++) {

        if(d3==texte[pas][0]){


            if(d1[pas].style.display=="none"){
                d1[pas].style.display="block";
            


            }else{
                d1[pas].style.display="none";
              
             }
}}}

function redirectionDataPage3(){
    document.location.href="DataPage3.php";
}

function dataModification(){
    document.location.href="DataPage2.php";
}


function ReversedataModification(){
    document.location.href="myData.php";
}

function requestContact(){
    document.location.href="contactPatient.php";
}

function translateEn(){
    var urlString = window.location.toString().split(".php");
    window.location.replace(urlString[0] + "EN.php" + urlString[1]);
    alert('ok');
}

function locationAccueil(){
    document.location.href="accueil.php";
}

function hidePassword(){
    elements = document.getElementsByClassName("showHide");
    elements2 = document.getElementsByClassName("passwordImage2"); 
    elements3 = document.getElementsByClassName("passwordImage"); 

    for(var i=0, n=elements.length;i<n;i++) {
        if(elements[i].type=="password"){
        elements[i].type="text";
        elements2[0].style.display="block";
        elements3[0].style.display="none";
        }else{
        elements[i].type="password"; 
        elements2[0].style.display="none";
        elements3[0].style.display="block";  
        }
      }
}

function hidePassword2(){
    elements = document.getElementsByClassName("showHide2");
    elements2 = document.getElementsByClassName("passwordImage2"); 
    elements3 = document.getElementsByClassName("passwordImage"); 
   
    for(var i=0, n=elements.length;i<n;i++) {
        if(elements[i].type=="password"){
        elements[i].type="text";
        elements2[1].style.display="block";
        elements3[1].style.display="none";
        }else{
        elements[i].type="password"; 
        elements2[1].style.display="none";
        elements3[1].style.display="block";   
        }
      }
}



function ActiveInputDataPage(){
    var champ = document.getElementsByClassName("datainput");
    for(var i=0, n=champ.length;i<n;i++) {
        champ[i].disabled=false;
      }
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
                button[b].style.backgroundColor ="#aa3558";       
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

// Partie adaptée au pages en anglais si des choses sont modifié dans la partie en francais il faut les madifier ici aussi

        var click = "true";



        function checkboxcheck(){
        
                  var element = document.getElementById("checkbox");
                  var button  = document.getElementById("submit");
       
               if(element.checked==true){
                       button.disabled=false;
                       button.style.backgroundColor ="#aa3558";
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
           if(click=="true"){
           element.style.transform="rotate(0.5turn)";
           click="false";
           }else{
               element.style.transform="rotate(0turn)";
               click="true";
           }
           
           for (let pas = 0; pas < d1.length; pas++) {
       
               if(d3==texte[pas][0]){
       
       
                   if(d1[pas].style.display=="none"){
                       d1[pas].style.display="block";
                   
       
       
                   }else{
                       d1[pas].style.display="none";
                     
                    }
       }}}
       
       function redirectionDataPage3(){
           document.location.href="DataPage3EN.php";
       }
       
       function dataModification(){
           document.location.href="DataPage2EN.php";
       }
       
       
       function ReversedataModification(){
           document.location.href="myDataEN.php";
       }
       
       function requestContact(){
           document.location.href="contactPatientEN.php";
       }
       
       function translateFR(){
        var urlString = window.location.toString().split("EN.php");
        window.location.replace(urlString[0] + ".php" + urlString[1]);
          
       }
       
       function locationAccueil(){
           document.location.href="accueilEN.php";
       }
       
       function hidePassword(){
           elements = document.getElementsByClassName("showHide");
           elements2 = document.getElementsByClassName("passwordImage2"); 
           elements3 = document.getElementsByClassName("passwordImage"); 
       
           for(var i=0, n=elements.length;i<n;i++) {
               if(elements[i].type=="password"){
               elements[i].type="text";
               elements2[0].style.display="block";
               elements3[0].style.display="none";
               }else{
               elements[i].type="password"; 
               elements2[0].style.display="none";
               elements3[0].style.display="block";  
               }
             }
       }
       
       function hidePassword2(){
           elements = document.getElementsByClassName("showHide2");
           elements2 = document.getElementsByClassName("passwordImage2"); 
           elements3 = document.getElementsByClassName("passwordImage"); 
          
           for(var i=0, n=elements.length;i<n;i++) {
               if(elements[i].type=="password"){
               elements[i].type="text";
               elements2[1].style.display="block";
               elements3[1].style.display="none";
               }else{
               elements[i].type="password"; 
               elements2[1].style.display="none";
               elements3[1].style.display="block";   
               }
             }
       }
       
       
       
       function ActiveInputDataPage(){
           var champ = document.getElementsByClassName("datainput");
           for(var i=0, n=champ.length;i<n;i++) {
               champ[i].disabled=false;
             }
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
                       button[b].style.backgroundColor ="#aa3558";       
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
           if (confirm("Are you sure you want to delete these users?"))
       {
           for(var i=0, n=checkboxes.length;i<n;i++) {
               if(checkboxes[i].checked ==true){
                   tableau[i]=checkboxes[i].id;
                   $.ajax({
                       url : 'gestionFonctionEN.php',
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
               if (confirm("Are you sure you want to ban these users?"))
           {
               for(var i=0, n=checkboxes.length;i<n;i++) {
                   if(checkboxes[i].checked ==true){
                       tableau[i]=checkboxes[i].id;
                       $.ajax({
                           url : 'gestionFonctionEN.php',
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
                   alert('you can only edit one user at a time'); 
       
       
                }else{
                   checkboxes = document.getElementsByName('checkBoxGestion');
                   for(var i=0, n=checkboxes.length;i<n;i++) {
                       if(checkboxes[i].checked ==true){
                           $.ajax({
                               url : 'gestionFonctionEN.php',
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
       
       
       
       
       
       
       
       
       
       
       
       
           
       
       
       
       
       









    




