<?php
class Species
{
    private $id;
    private $name;
    private $minSize;
    private $pointsCoefficient;
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function addSpecies($data)
    {
        $stmt = $this->db->prepare("INSERT INTO species (name, min_size, points_coefficient) VALUES (:name, :minSize, :pointsCoefficient)");
        return $stmt->execute([
            'name' => $data['name'],
            'minSize' => $data['minSize'],
            'pointsCoefficient' => $data['pointsCoefficient']
        ]);
    }

    public function updateSpecies($id, $data)
    {
        $stmt = $this->db->prepare("UPDATE species SET name = :name, min_size = :minSize, points_coefficient = :pointsCoefficient WHERE id = :id");
        return $stmt->execute([
            'name' => $data['name'],
            'minSize' => $data['minSize'],
            'pointsCoefficient' => $data['pointsCoefficient'],
            'id' => $id
        ]);
    }

    public function deleteSpecies($id)
    {
        $stmt = $this->db->prepare("DELETE FROM species WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function listSpecies()
    {
        $stmt = $this->db->query("SELECT * FROM species");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
