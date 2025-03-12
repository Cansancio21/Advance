<?php
session_start();
include_once '../models/db.php';
include_once '../models/ViewModel.php';

class ViewController {
    private $db;

    public function __construct() {
        $this->db = new Database('localhost', 'root', '', 'inform_details');
    }

    public function view($table, $id) {
        $model = new ViewModel($this->db->getConnection(), $table, $id);
        $model->fetchRecord();
        $data = $model->getData();
        $model->closeConnection();

        include '../views/one_view.php'; // Load the view
    }
}
?>