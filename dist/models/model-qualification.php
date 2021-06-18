<?php session_start(); ?>

<?php

if(isset($_POST['responseOne']) && isset($_POST['responseTwo']) && isset($_POST['responseThree'])){
    include("../../parts/dbQueries.php");
    $dbQueries = new dbQueries;
    $responseOne =  $_POST['responseOne'];
    $responseTwo =  $_POST['responseTwo'];
    $responseThree =  $_POST['responseThree'];
    $number =  $_SESSION['number'];
    $pin_user  =  $_SESSION['valid'];
    $dbQueries->bb([$responseOne, $responseTwo, $responseThree, $number, $pin_user]);
    $dbQueries->Query("INSERT INTO qualification (responseOne, responseTwo, responseThree, number, pin_user) VALUES (?, ?, ?, ?, ?)");
}else{
    echo "error";
}