<?php
session_start();
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FAQ</title>
    <meta name="description" content="FAQ">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_faq.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" async defer></script>

    <?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    if (isset($_SESSION['type']) && $_SESSION['type'] == 'Admin') {
        echo "<script type=\"text/javascript\" src=\"javaScript/javaScriptAdmin.js\"></script>";
    } else {
        echo "<script type=\"text/javascript\" src=\"javaScript/javaScriptCode.js\"></script>";
    }
    ?>
</head>




<body class="gray-background">
    <div class="menu-bar">
        <div>
            <?php include("menuBar.php") ?>
        </div>
    </div>

    <section class="banner">
        <h1>Foire aux questions</h1>
    </section>

    <section class="question-container" id="question-container">
        <?php
        try {
            $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi", 'root', '');
            $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $req =  $dbco->prepare('SELECT question,reponse,ID_faq from faq');
            $req->execute();
            $result = $req->fetchAll();
            foreach ($result as &$ligne) {
                echo
                "<script type=\"text/javascript\">
                create(\"$ligne[0]\", \"$ligne[1]\", \"$ligne[2]\");
                </script>";
            }

            unset($ligne);
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
        ?>
        <?php
        if (isset($_SESSION['type'])) {
            if ($_SESSION['type'] == 'Admin') {
        ?>
                <div>
                    <form action="FAQaddLine.php" method="get">
                        <input type="submit" class="button" value="Ajouter une question">
                    </form>
                </div>
        <?php
            }
        }
        ?>
    </section>

    <?php include("footer.php") ?>

</body>

</html>