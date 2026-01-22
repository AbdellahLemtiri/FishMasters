<?php

namespace App\models;

use DateTime;
use App\models\Competition;
use App\Utils\Logger;
use Config\Connexion;
use PDO;

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
    private  $db;
    public function __construct()
    {
        $this->db = Connexion::connect();
    }
    public function getIdPrise(): int
    {
        return $this->idPrise;
    }
    public function getEspece(): string
    {
        return $this->espece;
    }
    public function getPoids(): float
    {
        return $this->poids;
    }
    public function getTaille(): float
    {
        return $this->taille;
    }
    public function getPhoto(): string
    {
        return $this->photo;
    }
    public function getDateHeure(): DateTime
    {
        return $this->dateHeure;
    }
    public function getSpot(): string
    {
        return $this->spot;
    }
    public function getIsRelache(): bool
    {
        return $this->isRelache;
    }
    public function getStatut(): string
    {
        return $this->statut;
    }
    public function getIdPecheur(): int
    {
        return $this->idPecheur;
    }
    public function getIdCompetition(): int
    {
        return $this->idCompetition;
    }



    public function setPoids(float $poids): bool
    {
        if ($poids <= 0) {
            return false;
        }
        $this->poids = $poids;
        return true;
    }

    public function setTaille(float $taille): bool
    {
        if ($taille <= 0) {
            return false;
        }
        $this->taille = $taille;
        return true;
    }

    public function setStatut(string $statut): bool
    {
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

    public function setIdPrise(int $id): void
    {
        $this->idPrise = $id;
    }
    public function setEspece(string $e): void
    {
        $this->espece = $e;
    }
    public function setSpot(string $s): void
    {
        $this->spot = $s;
    }
    public function setIsRelache(bool $r): void
    {
        $this->isRelache = $r;
    }
    public function setDateHeure(DateTime $d): void
    {
        $this->dateHeure = $d;
    }
    public function setIdPecheur(int $id): void
    {
        $this->idPecheur = $id;
    }
    public function setIdCompetition(int $id): void
    {
        $this->idCompetition = $id;
    }


    public function setCompetition(Competition $comp): void
    {
        $this->competition = $comp;
    }

    public function getCompetition(): ?Competition
    {
        return $this->competition ?? null;
    }

    public  function createPrise(): bool
    {
        $conn = $this->db->getConnexion();
        $sql = "INSERT INTO prises (espece, poids, taille, photo, date_heure, spot, is_relache, statut, id_pecheur, id_competition)
                VALUES (:espece, :poids, :taille, :photo, :date_heure, :spot, :is_relache, :statut, :id_pecheur, :id_competition)";

        try {
            $stmt = $conn->prepare($sql);

            return $stmt->execute([
                ':espece' => $this->espece,
                ':poids' => $this->poids,
                ':taille' => $this->taille,
                ':photo' => $this->photo,
                ':date_heure' => $this->dateHeure,
                ':spot' => $this->spot,
                ':is_relache' => $this->isRelache,
                ':statut' => $this->statut,
                ':id_pecheur' => $this->idPecheur,
                ':id_competition' => $this->idCompetition
            ]);
        } catch (\PDOException $e) {
            Logger::log($e->getMessage());
            return false;
        }
    }


    public function updatePrise(): bool
    {
        $conn = $this->db->getConnexion();
        $sql = "UPDATE prises
                SET espece = :espece, poids = :poids, taille = :taille, photo = :photo, date_heure = :date_heure,
                    spot = :spot, is_relache = :is_relache, statut = :statut, id_pecheur = :id_pecheur, id_competition = :id_competition
                WHERE id_prise = :id_prise";

        try {
            $stmt = $conn->prepare($sql);

            return $stmt->execute([
                ':espece' => $this->espece,
                ':poids' => $this->poids,
                ':taille' => $this->taille,
                ':photo' => $this->photo,
                ':date_heure' => $this->dateHeure,
                ':spot' => $this->spot,
                ':is_relache' => $this->isRelache,
                ':statut' => $this->statut,
                ':id_pecheur' => $this->idPecheur,
                ':id_competition' => $this->idCompetition,
                ':id_prise' => $this->idPrise
            ]);
        } catch (\PDOException $e) {
            Logger::log($e->getMessage());
            return false;
        }
    }

    public function deletePrise(): bool
    {
        $conn = $this->db->getConnexion();
        $sql = "DELETE FROM prises WHERE id_prise = :id_prise";

        try {
            $stmt = $conn->prepare($sql);
            return $stmt->execute([':id_prise' => $this->idPrise]);
        } catch (\PDOException $e) {
            Logger::log($e->getMessage());
            return false;
        }
    }

    public function getPriseById(): Prise | null
    {
        $conn = $this->db->getConnexion();
        $sql = "SELECT * FROM prises WHERE id_prise = :id_prise";

        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute([':id_prise' => $this->idPrise]);
            $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
            return $stmt->fetch();
        } catch (\PDOException $e) {
            Logger::log($e->getMessage());
            return null;
        }
    }


    public function getAllPrises(): array
    {
        $conn = $this->db->getConnexion();
        $sql = "SELECT * FROM prises";

        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $prises = $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
            return $prises ? $prises : [];
        } catch (\PDOException $e) {
            Logger::log($e->getMessage());
            return [];
        }
    }
}
