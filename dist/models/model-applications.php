<?php session_start(); ?>

<?php

if(isset($_POST['date'])){
    include("../../parts/dbQueries.php");
    $dbQueries = new dbQueries;
    $date   =  $_POST['date'];
    $status = 'Aplicada';
    $pin_user  =  $_SESSION['valid'];
    $dbQueries->bb([$pin_user]);
    $result = $dbQueries->Query("SELECT Max(number) FROM applications WHERE pin_user= ?");
    if ($dbQueries->rowCount() > 0) {
        $row  = $dbQueries->fetch();
        $number = json_encode(intVal($row->{'Max(number)'})) + 1;
        $dbQueries->bb([$date, $status, $number, $pin_user]);
        $dbQueries->Query("INSERT INTO applications (date, status, number, pin_user) VALUES (?, ?, ?, ?)");
        $_SESSION['number'] = $number;
    } else {
        $number = 1;
        $dbQueries->bb([$date, $status, $number, $pin_user]);
        $dbQueries->Query("INSERT INTO applications (date, status, number, pin_user) VALUES (?, ?, ?, ?)");
        $_SESSION['number'] = $number;
    }
}else{
    echo "error";
}