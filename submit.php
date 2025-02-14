<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="submit.css">
</head>
<body>
    
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    
    $lastName = $_POST['last_name'] ?? "";
    $firstName = $_POST['first_name'] ?? "";
    $middleInitial = $_POST['middle_initial'] ?? "";
    $dateOfBirth = $_POST['date_of_birth'] ?? "";
    $sex = $_POST['sex'] ?? "";
    $civilStatus = $_POST['civil_status'] ?? "";
    $nationality = $_POST['nationality'] ?? "";
    $religion = $_POST['religion'] ?? "";
    $taxId = $_POST['tax_id'] ?? "";
    $mobileNumber = $_POST['mobile_phone'] ?? "";
    $email = $_POST['email'] ?? "";
    $telephoneNumber = $_POST['telephone_number'] ?? "";
    
    $zipCode = $_POST['zip_code'] ?? "";  
    $birthZipCode = $_POST['birth_zip_code'] ?? ""; 

    $age = "Invalid Date";
    if (!empty($dateOfBirth)) {
        $dob = DateTime::createFromFormat('Y-m-d', $dateOfBirth);
        if ($dob) {
            $today = new DateTime();
            $age = $today->diff($dob)->y;
    
        
            if ($age < 18) {
                $errors['date_of_birth'] = "You must be at least 18 years old.";
            }
        } else {
            $errors['date_of_birth'] = "Invalid Date of Birth format.";
        }
    }
    $birthUnitNoBldg = $_POST['birth_unit'] ?? "";
    $birthHouseLotBlk = $_POST['birth_blk_no'] ?? "";
    $birthStreetName = $_POST['birth_street_name'] ?? "";
    $birthSubdivision = $_POST['birth_subdivision'] ?? "";
    $birthBrgy = $_POST['birth_brgy'] ?? "";
    $birthCity = $_POST['birth_city'] ?? "";
    $birthProvince = $_POST['birth_province'] ?? "";
    $birthCountry = $_POST['birthcountry'] ?? "";

    
    $unitNoBldg = $_POST['unit'] ?? "";
    $houseLotBlk = $_POST['blk_no'] ?? "";
    $streetName = $_POST['street_name'] ?? "";
    $subdivision = $_POST['subdivision'] ?? "";
    $brgy = $_POST['brgy'] ?? "";
    $city = $_POST['city'] ?? "";
    $province = $_POST['province'] ?? "";
    $country = $_POST['country'] ?? "";

  
    $fatherLastName = $_POST['father_last_name'] ?? "";
    $fatherFirstName = $_POST['father_first_name'] ?? "";
    $fatherMiddleName = $_POST['father_middle_name'] ?? "";

   
    $motherLastName = $_POST['mother_last_name'] ?? "";
    $motherFirstName = $_POST['mother_first_name'] ?? "";
    $motherMiddleName = $_POST['mother_middle_name'] ?? "";

    
    function validateText($text) {
        return preg_match("/^[a-zA-Z ]*$/", $text);
    }

    function validateZipcode($zipcode) {
        return preg_match("/^[0-9]{4,10}$/", $zipcode);
    }
    function validateNumber($number) {
        return preg_match("/^[0-9]{4,10}$/", $number);
    }


   
    
     if (!validateText($firstName)) $errors['first_name'] = "Invalid First Name. Only letters are allowed.";
     if (!validateText($middleInitial)) $errors['middle_initial'] = "Invalid Middle Initial. Only letters are allowed.";
     if (!validateText($fatherLastName)) $errors['father_last_name'] = "Invalid Father's Last Name. Only letters are allowed.";
     if (!validateText($fatherFirstName)) $errors['father_first_name'] = "Invalid Father's First Name. Only letters are allowed.";
     if (!validateText($fatherMiddleName)) $errors['father_middle_name'] = "Invalid Father's Middle Name. Only letters are allowed.";
     if (!validateText($motherLastName)) $errors['mother_last_name'] = "Invalid Mother's Last Name. Only letters are allowed.";
     if (!validateText($motherFirstName)) $errors['mother_first_name'] = "Invalid Mother's First Name. Only letters are allowed.";
     if (!validateText($motherMiddleName)) $errors['mother_middle_name'] = "Invalid Mother's Middle Name. Only letters are allowed.";
     if (!validateNumber($taxId)) $errors['tax_id'] = "Invalid Tax Identification Number. Only numbers are allowed.";
     if (!validateNumber($mobileNumber)) $errors['mobile_number'] = "Invalid Mobile Number. Only numbers are allowed.";
     if (!empty($telephoneNumber) && !validateNumber($telephoneNumber)) $errors['telephone_number'] = "Invalid Telephone Number. Only numbers are allowed.";
     if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = "Invalid Email format.";
     if (!empty($zipCode) && !validateZipcode($zipCode)) $errors['zip_code'] = "Invalid Zip Code.";
     if (!empty($birthZipCode) && !validateZipcode($birthZipCode)) $errors['birth_zip_code'] = "Invalid Birth Zip Code.";

    
    if (empty($errors)) {
        echo "<h2>Submitted Data:</h2>";
        echo "<p><strong>Name:</strong> $lastName, $firstName $middleInitial.</p>";
        echo "<p><strong>Date of Birth:</strong> $dateOfBirth</p>";
        echo "<p><strong>Age:</strong> $age</p>";
        echo "<p><strong>Sex:</strong> $sex</p>";
        echo "<p><strong>Civil Status:</strong> $civilStatus</p>";
        echo "<p><strong>Nationality:</strong> $nationality</p>";
        echo "<p><strong>Religion:</strong> $religion</p>";
        echo "<p><strong>Tax ID:</strong> $taxId</p>";
       
        echo "<h3>Place of Birth:</h3>";
        echo "<p><strong>Unit No. & Bldg. Name:</strong> $birthUnitNoBldg</p>";
        echo "<p><strong>House/Lot & Blk. No:</strong> $birthHouseLotBlk</p>";
        echo "<p><strong>Street Name:</strong> $birthStreetName</p>";
        echo "<p><strong>Subdivision:</strong> $birthSubdivision</p>";
        echo "<p><strong>Brgy/District/Locality:</strong> $birthBrgy</p>";
        echo "<p><strong>City/Municipality:</strong> $birthCity</p>";
        echo "<p><strong>Province:</strong> $birthProvince</p>";
        echo "<p><strong>Zip Code:</strong> $birthZipCode</p>"; 
        echo "<p><strong>Country:</strong> $birthCountry</p>";

        echo "<h3>Address:</h3>";
        echo "<p><strong>Unit No. & Bldg. Name:</strong> $unitNoBldg</p>";
        echo "<p><strong>House/Lot & Blk. No:</strong> $houseLotBlk</p>";
        echo "<p><strong>Street Name:</strong> $streetName</p>";
        echo "<p><strong>Subdivision:</strong> $subdivision</p>";
        echo "<p><strong>Brgy/District/Locality:</strong> $brgy</p>";
        echo "<p><strong>City/Municipality:</strong> $city</p>";
        echo "<p><strong>Province:</strong> $province</p>";
        echo "<p><strong>Zip Code:</strong> $zipCode</p>"; 
        echo "<p><strong>Country:</strong> $country</p>";
        echo "<p><strong>Mobile Number:</strong> $mobileNumber</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Telephone Number:</strong> $telephoneNumber</p>";

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

<button onclick="window.location.href='index.php'" class="backBtn">Back</button>
