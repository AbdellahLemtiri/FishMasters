<?php
require_once __DIR__ . '/../database.php';

class User {
    private $conn;
    private $table = "users";

    public $idUser;
    public $nomUser;
    public $emailUser;
    public $passwordUser;
    public $roleUser;
    pubilc $idRole;
    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }
}
?>