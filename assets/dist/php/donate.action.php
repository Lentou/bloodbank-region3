<?php
session_start();
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

    $_SESSION['status'] = 'Donate Success';
    $_SESSION['status_text'] = 'Successfully submit\nWe are mailing you if you`re applicable to donate\n\nDate of Sched: ' . $sched_date . '\nBlood Type: ' . $blood_type . '\nQuantity: ' . $quantity;
    $_SESSION['status_code'] = 'success';
    header('Location: ../../../index.php');
    return;
}
?>