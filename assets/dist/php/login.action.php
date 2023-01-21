<?php
session_start();
include "Entry.php";

$entry = new Entry();

if (isset($_POST['submit'])) {
            if (isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['confirm']) && isset($_POST['role'])) {

                $typedEmail = $_POST['email'];
                $typedPass = $_POST['pass'];
                $confirmPass = $_POST['confirm'];
                $role = $_POST['role'];

                switch ($_POST['selection']) {
                    case 'login': // working

                        // checking if email is registered or not
                        if (!$entry->isEmailRegistered($typedEmail)) {
                            echo "<script language='javascript'>";
                            echo "alert('Email is not registered! please register first');";
                            echo 'window.location.replace("../../../html/login.php");';
                            echo "</script>";
                            return;
                        }
        
                        // checking if password is mismatch
                        $session = $entry->checkAccount($typedEmail, $typedPass);
                        if (!$session) {
                            echo "<script language='javascript'>";
                            echo 'alert("Wrong password, please check your account");';
                            echo 'window.location.replace("../../../html/login.php");';
                            echo "</script>";
                            return;
                        }

                        $_SESSION['user'] = $session;
                        header('location:../../../index.php');
                        break;
                    case 'register': // working

                        // checking if confirm and typed password is not match
                        if ($confirmPass != $typedPass) {
                            echo "<script language='javascript'>";
                            echo "alert('Please Confirm your password');";
                            echo 'window.location.replace("../../../html/login.php");';
                            echo "</script>";
                            return;
                        }

                        if ($role == 'admin') {
                            echo "<script language='javascript'>";
                            echo "alert('You cannot register admin');";
                            echo 'window.location.replace("../../../html/login.php");';
                            echo "</script>";
                            return;
                        }
        
                        // checking if email is registered
                        if ($entry->isEmailRegistered($typedEmail)) {
                            echo "<script language='javascript'>";
                            echo "alert('Email is already registered! please login');";
                            echo 'window.location.replace("../../../html/login.php");';
                            echo "</script>";
                            return;
                        }
        
                        // entry is now adding account
                        $entry->registerAccount($typedEmail, $typedPass, $role);
        
                        echo "<script language='javascript'>";
                        echo "alert('Successfully registered, please try to login your account!');";
                        echo 'window.location.replace("../../../html/login.php");';
                        echo "</script>";
                        break;
                }
            }
        }

?>