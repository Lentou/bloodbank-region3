<?php

include "Entry.php";

class Account extends Entry {

    public $id;
    public function __construct($id) {
        parent::__construct();
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function getValue(string $column) {
        //$db = $this->connect();
        //$select = "SELECT * FROM USER WHERE (USER_ID = $this->id);";
        //$query = $db->query($select);
        $query = $this->select("USER", "USER_ID = $this->id");
        if ($query->num_rows > 0) {
            $row = $query->fetch_array();
            return $row[$column];
        } else {
            return "none";
        }
    }

    public function setValue(string $column, mixed $value) {
        $db = $this->connect();
        try { 
            $update = "UPDATE USER SET $column = '$value' WHERE USER_ID = $this->id";
            $db->query($update);
        } catch (mysqli_sql_exception $e) {
            var_dump($e);
            exit;
        }
    }

    public function isAdmin() {
        $db = $this->connect();
    
        $sql = "SELECT * FROM USER WHERE (USER_ID = $this->id AND user_type = 'admin');";
        $query = $db->query($sql);
    
        return ($query->num_rows > 0); 
    }

}
?>