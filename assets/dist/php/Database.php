<?php

class Database {

    private $host = 'localhost'; #localhost fdb30.awardspace.net
    private $username = 'root'; #root 4243191_bloodbank
    private $password = ''; #'' JZQwYXkU684448Nw
    private $database = 'bloodbank'; #bloodbank 4243191_bloodbank

    protected $connection;

    public function __construct() {
        if (!isset($this->connection)) {
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

            if (!$this->connection) {
                echo 'Cannot connect to database server';
                exit;
            }
        } else {
            // if connection is connected
            $this->createTables();
        }
    }

    public function connect() {
        return $this->connection;
    }

    public function select(string $table, ?string $condition = null) {
        $db = $this->connect();
        $con = $condition == null ? ";" : "WHERE $condition;";
        $select = "SELECT * FROM $table $con";
        $query = $db->query($select);
        return $query;
    }

    public function update(string $table, string $column, mixed $value, ?string $condition = null) {
        $db = $this->connect();

        $update = $condition == null ? "$column = '$value'" : "$column = '$value' WHERE $condition";
        $query = $db->query("UPDATE $table SET $update;");
        return $query;
    }

    public function delete(string $table, string $condition) {
        $db = $this->connect();
        $delete = "DELETE FROM $table WHERE $condition;";
        $query = $db->query($delete);
        return $query;
    }

    public function insert(string $table, string $column, mixed $value) {
        $db = $this->connect();
        $insert = "INSERT INTO $table ($column) VALUES ($value);";
        $query = $db->query($insert);
        return $query;
    }

    public function createTables() {

        $db = $this->connect();

        // table based on recent ERDs
        
        // asan yung chapter dito?
        $tblUser = "CREATE TABLE IF NOT EXISTS USER (
            USER_ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            password VARCHAR(30) NOT NULL,
            email VARCHAR(30) NOT NULL,
            name VARCHAR(30),
            age INT(6),
            sex VARCHAR(30),
            address VARCHAR(30),
            province VARCHAR(30),
            contact_number VARCHAR(30),
            blood_type VARCHAR(30),
            user_type VARCHAR(30));";

        // chapter? or province?
        # fk: user_type, province
        $tblScreening = "CREATE TABLE IF NOT EXISTS SCREENING (
            SCREENING_ID INT(6) AUTO_INCREMENT PRIMARY KEY,
            user_type VARCHAR(30),
            province VARCHAR(30),
            contact_number VARCHAR(30));";

        # fk: SCREENING_ID, user_type
        $tblManageRequest = "CREATE TABLE IF NOT EXISTS MANAGE_REQUEST (
            MANAGE_ID INT(6) AUTO_INCREMENT PRIMARY KEY,
            SCREENING_ID INT(6),
            user_type VARCHAR(6),
            approve VARCHAR(6));";

        # fk: blood_type
        $tblDonor = "CREATE TABLE IF NOT EXISTS DONOR (
            DONOR_ID INT(6) AUTO_INCREMENT PRIMARY KEY,
            schedule_date VARCHAR(6),
            last_donation_date VARCHAR(6),
            blood_type VARCHAR(6));";

        $tblReservation = "CREATE TABLE IF NOT EXISTS RESERVATION (
            RESERVATION_ID INT(6) AUTO_INCREMENT PRIMARY KEY,
            request_date VARCHAR(6),
            required_blood VARCHAR(6),
            quantity INT(6));";

        $tblBloodBank = "CREATE TABLE IF NOT EXISTS BLOOD_BANK (
            STOCK_ID INT(6) AUTO_INCREMENT PRIMARY KEY,
            blood_type VARCHAR(10),
            acquisition_date VARCHAR(10),
            expiration_date VARCHAR(10),
            quantity INT(6));";

        $db->query($tblUser);
        $db->query($tblScreening);
        $db->query($tblManageRequest);
        $db->query($tblDonor);
        $db->query($tblReservation);
        $db->query($tblBloodBank);
    }

}

?>