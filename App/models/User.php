<?php
    namespace Projet\models;
    use PDO;
    use Exception;

    abstract class User{
        protected ?int $idUser = null;
        protected ?string $nomUser = null;
        protected ?string $emailUser = null;
        protected ?string $passwordUser = null;
        protected ?int $role_id = null;

        public function getId():?int{
            return $this->idUser;
        }

        public function getNom():?string{
            return $this->nomUser;
        }

        public function getEmail():?string{
            return $this->emailUser;
        }

        public function getRoleId():?int{
            return $this->role_id;
        }

        public function setNom(?string $nomUser):void{
            if($nomUser === null){
                $this->nomUser = null;
                return;
            }
            $this->nomUser = trim($nomUser);
        }

        public function setEmail(?string $emailUser):void{
            if($emailUser === null){
                $this->emailUser = null;
                return;
            }

            $cleanEmail = trim($emailUser);
            if(!filter_var($cleanEmail, FILTER_VALIDATE_EMAIL)){
                throw new Exception("L'adresse email '$cleanEmail' est invalide.");
            }
            $this->emailUser = $cleanEmail;
        }

        public function setPassword(?string $passwordUser):void{
            if($passwordUser == null){
                $this->passwordUser = null;
                return;
            }

            $cleanPassword = trim($passwordUser);
            $this->passwordUser = password_hash($cleanPassword, PASSWORD_DEFAULT);
        }

        public function setRoleId(?int $idRole):void
        {
            $this->role_id = $idRole;
        }

        public function verifierMotDePass(string $password):bool{

        }

        abstract static function getByEmail(string $email):?User;
    }
?>