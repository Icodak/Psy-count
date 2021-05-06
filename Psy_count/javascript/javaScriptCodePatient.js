

    $(document).ready(function(){
        $('input').click(function(e){  
            var el= e.target; 
                if(el.class="actionButtonSupprimer"){

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
                    if(el.class="actionButtonAjouter") {
                      
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
                   
                
               
        });
        
        });
    


