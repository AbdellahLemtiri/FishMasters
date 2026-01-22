<?php

namespace App\models;
use DateTime;
use App\models\Competition;
class Prise
{
private int $idPrise; 
private string $espece;  
private float $poids;   
private float $taille;  
private string $photo;  
private DateTime $dateHeure;  
private string $spot;  
private bool $isRelache;  
private string $statut;  
private int $idPecheur;  
private int $idCompetition; 
private Competition $competition;    

    public function getIdPrise(): int { return $this->idPrise; }
    public function getEspece(): string { return $this->espece; }
    public function getPoids(): float { return $this->poids; }
    public function getTaille(): float { return $this->taille; }
    public function getPhoto(): string { return $this->photo; }
    public function getDateHeure(): DateTime { return $this->dateHeure; }
    public function getSpot(): string { return $this->spot; }
    public function getIsRelache(): bool { return $this->isRelache; }
    public function getStatut(): string { return $this->statut; }
    public function getIdPecheur(): int { return $this->idPecheur; }
    public function getIdCompetition(): int { return $this->idCompetition; }

     

    public function setPoids(float $poids): bool {
        if ($poids <= 0) {
            return false;
        }
        $this->poids = $poids;
        return true;
    }

    public function setTaille(float $taille): bool {
        if ($taille <= 0) {
            return false;
        }
        $this->taille = $taille;
        return true;
    }

    public function setStatut(string $statut): bool {
        $valides = ['En attente', 'Validée', 'Refusée'];
        if (!in_array($statut, $valides)) {
            return false;
        }
        $this->statut = $statut;
        return true;
    }

    public function setPhoto(string $photoPath): bool 
    {
        $extension = pathinfo($photoPath, PATHINFO_EXTENSION);
        if (!in_array(strtolower($extension), ['jpg', 'jpeg', 'png'])) {
            return false;
        }
        $this->photo = $photoPath;
        return true;
    }
   
    public function setIdPrise(int $id): void { $this->idPrise = $id; }
    public function setEspece(string $e): void { $this->espece = $e; }
    public function setSpot(string $s): void { $this->spot = $s; }
    public function setIsRelache(bool $r): void { $this->isRelache = $r; }
    public function setDateHeure(DateTime $d): void { $this->dateHeure = $d; }
    public function setIdPecheur(int $id): void { $this->idPecheur = $id; }
    public function setIdCompetition(int $id): void { $this->idCompetition = $id; }

    
}
