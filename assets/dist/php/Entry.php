<?php

include "Database.php";

class Entry extends Database {

    public function __construct() {
        parent::__construct();
        $this->createTables();
    }

    public function isEmailRegistered($email) {

        $db = $this->connect();

        $sql = "SELECT * FROM USER WHERE (email='$email');";
        $query = $db->query($sql);

        return ($query->num_rows > 0);
    }

    public function checkAccount($email, $password) {

        $db = $this->connect();

        $sql = "SELECT * FROM USER WHERE email = '$email' AND password = '$password'";
        $query = $db->query($sql);

        if ($query->num_rows > 0) {
            $row = $query->fetch_array();
            return $row['USER_ID'];
        } else return false;
    }

    public function checkAdmin($email) {
        $db = $this->connect();

        $sql = "SELECT * FROM USER WHERE email = '$email' AND user_type = 'admin'";
        $query = $db->query($sql);
        
        return ($query->num_rows > 0);
    }

    public function registerAccount($email, $password) {

        $db = $this->connect();
        
        $name = "none";
        $age = 1;
        $sex = "none";
        $address = "none";
        $province = "none";
        $contact = "09876543210";
        $bloodtype = "none";
        $user_type = "user";
        $sql = "INSERT INTO USER VALUES (
            0, '$password', '$email', '$name', '$age', '$sex', 
            '$address', '$province', '$contact', '$bloodtype', '$user_type');";
        
        // insert new data
        $query = $db->query($sql);

        // user_type
        // getting the ID of the user
        //$id = "SELECT USER_ID FROM USER WHERE email = '$email'";
        //$getId = $db->query($id);

        // the ID
        //$realID = $getId->fetch_array()[0];
        // user type to be set
        //$user_type = $role . '_' . $realID;

        // updating the user_type
        //$alter = "UPDATE USER SET user_type = '$user_type' WHERE USER_ID = '$realID'";
        //$query = $db->query($alter);

        return $query;

    }

}