<!DOCTYPE html>
<html>
 <head>
  <meta charset = "utf-8" >
  <title>Les résultats de recherche</title>

  
 </head>
 <body>
 <form method="GET">
    <label for="query"> Entrer votre recherche: </label> 
    <input type="search" name="query" maxlength="80" id= "query"/> <br/>
    <input type="submit" id="button" value="Rechercher"> 
 </form>
<?php
    $resultat = "";
    if(isset($_GET['query'])&& !empty($_GET['query'])){
        $query = preg_replace("#[^a-z ?0-9]#i", "", $_GET['query']);

        $fichier_configuration = fopen('config.txt', 'r');
        $configuration= fgets($fichier_config);
        fclose($fichier_configuration);
        if ($configuration == "Windows"){
            try{
                $bdd = new PDO("mysql:host=localhost;dbname=serveur_psy_fi", "root", " ");

            }
            catch (Exception $e){
                die('Erreur : ' .$e->getMessage());
            }
        }
        elseif ($configuration == "Mac"){
            try {
                $bdd = new PDO("mysql:host=localhost;dbname=serveur_psy_fi", "root", "root");
                $bdd ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(Exception $e){
                die("Une erreur a été trouvé : " . $e->getMessage());
            }
        }

        $bdd->query("SET NAMES UTF8");
        if (isset($_GET["s"]) AND $_GET["s"] == "Rechercher"){
            $_GET["terme"] = htmlspecialchars($_GET["terme"]); //pour sécuriser le formulaire
            $terme = $_GET["terme"];
            $terme = trim($terme); // pour supprimer les espaces en trop dans la requête de l'internaute
            $terme = strip_tags($terme); // pour supprimer les balises html dans la requête
        }
    
        function taille($bdd){
            $requete = 'SELECT nom, prenom, Email, motDePasse, images, permission_lvl FROM utilisateur uti JOIN patient p ON uti.ID_Utilisateur = p.ID_Utilisateur';
            $jointure = $bdd->prepare($requete);
            $jointure -> execute();
            $test = $jointure->fetchALL();
            $taille = count($test);
            return $taille;
    
        }
    
        function collecte_donnees($bdd){
            $requete = 'SELECT nom, prenom, Email, motDePasse, images, permission_lvl FROM utilisateur AS uti JOIN patient AS p ON uti.ID_Utilisateur = p.ID_Utilisateur';
            $jointure = $bdd->prepare($requete);
            $jointure -> execute();
            $test = $jointure->fetchALL();
            $taille = count($test);
            return $test;
            echo "valeur trouvee";
        }
    
        function donnee_client($collecte_donnee, $nom_demande, $taille){
            $donnee = array();
            for($i=0; $i<$taille; $i++){
                if($collecte_donnee[$i]['nom']== $nom_demande){
                    $collecte_donnee[$i];
                    array_push($donnee, $collecte_donnee[$i]);
                }
            }
            return $donnee;
            echo "valeure trouvée";
            
        }
        print_r(donnee_client($collecte_donnee,$nom_demande,$taille));
        //function end ($bdd, $nom_demande){
           // $taille = taille($bdd);
            //$donnee= collecte_donnees($bdd);
            //$donnee_patient = donnee_patient($donnee, $nom_demande, $taille);
            
            
            //return $donnee_patient;
        //}

        //print_r(end($bdd $nom_demande));
    }

   
    //echo "valeur trouvée ";
    //function end ($bdd, $nom_demande){
        //$taille = taille($bdd);
        //$donnee= collecte_donnees($bdd);
        //$donnee_patient = donnee_patient($donnee, $nom_demande, $taille);
        
        
        //return $donnee_patient;
    //}
    //print_r(donnee_client($collecte_donnee,$nom_demande, $taille));
    

   ?>
    

</body>
</html>