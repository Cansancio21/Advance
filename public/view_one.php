<?php
require '../controllers/ViewController.php';

// Check if ID and table are set in the GET request
if (!isset($_GET['table']) || !isset($_GET['id'])) {
    header("Location: index.php"); // Redirect if no table or ID is provided
    exit();
}

$table = $_GET['table'];
$id = $_GET['id'];

$controller = new ViewController();
$controller->view($table, $id);
?>