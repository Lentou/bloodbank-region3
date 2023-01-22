<?php
session_start();

$_SESSION['status'] = 'Logout Success';
$_SESSION['status_text'] = 'Logging out successfully!';
$_SESSION['status_code'] = 'success';

unset($_SESSION['user']);
unset($_SESSION['role']);
//session_unset();
//session_destroy();

header("Location:../../../index.php");
exit;