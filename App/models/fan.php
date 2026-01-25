<?php

namespace App\models;
use Config\Connexion;
use DateTime;
use PDOException;
use PDO;

class Fan extends User
{
    private ?bool $statut_fan = true;
    private ?DateTime $dateInscription = null;

    public function getStatut(): bool
    {
        return $this->statut_fan;
    }

    public function setStatut(?bool $value): void
    {
        $this->statut_fan = $value ? trim($value) : $value;
    }

    public function getDateInscription(): DateTime
    {
        return $this->dateInscription;
    }

    static function getByEmail(string $email): Fan
    {
        try {
            $sql = "SELECT * 
                        FROM fans
                        WHERE emailUser = :emailUser";
            $pdo = Connexion::connect()->getConnexion();
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['emailUser' => $fan->emailUser]);
            $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

            return $stmt->fetch();
        } catch (PDOException $e) {
            error_log('Erreur lors de l\'insertion de fan:\n' . $e->getMessage() . '\n------------------\n');
            return null;
        }
    }

    static function ajouterFan(Fan $fan): bool
    {
        try {
            $sql = "INSERT INTO fans (nomUser, emailUser, passwordUser, role_id, statut_fan)
                        VALUES (:nomUser, :emailUser, :passwordUser, :role_id, :statut_fan)";
            $pdo = Connexion::connect()->getConnexion();
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'nomUser' => $fan->nomUser,
                'emailUser' => $fan->emailUser,
                'passwordUser' => password_hash($fan->passwordUser, PASSWORD_DEFAULT),
                'role_id' => $fan->role_id,
                'statut_fan' => $fan->statut_fan
            ]);

            return true;
        } catch (PDOException $e) {
            error_log('Erreur lors de l\'insertion de fan:\n' . $e->getMessage() . '\n------------------\n');
            return false;
        }
    }

    public function modifierFan(Fan $fan): bool
    {
        try {
            $sql = "UPDATE fans
                        SET nomUser = :nomUser, emailUser = :emailUser, passwordUser = :passwordUser, role_id = :role_id, statut_fan = :statut_fan
                        WHERE idUser = :idUser";
            $pdo = Connexion::connect()->getConnexion();
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'nomUser' => $fan->nomUser,
                'emailUser' => $fan->emailUser,
                'passwordUser' => password_hash($fan->passwordUser, PASSWORD_DEFAULT),
                'role_id' => $fan->role_id,
                'statut_fan' => $fan->statut_fan,
                'idUser' => $this->idUser
            ]);

            return true;
        } catch (PDOException $e) {
            error_log('Erreur lors de la modification de fan:\n' . $e->getMessage() . '\n------------------\n');
            return false;
        }
    }

    public function supprimerFan(): bool
    {
        try {
            $sql = "DELETE FROM fans
                        WHERE idUser = :idUser";
            $pdo = Connexion::connect()->getConnexion();
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['idUser' => $this->idUser]);

            return true;
        } catch (PDOException $e) {
            error_log('Erreur lors de la suppression du fan:\n' . $e->getMessage() . '\n------------------\n');
            return false;
        }
    }

    static function getById(int $id_fan): Fan
    {
        try {
            $sql = "SELECT * FROM fans WHERE idUser = :idUser";
            $pdo = Connexion::connect()->getConnexion();
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['idUser' => $id_fan]);
            $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

            return $stmt->fetch();
        } catch (PDOException $e) {
            error_log('Erreur lors de la récupération du fan:\n' . $e->getMessage() . '\n------------------\n');
            return null;
        }
    }

    static function allFans(): array
    {
        try {
            $sql = "SELECT * FROM fans";
            $pdo = Connexion::connect()->getConnexion();
            $stmt = $pdo->query($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
        } catch (PDOException $e) {
            error_log('Erreur lors de la récupération des fans:\n' . $e->getMessage() . '\n------------------\n');
            return [];
        }
    }
}
