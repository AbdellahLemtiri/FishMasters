<?php

namespace App\models;

use PDO;
use PDOException;
use Exception;
use App\models\User;
class Fan extends User
{
    private $statut_fan = 1;
    private $dateInscription;
    public function __construct()
    {
        parent::__construct();
        $this->dateInscription = new \DateTime();
    }
    public function getStatut()
    {
        return $this->statut_fan;
    }

    public function setStatut($value)
    {
        $this->statut_fan = $value ? trim($value) : $value;
    }

    public function getDateInscription()
    {
        return $this->dateInscription;
    }

    public function ajouterFan($fan)
    {
        try {
            $sql = "INSERT INTO fans (nomUser, emailUser, passwordUser, idRole, statut_fan)
                        VALUES (:nomUser, :emailUser, :passwordUser, :role_id, :statut_fan)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'nomUser' => $fan->nomUser,
                'emailUser' => $fan->emailUser,
                'passwordUser' => password_hash($fan->passwordUser, PASSWORD_DEFAULT),
                'role_id' => $fan->idRole,
                'statut_fan' => $fan->statut_fan
            ]);

            return true;
        } catch (PDOException $e) {
            error_log('Erreur lors de l\'insertion de fan:\n' . $e->getMessage() . '\n------------------\n');
            return false;
        }
    }

    public function modifierFan($fan)
    {
        try {
            $sql = "UPDATE fans
                        SET nomUser = :nomUser, emailUser = :emailUser, passwordUser = :passwordUser, idRole = :role_id, statut_fan = :statut_fan
                        WHERE idUser = :idUser";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'nomUser' => $fan->nomUser,
                'emailUser' => $fan->emailUser,
                'passwordUser' => password_hash($fan->passwordUser, PASSWORD_DEFAULT),
                'role_id' => $fan->idRole,
                'statut_fan' => $fan->statut_fan,
                'idUser' => $this->idUser
            ]);

            return true;
        } catch (PDOException $e) {
            error_log('Erreur lors de la modification de fan:\n' . $e->getMessage() . '\n------------------\n');
            return false;
        }
    }

    public function supprimerFan()
    {
        try {
            $sql = "DELETE FROM fans
                        WHERE idUser = :idUser";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['idUser' => $this->idUser]);
            return true;
        } catch (PDOException $e) {
            error_log('Erreur lors de la suppression du fan:\n' . $e->getMessage() . '\n------------------\n');
            return false;
        }
    }

    public function getById($id_fan)
    {
        try {
            $sql = "SELECT * FROM fans WHERE idUser = :idUser";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['idUser' => $id_fan]);
            $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

            return $stmt->fetch();
        } catch (PDOException $e) {
            error_log('Erreur lors de la récupération du fan:\n' . $e->getMessage() . '\n------------------\n');
            return null;
        }
    }

    public function allFans()
    {
        try {
            $sql = "SELECT * FROM fans";
            $stmt = $this->conn->query($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
        } catch (PDOException $e) {
            error_log('Erreur lors de la récupération des fans:\n' . $e->getMessage() . '\n------------------\n');
            return [];
        }
    }
}

