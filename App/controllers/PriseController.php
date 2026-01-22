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
            $espece = $_POST['espece'] ?? '';
            $poids = $_POST['poids'] ?? null;
            $taille = $_POST['taille'] ?? null;
            $dateHeure = $_POST['dateHeure'] ?? '';
            $spot = $_POST['spot'] ?? '';
            $isRelache = $_POST['isRelache'];
            $idPecheur = ($_POST['idPecheur'] ?? 0);
            $photo = '';
            if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
                try {
                    $photo = $this->handleUpload($_FILES['photo']);
                } catch (Exception $e) {
                    Logger::log("Erreur de telechargement de l'image : " . $e->getMessage());
                }
            }
            $prise = new Prise();
            $prise->setEspece($espece);
            $prise->setPoids($poids);
            $prise->setTaille($taille);
            $prise->setDateHeure($dateHeure);
            $prise->setSpot($spot);
            $prise->setIsRelache($isRelache);
            $prise->setIdPecheur($idPecheur);
            $prise->setPhoto($photo);
            $prise->createPrise();
        }
    }

    private function handleUpload($file): string
    {
        $storageDir = __DIR__ . '../../public/uploads/prises/';
        echo $storageDir;
        if (!is_dir($storageDir)) {
            mkdir($storageDir, 0777, true);
        }
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $newName = uniqid('fish_') . '_' . time() . '.' . $extension;

        if (move_uploaded_file($file['tmp_name'], $storageDir . $newName)) {
            return $newName;
        }
         
        throw new Exception('Erreur lors du telechargement du fichier.');
    }
}


