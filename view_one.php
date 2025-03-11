<?php
session_start();
include 'db.php'; 
include 'View_oneClass.php'; // Include the RecordViewer class

// Check if ID is set in the GET request
if (!isset($_GET['table']) || !isset($_GET['id'])) {
    header("Location: index.php"); // Redirect if no table or ID is provided
    exit();
}

$table = $_GET['table'];
$id = $_GET['id'];

$recordViewer = new view_one($conn, $table, $id);
$recordViewer->fetchRecord();
$data = $recordViewer->getData();
$recordViewer->closeConnection();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Record</title>
    <link rel="stylesheet" href="view_one.css">
</head>
<body>
    <h2 style="text-align:center;">Viewing Record for ID: <?= htmlspecialchars($id) ?></h2>
    <table>
        <?php foreach ($data as $key => $value): ?>
            <tr>
                <th><?= htmlspecialchars($key) ?></th>
                <td><?= htmlspecialchars($value) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div class="button-container">
        <a href="<?= isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : 'index.php'; ?>" class="back-button">Back to Submit</a>
        <form action="index.php" method="get">
            <button type="submit">Back To index</button>
        </form>    
    </div>
</body>
</html>