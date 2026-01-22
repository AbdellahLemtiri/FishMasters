<?php
// TABLE STRUCTURE
// CREATE TABLE competitions (
//     idCompetition SERIAL PRIMARY KEY,
//     titreCompetition VARCHAR(255) NOT NULL,
//     lieu VARCHAR(255),
//     dateDebut TIMESTAMP NOT NULL,
//     dateFin TIMESTAMP NOT NULL,
//     typeMilieu competition_water_type,
//     categorie competition_category,
//     nbManches INT DEFAULT 1,
//     status competition_status 
// );
namespace App\Models;
use App\Utils\Logger;
use PDO;
use PDOException;
use DateTime;

class Competition
{
    private int $idCompetition;
    private string $titreCompetition;
    private string $lieu;
    private DateTime $dateDebut;
    private DateTime $dateFin;
    private string $typeMilieu;
    private string $categorie;
    private int $nbManches;
    private string $statut;

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


    public function create(PDO $pdo): bool
    {

        $sql = "INSERT INTO competitions 
        (titreCompetition, lieu, dateDebut, dateFin, typeMilieu, statut, nbManches, modeScoring, reglement)
        VALUES (:titre, :lieu, :debut, :fin, :typeMilieu, :statut, :nbManches, :modeScoring, :reglement)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':titre' => $this->titreCompetition,
            ':lieu' => $this->lieu,
            ':debut' => $this->dateDebut->format('Y-m-d'),
            ':fin' => $this->dateFin->format('Y-m-d'),
            ':typeMilieu' => $this->typeMilieu,
            ':statut' => $this->statut,
            ':nbManches' => $this->nbManches,
            
        ]);


        return true;
    }


    public function update(PDO $pdo): bool
    {

        $sql = "UPDATE competitions SET
            titreCompetition = :titre,
            lieu = :lieu,
            dateDebut = :debut,
            dateFin = :fin,
            typeMilieu = :typeMilieu,
            statut = :statut,
            nbManches = :nbManches,
            modeScoring = :modeScoring,
            reglement = :reglement
        WHERE idCompetition = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':titre' => $this->titreCompetition,
            ':lieu' => $this->lieu,
            ':debut' => $this->dateDebut->format('Y-m-d'),
            ':fin' => $this->dateFin->format('Y-m-d'),
            ':typeMilieu' => $this->typeMilieu,
            ':statut' => $this->statut,
            ':nbManches' => $this->nbManches,
    
            ':id' => $this->idCompetition
        ]);

        return true;
    }


    public function delete(PDO $pdo): bool
    {
        $sql = "DELETE FROM competitions WHERE idCompetition = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $this->idCompetition]);
        return true;
    }

    public static function listCompetitions($pdo)
    {
        $stmt = $pdo->query("SELECT c.*, cat.name as category_name FROM competitions c JOIN categories cat ON c.category_id = cat.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
// 