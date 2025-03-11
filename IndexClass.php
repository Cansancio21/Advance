<?php
class index {
    private $errors = [];
    private $success = false;
    private $formData = [];
    private $Status = [
        "Single", "Married", "Widowed", "Legally Separated", "Others"
    ];
    private $countries = [
        "Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", 
        // ... (other countries)
        "Zambia", "Zimbabwe", "Åland Islands"
    ];

    public function handleRequest() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->collectFormData();
            $this->validateFormData();

            if (empty($this->errors)) {
                $_SESSION['form_data'] = $this->formData;
                header("Location: submit.php");
                exit();
            }
        }
    }

    private function collectFormData() {
        $this->formData = [
            'last_name' => trim($_POST['last_name'] ?? ''),
            'first_name' => trim($_POST['first_name'] ?? ''),
            'middle_initial' => trim($_POST['middle_initial'] ?? ''),
            'date_of_birth' => $_POST['date_of_birth'] ?? '',
            'sex' => $_POST['sex'] ?? '',
            'civil_status' => $_POST['civil_status'] ?? '',
            'others' => trim($_POST['others'] ?? ''),
            'tax_id' => trim($_POST['tax_id'] ?? ''),
            'nationality' => trim($_POST['nationality'] ?? ''),
            'religion' => trim($_POST['religion'] ?? ''),
            'birth' => [
                'birth_unit' => trim($_POST['birth_unit'] ?? ''),
                'birth_blk_no' => trim($_POST['birth_blk_no'] ?? ''),
                'birth_street_name' => trim($_POST['birth_street_name'] ?? ''),
                'birth_subdivision' => trim($_POST['birth_subdivision'] ?? ''),
                'birth_brgy' => trim($_POST['birth_brgy'] ?? ''),
                'birth_city' => trim($_POST['birth_city'] ?? ''),
                'birth_province' => trim($_POST['birth_province'] ?? ''),
                'birth_zip_code' => trim($_POST['birth_zip_code'] ?? ''),
                'birthcountry' => $_POST['birthcountry'] ?? '',
            ],
            'address' => [
                'unit' => trim($_POST['unit'] ?? ''),
                'blk_no' => trim($_POST['blk_no'] ?? ''),
                'street_name' => trim($_POST['street_name'] ?? ''),
                'subdivision' => trim($_POST['subdivision'] ?? ''),
                'brgy' => trim($_POST['brgy'] ?? ''),
                'city' => trim($_POST['city'] ?? ''),
                'province' => trim($_POST['province'] ?? ''),
                'zip_code' => trim($_POST['zip_code'] ?? ''),
                'country' => $_POST['country'] ?? '',
            ],
            'contact' => [
                'mobile' => trim($_POST['mobile_phone'] ?? ''),
                'telephone' => trim($_POST['telephone_number'] ?? ''),
                'email' => trim($_POST['email'] ?? ''),
            ],
            'father' => [
                'last_name' => trim($_POST['father_last_name'] ?? ''),
                'first_name' => trim($_POST['father_first_name'] ?? ''),
                'middle_name' => trim($_POST['father_middle_name'] ?? ''),
            ],
            'mother' => [
                'last_name' => trim($_POST['mother_last_name'] ?? ''),
                'first_name' => trim($_POST['mother_first_name'] ?? ''),
                'middle_name' => trim($_POST['mother_middle_name'] ?? ''),
            ],
        ];
    }

    private function validateFormData() {
        $this->validateName('last_name', $this->formData['last_name']);
        $this->validateName('first_name', $this->formData['first_name']);
        $this->validateName('middle_initial', $this->formData['middle_initial']);
        $this->validateParentName('father', $this->formData['father']);
        $this->validateParentName('mother', $this->formData['mother']);
        $this->validateDateOfBirth($this->formData['date_of_birth']);
        $this->validateSex($this->formData['sex']);
        $this->validateCivilStatus($this->formData['civil_status'], $this->formData['others']);
        $this->validateTaxId($this->formData['tax_id']);
        $this->validateNationality($this->formData['nationality']);
        $this->validateReligion($this->formData['religion']);
        $this->validateBirthAddress($this->formData['birth']);
        $this->validateHomeAddress($this->formData['address']);
        $this->validateContact($this->formData['contact']);
    }

    private function validateName($field, $value) {
        if (empty($value) || preg_match('/[0-9]/', $value)) {
            $this->errors[$field] = ucfirst(str_replace('_', ' ', $field)) . " must not contain numbers.";
        }
    }

    private function validateParentName($parent, $data) {
        foreach (['last_name', 'first_name', 'middle_name'] as $field) {
            if (empty($data[$field]) || preg_match('/[0-9]/', $data[$field])) {
                $this->errors["{$parent}_{$field}"] = ucfirst(str_replace('_', ' ', "{$parent} {$field}")) . " must not contain numbers.";
            }
        }
    }

    private function validateDateOfBirth($dob) {
        if (empty($dob)) {
            $this->errors['date_of_birth'] = "Invalid Date of Birth.";
        } elseif ($this->calculateAge($dob) < 18) {
            $this->errors['date_of_birth'] = "You must be at least 18 years old.";
        }
    }

    private function calculateAge($dob) {
        $dobDate = new DateTime($dob);
        $today = new DateTime();
        return $today->diff($dobDate)->y;
    }

    private function validateSex($sex) {
        if (empty($sex)) {
            $this->errors['sex'] = "Select a Gender.";
        }
    }

    private function validateCivilStatus($civilStatus, $otherCivil) {
        if (empty($civilStatus)) {
            $this->errors['civil_status'] = "Select a Civil Status.";
        } elseif ($civilStatus === 'Others' && empty($otherCivil)) {
            $this->errors['others'] = "Please Specify Your Civil Status.";
        }
    }

    private function validateTaxId($taxId) {
        if (empty($taxId) || !preg_match('/^[0-9]+$/', $taxId)) {
            $this->errors['tax_id'] = "Tax ID must contain numbers only.";
        }
    }

    private function validateNationality($nationality) {
        if (empty($nationality)) {
            $this->errors['nationality'] = "Field is required.";
        }
    }

    private function validateReligion($religion) {
        if (empty($religion)) {
            $this->formData['religion'] = "N/A";
        }
    }

    private function validateBirthAddress($birth) {
        if (empty($birth['birth_unit'])) {
            $this->errors['birth_unit'] = "Field is required.";
        }
        if (empty($birth['birth_blk_no'])) {
            $this->errors['birth_blk_no'] = "Field is required.";
        }
        if (empty($birth['birth_street_name'])) {
            $this->errors['birth_street_name'] = "Field is required.";
        }
        if (empty($birth['birth_zip_code']) || !preg_match('/^[0-9]+$/', $birth['birth_zip_code'])) {
            $this->errors['birth_zip_code'] = "Birth Zip Code must contain numbers only.";
        }
        if (empty($birth['birthcountry'])) {
            $this->formData['birth']['birthcountry'] = "N/A";
        }
    }

    private function validateHomeAddress($address) {
        if (empty($address['unit'])) {
            $this->errors['unit'] = "Field is required.";
        }
        if (empty($address['blk_no'])) {
            $this->errors['blk_no'] = "Field is required.";
        }
        if (empty($address['street_name'])) {
            $this->errors['street_name'] = "Field is required.";
        }
        if (empty($address['zip_code']) || !preg_match('/^[0-9]+$/', $address['zip_code'])) {
            $this->errors['zip_code'] = "Invalid Zip Code. Must contain numbers only.";
        }
        if (empty($address['country'])) {
            $this->formData['address']['country'] = "N/A";
        }
    }

    private function validateContact($contact) {
        if (empty($contact['mobile'])) {
            $this->errors['mobile_phone'] = "Field is required.";
        } elseif (!preg_match('/^[0-9]+$/', $contact['mobile'])) {
            $this->errors['mobile_phone'] = "Mobile must contain numbers only.";
        }
        if (empty($contact['email']) || !filter_var($contact['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "Invalid email format.";
        }
        if (empty($contact['telephone']) || !preg_match('/^[0-9]+$/', $contact['telephone'])) {
            $this->errors['telephone_number'] = "Telephone must contain numbers only.";
        }
    }

    public function getErrors() {
        return $this->errors;
    }

    public function getFormData() {
        return $this->formData;
    }

    public function getCivilStatusOptions() {
        return $this->generateOptions($this->Status);
    }

    public function getCountryOptions() {
        return $this->generateOptions($this->countries);
    }

    private function generateOptions($optionsArray, $selectedValue = '') {
        $options = "<option value='' disabled selected>Select an option</option>";
        foreach ($optionsArray as $option) {
            $isSelected = ($option === $selectedValue) ? 'selected' : '';
            $options .= "<option value='$option' $isSelected>$option</option>";
        }
        return $options;
    }
}
?>