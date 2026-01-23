<?php

namespace App\models;

use PDO;

class User
{
    protected $conn;
    private $table = "utilisateurs";

    private $idUser;
    private $nomUser;
    private $emailUser;
    private $idRole;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getIdUser() { return $this->idUser; }
    public function getNomUser() { return $this->nomUser; }
    public function getIdRole() { return $this->idRole; }

    public function setIdUser($id) { $this->idUser = $id; }
    public function setNomUser($nom) { $this->nomUser = $nom; }
    public function setIdRole($id) { $this->idRole = $id; }


    public function register($nom, $email, $password, $idRole = 2)
    {
        $query = 'INSERT INTO ' . $this->table . ' 
                  (nomuser, emailuser, passworduser, roleid) 
                  VALUES (:nom, :email, :pass, :role)';

        $stmt = $this->conn->prepare($query);

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pass', $passwordHash);
        $stmt->bindParam(':role', $idRole);

        return $stmt->execute();
    }

    public function login($email, $password)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE emailuser = :email';

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if (password_verify($password, $row['passworduser'])) {
                $this->setIdUser($row['iduser']);
                $this->setNomUser($row['nomuser']);
                $this->setIdRole($row['roleid']);
                return true;
            }
        }
        return false;
    }
}