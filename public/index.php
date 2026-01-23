<?php
namespace public;
use config\Connexion;
echo  'helo';
require_once __DIR__ . '/../config/Connexion.php';
echo Connexion::connect()->getConnexion();