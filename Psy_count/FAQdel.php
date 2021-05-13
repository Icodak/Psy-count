
<?php
$id = $_POST['id'];

try {
    $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi", 'root', '');
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req =  $dbco->prepare('DELETE FROM faq WHERE ID_faq =:id');
    $req->bindParam(':id', $id);
    $req->execute();
    echo json_encode("ran command");
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

?>
