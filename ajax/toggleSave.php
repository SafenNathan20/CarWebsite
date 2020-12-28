<?php

error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'On');

session_start();
require_once(__DIR__.'/../includes/database.php');
require_once(__DIR__.'/../includes/autoloader.php');

if($_SESSION['user_data']){
    if($_POST['car_id']){
        $Saved = new Saved($Conn);
        $toggle = $Saved->toggleSaved($_POST['car_id']);
        if ($toggle){
            echo json_encode(array(
                "success" => true,
                "reason" => "Car was added to your saved"
            ));
        }else{
            echo json_encode(array(
                "success" => false,
                "reason" => "Car was removed from your saved"
            ));
        }
    }else{
        echo json_encode(array(
            "success" => false,
            "reason" => "Car ID not provided"
        ));
    }
}else{
    echo json_encode(array(
        "success" => false,
        "reason" => "User not Logged In"
    ));
}