

$(document).ready(function(){
    $("#save-Diagnostic").click(function(){
        if(document.getElementById("file3").disabled==true){
        var text = document.getElementsByClassName("patient-Diagnostic")[0].value;
            $.ajax({
                url : 'myPatientFonction.php',
                type : 'POST',
                data : "patientText=" + text,
                success : function(code_html, statut){
                    diagnosticBoxCorrect("Votre nouveau diagnostic est bien enregistré");
                },
         
                error : function(resultat, statut, erreur){
               
                },
         
                complete : function(resultat, statut){
                }
         
             });
            }  
    });
    
    });

$(document).ready(function(){
    $('#file2').change(function(){
    var formData = new FormData();
    formData.append('file',$('#file2')[0].files[0])
       $.ajax({
        url : 'myPatientFonction.php',
        type : 'POST',
        processData: false, 
        contentType: false,  
        data : formData,      
        success : function(code_html, statut){
            document.location.reload();        
        },
        error : function(resultat, statut, erreur){       
        },
        complete : function(resultat, statut){
        }
     });
    });
}); 

$(document).ready(function(){
    $('#diagnostic-text-doctor').keypress(function(){
        var label  = document.getElementById("file3");
        var button = document.getElementById('save-Diagnostic');
        label.disabled=true;
        button.disabled=false;
        button.style.backgroundColor="#aa3558";
});
});  




  
