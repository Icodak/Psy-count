$(document).ready(function(){
    $("#save-Diagnostic").click(function(){

    var text = document.getElementsByClassName("patient-Diagnostic")[0].value;
            $.ajax({
                url : 'myPatientFonction.php',
                type : 'POST',
                data : "patientText=" + text,
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
            alert(code_html);    
        },
        error : function(resultat, statut, erreur){       
        },
        complete : function(resultat, statut){
        }
     });
    });
}); 