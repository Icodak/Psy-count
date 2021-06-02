

    $(document).ready(function(){
        $('input').click(function(e){  
            var el= e.target; 


                if(el.className==="actionButtonSupprimer"){
                    if(confirm("Voulez vous vraiment supprimer ce patient ?"))
                    {
                    $.ajax({
                        url : "gestion_des_patients/supprimerPatient.php",
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
                }
                    else if(el.className==="actionButtonAjouter") {
                 
                        $.ajax({
                            url : "gestion_des_patients/addPatient.php",
                            type : "POST",
                            data :{
                                Add1: el.value,
                            },
                            success : function(code_html, statut){
                                diagnosticBoxCorrect("Nouveau patient ajouté avec succés");                              
                            },
                     
                            error : function(resultat, statut, erreur){
                      
                            },
                                       
                            complete : function(resultat, statut){
                     
                            }
                     
                         }); 
                    }

                   else if(el.name==="SelectPatient") {
                  
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



$(document).ready(function () {
    $('#select1').change(function () {
         var selection = document.getElementById("select1");
        $.ajax({
                    url: 'gestion_des_patients/selectTable.php',
                    type: 'POST',
                    data: "choice=" + selection.value,
                    success: function (code_html, statut) {
                        document.location.reload();
                       
                    },
        
                    error: function (resultat, statut, erreur) {
        
                    },
        
                    complete: function (resultat, statut) {
        
                    }
        
                });
        
            });
        
        });


  







