













function prenomNomVerification(nomOrPrenom,inputForm){
    var nomPrenomRegex = new RegExp("^[A-Z][A-Za-z\é\è\ê\-]+$");
    if(nomOrPrenom===""){
        inputForm.style.border = "4px solid red";
        return false; 
    }else if(nomPrenomRegex.test(nomOrPrenom)==false){
        inputForm.style.border = "4px solid red";
        return false;
    }else{
        inputForm.style.border = "none";
        return true
    }
    
}

function dateDeNaissanceVerification(date,inputForm){
    return false;
    
}

function codePostalVerification(code,inputForm){
    var codePostalRegex = new RegExp("[0-9]{5}");
    if(code===""){
        inputForm.style.border = "4px solid red";
        return false;
    }else if(codePostalRegex.test(code)==false){
        return false;
    }else{
        inputForm.style.border = "none";
        return true;
    }
   
}


function EmailVerification(email,inputForm){
    var EmailRegex = new RegExp("^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$");

    if(email===""){
        inputForm.style.border = "4px solid red";
        return false;
    }else if(EmailRegex.test(email)==false){
        inputForm.style.border = "4px solid red";
        return false;
    }else{
        inputForm.style.border = "none";
        return true;
    }


    
    
}
function motDePasseVerification(mdp,mdp2,inputForm1,inputForm2){
    var mdpRegex = new RegExp("^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$");

    if(mdp!=mdp2)
    {
        inputForm1.style.border = "4px solid red";
        inputForm2.style.border = "4px solid red";
        return false;
    }else if(mdpRegex.test(mdp)==false){
        inputForm1.style.border = "4px solid red";
        inputForm2.style.border = "4px solid red";
        return false;
    }else{
        inputForm1.style.border = "none";
        inputForm2.style.border = "none";
        return true;
    }

 
}


function formVerificationPatient(){
    var ici =  document.forms[0];
    var input1 = ici['FirstName'];
    var input2 = ici['LastName'];
    var input3 = ici['dateDeNaissance'];
    var input4 = ici['Email'];
    var input5 = ici['Password'];
    var input6 = ici['password_verify'];

    var email = ici['Email'].value;
    var mdp1 = ici['Password'].value;
    var mdp2 = ici['password_verify'].value;
    var prenom = ici['FirstName'].value;
    var nom = ici['LastName'].value;
    var date = ici['dateDeNaissance'].value;

    var result1 = prenomNomVerification(prenom,input1);
    var result2 = prenomNomVerification(nom,input2);
    var result3 = EmailVerification(email,input4);
    var result4 = motDePasseVerification(mdp1,mdp2,input5,input6);
    var result5 = dateDeNaissanceVerification(date,input3);

    return(
        result1
        &&
        result2
        &&
        result3
        &&
        result4
        &&
        result5
    )
}


function formVerificationMedecin(){
    var ici =  document.forms[0];
    var code = ici['codePostal'].value;
    var input = ici['codePostal'];

    var result1 = codePostalVerification(code,input);
    var result2 = formVerificationPatient();
    
    return(
        result1
        &&
        result2
    )

}
