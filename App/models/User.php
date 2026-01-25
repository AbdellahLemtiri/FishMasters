<?php
    namespace Projet\models;
    use PDO;
    use Exception;

    abstract class User{
        protected ?int $iduser = null;
        protected ?string $nomuser = null;
        protected ?string $emailuser = null;
        protected ?string $passworduser = null;
        protected ?int $roleid = null;

        public function getId():?int{
            return $this->iduser;
        }

        public function getNom():?string{
            return $this->nomuser;
        }

        public function getEmail():?string{
            return $this->emailuser;
        }

        public function getRoleId():?int{
            return $this->roleid;
        }

        public function setNom(?string $nomUser):void{
            if($nomUser === null){
                $this->nomuser = null;
                return;
            }
            $this->nomuser = trim($nomUser);
        }

        public function setEmail(?string $emailUser):void{
            if($emailUser === null){
                $this->emailuser = null;
                return;
            }

            $cleanEmail = trim($emailUser);
            if(!filter_var($cleanEmail, FILTER_VALIDATE_EMAIL)){
                throw new Exception("L'adresse email '$cleanEmail' est invalide.");
            }
            $this->emailuser = $cleanEmail;
        }

        public function setPassword(?string $passwordUser):void{
            if($passwordUser == null){
                $this->passworduser = null;
                return;
            }

            $cleanPassword = trim($passwordUser);
            $this->passworduser = password_hash($cleanPassword, PASSWORD_DEFAULT);
        }

        public function setRoleId(?int $idRole):void
        {
            $this->roleid = $idRole;
        }

        public function verifierMotDePass(string $password):bool{
            $cleanedPassword = trim($password);
            if($cleanedPassword){
                $hashedPassword = password_hash($cleanedPassword, PASSWORD_DEFAULT);
                if($this->passworduser == $hashedPassword)
                    return true;
            }
            return false;
        }

        abstract static function getByEmail(string $email):?User;
    }
?>