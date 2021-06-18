<?php session_start(); ?>

<?php
include("../../parts/dbQueries.php");
$dbQueries = new dbQueries;
if(isset($_POST['response'])){
    $response =  $_POST['response'];
    $number =  $_SESSION['number'];
    $pin_user  =  $_SESSION['valid'];
    $dbQueries->bb([$response, $number, $pin_user]);
    $dbQueries->Query("INSERT INTO quiz (response, number, pin_user) VALUES (?, ?, ?)");
    if(isset($_SESSION['namePhoto'])){
        $name_photo =  $_SESSION['namePhoto'];
        $dbQueries->bb([$name_photo, $number, $pin_user]);
        $dbQueries->Query("INSERT INTO photo (name_photo, number, pin_user) VALUES (?, ?, ?)");
    }
}else{
    echo "error";
}