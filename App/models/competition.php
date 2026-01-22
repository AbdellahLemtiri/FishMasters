<?php

namespace App\models;

use App\utils\Logger;
use PDOException;
use DateTime;
use Exception;

class Competition
{
    private int $idCompetition;
    private string $titreCompetition;
    private string $lieu;
    private string $typeMilieu;
    private DateTime $dateDebut;
    private DateTime $dateFin;
    private string $statut;
    private int $nbManches;
    private string $modeScoring;
    private string $reglement;


    public function getIdCompetition(): int
    {
        return $this->idCompetition;
    }
    public function getTitreCompetition(): string
    {
        return $this->titreCompetition;
    }
    public function getLieu(): string
    {
        return $this->lieu;
    }
    public function getTypeMilieu(): string
    {
        return $this->typeMilieu;
    }
    public function getDateDebut(): DateTime
    {
        return $this->dateDebut;
    }
    public function getDateFin(): dateTime
    {
        return $this->dateFin;
    }
    public function getStatut(): string
    {
        return $this->statut;
    }
    public function getNbManches(): int
    {
        return $this->nbManches;
    }
    public function getModeScoring(): string
    {
        return $this->modeScoring;
    }
    public function getReglement(): string
    {
        return $this->reglement;
    }



    public function setIdCompetition(int $id): void
    {
        $this->idCompetition = $id;
    }

    public function setTitreCompetition(string $titre): bool
    {
        if (strlen($titre) < 5) {
            return false;
        }
        $this->titreCompetition = $titre;
        return true;
    }
    public function setModeScoring(string $mode): bool
    {

        $modes = ['Poids Total', 'Taille Cumulee'];
        if (!in_array($mode, $modes)) {
            return false;
        }
        $this->modeScoring = $mode;
        return true;
    }

    public function setTypeMilieu(string $milieu): bool
    {
        $milieux = ['Mer', 'Eau Douce'];
        if (!in_array($milieu, $milieux)) {
            return false;
        }
        $this->typeMilieu = $milieu;
        return true;
    }

    public function setStatut(string $statut): bool
    {
        $statutsValides = ['Ouvert', 'En cours', 'Terminé'];
        if (!in_array($statut, $statutsValides)) {
            return   false;
        }
        $this->statut = $statut;
        return true;
    }

    public function setNbManches(int $n): bool
    {
        if ($n <= 0) {
            return false;
        }
        $this->nbManches = $n;

        return true;
    }

    public function setDate(DateTime $debut, DateTime $fin): bool
    {
        if ($debut > $fin) {
            return false;
        }

        $this->dateDebut = $debut;
        $this->dateFin = $fin;
        return true;
    }

    
}
