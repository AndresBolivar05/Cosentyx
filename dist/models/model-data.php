<?php

if(isset($_POST['number']) && isset($_POST['pin'])){
    include("../../parts/dbQueries.php");
    $dbQueries = new dbQueries;
    $number =  $_POST['number'];
    $pin = $_POST['pin'];
    $dbQueries->bb([$number, $pin]);
    $resultPhoto = $dbQueries->Query("SELECT name_photo FROM photo WHERE number=? and pin_user=?")
    or die("Could not execute the select query.");
    $rowPhoto  = $dbQueries->fetch();

    $resultQuiz = $dbQueries->Query("SELECT response FROM quiz WHERE number=? and pin_user=?")
    or die("Could not execute the select query.");
    $rowQuiz = $dbQueries->fetch();

    $resultDiagnostic = $dbQueries->Query("SELECT pathology, applied_dose, number_dosis FROM diagnostic WHERE number=? and pin_user=?")
    or die("Could not execute the select query.");
    $rowDiagnostic = $dbQueries->fetch();

    $resultQualification = $dbQueries->Query("SELECT responseOne, responseTwo, responseThree FROM qualification WHERE number=? and pin_user=?")
    or die("Could not execute the select query.");
    $rowQualification = $dbQueries->fetch();
    
    if (empty($rowPhoto) || empty($rowQuiz) || empty($rowDiagnostic) || empty($rowQualification) ) {
        exit(json_encode(array("status" => '0')));
    } else {
        exit(json_encode(array("name_photo" => $rowPhoto->{'name_photo'}, "response" => $rowQuiz->{'response'}, "pathology" => $rowDiagnostic->{'pathology'}, "applied_dose" => $rowDiagnostic->{'applied_dose'}, "number_dosis" => $rowDiagnostic->{'number_dosis'}, "responseOne" => $rowQualification->{'responseOne'}, "responseTwo" => $rowQualification->{'responseTwo'}, "responseThree" => $rowQualification->{'responseThree'})));
    }
}

?>