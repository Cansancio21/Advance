<?php
require '../controllers/EditController.php';

if (!isset($_GET['id'])) {
    header("Location: index.php"); // Redirect if no ID is provided
    exit();
}

$id = $_GET['id'];
$controller = new EditController($id);
$controller->edit();
?>