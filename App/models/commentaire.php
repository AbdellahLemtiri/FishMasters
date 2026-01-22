<?php
    namespace APP\models;

    class Commentaire extends BaseModel{
        private $id_commentaire;
        private $contenu;
        private $date_commentaire;
        private $statut_commentaire;
        private $fan_id;
        private $prise_id;

        public function __get($property){
            if(property_exists($this, $property)){
                return $this->$property;
            }
        }

        public function __set($property, $value){
            if (property_exists($this, $property)){
                if($property == 'date_commentaire')
                    $this->$property = new \Date($value);
                else
                    $this->$property = trim($value);
            }
        }

        public function __toString(){
            return "Commentaire: {$this->contenu} publié le: {$this->date_commentaire}";
        }

        public static function ajouterCommentaire($commentaire){
            try{
                $sql = "INSERT INTO commentaires(contenu, statut_commentaire, date_commentaire, fan_id, prise_id)
                    VALUES(?, ?, ?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$commentaire->contenu, $commentaire->statut_commentaire, $commentaire->date_commentaire, $commentaire->fan_id, $commentaire->prise_id]);

                return true;
            }catch(\PDOException $e){
                error_log('Erreur lors de l\'insertion de commentaire:\n'.$e->getMessage().'\n------------------\n');
                return false;
            }
        }

        public function modifierCommentaire($commentaire){
            try{
                $sql = "UPDATE commentaires
                        SET contenu = ?, statut_commentaire = ?, date_commentaire = ?, fan_id = ?, prise_id = ?
                        WHERE id_commentaire = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$commentaire->contenu, $commentaire->statut_commentaire, $commentaire->date_commentaire, $commentaire->fan_id, $commentaire->prise_id, $this->id_commentaire]);

                return true;
            }catch(\PDOException $e){
                error_log('Erreur lors de la modification de commentaire:\n'.$e->getMessage().'\n------------------\n');
                return false;
            }
        }

        public function supprimerCommentaire(){
            try{
                $sql = "DELETE FROM commentaires
                        WHERE id_commentaire = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$this->id_commentaire]);

                return true;
            }catch(\PDOException $e){
                error_log('Erreur lors de la suppression de commentaire:\n'.$e->getMessage().'\n------------------\n');
                return false;
            }
        }

        public static function commentairesByPrise($prise_id){
            $sql = "SELECT * FROM commentaires WHERE prise_id = ? AND statut_commentaire<>'deleted' ORDER BY date_commentaire DESC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$prise_id]);
            $commentaires = $stmt->fetchAll(PDO::FETCH_CLASS, self::class);

            return $commentaires ? $commentaires:[];
        }

        public static function commentairesByFan($fan_id){
            $sql = "SELECT * FROM commentaires WHERE fan_id = ? AND statut_commentaire<>'deleted' ORDER BY date_commentaire DESC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$prise_id]);
            $commentaires = $stmt->fetchAll(PDO::FETCH_CLASS, self::class);

            return $commentaires ? $commentaires:[];
        }
        
        public static function allCommentaires(){
            try {
                $sql = "SELECT c.*, u.nom_user, e.nomscientifique
                        FROM commentaires c
                        JOIN utilisateurs u ON c.fan_id = u.id_user
                        JOIN prises p ON c.prise_id = p.id_prise
                        JOIN especes e ON e.idespece = p.idespece
                        ORDER BY c.date_commentaire DESC";
                $stmt = $pdo->query($sql);

                return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);  
            }catch (\PDOException $e){
                error_log("Erreur allCommentaires: " . $e->getMessage());
                return [];
            }
        }
    }

?>