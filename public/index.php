<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../app/controllers/VisitorController.php';

$controller = new VisitorController();
$controller->calendar();
?>
