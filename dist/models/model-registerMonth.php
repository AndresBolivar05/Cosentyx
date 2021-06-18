<?php

include("../../parts/dbQueries.php");
$dbQueries = new dbQueries;
if(isset($_POST['vc'])){
    $vc =  $_POST['vc'];
    $dbQueries->bb([$vc]);
    $result = $dbQueries->Query("SELECT * FROM applications WHERE date BETWEEN CURDATE() - INTERVAL 45 DAY AND CURDATE() ORDER BY pin_user");

    $i = 1;
    $arrayP = [];
    while($row = $dbQueries->fetchAssoc()){
        $arrayP += array('date'.$i => $row['date'], 'number'.$i => $row['number'], 'pin_user'.$i => $row['pin_user']);
        $i++;
    }
    $arrayP += array("numApplications" => $i);
    exit(json_encode($arrayP));
}else if(isset($_POST['dateIni']) && isset($_POST['dateFin'])){
    $dateIni =  $_POST['dateIni'];
    $dateFin =  $_POST['dateFin'];
    $dbQueries->bb([$dateIni, $dateFin]);
    $result = $dbQueries->Query("SELECT * FROM applications WHERE date BETWEEN '$dateIni' AND '$dateFin' ORDER BY pin_user");

    $i = 1;
    $arrayP = [];
    while($row = $dbQueries->fetchAssoc()){
        $arrayP += array('date'.$i => $row['date'], 'number'.$i => $row['number'], 'pin_user'.$i => $row['pin_user']);
        $i++;
    }
    $arrayP += array("numApplications" => $i);
    exit(json_encode($arrayP));

}else {
    echo 'error';
}

?>