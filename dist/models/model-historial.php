<?php session_start(); ?>
<?php 
    include("../../parts/connection.php");
    $pin_user =  $_SESSION['valid'];
    $dbQueries->bb([$pin_user]);
    $result = $dbQueries->Query("SELECT * FROM applications WHERE pin_user = ?");
    $i = 1;
    $arrayP = [];
    while($row = $dbQueries->fetchAssoc()){
        $arrayP += array('date'.$i => $row['date'], 'status'.$i => $row['status'], 'number'.$i => $row['number']);
        $i++;
    }
    $arrayP += array("numApplications" => $i);
    exit(json_encode($arrayP));


?>