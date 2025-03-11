<?php
class Viewer {
    private $conn;
    private $id;
    private $data;

    public function __construct($conn, $id) {
        $this->conn = $conn;
        $this->id = intval($id); // Ensure ID is an integer
        $this->data = null; // Initialize data as null
    }

    public function fetchData() {
        // Fetch formation data
        $stmt = $this->conn->prepare("SELECT * FROM tbl_formation WHERE u_id = ?");
        if ($stmt) {
            $stmt->bind_param("i", $this->id);
            $stmt->execute();
            $this->data['formation'] = $stmt->get_result()->fetch_assoc();
            $stmt->close();
        } else {
            echo "Error preparing statement for formation data: " . $this->conn->error;
        }

        // Fetch birth data
        $stmt = $this->conn->prepare("SELECT * FROM tbl_birth WHERE b_id = ?");
        if ($stmt) {
            $stmt->bind_param("i", $this->id);
            $stmt->execute();
            $this->data['birth'] = $stmt->get_result()->fetch_assoc();
            $stmt->close();
        } else {
            echo "Error preparing statement for birth data: " . $this->conn->error;
        }

        // Fetch address data
        $stmt = $this->conn->prepare("SELECT * FROM tbl_address WHERE h_id = ?");
        if ($stmt) {
            $stmt->bind_param("i", $this->id);
            $stmt->execute();
            $this->data['address'] = $stmt->get_result()->fetch_assoc();
            $stmt->close();
        } else {
            echo "Error preparing statement for address data: " . $this->conn->error;
        }

        // Fetch contact data
        $stmt = $this->conn->prepare("SELECT * FROM tbl_contact WHERE c_id = ?");
        if ($stmt) {
            $stmt->bind_param("i", $this->id);
            $stmt->execute();
            $this->data['contact'] = $stmt->get_result()->fetch_assoc();
            $stmt->close();
        } else {
            echo "Error preparing statement for contact data: " . $this->conn->error;
        }

        // Fetch parents data
        $stmt = $this->conn->prepare("SELECT * FROM tbl_parents WHERE p_id = ?");
        if ($stmt) {
            $stmt->bind_param("i", $this->id);
            $stmt->execute();
            $this->data['parents'] = $stmt->get_result()->fetch_assoc();
            $stmt->close();
        } else {
            echo "Error preparing statement for parents data: " . $this->conn->error;
        }
    }

    public function getData() {
        return $this->data;
    }

    public function hasData() {
        return !empty($this->data['formation']) || !empty($this->data['birth']) || 
               !empty($this->data['address']) || !empty($this->data['contact']) || 
               !empty($this->data['parents']);
    }

    public function closeConnection() {
        $this->conn->close();
    }
}
?>