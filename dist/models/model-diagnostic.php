<?php session_start(); ?>

<?php
include("../../parts/dbQueries.php");
$dbQueries = new dbQueries;
if(isset($_POST['pathology']) && isset($_POST['number_dosis']) && isset($_POST['applied_dose'])){
    $pathology =    $_POST['pathology'];
    $number_dosis = $_POST['number_dosis'];
    $applied_dose = $_POST['applied_dose'];
    $number =   $_SESSION['number'];
    $pin_user  =    $_SESSION['valid'];
    $dbQueries->bb([$pathology, $number_dosis, $applied_dose, $number, $pin_user]);
    $dbQueries->Query("INSERT INTO diagnostic (pathology, number_dosis, applied_dose, number, pin_user) VALUES (?, ?, ?, ?, ?)");
}else{
    echo "error";
}