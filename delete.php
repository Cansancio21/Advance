<?php
session_start();
include 'db.php'; // Ensure this file contains the database connection code

class DataDeleter {
    private $conn;
    private $id;

    public function __construct($conn, $id) {
        $this->conn = $conn;
        $this->id = intval($id); // Ensure the ID is an integer
    }

    public function deleteRecord() {
        // Start a transaction
        $this->conn->begin_transaction();

        try {
            // Prepare the delete statement for each table
            $tables = [
                'tbl_parents' => 'p_id',
                'tbl_contact' => 'c_id',
                'tbl_address' => 'h_id',
                'tbl_birth' => 'b_id',
                'tbl_formation' => 'u_id'
            ];

            foreach ($tables as $table => $column) {
                $stmt = $this->conn->prepare("DELETE FROM $table WHERE $column = ?");
                $stmt->bind_param("i", $this->id);
                $stmt->execute();
                $stmt->close();
            }

            // Commit the transaction
            $this->conn->commit();
            $_SESSION['message'] = "Record deleted successfully.";
        } catch (Exception $e) {
            // Rollback the transaction if something failed
            $this->conn->rollback();
            $_SESSION['error'] = "Error deleting record: " . $e->getMessage();
        }
    }
}

// Check if the delete request is made
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id']; // Get the ID to delete
    $dataDeleter = new DataDeleter($conn, $id);
    $dataDeleter->deleteRecord();
}

// Redirect back to the submit page
header("Location: submit.php");
exit();

// Close the connection
$conn->close();
?>