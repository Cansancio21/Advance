<?php
require '../controllers/DeleteController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id']; // Get the ID to delete
    $controller = new DeleteController();
    $controller->delete($id);
}
?>