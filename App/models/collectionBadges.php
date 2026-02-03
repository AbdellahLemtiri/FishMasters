<?php
    namespace Projet\models;
    use Config\Connexion;
    use PDOException;
    use DateTime;
    use PDO;

    class CollectionBadges{
        private ?int $fan_id = null;
        private ?int $badge_id = null;
        private ?DateTime $dateRecuperation = null;

        public function __get(mixed $property):mixed{
            if(property_exists($this, $property))
                return $this->$property;
            return null;
        }

        public function __set(mixed $property, mixed $value):void{
            if(property_exists($this, $property)){
                $this->$property = match ($property) {
                     'fan_id'=> trim($value),
                     'badge_id'=> trim($value),
                     'dateRecuperation' => new \Date($value)
                };
            }
        }

        static function ajouterBadgeCollection(CollectionBadge $collectionBadge):bool{
            try{
                $sql = "INSERT INTO collectionBadges (fan_id, badge_id)
                        VALUES (:fan_id, :badge_id)";
                $pdo = Connexion::connect()->getConnexion();
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':fan_id' => $collectionBadge->$fan_id,
                    ':badge_id' => $collectionBadge->$badge_id
                ]);

                return true;
            }catch(PDOException $e){
                error_log('Erreur lors de l\'insertion de badge à la collection:\n'.$e->getMessage().'\n------------------\n');
                return false;
            }
        }

        // public function modifierBadgeCollection($badge){
        //     try{
        //         $sql = "UPDATE badges
        //                 SET titre_badge = :titre_badge, icon_badge = :icon_badge, min_score = :min_score
        //                 WHERE id_badge = :id_badge";
        //         $stmt = $pdo->prepare($sql);
        //         $stmt->execute([
        //             ':titre_badge' => $badge->titre_badge,
        //             ':icon_badge' => $badge->icon_badge,
        //             ':min_score' => $badge->min_score,
        //             ':id_badge' => $this->id_badge
        //         ]);

        //         return true;
        //     }catch(PDOException $e){
        //         error_log('Erreur lors de la modification de badge:\n'.$e->getMessage().'\n------------------\n');
        //         return false;
        //     }
        // }

        // public function supprimerBadge(){
        //     try{
        //         $sql = "DELETE FROM badges
        //                 WHERE id_badge = :id_badge";
        //         $stmt = $pdo->prepare($sql);
        //         $stmt->execute([
        //             ':id_badge' => $this->id_badge
        //         ]);

        //         return true;
        //     }catch(PDOException $e){
        //         error_log('Erreur lors de la modification de badge:\n'.$e->getMessage().'\n------------------\n');
        //         return false;
        //     }
        // }

        // static function getById($fan_id, $id_badge):CollectionBadge{
        //     try{
        //         $sql = "SELECT * FROM collectionBadges
        //                 WHERE badge_id = :id_badge and fan_id = :fan_id";
        //         $stmt = $pdo->prepare($sql);
        //         $stmt->execute([
        //             ':id_badge' => $this->id_badge,
        //             ':fan_id' => $this->fan_id
        //         ]);
        //         $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

        //         return $stmt->fetch();
        //     }catch(PDOException $e){
        //         error_log('Erreur lors de la modification de badge:\n'.$e->getMessage().'\n------------------\n');
        //         return null;
        //     }
        // }

        // static function allBadges(){
        //     try{
        //         $sql = "SELECT * FROM badges";
        //         $stmt = $pdo->prepare($sql);
        //         $stmt->execute();

        //         return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
        //     }catch(PDOException $e){
        //         error_log('Erreur lors de la modification de badge:\n'.$e->getMessage().'\n------------------\n');
        //         return [];
        //     }
        // }
    }
?>