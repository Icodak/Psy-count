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

    <div class="wrapper">
        <div class="main">
            <form>
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
                            <div class="topic-right">

                                <h3>Votre mot de passe : </h3>
                            </div>
                            <div class="topic-meta">

                                <input type="text" class="crayon1" name='nom'>
                            </div>
                        </div>
                        <div class="topic-items">
                            <div class="topic-right">
                                <h3> Nouveau mot de passe : </h3>
                            </div>
                            <div class="topic-meta">
                                <input type="text" class="crayon2" name='prenom'>
                            </div>
                        </div>
                        <div class="topic-items">
                            <div class="topic-right">
                                <h3>Vérification du nouveau mot de passse : </h3>
                            </div>
                            <div class="topic-meta">
                                <input type="text" class="crayon3" name='prenom'>
                            </div>
                        </div>
                    </div>
                    <div class="data-button">
                        <div>
                            <a class="new-subject">
                                <p>Modifier</p>
                            </a>
                        </div>
                        <div>
                            <a href="DataPage2.php" class="new-subject">
                                <p>Annuler</p>
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