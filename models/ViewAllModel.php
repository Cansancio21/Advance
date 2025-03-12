<?php
class ViewAllModel {
    private $conn;
    private $id;
    private $data;

    public function __construct($conn, $id) {
        $this->conn = $conn;
        $this->id = intval($id); // Ensure ID is an integer
        $this->data = [];
    }

    public function fetchData() {
        // Fetch formation data
        $stmt = $this->conn->prepare("SELECT * FROM tbl_formation WHERE u_id = ?");
        if ($stmt) {
            $stmt->bind_param("i", $this->id);
            $stmt->execute();
            $this->data['formation'] = $stmt->get_result()->fetch_assoc();
            $stmt->close();
        }

        // Fetch birth data
        $stmt = $this->conn->prepare("SELECT * FROM tbl_birth WHERE b_id = ?");
        if ($stmt) {
            $stmt->bind_param("i", $this->id);
            $stmt->execute();
            $this->data['birth'] = $stmt->get_result()->fetch_assoc();
            $stmt->close();
        }

        // Fetch address data
        $stmt = $this->conn->prepare("SELECT * FROM tbl_address WHERE h_id = ?");
        if ($stmt) {
            $stmt->bind_param("i", $this->id);
            $stmt->execute();
            $this->data['address'] = $stmt->get_result()->fetch_assoc();
            $stmt->close();
        }

        // Fetch contact data
        $stmt = $this->conn->prepare("SELECT * FROM tbl_contact WHERE c_id = ?");
        if ($stmt) {
            $stmt->bind_param("i", $this->id);
            $stmt->execute();
            $this->data['contact'] = $stmt->get_result()->fetch_assoc();
            $stmt->close();
        }

        // Fetch parents data
        $stmt = $this->conn->prepare("SELECT * FROM tbl_parents WHERE p_id = ?");
        if ($stmt) {
            $stmt->bind_param("i", $this->id);
            $stmt->execute();
            $this->data['parents'] = $stmt->get_result()->fetch_assoc();
            $stmt->close();
        }
    }

    public function getData() {
        return $this->data;
    }

    public function closeConnection() {
        $this->conn->close();
    }
}
?>