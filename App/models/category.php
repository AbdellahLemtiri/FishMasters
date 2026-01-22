<?php
class Category
{
    private $id;
    private $name;
    private $waterType;
    private $competitionType;
    private $level;
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function addCategory($data)
    {
        $stmt = $this->db->prepare("INSERT INTO categories (name, water_type, competition_type, level) VALUES (:name, :waterType, :competitionType, :level)");
        return $stmt->execute([
            'name' => $data['name'],
            'waterType' => $data['waterType'],
            'competitionType' => $data['competitionType'],
            'level' => $data['level']
        ]);
    }

    public function listCategories()
    {
        $stmt = $this->db->query("SELECT * FROM categories");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
