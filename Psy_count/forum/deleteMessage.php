<?php
session_start();
$mu_id = $_POST['mu_id'];
$msg_id = $_POST['msg_id'];

if (isset($_SESSION['type'])) {
    $usr_id = $_SESSION['ID'];
    if($usr_id == $mu_id || $_SESSION['type'] == "Admin") {

        try {
            $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi", 'root', '');
            $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $req =  $dbco->prepare('DELETE FROM `messages` WHERE `ID_message` = :msg_id');
            $req->bindParam(':msg_id', $msg_id);
            $req->execute();
            $result = true;
            echo json_encode(array("success" => true));
            exit();
        } catch (PDOException $e) {
            echo json_encode($result);
        }

    }
}
echo json_encode(array("Invalid access" => true));