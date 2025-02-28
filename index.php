<?php
session_start();
include 'db.php'; // Include the database connection

$Status = [
    "Single", "Married", "Widowed", "Legally Separated", "Others"
];

function generateOptions($optionsArray, $selectedValue = '') {
    $options = "<option value='' disabled selected>Select an option</option>";
    foreach ($optionsArray as $option) {
        $isSelected = ($option === $selectedValue) ? 'selected' : '';
        $options .= "<option value='$option' $isSelected>$option</option>";
    }
    return $options;
}

function calculateAge($dob) {
    $dobDate = new DateTime($dob);
    $today = new DateTime();
    return $today->diff($dobDate)->y;
}

$civilstatus = generateOptions($Status);
$countries = ["Afghanistan", "Albania", "Algeria", "Zimbabwe", "Åland Islands"];
$countryOpt = generateOptions($countries);

$errors = [];
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $lastName = trim($_POST['last_name'] ?? '');
    $firstName = trim($_POST['first_name'] ?? '');
    $middleName = trim($_POST['middle_initial'] ?? '');
    $dateOfBirth = $_POST['date_of_birth'] ?? '';
    $sex = $_POST['sex'] ?? '';
    $civilStatus = $_POST['civil_status'] ?? '';
    $otherCivil = trim($_POST['others'] ?? '');
    $taxId = trim($_POST['tax_id'] ?? '');
    $nationality = trim($_POST['nationality'] ?? '');
    $religion = trim($_POST['religion'] ?? '');
    $birthunit = trim($_POST['birth_unit'] ?? '');
    $birthblk = trim($_POST['birth_blk_no'] ?? '');
    $birthstreetName = trim($_POST['birth_street_name'] ?? '');
    $birthsubdivision = trim($_POST['birth_subdivision'] ?? '');
    $birthbarangay = trim($_POST['birth_brgy'] ?? '');
    $birthcity = trim($_POST['birth_city'] ?? '');
    $birthprovince = trim($_POST['birth_province'] ?? '');
    $birthcountry = $_POST['birthcountry'] ?? '';
    $birthzipCode = trim($_POST['birth_zip_code'] ?? '');
    $unit = trim($_POST['unit'] ?? '');
    $blk = trim($_POST['blk_no'] ?? '');
    $streetName = trim($_POST['street_name'] ?? '');
    $subdivision = trim($_POST['subdivision'] ?? '');
    $barangay = trim($_POST['brgy'] ?? '');
    $city = trim($_POST['city'] ?? '');
    $province = trim($_POST['province'] ?? '');
    $country = $_POST['country'] ?? '';
    $zipCode = trim($_POST['zip_code'] ?? '');
    $mobile = trim($_POST['mobile_phone'] ?? '');
    $telephone = trim($_POST['telephone_number'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $fatherlastName = trim($_POST['father_last_name'] ?? '');
    $fatherfirstName = trim($_POST['father_first_name'] ?? '');
    $fathermiddleName = trim($_POST['father_middle_name'] ?? '');
    $motherlastName = trim($_POST['mother_last_name'] ?? '');
    $motherfirstName = trim($_POST['mother_first_name'] ?? '');
    $mothermiddleName = trim($_POST['mother_middle_name'] ?? '');

    // Validation logic
    // Validation logic
 if (empty($lastName) || preg_match('/[0-9]/', $lastName)) {
    $errors['last_name'] = "Last name must not contain numbers.";
}

if (empty($firstName) || preg_match('/[0-9]/', $firstName)) {
    $errors['first_name'] = "First name must not contain numbers.";
}

if (empty($middleName) || preg_match('/[0-9]/', $middleName)) {
    $errors['middle_initial'] = "Middle initial must not contain numbers.";
}

if (empty($dateOfBirth)) {
    $errors['date_of_birth'] = "Date of birth is required.";
} elseif (strtotime($dateOfBirth) > time()) {
    $errors['date_of_birth'] = "Date of birth cannot be in the future.";
} elseif (calculateAge($dateOfBirth) < 18) {
    $errors['date_of_birth'] = "You must be at least 18 years old.";
}

if (empty($sex)) {
    $errors['sex'] = "Select a Gender.";
}

if (empty($civilStatus)) {
    $errors['civil_status'] = "Select a Civil Status.";
} elseif ($civilStatus === 'Others' && empty($otherCivil)) {
    $errors['others'] = "Please Specify Your Civil Status.";
}

if (empty($taxId) || !preg_match('/^\d+$/', $taxId)) {
    $errors['tax_id'] = "Tax ID must contain numbers only.";
}

if (empty($nationality)) {
    $errors['nationality'] = "Field is required.";
}

if (empty($religion)) {
    $religion = "N/A"; // Default value if not provided
}

if (empty($birthunit)) {
    $errors['birth_unit'] = "Field is required.";
}

if (empty($birthblk)) {
    $errors['birth_blk_no'] = "Field is required.";
}

if (empty($birthstreetName)) {
    $errors['birth_street_name'] = "Field is required.";
}

if (empty($birthsubdivision)) {
    $birthsubdivision = "N/A"; // Default value if not provided
}

if (empty($birthbarangay)) {
    $birthbarangay = "N/A"; // Default value if not provided
}

if (empty($birthcity)) {
    $birthcity = "N/A"; // Default value if not provided
}

if (empty($birthprovince)) {
    $birthprovince = "N/A"; // Default value if not provided
}

if (empty($birthzipCode) || !preg_match('/^\d+$/', $birthzipCode)) {
    $errors['birth_zip_code'] = " Birthzip Must contain numbers only.";
}

if (empty($birthcountry)) {
    $birthcountry = "N/A"; // Default value if not provided
}

if (empty($unit)) {
    $errors['unit'] = "Field is required.";
}

if (empty($blk)) {
    $errors['blk_no'] = "Field is required.";
}

if (empty($streetName)) {
    $errors['street_name'] = "Field is required.";
}

if (empty($subdivision)) {
    $subdivision = "N/A"; // Default value if not provided
}

if (empty($barangay)) {
    $barangay = "N/A"; // Default value if not provided
}

if (empty($city)) {
    $city = "N/A"; // Default value if not provided
}

if (empty($province)) {
    $province = "N/A"; // Default value if not provided
}

if (empty($zipCode) || !preg_match('/^\d+$/', $zipCode)) {
    $errors['zip_code'] = "Invalid Zip Code. Must contain numbers only.";
}

if (empty($country)) {
    $country = "N/A"; // Default value if not provided
}

if (empty($mobile) || !preg_match('/^\d+$/', $mobile)) {
    $errors['mobile_phone'] = "Mobile number must contain numbers only.";
}

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Invalid email format.";
}

if (empty($telephone) || !preg_match('/^\d+$/', $telephone)) {
    $errors['telephone_number'] = "Telephone number must contain numbers only.";
}

if (empty($fatherlastName) || preg_match('/[0-9]/', $fatherlastName)) {
    $errors['father_last_name'] = "Father Last name must not contain numbers.";
}

if (empty($fatherfirstName) || preg_match('/[0-9]/', $fatherfirstName)) {
    $errors['father_first_name'] = "Father First name must not contain numbers.";
}

if (empty($fathermiddleName) || preg_match('/[0-9]/', $fathermiddleName)) {
    $errors['father_middle_name'] = "Father Middle initial must not contain numbers.";
}

if (empty($motherlastName) || preg_match('/[0-9]/', $motherlastName)) {
    $errors['mother_last_name'] = "Mother Last name must not contain numbers.";
}

if (empty($motherfirstName) || preg_match('/[0-9]/', $motherfirstName)) {
    $errors['mother_first_name'] = "Mother First name must not contain numbers.";
}

if (empty($mothermiddleName) || preg_match('/[0-9]/', $mothermiddleName)) {
    $errors['mother_middle_name'] = "Mother Middle initial must not contain numbers.";
}


    if (empty($errors)) {
        // Store form data in session
        $_SESSION['form_data'] = [
            'last' => $lastName,
            'first' => $firstName,
            'middle' => $middleName,
            'dob' => $dateOfBirth,
            'sex' => $sex,
            'civilStatus' => $civilStatus,
            'otherCivil' => $otherCivil,
            'taxId' => $taxId,
            'nationality' => $nationality,
            'religion' => $religion,
            'birth' => [
                'birth_unit' => $birthunit,
                'birth_blk_no' => $birthblk,
                'birth_street_name' => $birthstreetName,
                'birth_subdivision' => $birthsubdivision,
                'birth_brgy' => $birthbarangay,
                'birth_city' => $birthcity,
                'birth_province' => $birthprovince,
                'birth_zip_code' => $birthzipCode,
                'birthcountry' => $birthcountry,
            ],
            'address' => [
                'unit' => $unit,
                'blk_no' => $blk,
                'street_name' => $streetName,
                'subdivision' => $subdivision,
                'brgy' => $barangay,
                'city' => $city,
                'province' => $province,
                'zip_code' => $zipCode,
                'country' => $country,
            ],
            'contact' => [
                'mobile' => $mobile,
                'telephone' => $telephone,
                'email' => $email,
            ],
            'father_last_name' => $fatherlastName,
            'father_first_name' => $fatherfirstName,
            'father_middle_initial' => $fathermiddleName,
            'mother_last_name' => $motherlastName,
            'mother_first_name' => $motherfirstName,
            'mother_middle_initial' => $mothermiddleName,
        ];

        // Redirect to submit.php
        header("Location: submit.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InForMaTion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <header>InFor<span>MaTion</span></header>

    <form action="" method="POST">
        <div class="form first">
            <div class="details personal">
                <h1>Personal Data</h1>

                <div class="fields">
                    <div class="input-field">
                        <label>Last Name</label>
                        <input type="text" name="last_name" placeholder="Enter last Name" required value="<?php echo htmlspecialchars($lastName ?? ''); ?>">
                    </div>
                    <div class="input-field">
                        <label>First Name</label>
                        <input type="text" name="first_name" placeholder="Enter First Name" required value="<?php echo htmlspecialchars($firstName ?? ''); ?>">
                    </div>
                    <div class="input-field">
                        <label>Middle Initial</label>
                        <input type="text" name="middle_initial" placeholder="Enter Middle Initial" required value="<?php echo htmlspecialchars($middleName ?? ''); ?>">
                    </div>
                    <div class="input-field">
                        <label for="date_of_birth">Date of Birth:</label>
                        <input type="date" id="date_of_birth" name="date_of_birth" required value="<?php echo htmlspecialchars($dateOfBirth ?? ''); ?>">
                    </div>
                </div>

                <label for="Male">Sex:</label>  
                <input type="radio" id="Male" name="sex" value="Male" required <?php echo (isset($sex) && $sex == 'Male') ? 'checked' : ''; ?>>
                <label for="Male">Male</label>
                <input type="radio" id="Female" name="sex" value="Female" required <?php echo (isset($sex) && $sex == 'Female') ? 'checked' : ''; ?>>
                <label for="Female">Female</label>

                <div class="Select">
                    <label for="civil_status">Civil Status:</label>
                    <select id="civil_status" name="civil_status" onchange="toggleOthersField()">
                        <option value="">--Select--</option>
                        <?php echo $civilstatus; ?>
                    </select>
                    <span class="error"><?php echo $errors['civil_status'] ?? ''; ?></span>
                    <input type="text" id="others_input" name="others" placeholder="Please specify" style="display: none;" value="<?php echo htmlspecialchars($otherCivil ?? ''); ?>">
                </div>

                <div class="type">
                    <div class="input-type">
                        <label>Tax Identification Number</label>
                        <input type="text" name="tax_id" id="tax_id" required value="<?php echo htmlspecialchars($taxId ?? ''); ?>">
                    </div>
                    <div class="input-type">
                        <label>Nationality</label>
                        <input type="text" name="nationality" placeholder="Enter Nationality" required value="<?php echo htmlspecialchars($nationality ?? ''); ?>">
                    </div>
                    <div class="input-type">
                        <label>Religion</label>
                        <input type="text" name="religion" placeholder="Enter Religion" value="<?php echo htmlspecialchars($religion ?? ''); ?>">
                    </div>
                </div>

                <h2>Place of Birth</h2>
                <div class="place">
                    <div class="input-place">
                        <label for="birth_unit">Unit No. & Bldg. Name:</label>
                        <input type="text" name="birth_unit" id="birth_unit" value="<?php echo htmlspecialchars($birthunit ?? ''); ?>">
                    </div>
                    <div class="input-place">
                        <label for="birth_blk_no">House/Lot & Blk. No:</label>
                        <input type="text" name="birth_blk_no" id="birth_blk_no" value="<?php echo htmlspecialchars($birthblk ?? ''); ?>">
                    </div>
                    <div class="input-place">
                        <label for="birth_street_name">Street Name:</label>
                        <input type="text" name="birth_street_name" id="birth_street_name" value="<?php echo htmlspecialchars($birthstreetName ?? ''); ?>">
                    </div>
                    <div class="input-place">
                        <label for="birth_subdivision">Subdivision:</label>
                        <input type="text" name="birth_subdivision" id="birth_subdivision" value="<?php echo htmlspecialchars($birthsubdivision ?? ''); ?>">
                    </div>
                </div>

                <div class="home">
                    <div class="input-home">
                        <label for="birth_brgy">Brgy/District/Locality:</label>
                        <input type="text" name="birth_brgy" id="birth_brgy" value="<?php echo htmlspecialchars($birthbarangay ?? ''); ?>">
                    </div>
                    <div class="input-home">
                        <label for="birth_city">City:</label>
                        <input type="text" name="birth_city" id="birth_city" value="<?php echo htmlspecialchars($birthcity ?? ''); ?>">
                    </div>
                    <div class="input-home">
                        <label for="birth_province">Province:</label>
                        <input type="text" name="birth_province" id="birth_province" value="<?php echo htmlspecialchars($birthprovince ?? ''); ?>">
                    </div>
                    <div class="input-home">
                        <label for="birth_zip_code">Zipcode:</label>
                        <input type="text" name="birth_zip_code" id="birth_zip_code" value="<?php echo htmlspecialchars($birthzipCode ?? ''); ?>">
                    </div>
                </div>

                <div class="country">
                    <label>Country</label>
                    <select name="birthcountry" id="country" required>
                        <option value="" disabled selected>select</option>
                        <?php
                        foreach ($countries as $country) {
                            echo "<option value=\"$country\">$country</option>";
                        }
                        ?>
                    </select>
                </div>

                <h2>Home Address</h2>
                <div class="place">
                    <div class="input-place">
                        <label>RM/FLR/Unit No. & Bldg.Name</label>
                        <input type="text" name="unit" placeholder="Enter Unit" required value="<?php echo htmlspecialchars($unit ?? ''); ?>">
                    </div>
                    <div class="input-place">
                        <label>House/Lot & Blk.No</label>
                        <input type="text" name="blk_no" placeholder="Enter Blk.No" required value="<?php echo htmlspecialchars($blk ?? ''); ?>">
                    </div>
                    <div class="input-place">
                        <label>Street Name</label>
                        <input type="text" name="street_name" placeholder="Street Name" required value="<?php echo htmlspecialchars($streetName ?? ''); ?>">
                    </div>
                    <div class="input-place">
                        <label>Subdivision</label>
                        <input type="text" name="subdivision" placeholder="Subdivision" required value="<?php echo htmlspecialchars($subdivision ?? ''); ?>">
                    </div>
                </div>

                <div class="home">
                    <div class="input-home">
                        <label>Brgy/District/Locality</label>
                        <input type="text" name="brgy" placeholder="Enter Brgy" required value="<?php echo htmlspecialchars($barangay ?? ''); ?>">
                    </div>
                    <div class="input-home">
                        <label>City/Municipality</label>
                        <input type="text" name="city" placeholder="Enter City" required value="<?php echo htmlspecialchars($city ?? ''); ?>">
                    </div>
                    <div class="input-home">
                        <label>Province</label>
                        <input type="text" name="province" placeholder="Province" required value="<?php echo htmlspecialchars($province ?? ''); ?>">
                    </div>
                    <div class="input-home">
                        <label for="zip_code">Zipcode:</label>
                        <input type="text" name="zip_code" id="zip_code" value="<?php echo htmlspecialchars($zipCode ?? ''); ?>">
                    </div>
                </div>

                <div class="country">
                    <label>Country</label>
                    <select name="country" id="country" required>
                        <option value="" disabled selected>select</option>
                        <?php
                        foreach ($countries as $country) {
                            echo "<option value=\"$country\">$country</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="number">
                    <div class="input-number">
                        <label>Mobile/Cellphone Number</label>
                        <input type="text" name="mobile_phone" id="mobile_phone" required value="<?php echo htmlspecialchars($mobile ?? ''); ?>">
                    </div>
                    <div class="input-number">
                        <label>E-mail Address</label>
                        <input type="email" name="email" placeholder="Enter E-mail" required value="<?php echo htmlspecialchars($email ?? ''); ?>">
                    </div>
                    <div class="input-number">
                        <label>Telephone Number</label>
                        <input type="text" name="telephone_number" id="telephone_number" required value="<?php echo htmlspecialchars($telephone ?? ''); ?>">
                    </div>
                </div>

                <h3>Father's Name</h3>
                <div class="type">
                    <div class="input-type">
                        <label>Last Name</label>
                        <input type="text" name="father_last_name" placeholder="Enter Last Name" value="<?php echo htmlspecialchars($fatherlastName ?? ''); ?>">
                    </div>
                    <div class="input-type">
                        <label>First Name</label>
                        <input type="text" name="father_first_name" placeholder="Enter First Name" value="<?php echo htmlspecialchars($fatherfirstName ?? ''); ?>">
                    </div>
                    <div class="input-type">
                        <label>Middle Name</label>
                        <input type="text" name="father_middle_name" placeholder="Enter Middle Name" value="<?php echo htmlspecialchars($fathermiddleName ?? ''); ?>">
                    </div>
                </div>

                <h3>Mother's Name</h3>
                <div class="type">
                    <div class="input-type">
                        <label>Last Name</label>
                        <input type="text" name="mother_last_name" placeholder="Enter Last Name" value="<?php echo htmlspecialchars($motherlastName ?? ''); ?>">
                    </div>
                    <div class="input-type">
                        <label>First Name</label>
                        <input type="text" name="mother_first_name" placeholder="Enter First Name" value="<?php echo htmlspecialchars($motherfirstName ?? ''); ?>">
                    </div>
                    <div class="input-type">
                        <label>Middle Name</label>
                        <input type="text" name="mother_middle_name" placeholder="Enter Middle Name" value="<?php echo htmlspecialchars($mothermiddleName ?? ''); ?>">
                    </div>
                </div>
                  
                <div class="buttons">
                    <div class="error-container">
                        <?php if (!empty($errors)): ?>
                            <div class="error">
                                <?php echo implode('<br>', $errors);?>
                            </div>
                        <?php endif; ?>
                        <div class="buttons">
                            <button type="submit" class="subBtn">
                                <div class="btnText">Submit</div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    function toggleOthersField() {
        var status = document.getElementById("civil_status").value;
        var othersField = document.getElementById("others_input");
        if (status === "Others") {
            othersField.style.display = "block";
        } else {
            othersField.style.display = "none";
        }
    }
</script>
</body>
</html>