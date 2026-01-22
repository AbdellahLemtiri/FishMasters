<?php

namespace APP\models;
use App\models\User;

class Fan extends User
{
    private $statut_fan = 1;
    private $dateInscription;

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

    static function ajouterFan($fan)
    {
        try {
            $sql = "INSERT INTO fans (nom_user, email_user, password_user, user_role_id, statut_fan)
                        VALUES (:nom_user, :email_user, :password_user, :role_id, :statut_fan)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'nom_user' => $fan->nom_user,
                'email_user' => $fan->email_user,
                'password_user' => password_hash($fan->password_user, PASSWORD_DEFAULT),
                'role_id' => $fan->user_role_id,
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
                        SET nom_user = :nom_user, email_user = :email_user, password_user = :password_user, user_role_id = :role_id, statut_fan = :statut_fan
                        WHERE id_user = :id_user";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'nom_user' => $fan->nom_user,
                'email_user' => $fan->email_user,
                'password_user' => password_hash($fan->password_user, PASSWORD_DEFAULT),
                'role_id' => $fan->user_role_id,
                'statut_fan' => $fan->statut_fan,
                'id_user' => $this->id_user
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
                        WHERE id_user = :id_user";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id_user' => $this->id_user]);
            return true;
        } catch (PDOException $e) {
            error_log('Erreur lors de la suppression du fan:\n' . $e->getMessage() . '\n------------------\n');
            return false;
        }
    }

    static function getById($id_fan)
    {
        try {
            $sql = "SELECT * FROM fans WHERE id_user = :id_user";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id_user' => $id_fan]);
            $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

            return $stmt->fetch();
        } catch (PDOException $e) {
            error_log('Erreur lors de la récupération du fan:\n' . $e->getMessage() . '\n------------------\n');
            return null;
        }
    }

    static function allFans()
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
