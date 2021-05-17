<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messagerie interne</title>
    <link rel="icon" type="image/png" href="images/psy-fi.png" />
    <link rel="stylesheet" href="css//style.css">
    <link rel="stylesheet" href="css//style_Refonte.css">
</head>

<header>
    <div>
        <?php include("menuBar.php") ?>
        <h2 class="headerText"> Message </h2>
    </div>
</header>

<body>
    <div class="niceBox">
        <?php
        $_SESSION['read_msg'] = $_GET['read_msg'];
        echo $_SESSION['read_msg'];
        ?>
    </div>
</body>

<?php include("footer.php") ?>

</html>