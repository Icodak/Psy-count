
 $(document).ready(function(){
    $('#file').change(function(){
    var formData = new FormData();
    formData.append('file',$('#file')[0].files[0])
       $.ajax({
        url : 'myDataFonction.php',
        type : 'POST',
        processData: false, 
        contentType: false,  
        data : formData,      
        success : function(code_html, statut){
            location.reload();
         
        },
        error : function(resultat, statut, erreur){       
        },
        complete : function(resultat, statut){
        }
     });
    });
}); 
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

function redirectionDataPage3(){
    document.location.href="DataPage3.php";
}