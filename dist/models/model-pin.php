<?php
include("../../parts/dbQueries.php");
$dbQueries = new dbQueries;
if(isset($_POST['pin'])){
    $pin = $_POST['pin'];
    $dbQueries->bb([$pin]);
    $result = $dbQueries->Query("SELECT * FROM users WHERE pin= ?")
    or die("Could not execute the select query.");
    $row = $dbQueries->fetch();

    if (!empty($row)) {
        exit(json_encode(array("status" => '0')));
    } else {
        $dbQueries->Query("INSERT INTO users (pin) VALUES (?)");
        exit(json_encode(array("status" => '1')));
    }
}elseif(isset($_POST['so'])){
    $so = $_POST['so'];
    $dbQueries->bb([$so]);
    $result = $dbQueries->Query("SELECT pin FROM users");
    $i = 0;
    $arrayP = [];
    while($row = $dbQueries->fetchAssoc()){
        $arrayP += array($i => $row['pin']);
        $i++;
    }
    exit(json_encode($arrayP));
}elseif(isset($_POST['pin_user'])){
    $pin_user = $_POST['pin_user'];
    $dbQueries->bb([$pin_user]);
    $result = $dbQueries->Query("SELECT * FROM applications Where pin_user = ? ORDER BY number");
    $i = 1;
    $arrayP = [];
    while($row = $dbQueries->fetchAssoc()){
        $arrayP += array("date".$i => $row['date'], "number".$i => $row['number']);
        $i++;
    }
    $arrayP += array("numApplications" => $i);
    exit(json_encode($arrayP));
}
else{
    echo "error";
}