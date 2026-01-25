<?php

namespace App\models;
use PDO;
use App\models\User;
use App\Utils\Logger;

class Pecheur extends User
{
    private string $region;
    private string $specialite;
    private string $club;
    private string $photoPecheur;
    private bool $statutPecheur;
    private int $score;
    public function __construct($db = null)
    {
        parent::__construct($db);
        if ($db) {
            $this->conn = $db;
        }
    }

    
    
    public function getClub(): string
    {
        return $this->club;
    }
    public function setClub(string $club): void
    {
        $this->club = $club;
    }
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
    public function setPhotoPecheur(string $photoPecheur): void
    {
        $this->photoPecheur = $photoPecheur;
    }


    public function signup($nom, $email, $password)
    {
        try {
            $this->conn->beginTransaction();

          
            $userId = parent::register($nom, $email, $password, 2);

            if ($userId) {
                
                $query = "INSERT INTO pecheurs (iduser, region, specialite, club, photopecheur) 
                          VALUES (:id, :region, :spec, :club, :photo)";

                $stmt = $this->conn->prepare($query);

                $stmt->bindParam(':id', $userId);
                $stmt->bindParam(':region', $this->region);
                $stmt->bindParam(':spec', $this->specialite);
                $stmt->bindParam(':club', $this->club);
                $stmt->bindParam(':photo', $this->photoPecheur);

                if ($stmt->execute()) {
                    $this->conn->commit();
                    return true;
                }
            }
            $this->conn->rollBack();
            return false;
        } catch (\Exception $e) {
            $this->conn->rollBack();
            Logger::log("Pecheur Signup Error: " . $e->getMessage());
            return false;
        }
    }

    public function updatePecheur()
    {
        try {
            $this->conn->beginTransaction();
 
            $sqlUser = "UPDATE utilisateurs SET nomuser = :nom WHERE iduser = :id";
            $stmtUser = $this->conn->prepare($sqlUser);
            $stmtUser->execute([':nom' => $this->getNomUser(), ':id' => $this->getIdUser()]);
 
            $sqlPecheur = "UPDATE pecheurs SET 
                            region = :region,
                            specialite = :specialite,
                            club = :club
                          
                           WHERE iduser = :id";

            $stmtP = $this->conn->prepare($sqlPecheur);
            $result = $stmtP->execute([
                ':region' => $this->region,
                ':specialite' => $this->specialite,
                ':club' => $this->club,
                ':id' => $this->getIdUser()
            ]);

            $this->conn->commit();
            return $result;
        } catch (\Exception $e) {
            $this->conn->rollBack();
            Logger::log("Pecheur Update Error: " . $e->getMessage());
            return false;
        }
    }

    public function getPecheurById($id)
    {
        $sql = "SELECT * FROM pecheurs WHERE iduser = :id";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data) {

                $this->setIdUser($data['iduser']);
                $this->setNomUser($data['nomuser']);
                $this->setRegion($data['region']);
                $this->setSpecialite($data['specialite']);
                $this->setClub($data['club']);
                $this->setPhotoPecheur($data['photopecheur']);
                $this->setEmailUser($data['emailuser']);
                return $this;
            }
            return null;
        } catch (\Exception $e) {
            Logger::log("Hydration Error: " . $e->getMessage());
            return null;
        }
    }

 
}
