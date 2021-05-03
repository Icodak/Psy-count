
<form method="post" action="search.php3">

Entrez le nom:<br>

<input type="text" name="name" size="15">

<input type="submit" value="Rechercher" alt="Lancer la recherche!">

</form>
<?php
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=serveur_psy_fi", "root", "root");
        $bdd ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(Exception $e){
        die("Une erreur a été trouvé : " . $e->getMessage());
    }
    $bdd->query("SET NAMES UTF8");

    if (isset($_GET["s"]) AND $_GET["s"] == "Rechercher"){
        $_GET["terme"] = htmlspecialchars($_GET["terme"]); //pour sécuriser le formulaire
        $terme = $_GET["terme"];
        $terme = trim($terme); // pour supprimer les espaces dans la requête de l'internaute
        $terme = strip_tags($terme); // pour supprimer les balises html dans la requête

    
    if(isset($terme)){
        $terme = strtolower($terme);
        $select_terme = $bdd -> prepare("SELECT titre, contenu FROM articles WHERE titre LIKE $bdd OR contenu LIKE $bdd");
        $select_terme-> execute(array("%".$terme."%", "%".$terme."%"));
    }
    else
    {
        $message = "Vous devez entrer votre requete dans la barre de recherche";
    }

    }
?>

<!DOCTYPE html>
<html>
 <head>
  <meta charset = "utf-8" >
  <title>Les résultats de recherche</title>
 </head>
 <body>
  <?php
  while($terme_trouve = $select_terme->fetch())
  {
   echo "<div><h2>".$terme_trouve['titre']."</h2><p> ".$terme_trouve['contenu']."</p>";
  }
  $select_terme->closeCursor();
   ?>
 </body>
</html>

