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
    public function getCreatedAt(): string
    {
        return $this->created_at;
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

    public function setCreatedAt(string $created_at): void
    {
        $this->created_at = $created_at;
    }


    public function addScore()
    {

        $query = "INSERT INTO scores 
              SET id_pecheur = :id_pecheur, 
                  points = :points";

        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id_pecheur', $this->id_pecheur);
            $stmt->bindParam(':points', $this->points);

            if ($stmt->execute()) {
                return $this->updateTotalPecheurScore($this->id_pecheur);
            }
        } catch (\PDOException $e) {
            error_log("Score Error: " . $e->getMessage());
            return false;
        }
        return false;
    }
    public function getScoresByPecheur(): int
    {
        $query = "SELECT * FROM scores WHERE id_pecheur = :id_pecheur ORDER BY created_at DESC";
        try {

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id_pecheur', $this->id_pecheur);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, sel) 
        } catch (\PDOException $e) {
            error_log("Score Fetch Error: " . $e->getMessage());
        }
    }
    private function updateTotalPecheurScore($id_pecheur)
    {
        $query = "UPDATE pecheurs 
                  SET total_score = (SELECT SUM(points) FROM scores  )
                  WHERE iduser = :id";

        $stmt = $this->conn->prepare($query);
        return $stmt->execute([':id' => $id_pecheur]);
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
