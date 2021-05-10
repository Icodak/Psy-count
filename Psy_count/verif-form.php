<!DOCTYPE html>
<html>
 <head>
  <meta charset = "utf-8" >
  <title>Les résultats de recherche</title>
 </head>
 <body>
 <?php
  //while($terme_trouve = $select_terme->fetch())
  //{
   //echo "<div><h2>".$terme_trouve['titre']."</h2><p> ".$terme_trouve['contenu']."</p>";
  //}
  //$select_terme->closeCursor();
   //?>

   <?php
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
    
        if(isset($terme)){
            $terme = strtolower($terme);
            $select_terme = $bdd -> prepare("SELECT titre, contenu FROM articles WHERE titre LIKE $bdd OR contenu LIKE $bdd");
            $select_terme-> execute(array("%".$terme."%", "%".$terme."%")); // à compléter
        }
        else
        {
            $message = "Vous devez entrer votre requete dans la barre de recherche";
        }

        

    function taille($bdd){
       $requete = 'SELECT nom FROM ID_Patient, dateDeNaissance, ID_psy_data, ID_Utilisateur, ID_Medecin FROM patient';
       $jointure = $bdd->prepare($requete);
       $jointure -> execute();
       $test = $jointure->fetchALL();
       $taille = count($test);
       return $taille;
    }

    
    

    function collecte_donnees($bdd){
        $requete = 'SELECT nom FROM ID_Patient, dateDeNaissance, ID_psy_data, ID_Utilisateur, ID_Medecin FROM patient';
        $jointure = $bdd->prepare($requete);
        $jointure -> execute();
        $test = $jointure->fetchALL();
        $taille = count($test);
        return $test;
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
    }

    function nbr_temps ($donnee_patient){
        $nbr = count($donnee_patient);
        return $nbr;
    }

    function afficher ($donnee_patient, $taille){
        ?>
        <table class="tablesearch">
        <tr class="tablesearchbandeau">
        <td>Nom </td>
        <td>Prénom </td>
        <td>Date et heure </td>
        <td>Fréquence cardiaque </td>
        <td>Réflexe </td>
        <td>Température </td>
        <td> </td>
        </tr>
        <?php
        // à réadapter en fonction de notre base de donnée
            for($i=0; $i< $taille; $i++){
                ?>
                <tr class ="tablesearchdonnees">
                    <th class="tablesearchdonnees">
                        <?php
                            echo $donnee_patient[$i][0];?>
                    </th>

                    <th class="tablesearchdonnees">
                        <?php print_r($donnee_patient[$i]['prenom']); ?>

                    </th>

                    <th class="tablesearchdonnees">
                        <?php print_r($donnee_patient[$i]['time']); ?>
                    </th>

                </tr>

                <?php } ?>
                </table>
            
    }
    <?php
    function finol ($bdd, $nom_demande){
        $taille = taille($bdd);
        $donnee= collecte_donnees($bdd);
        $donnee_patient = donnee_patient($donnee, $nom_demande, $taille);
        $nbr = nbr_temps($donnee_patient);
        $tableau = afficher($donnee_patient, $nbr);
        return $tableau;
    }
    ?>
                

        
    


</body>
</html>


<form method="post" action="search.php3">

Entrez le nom:<br>

<input type="text" name="name" size="15">

<input type="submit" value="Rechercher" alt="Lancer la recherche!">

</form>




