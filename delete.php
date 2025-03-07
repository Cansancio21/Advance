<?php
session_start();
include 'db.php'; // Ensure this file contains the database connection code

// Check if the delete request is made
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = intval($_POST['id']); // Get the ID to delete

    // Start a transaction
    $conn->begin_transaction();

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
            $stmt = $conn->prepare("DELETE FROM $table WHERE $column = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
        }

        // Commit the transaction
        $conn->commit();
        $_SESSION['message'] = "Record deleted successfully.";
    } catch (Exception $e) {
        // Rollback the transaction if something failed
        $conn->rollback();
        $_SESSION['error'] = "Error deleting record: " . $e->getMessage();
    }

    // Redirect back to the submit page
    header("Location: submit.php");
    exit();
} else {
    // If no ID is provided, redirect to the submit page
    header("Location: submit.php");
    exit();
}

// Close the connection
$conn->close();
?>