<?php
session_start();
include 'db.php'; 

if (!isset($_SESSION['form_data'])) {
    header("Location: index.php");
    exit();
}


$formData = $_SESSION['form_data'];
unset($_SESSION['form_data']); 


$stmt = $conn->prepare("INSERT INTO tbl_formation(u_lname, u_fname, u_middle, u_dob, u_sex, u_status, u_tax, u_nationality, u_religion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssss", $formData['last'], $formData['first'], $formData['middle'], $formData['dob'], $formData['sex'], $formData['civilStatus'], $formData['taxId'], $formData['nationality'], $formData['religion']);
$stmt->execute();
$uId = $stmt->insert_id; 


$stmt = $conn->prepare("INSERT INTO tbl_birth(b_unit, b_blk, b_sn, b_sub, b_brgy, b_city, b_province, b_country, b_zip) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("issssssss", $formData['birth']['birth_unit'], $formData['birth']['birth_blk_no'], $formData['birth']['birth_street_name'], $formData['birth']['birth_subdivision'], $formData['birth']['birth_brgy'], $formData['birth']['birth_city'], $formData['birth']['birth_province'], $formData['birth']['birthcountry'], $formData['birth']['birth_zip_code']);
$stmt->execute();
$bId = $stmt->insert_id; 


$stmt = $conn->prepare("INSERT INTO tbl_address(h_unit, h_blk, h_sn, h_sub, h_brgy, h_city, h_province, h_country, h_zip) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("issssssss", $formData['address']['unit'], $formData['address']['blk_no'], $formData['address']['street_name'], $formData['address']['subdivision'], $formData['address']['brgy'], $formData['address']['city'], $formData['address']['province'], $formData['address']['country'], $formData['address']['zip_code']);
$stmt->execute();
$hId = $stmt->insert_id; 


$stmt = $conn->prepare("INSERT INTO tbl_contact(c_mobile, c_email, c_tel) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $formData['contact']['mobile'], $formData['contact']['email'], $formData['contact']['telephone']);
$stmt->execute();
$cId = $stmt->insert_id; 


$stmt = $conn->prepare("INSERT INTO tbl_parents(f_lname, f_fname, f_middle, m_lname, m_fname, m_middle) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $formData['father_last_name'], $formData['father_first_name'], $formData['father_middle_initial'], $formData['mother_last_name'], $formData['mother_first_name'], $formData['mother_middle_initial']);
$stmt->execute();
$pId = $stmt->insert_id; 


$stmt->close();


$formationResult = $conn->query("SELECT * FROM tbl_formation");


$birthResult = $conn->query("SELECT * FROM tbl_birth");


$addressResult = $conn->query("SELECT * FROM tbl_address");


$contactResult = $conn->query("SELECT * FROM tbl_contact");


$parentsResult = $conn->query("SELECT * FROM tbl_parents");



$conn->close(); 
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submitted Data</title>
    <link rel="stylesheet" href="submit.css">
    <script>
        function viewData(id) {
            window.location.href = 'view.php?id=' + id;
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Submitted Data</h2>

        <h3>Personal Information</h3>
        <table class="personal">
            <tr>
                <th>U_id</th>  
                <th>Last Name</th> 
                <th>First Name</th> 
                <th>Middle Initial</th> 
                <th>Date of Birth</th> 
                <th>Sex</th> 
                <th>Civil Status</th> 
                <th>Tax ID</th> 
                <th>Nationality</th> 
                <th>Religion</th>
                <th>Action</th>
            </tr>
            <?php while ($row = $formationResult->fetch_assoc()): ?>
            <tr onclick="viewData(<?= $row['u_id'] ?>)" style="cursor: pointer;">
                <td><?= $row['u_id'] ?></td>
                <td><?= htmlspecialchars($row['u_lname']) ?></td>
                <td><?= htmlspecialchars($row['u_fname']) ?></td>
                <td><?= htmlspecialchars($row['u_middle']) ?></td>
                <td><?= htmlspecialchars($row['u_dob']) ?></td>
                <td><?= htmlspecialchars($row['u_sex']) ?></td>
                <td><?= htmlspecialchars($row['u_status']) ?></td>
                <td><?= htmlspecialchars($row['u_tax']) ?></td>
                <td><?= htmlspecialchars($row['u_nationality']) ?></td>
                <td><?= htmlspecialchars($row['u_religion']) ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['u_id'] ?>" class="edit-link">Edit</a>
                    <form action="delete.php" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $row['u_id'] ?>">
                        <input type="hidden" name="table" value="formation">
                        <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this record?');">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>

       
        <h3>Place of Birth</h3>
        <table class="birth">
            <tr>
                <th>B_id</th>  
                <th>Unit</th> 
                <th>Block</th> 
                <th>Street Name</th> 
                <th>Subdivision</th> 
                <th>Barangay</th> 
                <th>City</th> 
                <th>Province</th> 
                <th>Country</th> 
                <th>Zip Code</th>
                <th>Action</th>
            </tr>
            <?php while ($row = $birthResult->fetch_assoc()): ?>
            <tr onclick="viewData(<?= $row['b_id'] ?>)" style="cursor: pointer;">
                <td><?= $row['b_id'] ?></td>
                <td><?= htmlspecialchars($row['b_unit']) ?></td>
                <td><?= htmlspecialchars($row['b_blk']) ?></td>
                <td><?= htmlspecialchars($row['b_sn']) ?></td>
                <td><?= htmlspecialchars($row['b_sub']) ?></td>
                <td><?= htmlspecialchars($row['b_brgy']) ?></td>
                <td><?= htmlspecialchars($row['b_city']) ?></td>
                <td><?= htmlspecialchars($row['b_province']) ?></td>
                <td><?= htmlspecialchars($row['b_country']) ?></td>
                <td><?= htmlspecialchars($row['b_zip']) ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['b_id'] ?>" class="edit-link">Edit</a>
                    <form action="delete.php" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $row['b_id'] ?>">
                        <input type="hidden" name="table" value="birth">
                        <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this record?');">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>

        <h3>Home Address</h3>
        <table class="address">
            <tr>
                <th>H_id</th>  
                <th>Unit</th> 
                <th>Block</th> 
                <th>Street Name</th> 
                <th>Subdivision</th> 
                <th>Barangay</th> 
                <th>City</th> 
                <th>Province</th> 
                <th>Country</th> 
                <th>Zip Code</th>
                <th>Action</th>
            </tr>
            <?php while ($row = $addressResult->fetch_assoc()): ?>
            <tr onclick="viewData(<?= $row['h_id'] ?>)" style="cursor: pointer;">
                <td><?= $row['h_id'] ?></td>
                <td><?= htmlspecialchars($row['h_unit']) ?></td>
                <td><?= htmlspecialchars($row['h_blk']) ?></td>
                <td><?= htmlspecialchars($row['h_sn']) ?></td>
                <td><?= htmlspecialchars($row['h_sub']) ?></td>
                <td><?= htmlspecialchars($row['h_brgy']) ?></td>
                <td><?= htmlspecialchars($row['h_city']) ?></td>
                <td><?= htmlspecialchars($row['h_province']) ?></td>
                <td><?= htmlspecialchars($row['h_country']) ?></td>
                <td><?= htmlspecialchars($row['h_zip']) ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['h_id'] ?>" class="edit-link">Edit</a>
                    <form action="delete.php" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $row['h_id'] ?>">
                        <input type="hidden" name="table" value="address">
                        <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this record?');">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>

      
        <h3>Contact Information</h3>
        <table class="contact">
            <tr>
                <th>C_id</th> 
                <th>Mobile</th> 
                <th>Telephone</th> 
                <th>Email</th>
                <th>Action</th>
            </tr>
            <?php while ($row = $contactResult->fetch_assoc()): ?>
            <tr onclick="viewData(<?= $row['c_id'] ?>)" style="cursor: pointer;">
                <td><?= $row['c_id'] ?></td>
                <td><?= htmlspecialchars($row['c_mobile']) ?></td>
                <td><?= htmlspecialchars($row['c_tel']) ?></td>
                <td><?= htmlspecialchars($row['c_email']) ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['c_id'] ?>" class="edit-link">Edit</a>
                    <form action="delete.php" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $row['c_id'] ?>">
                        <input type="hidden" name="table" value="contact">
                        <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this record?');">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>

        <h3>Parents Information</h3>
        <table class="parents">
            <tr>
                <th>P_id</th> 
                <th>Father's Last Name</th> 
                <th>Father's First Name</th> 
                <th>Father's Middle Initial</th>
                <th>Mother's Last Name</th> 
                <th>Mother's First Name</th> 
                <th>Mother's Middle Initial</th>
                <th>Action</th>
            </tr>
            <?php while ($row = $parentsResult->fetch_assoc()): ?>
            <tr onclick="viewData(<?= $row['p_id'] ?>)" style="cursor: pointer;">
                <td><?= $row['p_id'] ?></td>
                <td><?= htmlspecialchars($row['f_lname']) ?></td>
                <td><?= htmlspecialchars($row['f_fname']) ?></td>
                <td><?= htmlspecialchars($row['f_middle']) ?></td>
                <td><?= htmlspecialchars($row['m_lname']) ?></td>
                <td><?= htmlspecialchars($row['m_fname']) ?></td>
                <td><?= htmlspecialchars($row['m_middle']) ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['p_id'] ?>" class="edit-link">Edit</a>
                    <form action="delete.php" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $row['p_id'] ?>">
                        <input type="hidden" name="table" value="parents">
                        <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this record?');">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>

     
        <div class="button-container">
            <form action="index.php" method="get">
                <button type="submit">Add Another Entry</button>
            </form>
        </div>
    </div>
</body>
</html>