<?php

class prise
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getPendingCatches()
    {
        $stmt = $this->db->query("SELECT * FROM catches WHERE validated = 0");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function validateCatch($catchID)
    {
        $stmt = $this->db->prepare("UPDATE catches SET validated = 1 WHERE id = :id");
        return $stmt->execute(['id' => $catchID]);
    }

    public function rejectCatch($catchID)
    {
        $stmt = $this->db->prepare("DELETE FROM catches WHERE id = :id");
        return $stmt->execute(['id' => $catchID]);
    }
}
