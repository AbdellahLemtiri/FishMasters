<?php

namespace App\Models;

use App\Utils\Logger;

use PDOException;
use DateTime;
use Exception;
use PDO;

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
    private int  $idCategorie;

    private PDO $db;


    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function __construct(
        int $idCompetition,
        string $titreCompetition,
        string $lieu,
        string $typeMilieu,
        DateTime $dateDebut,
        DateTime $dateFin,
        string $statut,
        int $nbManches,
        string $modeScoring,
        string $reglement
    ) {
        $this->idCompetition = $idCompetition;
        $this->titreCompetition = $titreCompetition;
        $this->lieu = $lieu;
        $this->typeMilieu = $typeMilieu;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
        $this->statut = $statut;
        $this->nbManches = $nbManches;
        $this->modeScoring = $modeScoring;
        $this->reglement = $reglement;
    }


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
    public function getDateFin(): DateTime
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
    public function getIdCategorie(): int
    {
        return $this->idCategorie;
    }


    public function setIdCompetition(int $id): void
    {
        $this->idCompetition = $id;
    }

    public function setTitreCompetition(string $titre): bool
    {
        if (strlen($titre) < 5) return false;
        $this->titreCompetition = $titre;
        return true;
    }

    public function setModeScoring(string $mode): bool
    {
        $modes = ['Poids Total', 'Taille Cumulee'];
        if (!in_array($mode, $modes)) return false;
        $this->modeScoring = $mode;
        return true;
    }

    public function setTypeMilieu(string $milieu): bool
    {
        $milieux = ['Mer', 'Eau Douce'];
        if (!in_array($milieu, $milieux)) return false;
        $this->typeMilieu = $milieu;
        return true;
    }

    public function setStatut(string $statut): bool
    {
        $statutsValides = ['Ouvert', 'En cours', 'Terminé'];
        if (!in_array($statut, $statutsValides)) return false;
        $this->statut = $statut;
        return true;
    }

    public function setNbManches(int $n): bool
    {
        if ($n <= 0) return false;
        $this->nbManches = $n;
        return true;
    }

    public function setDate(DateTime $debut, DateTime $fin): bool
    {
        if ($debut > $fin) return false;
        $this->dateDebut = $debut;
        $this->dateFin = $fin;
        return true;
    }

    public function setIdCategorie($idCategorie)
    {
        $this->idCategorie = $idCategorie;
    }

    public function createComp(): bool
    {

        $sql = "INSERT INTO competitions 
        (idcompetition, titrecompetition, lieu, datedebut, datefin, typemilieu, nbmanches, idcategorie, status)
        VALUES 
        (:idcompetition, :titrecompetition, :lieu, :datedebut, :datefin, :typemilieu, :nbmanches, :idcategorie, :status)";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':idcompetition', $this->idCompetition, PDO::PARAM_INT);
        $stmt->bindValue(':titrecompetition', $this->titreCompetition);
        $stmt->bindValue(':lieu', $this->lieu);
        $stmt->bindValue(':datedebut', $this->dateDebut->format('Y-m-d'));
        $stmt->bindValue(':datefin', $this->dateFin->format('Y-m-d'));
        $stmt->bindValue(':typemilieu', $this->typeMilieu);
        $stmt->bindValue(':nbmanches', $this->nbManches, PDO::PARAM_INT);
        $stmt->bindValue(':idcategorie', $this->idCategorie, PDO::PARAM_INT);
        $stmt->bindValue(':status', $this->statut);

        return $stmt->execute();
    }


    public function updateComp()
    {

        $sql = "UPDATE competitions SET
        titrecompetition = :titre,
        lieu = :lieu,
        datedebut = :datedebut,
        datefin = :datefin,
        typemilieu = :typemilieu,
        nbmanches = :nbmanches,
        idcategorie = :idcategorie,
        status = :status
    WHERE idcompetition = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':titre' => $this->titreCompetition,
            ':lieu' => $this->lieu,
            ':datedebut' => $this->dateDebut->format('Y-m-d'),
            ':datefin' => $this->dateFin->format('Y-m-d'),
            ':typemilieu' => $this->typeMilieu,
            ':nbmanches' => $this->nbManches,
            ':idcategorie' => $this->idCategorie,
            ':status' => $this->statut,
            ':id' => $this->idCompetition
        ]) ? true : false;
    }


    public function deleteComp()
    {
        $sql = "DELETE FROM competitions WHERE idcompetition = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':id' => $this->idCompetition
        ]) ? true : false;
    }

    public static function getall($db)
    {
        $sql = "SELECT * FROM competitions";
        $stmt = $db->prepare($sql);
        $stmt->execute();
    }

    public static function getbyId($db, $id)
    {
        $sql = "SELECT * FROM competitions WHERE idcompetition = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([":id" => $id]);
    }

    public function changeStatus() {

    
    }

    public static function getTotalCompetitions($db)
    {
        $sql = "SELECT COUNT(*) AS total FROM competitions";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetch();
        return $result['total'];
    }
}


