<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Entry</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="container">
    <header>Edit Entry</header>

    <form action="" method="POST">
        <div class="form first">
            <div class="details personal">
                <h1>Edit Personal Data</h1>

                <div class="fields">
                    <div class="input-field">
                        <label>Last Name</label>
                        <input type="text" name="last_name" placeholder="Enter last Name" required value="<?= htmlspecialchars($formationData['u_lname']) ?>">
                    </div>
                    <div class="input-field">
                        <label>First Name</label>
                        <input type="text" name="first_name" placeholder="Enter First Name" required value="<?= htmlspecialchars($formationData['u_fname']) ?>">
                    </div>
                    <div class="input-field">
                        <label>Middle Initial</label>
                        <input type="text" name="middle_initial" placeholder="Enter Middle Initial" required value="<?= htmlspecialchars($formationData['u_middle']) ?>">
                    </div>
                    <div class="input-field">
                        <label for="date_of_birth">Date of Birth:</label>
                        <input type="date" id="date_of_birth" name="date_of_birth" required value="<?= htmlspecialchars($formationData['u_dob']) ?>">
                    </div>
                </div>

                <label for="Male">Sex:</label>  
                <input type="radio" id="Male" name="sex" value="Male" required <?= ($formationData['u_sex'] == 'Male') ? 'checked' : '' ?>>
                <label for="Male">Male</label>
                <input type="radio" id="Female" name="sex" value="Female" required <?= ($formationData['u_sex'] == 'Female') ? 'checked' : '' ?>>
                <label for="Female">Female</label>

                <div class="Select">
                    <label for="civil_status">Civil Status:</label>
                    <select id="civil_status" name="civil_status">
                        <option value="">--Select--</option>
                        <option value="Single" <?= ($formationData['u_status'] == 'Single') ? 'selected' : '' ?>>Single</option>
                        <option value="Married" <?= ($formationData['u_status'] == 'Married') ? 'selected' : '' ?>>Married</option>
                        <option value="Widowed" <?= ($formationData['u_status'] == 'Widowed') ? 'selected' : '' ?>>Widowed</option>
                        <option value="Legally Separated" <?= ($formationData['u_status'] == 'Legally Separated') ? 'selected' : '' ?>>Legally Separated</option>
                        <option value="Others" <?= ($formationData['u_status'] == 'Others') ? 'selected' : '' ?>>Others</option>
                    </select>
                </div>

                <div class="type">
                    <div class="input-type">
                        <label>Tax Identification Number</label>
                        <input type="text" name="tax_id" id="tax_id" required value="<?= htmlspecialchars($formationData['u_tax']) ?>">
                    </div>
                    <div class="input-type">
                        <label>Nationality</label>
                        <input type="text" name="nationality" placeholder="Enter Nationality" required value="<?= htmlspecialchars($formationData['u_nationality']) ?>">
                    </div>
                    <div class="input-type">
                        <label>Religion</label>
                        <input type="text" name="religion" placeholder="Enter Religion" value="<?= htmlspecialchars($formationData['u_religion']) ?>">
                    </div>
                </div>

                <h2>Place of Birth</h2>
                <div class="place">
                    <div class="input-place">
                        <label for="birth_unit">Unit No. & Bldg. Name:</label>
                        <input type="text" name="birth_unit" id="birth_unit" value="<?= htmlspecialchars($birthData['b_unit']) ?>">
                    </div>
                    <div class="input-place">
                        <label for="birth_blk_no">House/Lot & Blk. No:</label>
                        <input type="text" name="birth_blk_no" id="birth_blk_no" value="<?= htmlspecialchars($birthData['b_blk']) ?>">
                    </div>
                    <div class="input-place">
                        <label for="birth_street_name">Street Name:</label>
                        <input type="text" name="birth_street_name" id="birth_street_name" value="<?= htmlspecialchars($birthData['b_sn']) ?>">
                    </div>
                    <div class="input-place">
                        <label for="birth_subdivision">Subdivision:</label>
                        <input type="text" name="birth_subdivision" id="birth_subdivision" value="<?= htmlspecialchars($birthData['b_sub']) ?>">
                    </div>
                </div>

                <div class="home">
                    <div class="input-home">
                        <label for="birth_brgy">Brgy/District/Locality:</label>
                        <input type="text" name="birth_brgy" id="birth_brgy" value="<?= htmlspecialchars($birthData['b_brgy']) ?>">
                    </div>
                    <div class="input-home">
                        <label for="birth_city">City:</label>
                        <input type="text" name="birth_city" id="birth_city" value="<?= htmlspecialchars($birthData['b_city']) ?>">
                    </div>
                    <div class="input-home">
                        <label for="birth_province">Province:</label>
                        <input type="text" name="birth_province" id="birth_province" value="<?= htmlspecialchars($birthData['b_province']) ?>">
                    </div>
                    <div class="input-home">
                        <label for="birth_zip_code">Zipcode:</label>
                        <input type="text" name="birth_zip_code" id="birth_zip_code" value="<?= htmlspecialchars($birthData['b_zip']) ?>">
                    </div>
                </div>

                <div class="country">
    <label for="birth_country">Country:</label>
    <select name="birthcountry" id="birth_country" required>
        <option value="" disabled selected>--Select Country--</option>
        <?php
        $countries = [
            "Afghanistan",    "Albania",    "Algeria",    "American Samoa",    "Andorra",    "Angola",    "Anguilla",    "Antarctica",    "Antigua and Barbuda",    "Argentina",    "Armenia",    "Aruba",    "Australia",    "Austria",    "Azerbaijan",    "Bahamas (the)",    "Bahrain",    "Bangladesh",    "Barbados",    "Belarus",    "Belgium",    "Belize",    "Benin",    "Bermuda",    "Bhutan",    "Bolivia (Plurinational State of)",    "Bonaire, Sint Eustatius and Saba",    "Bosnia and Herzegovina",    "Botswana",    "Bouvet Island",    "Brazil",    "British Indian Ocean Territory (the)",    "Brunei Darussalam",    "Bulgaria",    "Burkina Faso",    "Burundi",    "Cabo Verde",    "Cambodia",    "Cameroon",    "Canada",    "Cayman Islands (the)",    "Central African Republic (the)",    "Chad",    "Chile",    "China",    "Christmas Island",    "Cocos (Keeling) Islands (the)",    "Colombia",    "Comoros (the)",    "Congo (the Democratic Republic of the)",    "Congo (the)",    "Cook Islands (the)",    "Costa Rica",    "Croatia",    "Cuba",    "Curaçao",    "Cyprus",    "Czechia",    "Côte d'Ivoire",    "Denmark",    "Djibouti",    "Dominica",    "Dominican Republic (the)",    "Ecuador",    "Egypt",    "El Salvador",    "Equatorial Guinea",    "Eritrea",    "Estonia",    "Eswatini",    "Ethiopia",    "Falkland Islands (the) [Malvinas]",    "Faroe Islands (the)",    "Fiji",    "Finland",    "France",    "French Guiana",    "French Polynesia",    "French Southern Territories (the)",    "Gabon",    "Gambia (the)",    "Georgia",    "Germany",    "Ghana",    "Gibraltar",    "Greece",    "Greenland",    "Grenada",    "Guadeloupe",    "Guam",    "Guatemala",    "Guernsey",    "Guinea",    "Guinea-Bissau",    "Guyana",    "Haiti",    "Heard Island and McDonald Islands",    "Holy See (the)",    "Honduras",    "Hong Kong",    "Hungary",    "Iceland",    "India",    "Indonesia",    "Iran (Islamic Republic of)",    "Iraq",    "Ireland",    "Isle of Man",    "Israel",    "Italy",    "Jamaica",    "Japan",    "Jersey",    "Jordan",    "Kazakhstan",    "Kenya",    "Kiribati",    "Korea (the Democratic People's Republic of)",    "Korea (the Republic of)",    "Kuwait",    "Kyrgyzstan",    "Lao People's Democratic Republic (the)",    "Latvia",    "Lebanon",    "Lesotho",    "Liberia",    "Libya",    "Liechtenstein",    "Lithuania",    "Luxembourg",    "Macao",    "Madagascar",    "Malawi",    "Malaysia",    "Maldives",    "Mali",    "Malta",    "Marshall Islands (the)",    "Martinique",    "Mauritania",    "Mauritius",    "Mayotte",    "Mexico",    "Micronesia (Federated States of)",    "Moldova (the Republic of)",    "Monaco",    "Mongolia",    "Montenegro",    "Montserrat",    "Morocco",    "Mozambique",    "Myanmar",    "Namibia",    "Nauru",    "Nepal",    "Netherlands (the)",    "New Caledonia",    "New Zealand",    "Nicaragua",    "Niger (the)",    "Nigeria",    "Niue",    "Norfolk Island",    "Northern Mariana Islands (the)",    "Norway",    "Oman",    "Pakistan",    "Palau",    "Palestine, State of",    "Panama",    "Papua New Guinea",    "Paraguay",    "Peru",    "Philippines (the)",    "Pitcairn",    "Poland",    "Portugal",    "Puerto Rico",    "Qatar",    "Republic of North Macedonia",    "Romania",    "Russian Federation (the)",    "Rwanda",    "Réunion",    "Saint Barthélemy",    "Saint Helena, Ascension and Tristan da Cunha",    "Saint Kitts and Nevis",    "Saint Lucia",    "Saint Martin (French part)",    "Saint Pierre and Miquelon",    "Saint Vincent and the Grenadines",    "Samoa",    "San Marino",    "Sao Tome and Principe",    "Saudi Arabia",    "Senegal",    "Serbia",    "Seychelles",    "Sierra Leone",    "Singapore",    "Sint Maarten (Dutch part)",    "Slovakia",    "Slovenia",    "Solomon Islands",    "Somalia",    "South Africa",    "South Georgia and the South Sandwich Islands",    "South Sudan",    "Spain",    "Sri Lanka",    "Sudan (the)",    "Suriname",    "Svalbard and Jan Mayen",    "Sweden",    "Switzerland",    "Syrian Arab Republic",    "Taiwan",    "Tajikistan",    "Tanzania, United Republic of",    "Thailand",    "Timor-Leste",    "Togo",    "Tokelau",    "Tonga",    "Trinidad and Tobago",    "Tunisia",    "Turkey",    "Turkmenistan",    "Turks and Caicos Islands (the)",    "Tuvalu",    "Uganda",    "Ukraine",    "United Arab Emirates (the)",    "United Kingdom of Great Britain and Northern Ireland (the)",    "United States Minor Outlying Islands (the)",    "United States of America (the)",    "Uruguay",    "Uzbekistan",    "Vanuatu",    "Venezuela (Bolivarian Republic of)",    "Viet Nam",    "Virgin Islands (British)",    "Virgin Islands (U.S.)",    "Wallis and Futuna",    "Western Sahara",    "Yemen",    "Zambia",    "Zimbabwe",    "Åland Islands"
        ];
        foreach ($countries as $country) {
            $selected = ($birthData['b_country'] == $country) ? 'selected' : '';
            echo "<option value=\"$country\" $selected>$country</option>";
        }
        ?>
    </select>
</div>

                <h2>Home Address</h2>
                <div class="place">
                    <div class="input-place">
                        <label>RM/FLR/Unit No. & Bldg. Name</label>
                        <input type="text" name="unit" placeholder="Enter Unit" required value="<?= htmlspecialchars($addressData['h_unit']) ?>">
                    </div>
                    <div class="input-place">
                        <label>House/Lot & Blk. No</label>
                        <input type="text" name="blk_no" placeholder="Enter Blk.No" required value="<?= htmlspecialchars($addressData['h_blk']) ?>">
                    </div>
                    <div class="input-place">
                        <label>Street Name</label>
                        <input type="text" name="street_name" placeholder="Street Name" required value="<?= htmlspecialchars($addressData['h_sn']) ?>">
                    </div>
                    <div class="input-place">
                        <label>Subdivision</label>
                        <input type="text" name="subdivision" placeholder="Subdivision" required value="<?= htmlspecialchars($addressData['h_sub']) ?>">
                    </div>
                </div>

                <div class="home">
                    <div class="input-home">
                        <label>Brgy/District/Locality</label>
                        <input type="text" name="brgy" placeholder="Enter Brgy" required value="<?= htmlspecialchars($addressData['h_brgy']) ?>">
                    </div>
                    <div class="input-home">
                        <label>City/Municipality</label>
                        <input type="text" name="city" placeholder="Enter City" required value="<?= htmlspecialchars($addressData['h_city']) ?>">
                    </div>
                    <div class="input-home">
                        <label>Province</label>
                        <input type="text" name="province" placeholder="Province" required value="<?= htmlspecialchars($addressData['h_province']) ?>">
                    </div>
                    <div class="input-home">
                        <label for="zip_code">Zipcode:</label>
                        <input type="text" name="zip_code" id="zip_code" value="<?= htmlspecialchars($addressData['h_zip']) ?>">
                    </div>
                </div>

                <div class="country">
    <label for="country">Country for Address:</label>
    <select name="country" id="country" required>
        <option value="" disabled selected>--Select Country--</option>
        <?php
        foreach ($countries as $country) {
            $selected = ($addressData['h_country'] == $country) ? 'selected' : '';
            echo "<option value=\"$country\" $selected>$country</option>";
        }
        ?>
    </select>
</div>

                <div class="number">
                    <div class="input-number">
                        <label>Mobile/Cellphone Number</label>
                        <input type="text" name="mobile_phone" id="mobile_phone" required value="<?= htmlspecialchars($contactData['c_mobile']) ?>">
                    </div>
                    <div class="input-number">
                        <label>E-mail Address</label>
                        <input type="email" name="email" placeholder="Enter E-mail" required value="<?= htmlspecialchars($contactData['c_email']) ?>">
                    </div>
                    <div class="input-number">
                        <label>Telephone Number</label>
                        <input type="text" name="telephone_number" id="telephone_number" required value="<?= htmlspecialchars($contactData['c_tel']) ?>">
                    </div>
                </div>

                <h3>Father's Name</h3>
                <div class="type">
                    <div class="input-type">
                        <label>Last Name</label>
                        <input type="text" name="father_last_name" placeholder="Enter Last Name" value="<?= htmlspecialchars($parentsData['f_lname']) ?>">
                    </div>
                    <div class="input-type">
                        <label>First Name</label>
                        <input type="text" name="father_first_name" placeholder="Enter First Name" value="<?= htmlspecialchars($parentsData['f_fname']) ?>">
                    </div>
                    <div class="input-type">
                        <label>Middle Name</label>
                        <input type="text" name="father_middle_name" placeholder="Enter Middle Name" value="<?= htmlspecialchars($parentsData['f_middle']) ?>">
                    </div>
                </div>

                <h3>Mother's Name</h3>
                <div class="type">
                    <div class="input-type">
                        <label>Last Name</label>
                        <input type="text" name="mother_last_name" placeholder="Enter Last Name" value="<?= htmlspecialchars($parentsData['m_lname']) ?>">
                    </div>
                    <div class="input-type">
                        <label>First Name</label>
                        <input type="text" name="mother_first_name" placeholder="Enter First Name" value="<?= htmlspecialchars($parentsData['m_fname']) ?>">
                    </div>
                    <div class="input-type">
                        <label>Middle Name</label>
                        <input type="text" name="mother_middle_name" placeholder="Enter Middle Name" value="<?= htmlspecialchars($parentsData['m_middle']) ?>">
                    </div>
                </div>

                <div class="buttons">
                    <button type="submit" class="subBtn">
                        <div class="btnText">Update</div>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

</body>
</html>