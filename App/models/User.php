<?php
namespace App\models;

use PDO;

class User
{
    protected $conn;
    protected $table = "users";
    protected $idUser;
    protected $nomUser;
    protected $emailUser;
    protected $passwordUser;
    protected $roleUser;
    protected $idRole;
    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function getIdUser()
    {
        return $this->idUser;
    }
    public function getNomUser()
    {
        return $this->nomUser;
    }
    public function getEmailUser()
    {
        return $this->emailUser;
    }
    public function getPasswordUser()
    {
        return $this->passwordUser;
    }
    public function getRoleUser()
    {
        return $this->roleUser;
    }
    public function getIdRole()
    {
        return $this->idRole;
    }
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    public function setNomUser($nomUser)
    {
        $this->nomUser = $nomUser;
    }

    public function setEmailUser($emailUser)
    {
        $this->emailUser = $emailUser;
    }

    public function setPasswordUser($passwordUser)
    {
        $this->passwordUser = $passwordUser;
    }

    public function setIdRole($idRole)
    {
        $this->idRole = $idRole;
    }

    public function register($nom, $email, $password, $idRole)
    {
        $query = 'INSERT INTO ' . $this->table . ' 
                  ("nomUser", "emailUser", "passwordUser", "idRole") 
                  VALUES (:nom, :email, :pass, :role)';

        $stmt = $this->conn->prepare($query);

        $nom = htmlspecialchars(strip_tags($nom));
        $email = htmlspecialchars(strip_tags($email));


        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pass', $passwordHash);
        $stmt->bindParam(':role', $idRole);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function login($email, $password)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE "emailUser" = :email';

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            if (password_verify($password, $row['passwordUser'])) {
                $this->setIdUser($row['idUser']);
                $this->setNomUser($row['nomUser']);
                $this->setEmailUser($row['emailUser']);
                $this->setIdRole($row['idRole']);

                return true;
            }
        }

        return false;
    }
}
