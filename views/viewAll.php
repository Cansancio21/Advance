<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Data</title>
    <link rel="stylesheet" href="../view.css">
</head>
<body>
<div class="container">

    <?php
    // Function to display data in a formatted way
    function displayData($label, $value) {
        return "<div class='flex-item'><span class='info-label'>" . htmlspecialchars($label) . ":</span> <span class='info-value'>" . htmlspecialchars($value) . "</span></div>";
    }

    if (!empty($data['formation'])) {
        $formationData = $data['formation'];
        echo "<h2>Details for ID: " . htmlspecialchars($formationData['u_id']) . "</h2>";
        echo "<div class='horizontal-line'></div>";
        echo "<h3>Personal Information</h3>";
        echo "<div class='flex-container'>";
        echo displayData("Last Name", $formationData['u_lname']);
        echo displayData("First Name", $formationData['u_fname']);
        echo displayData("Middle Initial", $formationData['u_middle']);
        echo "</div>";
        echo "<div class='flex-container'>";
        echo displayData("Date of Birth", $formationData['u_dob']);
        echo displayData("Sex", $formationData['u_sex']);
        echo displayData("Civil Status", $formationData['u_status']);
        echo "</div>";
        echo "<div class='flex-container'>";
        echo displayData("Tax ID", $formationData['u_tax']);
        echo displayData("Nationality", $formationData['u_nationality']);
        echo displayData("Religion", $formationData['u_religion']);
        echo "</div>";
    } else {
        echo "No data found for this ID.";
    }

    // Display other data if available
    if (!empty($data['birth'])) {
        $birthData = $data['birth'];
        echo "<h3>Place of Birth</h3>";
        echo "<div class='flex-container'>";
        echo displayData("Unit", $birthData['b_unit']);
        echo displayData("Block", $birthData['b_blk']);
        echo displayData("Street Name", $birthData['b_sn']);
        echo "</div>";
        echo "<div class='flex-container'>";
        echo displayData("Subdivision", $birthData['b_sub']);
        echo displayData("Barangay", $birthData['b_brgy']);
        echo displayData("City", $birthData['b_city']);
        echo "</div>";
        echo "<div class='flex-container'>";
        echo displayData("Province", $birthData['b_province']);
        echo displayData("Country", $birthData['b_country']);
        echo displayData("Zip Code", $birthData['b_zip']);
        echo "</div>";
    }

    if (!empty($data['address'])) {
        $addressData = $data['address'];
        echo "<h3>Home Address</h3>";
        echo "<div class='flex-container'>";
        echo displayData("Unit", $addressData['h_unit']);
        echo displayData("Block", $addressData['h_blk']);
        echo displayData("Street Name", $addressData['h_sn']);
        echo "</div>";
        echo "<div class='flex-container'>";
        echo displayData("Subdivision", $addressData['h_sub']);
        echo displayData("Barangay", $addressData['h_brgy']);
        echo displayData("City", $addressData['h_city']);
        echo "</div>";
        echo "<div class='flex-container'>";
        echo displayData("Province", $addressData['h_province']);
        echo displayData("Country", $addressData['h_country']);
        echo displayData("Zip Code", $addressData['h_zip']);
        echo "</div>";
    }

    if (!empty($data['contact'])) {
        $contactData = $data['contact'];
        echo "<h3>Contact Information</h3>";
        echo "<div class='flex-container'>";
        echo displayData("Mobile", $contactData['c_mobile']);
        echo displayData("Telephone", $contactData['c_tel']);
        echo displayData("Email", $contactData['c_email']);
        echo "</div>";
    }

    if (!empty($data['parents'])) {
        $parentsData = $data['parents'];
        echo "<h3>Parents Information</h3>";
        echo "<div class='flex-container'>";
        echo displayData("Father's Last Name", $parentsData['f_lname']);
        echo displayData("Father's First Name", $parentsData['f_fname']);
        echo displayData("Father's Middle Initial", $parentsData['f_middle']);
        echo "</div>";
        echo "<div class='flex-container'>";
        echo displayData("Mother's Last Name", $parentsData['m_lname']);
        echo displayData("Mother's First Name", $parentsData['m_fname']);
        echo displayData("Mother's Middle Initial", $parentsData['m_middle']);
        echo "</div>";
    }
    ?>
    <div class="button-container">
        <form action="index.php" method="get">
            <button type="submit">Back</button>
        </form>
    </div>
</div>
</body>
</html>