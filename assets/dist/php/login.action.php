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
                            $_SESSION['status'] = 'Login Error';
                            $_SESSION['status_text'] = 'Email is not registered! please register first';
                            $_SESSION['status_code'] = 'error';
                            header('Location: ../../../html/login.php');
                            return;
                        }
        
                        // checking if password is mismatch
                        $session = $entry->checkAccount($typedEmail, $typedPass);
                        if (!$session) {
                            $_SESSION['status'] = 'Login Error';
                            $_SESSION['status_text'] = 'Wrong password, please check your account!';
                            $_SESSION['status_code'] = 'error';
                            header('Location: ../../../html/login.php');
                            //echo '<script>';
                            //echo 'window.location.replace("../../../html/login.php");';
                            //echo '</script>';
                            return;
                        }

                        if ($role == 'admin' && !$entry->checkAdmin($typedEmail)) {
                            $_SESSION['status'] = 'Login Error';
                            $_SESSION['status_text'] = 'Access Denied!';
                            $_SESSION['status_code'] = 'error';
                            header('Location: ../../../html/login.php');
                            return;
                        }

                        $_SESSION['user'] = $session;
                        $_SESSION['role'] = $role;

                        $_SESSION['status'] = 'Login Success';
                        $_SESSION['status_text'] = 'Successfully logged in!';
                        $_SESSION['status_code'] = 'success';
                        header('location: ../../../index.php');
                        break;
                    case 'register': // working

                        // checking if confirm and typed password is not match
                        if ($confirmPass != $typedPass) {
                            $_SESSION['status'] = 'Register Error';
                            $_SESSION['status_text'] = 'Please Confirm your Password!';
                            $_SESSION['status_code'] = 'error';
                            header('Location: ../../../html/login.php');
                            return;
                        }

                        if ($role == 'admin') {
                            $_SESSION['status'] = 'Register Error';
                            $_SESSION['status_text'] = 'You cannot register the admin role!';
                            $_SESSION['status_code'] = 'error';
                            header('Location: ../../../html/login.php');
                            return;
                        }
        
                        // checking if email is registered
                        if ($entry->isEmailRegistered($typedEmail)) {
                            $_SESSION['status'] = 'Register Error';
                            $_SESSION['status_text'] = 'Email is already registered! please login';
                            $_SESSION['status_code'] = 'error';
                            header('Location: ../../../html/login.php');
                            return;
                        }
        
                        // entry is now adding account
                        $entry->registerAccount($typedEmail, $typedPass);
        
                        $_SESSION['status'] = 'Register Success';
                        $_SESSION['status_text'] = 'Successfully registered, please try to login your account!';
                        $_SESSION['status_code'] = 'success';
                        header('Location: ../../../html/login.php');
                        break;
                }
            }
        }

?>