<?php
session_start();
include 'Account.php';

$account = new Account($_SESSION['user']);

if (isset($_POST['save'])) {

    // for saving session
    $fullname = $_POST['full_name'];
    $bloodtype = $_POST['bloodtype'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $address = $_POST['address'];
    $province = $_POST['province'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    
    $currentpass = $_POST['current_pass'];
    $newpass = $_POST['new_pass'];
    $confirmpass = $_POST['confirm_pass'];

    if ($email != null) {
        $account->setValue("email", $email);
    }

    if ($fullname != null) {
        $account->setValue("name", $fullname);
    }

    if ($age != null) {
        $account->setValue("age", $age);
    }

    if ($sex != null) {
        $account->setValue("sex", $sex);
    }

    if ($address != null) {
        $account->setValue("address", $address);
    }

    if ($province != null) {
        $account->setValue("province", $province);
    }

    if ($contact != null) {
        $account->setValue("contact_number", $contact);
    }

    if ($bloodtype != null) {
        $account->setValue("blood_type", $bloodtype);
    }

    if (isset($currentpass) && isset($newpass) && isset($confirmpass)) {
        if (!empty($currentpass) && !empty($newpass) && !empty($confirmpass)) {
            if ($currentpass != $account->getValue("password")) {
                echo "<script language='javascript'>";
                echo 'alert("Current password not match");';
                echo 'window.location.replace("../../../html/profile.php");';
                echo "</script>";
                return;
            }
    
            if ($newpass != $confirmpass) {
                echo "<script language='javascript'>";
                echo 'alert("new and confirm password not match");';
                echo 'window.location.replace("../../../html/profile.php");';
                echo "</script>";
                return;
            }
    
            $account->setValue("password", $newpass);
        }
    }
    
    echo "<script language='javascript'>";
    echo 'alert("Successfully saved profile");';
    echo 'window.location.replace("../../../html/profile.php");';
    echo "</script>";
    return;
}
?>