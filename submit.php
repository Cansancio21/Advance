<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve Personal Information
    $lastName = $_POST['last_name'] ?? "";
    $firstName = $_POST['first_name'] ?? "";
    $middleInitial = $_POST['middle_initial'] ?? "";
    $dateOfBirth = $_POST['date_of_birth'] ?? "";
    $sex = $_POST['sex'] ?? "";
    $civilStatus = $_POST['civil_status'] ?? "";
    $nationality = $_POST['nationality'] ?? "";
    $religion = $_POST['religion'] ?? "";
    $taxId = $_POST['tax_id'] ?? "";
    $email = $_POST['email'] ?? "";
    $zipCode = $_POST['zip_code'] ?? "";

    // Place of Birth Information
    $birthUnitNoBldg = $_POST['unit'] ?? "";
    $birthHouseLotBlk = $_POST['blk_no'] ?? "";
    $birthStreetName = $_POST['street_name'] ?? "";
    $birthSubdivision = $_POST['subdivision'] ?? "";
    $birthCity = $_POST['city'] ?? "";
    $birthProvince = $_POST['province'] ?? "";
    $birthCountry = $_POST['country'] ?? "";

    // Address Information
    $unitNoBldg = $_POST['unit'] ?? "";
    $houseLotBlk = $_POST['blk_no'] ?? "";
    $streetName = $_POST['street_name'] ?? "";
    $subdivision = $_POST['subdivision'] ?? "";
    $city = $_POST['city'] ?? "";
    $province = $_POST['province'] ?? "";
    $country = $_POST['country'] ?? "";

    // Father's Information
    $fatherLastName = $_POST['father_last_name'] ?? "";
    $fatherFirstName = $_POST['father_first_name'] ?? "";
    $fatherMiddleName = $_POST['father_middle_name'] ?? "";

    // Mother's Information
    $motherLastName = $_POST['mother_last_name'] ?? "";
    $motherFirstName = $_POST['mother_first_name'] ?? "";
    $motherMiddleName = $_POST['mother_middle_name'] ?? "";

    $errors = [];

    // Validation functions
    function validateText($text) {
        return preg_match("/^[a-zA-Z ]*$/", $text);
    }

    function validateNumber($number) {
        return preg_match("/^[0-9]*$/", $number);
    }

    function validateZipcode($zipcode) {
        return preg_match("/^[0-9]{4,10}$/", $zipcode);
    }

    // Validate fields
    if (!validateText($lastName)) $errors[] = "Invalid Last Name.";
    if (!validateText($firstName)) $errors[] = "Invalid First Name.";
    if (!validateText($nationality)) $errors[] = "Invalid Nationality.";
    if (!validateText($religion)) $errors[] = "Invalid Religion.";
    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid Email format.";
    if (!empty($zipCode) && !validateZipcode($zipCode)) $errors[] = "Invalid Zip Code.";

    // Display submitted data
    if (empty($errors)) {
        echo "<h2>Submitted Data:</h2>";
        echo "<p><strong>Name:</strong> $lastName, $firstName $middleInitial.</p>";
        echo "<p><strong>Date of Birth:</strong> $dateOfBirth</p>";
        echo "<p><strong>Sex:</strong> $sex</p>";
        echo "<p><strong>Civil Status:</strong> $civilStatus</p>";
        echo "<p><strong>Nationality:</strong> $nationality</p>";
        echo "<p><strong>Religion:</strong> $religion</p>";
        echo "<p><strong>Tax ID:</strong> $taxId</p>";
        echo "<p><strong>Email:</strong> $email</p>";

        echo "<h3>Place of Birth:</h3>";
        echo "<p><strong>Unit No. & Bldg. Name:</strong> $birthUnitNoBldg</p>";
        echo "<p><strong>House/Lot & Blk. No:</strong> $birthHouseLotBlk</p>";
        echo "<p><strong>Street Name:</strong> $birthStreetName</p>";
        echo "<p><strong>Subdivision:</strong> $birthSubdivision</p>";
        echo "<p><strong>City/Municipality:</strong> $birthCity</p>";
        echo "<p><strong>Province:</strong> $birthProvince</p>";
        echo "<p><strong>Zip Code:</strong> $zipCode</p>";
        echo "<p><strong>Country:</strong> $birthCountry</p>";

        echo "<h3>Address:</h3>";
        echo "<p><strong>Unit No. & Bldg. Name:</strong> $unitNoBldg</p>";
        echo "<p><strong>House/Lot & Blk. No:</strong> $houseLotBlk</p>";
        echo "<p><strong>Street Name:</strong> $streetName</p>";
        echo "<p><strong>Subdivision:</strong> $subdivision</p>";
        echo "<p><strong>City/Municipality:</strong> $city</p>";
        echo "<p><strong>Province:</strong> $province</p>";
        echo "<p><strong>Zip Code:</strong> $zipCode</p>";
        echo "<p><strong>Country:</strong> $country</p>";
        echo "<h3>Parents:</h3>";
        echo "<p><strong>Father's Name:</strong> $fatherLastName, $fatherFirstName $fatherMiddleName.</p>";
        echo "<p><strong>Mother's Name:</strong> $motherLastName, $motherFirstName $motherMiddleName.</p>";
    } else {
        echo "<div style='color: red;'>";
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
        echo "</div>";
    }
}
?>