<?php
class Database {
    private $host;
    private $user;
    private $password;
    private $database;
    private $conn;

    // Constructor to initialize the database connection parameters
    public function __construct($host, $user, $password, $database) {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
        $this->connect();
    }

    // Method to create a database connection
    private function connect() {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Method to get the connection
    public function getConnection() {
        return $this->conn;
    }

    // Method to close the connection
    public function closeConnection() {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}

// Usage
$db = new Database('localhost', 'root', '', 'inform_details');
$conn = $db->getConnection();

// Don't forget to close the connection when done
// $db->closeConnection();
?>