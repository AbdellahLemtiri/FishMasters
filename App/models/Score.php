<?php

namespace App\models;

use PDO;
use App\Utils\Logger;

class Score
{
    private $conn;

    private int $id_score;
    private int $id_pecheur;
    private int $points;
    private int $id_competition;

    public function __construct($db)
    {
        $this->conn = $db;
    }


    public function getIdScore(): int
    {
        return $this->id_score;
    }

    public function getIdPecheur(): int
    {
        return $this->id_pecheur;
    }
    public function getPoints(): int
    {
        return $this->points;
    }


    public function setIdScore(int $id_score): void
    {
        $this->id_score = $id_score;
    }
    public function setIdPecheur(int $id_pecheur): void
    {
        $this->id_pecheur = $id_pecheur;
    }
    public function setPoints(int $points): void
    {
        $this->points = $points;
    }

    public function setIdCompetition(int $id_competition): void
    {
        $this->id_competition = $id_competition;
    }

    public function getIdCompetition(): int
    {
        return $this->id_competition;
    }



    // public function addScore(): bool
    // {
    //     $query = "INSERT INTO scores (id_pecheur, points, id_competition) 
    //               VALUES (:id_pecheur, :points, :id_competition)";
    //     try {
    //         $stmt = $this->conn->prepare($query);
    //         $stmt->bindParam(':id_pecheur', $this->id_pecheur);
    //         $stmt->bindParam(':points', $this->points);
    //         $stmt->bindParam(':id_competition', $this->id_competition);
    //         if ($stmt->execute()) {
    //             $this->updateTotalPecheurScore($this->id_pecheur);
    //             return true;
    //         }
    //     } catch (\PDOException $e) {
    //         Logger::log("Score Insertion Error: " . $e->getMessage());
    //         return false;
    //     }
    // }
    public function getScoresByPecheur(): int
    {
        $query = "SELECT sum(points) as total FROM scores WHERE id_pecheur = :id_pecheur ";
        try {

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id_pecheur', $this->id_pecheur);
            $stmt->execute();
            $totale = $stmt->fetchColumn();
            return $totale ?? 0;
        } catch (\PDOException $e) {
            Logger::log("Score Fetch Error: " . $e->getMessage());
            return 0;
        }
    }
  


    public function getLeaderboard()
    {
        $query = "SELECT u.nomuser, p.total_score, p.specialite, p.photopecheur 
              FROM pecheurs p
              JOIN utilisateurs u ON p.iduser = u.iduser
              ORDER BY p.total_score DESC
              LIMIT 3";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, self::class) ?? [];
    }
}
