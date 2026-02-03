<?php
    namespace Projet\models;
    use Config\Connexion;
    use DateTime;
    use PDOException;
    use PDO;

    class Fan extends User
    {
        private ?bool $statut_fan = true;
        private ?DateTime $dateInscription = null;

        public function getStatut():bool{
            return $this->statut_fan;
        }

        public function setStatut(?bool $value):void{
            $this->statut_fan = $value ? trim($value) : $value;
        }

        public function getDateInscription():DateTime{
            return $this->dateInscription;
        }

        public function __toString():string{
            return "Fan (statut:{$this->statut_fan}): {$this->nomuser} inscrit le : {$this->dateInscription} avec l'email suivant: {$this->emailuser}.";
        }

        static function getByEmail(string $email):?Fan{
            try {
                $sql = "SELECT * 
                        FROM fans
                        WHERE emailuser = :emailuser";
                $pdo = Connexion::connect()->getConnexion();
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['emailuser' => $email]);
                $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
                $fan = $stmt->fetch();
            } catch (PDOException $e) {
                error_log('Erreur lors de l\'insertion de fan:\n' . $e->getMessage() . '\n------------------\n');
            }
            return $fan ? $fan:null;
        }

        static function ajouterFan(Fan $fan):bool{
            try {
                $sql = "INSERT INTO fans (nomuser, emailuser, passworduser, roleid, statut_fan)
                        VALUES (:nomUser, :emailUser, :passwordUser, :role_id, :statut_fan)";
                $pdo = Connexion::connect()->getConnexion();
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    'nomUser' => $fan->nomuser,
                    'emailUser' => $fan->emailuser,
                    'passwordUser' => $fan->passworduser,
                    'role_id' => $fan->roleid,
                    'statut_fan' => $fan->statut_fan
                ]);

                return true;
            } catch (PDOException $e) {
                error_log('Erreur lors de l\'insertion de fan:\n' . $e->getMessage() . '\n------------------\n');
                return false;
            }
        }

        static function modifierFan(Fan $fan):bool{
            try {
                $sql = "UPDATE fans
                        SET nomuser = :nomUser, emailuser = :emailUser, passworduser = :passwordUser, roleid = :role_id, statut_fan = :statut_fan
                        WHERE iduser = :idUser";
                $pdo = Connexion::connect()->getConnexion();
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    'nomUser' => $fan->nomuser,
                    'emailUser' => $fan->emailuser,
                    'passwordUser' => $fan->passworduser,
                    'role_id' => $fan->roleid,
                    'statut_fan' => $fan->statut_fan,
                    'idUser' => $fan->iduser
                ]);

                return true;
            } catch (PDOException $e) {
                error_log('Erreur lors de la modification de fan:\n' . $e->getMessage() . '\n------------------\n');
                return false;
            }
        }

        public function supprimerFan():bool{
            try {
                $sql = "DELETE FROM fans
                        WHERE iduser = :idUser";
                $pdo = Connexion::connect()->getConnexion();
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['idUser' => $this->iduser]);

                return true;
            } catch (PDOException $e) {
                error_log('Erreur lors de la suppression du fan:\n' . $e->getMessage() . '\n------------------\n');
                return false;
            }
        }

        static function getById(int $id_fan):?Fan{
            $fan = null;
            try {
                $sql = "SELECT * FROM fans WHERE iduser = :idUser";
                $pdo = Connexion::connect()->getConnexion();
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['idUser' => $id_fan]);
                // $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
                $fan_array = $stmt->fetch(PDO::FETCH_ASSOC);
                if($fan_array){
                    $fan = new Fan();
                    $fan->nomuser = $fan_array['nomuser'];
                    $fan->emailuser = $fan_array['emailuser'];
                }
            } catch (PDOException $e) {
                error_log('Erreur lors de la récupération du fan:\n' . $e->getMessage() . '\n------------------\n');
            } finally{
                return $fan;
            }
        }

        static function allFans():array{
            try {
                $sql = "SELECT * FROM fans";
                $pdo = Connexion::connect()->getConnexion();
                $stmt = $pdo->query($sql);
                $stmt->execute();
                $fans = $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
            } catch (PDOException $e) {
                error_log('Erreur lors de la récupération des fans:\n' . $e->getMessage() . '\n------------------\n');
            } finally{
                return $fans ? $fans:[];
            }
        }
    }
?>
