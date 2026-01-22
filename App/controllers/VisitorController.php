<?php
<<<<<<< HEAD
namespace App\Controllers;
use App\models\Competition;
=======
require_once __DIR__ . '/../models/Competition.php';
>>>>>>> origin/Abdellah/featPecheur

class VisitorController {
    
    public function calendar() {
        $model = new Competition();
        $competitions = $model->getAll();
        require_once __DIR__ . '/../../views/layouts/header.php';
        require_once __DIR__ . '/../../views/visitor/calendar.php';
        require_once __DIR__ . '/../../views/layouts/footer.php';
    }
}
?>