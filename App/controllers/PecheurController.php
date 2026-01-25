<?php

namespace App\Controllers;

use App\Models\Pecheur;
use App\models\Prise;
use App\models\Competition;
use Config\Connexion;
use App\Utils\Logger;

class PecheurController
{
    public function dashboardPecheur()
    {
        $db = Connexion::connect()->getConnexion();
        $Pecheur = (new Pecheur($db))->getPecheurById(4);
        $cmpetitions = Competition::getOpenCompetitions();
        require_once '../App/views/Pecheur/dashboardPecheur.php';
    }
    public function updateProfile()
    {
        // if (!isset($_SESSION['user_id'])) {
        //     header('Location: index.php?action=login');
        //     exit();
        // }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $db = Connexion::connect()->getConnexion();
                $pecheur = new Pecheur($db);
                $pecheur->setIdUser(4);
                $pecheur->setRegion($_POST['region'] ?? '');
                $pecheur->setSpecialite($_POST['specialite'] ?? '');
                $pecheur->setClub($_POST['club'] ?? 'Indépendant');
                $newNom = $_POST['nomUser'] ?? '';
                $pecheur->setNomUser($newNom);
                if ($pecheur->updatePecheur()) {
                    header('Location: index.php?action=dashboardPecheur&status=success');
                } else {

                    header('Location: index.php?action=dashboardPecheur&status=error');
                }
                exit();
            } catch (\Exception $e) {
                Logger::log("Controller Update Error: " . $e->getMessage());
                header('Location: index.php?action=dashboardPecheur');
                exit();
            }
        }
    }
}
