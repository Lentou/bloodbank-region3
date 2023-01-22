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
                $_SESSION['status'] = 'Password Error';
                $_SESSION['status_text'] = 'Current password not match!';
                $_SESSION['status_code'] = 'error';
                header('Location: ../../../html/profile.php');
                return;
            }
    
            if ($newpass != $confirmpass) {
                $_SESSION['status'] = 'Password Error';
                $_SESSION['status_text'] = 'New and Confirm password is not match!';
                $_SESSION['status_code'] = 'error';
                header('Location: ../../../html/profile.php');
                return;
            }
    
            $account->setValue("password", $newpass);
        }
    }
    
    $_SESSION['status'] = 'Profile Success';
    $_SESSION['status_text'] = 'Successfully saved profile!';
    $_SESSION['status_code'] = 'success';
    header('Location: ../../../html/profile.php');
    return;
}
?>