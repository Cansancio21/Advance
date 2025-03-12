<?php
session_start();
include_once '../models/db.php';
include_once '../models/FormHandler.php';

// Define a base path for easier file inclusion
define('BASE_PATH', dirname(__DIR__)); // This points to the 'Advance' directory

class IndexController {
    private $formHandler;

    public function __construct() {
        $this->formHandler = new FormHandler();
        $this->formHandler->handleRequest();
    }

    public function render() {
        $errors = $this->formHandler->getErrors();
        $formData = $this->formHandler->getFormData();
        $civilStatusOptions = $this->formHandler->getCivilStatusOptions();
        $countryOptions = $this->formHandler->getCountryOptions();

        // Use the base path to include the view
        include BASE_PATH . '/views/form.php';
    }
}
?>