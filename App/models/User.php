<?php
require_once __DIR__ . '/../database.php';

class User {
    private $conn;
    private $table = "users";

    private $idUser;
    private $nomUser;
    private $emailUser;
    private $passwordUser;
    private $roleUser;
    private $idRole;
    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }
    public function getIdUser(){
        return $this->idUser;
    }
    public function getNomUser(){
        return $this->nomUser;
    }
    public function getEmailUser(){
        return $this->emailUser;
    }
    public function getPasswordUser(){
        return $this->passwordUser;
    }
    public function getRoleUser(){
        return $this->roleUser;
    }
    public function getIdRole(){
        return $this->idRole;
    }
    public function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    public function setNomUser($nomUser) {
        $this->nomUser = $nomUser;
    }

    public function setEmailUser($emailUser) {
        $this->emailUser = $emailUser;
    }

    public function setPasswordUser($passwordUser) {
        $this->passwordUser = $passwordUser;
    }

    public function setIdRole($idRole) {
        $this->idRole = $idRole;
    }
}
?>