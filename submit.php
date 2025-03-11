<?php
session_start();
include 'db.php'; 
include 'SubmitClass.php'; // Include the DataSubmission class

$dataSubmission = new submit($conn);
$dataSubmission->processFormData();
$data = $dataSubmission->fetchData();
$dataSubmission->closeConnection();
?>


<!DOCTYPE html>
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
            <?php while ($row = $data['formation']->fetch_assoc()): ?>
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
                    <form action="view_one.php" method="GET" style="display: inline;">
                        <input type="hidden" name="table" value="formation">
                        <input type="hidden" name="id" value="<?= $row['u_id'] ?>">
                        <button type="submit" class="subBtn">View Formation</button>
                    </form>
                    <form action="edit.php" method="GET" style="display: inline;">
                        <input type="hidden" name="id" value="<?= $row['u_id'] ?>">
                        <button type="submit" class="subBtn">
                            <div class="btnText">Update</div>
                        </button>
                    </form>
                    <form action="delete.php" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $row['u_id'] ?>">
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
            <?php while ($row = $data['birth']->fetch_assoc()): ?>
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
                    <form action="view_one.php" method="GET" style="display: inline;">
                        <input type="hidden" name="table" value="birth">
                        <input type="hidden" name="id" value="<?= $row['b_id'] ?>">
                        <button type="submit" class="subBtn">View Birth</button>
                    </form>
                    <form action="edit.php" method="GET" style="display: inline;">
                        <input type="hidden" name="id" value="<?= $row['b_id'] ?>">
                        <button type="submit" class="subBtn">
                            <div class="btnText">Update</div>
                        </button>
                    </form>
                    <form action="delete.php" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $row['b_id'] ?>">
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
            <?php while ($row = $data['address']->fetch_assoc()): ?>
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
                    <form action="view_one.php" method="GET" style="display: inline;">
                        <input type="hidden" name="table" value="address">
                        <input type="hidden" name="id" value="<?= $row['h_id'] ?>">
                        <button type="submit" class="subBtn">View Address</button>
                    </form>
                    <form action="edit.php" method="GET" style="display: inline;">
                        <input type="hidden" name="id" value="<?= $row['h_id'] ?>">
                        <button type="submit" class="subBtn">
                            <div class="btnText">Update</div>
                        </button>
                    </form>
                    <form action="delete.php" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $row['h_id'] ?>">
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
            <?php while ($row = $data['contact']->fetch_assoc()): ?>
            <tr onclick="viewData(<?= $row['c_id'] ?>)" style="cursor: pointer;">
                <td><?= $row['c_id'] ?></td>
                <td><?= htmlspecialchars($row['c_mobile']) ?></td>
                <td><?= htmlspecialchars($row['c_tel']) ?></td>
                <td><?= htmlspecialchars($row['c_email']) ?></td>
                <td>
                    <form action="view_one.php" method="GET" style="display: inline;">
                        <input type="hidden" name="table" value="contact">
                        <input type="hidden" name="id" value="<?= $row['c_id'] ?>">
                        <button type="submit" class="subBtn">View Contact</button>
                    </form>
                    <form action="edit.php" method="GET" style="display: inline;">
                        <input type="hidden" name="id" value="<?= $row['c_id'] ?>">
                        <button type="submit" class="subBtn">
                            <div class="btnText">Update</div>
                        </button>
                    </form>
                    <form action="delete.php" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $row['c_id'] ?>">
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
            <?php while ($row = $data['parents']->fetch_assoc()): ?>
            <tr onclick="viewData(<?= $row['p_id'] ?>)" style="cursor: pointer;">
                <td><?= $row['p_id'] ?></td>
                <td><?= htmlspecialchars($row['f_lname']) ?></td>
                <td><?= htmlspecialchars($row['f_fname']) ?></td>
                <td><?= htmlspecialchars($row['f_middle']) ?></td>
                <td><?= htmlspecialchars($row['m_lname']) ?></td>
                <td><?= htmlspecialchars($row['m_fname']) ?></td>
                <td><?= htmlspecialchars($row['m_middle']) ?></td>
                <td>
                    <form action="view_one.php" method="GET" style="display: inline;">
                        <input type="hidden" name="table" value="parents">
                        <input type="hidden" name="id" value="<?= $row['p_id'] ?>">
                        <button type="submit" class="subBtn">View Parents</button>
                    </form>
                    <form action="edit.php" method="GET" style="display: inline;">
                        <input type="hidden" name="id" value="<?= $row['p_id'] ?>">
                        <button type="submit" class="subBtn">
                            <div class="btnText">Update</div>
                        </button>
                    </form>
                    <form action="delete.php" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $row['p_id'] ?>">
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