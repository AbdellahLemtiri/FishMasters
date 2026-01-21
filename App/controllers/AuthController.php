<?php

namespace App\Controllers;

use App\models\User; 

class AuthController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function signup() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nomUser'];
            $email = $_POST['emailUser'];
            $pass = $_POST['passwordUser'];
            $idRole = 2;
            
            $userModel = new User($this->db);

            if ($userModel->register($nom, $email, $pass, $idRole)) {
                header('Location: index.php?action=login');
                exit();
            }
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['emailUser'];
            $pass = $_POST['passwordUser'];

            $userModel = new User($this->db);

            if ($userModel->login($email, $pass)) {
                session_start();
                $_SESSION['user_id'] = $userModel->getIdUser();
                $_SESSION['nom'] = $userModel->getNomUser();
                
                header('Location: index.php?action=dashboard');
                exit();
            }
        }
    }
}