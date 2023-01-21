<?php

include "Account.php";
session_start();

if (isset($_SESSION['user'])) {
    $account = new Account($_SESSION['user']);
}

?>