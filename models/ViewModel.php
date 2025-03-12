<?php
class ViewModel {
    private $conn;
    private $table;
    private $id;
    private $data;

    public function __construct($conn, $table, $id) {
        $this->conn = $conn;
        $this->table = $table;
        $this->id = intval($id); // Ensure ID is an integer
        $this->data = [];
    }

    public function fetchRecord() {
        // Define valid table names and their actual primary key columns
        $allowed_tables = [
            'formation' => 'u_id',  
            'birth'     => 'b_id',  
            'address'   => 'h_id',  
            'contact'   => 'c_id',  
            'parents'   => 'p_id',   
        ];

        // Check if the requested table is allowed
        if (!array_key_exists($this->table, $allowed_tables)) {
            die("Invalid table request.");
        }

        // Construct the actual table name and primary key
        $actual_table = "tbl_" . $this->table;
        $primary_key = $allowed_tables[$this->table];

        // Prepare and execute the SQL query
        $stmt = $this->conn->prepare("SELECT * FROM `$actual_table` WHERE `$primary_key` = ?");
        $stmt->bind_param("i", $this->id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if the record exists
        if ($result->num_rows === 0) {
            die("No record found.");
        }

        $this->data = $result->fetch_assoc();
        $stmt->close();
    }

    public function getData() {
        return $this->data;
    }

    public function closeConnection() {
        $this->conn->close();
    }
}
?>