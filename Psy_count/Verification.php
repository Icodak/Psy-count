<? phph
function lastNameverification($lastName){


 }


 function lastNameverification($item,$minLenght,$maxLength){
     if((strlen($item)>$minLenght)&&(strlen($item)<$maxLength)){
         return true;
     }else{
         return false;
     }
}

function EmailVerification($Email){

    if(filter_var($Email, FILTER_VALIDATE_EMAIL)){
        return true;
      }else{
        return false;
      }
}

