<?php
session_start();
$mu_id = $_GET['mu_id'];

if (isset($_SESSION['type'])) {
    $usr_id = $_SESSION['ID'];
    if ($usr_id == $mu_id || $_SESSION['type'] == "Admin") {
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false));
    }
    
} else {
    echo json_encode(array("success" => false));
}