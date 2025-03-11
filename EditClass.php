<?php
class edit {
    private $conn;
    private $id;
    private $formationData;
    private $birthData;
    private $addressData;
    private $contactData;
    private $parentsData;

    public function __construct($conn, $id) {
        $this->conn = $conn;
        $this->id = intval($id); // Ensure ID is an integer
        $this->fetchData();
    }

    private function fetchData() {
        // Fetch formation data
        $stmt = $this->conn->prepare("SELECT * FROM tbl_formation WHERE u_id = ?");
        $stmt->bind_param("i", $this->id);
        $stmt->execute();
        $this->formationData = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        // Fetch birth data
        $stmt = $this->conn->prepare("SELECT * FROM tbl_birth WHERE b_id = ?");
        $stmt->bind_param("i", $this->id);
        $stmt->execute();
        $this->birthData = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        // Fetch address data
        $stmt = $this->conn->prepare("SELECT * FROM tbl_address WHERE h_id = ?");
        $stmt->bind_param("i", $this->id);
        $stmt->execute();
        $this->addressData = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        // Fetch contact data
        $stmt = $this->conn->prepare("SELECT * FROM tbl_contact WHERE c_id = ?");
        $stmt->bind_param("i", $this->id);
        $stmt->execute();
        $this->contactData = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        // Fetch parents data
        $stmt = $this->conn->prepare("SELECT * FROM tbl_parents WHERE p_id = ?");
        $stmt->bind_param("i", $this->id);
        $stmt->execute();
        $this->parentsData = $stmt->get_result()->fetch_assoc();
        $stmt->close();
    }

    public function updateData($postData) {
        // Update formation data
        $stmt = $this->conn->prepare("UPDATE tbl_formation SET u_lname = ?, u_fname = ?, u_middle = ?, u_dob = ?, u_sex = ?, u_status = ?, u_tax = ?, u_nationality = ?, u_religion = ? WHERE u_id = ?");
        $stmt->bind_param("sssssssssi", 
            $postData['last_name'], 
            $postData['first_name'], 
            $postData['middle_initial'], 
            $postData['date_of_birth'], 
            $postData['sex'], 
            $postData['civil_status'], 
            $postData['tax_id'], 
            $postData['nationality'], 
            $postData['religion'], 
            $this->id
        );
        $stmt->execute();
        $stmt->close();

        // Update birth data
        $stmt = $this->conn->prepare("UPDATE tbl_birth SET b_unit = ?, b_blk = ?, b_sn = ?, b_sub = ?, b_brgy = ?, b_city = ?, b_province = ?, b_country = ?, b_zip = ? WHERE b_id = ?");
        $stmt->bind_param("issssssssi", 
            $postData['birth_unit'], 
            $postData['birth_blk_no'], 
            $postData['birth_street_name'], 
            $postData['birth_subdivision'], 
            $postData['birth_brgy'], 
            $postData['birth_city'], 
            $postData['birth_province'], 
            $postData['birthcountry'], 
            $postData['birth_zip_code'], 
            $this->id
        );
        $stmt->execute();
        $stmt->close();

        // Update address data
        $stmt = $this->conn->prepare("UPDATE tbl_address SET h_unit = ?, h_blk = ?, h_sn = ?, h_sub = ?, h_brgy = ?, h_city = ?, h_province = ?, h_country = ?, h_zip = ? WHERE h_id = ?");
        $stmt->bind_param("issssssssi", 
            $postData['unit'], 
            $postData['blk_no'], 
            $postData['street_name'], 
            $postData['subdivision'], 
            $postData['brgy'], 
            $postData['city'], 
            $postData['province'], 
            $postData['country'], 
            $postData['zip_code'], 
            $this->id
        );
        $stmt->execute();
        $stmt->close();

        // Update contact data
        $stmt = $this->conn->prepare("UPDATE tbl_contact SET c_mobile = ?, c_tel = ?, c_email = ? WHERE c_id = ?");
        $stmt->bind_param("sssi", 
            $postData['mobile_phone'], 
            $postData['telephone_number'], 
            $postData['email'], 
            $this->id
        );
        $stmt->execute();
        $stmt->close();

        // Update parents data
        $stmt = $this->conn->prepare("UPDATE tbl_parents SET f_lname = ?, f_fname = ?, f_middle = ?, m_lname = ?, m_fname = ?, m_middle = ? WHERE p_id = ?");
        $stmt->bind_param("ssssssi", 
            $postData['father_last_name'], 
            $postData['father_first_name'], 
            $postData['father_middle_name'], 
            $postData['mother_last_name'], 
            $postData['mother_first_name'], 
            $postData['mother_middle_name'], 
            $this->id
        );
        $stmt->execute();
        $stmt->close();
    }

    public function getFormationData() {
        return $this->formationData;
    }

    public function getBirthData() {
        return $this->birthData;
    }

    public function getAddressData() {
        return $this->addressData;
    }

    public function getContactData() {
        return $this->contactData;
    }

    public function getParentsData() {
        return $this->parentsData;
    }

    public function closeConnection() {
        $this->conn->close();
    }
}
?>