<?php
session_start();
include_once '../models/db.php';
include_once '../models/EditModel.php';

class EditController {
    private $db;
    private $model;

    public function __construct($id) {
        $this->db = new Database('localhost', 'root', '', 'inform_details');
        $this->model = new EditModel($this->db->getConnection(), $id);
    }

    public function edit() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->model->updateData($_POST);
            header("Location: submit.php"); // Redirect after updating
            exit();
        }

        $formationData = $this->model->getFormationData();
        $birthData = $this->model->getBirthData();
        $addressData = $this->model->getAddressData();
        $contactData = $this->model->getContactData();
        $parentsData = $this->model->getParentsData();
        $this->model->closeConnection();

        include '../views/update.php';
    }
}
?>