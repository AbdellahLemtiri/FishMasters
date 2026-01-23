<?php
session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\AuthController;
use config\Connexion;

$db = Connexion::connect()->getConnexion();

$action = $_GET['action'] ?? 'home';

$authController = new AuthController($db);

switch ($action) {
    case 'signup':
        include '../App/views/layouts/header.php';
        include '../App/views/auth/signup.php';
        include '../App/views/layouts/footer.php';
        break;

    case 'process_signup':
        $authController->signup();
        break;

    case 'login':
        include '../App/views/layouts/header.php';
        include '../App/views/auth/login.php';
        include '../App/views/layouts/footer.php';
        break;

    case 'process_login':
        $authController->login();
        break;

    case 'logout':
        session_destroy();
        header('Location: index.php');
        break;

    default:
        include '../App/views/layouts/header.php';
        include '../App/views/visitor/home.php';
        include '../App/views/layouts/footer.php';
        break;

    case 'admin_dashboard':
        if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != 1) {
            header('Location: index.php?action=login');
            exit();
        }
        $view = 'admin/dashboard.php';
        break;

    case 'dashboard':
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit();
        }
        $view = 'user/dashboard.php';
        break;
}
