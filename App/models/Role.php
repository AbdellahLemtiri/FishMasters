<?php

namespace App\Models;

use PDO;

class Role
{
    private $table = "role";

    private $conn;
    private $idRole;
    private $titreRole;

    public function getIdRole()
    {
        return $this->idRole;
    }

    public function getTitreRole()
    {
        return $this->titreRole;
    }

    public function setIdRole($idRole)
    {
        $this->idRole = $idRole;
    }

    public function setTitreRole($titreRole)
    {
        $this->titreRole = $titreRole;
    }
    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function ajouterRole($titre)
    {
        $query = 'INSERT INTO ' . $this->table . ' ("titreRole") VALUES (:titre)';
        $stmt = $this->conn->prepare($query);
        $titre = htmlspecialchars(strip_tags($titre));
        $stmt->bindParam(':titre', $titre);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function supprimerRole($id)
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE "idRole" = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
