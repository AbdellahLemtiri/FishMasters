<?php
namespace App\Controllers;
use App\Models\Pecheur;
use App\models\Prise;
use App\models\Competition;
use Config\Connexion;
class PecheurController
{
    public function dashboardPecheur()
    { 
       $db = Connexion::connect()->getConnexion();
       $Pecheur = ( new Pecheur($db))->getPecheurById(15); 
       $cmpetitions = Competition::getAll($db);   
       $specs = 
       require_once '../App/views/Pecheur/dashboardPecheur.php';
    }
}   