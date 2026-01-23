<?php

namespace App\Models;
use App\models\User;    
use Config\Connexion;
use PDO;
use App\Utils\Logger;

class Pecheur extends User
{
    private string $region;
    private string $specialite;
    private string $photoPecheur;
    private bool $statutPecheur;
 

    public function getRegion(): string
    {
        return $this->region;
    }
    public function setRegion(string $region): void
    {
        $this->region = $region;
    }


    public function getSpecialite(): string
    {
        return $this->specialite;
    }
    public function setSpecialite(string $specialite): void
    {
        $this->specialite = $specialite;
    }


    public function getPhotoPecheur(): string
    {
        return $this->photoPecheur;
    }
    public function setPhotoPecheur(string $path): void
    {
        $this->photoPecheur = $path;
    }
  

    public function getStatutPecheur(): bool
    {
        return $this->statutPecheur;
    }
    public function setStatutPecheur(bool $statut): void
    {
        $this->statutPecheur = $statut;
      
    }

    Public function singup(){
        
    }

    
}
