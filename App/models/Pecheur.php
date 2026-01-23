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



    public function signup($nom, $email, $password)
    {
        try {

            $this->conn->beginTransaction();
            $userId = parent::register($nom, $email, $password, 2);
            if ($userId) {
                $query = "INSERT INTO pecheurs (iduser, region, specialite, photo,) 
                          VALUES (:id, :region, :spec, :photo, )";

                $stmt = $this->conn->prepare($query);

                $stmt->bindParam(':id', $userId);
                $stmt->bindParam(':region', $this->region);
                $stmt->bindParam(':spec', $this->specialite);
                $stmt->bindParam(':photo', $this->photoPecheur);

                if ($stmt->execute()) {
                    $this->conn->commit();
                    return true;
                }
            }
            $this->conn->rollBack();
            return false;
        } 
        catch (\Exception $e) {
            $this->conn->rollBack();
            Logger::log("Pecheur Signup Error: " . $e->getMessage());
            return false;
        }
    }

    public function updatePecheur()
    {
        try {
            $sql = "UPDATE pecheurs SET region = :region ,
      specialite = :specialite , nomUser = :nomUser ,
      photo = :photo
      WHERE idUser = :id";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([
                ':region' => $this->region,
                ':specialite' => $this->specialite,
                ':nomUser' => $this->nomUser,
                ':photo' => $this->photoPecheur,
                ':id' => $this->idUser
            ]) ? true : false;
        } catch (\Exception $e) {
            Logger::log("Pecheur Update Error: " . $e->getMessage());
            return false;
        }
    }
}
