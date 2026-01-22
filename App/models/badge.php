<?php
    namespace APP\models;

    class Badge extends BaseModel{
        private $id_badge;
        private $titre_badge;
        private $icon_badge;
        private $min_score;

        public function __get($property){
            if(property_exists($this, $property))
                return $this->$property;
            return null;
        }

        public function __set($property, $value){
            if(property_exists($this, $property)){
                $this->$property = match ($property) {
                     'titre_badge'=> trim($value),
                     'icon_badge'=> trim($value),
                     'min_score' => $value>0 ? $value:0
                };
            }
        }

        static function ajouterBadge($badge){
            try{
                $sql = "INSERT INTO badges (titre_badge, icon_badge, min_score)
                        VALUES (:titre_badge, :icon_badge, :min_score)";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([
                    ':titre_badge' => $badge->titre_badge,
                    ':icon_badge' => $badge->icon_badge,
                    ':min_score' => $badge->min_score
                ]);

                return true;
            }catch(PDOException $e){
                error_log('Erreur lors de l\'insertion de badge:\n'.$e->getMessage().'\n------------------\n');
                return false;
            }
        }

        public function modifierBadge($badge){
            try{
                $sql = "UPDATE badges
                        SET titre_badge = :titre_badge, icon_badge = :icon_badge, min_score = :min_score
                        WHERE id_badge = :id_badge";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([
                    ':titre_badge' => $badge->titre_badge,
                    ':icon_badge' => $badge->icon_badge,
                    ':min_score' => $badge->min_score,
                    ':id_badge' => $this->id_badge
                ]);

                return true;
            }catch(PDOException $e){
                error_log('Erreur lors de la modification de badge:\n'.$e->getMessage().'\n------------------\n');
                return false;
            }
        }

        public function supprimerBadge(){
            try{
                $sql = "DELETE FROM badges
                        WHERE id_badge = :id_badge";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([
                    ':id_badge' => $this->id_badge
                ]);

                return true;
            }catch(PDOException $e){
                error_log('Erreur lors de la modification de badge:\n'.$e->getMessage().'\n------------------\n');
                return false;
            }
        }

        static function getById($id_badge){
            try{
                $sql = "SELECT * FROM badges
                        WHERE id_badge = :id_badge";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([
                    ':id_badge' => $this->id_badge
                ]);
                $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

                return $stmt->fetch();
            }catch(PDOException $e){
                error_log('Erreur lors de la modification de badge:\n'.$e->getMessage().'\n------------------\n');
                return null;
            }
        }

        static function allBadges(){
            try{
                $sql = "SELECT * FROM badges";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();

                return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
            }catch(PDOException $e){
                error_log('Erreur lors de la modification de badge:\n'.$e->getMessage().'\n------------------\n');
                return [];
            }
        }
    }
?>