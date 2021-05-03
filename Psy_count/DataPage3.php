<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Mon profil</title>
    <link rel="icon" type="image/png" href="images/psy-fi.png" />
    <link rel="stylesheet" href="css//style_myData_.css">
    <script type="text/javascript" src="javascript//javaScriptCode.js"></script>
</head>

<body>
    <header>
        <?php include("menuBar.php") ?>
    </header>


    <?php


    try {
        $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi", 'root', '');
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $id = $_SESSION['ID'];

        $req =  $dbco->prepare('SELECT nom,prenom,Email,images FROM utilisateur WHERE ID_Utilisateur=:ID_Utilisateur');
        $req->execute(['ID_Utilisateur' => $id]);
        $resultat = $req->fetchAll();

        $req =  $dbco->prepare('SELECT dateDeNaissance FROM patient WHERE ID_Utilisateur=:ID_Utilisateur');
        $req->execute(['ID_Utilisateur' => $id]);
        $resultat2 = $req->fetchAll();
    } catch (PDOException $e) {

        echo "Erreur : " . $e->getMessage();
    }

    ?>

    <div class="wrapper2">
        <div class="main">
           <form method="post" action="myDataFonction.php">
                <div class="frame-header">
                    <div>
                        <h1>
                            Modifier mon mot de passe
                        </h1>
                    </div>
                </div>
                <div class="topic-main">
                    <div class="topic-list">

                        <div class="topic-items">
                            <div class=" change-password">

                                <h3>Votre mot de passe : </h3>
                            </div>
                            <div class="topic-meta">

                                <input type="text" class="crayon1" name='mdp'>
                            </div>
                        </div>
                        <div class="topic-items">
                            <div class=" change-password">
                                <h3> Nouveau mot de passe : </h3>
                            </div>
                            <div class="topic-meta">
                                <input type="text" class="crayon2" name='newmdp'>
                            </div>
                        </div>
                        <div class="topic-items">
                            <div class=" change-password">
                                <h3>Vérification du nouveau mot de passse : </h3>
                            </div>
                            <div class="topic-meta">
                                <input type="text" class="crayon3" name='newmdpverif'>
                            </div>
                        </div>
                    </div>

                    <div class="error-message">
                    <?php if(!empty($_SESSION['messageData'])){echo $_SESSION['messageData'];}?>
                    </div>

                    <div class="data-button">
                        <div>
                            <input type="submit" name="dataPageChange2" value="Enregistrer" class="button">
                        </div>
                        <div>
                            <a href="DataPage2.php" class="button">
                                Annuler
                            </a>
                        </div>

                    </div>
                </div>
        </div>
        </form>
    </div>
    </div>
    </div>
    </div>
    <?php include("footer.php") ?>
</body>