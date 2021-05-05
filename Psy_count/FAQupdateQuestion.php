
<?php
$id = $_POST['id'];
$q = $_POST['q'];
$a = $_POST['a'];

try {
    $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi", 'root', '');
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req =  $dbco->prepare('UPDATE `faq` SET `reponse` = :a, `question` = :q WHERE `faq`.`ID_faq` = :id');
    $req->bindParam(':id', $id);
    $req->bindParam(':q', $q);
    $req->bindParam(':a', $a);
    $req->execute();
    echo json_encode("ran command");
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

?>
