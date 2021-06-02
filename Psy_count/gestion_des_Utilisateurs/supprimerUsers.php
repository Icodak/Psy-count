
<?php

if(isset($_POST['idTable'])){

$ID = json_decode($_POST['idTable']);

    try{


        $sql = "DELETE FROM utilisateur WHERE ID_Utilisateur=:ID_Utilisateur"; 
        $res = $dbco->prepare($sql);
        $exec = $res->execute(array(":ID_Utilisateur"=>$ID));
       
        $sql = "DELETE FROM Medecin,patient,administrateur WHERE ID_Utilisateur=:ID_Utilisateur"; 
        $res = $dbco->prepare($sql);
        $exec = $res->execute(array(":ID_Utilisateur"=>$ID));

    }catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }

}

?>