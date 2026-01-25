<?php
    namespace App\models;
    use Config\Connexion;

    class BaseModel{
        protected $db;

        public function __construct(){
            $this->db = Connexion::connect()->getConnexion();
        }
    }