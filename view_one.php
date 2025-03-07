<?php
include 'db.php';

// Validate and sanitize input
if (!isset($_GET['table']) || !isset($_GET['id'])) {
    die("Invalid request.");
}

$table = $_GET['table'];
$id = intval($_GET['id']); // Ensure ID is an integer

// Define valid table names and their actual primary key columns
$allowed_tables = [
    'formation' => 'u_id',  
    'birth'     => 'b_id',  
    'address'   => 'h_id',  
    'contact'   => 'c_id',  
    'parents'   => 'p_id',   
];

// Check if the requested table is allowed
if (!array_key_exists($table, $allowed_tables)) {
    die("Invalid table request.");
}

// Construct the actual table name
$actual_table = "tbl_" . $table;
$primary_key = $allowed_tables[$table];

// Debugging: Check if the table and column exist
$check_query = "SHOW COLUMNS FROM `$actual_table` LIKE '$primary_key'";
$check_result = $conn->query($check_query);
if ($check_result->num_rows === 0) {
    die("Error: Column '$primary_key' does not exist in table '$actual_table'.");
}

// Prepare and execute the SQL query
$stmt = $conn->prepare("SELECT * FROM `$actual_table` WHERE `$primary_key` = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

// Check if the record exists
if ($result->num_rows === 0) {
    die("No record found.");
}

$data = $result->fetch_assoc();

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Record</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
            width: 50%;
            margin: 20px auto;
        }
        .back-button, .button-container button {
            padding: 10px;
            text-align: center;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .back-button:hover, .button-container button:hover {
            background-color: #0056b3;
        }
    </style>
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
