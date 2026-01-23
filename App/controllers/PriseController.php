<?php

namespace App\Controllers;

use App\Utils\Logger;
use App\Models\Prise;
use Exception;

class PriseController
{
    public function creatPrise()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $espece = $_POST['espece'] ?? 1;
            $poids = $_POST['poids'] ?? null;
            $taille = $_POST['taille'] ?? null;

            if ($poids === null) {
                $poids = 0;
            } else {
                $poids = floatval($poids);
            }

            if ($taille === null) {
                $taille = 0;
            } else {
                $taille = floatval($taille);
            }

            $spot = $_POST['spot'] ?? '';
            $relache = $_POST['relache'];
            $idPecheur = ($_POST['idPecheur'] ?? 1);
            $photo = '';


            if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
                try {
                    $photo = $this->handleUpload($_FILES['photo']);
                } catch (Exception $e) {
                    Logger::log("Erreur de telechargement de l'image : " . $e->getMessage());
                }
            }
            try {
                $prise = new Prise();
                $prise->setEspece(2);
                $prise->setPoids($poids);
                $prise->setTaille($taille);
                $prise->setSpot($spot);
                $prise->setRelache($relache);
                $prise->setIdPecheur(4);
                $prise->setPhoto($photo);
                $prise->setIdCompetition(1);
                $prise->createPrise();
                header('Location: index.php?action=dashboard&success=creation_successful'); 
                exit();
            } catch (Exception $e) {
                Logger::log("Erreur lors de la création de la prise : " . $e->getMessage());
                header('Location: index.php?action=dashboard&error=creation_failed');
                exit();
            }
        }
    }

    private function handleUpload($file): string
    {
        $storageDir = __DIR__ . '../../../public/uploads/prises/';
        echo $storageDir;
        if (!is_dir($storageDir)) {
            mkdir($storageDir, 0777, true);
        }
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $newName = uniqid('fish_') . '_' . time() . '.' . $extension;

        if (move_uploaded_file($file['tmp_name'], $storageDir . $newName)) {
            return $newName;
        } else {
            return '';
        }
    }

    
}
