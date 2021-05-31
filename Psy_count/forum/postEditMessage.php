<?php
session_start();
$mu_id = $_POST['mu_id'];
$msg_id = $_POST['msg_id'];
$msg = $_POST['msg'];

if (isset($_SESSION['type'])) {
    $usr_id = $_SESSION['ID'];
    if($usr_id == $mu_id || $_SESSION['type'] == "Admin") {
        try {
            $dbco = new PDO("mysql:host=localhost;dbname=serveur_psy_fi", 'root', '');
            $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $req =  $dbco->prepare('UPDATE `messages` SET `isModified`= 1,`message`=:msg WHERE `ID_message`=:msg_id');
            $req->bindParam(':msg_id', $msg_id);
            $req->bindParam(':msg', $msg);
            $req->execute();
        echo json_encode(array("success" => true));
        exit;
    }   catch (PDOException $e) {
    }}
    else {
        echo json_encode(array("success" => false));
    }
}
