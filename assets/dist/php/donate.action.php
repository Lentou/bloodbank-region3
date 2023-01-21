<?php

include 'Database.php';

$db = new Database();

if (isset($_POST['submit'])) {
    
    $conn = $db->connect();
    
    $sched_date = $_POST['sched_date'];
    $blood_type = $_POST['bloodtype'];
    $quantity = $_POST['quantity'];

    // todo backend
    // example on how to query an sql statement
    // $conn->query('SELECT * FROM USER');
    // getting the value of table
    // $conn->fetch_array()['name']; -> result: names of user
    // sa w3school meron din tutorial dun, naka oop na kasi tong ginawa ko haha

    echo "<script language='javascript'>";
    echo 'alert("Successfully submit\n\nWe are mailing you if you`re approved or not!\n\nDate of Sched: '. $sched_date .'\nBlood_Type: ' . $blood_type . '");';
    echo 'window.location.replace("../../../index.php");';
    echo "</script>";
    return;
}
?>