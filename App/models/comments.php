<?php

class commentaire
{
    private int $idCommentaire;
    private string $contenu;
    private bool $statut;
    private $date;
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getIdCommentaire(): int
    {
        return $this->idCommentaire;
    }

    public function getContenu(): string
    {
        return $this->contenu;
    }

    public function getStatut(): bool
    {
        return $this->statut;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setIdCommentaire(int $idCommentaire): void
    {
        $this->idCommentaire = $idCommentaire;
    }

    public function setContenu(string $contenu): void
    {
        $this->contenu = $contenu;
    }

    public function setStatut(bool $statut): void
    {
        $this->statut = $statut;
    }

    public function setDate($date): void
    {
        $this->date = $date;
    }

    public function getAllComments()
    {

        $sql = "SELECT * FROM comentaire ";
        $stmt =  $this->db->prepare($sql);
        $stmt->execute();
    }

    public function deleteComment()
    {
        $sql = "DELETE FROM commentaire WHERE idCommentaire = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':id' => $this->idCommentaire
        ]) ? true : false;
    }

    public static function rejectComment($db , $id)
    {
        $sql = "UPDATE comment 
                SET status = 'rejected' 
                WHERE idcomment = ?";

        $stmt = $db->prepare($sql);
        return $stmt->execute([$id]);
    }

    public static function approveComment($db , $id) {
        $sql = "UPDATE comment 
                SET status = 'approved' 
                WHERE idcomment = ?";

        $stmt = $db->prepare($sql);
        return $stmt->execute([$id]);
    }
}
