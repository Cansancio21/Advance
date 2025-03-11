<?php
class submit {
    private $conn;
    private $formData;

    public function __construct($conn) {
        $this->conn = $conn;
        $this->formData = $_SESSION['form_data'] ?? null;
    }

    public function processFormData() {
        if (!$this->formData) {
            return;
        }

        unset($_SESSION['form_data']); 

        // Insert data into tbl_formation
        $this->insertFormation();
        // Insert data into tbl_birth
        $this->insertBirth();
        // Insert data into tbl_address
        $this->insertAddress();
        // Insert data into tbl_contact
        $this->insertContact();
        // Insert data into tbl_parents
        $this->insertParents();
    }

    private function insertFormation() {
        $stmt = $this->conn->prepare("INSERT INTO tbl_formation(u_lname, u_fname, u_middle, u_dob, u_sex, u_status, u_tax, u_nationality, u_religion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", 
            $this->formData['last_name'], 
            $this->formData['first_name'], 
            $this->formData['middle_initial'], 
            $this->formData['date_of_birth'], 
            $this->formData['sex'], 
            $this->formData['civil_status'], 
            $this->formData['tax_id'], 
            $this->formData['nationality'], 
            $this->formData['religion']
        );
        $stmt->execute();
        $stmt->close();
    }

    private function insertBirth() {
        $stmt = $this->conn->prepare("INSERT INTO tbl_birth(b_unit, b_blk, b_sn, b_sub, b_brgy, b_city, b_province, b_country, b_zip) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issssssss", 
            $this->formData['birth']['birth_unit'], 
            $this->formData['birth']['birth_blk_no'], 
            $this->formData['birth']['birth_street_name'], 
            $this->formData['birth']['birth_subdivision'], 
            $this->formData['birth']['birth_brgy'], 
            $this->formData['birth']['birth_city'], 
            $this->formData['birth']['birth_province'], 
            $this->formData['birth']['birthcountry'], 
            $this->formData['birth']['birth_zip_code']
        );
        $stmt->execute();
        $stmt->close();
    }

    private function insertAddress() {
        $stmt = $this->conn->prepare("INSERT INTO tbl_address(h_unit, h_blk, h_sn, h_sub, h_brgy, h_city, h_province, h_country, h_zip) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issssssss", 
            $this->formData['address']['unit'], 
            $this->formData['address']['blk_no'], 
            $this->formData['address']['street_name'], 
            $this->formData['address']['subdivision'], 
            $this->formData['address']['brgy'], 
            $this->formData['address']['city'], 
            $this->formData['address']['province'], 
            $this->formData['address']['country'], 
            $this->formData['address']['zip_code']
        );
        $stmt->execute();
        $stmt->close();
    }

    private function insertContact() {
        $stmt = $this->conn->prepare("INSERT INTO tbl_contact(c_mobile, c_email, c_tel) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", 
            $this->formData['contact']['mobile'], 
            $this->formData['contact']['email'], 
            $this->formData['contact']['telephone']
        );
        $stmt->execute();
        $stmt->close();
    }

    private function insertParents() {
        $stmt = $this->conn->prepare("INSERT INTO tbl_parents(f_lname, f_fname, f_middle, m_lname, m_fname, m_middle) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", 
            $this->formData['father']['last_name'], 
            $this->formData['father']['first_name'], 
            $this->formData['father']['middle_name'], 
            $this->formData['mother']['last_name'], 
            $this->formData['mother']['first_name'], 
            $this->formData['mother']['middle_name']
        );
        $stmt->execute();
        $stmt->close();
    }

    public function fetchData() {
        $data = [];
        $data['formation'] = $this->conn->query("SELECT * FROM tbl_formation");
        $data['birth'] = $this->conn->query("SELECT * FROM tbl_birth");
        $data['address'] = $this->conn->query("SELECT * FROM tbl_address");
        $data['contact'] = $this->conn->query("SELECT * FROM tbl_contact");
        $data['parents'] = $this->conn->query("SELECT * FROM tbl_parents");
        return $data;
    }

    public function closeConnection() {
        $this->conn->close();
    }
}
?>