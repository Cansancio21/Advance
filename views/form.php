<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InForMaTion</title>
    <link rel="stylesheet" href="../index.css">
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
                        <input type="text" name="last_name" placeholder="Enter last Name" required value="<?php echo htmlspecialchars($formData['last_name'] ?? ''); ?>">
                    </div>
                    <div class="input-field">
                        <label>First Name</label>
                        <input type="text" name="first_name" placeholder="Enter First Name" required value="<?php echo htmlspecialchars($formData['first_name'] ?? ''); ?>">
                    </div>
                    <div class="input-field">
                        <label>Middle Initial</label>
                        <input type="text" name="middle_initial" placeholder="Enter Middle Initial" required value="<?php echo htmlspecialchars($formData['middle_initial'] ?? ''); ?>">
                    </div>
                    <div class="input-field">
                        <label for="date_of_birth">Date of Birth:</label>
                        <input type="date" id="date_of_birth" name="date_of_birth" required value="<?php echo htmlspecialchars($formData['date_of_birth'] ?? ''); ?>">
                    </div>
                </div>

                <label for="Male">Sex:</label>  
                <input type="radio" id="Male" name="sex" value="Male" required <?php echo (isset($formData['sex']) && $formData['sex'] == 'Male') ? 'checked' : ''; ?>>
                <label for="Male">Male</label>
                <input type="radio" id="Female" name="sex" value="Female" required <?php echo (isset($formData['sex']) && $formData['sex'] == 'Female') ? 'checked' : ''; ?>>
                <label for="Female">Female</label>

                <div class="Select">
                    <label for="civil_status">Civil Status:</label>
                    <select id="civil_status" name="civil_status" onchange="toggleOthersField()">
                        <option value="Single" <?php echo (isset($formData['civil_status']) && $formData['civil_status'] == 'Single') ? 'selected' : ''; ?>>Single</option>
                        <option value="Married" <?php echo (isset($formData['civil_status']) && $formData['civil_status'] == 'Married') ? 'selected' : ''; ?>>Married</option>
                        <option value="Widowed" <?php echo (isset($formData['civil_status']) && $formData['civil_status'] == 'Widowed') ? 'selected' : ''; ?>>Widowed</option>
                        <option value="Legally Separated" <?php echo (isset($formData['civil_status']) && $formData['civil_status'] == 'Legally Separated') ? 'selected' : ''; ?>>Legally Separated</option>
                        <option value="Others" <?php echo (isset($formData['civil_status']) && $formData['civil_status'] == 'Others') ? 'selected' : ''; ?>>Others</option>
                    </select>
                    <input type="text" id="others_input" name="others" placeholder="Please specify" style="display: none;" value="<?php echo htmlspecialchars($formData['others'] ?? ''); ?>">
                </div>

                <div class="type">
                    <div class="input-type">
                        <label>Tax Identification Number</label>
                        <input type="text" name="tax_id" id="tax_id" required value="<?php echo htmlspecialchars($formData['tax_id'] ?? ''); ?>">
                    </div>
                    <div class="input-type">
                        <label>Nationality</label>
                        <input type="text" name="nationality" placeholder="Enter Nationality" required value="<?php echo htmlspecialchars($formData['nationality'] ?? ''); ?>">
                    </div>
                    <div class="input-type">
                        <label>Religion</label>
                        <input type="text" name="religion" placeholder="Enter Religion" value="<?php echo htmlspecialchars($formData['religion'] ?? ''); ?>">
                    </div>
                </div>

                <h2>Place of Birth</h2>
                <div class="place">
                    <div class="input-place">
                        <label for="birth_unit">Unit No. & Bldg. Name:</label>
                        <input type="text" name="birth_unit" id="birth_unit" value="<?php echo htmlspecialchars($formData['birth']['birth_unit'] ?? ''); ?>">
                    </div>
                    <div class="input-place">
                        <label for="birth_blk_no">House/Lot & Blk. No:</label>
                        <input type="text" name="birth_blk_no" id="birth_blk_no" value="<?php echo htmlspecialchars($formData['birth']['birth_blk_no'] ?? ''); ?>">
                    </div>
                    <div class="input-place">
                        <label for="birth_street_name">Street Name:</label>
                        <input type="text" name="birth_street_name" id="birth_street_name" value="<?php echo htmlspecialchars($formData['birth']['birth_street_name'] ?? ''); ?>">
                    </div>
                    <div class="input-place">
                        <label for="birth_subdivision">Subdivision:</label>
                        <input type="text" name="birth_subdivision" id="birth_subdivision" value="<?php echo htmlspecialchars($formData['birth']['birth_subdivision'] ?? ''); ?>">
                    </div>
                </div>

                <div class="home">
                    <div class="input-home">
                        <label for="birth_brgy">Brgy/District/Locality:</label>
                        <input type="text" name="birth_brgy" id="birth_brgy" value="<?php echo htmlspecialchars($formData['birth']['birth_brgy'] ?? ''); ?>">
                    </div>
                    <div class="input-home">
                        <label for="birth_city">City:</label>
                        <input type="text" name="birth_city" id="birth_city" value="<?php echo htmlspecialchars($formData['birth']['birth_city'] ?? ''); ?>">
                    </div>
                    <div class="input-home">
    <label for="birth_province">Province:</label>
    <select name="birth_province" id="birth_province" required>
        <option value="" disabled selected>Select Province</option>
        <option value="Bohol" <?php echo (isset($formData['birth']['birth_province']) && $formData['birth']['birth_province'] == 'Bohol') ? 'selected' : ''; ?>>Bohol</option>
        <option value="Cebu" <?php echo (isset($formData['birth']['birth_province']) && $formData['birth']['birth_province'] == 'Cebu') ? 'selected' : ''; ?>>Cebu</option>
        <option value="Iloilo" <?php echo (isset($formData['birth']['birth_province']) && $formData['birth']['birth_province'] == 'Iloilo') ? 'selected' : ''; ?>>Iloilo</option>
        <option value="Siquijor" <?php echo (isset($formData['birth']['birth_province']) && $formData['birth']['birth_province'] == 'Siquijor') ? 'selected' : ''; ?>>Siquijor</option>
        <option value="Leyte" <?php echo (isset($formData['birth']['birth_province']) && $formData['birth']['birth_province'] == 'Leyte') ? 'selected' : ''; ?>>Leyte</option>
        <option value="Cavite" <?php echo (isset($formData['birth']['birth_province']) && $formData['birth']['birth_province'] == 'Cavite') ? 'selected' : ''; ?>>Cavite</option>
    </select>
</div>
                    <div class="input-home">
                        <label for="birth_zip_code">Zipcode:</label>
                        <input type="text" name="birth_zip_code" id="birth_zip_code" value="<?php echo htmlspecialchars($formData['birth']['birth_zip_code'] ?? ''); ?>">
                    </div>
                </div>

                <div class="country">
    <label>Country</label>
    <select name="birthcountry" id="birthcountry" required>
        <option value="" disabled selected>Select</option>
        <?php echo $countryOptions; ?>
    </select>
</div>

                <h2>Home Address</h2>
                <div class="place">
                    <div class="input-place">
                        <label>RM/FLR/Unit No. & Bldg. Name</label>
                        <input type="text" name="unit" placeholder="Enter Unit" required value="<?php echo htmlspecialchars($formData['address']['unit'] ?? ''); ?>">
                    </div>
                    <div class="input-place">
                        <label>House/Lot & Blk. No</label>
                        <input type="text" name="blk_no" placeholder="Enter Blk.No" required value="<?php echo htmlspecialchars($formData['address']['blk_no'] ?? ''); ?>">
                    </div>
                    <div class="input-place">
                        <label>Street Name</label>
                        <input type="text" name="street_name" placeholder="Street Name" required value="<?php echo htmlspecialchars($formData['address']['street_name'] ?? ''); ?>">
                    </div>
                    <div class="input-place">
                        <label>Subdivision</label>
                        <input type="text" name="subdivision" placeholder="Subdivision" required value="<?php echo htmlspecialchars($formData['address']['subdivision'] ?? ''); ?>">
                    </div>
                </div>

                <div class="home">
                    <div class="input-home">
                        <label>Brgy/District/Locality</label>
                        <input type="text" name="brgy" placeholder="Enter Brgy" required value="<?php echo htmlspecialchars($formData['address']['brgy'] ?? ''); ?>">
                    </div>
                    <div class="input-home">
                        <label>City/Municipality</label>
                        <input type="text" name="city" placeholder="Enter City" required value="<?php echo htmlspecialchars($formData['address']['city'] ?? ''); ?>">
                    </div>
                    <div class="input-home">
    <label for="province">Province</label>
    <select name="province" id="province" required>
        <option value="" disabled selected>Select Province</option>
        <option value="Bohol" <?php echo (isset($formData['address']['province']) && $formData['address']['province'] == 'Bohol') ? 'selected' : ''; ?>>Bohol</option>
        <option value="Cebu" <?php echo (isset($formData['address']['province']) && $formData['address']['province'] == 'Cebu') ? 'selected' : ''; ?>>Cebu</option>
        <option value="Iloilo" <?php echo (isset($formData['address']['province']) && $formData['address']['province'] == 'Iloilo') ? 'selected' : ''; ?>>Iloilo</option>
        <option value="Siquijor" <?php echo (isset($formData['address']['province']) && $formData['address']['province'] == 'Siquijor') ? 'selected' : ''; ?>>Siquijor</option>
        <option value="Leyte" <?php echo (isset($formData['address']['province']) && $formData['address']['province'] == 'Leyte') ? 'selected' : ''; ?>>Leyte</option>
        <option value="Cavite" <?php echo (isset($formData['address']['province']) && $formData['address']['province'] == 'Cavite') ? 'selected' : ''; ?>>Cavite</option>
    </select>
</div>
                    <div class="input-home">
                        <label for="zip_code">Zipcode:</label>
                        <input type="text" name="zip_code" id="zip_code" value="<?php echo htmlspecialchars($formData['address']['zip_code'] ?? ''); ?>">
                    </div>
                </div>

                <div class="country">
                    <label>Country</label>
                    <select name="country" id="country" required>
                        <option value="" disabled selected>Select</option>
                        <?php echo $countryOptions; ?>
                    </select>
                </div>

                <div class="number">
                    <div class="input-number">
                        <label>Mobile/Cellphone Number</label>
                        <input type="text" name="mobile_phone" id="mobile_phone" required value="<?php echo htmlspecialchars($formData['contact']['mobile'] ?? ''); ?>">
                    </div>
                    <div class="input-number">
                        <label>E-mail Address</label>
                        <input type="email" name="email" placeholder="Enter E-mail" required value="<?php echo htmlspecialchars($formData['contact']['email'] ?? ''); ?>">
                    </div>
                    <div class="input-number">
                        <label>Telephone Number</label>
                        <input type="text" name="telephone_number" id="telephone_number" required value="<?php echo htmlspecialchars($formData['contact']['telephone'] ?? ''); ?>">
                    </div>
                </div>

                <h3>Father's Name</h3>
                <div class="type">
                    <div class="input-type">
                        <label>Last Name</label>
                        <input type="text" name="father_last_name" placeholder="Enter Last Name" value="<?php echo htmlspecialchars($formData['father']['last_name'] ?? ''); ?>">
                    </div>
                    <div class="input-type">
                        <label>First Name</label>
                        <input type="text" name="father_first_name" placeholder="Enter First Name" value="<?php echo htmlspecialchars($formData['father']['first_name'] ?? ''); ?>">
                    </div>
                    <div class="input-type">
                    <label>Middle Name</label>
                        <input type="text" name="father_middle_name" placeholder="Enter Middle Name" value="<?php echo htmlspecialchars($formData['father']['middle_name'] ?? ''); ?>">
                    </div>
                </div>

                <h3>Mother's Name</h3>
                <div class="type">
                    <div class="input-type">
                        <label>Last Name</label>
                        <input type="text" name="mother_last_name" placeholder="Enter Last Name" value="<?php echo htmlspecialchars($formData['mother']['last_name'] ?? ''); ?>">
                    </div>
                    <div class="input-type">
                        <label>First Name</label>
                        <input type="text" name="mother_first_name" placeholder="Enter First Name" value="<?php echo htmlspecialchars($formData['mother']['first_name'] ?? ''); ?>">
                    </div>
                    <div class="input-type">
                        <label>Middle Name</label>
                        <input type="text" name="mother_middle_name" placeholder="Enter Middle Name" value="<?php echo htmlspecialchars($formData['mother']['middle_name'] ?? ''); ?>">
                    </div>
                </div>

                <div class="buttons">
                    <div class="error-container">
                        <?php if (!empty($errors)): ?>
                            <div class="error">
                                <?php echo implode('<br>', $errors); ?>
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