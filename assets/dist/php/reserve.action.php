<?php

include 'Database.php';

$db = new Database();

if (isset($_POST['submit'])) {
    
    $conn = $db->connect();
    
    $request_date = $_POST['request_date'];
    $quantity = $_POST['quantity'];
    $blood_type = $_POST['bloodtype'];

    // todo backend
    // example on how to query an sql statement
    // $conn->query('SELECT * FROM USER');
    // getting the value of table
    // $conn->fetch_array()['name']; -> result: names of user
    // sa w3school meron din tutorial dun, naka oop na kasi tong ginawa ko haha

    echo "<script language='javascript'>";
    echo 'alert("Successfully submit\n\nWe are mailing you if you`re approved or not!\n\nDate of Request: '. $request_date .'\nQuantity: ' . $quantity . '\nBlood_Type: ' . $blood_type . '");';
    echo 'window.location.replace("../../../index.php");';
    echo "</script>";
    return;
}
?>