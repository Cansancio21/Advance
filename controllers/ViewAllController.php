<?php
session_start();
include_once '../models/db.php';
include_once '../models/ViewAllModel.php';

class ViewAllController {
    private $db;

    public function __construct() {
        $this->db = new Database('localhost', 'root', '', 'inform_details');
    }

    public function view($id) {
        $model = new ViewAllModel($this->db->getConnection(), $id);
        $model->fetchData();
        $data = $model->getData();
        $model->closeConnection();

        include '../views/viewAll.php'; // Load the view
    }
}
?>