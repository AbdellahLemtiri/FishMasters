<?php

namespace App\Controllers;

use App\models\User; 

class AuthController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['emailUser'];
            $pass = $_POST['passwordUser'];

            $userModel = new User($this->db);

            if ($userModel->login($email, $pass)) {
                $_SESSION['user_id'] = $userModel->getIdUser();
                $_SESSION['nom'] = $userModel->getNomUser();
                $_SESSION['role_id'] = $userModel->getIdRole();
                
                if ($_SESSION['role_id'] == 1) {
                    header('Location: index.php?action=admin_dashboard');
                } else {
                    header('Location: index.php?action=dashboard');
                }
                exit();
            } else {
                $_SESSION['error'] = "Email ou mot de passe incorrect.";
                header('Location: index.php?action=login');
                exit();
            }
        }
    }

    public function signup() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nomUser'];
            $email = $_POST['emailUser'];
            $pass = $_POST['passwordUser'];
            
            $userModel = new User($this->db);

            if ($userModel->register($nom, $email, $pass, 2)) {
                header('Location: index.php?action=login');
                exit();
            }
        }
    }
}