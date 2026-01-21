<?php
require_once __DIR__ . '/../database.php';

class Role { private $table = "role";
    public $idRole;
    public $titreRole;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }
}
?>