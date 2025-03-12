<?php
require '../controllers/ViewAllController.php';

// Check if ID is set in the GET request
if (!isset($_GET['id'])) {
    header("Location: index.php"); // Redirect if no ID is provided
    exit();
}

$id = $_GET['id'];

$controller = new ViewAllController();
$controller->view($id);
?>