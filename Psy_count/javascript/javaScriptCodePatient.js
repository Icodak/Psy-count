

    $(document).ready(function(){
        $('input').click(function(e){  
            var el= e.target; 

                if(el.className=="actionButtonSupprimer"){
                
                    $.ajax({
                        url : "myPatientFonction.php",
                        type : "POST",
                        data :{
                            supp: el.value,
                        },
                        success : function(code_html, statut){
                            document.location.reload();
                        },
                 
                        error : function(resultat, statut, erreur){
                          
                        },
                 
                        complete : function(resultat, statut){
                 
                        }
                 
                     });  
                    } 
                    else if(el.className=="actionButtonAjouter") {
                 
                        $.ajax({
                            url : "myPatientFonction.php",
                            type : "POST",
                            data :{
                                Add1: el.value,
                            },
                            success : function(code_html, statut){
                                document.location.reload();
                            },
                     
                            error : function(resultat, statut, erreur){
                      
                            },
                                       
                            complete : function(resultat, statut){
                     
                            }
                     
                         }); 
                    }

                   else if(el.name=="SelectPatient") {
                  
                        var element  = document.getElementById("select1");                  
                        choice = element.selectedIndex 
                        valeur_cherchee = element.options[choice].value; 
                        $.ajax({
                            url : "myPatientFonction.php",
                            type : "POST",
                            data :{
                                choice: valeur_cherchee,
                            },
                            success : function(code_html, statut){
                                     document.location.reload();                        
                            },
                     
                            error : function(resultat, statut, erreur){
                            },
                                       
                            complete : function(resultat, statut){
                     
                            }
                     
                         }); 
                    }
                        
        });
        
        });


        

function showMenu()
{
    var element1 = document.getElementsByClassName("Menu-And-Text")[0];
    var element2 = document.getElementById("image-Menu2");
    var element3 = document.getElementById("image-Menu");
    var element4 = document.getElementsByClassName("Menu-lines")[0];

    element1.style.border = " 2px solid purple";
    element2.style.display="block";
    element3.style.display="none";
    element4.style.display="block";
}

function HideMenu()
{
    var element1 = document.getElementsByClassName("Menu-And-Text")[0];
    var element2 = document.getElementById("image-Menu2");
    var element3 = document.getElementById("image-Menu");
    var element4 = document.getElementsByClassName("Menu-lines")[0];

    element1.style.border = "none";
    element2.style.display="none";
    element3.style.display="block";
    element4.style.display="none";
}
    


