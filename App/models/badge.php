<?php
    namespace Projet\models;
    use Config\Connexion;
    use PDOException;
    use PDO;

    class Badge{
        private ?int $id_badge;
        private ?string $titre_badge;
        private ?string $icon_badge;
        private ?int $min_score;

        public function __get(mixed $property):mixed{
            if (property_exists($this, $property))
                return $this->$property;
            return null;
        }

        public function __set(mixed $property, mixed $value):void{
            if (property_exists($this, $property)) {
                $this->$property = match ($property) {
                    'titre_badge' => trim($value),
                    'icon_badge' => trim($value),
                    'min_score' => $value > 0 ? $value : 0
                };
            }
        }

        static function ajouterBadge(Badge $badge):bool{
            try {
                $sql = "INSERT INTO badges (titre_badge, icon_badge, min_score)
                        VALUES (:titre_badge, :icon_badge, :min_score)";
                $pdo = Connexion::connect()->getConnexion();
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':titre_badge' => $badge->titre_badge,
                    ':icon_badge' => $badge->icon_badge,
                    ':min_score' => $badge->min_score
                ]);

                return true;
            } catch (PDOException $e) {
                error_log('Erreur lors de l\'insertion de badge:\n' . $e->getMessage() . '\n------------------\n');
                return false;
            }
        }

        public function modifierBadge(Badge $badge):bool{
            try {
                $sql = "UPDATE badges
                        SET titre_badge = :titre_badge, icon_badge = :icon_badge, min_score = :min_score
                        WHERE id_badge = :id_badge";
                $pdo = Connexion::connect()->getConnexion();
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':titre_badge' => $badge->titre_badge,
                    ':icon_badge' => $badge->icon_badge,
                    ':min_score' => $badge->min_score,
                    ':id_badge' => $this->id_badge
                ]);

                return true;
            } catch (PDOException $e) {
                error_log('Erreur lors de la modification de badge:\n' . $e->getMessage() . '\n------------------\n');
                return false;
            }
        }

        public function supprimerBadge():bool{
            try {
                $sql = "DELETE FROM badges
                        WHERE id_badge = :id_badge";
                $pdo = Connexion::connect()->getConnexion();
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':id_badge' => $this->id_badge
                ]);

                return true;
            } catch (PDOException $e) {
                error_log('Erreur lors de la modification de badge:\n' . $e->getMessage() . '\n------------------\n');
                return false;
            }
        }

        public function getById(int $id_badge):Badge | null{
            try {
                $sql = "SELECT * FROM badges
                        WHERE id_badge = :id_badge";
                $pdo = Connexion::connect()->getConnexion();
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':id_badge' => $this->id_badge
                ]);
                $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

                return $stmt->fetch();
            } catch (PDOException $e) {
                error_log('Erreur lors de la modification de badge:\n' . $e->getMessage() . '\n------------------\n');
                return null;
            }
        }

        public function allBadges():array
        {
            try {
                $sql = "SELECT * FROM badges";
                $pdo = Connexion::connect()->getConnexion();
                $stmt = $pdo->prepare($sql);
                $stmt->execute();

                return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
            } catch (PDOException $e) {
                error_log('Erreur lors de la modification de badge:\n' . $e->getMessage() . '\n------------------\n');
                return [];
            }
        }
    }
?>