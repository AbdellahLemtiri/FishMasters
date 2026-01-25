<?php
session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\AuthController;
use Config\Connexion;
use App\Controllers\PriseController;
use App\Controllers\PecheurController;
$db = Connexion::connect();
$action = $_GET['action'] ?? 'home';
$authController = new AuthController($db);
$priseController = new PriseController();
$useStandardLayout = true;
$PecheurController = new PecheurController();
$view = '';

switch ($action) {
    case 'signup':
        $view = '../App/views/auth/signup.php';
        break;

    case 'process_signup':
        $authController->signup();
        exit();

    case 'login':
        $view = '../App/views/auth/login.php';
        break;

    case 'process_login':
        $authController->login();
        exit();

    case 'admin_dashboard':
        if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != 1) {
            header('Location: index.php?action=login');
            exit();
        }
        $view = __DIR__ . '/../App/views/admin/a_dashbord.php';
        $useStandardLayout = false;
        break;
  
   
    case 'logout':
        session_destroy();
        header('Location: index.php');
        exit();
///////////////////  Pecheur ////////////////////
  case 'dashboardPecheur':
    $PecheurController->dashboardPecheur();
    break;
  case 'savePrise':
       $priseController->creatPrise();
        break;
 case 'updateProfile':
    $PecheurController->updateProfile();
    break;
/////////////////////////////////////////////////
    default:
        $view = '../App/views/visitor/home.php';
        break;
    
}

if ($useStandardLayout) {
    include '../App/views/layouts/header.php';
    include $view;
    include '../App/views/layouts/footer.php';
} else {
    include $view;
}
