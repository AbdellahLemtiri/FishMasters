<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';

use config\Database;
use App\Controllers\AuthController;

$database = new \Database();
$db = $database->getConnection();

$action = $_GET['action'] ?? 'home';

$authController = new AuthController($db);

switch ($action) {
    case 'signup':
        include 'views/auth/signup.php'; 
        break;

    case 'process_signup':
        $authController->signup();
        break;

    case 'login':
        include 'views/auth/login.php';
        break;

    case 'process_login':
        $authController->login();
        break;

    case 'logout':
        session_destroy();
        header('Location: index.php');
        break;

    default:
        include 'views/home.php';
        break;
}