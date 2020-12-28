<?php

error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'On');

session_start();
require_once(__DIR__.'/../includes/database.php');
require_once(__DIR__.'/../includes/autoloader.php');

if($_SESSION['user_data']){
    if($_POST['recipe_id']){
        $Favourite = new Favourite($Conn);
        $toggle = $Favourite->toggleFavourite($_POST['recipe_id']);
        if ($toggle){
            echo json_encode(array(
                "success" => true,
                "reason" => "Recipe was added to your favourites"
            ));
        }else{
            echo json_encode(array(
                "success" => false,
                "reason" => "Recipe was removed from your favourites"
            ));
        }
    }else{
        echo json_encode(array(
            "success" => false,
            "reason" => "Recipe ID not provided"
        ));
    }
}else{
    echo json_encode(array(
        "success" => false,
        "reason" => "User not Logged In"
    ));
}