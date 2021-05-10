


// fonction pour changer la bordure des input si la valeur de l'input est mauvaise
function redIncorrectBorder (inputChoice){
    inputChoice.style.border="3px dashed red";
}

// fonction generale de verification des inputs
function Verification(item,verificationRegex,inputForm){
    
   if(verificationRegex.test(item)==false){
    redIncorrectBorder (inputForm);
    return false;
   }else{
    inputForm.style.border = "none";
    return true;
}   
}

// fonction pour déterminer si l'age minimun est respecté 
function dateDeNaissanceVerification(date,inputForm){
    var dateToday = new Date();
    if(dateToday.getFullYear() - parseInt(date.substring(0,4),10)<15)
    {
        redIncorrectBorder (inputForm);
        return false;
    }else{
        inputForm.style.border = "none";
        return true;
    }   
}

// fonction pour déterminer si le mot de passe est correct

function motDePasseVerification(mdp,mdp2,inputForm1,inputForm2){
    var mdpRegex = new RegExp("^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$");

    if(mdp!=mdp2)
    {
        redIncorrectBorder (inputForm1);;
        redIncorrectBorder (inputForm2);;

        return false;
    }else if(mdpRegex.test(mdp)==false){
        redIncorrectBorder (inputForm1);;
        redIncorrectBorder (inputForm2);;
        return false;
    }else{
        inputForm1.style.border = "none";
        inputForm2.style.border = "none";
        return true;
    }

 
}

// fonction signup-patient
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

    var nomPrenomRegex = new RegExp("^[A-Z][A-Za-z\é\è\ê\-]+$");
    var EmailRegex = new RegExp("^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$");
    var mdpRegex = new RegExp("^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$");



    var result1 =  Verification(prenom,nomPrenomRegex,input1);
    var result2 =  Verification(nom,nomPrenomRegex,input2);        
    var result3 =  Verification(email,EmailRegex,input3);


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

// fonction signup-Medecin
function formVerificationMedecin(){


    var ici =  document.forms[0];
    var code = ici['codePostal'].value;
    var input = ici['codePostal'];

    var codePostalRegex = new RegExp("[0-9]{5}");

    var result1 = Verification(code,codePostalRegex,input);  
    var result2 = formVerificationPatient();
    
    return(
        result1
        &&
        result2
    )

}
