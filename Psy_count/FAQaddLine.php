
<?php
try {
    $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi", 'root', '');
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req =  $dbco->prepare('INSERT INTO `faq` (`ID_faq`, `reponse`, `question`) VALUES (\'GENERATE_UUID()\', \'\', \'\')');
    $req->execute();
    header("Location: faq.php");
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>