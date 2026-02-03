<?php
    namespace App\models;
    use PDOException;
    use PDO;
    USE Exception;
    require_once 'baseModel.php';
    class Like extends BaseModel{
        private $fan_id;
        private $id_like;
        private $statut_like;
        private $pecheur_id;
        private $prise_id;
        private $competition_id;

        public function __get($property){
            if(!property_exists($this, $property))
                throw new Exception($property . ' est une propriété invalide.');
            
            return $this->$property;
        }

        public function __set($property, $value){
            if(property_exists($this, $property)){
                $this->$property = match ($property) {
                    'statut_like'=> $value,
                    'fan_id' => $value,
                    'pecheur_id' => $value,
                    'prise_id' => $value,
                    'competition_id' => $value
                };
            }
        }

        public function ajouterLike($like){
            try{
                $sql = "INSERT INTO likes(fan_id, statut_like, pecheur_id, prise_id, competition_id)
                        VALUES (:fan_id, :statut_like, :pecheur_id, :prise_id, :competition_id)";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([
                    'fan_id' => $like->fan_id,
                    'statut_like' => $like->statut_like,
                    'pecheur_id' => $like->pecheur_id,
                    'prise_id' => $like->prise_id,
                    'competition_id' => $like->competition_id
                ]);

                return true;
            }catch(PDOException $e){
                error_log('Erreur lors de l\'insertion de like:\n'.$e->getMessage().'\n------------------\n');
                return false;
            }
        }

        public function modifierLike($like){
            try{
                $sql = "UPDATE likes
                        SET fan_id = :fan_id, statut_like = :statut_like, pecheur_id = :pecheur_id, prise_id = :prise_id, competition_id = :competition_id
                        WHERE id_like = :id_like";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([
                    'fan_id' => $like->fan_id,
                    'statut_like' => $like->statut_like,
                    'pecheur_id' => $like->pecheur_id,
                    'prise_id' => $like->prise_id,
                    'competition_id' => $like->competition_id,
                    'id_like' => $this->id_like
                ]);

                return true;
            }catch(PDOException $e){
                error_log('Erreur lors de la modification du like:\n'.$e->getMessage().'\n------------------\n');
                return false;
            }
        }

        public function supprimerLike(){
            try{
                $sql = "DELETE FROM likes WHERE id_like = :id_like";
                $stmt = $this->db->prepare($sql);
                $stmt->execute(['id_like' => $this->id_like]);

                return true;
            }catch(PDOException $e){
                error_log('Erreur lors de la suppression du like:\n'.$e->getMessage().'\n------------------\n');
                return false;
            }
        }

        public function getById($id_like){
            try{
                $sql = "SELECT * FROM likes WHERE id_like = :id_like";
                $stmt = $this->db->prepare($sql);
                $stmt->execute(['id_like' => $id_like]);
                $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

                return $stmt->fetch();
            }catch(PDOException $e){
                error_log('Erreur lors de la récupération du like:\n'.$e->getMessage().'\n------------------\n');
                return null;
            }
        }

        public function likesByFan($fan_id){
            try{
                $sql = "SELECT * FROM likes WHERE fan_id = :fan_id";
                $stmt = $this->db->prepare($sql);
                $stmt->execute(['fan_id' => $fan_id]);

                return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
            }catch(PDOException $e){
                error_log('Erreur lors de la récupération des likes par fan:\n'.$e->getMessage().'\n------------------\n');
                return [];
            }
        }

        public function likesByPecheur($pecheur_id){
            try{
                $sql = "SELECT * FROM likes WHERE pecheur_id = :pecheur_id";
                $stmt = $this->db->prepare($sql);
                $stmt->execute(['pecheur_id' => $pecheur_id]);

                return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
            }catch(PDOException $e){
                error_log('Erreur lors de la récupération des likes par pêcheur:\n'.$e->getMessage().'\n------------------\n');
                return [];
            }
        }

        public function likesByPrise($prise_id){
            try{
                $sql = "SELECT * FROM likes WHERE prise_id = :prise_id";
                $stmt = $this->db->prepare($sql);
                $stmt->execute(['prise_id' => $prise_id]);

                return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
            }catch(PDOException $e){
                error_log('Erreur lors de la récupération des likes par prise:\n'.$e->getMessage().'\n------------------\n');
                return [];
            }
        }

        public function likesByCompetition($competition_id){
            try{
                $sql = "SELECT * FROM likes WHERE competition_id = :competition_id";
                $stmt = $this->db->prepare($sql);
                $stmt->execute(['competition_id' => $competition_id]);

                return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
            }catch(PDOException $e){
                error_log('Erreur lors de la récupération des likes par compétition:\n'.$e->getMessage().'\n------------------\n');
                return [];
            }
        }

        public function allLikes(){
            try{
                $sql = "SELECT * FROM likes";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();

                return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
            }catch(PDOException $e){
                error_log('Erreur lors de la récupération des likes:\n'.$e->getMessage().'\n------------------\n');
                return [];
            }
        }
    }
?>