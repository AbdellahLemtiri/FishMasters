<?php
    namespace APP\models;
    use CONFIG\Connexion;

    class BaseModel{
        protected $db;

        public function __construct(){
            $this->db = Connexion::connect()->getConnexion();
        }
    }