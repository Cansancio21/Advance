<?php
session_start();

if (!isset($_SESSION['form_data']) || !isset($_SESSION['ids'])) {
    header("Location: index.php");
    exit();
}

// Extracting data from the session
$formData = $_SESSION['form_data'];
$ids = $_SESSION['ids']; // Get the IDs from the session
unset($_SESSION['form_data']); // Clear session data after use
unset($_SESSION['ids']); // Clear IDs after use

// Extracting individual fields with safety checks
$uId = $ids['u_id'];
$bId = $ids['b_id'];
$hId = $ids['h_id'];
$cId = $ids['c_id'];
$pId = $ids['p_id'];

$lastName = htmlspecialchars($formData['last']);
$firstName = htmlspecialchars($formData['first']);
$middleName = htmlspecialchars($formData['middle']);
$dateOfBirth = htmlspecialchars($formData['dob']);
$sex = htmlspecialchars($formData['sex']);
$civilStatus = htmlspecialchars($formData['civilStatus']);
$taxId = htmlspecialchars($formData['taxId']);
$nationality = htmlspecialchars($formData['nationality']);
$religion = htmlspecialchars($formData['religion']);

$birthunit = htmlspecialchars($formData['birth']['birth_unit']);
$birthblk = htmlspecialchars($formData['birth']['birth_blk_no']);
$birthstreetName = htmlspecialchars($formData['birth']['birth_street_name']);
$birthsubdivision = htmlspecialchars($formData['birth']['birth_subdivision']);
$birthbarangay = htmlspecialchars($formData['birth']['birth_brgy']);
$birthcity = htmlspecialchars($formData['birth']['birth_city']);
$birthprovince = htmlspecialchars($formData['birth']['birth_province']);
$birthcountry = htmlspecialchars($formData['birth']['birthcountry']);
$birthzipCode = htmlspecialchars($formData['birth']['birth_zip_code']);

$unit = htmlspecialchars($formData['address']['unit']);
$blk = htmlspecialchars($formData['address']['blk_no']);
$streetName = htmlspecialchars($formData['address']['street_name']);
$subdivision = htmlspecialchars($formData['address']['subdivision']);
$barangay = htmlspecialchars($formData['address']['brgy']);
$city = htmlspecialchars($formData['address']['city']);
$province = htmlspecialchars($formData['address']['province']);
$country = htmlspecialchars($formData['address']['country']);
$zipCode = htmlspecialchars($formData['address']['zip_code']);

$mobile = htmlspecialchars($formData['contact']['mobile']);
$telephone = htmlspecialchars($formData['contact']['telephone']);
$email = htmlspecialchars($formData['contact']['email']);

$fatherlastName = htmlspecialchars($formData['father_last_name']);
$fatherfirstName = htmlspecialchars($formData['father_first_name']);
$fathermiddleName = htmlspecialchars($formData['father_middle_initial']);

$motherlastName = htmlspecialchars($formData['mother_last_name']);
$motherfirstName = htmlspecialchars($formData['mother_first_name']);
$mothermiddleName = htmlspecialchars($formData['mother_middle_initial']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submitted Data</title>
    <link rel="stylesheet" href="submit.css">
</head>
<body>
    <div class="container">
        <h2>Submitted Data</h2>

        <!-- Personal Information Table -->
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
            </tr>
            <tr>
                <td><?= $uId ?></td>
                <td><?= $lastName ?></td>
                <td><?= $firstName ?></td>
                <td><?= $middleName ?></td>
                <td><?= $dateOfBirth ?></td>
                <td><?= $sex ?></td>
                <td><?= $civilStatus ?></td>
                <td><?= $taxId ?></td>
                <td><?= $nationality ?></td>
                <td><?= $religion ?></td>
            </tr>
        </table>

        <!-- Place of Birth Table -->
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
            </tr>
            <tr>
                <td><?= $bId ?></td>
                <td><?= $birthunit ?></td>
                <td><?= $birthblk ?></td>
                <td><?= $birthstreetName ?></td>
                <td><?= $birthsubdivision ?></td>
                <td><?= $birthbarangay ?></td>
                <td><?= $birthcity ?></td>
                <td><?= $birthprovince ?></td>
                <td><?= $birthcountry ?></td>
                <td><?= $birthzipCode ?></td>
            </tr>
        </table>

        <!-- Home Address Table -->
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
            </tr>
            <tr>
                <td><?= $hId ?></td>
                <td><?= $unit ?></td>
                <td><?= $blk ?></td>
                <td><?= $streetName ?></td>
                <td><?= $subdivision ?></td>
                <td><?= $barangay ?></td>
                <td><?= $city ?></td>
                <td><?= $province ?></td>
                <td><?= $country ?></td>
                <td><?= $zipCode ?></td>
            </tr>
        </table>

        <!-- Contact Information Table -->
        <h3>Contact Information</h3>
        <table class="contact">
            <tr>
                <th>C_id</th> 
                <th>Mobile</th> 
                <th>Telephone</th> 
                <th>Email</th>
            </tr>
            <tr>
                <td><?= $cId ?></td>
                <td><?= $mobile ?></td>
                <td><?= $telephone ?></td>
                <td><?= $email ?></td>
            </tr>
        </table>

        <!-- Parents Information Table -->
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
            </tr>
            <tr>
                <td><?= $pId ?></td>
                <td><?= $fatherlastName ?></td>
                <td><?= $fatherfirstName ?></td>
                <td><?= $fathermiddleName ?></td>
                <td><?= $motherlastName ?></td>
                <td><?= $motherfirstName ?></td>
                <td><?= $mothermiddleName ?></td>
            </tr>
        </table>

        <!-- Action Buttons -->
        <div class="button-container">
            <form action="index.php" method="get">
                <button type="submit">Back</button>
            </form>
            <form action="index.php" method="get">
                <button type="submit">Add</button>
            </form>
            <form action="index.php" method="get">
                <button type="submit">Edit</button>
            </form>
            <form action="index.php" method="get">
                <button type="submit">Delete</button>
            </form>
            <form action="index.php" method="get">
                <button type="submit">View Data</button>
            </form>
        </div>
    </div>
</body>
</html>