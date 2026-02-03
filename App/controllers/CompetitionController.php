<?php

namespace App\Controllers;

use App\Models\Competition;
use PDO;
use DateTime;

class CompetitionController
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }


    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $competition = new Competition($this->db);

            $competition->setIdCompetition($_POST['idcompetition']);
            $competition->setTitreCompetition($_POST['titre']);
            $competition->setTypeMilieu($_POST['typemilieu']);
            $competition->setStatut($_POST['status']);
            $competition->setNbManches((int)$_POST['nbmanches']);
            $competition->setIdCategorie((int)$_POST['idcategorie']);

            $competition->setDate(
                new DateTime($_POST['datedebut']),
                new DateTime($_POST['datefin'])
            );

            if ($competition->createComp()) {
                echo " Competition created successfully";
            } else {
                echo " Error while creating competition";
            }
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $competition = new Competition($this->db);

            $competition->setIdCompetition($_POST['idcompetition']);
            $competition->setTitreCompetition($_POST['titre']);
            $competition->setTypeMilieu($_POST['typemilieu']);
            $competition->setStatut($_POST['status']);
            $competition->setNbManches((int)$_POST['nbmanches']);
            $competition->setIdCategorie((int)$_POST['idcategorie']);

            $competition->setDate(
                new DateTime($_POST['datedebut']),
                new DateTime($_POST['datefin'])
            );

            if ($competition->updateComp()) {
                echo " Competition updated successfully";
            } else {
                echo " Error while updating competition";
            }
        }
    }

    
    public function delete()
    {
        if (isset($_GET['id'])) {

            $competition = new Competition($this->db);
            $competition->setIdCompetition((int)$_GET['id']);

            if ($competition->deleteComp()) {
                echo " Competition deleted";
            } else {
                echo " Error while deleting competition";
            }
        }
    }

    
    public function index()
    {
        return Competition::getall($this->db);
    }


    public function show($id)
    {
        return Competition::getbyId($this->db, $id);
    }

    public function totalCompetitions()
    {
        return Competition::getTotalCompetitions($this->db);
    }
}
